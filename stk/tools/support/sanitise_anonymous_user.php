<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

class sanitise_anonymous_user
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $db, $plugin, $user;

		// Grep the anonymous user
		$sql = 'SELECT *
			FROM ' . USERS_TABLE . '
			WHERE user_id = ' . ANONYMOUS;
		$result	= $db->sql_query($sql);
		$anon	= $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		// No anonymous user
		if (!$anon)
		{
			$plugin->set_part('a', 'missing');
			return 'ANONYMOUS_MISSING';
		}

		// Make sure that the anonymous user doesn't has an e-mail and correct usernames
		if ($anon['username'] != 'Anonymous' || $anon['username_clean'] != 'anonymous' || $anon['user_password'] != '' || $anon['user_email'] != '')
		{
			$plugin->set_part('a', 'clean');
			return 'ANONYMOUS_WRONG_DATA';
		}

		// Check the groups
		$_in_guests = false;
		$_other		= array();
		$this->_anon_groups($_in_guests, $_other);

		if ($_in_guests === false || !empty($_other))
		{
			$plugin->set_part('a', 'groups');
			return 'ANONYMOUS_WRONG_GROUPS';
		}

		trigger_error('ANONYMOUS_CORRECT');
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool()
	{
		global $config, $db, $plugin, $user;

		// Collect all the information a clean "Anonymous" should have
		$sql = 'SELECT group_id, group_rank, group_colour
			FROM ' . GROUPS_TABLE . "
			WHERE group_name = 'GUESTS'";
		$result	= $db->sql_query_limit($sql, 1, 0);
		$group_id		= $db->sql_fetchfield('group_id', false, $result);
		$group_rank		= $db->sql_fetchfield('group_rank', 0, $result);
		$group_colour	= $db->sql_fetchfield('group_colour', 0, $result);
		$db->sql_freeresult($result);

		$clean_data = array(
			'user_id'					=> ANONYMOUS,
			'user_type'					=> USER_IGNORE,
			'group_id'					=> $group_id,
			'username'					=> 'Anonymous',
			'username_clean'			=> 'anonymous',
			'user_regdate'				=> 0,
			'user_password'				=> '',
			'user_email'				=> '',
			'user_lang'					=> $config['default_lang'],
			'user_style'				=> $config['default_style'],
			'user_rank'					=> $group_rank,
			'user_colour'				=> $group_colour,
			'user_posts'				=> 0,
			'user_permissions'			=> '',
			'user_ip'					=> '',
			'user_birthday'				=> '',
			'user_lastpage'				=> '',
			'user_last_confirm_key'		=> '',
			'user_post_sortby_type'		=> 't',
			'user_post_sortby_dir'		=> 'a',
			'user_topic_sortby_type'	=> 't',
			'user_topic_sortby_dir'		=> 'd',
			'user_avatar'				=> '',
			'user_sig'					=> '',
			'user_sig_bbcode_uid'		=> '',
			'user_from'					=> '',
			'user_icq'					=> '',
			'user_aim'					=> '',
			'user_yim'					=> '',
			'user_msnm'					=> '',
			'user_jabber'				=> '',
			'user_website'				=> '',
			'user_occ'					=> '',
			'user_interests'			=> '',
			'user_actkey'				=> '',
			'user_newpasswd'			=> '',
			'user_allow_massemail'		=> 0,
		);

		// Return message
		$msg = '';

		// Do those thangs
		$action = request_var('a', '');
		switch ($action)
		{
			case 'clean' :
				// Reset all the user information
				$sql = 'UPDATE ' . USERS_TABLE . '
					SET ' . $db->sql_build_array('UPDATE', $clean_data) . '
					WHERE user_id = ' . ANONYMOUS;
				$db->sql_query($sql);
				$msg = $user->lang['ANONYMOUS_CLEANED'];
			break;

			case 'groups' :
				// Re-get all the group data
				$_in_guests = false;
				$_other		= array();
				$guests_gr	= $this->_anon_groups($_in_guests, $_other);

				if (!function_exists('group_user_del'))
				{
					include(PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
				}

				// Loop through the others and remove this user from all these groups
				foreach ($_other as $group)
				{
					if (($ret = group_user_del($group, ANONYMOUS)) !== false)
					{
						trigger_error($user->lang[$ret]);
					}
				}

				// Not in the guests group?
				if ($_in_guests === false)
				{
					if (($ret = group_user_add($guests_gr, ANONYMOUS, false, false, true)) !== false)
					{
						trigger_error($user->lang[$ret]);
					}
				}

				$msg = $user->lang['ANONYMOUS_GROUPS_REMOVED'];
			break;

			case 'missing' :
				// Lets re-create the anonymous user
				$sql = 'INSERT INTO ' . USERS_TABLE . '
					' . $db->sql_build_array('INSERT', $clean_data);
				$db->sql_query($sql);
				if (!$db->sql_affectedrows())
				{
					trigger_error($user->lang['ANONYMOUS_CREATION_FAILED']);
				}
				$msg = $user->lang['ANONYMOUS_CREATED'];
			break;

			default :
				trigger_error('NO_MODE');
		}

		// Inform the user
		meta_refresh(3, append_sid(STK_INDEX, $plugin->url_arg()));
		trigger_error($msg . '<br />' . $user->lang['REDIRECT_NEXT_STEP']);
	}

	function _anon_groups(&$_in_guests, &$_other_groups)
	{
		global $db;

		// Fetch the groups our user is in
		if (!function_exists('group_memberships'))
		{
			include(PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
		}
		$groups = group_memberships(false, ANONYMOUS);

		if (empty($groups))
		{
			$groups = array();
		}

		// Get the group id of GUESTS
		$sql = 'SELECT group_id
			FROM ' . GROUPS_TABLE . "
			WHERE group_name = 'GUESTS'";
		$result	= $db->sql_query_limit($sql, 1, 0);
		$gid	= $db->sql_fetchfield('group_id', false, $result);
		$db->sql_freeresult($result);

		// Build the information
		foreach ($groups as $group => $group_data)
		{
			if ($group_data['group_id'] == $gid)
			{
				$_in_guests = $group_data['group_id'];
				continue;
			}

			$_other_groups[] = $group_data['group_id'];
		}

		if ($_in_guests === false)
		{
			return $gid;
		}
	}
}
?>