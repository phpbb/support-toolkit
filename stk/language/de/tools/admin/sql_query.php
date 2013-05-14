<?php
/**
*
* @package Support Toolkit - SQL Query [Deutsch — Du]
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Deutsche Übersetzung durch die Übersetzer-Gruppe von phpBB.de:
* siehe docs/README und http://www.phpbb.de/go/ubersetzerteam
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
	'ERROR_QUERY'					=> 'Fehlerhafte Abfrage',

	'NO_RESULTS'					=> 'Kein Ergebnis',
	'NO_SQL_QUERY'					=> 'Du musst eine Abfrage angeben, die ausgeführt werden soll.',

	'QUERY_RESULT'					=> 'Abfrage-Ergebnis',

	'SHOW_RESULTS'					=> 'Ergebnis anzeigen',
	'SQL_QUERY'						=> 'SQL-Befehl ausführen',
	'SQL_QUERY_EXPLAIN'				=> 'Gebe den SQL-Befehl ein, den du ausführen möchtest. Das Tool ersetzt „phpbb_“ mit dem Tabellen-Präfix deiner Installation.<br />Wenn die Option „Ergebnis anzeigen“ aktiviert ist, wird das Tool die Ergebnisse <em>(sofern vorhanden)</em> der Abfrage anzeigen.',

	'SQL_QUERY_LEGEND'				=> 'SQL-Befehl',
	'SQL_QUERY_SUCCESS'				=> 'Der SQL-Befehl wurde erfolgreich ausgeführt.',
));
