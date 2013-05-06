<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2009 phpBB Group , 2013 www.phpBBservice.nl
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
   'BACK_TOOL'							=> 'Terug naar het laatste hulpmiddel',
   'BOARD_FOUNDER_ONLY'					=> 'Alleen forumoprichters hebben toegang tot de Support Toolkit.',

   'CAT_ADMIN'							=> 'Beheerdershulpmiddelen',
   'CAT_ADMIN_EXPLAIN'					=> 'Beheerdershulpmiddelen kunnen gebruikt worden door alle beheerders om diverse delen van het forum te beheren en om de meest voorkomende problemen op te lossen.',
   'CAT_DEV'							=> 'Ontwikkelingshulpmiddelen',
   'CAT_DEV_EXPLAIN'					=> 'Ontwikkelingshulpmiddelen kunnen gebruikt worden door ontwikkelaars en MODers om de meest voorkomende taken uit te voeren.',
   'CAT_ERK'							=> 'Nood repareergereedschap',
   'CAT_ERK_EXPLAIN'					=> 'Het nood repareergereedschap is een appart pakket van de STK dat is gemaakt om sommige controles uit te voeren die fouten kan ontdekken met u phpBB-installatie, wat voorkomt dat je forum ploteseling stopt met werken. Klik <a href="%s">hier</a> om de ERK (nood repareergereedschap) uit te voeren.',
   'CAT_MAIN'							=> 'Algemeen',
   'CAT_MAIN_EXPLAIN'					=> 'De Support Toolkit (STK) kan worden gebruikt om de meest voorkomende problemen op te lossen met een werkende installatie van phpBB 3.0.x. Het dient als een tweede beheerderspaneel, met de mogelijkheid om een beheerder een set van diverse hulpmiddelen te geven om meest voorkomende problemen op te lossen die misschien voorkomen zijn in hun phpBB 3.0.x installatie, zodat het forum weer correct functioneert.',
   'CAT_SUPPORT'						=> 'Ondersteuningshulpmiddelen',
   'CAT_SUPPORT_EXPLAIN'				=> 'Ondersteuningshulpmiddelen kunnen worden gebruikt om een phpBB 3.0.x installatie te herstellen die niet langer meer correct functioneert.',
   'CAT_USERGROUP'						=> 'Gebruikers-/groepshulpmiddelen',
   'CAT_USERGROUP_EXPLAIN'				=> 'Gebruikers- en groepshulpmiddelen kunnen gebruikt worden om gebruikers en groepen te beheren op een manier die niet beschikbaar is in een standaard phpBB 3.0.x installatie.',
   'CONFIG_NOT_FOUND'					=> 'Het configuratie bestand van de STK kon niet worden geladen. Controleer uw installatie.',

   'DOWNLOAD_PASS'						=> 'Wachtwoordbestand downloaden',

   'EMERGENCY_LOGIN_NAME'				=> 'STK nood-aanmelding',
   'ERK'								=> 'Nood reparatie kit',

   'FAIL_REMOVE_PASSWD'					=> 'Kon het verlopen wachtwoordbestand niet verwijderen. Verwijder dit bestand handmatig!',

   'GEN_PASS_FAILED'					=> 'De Support toolkit kon niet een nieuw wachtwoord genereren. Probeer het opnieuw.',
   'GEN_PASS_FILE'						=> 'Wachtwoordbestand genereren',
   'GEN_PASS_FILE_EXPLAIN'				=> 'Als u niet in staat bent om u zich aan te melden in uw phpBB-installatie, dan kunt u de interne aanmeldingsmethode gebruiken van de Support toolkit. Om deze methode te gebruiken moet u een nieuw wachtwoordbestand  <a href="%s"><strong>genereren</strong></a>.',

   'INCORRECT_CLASS'					=> 'Onjuiste class in: stk/tools/%1$s.%2$s',
   'INCORRECT_PASSWORD'					=> 'Wachtwoord is onjuist',
   'INCORRECT_PHPBB_VERSION'			=> 'De versie van phpBB die u gebruikt is niet compatibel met dit hulpmiddel. De phpBB-installatie moet tenminste versie %1$s zijn of hoger om dit hulpmiddel te kunnen uitvoeren.',

   'LOGIN_STK_SUCCESS'					=> 'U heeft zich met succes aangemeld en u zal nu worden doorgeleid naar de Support toolkit.',

   'NOTICE'								=> 'Notitie',
   'NO_VERSION_FILE'					=> 'De Support toolkit (STK) kon niet bepalen of u de laatste versie gebruikt van de STK. Ga naar de <a href="http://www.phpbb.com/support/stk">Support toolkit pagina op phpBB.com</a> en kijk of u de laatste versie gebruikt voordat u verder gaat met het gebruiken van de STK.',

   'REQUEST_PHPBB_VERSION'				=> 'Selecteer phpBB-versie',
   'REQUEST_PHPBB_VERSION_EXPLAIN'		=> 'De Support Toolkit (STK) was niet in staat om de juiste phpBB-versie te achterhalen die u momenteel gebruikt, selecteer om deze reden de juiste versie voordat u verder gaat.<br />Dit betekend dat uw forumbestanden niet gelijk zijn met de forumversie die u gebruikt, dit komt meestal doordat een update niet volledig is uitgevoerd. Bezoek de <a href="http://forum.phpbbservice.nl/viewforum.php?f=42">supportforums</a> om hulp te krijgen om dit probleem op te lossen.',

   'PASS_GENERATED'						=> 'Uw STK-wachtwoordbestand is succesvol gegenereerd!<br/>Het wachtwoord dat is gegenereerd voor u is: <em>%1$s</em><br />Dit wachtwoord is geldig tot: <span style="text-decoration: underline;">%2$s</span>. Na deze tijd <strong>moet</strong> u een nieuw wachtwoordbestand generen om gebruik te kunnen maken van de nood aanmeldingsfunctie!<br /><br />Gebruik de onderstaande knop om het bestand te downloaden. Wanneer u het bestand hebt gedownload moet u het uploaden naar uw server in de “stk”-directory.',
   'PASS_GENERATED_REDIRECT'			=> 'Wanneer u het wachtwoordbestand in de juiste locatie hebt geüpload, klikt u <a href="%s">hier</a> om terug te gaan naar de aanmeldingspagina.',
   'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Dit hulpmiddel is niet compatibel met de phpBB-versie die u gebruikt.',
   'PROCEED_TO_STK'						=> '%sDoorgaan naar de Support toolkit%s',

   'STK_FOUNDER_ONLY'					=> 'U moet u opnieuw aanmelden voordat u de Support toolkit kunt gebruiken!',
   'STK_LOGIN'							=> 'Support toolkit aanmelden',
   'STK_LOGIN_WAIT'						=> 'U kunt alleen aanmelden om de 3 seconden, probeer het opnieuw.',
   'STK_LOGOUT'							=> 'STK Afmelden',
   'STK_LOGOUT_SUCCESS'					=> 'U heeft zich succesvol afgemeld vanuit de Support Toolkit.',
   'STK_NON_LOGIN'						=> 'Meld u aan om toegang te verkrijgen tot de STK',
   'STK_OUTDATED'						=> 'De installatie van de Support toolkit blijkt niet up-to-date te zijn. De laatste beschikbare versie is <strong style="color: #008000;">%1$s</strong>, terwijl de versie die u heeft geïnstalleerd is <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Om de grootte impact van dit hulpmiddel op uw phpBB-installatie, is het uitgeschakeld totdat de update is gedaan. We raden ten strengste aan om alle software die u op uw server heeft staan up-to-date houdt. Meer informatie over de laatste update is in de <a href="%3$s">uitgave</a> verkrijgbaar.<br /><br /><em>Als u deze melding krijgt na u een update heeft uitgevoerd van de Support toolkit, klik dan <a href="%4$s">hier</a> om de cache van de versie controle te legen.</em>',
   'SUPPORT_TOOL_KIT'					=> 'Support toolkit',
   'SUPPORT_TOOL_KIT_INDEX'				=> 'Support toolkit-index',
   'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Wachtwoord',
   'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Aangezien u niet aangemeld bent in phpBB3 moet u zich verifiëren dat u de forumeigenaar bent door het support toolkit-wachtwoord in te voeren.<br /><br /><strong>Cookies MOETEN toegestaan zijn door uw browser anders zal u niet aangemeld blijven.</strong>',

   'TOOL_INCLUTION_NOT_FOUND'			=> 'Dit hulpmiddel probeert het volgende bestand te laden %1$s dat niet bestaat.',
   'TOOL_NAME'							=> 'Naam van het hulpmiddel',
   'TOOL_NOT_AVAILABLE'					=> 'Het opgevraagde hulpmiddel is niet beschikbaar!',

   'USING_STK_LOGIN'					=> 'U bent aangemeld via de interne STK-aanmeldingsmethode. Het wordt aangeraden om deze methode <strong>alleen</strong> te gebruiken wanneer u zich niet kan aanmelden in phpBB.<br />Om deze aanmeldingsmethode uit te schakelen klikt u <a href="%1$s">hier</a>.',
));

?>