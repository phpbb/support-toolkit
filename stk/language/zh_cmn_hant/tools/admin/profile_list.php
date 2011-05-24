<?php
/**
*
* @package Support Toolkit - Profile List
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
	'ALL'					=> '所有的',

	'CLICK_TO_DELETE'		=> '點選這個按鈕，以刪除所有已選取的會員。<em>（無法復原！）</em>',

	'FILTER'				=> '過濾',

	'LIMIT'					=> '限制',

	'ONLY_NON_EMPTY'		=> '只有非空白',
	'ORDER_BY'				=> '排序方式',

	'PROFILE_LIST'			=> '個人資料列表',
	'PROFILE_LIST_EXPLAIN'	=> '一個顯示多個會員的個人資料資訊之工具。這個工具可以用來幫助鑑別廣告帳號。',

	'USERS_DELETE'				=> '刪除已選取的會員',
	'USERS_DELETE_CONFIRM'		=> '您確定要刪除已選取的會員嗎？由這個工具刪除會員<strong>將</strong>一併刪除其所有發表的文章！',
	'USERS_DELETE_SUCCESSFULL'	=> '所有已選取的會員已經刪除成功！',
));

?>