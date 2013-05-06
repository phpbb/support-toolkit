<?php
/**
*
* @package Support Toolkit - Make Founder
* @version $Id$
* @copyright (c) 2009 phpBB Group , 2013 http://www.phpBBservice.nl
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
	'BOTH_FIELDS_FILLED'		=> 'De velden gebruikersnaam en gebruikers-ID mogen beide niet ingevuld zijn.',

	'DEMOTE_FAILED'				=> 'Kon niet de oprichterstatus verwijderen van alle gebruikers!',
	'DEMOTE_FOUNDERS'			=> 'Oprichters degraderen',
	'DEMOTE_SUCCESSFULL'		=> 'De oprichterstatus is succesvol verwijderd van %d gebruikers!',

	'FOUNDERS'					=> 'Gebruikers met oprichterstatus',

	'MAKE_FOUNDER'				=> 'Een gebruiker een forumoprichter maken',
	'MAKE_FOUNDER_CONFIRM'		=> 'Weet u zeker dat u van <a href="%1$s">%2$s</a> een forumoprichter wilt maken? Dit geeft <a href="%1$s">%2$s</a> de mogelijkheid om uw account te verwijderen, samen met andere rechten.',
	'MAKE_FOUNDER_FAILED'		=> 'Kon deze gebruiker niet promoveren naar een oprichter.',
	'MAKE_FOUNDER_SUCCESS'		=> '<a href="%1$s">%2$s</a> is succesvol een forumoprichter gemaakt.',
	'MANAGE_FOUNDERS'			=> 'Forumoprichters beheren',
	
	'NO_FOUNDERS'				=> 'Er zijn geen oprichters gevonden',	

	'PROMOTE_FOUNDER'			=> 'Naar oprichter promoveren',
	
	'USER_NAME_TO_FOUNDER'			=> 'Gebruikersnaam die oprichter moet worden',
	'USER_NAME_TO_FOUNDER_EXPLAIN'	=> 'Voer de gebruikersnaam van de gebruiker in die u wenst forumoprichter te maken.',
	'USER_ID_TO_FOUNDER'			=> 'Gebruikers-ID die oprichter moet worden',
	'USER_ID_TO_FOUNDER_EXPLAIN'	=> 'Voer de gebruikers-ID van de gebruiker in die u wenst forumoprichter te maken.',
));

?>