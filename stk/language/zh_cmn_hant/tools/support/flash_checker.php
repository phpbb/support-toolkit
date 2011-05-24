<?php
/**
 *
 * @package Support Toolkit - Flash checker
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
	'FLASH_CHECKER'				=> 'Flash 檢查員',
	'FLASH_CHECKER_CONFIRM'		=> '在 phpBB 3.0.7-PL1 中，一個可能易受攻擊的 XSS 漏洞，被發現在內嵌的 flash BBCode。這個問題已經在 phpBB 3.0.8 解決。這個工具將針對此有漏洞的 BBCode，檢查所有的文章、私訊以及簽名檔。如果發現到，那麼它允許您快速地重新解析它們，以確保論壇的安全。瀏覽 <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">phpBB 3.0.8 發布公告</a> 以獲取關於此問題的更多資訊。',
	'FLASH_CHECKER_FOUND'		=> '這 flash 檢查員發現了一些潛在危險的 flash BBcodes 在您的論壇中。按 <a href="%s">這裡</a> 以重新解析包含這個 flash BBCode 的文章和私訊。',
	'FLASH_CHECKER_NO_FOUND'	=> '沒有發現潛在危險的 flash BBcodes。',
));

?>