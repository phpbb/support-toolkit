<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translation (c) 2011 Olympus.pl http://www.phpbb.pl
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
   'BACK_TOOL'							=> 'Wróć do poprzedniego narzędzia',
   'BOARD_FOUNDER_ONLY'					=> 'Tylko użytkownicy ze statusem założyciela witryny mają dostęp do pakietu Support Toolkit.',

   'CAT_ADMIN'							=> 'Narzędzia administratora',
   'CAT_ADMIN_EXPLAIN'					=> 'Narzędzia w tej sekcji mogą pomóc Ci zarządzać pewnymi aspektami Twojej witryny i rozwiązać powszechne problemy.',
   'CAT_DEV'							=> 'Narzędzia dewelopera',
   'CAT_DEV_EXPLAIN'					=> 'Narzędzia w tej sekcji pomagają deweloperom i twórcom modyfikacji wykonywać powszechne czynności.',
   'CAT_ERK'							=> 'Zestaw naprawczy',
   'CAT_ERK_EXPLAIN'					=> 'Zestaw naprawczy to osobny pakiet STK, który sprawdza i wykrywa błędy w instalacji phpBB. Kliknij <a href="%s">tutaj</a>, aby uruchomić ten zestaw.',
   'CAT_MAIN'							=> 'Ogólne',
   'CAT_MAIN_EXPLAIN'					=> 'Pakiet Support Toolkit jest używany do rozwiązywania najczęściej występujących problemów z phpBB 3.0.x. Jest swego rodzaju drugim panelem administracji, dostarczającym zestaw funkcji pozwalających przywrócić instalację phpBB3 do prawidłowego funkcjonowania.',
   'CAT_SUPPORT'						=> 'Narzędzia wsparcia',
   'CAT_SUPPORT_EXPLAIN'				=> 'Narzędzia w tej sekcji mogą pomóc Ci naprawić nieprawidłowo działającą instalację phpBB 3.0.x.',
   'CAT_USERGROUP'						=> 'Użytkownicy i grupy',
   'CAT_USERGROUP_EXPLAIN'				=> 'Narzędzia w tej sekcji pozwalają Ci zarządzać użytkownikami i grupami w sposób, który nie jest oferowany przez zwykłą instalację phpBB 3.0.x.',
   'CONFIG_NOT_FOUND'					=> 'Plik konfiguracyjny pakietu STK nie mógł zostać załadowany. Sprawdź instalację.',

   'DOWNLOAD_PASS'						=> 'Pobierz plik z hasłem.',

   'EMERGENCY_LOGIN_NAME'				=> 'Zastępcze logowanie do pakietu',
   'ERK'						=> 'Zestaw naprawczy',

   'FAIL_REMOVE_PASSWD'					=> 'Plik z hasłem nie mógł zostać usunięty. Musisz zrobić to ręcznie!',

   'GEN_PASS_FAILED'					=> 'Pakiet Support Toolkit nie mógł utworzyć pliku z hasłem. Spróbuj ponownie.',
   'GEN_PASS_FILE'						=> 'Wygeneruj plik z hasłem.',
   'GEN_PASS_FILE_EXPLAIN'				=> 'Jeżeli nie jesteś wstanie zalogować się do witryny phpBB, możesz użyć wewnętrznej metody uwierzytelnienia oferowanej przez pakiet Support Toolkit. Aby to zrobić <a href="%s"><strong>wygeneruj</strong></a> plik z hasłem.',

   'INCORRECT_CLASS'					=> 'Nieprawidłowa klasa w: stk/tools/%1$s.%2$s',
   'INCORRECT_PASSWORD'					=> 'Nieprawidłowe hasło',
   'INCORRECT_PHPBB_VERSION'			=> 'Twoja wersja phpBB nie jest kompatybilna z pakietem Support Toolkit. Musisz posiadać phpBB co namniej w wersji %1$s lub nowszej.',

   'LOGIN_STK_SUCCESS'					=> 'Autoryzacja przebiegła prawidłowo. Za chwilę nastąpi przekierowanie do pakietu Support Toolkit.',

   'NOTICE'								=> 'Powiadomienie',
   'NO_VERSION_FILE'					=> 'Pakiet Support Toolkit nie był wstanie określić czy używana wersja jest aktualna. Odwiedź <a href="http://phpbb.com/support/stk">stronę pakietu na phpBB.com</a> i upewnij się, czy używasz najnowszej wersji.',

   'PASS_GENERATED'						=> 'Plik z Twoim hasłem do pakietu STK został wygenerowany!<br/>Wygenerowane hasło: <em>%1$s</em><br />Hasło traci ważność: <span style="text-decoration: underline;">%2$s</span>. Po tej dacie <strong>musisz</strong> wygenerować nowe, aby w dalszym ciągu używać awaryjnego logowania!<br /><br />Skorzystaj z poniższego przycisku, aby pobrać plik. Następnie wgraj go na swój serwer do katalogu "stk".',
   'PASS_GENERATED_REDIRECT'			=> 'Po wgraniu pliku z hasłem na serwer kliknij <a href="%s">tutaj</a>, aby wrócić do strony logowania.',
   'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Narzędzie nie jest kompatybilne z używaną wersją phpBB',
   'PROCEED_TO_STK'						=> '%sPrzejdź do pakietu Support Toolkit%s',

   'STK_FOUNDER_ONLY'					=> 'Musisz zalogować się ponownie zanim użyjesz pakietu Support Toolkit.',
   'STK_LOGIN'							=> 'Logowanie do pakietu Support Toolkit',
   'STK_LOGIN_WAIT'						=> 'Musisz poczekać trzy sekundy przed powtórną próbą logowania.',
   'STK_LOGOUT'							=> 'Wyloguj z pakietu',
   'STK_LOGOUT_SUCCESS'					=> 'Wylogowano z pakietu Support Toolkit.',
   'STK_NON_LOGIN'						=> 'Zaloguj się, aby uzyskać dostęp do pakietu STK.',
   'STK_OUTDATED'						=> 'Używana przez Ciebie instalacja pakietu Support Toolkit jest nieaktualna. Ostatnią, dostępną wersją jest <strong style="color: #008000;">%1$s</strong>, kiedy Twoja wersja to <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Narzędzie ma duży wpływ ma instalację phpBB, dlatego zostało wyłączone do czasu jego aktualizacji. Korzystanie z najnowszych wersji oprogramowania jest bardzo zalecane. Informację na temat aktualizacji do ostatniej wersji znajdziesz w <a href="%3$s">temacie o wydaniu</a>.<br /><br /><em>Jeżeli ta informacja wyświetla się, mimo aktualizacji, kliknij <a href="%4$s">tutaj</a>, aby wyczyścić bufor wersji.</em>',
   'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
   'SUPPORT_TOOL_KIT_INDEX'				=> 'Indeks pakietu',
   'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Hasło',
   'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Przez wpisanie hasła potwierdzasz, że jesteś zarządcą witryny.<br /><br /><strong>Pamiętaj o włączeniu obsługi ciasteczek w Twojej przeglądarce!</strong>',

   'TOOL_INCLUTION_NOT_FOUND'			=> 'Narzędzie próbuje załadować nieistniejący plik (%1$s).',
   'TOOL_NAME'							=> 'Nazwa narzędzia',
   'TOOL_NOT_AVAILABLE'					=> 'Wybrane narzędzie jest niedostępne.',

   'USING_STK_LOGIN'					=> 'Jesteś zalogowany przez wewnętrzną metodę uwierzytelnienia STK. Korzystanie z tej metody jest zalecane <strong>tylko</strong> w przypadku braku możliwości zalogowania do witryny phpBB.<br />Aby wyłączyć tę metodę kliknij <a href="%1$s">tutaj</a>.',
));
