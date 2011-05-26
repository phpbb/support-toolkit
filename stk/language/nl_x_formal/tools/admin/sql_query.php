<?php
/**
*
* @package Support Toolkit - SQL Query
* @version $Id: sql_query.php 325 2010-10-17 20:54:48Z Raimon $
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
	'ERROR_QUERY'					=> 'De query bevat de volgende fout',

	'NO_RESULTS'					=> 'Geen resultaten',
	'NO_SQL_QUERY'					=> 'U moet een query invoeren',

	'QUERY_RESULT'					=> 'Query resultaten',

	'SHOW_RESULTS'					=> 'Resultaten weergeven',
	'SQL_QUERY'						=> 'SQL-query uitvoeren',
	'SQL_QUERY_EXPLAIN'				=> 'Voer de SQL-query in die u wilt uitvoeren. Het hulpmiddel zal de “phpbb_” prefix vervangen met de prefix die u gebruikt.',
	
	'SQL_QUERY_LEGEND'				=> 'SQL-query',
	'SQL_QUERY_SUCCESS'				=> 'De SQL-query is uitgevoerd.',
));

?>