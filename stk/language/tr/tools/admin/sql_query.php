<?php
/**
*
* @package Support Toolkit - SQL Query
* @version $Id: sql_query.php 277 2010-01-20 01:38:28Z iwisdom $
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
	'ERROR_QUERY'					=> 'Sorgu hata içeriyor',

	'NO_RESULTS'					=> 'Hiç bir Sonuç yok',
	'NO_SQL_QUERY'					=> 'Çalıştırmak için bir sorgu girmelisiniz',

	'QUERY_RESULT'					=> 'Sorgu sonuçları',

	'SHOW_RESULTS'					=> 'Sonuçları Göster',
	'SQL_QUERY'						=> 'SQL Sorgusunu Çalıştır',
	'SQL_QUERY_EXPLAIN'				=> 'Çalıştırmak istediğiniz SQL sorgusunu girin. Bu araç "phpbb_" tablo önekini kullanacaktır.<br />Eğer "Sonuçları Göster" seçeneği işaretli ise araç, sorgunun sonuçlarını <em>(eğer mevcutsa)</em> gösterecektir.',
	
	'SQL_QUERY_LEGEND'				=> 'SQL Sorgusu',
	'SQL_QUERY_SUCCESS'				=> 'SQL sorgusu başarıyla çalıştırıldı.',
));
