<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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

/**
* DO NOT CHANGE
*/
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
// í ª ì î Ö
//

$lang = array_merge($lang, array(
    'REPARSE_ALL'				=> 'Parsuj ponownie wszystkie BBCodey',
	'REPARSE_ALL_EXPLAIN'		=> 'Jeśli zaznaczone, BBCodey zostaną ponownie parsowane w całej zawartości forum; domyślnie, narzędzie parsuje ponownie posty/prywatne wiadomości/sygnatury które zstały poprzednio parsowane przez phpBB.',
	'REPARSE_BBCODE'			=> 'Parsuj ponownie BBCodey',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBCodey zostały ponownie parsowane.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Czy jesteś pewien że chcesz ponownie parsować wszystkie BBCodey? Należy pamiętać, że narzędzie to może przyczynić się do uszkodzenia bazy danych zamiast naprawy; zatem, <strong>upewnij się że wykonałeś kopię zapasową bazy danych przed użyciem tego narzędzia</strong>. Co więcej, praca tego narzędzia może wymagać trochę czasu aby zakończyć zadanie.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Krok %1$d zakończony. Przechodzę do kroku %2$d za chwilę...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Ukończono parsowanie postów, przechodzę do prywatnych wiadomości.',
		2	=> 'Ukończono parsowanie prywatnych wiadomości, przechodzę do sygnatur.',
	),
	'REPARSE_IDS_INVALID'			=> 'Wpisane ID nie istnieje; upewnij się że ID postów oddzielone są przecinkiem (np. 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Parsuj ponownie określone posty',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Aby parsować ponownie tylko określone posty, wpisz ID postów oddzielonych przecinkiem.',
	'REPARSE_PM_IDS'				=> 'Parsuj ponownie określone PW',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Aby parsować ponownie tylko określone PW, wpisz ID PW oddzielonych przecinkiem (e.g. 1,2,3,5,8,13).',
));

?>