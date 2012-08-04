<?php
/**
*
* @package Support Toolkit - Make Founder
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
	'DEMOTE_FAILED'				=> '無法移除所有會員的創始者地位！',
	'DEMOTE_FOUNDERS'			=> '自創始者降級',
	'DEMOTE_SUCCESSFULL'		=> '已經成功地移除會員 %d 之創始者地位！',

	'FOUNDERS'					=> '具有創始者地位的會員',

	'MAKE_FOUNDER'				=> '讓會員成為論壇創始者',
	'MAKE_FOUNDER_CONFIRM'		=> '您確認要讓 <a href="%1$s">%2$s</a> 成為論壇創始者嗎？這將給 <a href="%1$s">%2$s</a> 有刪除您的帳號的能力，以及其他的權力。',
	'MAKE_FOUNDER_FAILED'		=> '無法升級這個會員為創始者',
	'MAKE_FOUNDER_SUCCESS'		=> '已經成功地讓會員 <a href="%1$s">%2$s</a> 成為論壇創始者。',
	'MANAGE_FOUNDERS'			=> '管理論壇創始者',

	'NO_FOUNDERS'				=> '沒有找到創始者',

	'PROMOTE_FOUNDER'			=> '升級為創始者',

	'USER_TO_FOUNDER'			=> '讓會員成為論壇創始者',
	'USER_TO_FOUNDER_EXPLAIN'	=> '輸入您想要升級為創始者的會員之會員名稱或會員 ID。',
));

?>