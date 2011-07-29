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
	'BOARD_DISABLE_REASON'			=> 'Witryna jest obecnie wyłączna, z powodu konserwacji bazy danych. Wróć za chwilę!',
	'BOARD_DISABLE_SUCCESS'			=> 'Witryna wyłączona!',

	'COLUMNS'						=> 'Kolumny',
	'CONFIG_SETTINGS'				=> 'Ustawienia konfiguracji',
	'CONFIG_UPDATE_SUCCESS'			=> 'Ustawienia konfiguracji zostały zaktualizowane!',
	'CONTINUE'						=> 'Kontynuuj',

	'DATABASE_CLEANER'				=> 'Sprzątnij bazę danych',
	'DATABASE_CLEANER_EXTRA'		=> 'Rzeczy dodane przez modyfikacje.  <strong>W przypadku zaznaczenia zostaną usunięte</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Any fields with a red background like this are missing items that should be added.  <strong>If the check box is selected it will be added</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Wszystkie zadania zostały wykonane.<br /><br />Pamiętaj, aby ponownie wykonać kopię bazy danych.',
	'DATABASE_CLEANER_WARNING'		=> 'This tool comes with NO WARRANTY and users of this tool should back up their entire database in case of a failure.<br /><br />Before continuing, make sure you have a database backup!',
	'DATABASE_CLEANER_WELCOME'		=> 'Witaj w narzędziu oczyszczania bazy danych!<br /><br />Narzędzie zostało stworzone do usuwania kolumn, wierszy i tabel z bazy danych, które nie znajdują się w standardowej instalacji phpBB3 oraz do odtworzania brakujących elementów.<br /><br />Jeżeli jesteś gotowy kontynuować kliknij na przycisk Kontynuuj, który uruchomi narzędzie oczyszczania. (Twoja witryna będzie wyłączona do czasu zakończenia)',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Kolumny zostały zaktualizowane!',
	'DATABASE_TABLES'				=> 'Tabele bazy danych',
	'DATABASE_TABLES_SUCCESS'		=> 'Tabele zostały zaktualizowane!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'Role zostały odtworzone.',
	'DATABASE_ROLES_SUCCESS'		=> 'Role zostały zaktualizowane',
	'DATAFILE_NOT_FOUND'			=> 'Pakiet Support Toolkit nie mógł znaleźć wymaganego pliku danych dla Twojej wersji phpBB!',

	'EMPTY_PREFIX'					=> 'Brak prefiksu tabel',
	'EMPTY_PREFIX_CONFIRM'			=> 'The database cleaner is about to make changes to the tables in your database, but as you are using an empty table prefix this might affect non-phpBB tables. Are you sure that you want to continue?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'The database cleaner has determined that you haven\'t set an table prefix for the phpBB database tables. Due to this the database cleaner will check <strong>all</strong> tables in the database. Take extra care when proceding and make sure that you exclude any non-phpBB tables from the selection. Failing to do so will damage database tables that aren\'t part of phpBB.<br />If you aren\'t sure on how to procede seek assistance in the <a href="http://www.phpbb.com/community/viewforum.php?f=46">phpBB Support Forums</a>.',
	'ERROR'							=> 'Błąd',
	'EXTRA'							=> 'Dodatkowe',
	'EXTENSION_GROUPS_SUCCESS'		=> 'Grupy rozszerzeń zostały zresetowane.',
	'EXTENSIONS_SUCCESS'			=> 'Rozszerzenia zostały zresetowane',

	'FINAL_STEP'					=> 'To jest końcowy etap.<br /><br />Teraz witryna zostanie włączona oraz wyczyszczony zostanie bufor.',

	'INSTRUCTIONS'					=> 'Polecenia',

	'MISSING'						=> 'Brakujące',
	'MODULE_UPDATE_SUCCESS'			=> 'Moduły zostały zaktualizowane',

	'NO_BOT_GROUP'					=> 'Nie udało się zresetować botów. Brakuje grupy botów.',

	'PERMISSION_SETTINGS'			=> 'Opcje uprawnień',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Ustawienia uprawnień zostały zaktualizowane.',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Twoja wersja phpBB3 nie jest wspierana (lub brakuje niektórych plików pakietu Support Toolkit).<br />Wszystkie phpBB w wersji wyższej niż 3.0.0 powinny być obsługiwane, jednak to może chwilę potrwać zanim narzędzie zostanie zaktualizowane do najnowszej wersji phpBB 3.0.',

	'QUIT'							=> 'Wyjdź',

	'RESET_BOTS'					=> 'Zresetuj boty',
	'RESET_BOTS_EXPLAIN'			=> 'Chcesz zresetować boty do domyślnej listy botów phpBB3? Wszystkie istniejące boty zostaną, wtedy zastąpione przez domyślny zestaw.',
	'RESET_BOTS_SKIP'				=> 'Resetowanie botów zostało pominięte.',
	'RESET_BOT_SUCCESS'				=> 'Boty został zresetowane.',
	'RESET_MODULES'					=> 'Zresetuj moduły',
	'RESET_MODULES_EXPLAIN'			=> 'Chcesz zresetować moduły do domyślnej listy modułów phpBB3? Wszystkie istniejące moduły zostaną, wtedy zastąpione przez domyślny zestaw.',
	'RESET_MODULES_SKIP'			=> 'Resetowanie modułów zostało pominięte.',
	'RESET_MODULE_SUCCESS'			=> 'Moduły zostały zresetowane.',
	'RESET_REPORT_REASONS'			=> 'Zresetuj powody zgłoszeń',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Chcesz zresetować powody zgłoszeń do domyślnej listy powodów phpBB3? Wszystkie dodane powody zgłoszeń zostaną, wtedy usunięte.',
	'RESET_REPORT_REASONS_SKIP'		=> 'Powody zgłoszeń nie zostały zresetowane.',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'Powody zgłoszeń zostały zresetowane.',
	'RESET_ROLE_DATA'				=> 'Zresetuj dane ról',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'W tym etapie zestaw ról zostanie przywrócony do oryginalnego stanu. Zalecane jeżeli wykonałeś zmiany w poprzednim etapie.',
	'ROWS'							=> 'Wiersze',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'Tabele nie zostały zmienione',
		'columns'			=> 'Kolumny nie zostały zmienione',
		'config'			=> 'Konfiguracja nie została zmieniona',
		'extension_groups'	=> 'Grupy rozszerzeń nie zostały zmienione',
		'extensions'		=> 'Rozszerzenia nie zostały zmienione',
		'permissions'		=> 'Uprawnienia nie zostały zmienione',
		'groups'			=> 'Grupy nie zostały zmienione',
		'roles'				=> 'Role nie zostały zmienione',
		'final_step'		=> 'Końcowy etap',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'Tabele w bazie danych nie zostały zmienione',
		'columns'			=> 'Kolumny w bazie danych nie zostały zmienione',
		'config'			=> 'Tabela konfiguracyjna nie ma żadnych nowych/brakujących wartości',
		'extension_groups'	=> 'Tabela grup rozszerzeń nie ma żadnych nowych/brakujących wartości',
		'extensions'		=> 'Domyślne rozszerzenia nie zostały zmienione',
		'permissions'		=> 'Nie wykryto zmian w uprawnieniach',
		'groups'			=> 'Nie wykryto zmian w grupach',
		'roles'				=> 'Nie wykryto dodanych i usuniętych ról',
		'final_step'		=> 'Końcowy etap włączy witrynę i wyczyści bufor.',
	),
	'SUCCESS'						=> 'Sukces',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Grupy zostały zresetowane.',

	'TYPE'							=> 'Rodzaj',

	'UNSTABLE_DEBUG_ONLY'			=> 'Oczyszczanie bazy danych można uruchomić tylko na niestabilnych wersjach phpBB <em>(dev, a, b, RC)</em>, kiedy włączony jest tryb "DEBUG" w pliku konfiguracyjnym phpBB.',
));
