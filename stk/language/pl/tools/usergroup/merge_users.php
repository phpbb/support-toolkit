<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Złącz użytkowników',
	'MERGE_USERS_EXPLAIN'				=> 'Te narzędzie przenosi dane jednego użytkownika do innego konta. Kopiowane są ustawienia użytkownika źródłowego oraz jego członkostwo w grupach. Przenoszone dane obejmują uprawnienia, załączniki, blokady, zakładki, szkice, informacje o odwiedzinach forów/tematów, śledzenie forów/tematów, wpisy dzienników, głosy w ankietach, posty, prywatne wiadomości, zgłoszenia, tematy, ostrzeżenia, przyjaciół oraz wrogów.',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'Nie możesz złączyć założyciela z użytkownikiem innego typu.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Nie możesz złączyć bota ze zwykłym użytkownikiem.',

	'MERGE_USERS_MERGED'		=> 'Użytkownicy zostali złączeni.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Usuń użytkownika źródłowego',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Jeżeli zaznaczono, użytkownik źródłowy zostanie usunięty.',

	'MERGE_USERS_SAME_USERS'	=> 'Użytkownik źródłowy musi być inny od docelowego.',

	'MERGE_USERS_USER_SOURCE'			=> 'Użytkownik źródłowy',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Posty, prywatne wiadomości, uprawnienia, ostrzeżenia itd. zostały przeniesione od tego użytkownika do użytkownika docelowego. Skopiowano również członkostwo w grupach oraz ustawienia użytkownika.',

	'MERGE_USERS_USER_TARGET'	=> 'Użytkownik docelowy',
));
