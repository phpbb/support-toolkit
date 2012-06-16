<?php
/**
*
* @package Support Toolkit - Change Password
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
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
	'CHANGE_PASSWORD'			=> 'Ændring af kodekord',
	'CHANGE_PASSWORD_EXPLAIN'	=> 'Ændring af brugeres kodeord.<br /><strong>Du kan angive enten brugernavn eller bruger-ID, ikke begge dele.</strong>',
	'CHANGE_PASSWORD_SUCCESS'	=> 'Kodeord for <a href="%s">%s</a> er blevet ændret.',

	'FIELDS_NOT_FILLED'			=> 'Et af felterne skal udfyldes.',
	'FIELDS_BOTH_FILLED'		=> 'Kun et af felterne må udfyldes.',

	'PASSWORD_CONFIRM'			=> 'Bekræft kodeord',

	'USERNAME_NAME'				=> 'Brugernavn',
	'USERNAME_NAME_EXPLAIN'		=> 'Angiv brugernavn for den bruger du vil ændre kodeord for.',
	'USERNAMEID'				=> 'Brugers ID',
	'USERNAMEID_EXPLAIN'		=> 'Angiv bruger-ID for den bruger du vil ændre kodeord for.',
));