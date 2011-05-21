<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id: 
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Połącz użytkowników',
	'MERGE_USERS_EXPLAIN'				=> 'Narzędzie to służy do przenoszenia dorobku konta użytkownika do innego konta, ustawienia i przynależności do grup zostaną skopiowane od użytkownika źródłowego. Dorobkiem są: uprawnienia, załączniki, bany, zakładki, szkice, forum/śledzenie tematów, forum/obserwowanie tematów, logi, głosy w ankietach, posty, prywatne wiadomości, raporty, tematy, ostrzeżenia, przyjaciele i wrogowie.',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'Nie możesz połączyć założyciela z użytkownikiem który nie jest założycielem.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Nie możesz połączyć bota z normalnym użytkownikiem.',
	
	'MERGE_USERS_MERGED'		=> 'Użytkownicy zostali pomyślnie połączeni.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Usuń użytkownika źródłowego',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Jeśli zaznaczone narzędzie to usunie użytkownika źródłowego z forum.',

	'MERGE_USERS_SAME_USERS'	=> 'Źródłowy i docelowy użytkownik musi być inny.',

	'MERGE_USERS_USER_SOURCE'			=> 'Źródłowy użytkownik',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Posty, prywatne wiadomości, uprawnienia, ostrzeżenia, itd. zostaną przeniesione od użytkownika źródłowego do użytkownika docelowego, przynależność do grup i ustawienia użytkownika zostaną skopiowane.',

	'MERGE_USERS_USER_TARGET'	=> 'Docelowy użytkownik',
));
