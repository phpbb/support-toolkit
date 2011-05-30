<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'تم تطهير الملف الشخصي للعضوية المجهولة بنجاح.',
	'ANONYMOUS_CORRECT'					=> 'العضو المجهول موجود و تم اعداده بشكل صحيح.',
	'ANONYMOUS_CREATED'					=> 'لقد تم إعادة انشاء العضوية المجهولة.',
	'ANONYMOUS_CREATION_FAILED'			=> 'لم تتمكن العملية من تطهير العضوية المجهولة ! الرجاء طلب المساعدة من فريق الدعم على phpbbarabia.com .',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'لقد تم حذف العضوية المجهولة من جميع المجموعات الموجودة.',
	'ANONYMOUS_MISSING'					=> 'العضوية المجهولة مفقودة.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'العضوية المجهولة مفقوده في قاعدة البيانات. هذه العضوية تستخدم من قبل الزوار لزيارة المنتدى. هل ترغب بانشاء عضوية مجهولة جديدة؟',
	'ANONYMOUS_WRONG_DATA'				=> 'معلومات الملف الشخصي بالعضوية المجهولة غير صحيحة.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'الملف الشخصي للعضوية المجهولة غير صحيح. هل ترغب تصليح الملف الشخصي للعضوية المجهولة؟',
	'ANONYMOUS_WRONG_GROUPS'			=> 'العضوية المجهولة تنتمي الى مجموعة الاعضاء و هي إعدادات غير صحيحة.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'العضوية المجهولة تنتمي الى مجموعة الاعضاء. هل ترغب بحذف العضوية المجهولة فقط من مجموعة الاعضاء و المجموعات الاخرى و الاحتفاظ بها كمجموعة زوار؟?',

	'REDIRECT_NEXT_STEP'				=> 'سيتم تحويلك الى العملية التالية.',

	'SANITISE_ANONYMOUS_USER'			=> 'تطهير العضوية المجهولة',
));
