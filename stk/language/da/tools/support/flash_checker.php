<?php
/**
 *
 * @package Support Toolkit - Flash checker
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @translated by Olympus DK Team
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
	'FLASH_CHECKER'				=> 'Flash-kontrol',
	'FLASH_CHECKER_CONFIRM'		=> 'Der blev fundet en mulig XSS-sårbarhed i den indbyggede flash-BBkode i phpBB 3.0.7-pl1. Denne er rettet i phpBB 3.0.8. Dette værktøj i stand til at kontrollere alle indlæg, private beskeder og signaturer for denne sårbare BBkode. Findes BBkoden på boardet, får du mulighed for hurtigt at genfortolke indlæggende og dermed sikre at dit board er opdateret sikkerhedsmæssigt. Læs mere information om tilfældet i bekendtgørelsen om <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">phpBB 3.0.8 frigivelsen</a>.',
	'FLASH_CHECKER_FOUND'		=> 'Flash-kontrollen fandt nogle potentielt farlige flash-BBkoder på dit board. Klik <a href="%s">her</a> for at genfortolke indlæg og private beskeder indeholdende denne BBkode.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Ingen potentielt farlige flash-BBkoder fundet.',
));
