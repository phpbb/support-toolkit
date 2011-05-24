<?php
/**
*
* @package Support Toolkit - Change Password
* @version $Id$
* @copyright (c) 2009 phpBB-TW (心靈捕手) http://phpbb-tw.net/phpbb/
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
	'CHANGE_PASSWORD'			=> '改變密碼',
	'CHANGE_PASSWORD_EXPLAIN'	=> '改變會員的密碼。',
	'CHANGE_PASSWORD_SUCCESS'	=> '<a href="%s">%s</a> 的密碼已經成功地改變。',

	'PASSWORD_CONFIRM'			=> '重新輸入密碼',

	'USERNAMEID'				=> '會員名稱或會員 ID',
	'USERNAMEID_EXPLAIN'		=> '輸入您想要改變密碼的會員之會員名稱或會員 ID。',
));

?>