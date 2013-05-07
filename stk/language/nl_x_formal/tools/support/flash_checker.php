<?php
/**
 *
 * @package Support Toolkit - Flash checker
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'FLASH_CHECKER'				=> 'Flash-tester',
	'FLASH_CHECKER_CONFIRM'		=> 'In phpBB 3.0.7-PL1 is er een mogelijke XSS-kwetsbaarheid gevonden in de ingebouwde Flash-BBCode. Dit probleem is opgelost in phpBB 3.0.8. Dit hulpmiddel controleert alle berichten, privéberichten en onderschriften voor deze kwetsbare BBCode. Wanneer er een kwetsbare BBCode wordt gevonden laat dit script u automatisch het berichten opnieuw parsen zodat uw forum veilig is. Bekijk <a href="http://forum.phpbbservice.nl/viewtopic.php?f=10&amp;t=9088">de phpBB 3.0.8 uitgave mededeling</a> voor meer informatie over dit probleem.',
	'FLASH_CHECKER_FOUND'		=> 'De flash-tester heeft sommige mogelijke flash-BBCodes gevonden op uw forum. Klik <a href="%s">hier</a> om de berichten en privéberichten die deze flash-bbcode bevatten te herparsen.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Er zijn geen mogelijke gevaarlijke flash-BBCodes gevonden.',
));
