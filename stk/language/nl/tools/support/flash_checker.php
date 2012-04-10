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
	'FLASH_CHECKER'				=> 'Flash checker',
	'FLASH_CHECKER_CONFIRM'		=> 'In phpBB 3.0.7-pl1 is een mogelijke XSS-lek gevonden in de ingebouwde flash BBCode. Dit probleem is opgelost in phpBB 3.0.8. Deze tool controleert alle berichten, privéberichten en handtekeningen op deze kwetsbare BBCode. Indien gevonden is het mogelijk om deze berichten snel te herparsen om er zeker van te zijn dat je forum veilig is. Lees <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">de phpBB 3.0.8 release mededeling</a> voor meer informatie over dit probleem.',
	'FLASH_CHECKER_FOUND'		=> 'De flash checker heeft mogelijk gevaarlijke flash bbcodes gevonden op jouw forum. Klik <a href="%s">hier</a> om de berichten en privéberichten te herparsen die deze flash BBCode bevat.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Geen mogelijk gevaarlijke flash bbcodes gevonden.',
));
