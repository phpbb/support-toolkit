<?php
/**
 *
 * @package Support Toolkit - Resync Attachments
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
class resync_attachments
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
		return 'RESYNC_ATTACHMENTS';
	}

	function run_tool()
	{
		global $config, $db, $template;

		$step	= request_var('step', 0);
		$begin	= $this->_batch_size * $step;

		// Get the batch
		$sql = 'SELECT attach_id, physical_filename
			FROM ' . ATTACHMENTS_TABLE;
		$result	= $db->sql_query_limit($sql, $this->_batch_size, $begin);
		$batch	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		if (empty($batch))
		{
			// Nothing to do
			trigger_error('RESYNC_ATTACHMENTS_FINISHED');
		}

		$delete_ids = array();
		foreach ($batch as $row)
		{
			// Does the file still exists?
			$path = PHPBB_ROOT_PATH . $config['upload_path'] . "/{$row['physical_filename']}";
			if (file_exists($path))
			{
				// Yes, next please!
				continue;
			}

			$delete_ids[] = $row['attach_id'];
		}

		// Run all the queries
		if (!empty($delete_ids))
		{
			$db->sql_query('DELETE FROM ' . ATTACHMENTS_TABLE . ' WHERE ' . $db->sql_in_set('attach_id', $delete_ids));
		}

		// Next step
		$template->assign_var('U_BACK_TOOL', false);
		meta_refresh(3, append_sid(STK_INDEX, array('c' => 'admin', 't' => 'resync_attachments', 'step' => ++$step, 'submit' => true)));
		trigger_error('RESYNC_ATTACHMENTS_PROGRESS');
	}
}
