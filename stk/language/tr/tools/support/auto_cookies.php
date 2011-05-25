<?php
/**
*
* @package Support Toolkit - Auto Cookies
* @version $Id: auto_cookies.php 277 2010-01-20 01:38:28Z iwisdom $
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
	'AUTO_COOKIES'				=> 'Otomatik Çerezler',
	'AUTO_COOKIES_EXPLAIN'		=> 'Bu araç forumunuzun çerez ayarlarını değiştirmenize izin verir. Çoğu durumlarda önerilen ayarlar geçerli olmalıdır. Eğer ayarların geçerliliğinden emin değilseniz, lütfen herhangi bir ayarı değiştirmeden önce Destek Forumundaki rehberleri araştırın. Ayarları yanlış olarak ayarlamak forumunuza giriş yapmanızı engelleyebilir.',

	'COOKIE_SETTINGS_UPDATED'	=> 'Çerez ayarları başarıyla güncellendi.',
));
