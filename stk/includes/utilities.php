<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * STK Utilities
 *
 * Class containing some utility methods
 */
abstract class stk_includes_utilities
{
	/**
	 * Replacement for the phpBB page header function
	 */
	static public function page_header($page_title = '')
	{
		global $template, $toolbox, $user;
		global $SID, $_SID;

		if (defined('HEADER_INC'))
		{
			return;
		}

		define('HEADER_INC', true);

		$template->assign_vars(array(
			'PAGE_TITLE'			=> $page_title,
			'USERNAME'				=> $user->data['username'],

			'SID'					=> $SID,
			'_SID'					=> $_SID,
			'SESSION_ID'			=> $user->session_id,
			'ROOT_PATH'				=> STK_WEB_PATH,

			'S_USER_LANG'			=> $user->lang['USER_LANG'],
			'S_CONTENT_DIRECTION'	=> $user->lang['DIRECTION'],
			'S_CONTENT_ENCODING'	=> 'UTF-8',
			'S_CONTENT_FLOW_BEGIN'	=> ($user->lang['DIRECTION'] == 'ltr') ? 'left' : 'right',
			'S_CONTENT_FLOW_END'	=> ($user->lang['DIRECTION'] == 'ltr') ? 'right' : 'left',
		));

		// Assign the categories to the template
		foreach ($toolbox->getToolboxCategories() as $category)
		{
			$template->assign_block_vars('t_block1', array(
				'L_TITLE'		=> $user->lang(strtoupper($category->getName() . '_TITLE')),
				'U_TITLE'		=> $category->getCategoryURL(),
				'S_SELECTED'	=> $category->isActive(),
			));
		}

		// Assign the left navigation
		if ($toolbox->getActiveCategory()->getToolCount() > 0)
		{
			foreach ($toolbox->getActiveCategory()->getToolList() as $tool)
			{
				$template->assign_block_vars('l_block1', array(
					'L_TITLE'		=> $user->lang($tool->getToolLanguageString()),
					'U_TITLE'		=> $tool->getToolURL(),
					'S_SELECTED'	=> $tool->isActive(),
				));
			}
		}

		// application/xhtml+xml not used because of IE
		header('Content-type: text/html; charset=UTF-8');

		header('Cache-Control: private, no-cache="set-cookie"');
		header('Expires: 0');
		header('Pragma: no-cache');

		return;
	}

	/**
	 * Replacement for the phpBB page footer function
	 */
	static public function page_footer($tpl_file)
	{
		global $db, $template;
		global $starttime;

		$mtime = microtime(true);
		$totaltime = $mtime - $starttime;

		$debug_output = sprintf('Time : %.3fs | ' . $db->sql_num_queries() . ' Queries | GZIP : ' . (($config['gzip_compress']) ? 'On' : 'Off') . (($user->load) ? ' | Load : ' . $user->load : ''), $totaltime);

		if (function_exists('memory_get_peak_usage'))
		{
			$memory_usage = memory_get_peak_usage();
			$memory_usage = get_formatted_filesize($memory_usage);
			$debug_output .= ' | Peak Memory Usage: ' . $memory_usage;
		}

		$template->assign_vars(array(
			'DEBUG_OUTPUT'		=> $debug_output,
			'TRANSLATION_INFO'	=> (!empty($user->lang['TRANSLATION_INFO'])) ? $user->lang['TRANSLATION_INFO'] : '',
			'T_JQUERY_LINK'		=> PHPBB_FILES . "assets/javascript/jquery.js",
		));

		$template->set_filenames(array(
			'body' => basename($tpl_file, '.html') . '.html',
		));

		$template->display('body');

		garbage_collection();
		exit_handler();
	}

	/**
	 * Build Confirm box
	 * @param boolean $check True for checking if confirmed (without any additional parameters) and false for displaying the confirm box
	 * @param string $title Title/Message used for confirm box.
	 *		message text is _CONFIRM appended to title.
	 *		If title cannot be found in user->lang a default one is displayed
	 *		If title_CONFIRM cannot be found in user->lang the text given is used.
	 * @param string $hidden Hidden variables
	 * @param string $html_body Template used for confirm box
	 * @param string $u_action Custom form action
	 *
	 * @author phpBB group
	 */
	function confirm_box($check, $title = '', $hidden = '', $html_body = 'confirm_body.html', $u_action = '')
	{
		global $user, $template, $db, $request;

		if (isset($_POST['cancel']))
		{
			return false;
		}

		$confirm = ($user->lang['YES'] === $request->variable('confirm', '', true, phpbb_request_interface::POST));

		if ($check && $confirm)
		{
			$user_id = $request->variable('confirm_uid', 0, false, phpbb_request_interface::POST);
			$session_id = $request->variable('sess', '', false, phpbb_request_interface::POST);
			$confirm_key = $request->variable('confirm_key', '', false, phpbb_request_interface::POST);

			if ($user_id != $user->data['user_id'] || $session_id != $user->session_id || !$confirm_key || !$user->data['user_last_confirm_key'] || $confirm_key != $user->data['user_last_confirm_key'])
			{
				return false;
			}

			// Reset user_last_confirm_key
			$sql = 'UPDATE ' . USERS_TABLE . "
				SET user_last_confirm_key = ''
				WHERE user_id = " . $user->data['user_id'];
			$db->sql_query($sql);

			return true;
		}
		else if ($check)
		{
			return false;
		}

		$s_hidden_fields = build_hidden_fields(array(
			'confirm_uid'	=> $user->data['user_id'],
			'sess'			=> $user->session_id,
			'sid'			=> $user->session_id,
		));

		// generate activation key
		$confirm_key = gen_rand_string(10);

		self::page_header($user->lang($title));


		// If activation key already exist, we better do not re-use the key (something very strange is going on...)
		if ($request->variable('confirm_key', ''))
		{
			// This should not occur, therefore we cancel the operation to safe the user
			return false;
		}

		// re-add sid / transform & to &amp; for user->page (user->page is always using &)
		$use_page = ($u_action) ? $u_action : STK_WEB_PATH . str_replace('&', '&amp;', $user->page['page']);
		$u_action = reapply_sid($use_page);
		$u_action .= ((strpos($u_action, '?') === false) ? '?' : '&amp;') . 'confirm_key=' . $confirm_key;

		$template->assign_vars(array(
			'MESSAGE_TITLE'		=> $user->lang($title),
			'MESSAGE_TEXT'		=> (!isset($user->lang[$title . '_CONFIRM'])) ? $title : $user->lang($title . '_CONFIRM'),

			'YES_VALUE'			=> $user->lang('YES'),
			'S_CONFIRM_ACTION'	=> $u_action,
			'S_HIDDEN_FIELDS'	=> $hidden . $s_hidden_fields
		));

		$sql = 'UPDATE ' . USERS_TABLE . "
			SET user_last_confirm_key = '" . $db->sql_escape($confirm_key) . "'
			WHERE user_id = " . $user->data['user_id'];
		$db->sql_query($sql);

		self::page_footer($html_body);
	}
}
