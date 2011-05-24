<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'					=> 'MySQL 升級器',
	'MYSQL_UPGRADER_BACKUP'				=> '這個工具有潛在地危險；執行前請確認已經備份您的資料庫！',
	'MYSQL_UPGRADER_EXPLAIN'			=> '這個工具目的在解決當您的 MySQL 資料庫升級時，所引起的某些問題。升級將導致資料庫結構與新版本不相容。<em>請參考「<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">沒有預設值的錯誤</a>」之 KB 文章。</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> '下載',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> '透過這個選項的檢查，MySQL 升級器將產生查詢以及顯示結果給您，您可以從那裡去下載結果的檔案。',
	'MYSQL_UPGRADER_RESULT'				=> '以下是必須運行以升級資料庫結構到正確版本的查。按 <a href="%s">這裡</a> 去下載一個 .sql 檔案。',
	'MYSQL_UPGRADER_RUN'				=> '運行',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> '透過這個選項的檢查，MySQL 升級器將產生查詢以及在您的資料庫自動地運行其結果。<br />這將花些時間，請 <strong>不要</strong> 中斷這個過程，直到此工具通知您它好了。its ready.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'MySQL 升級 script',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'MySQL 升級器已成功地運行！',
	
	'QUERY_FINISHED'	=> '已完成運行查詢 %2$d 的 %1$d，正在繼續下一步。',

	'TOOL_MYSQL_ONLY'	=> '這個工具只適用於使用 MySQL DBMS。',
));

?>