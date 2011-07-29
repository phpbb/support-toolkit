<?php
/**
*
* @package Support Toolkit - Restore Delted Users
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
	'NO_DELETED_USERS'	=> 'Brak użytkowników do odtworzenia',
	'NO_USER_SELECTED'	=> 'Nie zaznaczono użytkowników!',

	'RESTORE_DELETED_USERS'						=> 'Odtwórz usuniętych użytkowników',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Odtwórz usuniętych użytkowników :: Konflikt',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Te narzędzie pozwala odtworzyć usuniętych użytkowników, którzy pozostawili swoje posty.<br />Odtworzonym użytkownikom zostanie ustawione losowe hasła, które będą musiały zostać zresetowane po tym procesie. Narzędzie <b>nie</b> oferuje listy tych haseł.<br /><br />Podczas uruchomienia narzędzia znaleziono użytkowników, których nazwy są takie same jak już istniejących na witrynie. Określ nowe nazwy dla tych użytkowników.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Te narzędzie pozwala odtworzyć usuniętych użytkowników, którzy pozostawili swoje posty.<br />Odtworzonym użytkownikom zostanie ustawione losowe hasła, które będą musiały zostać zresetowane po tym procesie. Narzędzie <b>nie</b> oferuje listy tych haseł.',

	'SELECT_USERS'	=> 'Zaznacz użytkowników do odtworzenia',

	'USER_RESTORED_SUCCESSFULLY'	=> 'Wybrany użytkownik został odtworzony.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Wybrani użytkownicy zostali odtworzeni.',
));
