<?php
/**
*
* @package Support Toolkit - Resync Avatars [Deutsch — Du]
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
	'RESYNC_ATTACHMENTS'			=> 'Dateianhänge synchronisieren',
	'RESYNC_ATTACHMENTS_CONFIRM'	=> 'Dieses Tool stellt sichter, dass für alle Dateianhänge in der Datenbank auch eine Datei auf dem Server existiert. Wenn die Datei fehlt, wird der Dateianhang aus der Datenbank entfernt. Bist du sicher, dass du den Vorgang fortsetzen möchtest?',
	'RESYNC_ATTACHMENTS_FINISHED'	=> 'Die Dateianhänge wurden erfolgreich synchronisiert!',
	'RESYNC_ATTACHMENTS_PROGRESS'	=> 'Die Synchronisierung der Dateianhänge wird durchgeführt. Bitte unterbreche diesen Vorgang nicht.',
));
