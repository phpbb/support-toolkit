<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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
	'REPARSE_ALL'				=> 'Przetwórz znaczniki BBCode',
	'REPARSE_ALL_EXPLAIN'		=> 'Jeżeli zaznaczone, narzędzie przetworzy wszystkie treści witryny. Domyślnie przetwarzane są tylko posty/prywatne wiadomości/podpisy, które zostały wcześniej przetworzone przez phpBB. Opcja jest ignorowana w przypadku wybrania konkretnych postów, bądź prywatnych wiadomości.',
	'REPARSE_BBCODE'			=> 'Przetwórz znaczniki BBCode',
	'REPARSE_BBCODE_COMPLETE'	=> 'Znaczniki BBCode zostały przetworzone.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Czy na pewno chcesz przetworzyć wszystkie znaczniki BBCode? Pamiętaj, że te narzędzie może uszkodzić instalację phpBB. Z tego powodu <strong>wykonaj kopię bazy danych przed rozpoczęciem</strong>. Pamiętaj też, że ten proces może trwać dłuższą chwilę.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Ukończono etap: %1$d. Rozpoczynanie etapu: %2$d',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Przetwarzanie postów zostało zakończone. Inicjowanie przetwarzania prywatnych wiadomości.',
		2	=> 'Przetwarzanie prywatnych wiadomości zostało zakończone. Inicjowanie przetwarzania podpisów.',
	),
	'REPARSE_IDS_INVALID'			=> 'Podane identyfikatory (ID) nie były poprawne. Upewnij się, że zostały wpisane prawidłowo (np. 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Przetwórz wybrane posty',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Aby przetworzyć tylko wybrane posty, wpisz ich identyfikatory (ID), oddzielając je przecinkami.',
	'REPARSE_PM_IDS'				=> 'Przetwórz wybrane prywatne wiadomości',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Aby przetworzyć tylko wybrane prywatne wiadomości, wpisz ich identyfikatory (ID), oddzielając je przecinkami.',
));
