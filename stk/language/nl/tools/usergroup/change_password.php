<?php
/**
*
* @package Support Toolkit - Change Password
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
	'CHANGE_PASSWORD'			=> 'Wachtwoord Wijzigen',
	'CHANGE_PASSWORD_EXPLAIN'	=> 'Wijzig het wachtwoord van een gebruiker. Je kan hier de gebruikersnaam of gebruikers-id invullen, niet beiden',
	'CHANGE_PASSWORD_SUCCESS'	=> 'Het wachtwoord van <a href="%s">%s</a> is met succes gewijzigd.',
	'FIELDS_NOT_FILLED'			=> 'Een veld moet ingevuld worden.',
	'FIELDS_BOTH_FILLED'		=> 'Je kan maar een veld invullen.',

	'PASSWORD_CONFIRM'			=> 'Wachtwoord nogmaals invoeren',

	'USERNAME_NAME'				=> 'Gebruikersnaam',
	'USERNAME_NAME_EXPLAIN'		=> 'Vul de gebruikersnaam van de gebruiker in waarvan je het wachtwoord wilt wijzigen.',
	'USERNAMEID'				=> 'Gebruikers-ID',
	'USERNAMEID_EXPLAIN'		=> 'Vul het gebruikers ID van de gebruiker in waarvan je het wachtwoord wilt wijzigen.',
	));
