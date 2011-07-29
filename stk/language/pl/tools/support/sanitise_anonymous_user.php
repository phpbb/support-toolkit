<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'Dane konta gościa zostało odtworzone.',
	'ANONYMOUS_CORRECT'					=> 'Konto gościa istnieje i jest prawidłowo skonfigurowane.',
	'ANONYMOUS_CREATED'					=> 'Konto gościa zostało utworzone ponownie.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Nie udało się utworzyć konta gościa. Szukaj wsparcia na forum wsparcia phpBB.pl.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'Konto gościa zostało usunięte ze wszystkich grup.',
	'ANONYMOUS_MISSING'					=> 'Brakuje konta gościa.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'Konto gościa nie istnieje w bazie danych. Ten użytkownik pozwala gościom na odwiedzanie Twojej witryny. Czy chcesz utworzyć nowe konto gościa?',
	'ANONYMOUS_WRONG_DATA'				=> 'Dane konta gościa są nieprawidłowe.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Dane konta gościa są częściowo nieprawidłowe. Czy chcesz to naprawić?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Konto gościa należy do wielu grup użytkowników.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Konto gościa należy do wielu grup użytkowników. Czy chcesz je usunąć ze wszystkich grup, za wyjątkiem grupy "Goście"?',

	'REDIRECT_NEXT_STEP'				=> 'Przekierowywanie do następnego etapu.',

	'SANITISE_ANONYMOUS_USER'			=> 'Odtwórz konto gościa',
));
