<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'Het profiel van het gastaccount is opgeschoond.',
	'ANONYMOUS_CORRECT'					=> 'Het gastaccount is aanwezig en is correct ingesteld!',
	'ANONYMOUS_CREATED'					=> 'Het gastaccount is opnieuw aangemaakt en ingesteld.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Het is niet gelukt om het gastaccount opnieuw aan te maken. Ga voor hulp naar het phpBB.com Support Forum.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'Het gastaccount is uit alle groepen verwijderd.',
	'ANONYMOUS_MISSING'					=> 'Het gastaccount ontbreekt.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'Het gastaccount is niet meer aanwezig in de database. Dit account wordt gebruikt om bezoekers toegang te geven tot het forum. Wil je nu een nieuwe aanmaken?',
	'ANONYMOUS_WRONG_DATA'				=> 'De profieldata van het gastaccount is onjuist.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'De profieldata van het gastaccount is deels onjuist. Wil je dit nu herstellen?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Het gastaccount is ten onrechte lid van diverse groepen.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Het gastaccount is ten onrechte lid van diverse groepen. Wil je dit account uit alle groepen, m.u.v. de groep "GASTEN" verwijderen?',

	'REDIRECT_NEXT_STEP'				=> 'Je wordt doorgestuurd naar de volgende stap.',

	'SANITISE_ANONYMOUS_USER'			=> 'Gastaccount opschonen',
));
