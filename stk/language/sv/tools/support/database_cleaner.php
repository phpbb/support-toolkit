<?php
/**
*
* This file is part of Swedish STK translation.
* Copyright (c) 2010 - 2011 Swedish translation group.
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; version 2 of the License.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along
* with this program; if not, write to the Free Software Foundation, Inc.,
* 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*
* @package    Support Toolkit - Profile List
* @author     Simon Assgård <sassgard@gmail.com> (Simon Assgård) http://www.phpbb-se.com/
* @copyright (c) 2009 phpBB Group
* @license    http://opensource.org/licenses/gpl-license.php GNU Public License
* @version    $Id$
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
	'BOARD_DISABLE_REASON'			=> 'Forumet är för nuvarande in-aktiverat på grund utav databas underhåll. Vänligen återkom senare!',
	'BOARD_DISABLE_SUCCESS'			=> 'Forumet har blivit in-aktiverat!',

	'COLUMNS'						=> 'Kolumner',
	'CONFIG_SETTINGS'				=> 'Konfigurations-inställningar',
	'CONFIG_UPDATE_SUCCESS'			=> 'Konfigurations-inställningarna har blivit uppdaterade!',
	'CONTINUE'						=> 'Fortsätt',

	'DATABASE_CLEANER'				=> 'Databas-rensaren',
	'DATABASE_CLEANER_EXTRA'		=> 'Något utöver detta är modifikationer. <strong>Om kryss-rutan är ifylld så kommer dessa att tas bort</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Fält med en röd bakgrund, så som denna, saknar objekt som borde bli läggas till. <strong>Om kryss-rutan är ifylld så kommer detta att läggas till</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Databas-rensaren är klar med samtliga uppgifter!<br /><br />Vänligen skapa en backup utav din databas igen.',
	'DATABASE_CLEANER_WARNING'		=> 'Detta verktyg kommer helt utan GARANTI och användare utav detta verktyg borde skapa en backup utav hela deras databas, utifall någonting går snett.<br /><br />Innan du fortsätter, se till att du har en backup på din databas!',
	'DATABASE_CLEANER_WELCOME'		=> 'Välkommen till Databas-rensar-verktyget!<br /><br />Detta verktyget var designat för att ta bort extra kolumner, rader och tabeller från databasen som inte är standard i en phpBB-installation, samt att lägga till databas-objekt som saknas.<br /><br />När du är redo att fortsätta, klicka på Fortsätt-knappen för att börja använda Databas-rensar-verktyget(notera att ditt forum kommer att in-aktiveras under tiden detta verktyget körs).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Databas-kolumnerna har blivit tillagda!',
	'DATABASE_TABLES'				=> 'Databastabeller',
	'DATABASE_TABLES_SUCCESS'		=> 'Databastabellerna har blivit uppdaterade!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'Systemrollerna har blivit uppdaterade!',
	'DATABASE_ROLES_SUCCESS'		=> 'Rollerna har blivit uppdaterade!',
	'DATAFILE_NOT_FOUND'			=> 'Support Toolkit kunde inte hitta den data-fil som krävs för din phpBB-version!',

	'EMPTY_PREFIX'					=> 'Ingen databasprefix',
	'EMPTY_PREFIX_CONFIRM'			=> 'Databas-rensaren kommer att göra ändringar i tabellerna i din databas, men eftersom du använder ett tomt prefix så kanske icke-phpBB-tabeller också ändras. Är du säker på att du vill fortsätta?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'Databas-rensaren upptäckte att du inte har satt ett tabellprefix för dina phpBB databastabeller. På grund utav detta, så kommer databas-rensaren kontrollera <strong>alla</strong> tabeller i din databas. Vidtag extra försiktighet när du fortsätter och se till att du exkluderar samtliga icke-phpBB-tabeller. Om du inte gör detta så kommer de databas-tabeller som inte är relaterade med phpBB att skadas. <br />Om du är osäker på hur du skall gå tillväga så kan du söka support i <a href="http://www.phpbb-se.com/forum/viewforum.php?f=19">phpBB Support Forum</a>.',
	'ERROR'							=> 'Felmeddelande',
	'EXTRA'							=> 'Extra',
	'EXTENSION_GROUPS_SUCCESS'		=> 'Filändelsegrupperna har blivit uppdaterade',
	'EXTENSIONS_SUCCESS'			=> 'Filändelserna har blivit uppdaterade',

	'FINAL_STEP'					=> 'Detta är det sista steget.<br /><br />Vi kommer nu att aktivera ditt forum och tömma forumets cache.',

	'INSTRUCTIONS'					=> 'Instruktioner',

	'MISSING'						=> 'Saknas',
	'MODULE_UPDATE_SUCCESS'			=> 'Modulerna har blivit uppdaterade!',

	'NO_BOT_GROUP'					=> 'Kunde inte återställa bottarna, saknar Bot-gruppen.',

	'PERMISSION_SETTINGS'			=> 'Behörighetsinställningar',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Behörighetsinställningarna har blivit uppdaterade!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Din version utav phpBB3 stöds inte (eller så saknas några filer från Support-verktyget).<br />phpBB 3.0.0+ borde stödjas, men det kan ta en stund innan detta verktyget är uppdaterat för den senaste versionen av phpBB.',

	'QUIT'							=> 'Avsluta',

	'RESET_BOTS'					=> 'Återställ bottar',
	'RESET_BOTS_EXPLAIN'			=> 'Vill du återställa bot-listan till standard? Samtliga bottar kommer att tas bort, och ersättas med standardlistan utav bottar.',
	'RESET_BOTS_SKIP'				=> 'Hoppar över återställningen av bottarna',
	'RESET_BOT_SUCCESS'				=> 'Bottarna har blivit återställda!',
	'RESET_MODULES'					=> 'Återställ moduler',
	'RESET_MODULES_EXPLAIN'			=> 'Vill du återställa modulerna till phpBB3s standardmoduler? Samtliga moduler kommer att tas bort och ersättas med phpBB3s standardmoduler.',
	'RESET_MODULES_SKIP'			=> 'Hoppar över återställningen av moduler',
	'RESET_MODULE_SUCCESS'			=> 'Modulerna har blivit återställda!',
	'RESET_REPORT_REASONS'			=> 'Återställ rapportanledningar',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Vill du återställa rapportanledningar till standard? Detta kommer att ta bort alla tillagda rapportanlednigar!',
	'RESET_REPORT_REASONS_SKIP'		=> 'Rapportanledningarna har inte blivit återställda',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'Rapportanledningarna har blivit återställda!',
	'RESET_ROLE_DATA'				=> 'Återställ rolldata',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Detta steget kommer att återställa phpBBs system roller tillbaka till deras orginal, det är väldigt rekommenderat att köra detta utifall du gjorde ändringar i det föregående steget.',
	'ROLE_SETTINGS'					=> 'Rollinställningar',
	'ROWS'							=> 'Rader',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'Oförändrade tabeller',
		'columns'			=> 'Oförändrade kolumner',
		'config'			=> 'Oförändrad konfigurering',
		'extension_groups'	=> 'Filändelsegrupperna är oförändrade',
		'extensions'		=> 'Filändelserna är oförändrade',
		'permissions'		=> 'Oförändrade behörigheter',
		'groups'			=> 'Oförändrade grupper',
		'roles'				=> 'Oförändrade roller',
		'final_step'		=> 'Sista steget',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'Databastabellerna har inte blivit ändrade',
		'columns'			=> 'Kolumnerna i databasen har inte blivit ändrade',
		'config'			=> 'Konfigurationstabellerna har inga nya/saknade värden',
		'extension_groups'	=> 'Filändelsegrupperna har inga tabeller med nya/saknade värden',
		'extensions'		=> 'Standardfiländelserna har inte ändrats',
		'permissions'		=> 'Det fanns inga ändringar i behörighetstabellerna',
		'groups'			=> 'Det fanns inga ändringar i phpBBs systemgrupp',
		'roles'				=> 'Inga roller var tillagda eller borttagna',
		'final_step'		=> 'Detta sista steget kommer att aktivera ditt forum och tömma forumets cache.',
	),
	'SUCCESS'						=> 'Succé',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Systemgrupperna har blivit återställda',

	'TYPE'							=> 'Typ',

	'UNSTABLE_DEBUG_ONLY'			=> 'Databas-rensaren kan endast köras på instabila phpBB-versioner <em>(dev, a, b, RC)</em>, när "DEBUG" är aktiverat i phpBBs konfig-fil.',
));
