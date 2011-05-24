<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @version $Id: database_cleaner.php 325 2010-10-17 20:54:48Z Raimon $
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
	'BOARD_DISABLE_REASON'			=> 'Het forum is momenteel uitgeschakeld wegens onderhoud aan de database. Kom op een later tijdstip terug!',
	'BOARD_DISABLE_SUCCESS'			=> 'Het forum is succesvol uitgeschakeld!',

	'COLUMNS'						=> 'Kolommen',
	'CONFIG_SETTINGS'				=> 'Configuratie instellingen',
	'CONFIG_UPDATE_SUCCESS'			=> 'De configuratie instellingen zijn bijgewerkt!',
	'CONTINUE'						=> 'Doorgaan',

	'DATABASE_CLEANER'				=> 'Database opschonen',
	'DATABASE_CLEANER_EXTRA'		=> 'Al het andere zijn extra items die zijn toegevoegd door modificaties. <strong>Als het selectievakje is aangevinkt zal het worden verwijderd</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Een veld met een rode achtergrond zoals dit, zijn ontbrekende items die zullen worden toegevoegd. <strong>Als het selectievakje is aangevinkt zal het worden toegevoegd</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'De database opschoner is klaar met alle taken!<br /><br />Vergeet niet om nu opnieuw een back-up te maken van uw database.',
	'DATABASE_CLEANER_WARNING'		=> 'Dit hulpmiddel komt ZONDER GARANTIE en gebruikers die dit hulpmiddel gebruiken zullen een back-up moeten maken van hun database voor het geval er iets mis gaat.<br /><br />Voordat u doorgaat wees er dan zeker van dat u een back-up hebt gemaakt van de database!',
	'DATABASE_CLEANER_WELCOME'		=> 'Welkom bij het database opschoonhulpmiddel!<br /><br />Dit hulpmiddel is ontwikkeld om extra kolommen, rijen en tabellen te verwijderen van uw database, die niet voorkomen in een standaard installatie van phpBB3, en om ontbrekende database-elementen, die nodig zijn, toe te voegen.<br /><br />Wanneer u klaar bent om door te gaan, klikt u op de doorgaan-knop om het database opschoonhulpmiddel te starten (vergeet niet dat uw forum zal worden uitgeschakeld totdat dit klaar is).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'De database-kolommen zijn bijgewerkt!',
	'DATABASE_TABLES'				=> 'Database-tabellen',
	'DATABASE_TABLES_SUCCESS'		=> 'De database-tabellen zijn bijgewerkt!',
	'DATAFILE_NOT_FOUND'			=> 'De support toolkit kon niet het benodigde databestand vinden voor uw phpBB-versie!',

	'ERROR'							=> 'Fout',
	'EXTRA'							=> 'Extra',

	'FINAL_STEP'					=> 'Dit is de laatste stap.<br /><br />We zullen nu uw forum weer inschakelen en de cache van uw forum legen.',

	'INSTRUCTIONS'					=> 'Instructies',

	'MISSING'						=> 'Ontbreekt',
	'MODULE_UPDATE_SUCCESS'			=> 'De modules zijn bijgewerkt!',

	'NO_BOT_GROUP'					=> 'Kon de bots niet resetten, omdat de botgroep ontbreekt.',

	'PERMISSION_SETTINGS'			=> 'Permissieopties',
	'PERMISSION_UPDATE_SUCCESS'		=> 'De permissieinstellingen zijn bijgewerkt!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Uw versie van phpBB3 wordt niet ondersteunt (of sommige bestanden van de Support Toolkit (STK) ontbreken).<br />phpBB versie 3.0.0 en hoger worden ondersteunt, het kan soms enige tijd duren dat dit hulpmiddel wordt bijgewerkt naar de nieuwste versie van phpBB3 (wanneer er bijvoorbeeld net een nieuwe versie is uitgebracht).',

	'QUIT'							=> 'Stoppen',

	'RESET_BOTS'					=> 'Bots resetten',
	'RESET_BOTS_EXPLAIN'			=> 'Wilt u de bots lijst resetten naar de standaard phpBB3 bots lijst? Alle bestaande bots zullen worden verwijderd en vervangen worden door de standaard phpBB3 bots.',
	'RESET_BOTS_SKIP'				=> 'Het resetten van de bot is overgeslagen',	
	'RESET_BOT_SUCCESS'				=> 'De bots zijn gereset!',
	'RESET_MODULES'					=> 'Modules resetten',
	'RESET_MODULES_EXPLAIN'			=> 'Wilt u de modules resetten naar de standaard phpBB3 modules? Alle bestaande modules zullen worden verwijderd en vervangen worden door de standaard phpBB3 modules.',
	'RESET_MODULE_SUCCESS'			=> 'De modules zijn gereset!',
	'ROWS'							=> 'Rijen',
	
	'SECTION_NOT_CHANGED_TITLE'		=> array(
		1	=> 'Tabellen zijn niet gewijzigd',
		2	=> 'Kolommen zijn niet gewijzigd',
		3	=> 'Config is niet gewijzigd',
		4	=> 'Permissies zijn niet gewijzigd',
		5	=> 'Groepen zijn niet gewijzigd',
		8	=> 'Laatste stap',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		1	=> 'De database-tabellen zijn niet gewijzigd',
		2	=> 'De kolommen in de database zijn niet gewijzigd',
		3	=> 'De configuratie tabel heeft geen nieuwe/ontbrekende waardes',
		4	=> 'Er waren geen wijzigingen in de permissie tabellen',
		5	=> 'Er waren geen wijzigingen in het phpBB-groepensysteem',
		8	=> 'Deze laatste stap zal de cache legen en het forum weer inschakelen.',
	),
	'SUCCESS'						=> 'Voltooid',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Het groepensysteem is succesvol gereset.',	

	'TYPE'							=> 'Type',
	
	'UNSTABLE_DEBUG_ONLY'			=> 'De database opschoner kan alleen worden uitgevoerd op instabiele phpBB-versies <em>(dev, a, b, RC)</em>, en wanneer de "DEBUG" is ingeschakeld via het phpBB configuratiebestand.',	
));

?>