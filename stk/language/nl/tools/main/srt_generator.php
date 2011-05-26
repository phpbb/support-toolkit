<?php
/**
 *
 * @package Support Toolkit
 * @version $Id$
 * @copyright (c) 2010 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 * @ignore
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
// ’ » " " …
//

$lang = array_merge($lang, array(
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Hieronder vind je de Support Request Template. Klik hieronder om het naar het klembord te kopiëren. Open vervolgens een topic in het <a href="http://www.phpbb.com/community/viewforum.php?f=46">Support forum</a> en plak de tekst hierin. Indien je al een dergelijk topic hebt geopend, plak dan de tekst in een reactie in je reeds bestaande topic.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'De Support Request Template Generator kon de vragenlijst niet starten. Probeer de tool opnieuw te starten.',
	'SRT_GENERATOR'				=> 'Support Request Template Generator',
	'SRT_GENERATOR_LANDING'			=> 'Support Request Template Generator',
	'SRT_GENERATOR_LANDING_CONFIRM'		=> 'Welkom bij de Support Team’s Support Request Template Generator. Dit is de snelste en meest efficiënte manier om onze Support Request Template te gebruiken. De generator zal aan de hand van enkele series van 8 tot 10 vragen een diagnose stellen voor de meest voorkomende problemen. Vervolgens zal er een lijst met antwoorden worden gegenereerd die je kunt kopiëren en plakken in je supporttopic.<br />Deze STK tool doet hetzelfde als de <a href="http://www.phpbb.com/support/stk/">SRT Generator op www.phpbb.com</a> maar probeert alvast het een en ander in te vullen.<br /><br />Wil je de SRT Generator starten?',
	'SRT_NO_CACHE'				=> 'De Support Request Template generator gebruikt het phpBB cache systeem om informatie in op te slaan tijdens het doorlopen van alle stappen. Momenteel maak je gebruik van de phpBB null cache die niet compatible is met deze tool. Kies een van de andere caching backends om gebruik te kunnen maken van deze tool, of gebruik de <a href="http://www.phpbb.com/support/srt/">online SRT Generator</a>',
	'START_OVER'				=> 'Opnieuw beginnen',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'			=> 'Is het probleem MOD-gerelateerd?',
	'STEP1_MOD_EXPLAIN'		=> 'Is het probleem begonnen na het installeren of verwijderen van een MOD?',
	'STEP1_MOD_ERROR'		=> 'Voor ondersteuning op MOD-gerelateerde problemen (Bijv. het zojuist geïnstalleerd hebben van een MOD en daardoor problemen ondervinden) dien je naar het betreffende topic van de MOD te gaan. Als je de MOD van een andere website hebt gedownload, zul je daar voor ondersteuning moeten kijken.<br /><br /><a href="http://www.phpbb.com/community/viewforum.php?f=81">Ga naar de MOD Forums</a>',
	'STEP1_HACKED'			=> 'Was je forum gehacked?',
	'STEP1_HACKED_EXPLAIN'		=> 'Selecteer "Ja" als je ondersteuning nodig hebt omdat je forum was ge-defaced/anderszins aangetast.',
	'STEP1_HACKED_ERROR'		=> 'Als je forum was gehacked, vragen we je om de Incident Investigation Tracker te gebruiken in plaats van het Support forum zodat er niet per ongeluk privézaken worden geplaatst.<br /><br />Zie <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">dit bericht</a> voor aanwijzingen.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Welke versie van phpBB gebruik je?',
			'board_url'		=> 'Wat is de URL naar je forum?',
			'dbms'			=> 'Welk type/versie database gebruik je?',
			'php'			=> 'Welke PHP versie gebruik je?',
			'host_name'		=> 'Bij welke host draait je forum?',
			'install_type'		=> 'Hoe is je forum geïnstalleerd?',
			'inst_converse'		=> 'Is het een schone installatie?',
			'mods_installed'	=> 'Heb je ook MODs geïnstalleerd?',
			'registration_req'	=> 'Is registratie verplicht op je forum om het probleem te kunnen zien?',
		),
		'step3'	=> array(
			'installed_styles'	=> 'Welke stijlen zijn er momenteel geïnstalleerd?',
			'installed_languages'	=> 'Welke taal/talen is/zijn er momenteel in gebruik?',
			'xp_level'		=> 'Heb je (veel) ervaring op het gebied van php(BB)?',
			'problem_started'	=> 'Wanneer is het probleem ontstaan?',
			'problem_description'	=> 'Probeer het probleem zo goed mogelijk te omschrijven.',
			'installed_mods'	=> 'Welke MODs heb je geïnstalleerd?',
			'test_username'		=> 'Heb je een test-account om het probleem te kunnen zien?',
			'test_password'		=> 'Wat is het wachtwoord van het test-account?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'De SRT Generator kon jouw versie van phpBB niet herkennen. Selecteer de juiste verie. Als je dit niet weet, log dan in op je forum en scroll helemaal naar beneden. Klik op "Beheerderspaneel" en vervolgens op het "Systeem" tabblad.',
			'board_url'		=> 'De URL is het adres waar je naartoe gaat om je forum te bezoeken. Veel problemen zijn eenvoudiger op te lossen als we je forum kunnen bezoeken. Als je deze informatie liever niet geeft, vul dan "n/a" in.',
			'dbms'			=> 'Om erachter te komen welke database versie je gebruikt, ga je naar het Beheerderspaneel. Bij het tabblad "Algemeen", zoek naar "Database server:" in het statistiekenveld.',
			'php'			=> 'Om erachter te komen welke versie van PHP je gebruikt, ga je naar het Beheerderspaneel. Bij het tabblad "Algemeen" klik je in het menu op "PHP-informatie". Zoek hierin naar "PHP Version x.y.z"',
			'host_name'		=> 'Sommige problemen die worden ervaren met phpBB zijn te herleiden tot bepaalde hosts. Vul in dit veld het bedrijf in dat jouw webhosting pakket beschikbaar heeft gesteld (b.v. GoDaddy, Yahoo!, 1&1, etc.). Indien je de hosting zelf verzorgd, geef dit dan ook aan. Ditzelfde geldt ook als je helemaal niet weet waar je forum wordt gehost.',
			'install_type'		=> 'Als je je forum zelf hebt geïnstalleerd door de phpBB bestanden te downloaden, naar je host hebt geupload en via je browser de installer hebt gestart, selecteer dan "Ik heb het pakket gedownload van phpBB.com". Als iemand anders de installatie voor je heeft gedaan, selecteer dan "Iemand anders heeft het voor me geïnstalleerd" Als je een automatische installatie-tool zoals b.v. Fantastico hebt gebruikt, selecteer je "Ik heb het geïnstalleerd met een tool via mijn host"',
			'inst_converse'		=> 'Als je forum een Schone Installatie was, dan bedoel je hiermee dat het forum voor de installatie van phpBB nog niet bestond. Als je recentelijk je forum hebt geupdate vanaf een oudere versie van phpBB3, selecteer dan "Update van een eerdere versie van phpBB3". Als het een conversie betreft, dan betekent dit dat je forum eerst op andere software draaide en later is geconverteerd naar phpBB.',
			'mods_installed'	=> 'MODs zijn vaak de oorzaak van vele problemen met phpBB. Deze informatie kan helpen om de exacte oorzaak van het probleem te achterhalen.',
			'registration_req'	=> 'Selecteer "Ja" als je geregistreerd en ingelogd moet zijn om het probleem te kunnen zien.',
		),
		'step3'	=> array(
			'installed_styles'	=> 'Een niet bijgewerkte style is vaak de oorzaak van vele problemen. Als je niet weet welke stijlen er zijn geïnstalleerd, ga naar het Beheerderspaneel en klik op de tab "Stijlen".',
			'installed_languages'	=> 'Een niet bijgewerkt talenpakket is vaak de oorzaak van vele problemen. Als je niet weet welke taalpakketten er zijn geïnstalleerd, ga naar het Beheerderspaneel en klik op de tab "Systeem". Vervolgens selecteer je "Taalpakketten" in de lijst aan de linkerkant.',
			'xp_level'		=> 'Kies een optie die het beste bij je past.',
			'problem_started'	=> 'Omschrijf de werkzaamheden die je hebt uitgevoerd (forum updaten, een MOD installeren, etc.) om het probleem snel helder te krijgen.',
			'problem_description'	=> 'Als je het probleem omschrijft, probeer dit dan zo gedetaileerd mogelijk te doen. Geef aan hoe je het probleem ontdekte, de stappen die moeten worden gevolgd om het probleem te reproduceren en eventueel nog aanvullende informatie.',
			'installed_mods'	=> 'Wees zo duidelijk mogelijk bij het opsommen van je geïnstalleerde MODs. Deze informatie helpt ons enorm bij het vinden van de oorzaak van het probleem.',
			'test_username'		=> 'Geef de gebruikersnaam van een test-account als dit nodig is om het probleem te kunnen zien. Geef deze informatie <strong>niet</strong> als er meerdere rechten nodig zijn dan voor een "normale" gebruiker.',
			'test_password'		=> 'Geef het wachtwoord voor het test-account dat nodig is om het probleem te kunnen zien. Geef deze informatie <strong>niet</strong> als er meerdere rechten nodig zijn dan voor een "normale" gebruiker.',
		),
	),
));

// Langauge strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				'myself'		=> 'Ik heb het pakket gedownload van phpBB.com',
				'third'			=> 'Ik heb het pakket van een andere website',
				'someone_else'		=> 'Iemand anders heeft het voor me geïnstalleerd',
				'automated'		=> 'Ik heb het geïnstalleerd met een tool via mijn host',
			),
			'inst_converse'	=> array(
				'fresh'			=> 'Schone Installatie',
				'phpbb_update'		=> 'Update van een eerdere versie van phpBB3',
				'convert_phpbb2'	=> 'Conversie van phpBB2',
				'convert_other'		=> 'Conversie van andere software',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				'new_both'		=> 'Nieuw met PHP en phpBB',
				'new_phpbb'		=> 'Nieuw met phpBB maar wel bekend met PHP',
				'new_php'		=> 'Nieuw met PHP maar wel bekend met phpBB',
				'comfort'		=> 'Redelijk bekend met PHP en phpBB',
				'experienced'		=> 'Veel ervaring met PHP en phpBB',
			),
		),
	),
));
