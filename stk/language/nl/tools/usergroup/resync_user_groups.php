<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'Hersynchroniseer gebruikersgroepen',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Deze tool is ontworpen om te controleren of alle gebruikers lid zijn van de juiste standaard groepen <em>(Geregistreerde gebruikers, Geregistreerde COPPA-gebruikers en Nieuw geregistreerde gebruikers)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Alle groepen lijken up-to-date te zijn!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Hersynchoniseer opties',
	'RUN_BOTH_FINISHED'				=> 'Alle gebruikersgroepen zijn met succes opnieuw gesynchroniseerd!',
	'RUN_RNR'						=> 'Synchroniseer nieuw geregistreerde gebruikers opnieuw',
	'RUN_RNR_EXPLAIN'				=> 'Dit zal verwijderen/toevoegen alle gebruikers naar/van de “Nieuw geregistreerde gebruikers groep” volgens de instellingen van het beheerderspaneel.',
	'RUN_RNR_FINISHED'				=> 'De nieuw geregistreerde gebruikers groep is succesvol opnieuw gesynchroniseerd!',
	'RUN_RNR_NOT_FINISHED'			=> 'Hersynchronisatie van de nieuw geregistreerde gebruikers groep is bezig. Onderbreek dit proces alstublieft niet',
	'RUN_RR'						=> 'Hersynchroniseer geregistreerde gebruikers',
	'RUN_RR_EXPLAIN'				=> 'De tool heeft opgemerkt dat niet alle gebruikers van je forum lid zijn van de "Geregistreerde <em>(COPPA)</em> gebruikers" groep. Wil je deze groepen hersynchroniseren?<br /><strong>Let op:</strong> Als je COPPA hebt ingeschakeld en een gebruiker heeft zijn geboortedatum niet ingevuld, dan wordt deze geplaatst in de "Geregistreerde COPPA gebruikers" groep!',
	'RUN_RR_FINISHED'				=> 'De gebruikers zijn met succes opnieuw gesynchroniseerd!',

	'SELECT_RUN_GROUP'	=> 'Selecteer minimaal één type groep die je wil hersynchroniseren!',
));
