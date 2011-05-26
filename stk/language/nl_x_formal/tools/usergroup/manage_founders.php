<?php
/**
*
* @package Support Toolkit - Make Founder
* @version $Id: manage_founders.php 326 2010-10-17 20:59:38Z Raimon $
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

	'USER_TO_FOUNDER'			=> 'Gebruiker die oprichter moet worden',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'Voer de gebruikersnaam of het gebruikers-ID in van de gebruiker die u wilt die een forumoprichter moet worden.',
));

?>