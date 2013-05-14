<?php
/**
*
* @package Support Toolkit - Update email hashes [Deutsch — Sie]
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
	'UPDATE_EMAIL_HASHES'				=> 'E-Mail-Hash-Codes aktualisieren',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'In phpBB-Versionen vor phpBB 3.0.7 führt ein Wechsel von einem 32-bit- zu einem 64-bit-Betriebssystem zu ungültigen E-Mail-Hash-Codes. <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">Details im zugehörigen Bug-Tracker-Eintrag (Englisch)</a>)</em><br />Dieses Tool ermöglicht eine Aktualisierung der E-Mail-Hash-Codes, so dass sie problemlos funktionieren.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'Alle E-Mail-Hash-Codes wurden erfolgreich aktualisiert!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'Die Aktualisierung der E-Mail-Hash-Codes wird durchgeführt.',
));
