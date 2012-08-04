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
	'ERROR_QUERY'					=> 'Query met de fout',

	'NO_RESULTS'					=> 'Geen resultaat',
	'NO_SQL_QUERY'					=> 'Je hebt nog geen uit te voeren Query opgegeven.',

	'QUERY_RESULT'					=> 'Query resultaat',

	'SHOW_RESULTS'					=> 'Resultaten laten zien',
	'SQL_QUERY'						=> 'SQL Query Uitvoeren',
	'SQL_QUERY_EXPLAIN'				=> 'Voer de uit te voeren SQL query in. Wanneer phpbb_ als prefix is opgegeven en deze niet voor je phpBB installatie wordt gebruikt, zal dit automatisch worden aangepast.<br />Vink "Resultaat Weergeven" aan indien je de resultaten <em>(indien beschikbaar)</em> van de query wilt laten weergeven.',

	'SQL_QUERY_LEGEND'				=> 'SQL Query',
	'SQL_QUERY_SUCCESS'				=> 'De SQL Query is succesvol uitgevoerd.',
));
