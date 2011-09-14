<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'					=> 'Aktualizator MySQL',
	'MYSQL_UPGRADER_BACKUP'				=> 'Narzędzie to jest potencjalnie niebezpieczne; upewnij się że wykonałeś kopie zapasową bazy danych przed jego uruchomieniem!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Narzędzie to zostało zaprojektowane do rozwiązywania kilku problemów powodowanych kiedy baza danych MySQL jest używana podczas aktualizacji instalacji phpBB. Aktualizacja spowoduje że schemat bazy danych nie będzie kompatybilny z najnowszą wersją <em>Zobacz również “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>” artykuł KB.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Pobierz',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Zaznaczając tę opcję aktualizator MySQL wygeneruje zapytania i wyświetli je Tobie, gdzie będziesz mógł pobrać plik z wynikami.',
	'MYSQL_UPGRADER_RESULT'				=> 'Poniżej znajdują się zapytania które muszą zostać wykonane aby zaktualizować schemat bazy danych do odpowiedniej wersji MySQL. Kliknij <a href="%s">tutaj</a> aby pobrać zapytania w pliku .sql.',
	'MYSQL_UPGRADER_RUN'				=> 'Uruchom',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Zaznaczając tę opcję aktualizator MySQL wygeneruje zapytania i automatycznie je uruchomi.<br />Może to zająć trochę czasu, <strong>Nie</strong> przerywaj procesu do czasu aż skrypt poinformuje Cię o zakończeniu procesu.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'Skrypt aktualizacji MySQL',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'Aktualizator MySQL został uruchomiony pomyślnie',
	
	'QUERY_FINISHED'	=> 'Ukończono wykonywanie zapytania %1$d z %2$d, przechodzę do następnego kroku.',

	'TOOL_MYSQL_ONLY'	=> 'Narzędzie to jest dostępne tylko dla użytkowników MySQL DBMS',
));
