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
		global $db;

		$conflicted = request_var('conflicted', array(0 => 0));

		// Find all guest posters
		if (empty($conflicted))
		{
			$var = 'post';
			$sql = 'SELECT post_id, post_username
				FROM ' . POSTS_TABLE . '
				WHERE poster_id = ' . ANONYMOUS . '
					GROUP BY post_username';
			$title = 'RESTORE_DELETED_USERS';
			$type = 'checkbox';
		}
		else
		{
			$var = 'conflicted';
			$sql = 'SELECT post_id, post_username
				FROM ' . POSTS_TABLE . '
				WHERE ' . $db->sql_in_set('post_id', $conflicted);
			$title = 'RESTORE_DELETED_USERS_CONFLICT';
			$type = 'text:40:255';
		}
		$result	= $db->sql_query($sql);
		$users	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		// Build the output
		$user_vars = array();
		foreach ($users as $user)
		{
			$user_vars["{$var}[{$user['post_id']}]"] = array('lang' => $user['post_username'], 'explain' => false, 'type' => $type);
		}

		// Return usable data
		return array(
			'title'	=> $title,
			'vars'	=> array_merge(array(
				'legend1'	=> 'SELECT_USERS',
			), $user_vars),
		);
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

		if (isset($_REQUEST['post']))
		{
			// Get the selected users
			$posts = request_var('post', array(0 => ''));
			if (empty($posts))
			{
				$error[] = 'NO_USER_SELECTED';
				return;
			}

			// Get all the selected usernames
			$selected = '';
			$sql = 'SELECT post_id, post_username
				FROM ' . POSTS_TABLE . '
				WHERE ' . $db->sql_in_set('post_id', array_keys($posts));
			$result		= $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				$selected[$row['post_id']] = $row['post_username'];
			}
			$db->sql_freeresult($result);

			// Conflicted names are users that already exist
			$selected_clean = $selected;
			foreach ($selected_clean as $i => $s)
			{
				$selected_clean[$i] = utf8_clean_string($s);
			}

			$sql = 'SELECT username
				FROM ' . USERS_TABLE . '
				WHERE ' . $db->sql_in_set('username_clean', $selected_clean);
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				$conflicted[] = $row['username'];
			}
			$db->sql_query($result);

			// Go through the non-users and add them
			$non_conflicted = array_diff($selected, $conflicted);

			foreach ($non_conflicted as $user)
			{
				$this->_add_user_and_update_data($user, $user);
			}

			// If there are conflicted names kick the user back to step 1
			if (!empty($conflicted))
			{
				$selected = array_flip($selected);
				$conflicted_params = array();

				foreach ($conflicted as $conflict)
				{
					$conflicted_params[] = $selected[$conflict];
				}
				$conflicted_params = implode('&amp;conflicted%5B%5D', $conflicted_params);

				redirect(append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, 'c=usergroup&amp;t=restore_deleted_users&amp;conflicted%5B%5D=' . $conflicted_params));
				exit;
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
			$conflicted_clean = array();
			foreach ($conflicted as $i => $s)
			{
				$conflicted_clean[$i] = utf8_clean_string($s);
			}
			$still_conflicted = array();
			$sql = 'SELECT username
				FROM ' . USERS_TABLE . '
				WHERE ' . $db->sql_in_set('username_clean', $conflicted_clean);
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				$still_conflicted[] = $row['username'];
			}
			$db->sql_query($result);

			// Go through the non-users and add them
			$non_conflicted = array_diff($conflicted, $still_conflicted);

			// Fix all non conflicted
			foreach ($non_conflicted as $post_id => $newname)
			{
				$this->_add_user_and_update_data($original[$post_id], $newname);
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
	* Add a user with the name $user to phpBB and update all entries in the database to reflect this
	* @param string $oldname The name that was used when making the guest posts
	* @param string $newname The name that will be used for the new user
	* @return void
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
		$sql = 'UPDATE ' . FORUMS_TABLE . "
			SET forum_last_poster_id = {$user_id}, forum_last_poster_name = '{$newname}', forum_last_poster_colour = '{$gcl}'
			WHERE forum_last_poster_name = '{$oldname}'";
		$db->sql_query($sql);

		// Update posts table
		$sql = 'UPDATE ' . POSTS_TABLE . "
			SET poster_id = {$user_id}, post_username = ''
			WHERE post_username = '{$oldname}'";
		$db->sql_query($sql);

		// Update topics table (first post)
		$sql = 'UPDATE ' . TOPICS_TABLE . "
			SET topic_poster = {$user_id}, topic_first_poster_name = '{$newname}', topic_first_poster_colour = '{$gcl}'
			WHERE topic_first_poster_name = '{$oldname}'";
		$db->sql_query($sql);

		// Update topics table (last post)
		$sql = 'UPDATE ' . TOPICS_TABLE . "
			SET topic_last_poster_id = {$user_id}, topic_last_poster_name = '{$newname}', topic_last_poster_colour = '{$gcl}'
			WHERE topic_last_poster_name = '{$oldname}'";
		$db->sql_query($sql);

		// Update user post count
		$sql = 'SELECT COUNT(post_id) as post_cnt
			FROM ' . POSTS_TABLE . '
			WHERE poster_id = ' . $user_id;
		$result		= $db->sql_query($sql);
		$post_cnt	= $db->sql_fetchfield('post_cnt', false, $result);
		$db->sql_freeresult($result);

		$sql = 'UPDATE ' . USERS_TABLE . ' SET user_posts = ' . $post_cnt . ' WHERE user_id = ' . $user_id;
		$db->sql_query($sql);
	}
}
?>