<?php
/**
*
* @package Support Toolkit - Make Founder
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
	'DEMOTE_FAILED'				=> 'Nie udało się usunąć statusu założyciela wszystkich użytkowników!',
	'DEMOTE_FOUNDERS'			=> 'Usuń status założyciela',
	'DEMOTE_SUCCESSFULL'		=> 'Liczba użytkowników, którym został usunięty status założyciela: %d!',

	'FOUNDERS'					=> 'Użytkownicy ze statusem założyciela',

	'MAKE_FOUNDER'				=> 'Przyznaj status założyciela witryny',
	'MAKE_FOUNDER_CONFIRM'		=> 'Czy na pewno chcesz przyznać użytkownikowi <a href="%1$s">%2$s</a> status założyciela witryny? To da mu możliwość usuwania kont i inne uprawnienia.',
	'MAKE_FOUNDER_FAILED'		=> 'Nie udało się przyznać użytkownikowi statusu założyciela.',
	'MAKE_FOUNDER_SUCCESS'		=> 'Status założyciela witryny został przyznany użytkownikowi <a href="%1$s">%2$s</a>.',
	'MANAGE_FOUNDERS'			=> 'Założyciele witryny',

	'NO_FOUNDERS'				=> 'Brak użytkowników ze statusem założyciela.',

	'PROMOTE_FOUNDER'			=> 'Przyznaj status założyciela witryny',

	'USER_TO_FOUNDER'			=> 'Użytkownik',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'Wprowadź nazwę, albo ID użytkownika, któremu chciałbyś przyznać status założyciela witryny.',
));
