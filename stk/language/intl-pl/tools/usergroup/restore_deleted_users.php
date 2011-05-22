<?php
/**
*
* @package Support Toolkit - Restore Delted Users
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
	'NO_DELETED_USERS'	=> 'Brak usuniętych użytkowników których można przywrócić',
	'NO_USER_SELECTED'	=> 'Nie wybrano użytkowników!',

	'RESTORE_DELETED_USERS'						=> 'Przywróć usuniętych użytkowników',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Przywróć usuniętych użytkowników :: Konflikt',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Narzędzie to pozwoli Ci na przywrócenie użytkowników którzy zostali usunięci z forum ale ciągle posiadają posty na forum napisane jako "gość".<br />Użytkownicy otrzymają losowe hasło które musi zostać zresetowane ręcznie. Narzędzie to nie dostarcza listy wygenerowanych haseł dla poszczególnych użytkowników!<br /><br />Podczas ostatniego uruchomienia narzędzia znaleziono nazwy użytkowników którzy już istnieją na tym forum. Zmień nazwę dla tych użytkowników.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Narzędzie to pozwoli Ci na przywrócenie użytkowników którzy zostali usunięci z forum ale ciągle posiadają posty na forum napisane jako "gość".<br />Użytkownicy otrzymają losowe hasło które musi zostać zresetowane ręcznie. Narzędzie to nie dostarcza listy wygenerowanych haseł dla poszczególnych użytkowników!',

	'SELECT_USERS'	=> 'Wybierz użytkownika aby go przywrócić',

	'USER_RESTORED_SUCCESSFULLY'	=> 'Pomyślnie przywrócono wybranego użytkownika.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Pomyślnie przywrócono wybranych użytkowników.',
));
