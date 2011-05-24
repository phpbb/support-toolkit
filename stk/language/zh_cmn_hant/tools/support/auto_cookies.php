<?php
/**
*
* @package Support Toolkit - Auto Cookies
* @version $Id$
* @copyright (c) 2009 phpBB-TW (心靈捕手) http://phpbb-tw.net/phpbb/
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
	'AUTO_COOKIES'				=> '自動的 Cookies',
	'AUTO_COOKIES_EXPLAIN'		=> '這個工具允許您改變您論壇的 cookie 設定。它們所建議的設定大多數是正確的。如果您不能確定正確的設定，那麼在改變任何不正確的設定之前，請到支援論壇尋求指導，以避免您無法登入您的論壇。',

	'COOKIE_SETTINGS_UPDATED'	=> 'Cookie 設定已經成功地更新。',
));

?>