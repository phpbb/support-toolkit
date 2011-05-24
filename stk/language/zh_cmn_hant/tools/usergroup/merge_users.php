<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> '合併會員',
	'MERGE_USERS_EXPLAIN'				=> '此工具移動某會員帳號轉入另一位會員帳號，來源會員的設定以及群組將被複製。包含會員權限、附加檔案、禁止、我的最愛、草稿、論壇/主題追蹤、論壇/主題訂閱、記錄、投票、文章、私訊、檢舉、主題、警告、好友以及黑名單。',

	'MERGE_USERS_BOTH_FOUNDERS'	=> '您不能合併創始者與非創始者。',
	'MERGE_USERS_BOTH_IGNORE'	=> '您不能合併機器人與一般會員。',

	'MERGE_USERS_MERGED'		=> '會員已經成功地合併.',

	'MERGE_USERS_REMOVE_SOURCE'			=> '移除來源會員',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> '如果勾選，那麼這個工具將自論壇刪除來源會員。',

	'MERGE_USERS_SAME_USERS'	=> '來源會員以及目標會員必須不同。',

	'MERGE_USERS_USER_SOURCE'			=> '來源會員',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> '將從這個會員的文章、私訊、權限、警告等，轉入目標會員，而會員群組以及個人設定，也將被複製。',

	'MERGE_USERS_USER_TARGET'	=> '目標會員',
));

?>