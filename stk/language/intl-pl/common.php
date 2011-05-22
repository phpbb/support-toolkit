<?php
/**
*
* @package Support Toolkit
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
   'BACK_TOOL'							=> 'Powróć do ostatniego narzędzia',
   'BOARD_FOUNDER_ONLY'					=> 'Tylko założyciele forum posiadają dostęp do Support Toolkit.',

   'CAT_ADMIN'							=> 'Narzędzia Administracyjne',
   'CAT_ADMIN_EXPLAIN'					=> 'Narzędzia Administracyjne mogą być użyte przez administratora do zarządzania poszczególnymi aspektami ich forów i rozwiązywania ogólnych problemów.',
   'CAT_DEV'							=> 'Narzędzia Developerskie',
   'CAT_DEV_EXPLAIN'					=> 'Narzędzia Developerskie mogą być użyte przez developerów phpBB i autorów modyfikacji do wykonywania ogólnych zadań.',
   'CAT_ERK'							=> 'Zapasowy zestaw naprawczy',
   'CAT_ERK_EXPLAIN'					=> 'Zapasowy zestaw naprawczy jest oddzielnym pakietem STK który przeprowadza testy które mogą wykryć problemy z instalacją phpBB które mogą spowodować iż forum przestanie działać. Kliknij <a href="%s">tutaj</a> aby uruchomić ZZN.',
   'CAT_MAIN'							=> 'Główne',
   'CAT_MAIN_EXPLAIN'					=> 'Support Toolkit (STK) może być wykorzystane do naprawy ogólnych problemów działającej instalacji phpBB 3.0.x. Służy jako drugi Panel Administracyjny, dostarcza administratorowi zestawu narzędzi do rozwiązywania ogólnych problemów które mogą zapobiec niewłaściwemu działaniu instalacji phpBB3.',
   'CAT_SUPPORT'						=> 'Narzędzia wsparcia',
   'CAT_SUPPORT_EXPLAIN'				=> 'Narzędzia wsparcia mogą zostać użyte do odzyskania instalacji phpBB 3.0.x która nie działa poprawnie.',
   'CAT_USERGROUP'						=> 'Narzędzia Użytkownicy/Grupy',
   'CAT_USERGROUP_EXPLAIN'				=> 'Narzędzia Użytkownicy/Grupy  mogą zostać użyte do zarządzania użytkownikami i grupami w sposób który nie jest dostępny w podstawowej instalacji phpBB 3.0.x.',
   'CONFIG_NOT_FOUND'					=> 'Nie można załadować pliku konfiguracyjego STK. Sprawdź instalację',

   'DOWNLOAD_PASS'						=> 'Pobierz plik hasła.',

   'EMERGENCY_LOGIN_NAME'				=> 'Zapasowe logowanie STK',
   'ERK'								=> 'Zapasowy zestaw naprawczy',

   'FAIL_REMOVE_PASSWD'					=> 'Nie można usunąć wygasłego pliku hasła. Usuń ten plik ręcznie!',

   'GEN_PASS_FAILED'					=> 'Support Toolkit nie był w stanie wygenerować nowego hasła. Spróbuj ponownie.',
   'GEN_PASS_FILE'						=> 'Wygeneruj plik z hasłem.',
   'GEN_PASS_FILE_EXPLAIN'				=> 'Jeżeli nie byłeś w stanie zalogować się do phpBB możesz użyć wewnętrznej metody uwierzytelnienia Support Toolkit. Aby użyć tej metody musisz <a href="%s"><strong>wygenerować</strong></a> nowy plik z hasłem.',

   'INCORRECT_CLASS'					=> 'Niepoprawna klasa w: stk/tools/%1$s.%2$s',
   'INCORRECT_PASSWORD'					=> 'Niepoprawne hasło',
   'INCORRECT_PHPBB_VERSION'			=> 'Twoja wersja phpBB nie jest kompatybilna z tym narzędziem. Twoja instalacja phpBB musi być w wersji %1$s lub nowszej aby użyć tego narzędzia',

   'LOGIN_STK_SUCCESS'					=> 'Zostałeś pomyślnie uwierzytelniony i zostanie przekierowany do strony głównej Support Toolkit.',

   'NOTICE'								=> 'Uwaga',
   'NO_VERSION_FILE'					=> 'Support Toolkit (STK) nie jest w stanie ustalić ostatniej wersji. Przejdź do <a href="http://phpbb.com/support/stk">Sekcji Support Toolkit na phpBB.com</a> i sprawdź czy używasz ostatniej wersji przed użyciem STK.',

   'PASS_GENERATED'						=> 'Twoje hasło do STK zostało pomyślnie wygenerowane!<br/>Hasło które zostało wygenerowane to: <em>%1$s</em><br />To hasło wygaśnie: <span style="text-decoration: underline;">%2$s</span>. Po tym czasie <strong>musisz</strong> wygenerować nowy plik z hasłem aby użyć funkcji zapasowego logowania!<br /><br />Kliknij na przycisk aby pobrać plik. Plik należy umieścić na serwerze w katalogu "stk"',
   'PASS_GENERATED_REDIRECT'			=> 'Jeżeli umieściłeś plik z hasłem we właściwej lokalizacji, kliknij <a href="%s">tutaj</a> aby powrócić do strony logowania.',
   'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'To narzędzie nie jest kompatybilne z wersją phpBB której aktualnie używasz',
   'PROCEED_TO_STK'						=> '%sPrzejdź do Support Toolkit%s',

   'STK_FOUNDER_ONLY'					=> 'Musisz się uwierzytelnić ponownie zanim będziesz w stanie użyć Support Toolkit!',
   'STK_LOGIN'							=> 'Zaloguj Support Toolkit',
   'STK_LOGIN_WAIT'						=> 'Możesz logować się tylko jeden raz co 3 sekundy, spróbuj ponownie.',
   'STK_LOGOUT'							=> 'Wyloguj STK',
   'STK_LOGOUT_SUCCESS'					=> 'Zostałeś pomyślnie wylogowany z the Support Toolkit.',
   'STK_NON_LOGIN'						=> 'Zaloguj się aby skorzystać z STK.',
   'STK_OUTDATED'						=> 'Twoja instalacja Support Toolkit nie jest aktualna. Ostatnia dostępna wersja to <strong style="color: #008000;">%1$s</strong>, podczas gdy Twoja wersja to <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Ze względu na duży wpływ tego narzędzia na Twoją instalację phpBB, zostało ono wyłączone do czasu wykonania aktualizacji. Zalecamy aby wszystkie skrypty które są zainstalowane na Twoim serwerze były aktualne. Więcej informacji dotyczących ostatniej aktualizacji, znajdziesz <a href="%3$s">w wątku wydań</a>.<br /><br /><em>Jeśli widzisz ten komunikat po aktualizacji do najnowszej wersji Support Toolkit, kliknij <a href="%4$s">tutaj</a> aby wyczyścić cache wersji.</em>',
   'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
   'SUPPORT_TOOL_KIT_INDEX'				=> 'Support Toolkit- Strona główna',
   'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Hasło',
   'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Ponieważ nie jesteś zalogowany do phpBB3 musisz zweryfikować dane iż jesteś założycielem forum poprzez wpisanie hasła dla Support Toolkit.<br /><br /><strong>Twoja przeglądarka musi akceptować cookies / ciasteczka w przeciwnym razie nie będziesz mógł pozostać zalogowany.</strong>',

   'TOOL_INCLUTION_NOT_FOUND'			=> 'To narzędzie próbuje załadować plik który nie istnieje: %1$s',
   'TOOL_NAME'							=> 'Nazwa narzędzia',
   'TOOL_NOT_AVAILABLE'					=> 'Żądane narzędzie nie jest dostępne!',

   'USING_STK_LOGIN'					=> 'Zostałeś zalogowany używając wewnętrznej metody uwierzytelnienia STK. Zaleca się używania tej metody <strong>tylko</strong> gdy nie posiadasz możliwości zalogowania się do phpBB.<br />Aby wyłączyć tę metode uwierzytelnienia kliknij <a href="%1$s">tutaj</a>.',
));

?>