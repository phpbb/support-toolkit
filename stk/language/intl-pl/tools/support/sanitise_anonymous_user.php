<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'Dane profilu użytkownika Anonymous zostały pomyślnie wyczyszczone.',
	'ANONYMOUS_CORRECT'					=> 'Użytkownik Anonymous istnieje i jest poprawnie skonfigurowany.',
	'ANONYMOUS_CREATED'					=> 'Ponowne utworzenie użytkownika Anonymous zakończyło się pomyślnie.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Nie można utworzyć użytkownika Anonymous. Więcej informacji i pomoc uzyskasz na phpBB.com.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'Użytkownik Anonymous został pomyślnie usunięty ze wszystkich grup dostępu.',
	'ANONYMOUS_MISSING'					=> 'Brak użytkownika Anonymous.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'Brak użytkownika Anonymous w bazie danych. Użytkownik ten jest wykorzystywany do tego aby goście mogli odwiedzać Twoje forum. Czy chcesz utworzyć użytkownika Anonymous?',
	'ANONYMOUS_WRONG_DATA'				=> 'Dane profilu użytkownika Anonymous nie są prawidłowe.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Dane profilu użytkownika Anonymous są częściowo niepoprwne. Czy chciałbyś to naprawić?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Użytkownik Anonymous należy do kilku grup użytkowników.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Użytkownik Anonymous należy do kilku grup użytkowników. Czy chciałbyś usunąć użytkownika Anonymous z wszystkich grup z wyjątkiem grupy "GOŚCIE"?',

	'REDIRECT_NEXT_STEP'				=> 'Zostaniesz przekierowany do następnego kroku.',

	'SANITISE_ANONYMOUS_USER'			=> 'Wyczyść użytkownika Anonymous',
));

?>