<?php
/**
*
* @package Support Toolkit - Anonymous group check
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
	'ANONYMOUS_CLEANED'					=> 'Het profiel van de gastaccount is opgeschoond.',
	'ANONYMOUS_CORRECT'					=> 'De gastaccount bestaat al en is juist geconfigureerd.',
	'ANONYMOUS_CREATED'					=> 'De gastaccount is opnieuw aangemaakt.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Het was niet mogelijk om de gastaccount opnieuw aan te maken. Ga naar het supportforum op phpBB.com of op phpBBservice.nl voor verdere ondersteuning.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'De gastaccount is verwijderd van alle groepen.',
	'ANONYMOUS_MISSING'					=> 'De gastaccount ontbreekt.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'De gastaccount ontbreekt in uw database. Deze gebruiker wordt gebruikt door gasten die uw forum bezoeken. Wilt u een nieuwe aanmaken?',
	'ANONYMOUS_WRONG_DATA'				=> 'De profieldata van de gastaccount is onjuist.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'De profieldata van de gastaccount is deels onjuist. Wilt u dit repareren?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'De gastaccount behoort toe aan diverse gebruikersgroepen.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'De gastaccount behoort toe aan diverse gebruikersgroepen. Wilt u de gastaccount verwijderen van alle groepen behalve de “Gasten”-groep? ',

	'REDIRECT_NEXT_STEP'				=> 'U wordt doorgeleid naar de volgende stap.',

	'SANITISE_ANONYMOUS_USER'			=> 'Gastaccount opschonen',
));

?>