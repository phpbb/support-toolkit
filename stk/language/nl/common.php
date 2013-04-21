<?php
/**
*
* @package Support Toolkit
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
	'BACK_TOOL'							=> 'Terug naar de vorige Tool',
	'BOARD_FOUNDER_ONLY'				=> 'Alleen beheerders hebben toegang tot de Support Toolkit.',

	'CAT_ADMIN'							=> 'Beheerder Tools',
	'CAT_ADMIN_EXPLAIN'					=> 'De “beheerders tools” kunnen worden gebruikt door een beheerder voor diverse onderdelen van het forum te beheren en veel voorkomende problemen op te lossen.',
	'CAT_DEV'							=> 'Ontwikkelaar Tools',
	'CAT_DEV_EXPLAIN'					=> 'De “ontwikkelaar tools” kunnen worden gebruikt door phpBB ontwikkelaars en MODers om veel voorkomende taken uit te voeren.',
	'CAT_ERK'							=> 'Emergency Repair Kit',
	'CAT_ERK_EXPLAIN'					=> 'De emergency repair kit is een apart pakket van de STK dat gemaakt is om sommige controles te doorlopen om fouten te detecteren in je phpBB installatie, welke mogelijk een goede werking verhinderd. Klik <a href="%s">hier</a> om de ERK te starten.',
	'CAT_MAIN'							=> 'Begin',
	'CAT_MAIN_EXPLAIN'					=> 'De Support Toolkit (STK), is een pakket dat kan worden gebruikt voor het herstellen van phpBB 3.0.x installaties, of voor het verhelpen van problemen binnen een bestaande installatie. Het pakket bevat een tweede ACP dat eenvoudig op een werkend phpBB 3 forum kan worden geïnstalleerd en heeft het uiterlijk en gemak van het gebruikelijke phpBB 3 ACP, maar geeft de beheerder toegang tot een geheel nieuwe serie tools die kunnen worden gebruikt in het geval dat een phpBB3.0.x installatie niet meer naar behoren functioneert.',
	'CAT_SUPPORT'						=> 'Ondersteuning Tools',
	'CAT_SUPPORT_EXPLAIN'				=> 'De ondersteuning tools, zijn tools die worden gebruikt voor het herstellen van bepaalde onderdelen van een phpBB 3.0.x installatie.',
	'CAT_USERGROUP'						=> 'Gebruiker/Groep Tools',
	'CAT_USERGROUP_EXPLAIN'				=> 'Deze categorie bevat tools die op gebruikers en groepen zijn gericht.',
	'CONFIG_NOT_FOUND'					=> 'Het STK configuratiebestand kon niet worden geladen. Kijk a.u.b. de installatie na.',

	'DOWNLOAD_PASS'						=> 'Download het wachtwoordbestand.',

	'EMERGENCY_LOGIN_NAME'				=> 'STK Calamiteiten Login',
	'ERK'								=> 'Emergency Repair Kit',

	'FAIL_REMOVE_PASSWD'				=> 'Kon het verlopen wachtwoordbestand niet verwijderen. Verwijder dit bestand handmatig!',

	'GEN_PASS_FAILED'					=> 'Er ging iets mis tijdens het aanmaken van het wachtwoordbestand. Maak een nieuwe aan.',
	'GEN_PASS_FILE'						=> 'Wachtwoordbestand Aanmaken.',
	'GEN_PASS_FILE_EXPLAIN'				=> 'Indien je helemaal niet meer op je phpBB forum kunt inloggen, kun je de ingebouwde authenticatiemethode van de Support Toolkit gebruiken. Om deze methode te kunnen gebruiken, moet je een nieuw <a href="%s"><strong>wachtwoordbestand aanmaken</strong></a>.',

	'INCORRECT_CLASS'					=> 'Onjuiste class in: stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'Wachtwoord is onjuist',
	'INCORRECT_PHPBB_VERSION'			=> 'Deze tool ondersteunt jouw versie van phpBB niet. Om deze tool te kunnen gebruiken moet je phpBB versie %1$s hebben.',

	'LOGIN_STK_SUCCESS'					=> 'Je bent succesvol aangemeld en wordt nu doorgestuurd naar de Support Toolkit.',

	'NOTICE'							=> 'Opmerking',
	'NO_VERSION_FILE'					=> 'De Support Toolkit(STK) kon de laatste versie niet achterhalen. Bezoek de <a href="http://www.phpbb.com/support/stk/">Support Toolkit website van phpBB.com</a> en controleer voordat je verder gaat of je de laatste versie hebt.',
    'REQUEST_PHPBB_VERSION'				=> 'Selecteer phpBB versie',
    'REQUEST_PHPBB_VERSION_EXPLAIN'		=> 'De Support Toolkit (STK) kon jouw phpBB versie niet achterhalen, selecteer de juiste versie voordat je verder gaat.<br />Dit kan betekenen dat jouw forumbestanden en forumversie inconsistent zijn, waarschijnlijk door een niet succesvol afgemaakte update. Bezoek de <a href="http://www.phpbb.nl/forums/viewforum.php?f=40">supportforums</a> voor hulp bij dit probleem.',

	'PASS_GENERATED'					=> 'Je STK wachtwoordbestand is aangemaakt!<br/>Het gegenereerde wachtwoord is: <em>%1$s</em><br />Dit wachtwoord zal op: <span style="text-decoration: underline;">%2$s</span> verlopen. Daarna <strong>moet</strong> je een nieuw wachtwoordbestand aanmaken om van deze functie gebruik te kunnen blijven maken!<br /><br />Gebruik de button om het bestand te downloaden. Vervolgens dien je het naar de server in de "stk" map te uploaden.',
	'PASS_GENERATED_REDIRECT'			=> 'Als je het wachtwoordbestand in de juiste map hebt geplaatst, klik dan <a href="%s">hier</a> om naar de inlogpagina te gaan.',
	'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Deze tool ondersteunt jouw versie van phpBB niet.',
	'PROCEED_TO_STK'					=> '%sGa door naar de Support Toolkit%s',

	'STK_FOUNDER_ONLY'					=> 'Je moet jezelf opnieuw identificeren, alvorens de Support Toolkit te kunnen gebruiken.',
	'STK_LOGIN'							=> 'Support Toolkit Login',
	'STK_LOGIN_WAIT'					=> 'Je mag slechts 1 inlogpoging per 3 seconden doen. Probeer het nogmaals.',
	'STK_LOGOUT'						=> 'STK Afmelden',
	'STK_LOGOUT_SUCCESS'				=> 'Je bent nu van de Support Toolkit afgemeld.',
	'STK_NON_LOGIN'						=> 'Aanmelden bij de STK.',
	'STK_OUTDATED'						=> 'Je lijkt een verouderde versie van de Support Toolkit te gebruiken. De laatste versie is <strong style="color: #008000;">%1$s</strong> en jij gebruikt versie <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Wegens de krachtige functies van deze tool, is deze nu uitgeschakeld totdat er een update is uitgevoerd. We adviseren je dringend om alle software op je server up to date te houden. Voor meer informatie betreffende de laatste update, bezoek het <a href="%3$s">release topic</a>.',
	'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
	'SUPPORT_TOOL_KIT_INDEX'			=> 'Support Toolkit Startpagina',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Wachtwoord',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Omdat je niet op phpBB3 ben ingelogd, moet je jezelf als beheerder aanmelden bij de Support Toolkit.<br /><br /><strong>Cookies MOETEN door je browser worden toegestaan om ingelogd te blijven.</strong>',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'Het volgende bestand kon niet worden gevonden: %1$s',
	'TOOL_NAME'							=> 'Tool Naam',
	'TOOL_NOT_AVAILABLE'				=> 'De opgevraagde tool is niet beschikbaar!',

	'USING_STK_LOGIN'					=> 'Je bent ingelogd via de ingebouwde STK authenticatiemethode. Het wordt aangeraden om deze methode <strong>alleen</strong> te gebruiken als je niet meer op phpBB kunt inloggen.<br />Klik <a href="%1$s">hier</a> om deze authenticatiemethode uit te schakelen.',
));
