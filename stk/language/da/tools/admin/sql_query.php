<?php
/**
*
* @package Support Toolkit - SQL Query
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
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
	'ERROR_QUERY'          => 'Fejlen er indeholdt i forespørgslen',

	'NO_RESULTS'					=> 'Ingen resultater',
	'NO_SQL_QUERY'					=> 'Du skal angive en forespørgsel der skal udføres.',

	'QUERY_RESULT'					=> 'Forespørgslens resultater',

	'SHOW_RESULTS'					=> 'Vis resultater',
	'SQL_QUERY'						=> 'Foretag SQL-forespørgsel',
	'SQL_QUERY_EXPLAIN'				=> 'Angiv den SQL-forespørgsel du ønsker at udføre. Værktøjet erstatter præfixet phpbb_,  med det der faktisk anvendes i din database.<br />Er "Vis resultater" valgt, vises forespørgslens resultater - <em>(hvis der er nogen)</em>.',

	'SQL_QUERY_LEGEND'				=> 'SQL-forespørgsel',
	'SQL_QUERY_SUCCESS'				=> 'SQL-forespørgslen er foretaget.',
));
