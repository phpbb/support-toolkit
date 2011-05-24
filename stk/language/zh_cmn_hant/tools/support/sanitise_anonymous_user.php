<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> '匿名使用者的個人資料已經成功地安全化。',
	'ANONYMOUS_CORRECT'					=> '匿名使用者存在，而且組態設定正確！',
	'ANONYMOUS_CREATED'					=> '重新建立已經成功地重新建立。',
	'ANONYMOUS_CREATION_FAILED'			=> '重新建立重新建立是不可能的。請到 phpBB.com 支援論壇請求進一步的援助。',
	'ANONYMOUS_GROUPS_REMOVED'			=> '匿名使用者已經成功地自所有使用的群組中移除。',
	'ANONYMOUS_MISSING'					=> '找不到匿名使用者。',
	'ANONYMOUS_MISSING_CONFIRM'			=> '在您的資料庫找不到匿名使用者。這個使用者被使用來允許訪客拜訪您的論壇。您想要建立新的匿名使用者嗎？',
	'ANONYMOUS_WRONG_DATA'				=> '匿名使用者的個人資料是不正確的。',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> '匿名使用者的部分個人資料是不正確的。您想要修補它嗎？',
	'ANONYMOUS_WRONG_GROUPS'			=> '匿名使用者不正確地屬於多個會員群組。',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> '匿名使用者不正確地屬於多個會員群組。您想要移除匿名使用者自所有的 (除了「訪客」) 群組中嗎？',

	'REDIRECT_NEXT_STEP'				=> '您正在進入下一個步驟。',

	'SANITISE_ANONYMOUS_USER'			=> '安全化匿名使用者',
));

?>