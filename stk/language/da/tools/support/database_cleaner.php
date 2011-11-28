<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
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
	'BOARD_DISABLE_REASON'			=> 'Boardet er i øjeblikket offline på grund af databasevedligholdelse. Besøg os venligst senere!',
	'BOARD_DISABLE_SUCCESS'			=> 'Boardet er nu deaktiveret!',

	'COLUMNS'						=> 'Kolonner',
	'CONFIG_SETTINGS'				=> 'Indstillinger af konfiguration',
	'CONFIG_UPDATE_SUCCESS'			=> 'Indstillingerne er opdateret!',
	'CONTINUE'						=> 'Fortsæt',

	'DATABASE_CLEANER'				=> 'Databaserenser',
	'DATABASE_CLEANER_EXTRA'		=> 'Alle andre er ekstra elementer tilføjet af modifikationer. <strong>Er boksen vinget af, fjernes disse</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Alle felter med en rød baggrund som denne, er manglende elementer, som bør tilføjes. <strong>Er boksen vinget af, tilføjes disse</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Databaserenseren har udført alle opgaver!<br /><br />Foretag venligst endnu en backup af din database.',
	'DATABASE_CLEANER_WARNING'		=> 'Værktøjet leveres og anvendes UDEN GARANTI, brugere af værktøjet bør foretage backup af hele databasen, således eventuelle fejl kan omgøres.<br /><br />Kontroller om du har en frisk databasebackup, før der fortsættes!',
	'DATABASE_CLEANER_WELCOME'		=> 'Velkommen til databaserenseren!<br /><br />Værktøjet er designet til at fjerne ekstra kollonner, rækker og tabeller fra databasen, som ikke findes i en phpBB3 standardinstallation, og også kontrollere for og tilføje eventuelle manglende databaseelementer.<br /><br />Klik for knappen forsæt når du er klar, herved startes databaserenseren (bemærk at dit board vil blive deaktiveret indtil processen er færdiggjort).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Kolonnerne i databasen er opdaterede!',
	'DATABASE_TABLES'				=> 'Databasetabeller',
	'DATABASE_TABLES_SUCCESS'		=> 'Databasetabeller er opdaterede!',
	'DATABASE_ROLE_DATA_SUCCESS'  => 'phpBBs systemroller blev gendannet!',
	'DATABASE_ROLES_SUCCESS'    => 'Roller blev opdateret!',
	'DATAFILE_NOT_FOUND'			=> 'Support toolkittet fandt ikke den krævede datafil til din version af phpBB!',

	'EMPTY_PREFIX'          => 'Intet databasepræfiks',
	'EMPTY_PREFIX_CONFIRM'      => 'Databaserenseren vil udføre ændringer i tabellerne i databasen, men da du ikke anvender tabelpræfix, kan ændringen risikere at få indflydelse på tabeller som ikke er tilknyttet phpBB. Er du sikker på at du ønsker at fortsætte?',
	'EMPTY_PREFIX_EXPLAIN'      => 'Databaserenseren konstaterer at du ikke har defineret et tabelpræfiks for tabellerne i phpBB-databasen. Derfor vil databaserenseren kontrollere <strong>samtlige</strong> databasens tabeller. Vær ekstra opmærksom når du fortsætter og fravælg eventuelle tabeller som ikke er relateret til din phpBB-installation. Undlades dette kan skade databasetabelle som ikke er en del af phpBB.<br />Er du usikker på hvordan du bør fortsætte, kan hjælp søges i <a href="http://www.phpbb.com/community/viewforum.php?f=46">phpBB Supportforummet</a>.',
	'ERROR'							=> 'Fejl',
	'EXTRA'							=> 'Ekstra',
	'EXTENSION_GROUPS_SUCCESS'    => 'Filtypegrupper blev nulstillet',
	'EXTENSIONS_SUCCESS'      => 'Filtyper blev nulstillet',

	'FINAL_STEP'					=> 'Dette er sidste trin.<br /><br />Vi vil nu genaktivere dit board og tømme dets mellemlager.',

	'INSTRUCTIONS'					=> 'Instruktioner',

	'MISSING'						=> 'Mangler',
	'MODULE_UPDATE_SUCCESS'			=> 'Moduler er opdaterede!',

	'NO_BOT_GROUP'					=> 'Bot-gruppen mangler, derfor kunne botter ikke nulstilles.',

	'PERMISSION_SETTINGS'			=> 'Tilladelser',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Tilladelseindstillinger er opdaterede!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Din version af phpBB3 er ikke understøttet (eller nogle filer i Support Toolkittet mangler).<br />phpBB 3.0.0+ er understøttet, men der kan være nogen forsinkelse fra frigivelsen af nye phpBB3-versioner til dette værktøj understøtter seneste version.',

	'QUIT'							=> 'Afbryd',

	'RESET_BOTS'					=> 'Nulstil botter',
	'RESET_BOTS_EXPLAIN'			=> 'Vil du nulstille botlisten, så den kun indeholder de botter som er med i phpBB3-standardlisten? Alle eksisterende botter vil blive fjernet og erstattet med standardbotterne.',
	'RESET_BOTS_SKIP'				=> 'Nulstilling af botter blev annulleret',
	'RESET_BOT_SUCCESS'				=> 'Botlisten er nulstillet!',
	'RESET_MODULES'					=> 'Nulstil moduler',
	'RESET_MODULES_EXPLAIN'			=> 'Vil du nulstille modulerne, således phpBB3\'s standardindstillinger bliver gældende? Alle eksisterende moduler vil blive fjernet og erstattet med standardmodulerne.',
	'RESET_MODULES_SKIP'			=> 'Nulstilling af moduler blev annulleret',
	'RESET_MODULE_SUCCESS'			=> 'Moduler er nulstillet!',
	'RESET_REPORT_REASONS'      => 'Nulstil rapportbegrundelser',
 	'RESET_REPORT_REASONS_EXPLAIN'  => 'Vil du nulstille rapportbegrundelser? Handlingen vil slette alle tilføjede begrundelser!',
 	'RESET_REPORT_REASONS_SKIP'    => 'Rapportbegrundelser er ikke blevet nulstillet',
 	'RESET_REPORT_REASONS_SUCCESS'  => 'Rapportbegrundelser blev nulstillet!',
 	'RESET_ROLE_DATA'        => 'Nulstil rolledata',
 	'RESET_ROLE_DATA_EXPLAIN'    => 'Dette trin vil nulstille phpBBs systemroller, så standardindstillinger vil gælde for disse. Det anbefales at udføre dette, hvis du foretog ændringer i tidligere trin.',
	'ROLE_SETTINGS'          => 'Rolleindstillinger',
	'ROWS'							=> 'Rækker',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'		=> 'Tabeller uændrede',
		'columns'	=> 'Kolonner uændrede',
		'config'	=> 'Konfiguration uændret',
		'extension_groups'  => 'Filtypegruppetabellen uændret',
		'extensions'    => 'Standardfiltyper uændrede',
		'permissions'	=> 'Tilladelser uændrede',
		'groups'	=> 'Grupper uændrede',
		'roles'        => 'Roller uændrede',
		'final_step'	=> 'Sidste trin',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'	=> 'Der blev ikke foretaget ændringer i databasetabellerne',
		'columns'	=> 'Der blev ikke foretaget ændringer i databasens kolonnerne',
		'config'	=> 'Konfigurationtabellen har ingen nye eller manglende værdier',
		'extension_groups'  => 'Filtypegruppetabellen indeholder ikke nye og mangler ingen værdier',
		'extensions'    => 'Der blev ikke foretaget ændringer i standardfiltyperne',
		'permissions'	=> 'Der blev ikke foretaget ændringer i tabellen indeholdende tilladelser',
		'groups'	=> 'Der blev ikke foretaget ændringer i phpBB\'s systemgrupper',
		'roles'        => 'Der blev ikke tilføjet eller slettet roller',
		'final_step'	=> 'Det sidste trin tømmer cachen og genaktiverer boardet',
	),
	'SUCCESS'						=> 'Gennemført uden problemer',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Systemgrupperne blev nulstillet',

	'TYPE'							=> 'Type',

	'UNSTABLE_DEBUG_ONLY' => 'Databaserenseren kan kun anvendes på ustabile versioner af phpBB <em>(dev, a, b, RC)</em>, hvis "DEBUG" er aktiveret i phpBB config-filen.',
));
