<?php
/**
*
* @package Support Toolkit - Make Founder
* @version $Id$
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
	'BOTH_FIELDS_FILLED'		=> 'De velden Gebruikersnaam en gebruikers-ID mogen niet beiden ingevuld worden.',
	'DEMOTE_FAILED'				=> 'Niet gelukt om de eigenaarstatus van alle gebruikers te herstellen!',
	'DEMOTE_FOUNDERS'			=> 'Eigenaar(s) degraderen',
	'DEMOTE_SUCCESSFULL'		=> 'De eigenaarstatus is van %d gebruikers afgenomen!',

	'FOUNDERS'					=> 'Gebruikers met eigenaarstatus',

	'MAKE_FOUNDER'				=> 'Een gebruiker de eigenaarstatus geven',
	'MAKE_FOUNDER_CONFIRM'		=> 'Weet je zeker dat je <a href="%1$s">%2$s</a> als eigenaar wilt instellen? Hiermee geef je <a href="%1$s">%2$s</a> tevens de mogelijkheid om jouw account te verwijderen, alsmede meerdere rechten.',
	'MAKE_FOUNDER_FAILED'		=> 'Niet gelukt om deze gebruiker tot eigenaar te maken.',
	'MAKE_FOUNDER_SUCCESS'		=> 'Gelukt om <a href="%1$s">%2$s</a> eigenaar te maken.',
	'MANAGE_FOUNDERS'			=> 'Eigenaren Beheren',

	'NO_FOUNDERS'				=> 'Geen eigenaren gevonden',

	'PROMOTE_FOUNDER'			=> 'Eigenaar maken',

	'USER_NAME_TO_FOUNDER'			=> 'Gebruikersnaam om eigenaar te maken',
	'USER_NAME_TO_FOUNDER_EXPLAIN'	=> 'Voer de gebruikersnaam van de gebruiker in die je eigenaar wilt maken.',
	'USER_ID_TO_FOUNDER'			=> 'Gebruikers-ID om eigenaar te maken',
	'USER_ID_TO_FOUNDER_EXPLAIN'	=> 'Voer de gebruikers-ID van de gebruiker in die je eigenaar wilt maken.',
));
