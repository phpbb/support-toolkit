<?php
/**
 *
 * @package Support Toolkit - Flash checker
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
	'FLASH_CHECKER'				=> 'Sprawdzanie Flash',
	'FLASH_CHECKER_CONFIRM'		=> 'W phpBB 3.0.7-pl1, znaleziono możliwe luki XSS we wbudowanym BBCode Flash. Ten problem został naprawiony w phpBB 3.0.8. Narzędzie to sprawdzi wszystkie posty, prywatne wiadomości i sygnatury pod kątem kodu w BBCode. Jeżeli zostanie znaleziony niebezpieczny kod, narzędzie to pozwoli Ci na szybkie ponowne parsowanie postów aby upewnić się iż Twoje forum jest bezpieczne. Sprawdź <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">wątek wydania phpBB 3.0.8</a> aby uzyskać więcej informacji o tym problemie.',
	'FLASH_CHECKER_FOUND'		=> 'Skrypt znalazł kilka potencjalnie niebezpiecznych BBCode\'ów Flash na Twoim forum. Kliknij <a href="%s">tutaj</a> aby parsować ponownie posty i prywatne wiadomości zawierające niebezpieczne BBCodey flash.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Nie znaleziono niebezpiecznych BBCode\'ów flash.',
));
