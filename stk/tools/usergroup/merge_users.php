<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU License
*
*/

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

class merge_users
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $user;

		return array(
			'title'		=> 'MERGE_USERS',
			'explain'	=> true,
			'vars'		=> array(
				'legend1'	=> 'MERGE_USERS',
				'source'	=> array('lang' => 'MERGE_USERS_USER_SOURCE', 'type' => 'text:40:255', 'explain' => true, 'select_user' => true),
				'target'	=> array('lang' => 'MERGE_USERS_USER_TARGET', 'type' => 'text:40:255', 'explain' => false, 'select_user' => true),
				'delete'	=> array('lang' => 'MERGE_USERS_REMOVE_SOURCE', 'type' => 'checkbox', 'explain' => true, 'default' => true),
			),
		);
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		global $config, $user, $db, $cache;

		$user->add_lang('ucp');

		if (!check_form_key('merge_users'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		$source = ($source = request_var('source', 0)) ? $source : utf8_normalize_nfc(request_var('source', '', true));
		$target = ($target = request_var('target', 0)) ? $target : utf8_normalize_nfc(request_var('target', '', true));
		$delete = request_var('delete', false);

		if (!$source || !$target)
		{
			$error[] = 'NO_USER';
			return;
		}

		$sql = 'SELECT user_id, user_type
			FROM ' . USERS_TABLE . '
			WHERE ';

		$sql .= (is_int($source)) ? "user_id = $source" : "username_clean = '" . $db->sql_escape(utf8_clean_string($source)) . "'";

		$result = $db->sql_query($sql);
		$source = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		$sql = 'SELECT user_id, user_type
			FROM ' . USERS_TABLE . '
			WHERE ';

		$sql .= (is_int($target)) ? "user_id = $target" : "username_clean = '" . $db->sql_escape(utf8_clean_string($target)) . "'";

		$result = $db->sql_query($sql);
		$target = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!$source || !$target)
		{
			$error[] = 'NO_USER';
			return;
		}

		if ($source['user_id'] == $target['user_id'])
		{
			$error[] = 'MERGE_USERS_SAME_USERS';
			return;
		}

		if ($source['user_type'] != $target['user_type'])
		{
			if ($source['user_type'] == USER_FOUNDER || $target['user_type'] == USER_FOUNDER)
			{
				// Cannot merge a founder with a non founder or vice versa
				$error[] = 'MERGE_USERS_BOTH_FOUNDERS';
				return;
			}
			else if ($source['user_type'] == USER_IGNORE || $target['user_type'] == USER_IGNORE)
			{
				// Cannot merge a bot with a non bot or vice versa
				$error[] = 'MERGE_USERS_BOTH_IGNORE';
				return;
			}
		}

		$source = (int) $source['user_id'];
		$target = (int) $target['user_id'];

		// Needed for the merge
		include PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT;

		$result = $this->merge($source, $target);

		if (is_string($result))
		{
			$error[] = $result;
			return;
		}

		$db->sql_transaction('begin');

		foreach ($result as $sql)
		{
			$db->sql_query($sql);
		}

		$db->sql_transaction('commit');

		// Delete source user
		if ($delete)
		{
			user_delete('remove', $source, $post_username = false);
		}

		$sql = 'SELECT DISTINCT group_id
			FROM ' . USER_GROUP_TABLE . "
			WHERE user_id IN ($source, $target)";
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			group_update_listings((int) $row['group_id']);
		}
		$db->sql_freeresult($result);

		// Update data
		update_last_username();
		$cache->destroy('sql', MODERATOR_CACHE_TABLE);

		trigger_error('MERGE_USERS_MERGED');
	}

	function merge($source, $target)
	{
		global $db;

		$source = $this->get_user_data($source);
		$target = $this->get_user_data($target);

		$groups = $this->get_group_memberships($target['user_id']);

		$types = array(
			'id'		=> 'user_id',
			'name'		=> 'username',
			'colour'	=> 'user_colour',
		);

		$sql = array(
		);

		foreach ($this->get_group_memberships($source['user_id']) as $group)
		{
			if (isset($groups[$group['id']]))
			{
				if ($groups[$group['id']]['leader'] != $group['leader'] || $groups[$group['id']]['pending'] != $group['pending'])
				{
					$sql[] = 'UPDATE ' . USER_GROUP_TABLE . '
						SET ' . $db->sql_build_array('UPDATE', array(
							'group_leader'	=> ($group['leader']) ? 1 : $groups[$group['id']]['leader'],
							'user_pending'	=> (!$group['pending']) ? 0 : $groups[$group['id']]['pending'],
						)) . "
						WHERE user_id = {$target['user_id']}
							AND group_id = {$group['id']}";
				}
			}
			else
			{
				$sql[] = 'INSERT INTO ' . USER_GROUP_TABLE . ' ' . $db->sql_build_array('INSERT', array(
					'group_id'		=> $group['id'],
					'user_id'		=> $target['user_id'],
					'group_leader'	=> $group['leader'],
					'user_pending'	=> $group['pending'],
				));
			}
		}

		/**
		 * Ignored tables
		 * forums_access
		 * sessions
		 * sessions_keys
		 */
		foreach (array(
			'acl_users'		=> null,
			'attachments'	=> 'poster_id',

			'banlist'	=> 'ban_userid',
			'bookmarks'	=> null,
			'bots'		=> 'user_id',

			'drafts'	=> 'user_id',

			'forums'		=> array(
				array(
					'forum_last_poster_id'		=> 'id',
					'forum_last_poster_name'	=> 'name',
					'forum_last_poster_colour'	=> 'colour',
				),
				array(
					'forum_last_poster_id',
					array('forum_last_poster_id', 'forum_last_poster_name', 'forum_last_poster_colour'),
				),
			),

			'forums_track'	=> null,
			'forums_watch'	=> null,

			'log'	=> array(
				array(
					'user_id'		=> 'id',
					'reportee_id'	=> 'id',
				),
				array(
					'user_id',
					'user_id',
				),
				array(
					'reportee_id',
					'reportee_id',
				),
			),

			'moderator_cache' => array(
				array(
					'user_id'		=> 'id',
					'username'		=> 'name',
				),
				array(
					'user_id',
					array('user_id', 'username'),
				),
			),

			'poll_votes'			=> 'vote_user_id',
			'posts'					=> array(
				array(
					'poster_id'		=> 'id',
					'post_username'	=> 'name',
				),
				array(
					'poster_id',
					array('poster_id', 'post_username'),
				),
			),
			'privmsgs'				=> array(
				array(
					'author_id'		=> 'id',
				),
				array(
					'author_id',
					'author_id',
				),
				null,
			),
			// Only custom folders making this easy as 3.14159
			'privmsgs_folder'		=> array(
				array(
					'user_id'		=> 'id',
				),
				array(
					'user_id',
					'user_id',
				),
			),
			'privmsgs_rules'		=> array(
				array(
					'user_id'		=> 'id',
					'rule_user_id'	=> 'id',
					'rule_string'	=> 'name', // Not all the time
				),
				// Rules referencing our source user
				array(
					'rule_user_id',
					array('rule_user_id', 'rule_string'),
				),
				// Rules created by our source user
				array(
					'user_id',
					'user_id',
				),
			),
			'privmsgs_to'			=> array(
				array(
					'user_id'	=> 'id', // Destination user
					'author_id'	=> 'id', // Author
				),
				array(
					'user_id',
					'user_id',
				),
				array(
					'author_id',
					'author_id',
				),
			),
			'profile_fields_data'	=> null,

			'reports'	=> 'user_id',

			'topics'		=> array(
				array(
					'topic_poster'				=> 'id',
					'topic_first_poster_name'	=> 'name',
					'topic_first_poster_colour'	=> 'colour',
					'topic_last_poster_id'		=> 'id',
					'topic_last_poster_name'	=> 'name',
					'topic_last_poster_colour'	=> 'colour',
				),
				array(
					'topic_poster',
					'topic_poster',
				),
				array(
					array('topic_first_poster_name', 'topic_first_poster_colour'),
					array('topic_first_poster_name', 'topic_first_poster_colour'),
				),
				array(
					'topic_last_poster_id',
					array('topic_last_poster_id', 'topic_last_poster_name', 'topic_last_poster_colour'),
				),
			),
			'topics_posted'	=> null,
			'topics_track'	=> null,
			'topics_watch'	=> null,

			'warnings'		=> 'user_id',

			'zebra'			=> null,
		) as $key => $data)
		{
			if (is_string($data))
			{
				// Simple
				$table = $this->table_name($key);

				$sql[] = "UPDATE $table
					SET $data = {$target['user_id']}
					WHERE $data = {$source['user_id']}";
			}
			else if (is_null($data))
			{
				$method = 'merge_' . $key;

				$sql = array_merge($sql, (array) $this->$method($source, $target));
			}
			else if (is_array($data))
			{
				$table = $this->table_name($key);

				// Column types
				$columns = array_shift($data);

				// Magic foo
				foreach ($data as $update)
				{
					if (is_null($update))
					{
						$method = 'merge_' . $key;

						$sql = array_merge($sql, (array) $this->$method($source, $target));

						continue;
					}
					$find = array_shift($update);
					$replace = array_shift($update);

					$update = $where = array();

					if (!is_array($find))
					{
						$find = array($find);
					}

					if (!is_array($replace))
					{
						$replace = array($replace);
					}

					foreach ($find as $column)
					{
						if (!isset($columns[$column]))
						{
							trigger_error('Missing column [' . htmlspecialchars($column) . '] in ' . $table, E_USER_ERROR);
						}
						$where[] = $column . ' = ' . $db->_sql_validate_value($source[$types[$columns[$column]]]);
					}

					foreach ($replace as $column)
					{
						if (!isset($columns[$column]))
						{
							trigger_error('Missing column [' . htmlspecialchars($column) . '] in ' . $table, E_USER_ERROR);
						}
						$update[$column] = $target[$types[$columns[$column]]];
					}

					$sql[] = "UPDATE $table
						SET " . $db->sql_build_array('UPDATE', $update) . '
						WHERE ' . implode(' AND ', $where);
				}
			}
		}

		$update['target'] = $update['source'] = $update = array();

		if ($source['user_type'] !== $target['user_type'])
		{
			if ($source['user_type'] == USER_FOUNDER || $target['user_type'] == USER_FOUNDER)
			{
				// Cannot merge a founder with a non founder or vice versa
				return 'MERGE_USERS_BOTH_FOUNDERS';
			}
			else if ($source['user_type'] == USER_IGNORE || $target['user_type'] == USER_IGNORE)
			{
				// Cannot merge a bot with a non bot or vice versa
				return 'MERGE_USERS_BOTH_IGNORE';
			}

			switch ($source['user_type'])
			{
				case USER_INACTIVE:
					$update['target']['user_type']				= USER_INACTIVE;
					$update['target']['user_inactive_reason']	= $source['user_inactive_reason'];
					$update['target']['user_inactive_time']		= (int) $source['user_inactive_time'];
					$update['target']['user_reminded']			= (int) $source['user_reminded'];
					$update['target']['user_reminded_time']		= (int) $source['user_reminded_time'];
					$update['target']['user_actkey']			= $source['user_actkey'];
					$update['target']['user_newpasswd']			= $source['user_newpasswd'];
				break;

				case USER_NORMAL:
				break;
			}
		}

		// Reset permissions
		$update['source']['user_permissions'] = $update['target']['user_permissions'] = '';
		$update['source']['user_perm_from'] = $update['target']['user_perm_from'] = 0;

		if ($source['user_regdate'] < $target['user_regdate'])
		{
			// Source user registered first, update registration data
			$update['target']['user_regdate']	= (int) $source['user_regdate'];
			$update['target']['user_ip']		= $source['user_ip'];
		}

		foreach (array('lastvisit', 'lastmark', 'lastpost_time', 'last_search', 'last_warning', 'last_privmsg', 'emailtime', 'full_folder') as $var)
		{
			if ($source['user_' . $var] > $target['user_' . $var])
			{
				// Source users value is newer update
				$update['target']['user_' . $var] = (int) $source['user_' . $var];
			}
		}

		if (isset($update['target']['user_lastvisit']))
		{
			// Updating lastvisit, update other last stuff
			$update['target']['user_lastpage'] = $source['user_lastpage'];
		}

		foreach (array('posts', 'warnings', 'login_attempts', 'new_privmsg', 'unread_privmsg') as $var)
		{
			if ($source['user_' . $var])
			{
				$update['target']['user_' . $var] = $source['user_' . $var] + $target['user_' . $var];
				$update['source']['user_' . $var] = 0;
			}
		}

		if ($source['user_message_rules'])
		{
			// Update this only if the source has rules
			if (!$target['user_message_rules'])
			{
				$update['target']['user_message_rules'] = 1;
			}
			// No longer has rules ;)
			$update['source']['user_message_rules'] = 0;
		}

		if ($source['user_notify_type'] != $target['user_notify_type'] && $target['user_notify_type'] != NOTIFY_BOTH)
		{
			// Not the same, and target is not both, therefore one is jabber and one is email or otherway around
			// Merge by setting to both
			$update['target']['user_notify_type'] = NOTIFY_BOTH;
		}

		foreach (array('birthday', 'avatar', 'sig', 'from', 'icq', 'aim', 'yim', 'msnm', 'jabber', 'website', 'occ', 'interests') as $var)
		{
			if (!$target['user_' . $var] && $source['user_' . $var])
			{
				$update['target']['user_' . $var] = $source['user_' . $var];

				switch ($var)
				{
					case 'avatar':
						$update['target']['user_avatar_type']	= $source['user_avatar_type'];
						$update['target']['user_avatar_width']	= $source['user_avatar_width'];
						$update['target']['user_avatar_height']	= $source['user_avatar_height'];
					break;

					case 'sig':
						$update['target']['user_sig_bbcode_uid']		= $source['user_sig_bbcode_uid'];
						$update['target']['user_sig_bbcode_bitfield']	= $source['user_sig_bbcode_bitfield'];
					break;
				}
			}
		}

		// Options
		if (($source['user_options'] | $target['user_options']) !== $source['user_options'])
		{
			// Any bits set in source OR target are set
			$source['user_options'] = $source['user_options'] | $target['user_options'];
		}

		// Update user_new if both 1 and passes threshold

		// Default group
		// Source user is not removed from groups so no need to update this
		if (!$target['user_rank'] && !$target['user_colour'] && ($source['user_rank'] || $source['user_colour']))
		{
			// No rank or colour on target and source has rank or colour update default group
			$update['target']['group_id'] = $source['group_id'];
			$update['target']['user_colour'] = $source['user_colour'];
			$update['target']['user_rank'] = $source['user_rank'];
		}

		$sql[] = 'UPDATE ' . USERS_TABLE . '
			SET ' . $db->sql_build_array('UPDATE', $update['source']) . "
			WHERE user_id = {$source['user_id']}";

		$sql[] = 'UPDATE ' . USERS_TABLE . '
			SET ' . $db->sql_build_array('UPDATE', $update['target']) . "
			WHERE user_id = {$target['user_id']}";

		return $sql;
	}

	function merge_acl_users($source, $target)
	{
		global $db;

		$acls['source'] = $acls['target'] = $acls = array();

		$sql_ary = array(
			'SELECT'	=> 'au.*, ard.auth_setting AS role_setting',
			'FROM'		=> array(
				ACL_USERS_TABLE => 'au',
			),
			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(
						ACL_ROLES_DATA_TABLE => 'ard',
					),
					'ON'	=> 'au.auth_role_id = ard.role_id
								AND au.auth_option_id = ard.auth_option_id',
				),
			),
			'WHERE'		=> $db->sql_in_set('user_id', array($source['user_id'], $target['user_id'])),
		);
		$sql = $db->sql_build_query('SELECT', $sql_ary);

		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$key = ($row['user_id'] == $source['user_id'] ? 'source' : 'target');
			$setting = (int) ($row['auth_role_id'] ? $row['role_setting'] : $row['auth_setting']);

			if (!isset($acls[$key][(int) $row['auth_option_id']]))
			{
				$acls['source'][(int) $row['auth_option_id']] = $acls['target'][(int) $row['auth_option_id']] = array();
			}

			$acls[$key][(int) $row['auth_option_id']][(int) $row['forum_id']] = array(
				'role'		=> (int) $row['auth_role_id'],
				'setting'	=> $setting,
			);
		}
		$db->sql_freeresult($result);

		$sql = array();

		foreach ($acls['source'] as $id => $forums)
		{
			foreach ($forums as $fid => $data)
			{
				$insert = $update = array();

				if (isset($acls['target'][$id][$fid]))
				{
					if ($data['setting'] === $acls['target'][$id][$fid]['setting'])
					{
						// Same setting
						if ($data['role'] === $acls['target'][$id][$fid]['role'])
						{
							// Same role
							continue;
						}
						else if ($data['role'] && !$acls['target'][$id][$fid]['role'])
						{
							// Source has a role, target doesn't, favour roles
							$update = array(
								'auth_role_id'	=> $data['role'],
								'auth_setting'	=> 0,
							);
						}
						else
						{
							// Both have different roles with the same settings, keep the current role
							continue;
						}
					}
					else if ($acls['target'][$id][$fid]['setting'] === ACL_NEVER)
					{
						// Target has been set to never, we do not wish to replace this
						continue;
					}
					else if ($data['setting'] == ACL_NO)
					{
						// Source has no ACL defined
						// The first condition will catch NO && NO but differing roles
						continue;
					}
					else
					{
						// Source is not NO and target is not NEVER

						/**
						 * Source	| Target
						 * 	Y		|	Y
						 * 	N		|
						 * 			|	∅
						 *
						 * Y => ∅
						 * N => Y
						 * N => ∅
						 */

						if (!$data['role'] && !$acls['target'][$id][$fid]['role'])
						{
							// Neither have a role
							if ($acls['target'][$id][$fid]['setting'] === ACL_NO)
							{
								// Overwrite an ACL_NO
								$update = array(
									'auth_setting'	=> $data['setting'],
								);
							}
							else
							{
								continue;
							}
						}
						else if ($data['role'] && !$acls['target'][$id][$fid]['role'])
						{
							// Source has a role overwrite
							$update = array(
								'auth_role_id'	=> $data['role'],
								'auth_setting'	=> 0,
							);
						}
						else
						{
							// Source has no role, target has role
							continue;
						}
					}
				}
				else
				{
					// Target has nothing set here, insert
					$insert = array(
						'user_id'			=> $target['user_id'],
						'forum_id'			=> $fid,
						'auth_option_id'	=> $id,
					);

					if ($data['role'])
					{
						$insert['auth_role_id'] = $data['role'];
					}
					else
					{
						$insert['auth_setting'] = $data['setting'];
					}
				}

				if ($insert)
				{
					$sql[] = 'INSERT INTO ' . ACL_USERS_TABLE . ' ' . $db->sql_build_array('INSERT', $insert);
				}
				else if ($update)
				{
					$sql[] = 'UPDATE ' . ACL_USERS_TABLE . '
						SET ' . $db->sql_build_array('UPDATE', $update) . "
						WHERE user_id = {$target['user_id']}
							AND forum_id = $fid
							AND auth_option_id = $id";
				}
			}
		}
		return $sql;
	}

	function merge_bookmarks($source, $target)
	{
		global $db;

		$bookmarks = array();

		$sql = 'SELECT topic_id
			FROM ' . BOOKMARKS_TABLE . "
			WHERE user_id = {$target['user_id']}";

		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$bookmarks[] = (int) $row['topic_id'];
		}
		$db->sql_freeresult($result);

		$sql = array();

		if (!empty($bookmarks))
		{
			// Delete duplicate bookmarks
			$sql[] = 'DELETE
				FROM ' . BOOKMARKS_TABLE . "
				WHERE user_id = {$source['user_id']}
					AND " . $db->sql_in_set('topic_id', $bookmarks);
		}

		// Update remaining bookmarks
		$sql[] = 'UPDATE ' . BOOKMARKS_TABLE . "
			SET user_id	= {$target['user_id']}
			WHERE user_id = {$source['user_id']}";

		return $sql;
	}

	function merge_forums_track($source, $target)
	{
		return $this->merge_track_tables('forum', $source, $target);
	}

	function merge_forums_watch($source, $target)
	{
		return $this->merge_watch_tables('forum', $source, $target);
	}

	function merge_privmsgs($source, $target)
	{
		global $db;

		$sql = 'SELECT msg_id, to_address, bcc_address
			FROM ' . PRIVMSGS_TABLE . "
			WHERE to_address LIKE '%u_{$source['user_id']}%'
				OR bcc_address LIKE '%u_{$source['user_id']}%'";
		$result = $db->sql_query($sql);

		$sql = array();

		while ($row = $db->sql_fetchrow($result))
 		{
			$to_id = explode(':',$row['to_address']);
			foreach ($to_id as $key => $v1)
			{
				$trimmed = (int) ltrim($v1, 'u_');
				if ($trimmed === $source['user_id'])
				{
					$to_id[$key] = 'u_' . $target['user_id'];
				}
			}
			$to_address = implode(':', $to_id);

			$bcc_id = explode(':',$row['bcc_address']);
			foreach ($bcc_id as $key => $v1)
			{
				$trimmed = (int) ltrim($v1, 'u_');
				if ($trimmed === $source['user_id'])
				{
					$bcc_id[$key] = 'u_' . $target['user_id'];
				}
			}
			$bcc_address = implode(':', $bcc_id);


 			$sql[] = 'UPDATE ' . PRIVMSGS_TABLE . '
 				SET ' . $db->sql_build_array('UPDATE', array(
					'to_address'	=> $to_address,
					'bcc_address'	=> $bcc_address,
 			)) . '
 			WHERE msg_id = ' . (int) $row['msg_id'];
 		}

		return $sql;
	}

	function merge_profile_fields_data($source, $target)
	{
		global $db;

		$fields = array();

		$sql = 'SELECT *
			FROM ' . PROFILE_FIELDS_DATA_TABLE . "
			WHERE user_id = {$source['user_id']}";
		$result = $db->sql_query($sql);
		$fields['source'] = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		$sql = 'SELECT *
			FROM ' . PROFILE_FIELDS_DATA_TABLE . "
			WHERE user_id = {$target['user_id']}";
		$result = $db->sql_query($sql);
		$fields['target'] = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		unset($fields['source']['user_id'], $fields['target']['user_id']);

		if (empty($fields['source']))
		{
			return array();
		}

		foreach ($fields['source'] as $name => $value)
		{
			if (empty($fields['target']) || $fields['target'][$name] === null)
			{
				$update[$name] = $value;
			}
		}

		if (empty($update))
		{
			return array();
		}

		return array(
			'UPDATE ' . PROFILE_FIELDS_DATA_TABLE . '
				SET ' . $db->sql_build_array('UPDATE', $update) . "
				WHERE user_id = {$target['user_id']}",
			'DELETE
				FROM ' . PROFILE_FIELDS_DATA_TABLE . "
				WHERE user_id = {$source['user_id']}",
		);
	}

	function merge_topics_posted($source, $target)
	{
		global $db;

		$posted = array();

		$sql = 'SELECT topic_id, topic_posted
			FROM ' . TOPICS_POSTED_TABLE . "
			WHERE user_id = {$target['user_id']}";

		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			// Should never be zero but you never know
			if ($row['topic_posted'])
			{
				$posted[] = (int) $row['topic_id'];
			}
		}
		$db->sql_freeresult($result);

		$sql = array();

		if (!empty($posted))
		{
			// Delete duplicates
			$sql[] = 'DELETE
				FROM ' . TOPICS_POSTED_TABLE . "
				WHERE user_id = {$source['user_id']}
					AND " . $db->sql_in_set('topic_id', $posted);
		}

		// Update remaining
		$sql[] = 'UPDATE ' . TOPICS_POSTED_TABLE . "
			SET user_id	= {$target['user_id']}
			WHERE user_id = {$source['user_id']}";

		return $sql;
	}

	function merge_topics_track($source, $target)
	{
		return $this->merge_track_tables('topic', $source, $target);
	}

	function merge_topics_watch($source, $target)
	{
		return $this->merge_watch_tables('topic', $source, $target);
	}

	function merge_zebra($source, $target)
	{
		global $db;

		$friends = $foes = array();

		$sql = 'SELECT zebra_id, friend, foe
			FROM ' . ZEBRA_TABLE . "
			WHERE user_id = {$target['user_id']}
				AND zebra_id <> {$target['user_id']}";

		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			if ($row['friend'])
			{
				$friends[] = (int) $row['zebra_id'];
			}
			else if ($row['foe'])
			{
				$foes[] = (int) $row['zebra_id'];
			}
		}
		$db->sql_freeresult($result);

		$sql = array();

		if (!empty($friends) || !empty($foes))
		{
			// Delete duplicates
			$sql[] = 'DELETE
				FROM ' . ZEBRA_TABLE . "
				WHERE user_id = {$source['user_id']}
					AND " . $db->sql_in_set('zebra_id', array_merge($friends, $foes));
		}

		// Update remaining
		$sql[] = 'UPDATE ' . ZEBRA_TABLE . "
			SET user_id	= {$target['user_id']}
			WHERE user_id = {$source['user_id']}";

		return $sql;
	}

	function merge_watch_tables($mode, $source, $target)
	{
		global $db;

		$table = $this->table_name($mode . 's_watch');
		$watches = array();

		$sql = "SELECT {$mode}_id, notify_status
			FROM $table
			WHERE user_id = {$target['user_id']}";

		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$watches[(int) $row[$mode . '_id']] = (bool) $row['notify_status'];
		}
		$db->sql_freeresult($result);

		$sql = "SELECT {$mode}_id, notify_status
			FROM $table
			WHERE user_id = {$source['user_id']}";

		$result = $db->sql_query($sql);

		$sql = array();

		while ($row = $db->sql_fetchrow($result))
		{
			$id = (int) $row[$mode . '_id'];

			// Don't update anything if both users are watching
			if (!isset($watches[$id]))
			{
				$sql[] = "INSERT INTO $table " . $db->sql_build_array('INSERT', array(
					'user_id'		=> $target['user_id'],
					"{$mode}_id"	=> $id,
					'notify_status'	=> 0,	// So emails are sent
				));
			}
		}
		$db->sql_freeresult($result);

		// Clean up
		$sql[] = "DELETE
			FROM $table
			WHERE user_id = {$source['user_id']}";

		return $sql;
	}

	function merge_track_tables($mode, $source, $target)
	{
		global $db;

		$table = $this->table_name($mode . 's_track');
		$marks = array();

		$sql = "SELECT {$mode}_id, mark_time
			FROM $table
			WHERE user_id = {$target['user_id']}";

		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$marks[(int) $row[$mode . '_id']] = (int) $row['mark_time'];
		}
		$db->sql_freeresult($result);

		$sql = "SELECT {$mode}_id, mark_time
			FROM $table
			WHERE user_id = {$source['user_id']}";

		$result = $db->sql_query($sql);

		$sql = array();

		while ($row = $db->sql_fetchrow($result))
		{
			$id = (int) $row[$mode . '_id'];
			$time = (int) $row['mark_time'];

			if (isset($marks[$id]) && $time > $marks[$id]['time'])
			{
				$sql[] = "UPDATE $table
					SET mark_time = $time
					WHERE user_id = {$target['user_id']}
						AND {$mode}_id = $id";
			}
			else if (!isset($marks[$id]))
			{
				// Shouldn't mess up topics tracking without a forum_id
				$sql[] = "INSERT INTO $table " . $db->sql_build_array('INSERT', array(
					'user_id'	=> $target['user_id'],
					"{$mode}_id"=> $id,
					'mark_time'	=> $time,
				));
			}
		}
		$db->sql_freeresult($result);

		$sql[] = "DELETE
			FROM $table
			WHERE user_id = {$source['user_id']}";

		return $sql;
	}

	function table_name($table)
	{
		$table = strtoupper($table) . '_TABLE';

		if (!defined($table))
		{
			trigger_error('Table is missing ' . $table);
		}
		return constant($table);
	}

	function get_user_data($user)
	{
		global $db;

		$sql = 'SELECT *
			FROM ' . USERS_TABLE . '
			WHERE user_id = ' . (int) $user;

		$result = $db->sql_query($sql);
		$data = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		// Cast some values
		return array_merge($data, array(
			'user_id'	=> (int) $data['user_id'],
		));
	}

	function get_group_memberships($user)
	{
		$groups		= array();
		$group_set	= group_memberships(false, (int) $user);

		foreach ($group_set as $group)
		{
			$groups[(int) $group['group_id']] = array(
				'id'		=> (int) $group['group_id'],
				'leader'	=> (bool) $group['group_leader'],
				'pending'	=> (bool) $group['user_pending'],
			);
		}
		return $groups;
	}
}
