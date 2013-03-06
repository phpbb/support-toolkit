<?php
/**
*
* @package Support Toolkit - Restore Deleted Users
* @version $Id$
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

class restore_deleted_users
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $db, $template;

		$conflicted = request_var('conflicted', array(0 => 0));

		// Find all guest posters
		if (empty($conflicted))
		{
			$var = 'post';
			$sql = 'SELECT MAX(post_id) AS post_id, post_username
				FROM ' . POSTS_TABLE . '
				WHERE poster_id = ' . ANONYMOUS . '
					GROUP BY post_username';
			$title = 'RESTORE_DELETED_USERS';
			$type = 'checkbox';
		}
		else
		{
			$var = 'conflicted';
			$sql = 'SELECT MAX(post_id) AS post_id, post_username
				FROM ' . POSTS_TABLE . '
				WHERE ' . $db->sql_in_set('post_id', $conflicted) . '
					GROUP BY post_username';
			$title = 'RESTORE_DELETED_USERS_CONFLICT';
			$type = 'text:40:255';
		}
		$result	= $db->sql_query($sql);
		$users	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		$damaged = array();

		// Make sure there's always a username
		foreach ($users as $key => $data)
		{
			$cleaned_name = utf8_clean_string($data['post_username']);
			if (empty($cleaned_name))
			{
				$damaged[] = $data['post_username'];
				unset($users[$key]);
			}
		}

		// Nothing to do
		if (empty($users) && empty($damaged))
		{
			trigger_error('NO_DELETED_USERS');
		}

		$return = array('title'	=> $title);
		if (!empty($users))
		{
			// Build the output
			$user_vars = array();
			foreach ($users as $u)
			{
				$user_vars["{$var}[{$u['post_id']}]"] = array('lang' => $u['post_username'], 'explain' => false, 'type' => $type);
			}

			if (empty($conflicted))
			{
				// Add Mark/Unmark all
				$template->assign_var('S_MARK_ALL', $var);
			}

			// Return usable data
			$return = array_merge($return, array(
				'vars'	=> array_merge(array(
					'legend1'	=> 'SELECT_USERS',
				), $user_vars),
			));
		}

		if (!empty($damaged) && empty($conflicted))
		{
			$sql = 'SELECT post_id
				FROM ' . POSTS_TABLE . '
				WHERE poster_id = ' . ANONYMOUS . '
					AND ' . $db->sql_in_set('post_username', $damaged);
			$result = $db->sql_query($sql);

			$post_ids = array();
			while($row = $db->sql_fetchrow($result))
			{
				$post_ids[] = (int)$row['post_id'];
			}
			
			$return['vars']['legend2'] = 'DAMAGED_POSTS';
			$return['vars']['damaged_posts'] = array('lang' => 'DAMAGED_POSTS', 'default' => implode(', ', $post_ids), 'explain' => true, 'type' => 'text:40:255');
		}

		if (!empty($users))
		{
			$return['vars']['legend3'] = 'SUBMIT';
		}

		return $return;
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		global $config, $db, $umil;

		if (!check_form_key('restore_deleted_users'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		if (!isset($_REQUEST['post']) && !isset($_REQUEST['conflicted']))
		{
			$error[] = 'NO_USER_SELECTED';
			return;
		}

		if (isset($_REQUEST['post']))
		{
			// Get the selected users
			$posts = array_keys(request_var('post', array(0 => 0)));
			if (empty($posts))
			{
				$error[] = 'NO_USER_SELECTED';
				return;
			}

			// Get all the selected usernames
			$selected = array();
			$sql = 'SELECT post_id, post_username
				FROM ' . POSTS_TABLE . '
				WHERE ' . $db->sql_in_set('post_id', $posts);
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				$selected[$row['post_id']] = $row['post_username'];
			}
			$db->sql_freeresult($result);

			$selected_clean = array_map('utf8_clean_string', $selected);
			$non_conflicted = $this->_conflicted($selected_clean);

			foreach ($non_conflicted as $post_id => $user)
			{
				$this->_add_user_and_update_data($selected[$post_id], $selected[$post_id]);
			}

			// If there are conflicted names kick the user back to step 1
			$conflicted = array_diff($selected_clean, $non_conflicted);
			if (!empty($conflicted))
			{
				$this->_redirect_conflicted($conflicted);
			}
		}
		else
		{
			$conflicted = request_var('conflicted', array(0 => ''), true);

			// Get the usernames used for the posts
			$original = array();
			$sql = 'SELECT post_id, post_username
				FROM ' . POSTS_TABLE . '
				WHERE ' . $db->sql_in_set('post_id', array_keys($conflicted));
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				$original[$row['post_id']] = $row['post_username'];
			}
			$db->sql_freeresult($result);

			// Test for any conflicts
			$conflicted_clean = array_map('utf8_clean_string', $conflicted);
			$non_conflicted = $this->_conflicted($conflicted_clean);

			// Fix all non conflicted
			foreach ($non_conflicted as $post_id => $newname)
			{
				$this->_add_user_and_update_data($original[$post_id], $conflicted[$post_id]);
			}

			// Still conflicts?
			$conflicted_names = array_diff($conflicted_clean, $non_conflicted);
			if (sizeof($conflicted_names))
			{
				$this->_redirect_conflicted($conflicted_names);
			}
		}

		// Clear the cache
		$umil->cache_purge(array(
			array('auth'),
			array('data'),
		));

		trigger_error(((sizeof($non_conflicted) > 1) ? 'USERS_RESTORED_SUCCESSFULLY' : 'USER_RESTORED_SUCCESSFULLY'));
	}

	/**
	* Test whether the requested usernames already exist in phpBB
	* @param	array $users Array containing the "cleaned" usernames
	* @return	array Array containing the conflicted users
	* @access	private
	*/
	function _conflicted($users)
	{
		global $db;

		$conflicted = array();
		$sql = 'SELECT username_clean
			FROM ' . USERS_TABLE . '
			WHERE ' . $db->sql_in_set('username_clean', $users);
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$conflicted[] = $row['username_clean'];
		}
		$db->sql_freeresult($result);

		return array_diff($users, $conflicted);
	}

	/**
	* Add a user with the name $user to phpBB and update all entries in the database to reflect this
	* @param	string $oldname The name that was used when making the guest posts
	* @param	string $newname The name that will be used for the new user
	* @return	void
	* @access	private
	*/
	function _add_user_and_update_data($oldname, $newname)
	{
		global $db, $config, $user;

		if (!function_exists('user_add'))
		{
			include PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT;
		}

		// Registered users group?
		$sql = 'SELECT group_id, group_colour
			FROM ' . GROUPS_TABLE . "
			WHERE group_name = 'REGISTERED'";
		$result = $db->sql_query_limit($sql, 1);
		$gid	= $db->sql_fetchfield('group_id', false, $result);
		$gcl	= $db->sql_fetchfield('group_colour', 0, $result);
		$db->sql_freeresult($result);

		// Setup the user
		$user_ary = array(
			'username'		=> $newname,
			'group_id'		=> $gid,
			'user_email'	=> $config['board_email'],	// Use the board email
			'user_type'		=> USER_NORMAL,
			'user_password'	=> gen_rand_string(12),
		);

		// Add the user
		$user_id = user_add($user_ary);

		// Update forums table
		$sql = 'UPDATE ' . FORUMS_TABLE . '
			SET forum_last_poster_id = ' . (int) $user_id . " , forum_last_poster_name = '" . $db->sql_escape($newname) . "', forum_last_poster_colour = '" . $db->sql_escape($gcl) . "'
			WHERE forum_last_poster_name = '" . $db->sql_escape($oldname) . "'";
		$db->sql_query($sql);

		// Update posts table
		$sql = 'UPDATE ' . POSTS_TABLE . '
			SET poster_id = ' . (int) $user_id . ", post_username = ''
			WHERE post_username = '" . $db->sql_escape($oldname) . "'";
		$db->sql_query($sql);

		// Update topics table (first post)
		$sql = 'UPDATE ' . TOPICS_TABLE . '
			SET topic_poster = ' . (int) $user_id . ", topic_first_poster_name = '" . $db->sql_escape($newname) . "', topic_first_poster_colour = '" . $db->sql_escape($gcl) . "'
			WHERE topic_first_poster_name = '" . $db->sql_escape($oldname) . "'";
		$db->sql_query($sql);

		// Update topics table (last post)
		$sql = 'UPDATE ' . TOPICS_TABLE . '
			SET topic_last_poster_id = ' . (int) $user_id . ", topic_last_poster_name = '" . $db->sql_escape($newname) . "', topic_last_poster_colour = '" . $db->sql_escape($gcl) . "'
			WHERE topic_last_poster_name = '" . $db->sql_escape($oldname) . "'";
		$db->sql_query($sql);

		// Update user post count
		$sql = 'SELECT COUNT(post_id) as post_cnt
			FROM ' . POSTS_TABLE . '
			WHERE poster_id = ' . (int) $user_id;
		$result		= $db->sql_query($sql);
		$post_cnt	= $db->sql_fetchfield('post_cnt', false, $result);
		$db->sql_freeresult($result);

		$sql = 'UPDATE ' . USERS_TABLE . ' SET user_posts = ' . $post_cnt . ' WHERE user_id = ' . (int) $user_id;
		$db->sql_query($sql);
	}

	/**
	* Redirect to the main page once there are conflicts
	* @param	Array $selected		The initial data
	* @param	Array $conflicted	Array containing the conflicting users
	* @return	void
	* @access	private
	*/
	function _redirect_conflicted($conflicted)
	{
		$conflicted_params = array_flip($conflicted);
		$conflicted_params = implode('&amp;conflicted%5B%5D', $conflicted_params);

		redirect(append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, 'c=usergroup&amp;t=restore_deleted_users&amp;conflicted%5B%5D=' . $conflicted_params));
		exit;
	}
}
