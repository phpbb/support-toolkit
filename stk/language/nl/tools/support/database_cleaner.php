<?php
/**
*
* @package Support Toolkit - Database Cleaner
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
	'BOARD_DISABLE_REASON'			=> 'Het forum is momenteel uitgeschakeld wegens database onderhoud. Probeer het straks nog eens!',
	'BOARD_DISABLE_SUCCESS'			=> 'Het forum is nu uitgeschakeld!',

	'COLUMNS'						=> 'Kolommen',
	'CONFIG_SETTINGS'				=> 'Configuratie instellingen',
	'CONFIG_UPDATE_SUCCESS'			=> 'De configuratie instellingen zijn bijgewerkt!',
	'CONTINUE'						=> 'Doorgaan',

	'DATABASE_CLEANER'				=> 'Database opschonen',
	'DATABASE_CLEANER_EXTRA'		=> 'Alle overige items zijn toegevoegd door modificaties. <strong>Als de checkbox is aangevinkt zal het worden verwijderd.</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'De velden met een rode achtergrond zijn ontbrekende items die moeten worden toegevoegd. <strong>Als de checkbox is aangevinkt zal het worden toegevoegd.</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Alle taken zijn succesvol uitgevoerd!<br /><br />Vergeet niet om een back-up van je database te maken.',
	'DATABASE_CLEANER_WARNING'		=> 'Deze tools geven GEEN GARANTIE en gebruikers ervan dienen altijd een database back-up te maken voor het geval er een fout optreed.<br /><br />Dus voordat je doorgaat, zorg er eerst voor dat je een back-up van je database hebt!',
	'DATABASE_CLEANER_WELCOME'		=> 'Welkom bij de database opschoonhulp!<br /><br />Deze tool is ontworpen om databasetabellen, -kolommen en -rijen te verwijderen die niet bij een standaard phpBB3 installatie behoren. Tevens kan deze tool eventueel benodigde database onderdelen toevoegen.<br /><br />Klik op de knop `Doorgaan` om de Database Opschoon Tool te gebruiken (het forum zal tijdens deze procedure worden uitgeschakeld).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'De database kolommen zijn succesvol bijgewerkt!',
	'DATABASE_TABLES'				=> 'Database tabellen',
	'DATABASE_TABLES_SUCCESS'		=> 'De database tabellen zijn succesvol bijgewerkt!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'Het phpBB rollen systeem is succesvol teruggezet!',
	'DATABASE_ROLES_SUCCESS'		=> 'De rollen zijn succesvol bijgewerkt!',
	'DATAFILE_NOT_FOUND'			=> 'De support toolkit kon het benodigde bestand voor jouw phpBB versie niet vinden!',

	'EMPTY_PREFIX'					=> 'Geen database prefix',
	'EMPTY_PREFIX_CONFIRM'			=> 'De database opschoner staat op het punt om enkele tabellen in je database te bewerken, maar als je gebruik maakt van een lege tabel prefix kan dit invloed hebben op niet-phpBB tabellen. Weet je zeker dat je door wil gaan?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'De database opschoner heeft geconstateerd dat je geen tabel prefix hebt ingesteld voor de phpBB database tabellen. Hierdoor zal de database opschoner <strong>alle</strong> tabellen in de database controleren. Let er extra goed op dat je bij het uitvoeren dat je alle niet-phpBB tabellen uitsluit bij de selectie. Bij het mislukken hiervan kan de database tabellen die geen onderdeel van phpBB zijn beschadigd raken.<br />Als je er niet zeker van bent hoe dit uit te voeren zoek dan hulp in de <a href="http://www.phpbb.com/community/viewforum.php?f=46">phpBB Support Forums</a>.',
	'ERROR'							=> 'Fout',
	'EXTRA'							=> 'Extra',
	'EXTENSION_GROUPS_SUCCESS'		=> 'De extensie groepen zijn succesvol gereset',
	'EXTENSIONS_SUCCESS'			=> 'De extensies zijn succesvol gereset',

	'FINAL_STEP'					=> 'Dit is de laatste stap.<br /><br />Jouw forum wordt nu weer ingeschakeld en de cache zal worden geleegd.',

	'INSTRUCTIONS'					=> 'Instructies',

	'MISSING'						=> 'Ontbrekend',
	'MODULE_UPDATE_SUCCESS'			=> 'De modules zijn succesvol bijgewerkt!',

	'NO_BOT_GROUP'					=> 'Kon de bots niet resetten, ontbrekende Bot groep.',

	'PERMISSION_SETTINGS'			=> 'Permissie Opties',
	'PERMISSION_UPDATE_SUCCESS'		=> 'De permissie instellingen zijn succesvol bijgewerkt!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Jouw phpBB3 versie wordt niet ondersteund (of er ontbreken enkele bestanden van de Support Toolkit).<br />phpBB 3.0.0+ zou moeten worden ondersteund, echter kan er wat tijd zitten tussen het uitkomen van een nieuwe versie van phpBB en deze Support Tool.',

	'QUIT'							=> 'Stoppen',

	'RESET_BOTS'					=> 'Bots resetten',
	'RESET_BOTS_EXPLAIN'			=> 'Wil je de bot-lijst herstellen naar de standaard phpBB3 bot-lijst? Alle bots worden verwijderd en vervangen door de standaard set van bots.',
	'RESET_BOTS_SKIP'				=> 'De bot reset is overgeslagen.',
	'RESET_BOT_SUCCESS'				=> 'De Bot-lijst is hersteld naar de standaard lijst!',
	'RESET_MODULES'					=> 'Modules resetten',
	'RESET_MODULES_EXPLAIN'			=> 'Wil je de modules herstellen naar de standaard phpBB3 modules? Alle modules worden verwijderd en vervangen door de standaard modules.',
	'RESET_MODULES_SKIP'			=> 'De module reset is overgeslagen.',
	'RESET_MODULE_SUCCESS'			=> 'De modules zijn hersteld naar de standaard modules!',
	'RESET_REPORT_REASONS'			=> 'Herstel rapporteer redenen',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Wil je de rapporteer redens herstellen naar de standaard? Dit verwijderd alle toegevoegde redens!',
	'RESET_REPORT_REASONS_SKIP'		=> 'De rapporteer redens zijn niet hersteld',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'De rapporteer redens zijn succesvol hersteld!',
	'RESET_ROLE_DATA'				=> 'Reset rol gegevens',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Deze stap zal de phpBB systeem rollen herstellen naar hun originele staat, dit wordt enorm  aangeraden als je wijzigingen hebt uitgevoerd in de vorige stap.',
	'ROLE_SETTINGS'					=> 'Rol instellingen',
	'ROWS'							=> 'Rijen',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'Tabellen niet gewijzigd',
		'columns'			=> 'Kolommen niet gewijzigd',
		'config'			=> 'Config niet gewijzigd',
		'extension_groups'	=> 'Extensie groepen niet gewijzigd',
		'extensions'		=> 'Extensies niet gewijzigd',
		'permissions'		=> 'Permissies niet gewijzigd',
		'groups'			=> 'Groepen niet gewijzigd',
		'roles'				=> 'Rollen niet gewijzigd',
		'final_step'		=> 'Laatste stap',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'De database tabellen zijn niet gewijzigd',
		'columns'			=> 'De kolommen in de database zijn niet gewijzigd',
		'config'			=> 'De configuratie tabel heeft geen nieuwe/ontbrekende waardes',
		'extension_groups'	=> 'De extensie groepen tabel heeft geen nieuwe/ontbrekende waardes',
		'extensions'		=> 'De standaard extensies zijn niet gewijzigd',
		'permissions'		=> 'Er zijn geen wijzigingen in de permissie tabellen',
		'groups'			=> 'Er zijn geen wijzigingen in de phpBB systeemgroepen',
		'roles'				=> 'Er zijn geen rollen toegevoegd of verwijderd',
		'final_step'		=> 'In deze laatste stap wordt de cache geleegd en het forum weer ingeschakeld.',
	),
	'SUCCESS'						=> 'Gelukt',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'De systeemgroepen zijn succesvol gereset.',

	'TYPE'							=> 'Type',

	'UNSTABLE_DEBUG_ONLY'			=> 'De database opschoner kan alleen worden uitgevoerd op onstabiele phpBB versies <em>(dev, a, b, RC)</em>, indien "DEBUG" staat ingesteld in het phpBB config bestand.',
));
