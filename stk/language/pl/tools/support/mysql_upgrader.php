<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'					=> 'Zaktualizuj schemat bazy danych',
	'MYSQL_UPGRADER_BACKUP'				=> 'Te narzędzie może uszkodzić instalację phpBB3. Przed rozpoczęciem, wykonaj kopię swojej bazy danych!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Te narzędzie zostało stworzone w celu rozwiązywania problemów wynikających z aktualizacji wersji MySQL na Twoim serwerze. This upgrade will cause the database schema to become incompatible with the new version <em>See also the “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>” KB article.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Aktualizacja ręczna',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Narzędzie wyświetli zapytania i da możliwość ich pobrania.',
	'MYSQL_UPGRADER_RESULT'				=> 'Poniżej znajdują się zapytania aktualizujące schemat bazy, tak aby był zgodny z używaną wersją MySQL. Kliknij <a href="%s">tutaj</a>, aby pobrać plik .sql z zapytaniami.',
	'MYSQL_UPGRADER_RUN'				=> 'Aktualizacja automatyczna',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Narzędzie automatycznie wykona zapytania w bazie danych.<br />Ta operacja może trwać dłuższy okres czasu, dlatego <strong>nie przerywaj</strong> tego procesu przed zakończeniem.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'Skrypt aktualizacji',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'Aktualizacja została uruchomiona.',
	
	'QUERY_FINISHED'	=> 'Wykonane zapytania: %1$d z %2$d, aby kontynuować przejdź do następnego etapu.',

	'TOOL_MYSQL_ONLY'	=> 'Narzędzie jest przeznaczone tylko dla użytkowników bazy danych MySQL',
));
