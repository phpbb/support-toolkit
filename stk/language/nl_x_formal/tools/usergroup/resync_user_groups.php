<?php
/**
*
* @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'Gebruikersgroepen hersynchroniseren',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Dit hulpmiddel is ontwikkeld om te controleren of alle gebruikers lid zijn van de correcte standaard groepen  <em>(Geregistreerde gebruikers, Geregistreerde COPPA gebruikers en de pas geregistreerde gebruikers)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Alle groepen blijken up-to-date te zijn!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Hersynchroniseer opties',
	'RUN_BOTH_FINISHED'				=> 'Alle gebruikersgroepen zijn succesvol hersynchroniseerd!',
	'RUN_RNR'						=> 'Pas geregistreerde gebruikers hersynchroniseren',
	'RUN_RNR_EXPLAIN'				=> 'Dit zal de "Pas geregistreerde gebruikers" groep bijwerken zodat het alle gebruikers bevat die overeenkomen met de opgegeven citeria in het beheerderspaneel.',
	'RUN_RNR_FINISHED'				=> 'De pas geregistreerde gebruikersgroep is succesvol hersynchroniseerd!',
	'RUN_RNR_NOT_FINISHED'			=> 'De pas geregistreerde gebruikersgroep is bezig met hersynchroniseren. Onderbreek dit proces niet!',
	'RUN_RR'						=> 'Geregistreerde gebruikers hersynchroniseren',
	'RUN_RR_EXPLAIN'				=> 'Dit hulpmiddel heeft bepaald dat niet alle gebruikers op uw forum lid zijn van de "Geregistreerde <em>(COPPA)</em> gebruikers" groep. Wilt u deze groepen hersynchroniseren?<br /><strong>Notitie:</strong> Wanneer je forum de COPPA heeft ingeschakeld, en een gebruiker heeft geen geboortedatum opgegeven, dan worden deze gebruikers geplaatst in de "Geregistreerde COPPAA gebruikers" groep!',
	'RUN_RR_FINISHED'				=> 'De gebruikers zijn succesvol gehersynchroniseerd!',

	'SELECT_RUN_GROUP'	=> 'Selecteer tenminste één groepstype dat gehersynchroniseerd moet worden.',
));
