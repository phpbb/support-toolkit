<?php
/**
 *
 * @package Support Toolkit - Flash checker
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
	'FLASH_CHECKER'				=> 'Przeskanuj znaczniki Flash',
	'FLASH_CHECKER_CONFIRM'		=> 'W phpBB 3.0.7-pl1 istniała możliwość ataku XSS poprzez znacznik Flash. Problem ten został rozwiązany w phpBB 3.0.8. Te narzędzie sprawdzi wszystkie posty, prywatne wiadomości oraz podpisy pod kątem niebezpiecznych znaczników. W przypadku ich znalezienia posty zostaną przetworzone, aby upewnić się czy witryna jest bezpieczna. Sprawdź <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">ogłoszenie wydania phpBB 3.0.8</a>, aby dowiedzieć się więcej na temat tej kwestii.',
	'FLASH_CHECKER_FOUND'		=> 'Skaner znalazł potencjalnie niebezpieczne znaczniki Flash na Twojej witrynie. Kliknij <a href="%s">tutaj</a>, aby przetworzyć posty i prywatne wiadomości zawierające te znaczniki BBCode.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Brak potencjalnie niebezpiecznych znaczników Flash.',
));
