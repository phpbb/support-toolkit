<?php
/**
 *
 * @package Support Toolkit - Flash checker
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @translated by phpBBArabia http://www.phpbbarabia.com 
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
	'FLASH_CHECKER'				=> 'فحصل الفلاش',
	'FLASH_CHECKER_CONFIRM'		=> 'في اصدار phpBB 3.0.7-pl1, كان من الممكن استغلال خاصية  XSS كثغرة امنيه محتمله مدمجه في شاشة الفلاش و تم حل هذه المشكلة مع الاصدار phpBB 3.0.8. هذه الاداة ستقوم بفحص جميع المواضيع, جميع المشاركات و جميع الرسائل الخاصة و التوقيعات للبحث عن ثغرة امنيه. ان وجدت قم بالتاكد من سلامة منتداك . راجع <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">the phpBB 3.0.8 release announcement</a> لمعلومات اكثر.',
	'FLASH_CHECKER_FOUND'		=> 'اداة فحص الفلاش عثرت على ثغرات امنيه خطيرة في مشغل الفلاش flash BBCodes في منتداك. اضغط <a href="%s">هنا</a> لإعادة توزيع المشاركات و الرسائل الشخصية التي تحتوي على flash BBCode.',
	'FLASH_CHECKER_NO_FOUND'	=> 'لم يتم العثور على ثغرة امنية flash BBCodes .',
));
