<?php
/**
*
* @package Support Toolkit - Restore Delted Users
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
	'NO_DELETED_USERS'	=> 'لا يوجد أعضاء محذوفين ليتم استعادتهم',
	'NO_USER_SELECTED'	=> 'لم يتم اختيار أعضاء!',

	'RESTORE_DELETED_USERS'						=> 'استعادة الأعضاء المحذوفين',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'استعادة الأعضاء المحذوفين :: تعارض',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'هذه الأداة تتيح لك استعادة الأعضاء الذين تم حذفهم من المنتدى لكن ما تزال لديهم مشاركات محددة كـ "زائر" في المنتدى.<br />هؤلاء الأعضاء سيتم تحديد كلمة مرور عشوائية لهم ويجب عليك إعادة تهيئتها يدويا بعد تشغيلها; هذه الأداة <b>لا</b> توفر لك قائمة بكلمات المرور التي تم تحديدها.<br /><br />أثناء التشغيل وجدت الأداة بعض أسماء مستخدمين موجودة بالفعل في المنتدى. يرجى إدخال اسم مستخدم جديد لهذه العضويات.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'هذه الأداة تتيح لك استعادة الأعضاء الذين تم حذفهم من المنتدى لكن ما تزال لديهم مشاركات محددة كـ "زائر" في المنتدى.<br />هؤلاء الأعضاء سيتم تحديد كلمة مرور عشوائية لهم ويجب عليك إعادة تهيئتها يدويا بعد تشغيلها; هذه الأداة <b>لا</b> توفر لك قائمة بكلمات المرور التي تم تحديدها.',

	'SELECT_USERS'	=> 'اختر المستخدمين لاستعادتهم',

	'USER_RESTORED_SUCCESSFULLY'	=> 'تم استعادة المستخدم بنجاح.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'تم استعادة المستخدمين بنجاح.',
));
