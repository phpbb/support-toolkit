<?php
/**
*
* @package Support Tool Kit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ADMIN_TOOLS'						=> 'Admin Tools',
	'SUPPORT_TOOL_KIT'					=> 'Support Tool Kit',
	'SUPPORT_TOOL_KIT_INDEX'				=> 'Support Tool Kit Index',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Password',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Since you are not logged in to phpBB3 you must verify that you are the board owner by entering the Support Tool Kit Password.<br /><br /><strong>Cookies MUST be allowed by your browser or you will not be able to stay logged in.</strong>',
	'STK_LOGOUT'						=> 'STK Logout',
	'STK_LOGOUT_SUCCESS'				=> 'You have successfully logged out from the Support Tool Kit.',

	'BACK_TOOL'							=> 'Back to last Tool',
	'BOARD_FOUNDER_ONLY'				=> 'Only Board Founders may access the Support Tool Kit.',

	'DEV_TOOLS'							=> 'Developer Tools',

	'INCORRECT_CLASS'					=> 'Incorrect class in: stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'Password is incorrect',
	'INCORRECT_PHPBB_VERSION'			=> 'Your version of phpBB isn\'t compatible with this tool. Make sure that you are running phpBB version: %1$s, in order to run this tool',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'This tool is trying to load a not existing file: %1$s',
	'TOOL_NAME'							=> 'Tool Name',

	'USER_GROUP_TOOLS'					=> 'User/Group Tools',
));

?>