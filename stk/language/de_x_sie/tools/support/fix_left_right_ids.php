<?php
/**
*
* @package Support Toolkit - Fix Left/Right ID's [Deutsch — Sie]
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
	'FIX_LEFT_RIGHT_IDS'			=> 'Links-/Rechts-IDs korrigieren',
	'FIX_LEFT_RIGHT_IDS_CONFIRM'	=> 'Sind Sie sicher, dass Sie die Links-/Rechts-IDs korrigieren wollen?<br /><br /><strong>Sichern Sie die Datenbank, bevor Sie das Tool starten!</strong>',

	'LEFT_RIGHT_IDS_FIX_SUCCESS'	=> 'Die Links-/Rechts-IDs wurden erfolgreich korrigiert.',
	'LEFT_RIGHT_IDS_NO_CHANGE'		=> 'Das Tool hat alle Links-/Rechts-IDs überprüft. Alle IDs waren richtig, so dass keine Korrektur vorgenommen werden musste.',
));
