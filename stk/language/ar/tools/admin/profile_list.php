<?php
/**
*
* @package Support Toolkit - Profile List
* @version $Id$
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
	'ALL'					=> 'الكل',

	'CLICK_TO_DELETE'		=> 'حذف جميع المستخدمين المحددين باستخدام هذا الزر. <em>(لا يمكن إلغاؤه!)</em>',

	'FILTER'				=> 'تصفية',

	'LIMIT'					=> 'الحد',

	'ONLY_NON_EMPTY'		=> 'فقط الغير ممتلئ',
	'ORDER_BY'				=> 'ترتيب بواسطة',

	'PROFILE_LIST'			=> 'قائمة الملفات الشخصية',
	'PROFILE_LIST_EXPLAIN'	=> 'هذه الأداة ستعرض معلومات الملف الشخصي لأكثر من عضو، يمكن استخدامها لتحديد عضويات التسجيل العشوائي (spam).',

	'USERS_DELETE'				=> 'حذف المستخدمين المحددين',
	'USERS_DELETE_CONFIRM'		=> 'هل أنت متأكد أنك تريد حذف المستخدمين المحددين؟ حذف المستخدمين باستخدام هذه الأداة <strong>سيحذف</strong> جميع مشاركاتهم أيضا!',
	'USERS_DELETE_SUCCESSFULL'	=> 'تم حذف جميع المستخدمين المحددين بنجاح!',
));
