<?php
/**
*
* @package Support Toolkit - Change Password
* @version $Id: change_password.php 281 2010-02-28 18:31:31Z Raimon $
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
	'CHANGE_PASSWORD'			=> 'Wachtwoord wijzigen',
	'CHANGE_PASSWORD_EXPLAIN'	=> 'Wijzig het wachtwoord van een gebruiker.',
	'CHANGE_PASSWORD_SUCCESS'	=> 'Het wachtwoord voor <a href="%s">%s</a> is succesvol gewijzigd.',

	'PASSWORD_CONFIRM'			=> 'Wachtwoord herinvoeren',

	'USERNAMEID'				=> 'Gebruikersnaam of gebruikers-ID',
	'USERNAMEID_EXPLAIN'		=> 'Voer hier de gebruikersnaam of het gebruikers-ID in, van de gebruiker waarvan u het wachtwoord wilt wijzigen.',
));

?>