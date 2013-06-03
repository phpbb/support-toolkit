<?php
/**
*
* @package Support Toolkit - Flash checker [Deutsch — Du]
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
	'FLASH_CHECKER'				=> 'Flash-Prüfung',
	'FLASH_CHECKER_CONFIRM'		=> 'In phpBB 3.0.7-pl1 wurde eine Verwundbarkeit durch Cross-Site Scripting entdeckt, die den in phpBB enthalten Flash-BBCodes betrifft. Dieses Problem wurde in phpBB 3.0.8 beseitigt. Dieses Tool prüft alle Beiträge, Private Nachrichten und Signaturen auf dieses verwundbare BBCode. Sollten welche gefunden werden, so können die betroffenen Beiträge neu verarbeitet werden, damit dein Board wieder sicher ist. Mehr Informationen zu dieser Verwundbarkeit können in der <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">Bekanntmachung zur Veröffentlichung (Release announcement) von phpBB 3.0.8 (Englisch)</a> gefunden werden.',
	'FLASH_CHECKER_FOUND'		=> 'Die Flash-Prüfung hat potentiell gefährliche Flash-BBCodes in deinem Board gefunden. Klicke <a href="%s">hier</a>, um die Beiträge und Private Nachrichten neu zuverarbeiten, die den Flash-BBCode beinhalten.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Es wurden keine potentiell gefährlichen Flash-BBCodes gefunden.',
));
