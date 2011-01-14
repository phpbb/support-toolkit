<?php
/**
 *
 * @package Support Toolkit - Resync Avatars
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

/**@#+
 * Some modes
 */
define ('RESYNC_USER_AVATARS', 1);
define ('RESYNC_GROUP_AVATARS', 2);
/**@#-*/

/**
 * Make sure that all avatars on the forum actually have a file
 */
class resync_avatars
{
	/**
	 * The number of users tested per run
	 * @var Integer
	 */
	var $_batch_size = 500;

	/**
	 * Options
	 * @return String
	 */
	function display_options()
	{
		return 'RESYNC_AVATARS';
	}

	function run_tool()
	{
		global $config, $db, $template;

		$mode	= request_var('mode', RESYNC_USER_AVATARS);
		$step	= request_var('step', 0);
		$begin	= $this->_batch_size * $step;

		// Get the batch
		switch ($mode)
		{
			case RESYNC_GROUP_AVATARS :
				$sql = 'SELECT group_id as id, group_avatar as avatar, group_avatar_type as avatar_type
					FROM ' . GROUPS_TABLE . '
					WHERE ' . $db->sql_in_set('group_avatar_type', array(AVATAR_UPLOAD, AVATAR_GALLERY));
			break;

			case RESYNC_USER_AVATARS :
				$sql = 'SELECT user_id as id, user_avatar as avatar, user_avatar_type as avatar_type
					FROM ' . USERS_TABLE . '
					WHERE ' . $db->sql_in_set('user_avatar_type', array(AVATAR_UPLOAD, AVATAR_GALLERY));
			break;
		}
		$result	= $db->sql_query_limit($sql, $this->_batch_size, $begin);
		$batch	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		if (empty($batch))
		{
			// Switch to the next mode if needed
			if ($mode != RESYNC_GROUP_AVATARS)
			{
				$template->assign_var('U_BACK_TOOL', false);
				meta_refresh(3, append_sid(STK_INDEX, array('c' => 'admin', 't' => 'resync_avatars', 'step' => 0, 'mode' => RESYNC_GROUP_AVATARS, 'submit' => true)));
				trigger_error('RESYNC_AVATARS_NEXT_MODE');
			}

			// Nothing to do
			trigger_error('RESYNC_AVATARS_FINISHED');
		}

		$update_sql = array();
		foreach ($batch as $row)
		{
			// Does teh file still exists?
			$path	= '';
			if ($row['avatar_type'] == AVATAR_UPLOAD)
			{
				// Group avatars are handled slightly different
				if (isset($row['avatar'][0]) && $row['avatar'][0] === 'g')
				{
					$avatar_group = true;
					$user['avatar'] = substr($row['avatar'], 1);
				}

				$ext		= substr(strrchr($row['avatar'], '.'), 1);
				$filename	= (int) $row['avatar'];
				$path		= PHPBB_ROOT_PATH . $config['avatar_path'] . '/' . $config['avatar_salt'] . '_' . ((isset($avatar_group)) ? 'g' : '') . $filename . '.' . $ext;
			}
			else if ($row['avatar_type'] == AVATAR_GALLERY)
			{
				$path	= PHPBB_ROOT_PATH . $config['avatar_gallery_path'] . "/{$row['avatar']}";
			}

			if (file_exists($path))
			{
				// It's here :)
				continue;
			}

			// Create the update queries
			switch ($mode)
			{
				case RESYNC_GROUP_AVATARS :
					$update_sql[] = 'UPDATE ' . GROUPS_TABLE . '
						SET group_avatar = \'\',
							group_avatar_type = 0,
							group_avatar_width = 0,
							group_avatar_height = 0
							WHERE group_id = ' . (int) $row['id'];
				break;

				case RESYNC_USER_AVATARS :
					$update_sql[] = 'UPDATE ' . USERS_TABLE . '
						SET user_avatar = \'\',
							user_avatar_type = 0,
							user_avatar_width = 0,
							user_avatar_height = 0
							WHERE user_id = ' . (int) $row['id'];
				break;
			}
		}

		// Run all the queries
		if (!empty($update_sql))
		{
			foreach ($update_sql as $sql)
			{
				$db->sql_query($sql);
			}
		}

		// Next step
		$template->assign_var('U_BACK_TOOL', false);
		meta_refresh(3, append_sid(STK_INDEX, array('c' => 'admin', 't' => 'resync_avatars', 'step' => ++$step, 'submit' => true)));
		trigger_error('RESYNC_AVATARS_PROGRESS');
	}
}
