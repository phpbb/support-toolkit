<?php
/**
*
* @package Support Toolkit - Make Founder
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
	'DEMOTE_FAILED'				=> 'Nie można usunąć statusu założyciela dla wszystkich użytkownikaów!',
	'DEMOTE_FOUNDERS'			=> 'Zdegraduj założycieli',
	'DEMOTE_SUCCESSFULL'		=> 'Pomyślnie usunięto status założyciela dla %d użytkowników!',

	'FOUNDERS'					=> 'Użytkownicy ze statusem założyciela',

	'MAKE_FOUNDER'				=> 'Awansuj użytkownika na założyciela forum',
	'MAKE_FOUNDER_CONFIRM'		=> 'Czy jesteś pewien że chcesz awansować <a href="%1$s">%2$s</a> na założyciela forum?  <a href="%1$s">%2$s</a> będzie posiadał możliwość usunięcia Twojego konta, między innymi uprawnienia.',
	'MAKE_FOUNDER_FAILED'		=> 'Nie można awansować tego użytkownika na założyciela forum',
	'MAKE_FOUNDER_SUCCESS'		=> 'Pomyślnie awansowano <a href="%1$s">%2$s</a> na założyciela forum.',
	'MANAGE_FOUNDERS'			=> 'Zarządzaj założycielami forum',
	
	'NO_FOUNDERS'				=> 'Nie znaleziono założycieli',

	'PROMOTE_FOUNDER'			=> 'Awansuj na założyciela',

	'USER_TO_FOUNDER'			=> 'Użytkownik na założyciela',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'Wpisz nazwę użytkownika lub ID użytkownika którego chcesz awansować na założyciela forum.',
));
