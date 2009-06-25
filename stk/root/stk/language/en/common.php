<?php
/**
*
* @package Support Toolkit
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
	'BACK_TOOL'							=> 'Back to last Tool',
	'BOARD_FOUNDER_ONLY'				=> 'Only Board Founders may access the Support Toolkit.',

	'CAT_ADMIN'							=> 'Admin Tools',
	'CAT_ADMIN_EXPLAIN'					=> 'The tools within this category are tools that can be used by the administrator to perform tasks that don’t ship with a vanilla phpBB 3.0.x installation.',
	'CAT_DEV'							=> 'Developer Tools',
	'CAT_DEV_EXPLAIN'					=> 'The "developer tools" are tools that can be used by phpBB developers.',
	'CAT_MAIN'							=> 'Main',
	'CAT_MAIN_EXPLAIN'					=> 'The Support Toolkit, or STK, is a package that can be used to recover phpBB 3.0.x installations, or fix common issues within a working installation. The package is a second ACP that can be easily installed on any working phpBB 3 board, and has the look and feel of the phpBB 3 ACP, but gives the administrator access to a whole new set of tools that can be used in cases where phpBB might not function correctly anymore.',
	'CAT_SUPPORT'						=> 'Support Tools',
	'CAT_SUPPORT_EXPLAIN'				=> 'The support tools are tools that are used to fix or recover certain parts of a phpBB 3.0.x installation.',
	'CAT_USER_GROUP'					=> 'User/Group Tools',
	'CAT_USER_GROUP_EXPLAIN'			=> 'This category contains tools that are focused on users and groups',
	'CONFIG_NOT_FOUND'					=> 'The STK configuration file couldn’t be loaded. Please check your installation',

	'DOWNLOAD_PASS'						=> 'Download the password file.',

	'EMERGENCY_LOGIN_NAME'				=> 'STK Emergency login',

	'FAIL_REMOVE_PASSWD'				=> 'Couldn’t remove the expired password file. Please remove this file manually!',

	'GEN_PASS_FAILED'					=> 'Something went wrong during the generation of the password file. Please re-generate a new one.',
	'GEN_PASS_FILE'						=> 'Generate password file.',
	'GEN_PASS_FILE_EXPLAIN'				=> 'If you aren’t able to login to phpBB at all you can use the internal authentication method of the support Toolkit. To use this method you must <a href="%s"><strong>generate</strong></a> a new password file.',

	'INCORRECT_CLASS'					=> 'Incorrect class in: stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'Password is incorrect',
	'INCORRECT_PHPBB_VERSION'			=> 'Your version of phpBB isn’t compatible with this tool. Make sure that you are running phpBB version: %1$s, in order to run this tool',

	'LOGIN_STK_SUCCESS'					=> 'You have successfully authenticated and will now be redirected to the Support Toolkit.',

	'NOTICE'							=> 'Notice',

	'PASS_GENERATED'					=> 'Your STK password file was successfully generated!<br/>The password that was generated for you is: <em>%1$s</em><br />This password will expire on: <span style="text-decoration: underline;">%2$s</span>, after this time you <strong>must</strong> generate a new file in order to keep using the emergency login feature!<br /><br />Use the following button to download the file. Once you’ve downloaded this file you must upload it to your server into the "stk" directory',
	'PASS_GENERATED_REDIRECT'			=> 'Once you have uploaded the password file to the correct location, click <a href="%s">here</a> to go back to the login page.',
	'PROCEED_TO_STK'					=> '%sProceed to the Support Toolkit%s',

	'STK_FOUNDER_ONLY'					=> 'You must re-authenticate yourself before you can use the Support Toolkit!',
	'STK_LOGIN'							=> 'Support Took Kit Login',
	'STK_LOGIN_WAIT'					=> 'You can only attempt one login every 3 seconds, please try again.',
	'STK_LOGOUT'						=> 'STK Logout',
	'STK_LOGOUT_SUCCESS'				=> 'You have successfully logged out from the Support Toolkit.',
	'STK_NON_LOGIN'						=> 'Login to access the STK.',
	'STK_OUTDATED'						=> 'Your Support Toolkit installation appears to be out of date. The latest available version is <strong style="color: #008000;">%1$s</strong>, while the version your have installed is <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Due to the large impact of this tool on your phpBB installation, it has been disabled until an update is performed. We strongly recommend keeping all software running on your server up to date. For more information regarding the latest update, please see the <a href="%3$s">release topic</a>.',
	'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
	'SUPPORT_TOOL_KIT_INDEX'			=> 'Support Toolkit Index',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Password',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Since you are not logged in to phpBB3 you must verify that you are the board owner by entering the Support Toolkit Password.<br /><br /><strong>Cookies MUST be allowed by your browser or you will not be able to stay logged in.</strong>',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'This tool is trying to load a file that does not exist: %1$s',
	'TOOL_NAME'							=> 'Tool Name',

	'USING_STK_LOGIN'					=> 'You are logged in using the internal STK authentication method. It is advised to <strong>only</strong> use this method when you are unable to login to phpBB.<br />To disable this authentication method click <a href="%1$s">here</a>.',
));

?>