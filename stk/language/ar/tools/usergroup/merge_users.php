<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'دمج المستخدمين',
	'MERGE_USERS_EXPLAIN'				=> 'أداة لنقل محتويات حساب ما لحساب آخر; سيتم نقل إعدادات وعضويات المجموعات من العضو القديم إلى الجديد. محتويات العضو تشمل الصلاحيات، المرفقات، الحظر، المفضلة، المسودات، اشتراكات الساحات والمواضيع، متابعة المنتديات والمواضيع، مدخلات السجل، تصويتات الاستفتاءات، المشاركات، الرسائل الخاصة، التقارير، المواضيع، التحذيرات والأصدقاء والتجاهلات.',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'لا يمكنك دمج حساب إلى حساب مستخدم عادي.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'لا يمكنك دمج عنكبوت بحث إلى حساب مستخدم عادي.',

	'MERGE_USERS_MERGED'		=> 'تم دمج العضويتين بنجاح.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'حذف العضو القديم',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'إذا تم اختيارها فإن هذا سيقوم بحذف العضو القديم من المنتدى بعد الدمج.',

	'MERGE_USERS_SAME_USERS'	=> 'العضو القديم والجديد يجب أن يكونا مختلفين.',

	'MERGE_USERS_USER_SOURCE'			=> 'العضو القديم',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'المشاركات، الرسائل الخاصة، الصلاحيات، التحذريات..إلخ ستنتقل من هذا العضو إلى العضو الجديد، عضويات المجموعات وإعدادات العضو سيتم نسخها.',

	'MERGE_USERS_USER_TARGET'	=> 'العضو الجديد',
));
