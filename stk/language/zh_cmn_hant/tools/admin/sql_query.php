<?php
/**
*
* @package Support Toolkit - SQL Query
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
	'ERROR_QUERY'					=> '查詢包含此錯誤',

	'NO_RESULTS'					=> '沒有結果',
	'NO_SQL_QUERY'					=> '您必須輸入一個查詢以執行。',

	'QUERY_RESULT'					=> '查詢結果',

	'SHOW_RESULTS'					=> '顯示結果',
	'SQL_QUERY'						=> '執行 SQL 查詢',
	'SQL_QUERY_EXPLAIN'				=> '輸入您想要的 SQL 查詢以運行。這個工具將以您的資料表字首取代「phpbb_」。<br />假如勾選「顯示結果」，那麼此工具將顯示 <em>(如果有的話)</em> 查詢的結果。',

	'SQL_QUERY_LEGEND'				=> 'SQL 查詢',
	'SQL_QUERY_SUCCESS'				=> 'SQL 查詢已經成功地運行。',
));

?>