<?php
/**
*
* @package Support Toolkit - Auto Cookies
* @version $Id$
* @copyright (c) 2010 phpBB Group
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

class erk
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $template, $user;

		// This is kinda like the main page
		// Output the main page
		page_header($user->lang['SUPPORT_TOOL_KIT']);

		// Category title and desc if available
		$template->assign_vars(array(
			'L_TITLE'			=> $user->lang['CAT_ERK'],
			'L_TITLE_EXPLAIN'	=> user_lang('CAT_ERK_EXPLAIN', append_sid(STK_ROOT_PATH . 'erk.' . PHP_EXT)),
		));

		$template->set_filenames(array(
			'body' => 'index_body.html',
		));

		page_footer();
	}
}
