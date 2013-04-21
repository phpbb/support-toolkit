<?php
/**
*
* @package Support Toolkit - Resynchronise Registered users groups [Deutsch — Sie]
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
	'RESYNC_USER_GROUPS'			=> 'Benutzergruppen synchronisieren',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Dieses Tool dient dazu, zu prüfen, ob alle Benutzer Mitglied der richtigen Standard-Gruppe sind. <em>(Registrierte Benutzer, Registrierte COPPA-Benutzer und Kürzlich registrierte Benutzer)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Alle Gruppen scheinen aktuell zu sein!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Synchronisations-Optionen',
	'RUN_BOTH_FINISHED'				=> 'Alle Benutzergruppen wurden erfolgreich synchronisert!',
	'RUN_RNR'						=> 'Neu registrierte Benutzer synchronisieren',
	'RUN_RNR_EXPLAIN'				=> 'Dadurch wird die Gruppe „Kürzlich registrierte Benutzer“ aktualisiert, so dass alle Benutzer dieser Gruppe zugeordnet sind, die den Kriterien entsprechen, die im Administrations-Bereich festgelegt wurden.',
	'RUN_RNR_FINISHED'				=> 'Die Gruppe für kürzlich registrierte Benutzer wurde erfolgreich synchronisiert!',
	'RUN_RNR_NOT_FINISHED'			=> 'Die Gruppe für kürzlich registrierte Benutzer wird synchronisiert. Bitte unterbrechen Sie diesen Prozess nicht.',
	'RUN_RR'						=> 'Registrierte Benutzer synchronisieren',
	'RUN_RR_EXPLAIN'				=> 'Das Tool hat festgestellt, dass nicht alle Benutzer des Boards Mitglied der Gruppe „Registrierte <em>(COPPA-)</em>Benutzer“ sind. Möchten Sie, dass diese Gruppen synchronisiert werden?<br /><strong>Hinweis:</strong> Wenn COPPA in Ihrem Board aktiviert ist und der Benutzer kein Geburtsdatum angegeben hat, so wird er der Gruppe „Registrierte COPPA-Benutzer“ hinzugefügt!',
	'RUN_RR_FINISHED'				=> 'Die Benutzer wurden erfolgreich synchronisiert!',

	'SELECT_RUN_GROUP'	=> 'Bitte wählen Sie mindestens eine Gruppe aus, die synchronisiert werden soll.',
));
