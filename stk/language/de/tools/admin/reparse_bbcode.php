<?php
/**
*
* @package Support Toolkit - Reparse BBCode [Deutsch — Du]
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
	'REPARSE_ALL'				=> 'Alle BBCodes neu verarbeiten',
	'REPARSE_ALL_EXPLAIN'		=> 'Wenn diese Option aktiviert ist, werden die BBCodes des kompltten Boards neu verarbeitet. Standardmäßig werden nur die BBCodes in Beiträgen, Privaten Nachrichten und Signaturen neu verarbeitet, die schon in der Vergangenheit von phpBB verarbeitet wurden. Diese Option wird ignoriert, wenn oben spezifische Beiträge oder Private Nachrichten angegeben wurden.',
	'REPARSE_BBCODE'			=> 'BBCodes neu verarbeiten',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBCodes wurden neu verarbeitet.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Bist du sicher, dass du alle BBCodes neu verarbeiten willst? Beachte, dass dieses Tool deine Datenbank auch beschädigen kann. <strong>Sichere daher deine Datenbank, bevor du fortfährst.</strong> Beachte bitte auch, dass dieses Tool einige Zeit zur Ausführung benötigen kann.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Schritt %1$d fertiggestellt. Fahre in Kürze mit Schritt %2$d fort…',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Die Verarbeitung der Beiträge wurde beendet. Es werden nun die Privaten Nachrichten verarbeitet.',
		2	=> 'Die Verarbeitung der Privaten Nachrichten wurde beendet. Es werden nun die Signaturen verarbeitet.',
	),
	'REPARSE_IDS_INVALID'			=> 'Die angegebenen IDs waren ungültig. Bitte stelle sicher, dass die IDs als kommagetrennte Liste (z.&nbsp;B. 1,2,3,5,8,13) angegeben werden.',
	'REPARSE_POST_IDS'				=> 'Spezifische Beiträge neu verarbeiten',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Um nur bestimmte Beiträge neu zu verarbeiten, gebe die IDs der Beiträge als kommagetrennte Liste an (z.&nbsp;B. 1,2,3,5,8,13).',
	'REPARSE_PM_IDS'				=> 'Spezifische Private Nachrichten neu verarbeiten',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Um nur bestimmte Private Nachrichten neu zu verarbeiten, gebe die IDs der Privaten Nachrichten als kommagetrennte Liste an (z.&nbsp;B. 1,2,3,5,8,13).',
));
