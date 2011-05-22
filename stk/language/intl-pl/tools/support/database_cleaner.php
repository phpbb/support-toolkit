<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @version $Id: 
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
    'BOARD_DISABLE_REASON'			=> 'Forum jest chwilowo niedostępne z powodu prac trwających w bazie danych. Sprawdź ponownie za kilka minut!',
	'BOARD_DISABLE_SUCCESS'			=> 'Forum zostało pomyślnie wyłączone!',

	'COLUMNS'						=> 'Kolumn',
	'CONFIG_SETTINGS'				=> 'Ustawienia konfiguracji',
	'CONFIG_UPDATE_SUCCESS'			=> 'Ustawienia konfiguracji zostały pomyślnie zaktualizowane!',
	'CONTINUE'						=> 'Kontynuuj',

	'DATABASE_CLEANER'				=> 'Wyczyść bazę danych',
	'DATABASE_CLEANER_EXTRA'		=> 'Wszelkie inne są dodatkowymi pozycjami dodanymi przez modyfikacje.  <strong>Jeśli zaznaczysz tę opcje zostaną one usunięte</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Jakiekolwiek pola z czerwonym tłem jak to oznaczają brakujące pozycje które powinny zostać dodane.  <strong>Jeśli zaznaczysz tę opcje zostaną one dodane</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Czyszczenie bazy danych zostało pomyślnie zakończone!<br /><br />Wykonaj kopię zapasową bazy danych ponownie.',
	'DATABASE_CLEANER_WARNING'		=> 'Narzędzie to NIE POSIADA GWARANCJI, przed użyciem powinieneś wykonać pełną kopię zapasową bazy danych.<br /><br />Zanim zaczniesz, upewnij się że posiadasz kopię zapasową bazy danych!',
	'DATABASE_CLEANER_WELCOME'		=> 'Witaj w narzędziu służącym do czyszczenia bazy danych!<br /><br />Narzędzie to zostało zaprojektowane do usuwania dodatkowych kolum, wierszy, i tabel z bazy danych nie jest dostępne w podstawowej instalacji phpBB3, i aby dodać brakujące elementy które mogą być potrzebne.<br /><br />Kiedy będziesz gotów aby kontynuować kliknij przycisk Kontynuuj aby uruchomić czyszczenie bazy danych (Twoje forum zostanie wyłączone na czas czyszczenia bazy danych).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Pomyślnie zaktualizowano kolumny w bazie danych!',
	'DATABASE_TABLES'				=> 'Tabele bazy danych',
	'DATABASE_TABLES_SUCCESS'		=> 'Pomyślnie zaktualizowano tabele w bazie danych!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'Role systemu phpBB zostały pomyślnie przywrócone!',
	'DATABASE_ROLES_SUCCESS'		=> 'Role zostały pomyślnie zaktualizowane!',
	'DATAFILE_NOT_FOUND'			=> 'Support toolkit nie mógł znaleźć wymaganego pliku z danymi dla Twojej wersji phpBB!',

	'EMPTY_PREFIX'					=> 'Brak prefiksu bazy danych',
	'EMPTY_PREFIX_CONFIRM'			=> 'Narzędzie czyszczenia bazy jest przed wprowadzeniem zmian w bazie danych, ale ponieważ nie używasz prefiksu tabel inne tabele nie używane przez phpBB mogą zostać zmienione. Czy jesteś pewien że chcesz kontynuować?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'Narzędzie czyszczenia bazy danych wykryło brak prefiksu w tabelach phpBB. Narzędzie sprawdzi <strong>wszystkie</strong> tabele w bazie danych. Zwróć szczególną uwagę i upewnij się że wyłączyłeś z procesu sprawdzania wszystkie tabele które nie należą do phpBB. Nie wyłączenie tabel które nie należą do phpBB może je uszkodzić.<br />Jeżeli nie jesteś pewien jak przejść przez ten proces możesz otrzymać pomoc na <a href="http://www.phpbb.com/community/viewforum.php?f=46">Forum Wsparcia phpBB</a>.',
	'ERROR'							=> 'Błąd',
	'EXTRA'							=> 'Dodatkowy',
	'EXTENSION_GROUPS_SUCCESS'		=> 'Rozszerzenia grup zostały pomyślnie zresetowane',
	'EXTENSIONS_SUCCESS'			=> 'Rozszerzenia zostały pomyślnie zresetowane',

	'FINAL_STEP'					=> 'To jest ostatni etap.<br /><br />Włączymy Twoje forum i wyczyścimy cache.',

	'INSTRUCTIONS'					=> 'Instrukcje',

	'MISSING'						=> 'Brakujący',
	'MODULE_UPDATE_SUCCESS'			=> 'Moduły zostały pomyślnie zaktualizowane!',

	'NO_BOT_GROUP'					=> 'Nie można zresetować botów, brakuje grupy Botów.',

	'PERMISSION_SETTINGS'			=> 'Opcje uprawnień',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Pomyślnie zaktualizowano ustawienia uprawnień!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Twoja wersja phpBB3 nie jest obsługiwana (lub brakuje jakiś plików Support Toolkit).<br />phpBB 3.0.0+ powinno być obsługiwane, może upłynąć trochę czasu pomiędzy wydaniem nowej wersji phpBB3 i aktualizacją tego narzędzia do obsługi najnowszej wersji.',

	'QUIT'							=> 'Wyjdź',

	'RESET_BOTS'					=> 'Resetuj Boty',
	'RESET_BOTS_EXPLAIN'			=> 'Czy chcesz zresetować listę botów do domyślnej listy botów znajdującej się w phpBB3?  Wszystkie boty zostaną usunięte i zastopione domyślnym zestawem botów.',
	'RESET_BOTS_SKIP'				=> 'Resetowanie botów zostało pominięte',
	'RESET_BOT_SUCCESS'				=> 'Pomyślnie zresetowano boty!',
	'RESET_MODULES'					=> 'Resetuj Moduły',
	'RESET_MODULES_EXPLAIN'			=> 'Czy chcesz zresetować moduły do domyślnych modułów znajdujących się w phpBB3?  Wszystkie moduły zostaną usunięte i zastąpione domyślnymi modułami znajdującymi się w phpBB3.',
	'RESET_MODULES_SKIP'			=> 'Resetowanie modułów zostało pominięte',
	'RESET_MODULE_SUCCESS'			=> 'Pomyślnie zresetowano wszystkie moduły!',
	'RESET_REPORT_REASONS'			=> 'Resetuj powody raportów',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Czy chciałbyś zresetować powód raportu do domyślnego? Spowoduje to usunięcie wszystkich dodatkowych powodów raportu!',
	'RESET_REPORT_REASONS_SKIP'		=> 'Powód raportu nie został zresetowany',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'Powody raportu zostały pomyślnie zresetowane!',
	'RESET_ROLE_DATA'				=> 'Resetuj dane roli',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Krok ten spowoduje zresetowanie systemu roli w phpBB do ich domyślnych wartości, zaleca się uruchomienie tej opcji jeżeli wprowadziłeś zmiany w poprzednim kroku.',
	'ROWS'							=> 'Wierszy',
	
	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'Nie zmieniono tabel',
		'columns'			=> 'Nie zmieniono kolumn',
		'config'			=> 'Nie zmieniono konfiguracji',
		'extension_groups'	=> 'Nie zmieniono rozszerzeń grup',
		'extensions'		=> 'Nie zmieniono rozszerzeń',
		'permissions'		=> 'Nie zmieniono uprawnień',
		'groups'			=> 'Nie zmieniono grup',
		'roles'				=> 'Nie zmieniono ról',
		'final_step'		=> 'Ostatni krok',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'Tabel w bazie danych nie zostały zmienione',
		'columns'			=> 'Kolumny w bazie danych nie zostały zmienione',
		'config'			=> 'Tabela konfiguracyjna nie posiada nowych/brakujących wartości',
		'extension_groups'	=> 'Tabela rozszerzeń grup nie posiada nowych/brakujących wartości',
		'extensions'		=> 'Domyślne rozszerzenia nie zostały zmienione',
		'permissions'		=> 'Nie wykonano zmian w tabeli uprawnień',
		'groups'			=> 'Nie wykonano zmian w systemie grup phpBB',
		'roles'				=> 'Nie dodano lub usunięto roli',
		'final_step'		=> 'Ostatni krok procesu wyczyści cache i włączy forum.',
	),
	'SUCCESS'						=> 'Sukces',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'System grup został pomyślnie zresetowany',

	'TYPE'							=> 'Typ',
	
	'UNSTABLE_DEBUG_ONLY'			=> 'Czyszczenie bazy danych może zostać uruchomione tylko na niestabilnych wersjach phpBB <em>(dev, a, b, RC)</em>, z włączonym trybem "DEBUG" w pliku config.php.',
));
