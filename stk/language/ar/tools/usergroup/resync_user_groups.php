<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'إعادة تزامن مجموعات المستخدمين',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'هذه الأداة تم تصميمها للفحص والتأكد أن كل المستخدمين في مجموعاتهم الافتراضية الصحيحة <em>(الأعضاء المسجلين، الأعضاء القاصرين ومجموعة الأعضاء الجدد)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'جميع المجموعات تبدو سليمة ومحدثة!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'خيارات التزامن',
	'RUN_BOTH_FINISHED'				=> 'تمت إعادة تزامن جميع مجموعات المستخدمين بنجاح!',
	'RUN_RNR'						=> 'إعادة تزامن الأعضاء الجدد',
	'RUN_RNR_EXPLAIN'				=> 'هذا سيحدث "مجموعة الأعضاء الجدد" لتحتوي على كل المستخدمين الذين ينطبق عليهم الشرط الذي تم تحديده في لوحة التحكم الرئيسية.',
	'RUN_RNR_FINISHED'				=> 'تمت إعادة تزامن مجموعة الأعضاء الجدد بنجاح!',
	'RUN_RNR_NOT_FINISHED'			=> 'تتم الآن عملية إعادة تزامن مجموعة الأعضاء الجدد. يرجى عدم مقاطعة هذه العملية',
	'RUN_RR'						=> 'إعادة تزامن مجموعة الأعضاء المسجلين',
	'RUN_RR_EXPLAIN'				=> 'وجدت الأداة أن ليس كل الأعضاء في المنتدى هم أعضاء في مجموعة "الأعضاء <em>(القاصرين)</em> المسجلين". هل تريد إعادة مزامنة هذه المجموعات؟<br /><strong>ملحوظة:</strong> إذا كان تسجيل القاصرين لديك مفعل وعضو لم يقوم بإدخال تاريخ ميلاده فإن هذا العضو سيتم وضعه في مجموعة "الأعضاء القاصرين"!',
	'RUN_RR_FINISHED'				=> 'تمت إعادة تزامن الأعضاء بنجاح!',

	'SELECT_RUN_GROUP'	=> 'اختر على الأقل مجموعة واحدة لتتم مزامنتها.',
));
