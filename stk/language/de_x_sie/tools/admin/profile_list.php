<?php
/**
*
* @package Support Toolkit - Profile List [Deutsch — Sie]
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
	'ALL'					=> 'Alle',

	'CLICK_TO_DELETE'		=> 'Durch einen Klick auf diese Schaltfläche werden alle markierten Benutzer gelöscht. <em>(Kann nicht rückgängig gemacht werden)</em>',

	'FILTER'				=> 'Filter',

	'LIMIT'					=> 'Limit',

	'ONLY_NON_EMPTY'		=> 'Keine Leeren',
	'ORDER_BY'				=> 'Sortierung',

	'PROFILE_LIST'			=> 'Profil-Informationen',
	'PROFILE_LIST_EXPLAIN'	=> 'Dieses Tool zeigt Profilinformationen für mehrere Benutzer an. Es kann hilfreich sein, um Benutzerkonten von Spammern zu finden.',

	'USERS_DELETE'				=> 'Markierte Benutzer löschen',
	'USERS_DELETE_CONFIRM'		=> 'Sind Sie sich sicher, dass Sie die markierten Benutzer löschen wollen? Wenn Benutzer über dieses Tool gelöscht werden, werden auch <strong>immer</strong> alle Beiträge dieser Benutzer gelöscht!',
	'USERS_DELETE_SUCCESSFULL'	=> 'Alle markierten Benutzer wurden erfolgreich gelöscht!',
));
