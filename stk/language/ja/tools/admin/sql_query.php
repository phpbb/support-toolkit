<?php
/**
*
* @package Support Toolkit - SQL Query
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
    'ERROR_QUERY'					=> 'Query containing the error',

    'NO_RESULTS'					=> '結果なし',
    'NO_SQL_QUERY'					=> 'クエリを入力してください',

	'QUERY_RESULT'					=> 'クエリ結果',

	'SHOW_RESULTS'					=> '結果表示',
	'SQL_QUERY'						=> 'SQLクエリ',
	'SQL_QUERY_EXPLAIN'				=> '実行したい SQLクエリ を入力してください。"phpbb_" は自動的にご利用の phpBB3 のテーブル接頭辞に置換されます。<br />チェックボックス "結果表示" をチェックした場合、<em>（ もしあれば ）</em> クエリ結果が表示されます。',

	'SQL_QUERY_LEGEND'				=> 'SQLクエリ',
	'SQL_QUERY_SUCCESS'				=> 'クエリの実行に成功しました',
));
