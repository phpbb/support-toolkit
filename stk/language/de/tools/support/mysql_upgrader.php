<?php
/**
*
* @package Support Toolkit - MySQL Upgrader [Deutsch — Du]
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Deutsche Übersetzung durch die Übersetzer-Gruppe von phpBB.de:
* siehe docs/README und https://www.phpbb.de/go/ubersetzerteam
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
	'MYSQL_UPGRADER'					=> 'MySQL-Upgrade-Tool',
	'MYSQL_UPGRADER_BACKUP'				=> 'Dieses Tool ist gefährlich. Stelle sicher, dass du ein Backup deiner Datenbank erstellt hast, bevor du es verwendest!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Dieses Tool löst verschiedene Probleme, die auftreten, wenn die von deiner phpBB-Version verwendete MySQL-Datenbank aktualisiert wird. Diese Aktualisierung kann dazu führen, dass das Schema der Datenbank inkompatibel mit der neuen Version ist. <em>Weitere Informationen sind im Artikel „<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn’t have a default value errors</a>“ der Knowledge Base beschrieben (<a href="https://www.phpbb.de/kb/no_default">Deutsche Version</a>).</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Download',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Wenn diese Option ausgewählt wird, wird das MySQL-Upgrade-Tool die erforderlichen Abragen erstellen und anzeigen. Du kannst das Ergebnis als Datei herunterladen.',
	'MYSQL_UPGRADER_RESULT'				=> 'Diese Abfragen müssen ausgeführt werden, um das Datenbank-Schema für die aktuell verwendete MySQL-Version zu aktualisieren. <a href="%s">Hier</a> können die Abfragen als .sql-Datei heruntergeladen werden.',
	'MYSQL_UPGRADER_RUN'				=> 'Ausführen',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Wenn diese Option ausgewählt wird, wird das MySQL-Upgrade-Tool die erforderlichen Abfragen erstellen und diese automatisch auf deine Datenbank anwenden.<br />Dieser Vorgang kann einige Zeit dauern, unterbrich ihn <strong>nicht</strong>, bevor das Tool dir mitteilt, dass es fertig ist.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'MySQL-Upgrade-Script',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'Das MySQL-Upgrade-Tool wurde erfolgreich ausgeführt',
	
	'QUERY_FINISHED'	=> 'Abfrage %1$d von %2$d erfolgreich durchgeführt. Fahre mit dem nächsten Schritt fort.',

	'TOOL_MYSQL_ONLY'	=> 'Dieses Tool steht nur zur Verfügung, wenn MySQL als Datenbank verwendet wird',
));
