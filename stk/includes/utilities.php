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

		// @todo remove. Only for development purpose
		$template->assign_vars(array(
			'S_CONTENT_DIRECTION'	=> 'ltr',
			'S_USER_LANG'			=> 'en',
		));

		// Assign the categories to the template
		foreach ($toolbox->getToolboxCategories() as $category)
		{
			$template->assign_block_vars('t_block1', array(
				'L_TITLE'		=> $user->lang('CAT_' . strtoupper($category->getName())),
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
}
