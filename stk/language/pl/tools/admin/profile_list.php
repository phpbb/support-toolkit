<?php
/**
*
* @package Support Toolkit - Profile List
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
	'ALL'					=> 'Wszystkie',

	'CLICK_TO_DELETE'		=> 'Usuń zaznaczonych użytkowników klikając w ten przycisk. <em>(Nie można cofnąć!)</em>',

	'FILTER'				=> 'Filtr',

	'LIMIT'					=> 'Limit',

	'ONLY_NON_EMPTY'		=> 'Tylko niepuste',
	'ORDER_BY'				=> 'Sortuj według',

	'PROFILE_LIST'			=> 'Lista profili',
	'PROFILE_LIST_EXPLAIN'	=> 'Te narzędzie wyświetla informacje o różnych użytkownikach. Może być także używane do wykrywania kont spamerskich.',

	'USERS_DELETE'				=> 'Usuń zaznaczonych użytkowników',
	'USERS_DELETE_CONFIRM'		=> 'Czy na pewno chcesz usunąć wybranych użytkowników? Usuwanie użytkowników poprzez te narzędzie <strong>usunie</strong> również wszystkie ich posty.',
	'USERS_DELETE_SUCCESSFULL'	=> 'Wybrani użytkownicy zostali usunięci.',
));
