<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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

/**
* DO NOT CHANGE
*/
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
// í ª ì î Ö
//

$lang = array_merge($lang, array(
	'REPARSE_ALL' => 'Genfortolkning af alle BBkoder',
	'REPARSE_ALL_EXPLAIN' => 'Ved valg af denne vil BBkode-genfortolkningen analysere boardets samlede indhold. Som standard analyserer værktøjet kun indlæg/private beskeder og signaturer som tidligere er fortolket af phpBB. Denne option ignoreres hvis specifikke indlæg eller private beskeder er angivet ovenfor.',
	'REPARSE_BBCODE'			=> 'Genfortolkning af BBkode',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBkoder er genfortolket.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Er du sikker på at du ønsker analysering af alle anvendte BBkoder? Bemærk venligst at anvendelse af værktøjet kan være ødelæggende for din database. Husk derfor inden brug, at <strong>tage backup af databasen</strong>. Bemærk også at analysen kan tage nogen tid at gennemføre.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Trin %1$d fuldført. Fortsætter nu til trin %2$d...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Genfortolkning af indlæg afsluttet, fortsætter til private beskeder.',
		2	=> 'Genfortolkning af private beskeder afsluttet, fortsætter til signaturer.',
	),
	'REPARSE_IDS_INVALID'			=> 'De angivne IDs var ugyldige. Sørg venligst for indlæg-IDs indtastes kommasepareret (eks. 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Genfortolk specifikke indlæg',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'For at genfortolke bestemte indlæg, skal disse specificeres med indlæg-IDs i en kommasepareret liste.',
	'REPARSE_PM_IDS'				=> 'Genfortolk specifikke PBer',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'For at genfortolke bestemte private beskeder, skal disse specificeres med PB-IDs i en kommasepareret liste (eks. 1,2,3,5,8,13).',
));