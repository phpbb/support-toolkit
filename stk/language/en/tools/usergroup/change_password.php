<?php
/**
*
* @package Support Toolkit - Change Password
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
	'CHANGE_PASSWORD'			=> 'Change Password',
	'CHANGE_PASSWORD_EXPLAIN'	=> 'Change a user’s password.<br /><strong>You may enter either the Username or User ID, not both.</strong>',
	'CHANGE_PASSWORD_SUCCESS'	=> 'The password for <a href="%s">%s</a> has been successfully changed.',

	'FIELDS_NOT_FILLED'			=> 'One field must be filled in.',
	'FIELDS_BOTH_FILLED'		=> 'Only one field may be filled in.',

	'PASSWORD_CONFIRM'			=> 'Re-Enter Password',

	'USERNAME_NAME'				=> 'Username',
	'USERNAME_NAME_EXPLAIN'		=> 'Enter the Username of the user whose password you want to change.',
	'USERNAMEID'				=> 'User ID',
	'USERNAMEID_EXPLAIN'		=> 'Enter the User ID of the user whose password you want to change.',
));
