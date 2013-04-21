<?php
/**
*
* @package Support Toolkit - Merge Users [Deutsch — Du]
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Benutzer zusammenführen',
	'MERGE_USERS_EXPLAIN'				=> 'Tool, um die Elemente eines Benutzers auf einen anderen Benutzer zu übertragen; die Einstellungen und Gruppenmitgliedschaften des Ursprungs-Benutzers werden kopiert. Die übertragenen Elemente umfassen benutzerspezifische Berechtigungen, Dateianhänge, Sperren, Lesezeichen, Entwürfe, Benachrichtigungen, ungelesene Beiträge, Log-Einträge, Abstimmungen, Beiträge, Private Nachrichten, Meldungen, Themen, Verwarnungen, Freunde und ignorierte Benutzer.<br /><strong>Du musst entweder den Benutzernamen oder die ID des Benutzers angeben.</strong>',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'Du kannst keinen Gründer mit einem Nicht-Gründer zusammenführen.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Du kannst keinen Bot mit einem normalen Benutzer zusammenfürhen.',

	'MERGE_USERS_MERGED'		=> 'Benutzer erfolgreich zusammengeführt.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Ursprungs-Benutzer entfernen',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Wenn aktiviert, wird der Ursprungs-Benutzer gelöscht.',

	'MERGE_USERS_SAME_USERS'	=> 'Der Ursprungs- und der Ziel-Benutzer müssen unterschiedlich sein.',

	'MERGE_USERS_USER_SOURCE_NAME'			=> 'Ursprungs-Benutzer (Benutzername)',
	'MERGE_USERS_USER_SOURCE_ID'			=> 'Ursprungs-Benutzer (ID)',
	'MERGE_USERS_USER_SOURCE_NAME_EXPLAIN'	=> 'Beiträge, Private Nachrichten, Berechtigungen, Verwarnungen usw. dieses Benutzers werden auf den Ziel-Benutzer übertragen; Gruppenmitgliedschaften und Benutzereinstellungen werden kopiert.',

	'MERGE_USERS_USER_TARGET_NAME'	=> 'Ziel-Benutzer (Benutzername)',
	'MERGE_USERS_USER_TARGET_ID'	=> 'Ziel-Benutzer (ID)',

	'NO_SOURCE_USER'		=> 'Der angegebene Ursprungs-Benutzer existiert nicht',
	'NO_TARGET_USER'		=> 'Der angegebene Ziel-Benutzer existiert nicht',

	'BOTH_SOURCE_USER'		=> 'Fülle nur ein Feld für den Ursprungs-Benutzer aus.',
	'BOTH_TARGET_USER'		=> 'Fülle nur ein Feld für den Ziel-Benutzer aus.',
));
