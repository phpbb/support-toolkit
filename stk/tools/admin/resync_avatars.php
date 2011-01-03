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

		$step	= request_var('step', 0);
		$begin	= $this->_batch_size * $step;

		// Get the batch
		$sql = 'SELECT user_id, user_avatar, user_avatar_type
			FROM ' . USERS_TABLE . '
			WHERE ' . $db->sql_in_set('user_avatar_type', array(AVATAR_UPLOAD, AVATAR_GALLERY));
		$result	= $db->sql_query_limit($sql, $this->_batch_size, $begin);
		$batch	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		if (empty($batch))
		{
			// Nothing to do
			trigger_error('RESYNC_AVATARS_FINISHED');
		}

		$update_sql = array();
		foreach ($batch as $user)
		{
			// Does teh file still exists?
			$path	= '';
			if ($user['user_avatar_type'] == AVATAR_UPLOAD)
			{
				$ext		= substr(strrchr($user['user_avatar'], '.'), 1);
				$filename	= (int) $user['user_avatar'];
				$path		= PHPBB_ROOT_PATH . $config['avatar_path'] . '/' . $config['avatar_salt'] . '_' . $filename . '.' . $ext;
			}
			else if ($user['user_avatar_type'] == AVATAR_GALLERY)
			{
				$path	= PHPBB_ROOT_PATH . $config['avatar_gallery_path'] . "/{$user['user_avatar']}";
			}

			if (file_exists($path))
			{
				// It's here :)
				continue;
			}

			// Reset the database
			$update_sql[] = 'UPDATE ' . USERS_TABLE . "
			SET user_avatar = '',
				user_avatar_type = 0,
				user_avatar_width = 0,
				user_avatar_height = 0
				WHERE user_id = {$user['user_id']}";	
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
