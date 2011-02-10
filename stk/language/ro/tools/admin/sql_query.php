<?php
/**
*
* @package Support Toolkit - SQL Query
* @version $Id: sql_query.php 277 2010-01-20 01:38:28Z iwisdom $
* @translate $Id: sql_query.php 277 2010-02-14 13:50:11 dorin $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'ERROR_QUERY'					=> 'Query-ul conţine o eroare',
	
	'NO_RESULTS'					=> 'Fără rezultate',
	'NO_SQL_QUERY'					=> 'Trebuie să introduceţi o secvenţă Query pentru a o rula',

	'QUERY_RESULT'					=> 'Rezultate Query',

	'SHOW_RESULTS'					=> 'Arată rezultatele',
	'SQL_QUERY'						=> 'Rulează SQL Query',
	'SQL_QUERY_EXPLAIN'				=> 'Introduceţi query-ul SQL care doriţi să fie rulat. Utilitarul va substitui "phpbb_" cu prefixul utilizat de tabelele propriei dumneavoastră bază de date.<br />Dacă opţiunea "Arată rezultatele" este activată, utilitarul va afişa rezultatele <em>(dacă este cazul)</em> ale interogării.',
	
	'SQL_QUERY_LEGEND'				=> 'SQL Query',
	'SQL_QUERY_SUCCESS'				=> 'Query-ul SQL a fost rulat cu succes!',

));

?>