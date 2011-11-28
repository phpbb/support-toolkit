<?php
/**
*
* @package Support Toolkit - Database Cleaner
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

if (empty($lang) ||!is_array($lang))
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
	'BOARD_DISABLE_REASON'			=> 'هذا المنتدى خارج نطاق العمل حالياً بسبب عمل اصلاحات في قاعدة البيانات، الرجاء العودة لاحقاً!',
	'BOARD_DISABLE_SUCCESS'			=> 'لقد تم تعطيل المنتدى بنجاح!',

	'COLUMNS'						=> 'أعمدة',
	'CONFIG_SETTINGS'				=> 'اعدادات التكوين',
	'CONFIG_UPDATE_SUCCESS'			=> 'لقد تم تحديث اعدادات التكوين بنجاح!',
	'CONTINUE'						=> 'مواصلة',

	'DATABASE_CLEANER'				=> 'تنظيف قاعدة البيانات',
	'DATABASE_CLEANER_EXTRA'		=> 'اي اضافة خارجية تم اضافتها عن طريق تنصيب هاك.  <strong>اذا قمت باختيار هذا الامر، فانه سيقوم بحذف جميع الاضافات الخارجية!</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'اي حقل يحتوي على خلفية حمراء مثل هذا، تكون اضافته مفقودة و سيتم اضافتها من جديد.  <strong>اذا قمت باختيار هذا الامر، فانه سيقوم باضافة الاضافة</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'لقد تم تنظيف قاعدة البيانات بنجاح تام!<br /><br />الرجاء اخذ نسخة احتياطية من قاعدة البيانات مرة اخرى.',
	'DATABASE_CLEANER_WARNING'		=> 'هذه الاداة لا تحتوي على تامين, الرجاء اخذ نسخة احتياطية من  قاعدة البيانات قبل البدء في هذه العملية, في حالة ظهور مشاكل بعد الانتهاء من العملية.<br /><br />قبل البدء بالعملية ’الرجاء التاكد من اخذك نسخة احتياطية من قاعدة البيانات!',
	'DATABASE_CLEANER_WELCOME'		=> 'مرحباً بك في اداة تنظيف قاعدة البيانات!<br /><br />تم عمل هذه الاداة لحذف الاعمدة و الخلاياء و الجداول الاضافيةمن قاعدة بيانات التي غير موجودة في قاعدة بيانات phpBB3 الاصلية, و ستقوم باضافة اي جزء مفقود من قاعدة البيانات.<br /><br />When you are ready to continue click the Continue button to start using the Database Cleaner tool (note that your board will be disabled until this is finished).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'تم تحديث عامود الجدول بنجاح!',
	'DATABASE_TABLES'				=> 'جداول قاعدة البيانات',
	'DATABASE_TABLES_SUCCESS'		=> 'تم تحديث جداول قاعدة البيانات بنجاح!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'ادوار وصلاحيات phpBB تم اعادة تعينها بنجاح!',
	'DATABASE_ROLES_SUCCESS'		=> 'تم تحديث الادوار و الصلاحيات بنجاح!',
	'DATAFILE_NOT_FOUND'			=> 'مجموعة أدوات الدعم لم تستطع إيجاد الملفات الضرورية لنسختك من phpBB!',

	'EMPTY_PREFIX'					=> 'بلا سوابق قاعدة بيانات',
	'EMPTY_PREFIX_CONFIRM'			=> 'منظف جداول سيقوم بتغيرات على قاعدة البيانات الخاصة بك، وانت تستخدم سوابق فارغة للجداول سيكون هناك تأثير على جداول غير خاصة بـ phpBB، هل انت متأكد بأنك تريد الاستمرار؟',
	'EMPTY_PREFIX_EXPLAIN'			=> 'منظف جداول القاعدة حدد بأنك لم تقم بتحديد سوابق الجداول، اثناء عملية التنظيف سوف يقوم بفحصل <strong>جميع</strong> الجداول لقاعدة البيانات لذا تأكد من انك استبعدت اي جداول اضافية لقاعدة بيانات غير phpBB، اذا لم تقم بذلك ربما يعطب التنظيف قواعد بيانات اخرى غير خاصة بـ phpBB<br />اذا كنت غير واثق بما تفعل من فضلك اطلب الدعم في <a href="http://wwww.phpbbarabia.com/" title="منتدى الدعم" target="_blank">phpBBArabia</a>!',
	'ERROR'							=> 'خطأ',
	'EXTRA'							=> 'اضافية',
	'EXTENSION_GROUPS_SUCCESS'		=> 'تم اعادة تعين مجموعة الاضافات بنجاح',
	'EXTENSIONS_SUCCESS'			=> 'تم اعادة تعين الاضافات بنجاح',

	'FINAL_STEP'					=> 'هذه الخطوة الاخيرة<br /><br />سيتم حذف الملفات المؤقتة و اعادة تشغيل المنتدى',

	'INSTRUCTIONS'					=> 'تعليمات',

	'MISSING'						=> 'مفقود',
	'MODULE_UPDATE_SUCCESS'			=> 'تم تحديث الموديل بنجاح!',

	'NO_BOT_GROUP'					=> 'لم يتمكن من اعادة تعين الـ bot مجموعة محركات البحث مفقودة',

	'PERMISSION_SETTINGS'			=> 'اعدادات الصلاحيات',
	'PERMISSION_UPDATE_SUCCESS'		=> 'تم اعادة تعين اعدادت الصلاحيات بنجاح!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'نسختك من phpBB3 غير مدعومة او لا تعمل مع مجموعة ادوات الدعم ( او ان هناك ملفات مفقودة من ادوات الدعم )<br />phpBB 3.0.0+ يجب ان يكون داعم للادوات لكن قد يأخذ ذلك بعض الوقت ليتم جعلها متوافقه مع هذا الاصدار من phpBB 3.0.',

	'QUIT'							=> 'خروج',

	'RESET_BOTS'					=> 'اعادة ضبط محركات البحث',
	'RESET_BOTS_EXPLAIN'			=> 'هل ترغب باعدة ضبط قائمة محركات البحث كما كان عند تنصيب المنتدى?  اي محرك بحث تم اضافته يدوياً، سيتم حذفه و استبداله بالمحركات البحث الافتراضي من قبل phpbb3.',
	'RESET_BOTS_SKIP'				=> 'تم تجاهل عملية اعادة تعين الـ bot',
	'RESET_BOT_SUCCESS'				=> 'تم اعادة تعين الـ bot بنجاح',
	'RESET_MODULES'					=> 'اعادة تعين الموديلات',
	'RESET_MODULES_EXPLAIN'			=> 'هل تود تعين الموديلات الى الموديلات الافتراضية لـ phpBB3؟ جميع الموديلات الاضافية سيتم حذفها و استبدالها بالموديلات الافتراضية.',
	'RESET_MODULES_SKIP'			=> 'تم تجاهل اعادة تعين الموديل',
	'RESET_MODULE_SUCCESS'			=> 'تم اعادة تعين الموديل بنجاح',
	'RESET_REPORT_REASONS'			=> 'اعادة تعين سبب التقرير',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'هل تود اعادة تعين سبب التقرير الى الافتراضي؟ سيقوم ذلك بحذف جميع اسباب التقارير المعينة سابقاً!',
	'RESET_REPORT_REASONS_SKIP'		=> 'لم يتم تعين سبب التقرير',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'تمت إعادة تعيين أسباب التقرير بنجاح!',
	'RESET_ROLE_DATA'				=> 'إعادة تعيين معلومات الأدوار',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'هذه الخطوة ستقوم بإعادة تعين جميع الادوار الى الافتراضية مره اخرى، نحن نشدد على ان لا تقوم بهذه الخطوة الا اذا قمت بعمل تغيرات في الخطوة السابقة فقط.',
	'ROLE_SETTINGS'					=> 'إعدادات الأدوار',
	'ROWS'							=> 'صف',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'لم يتم التغير في الجداول',
		'columns'			=> 'لم يتم التغير في الاعمدة',
		'config'			=> 'لم يتم التغير في الاعدادات',
		'extension_groups'	=> 'ملحقات المجموعات لم يتم تغيرها',
		'extensions'		=> 'لم يتم تغير الملحقات',
		'permissions'		=> 'لم يتم تغير الصلاحيات',
		'groups'			=> 'لم يتم التغير في المجموعات',
		'roles'				=> 'لم يتم التغير في الادوار',
		'final_step'		=> 'الخطوة الاخيرة',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'لم يتم تغير جداول قاعدة البيانات',
		'columns'			=> 'لم يتم التغير في اعمدة قاعدة البيانات',
		'config'			=> 'جداول الاعدادات لا تحتوي على اي نقص!',
		'extension_groups'	=> 'لم يتم العثور على اي قيم مفقودة في جدول الاضافات',
		'extensions'		=> 'لم يتم تغير جدول الاضافات',
		'permissions'		=> 'لم يتم التعديل على جداول الصلاحيات',
		'groups'			=> 'لم يتم اي تحديث في نظام مجموعات phpBB',
		'roles'				=> 'لم يتم حذف او اضافة اي دور',
		'final_step'		=> 'الخطوة الاخيرة ستقوم بحذف الملفات المؤقتة و اعادة تشغيل المنتدى',
	),
	'SUCCESS'						=> 'بنجاح',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'نظام المجموعات تم اعادة تعينة بنجاح!',

	'TYPE'							=> 'النوع',

	'UNSTABLE_DEBUG_ONLY'			=> 'منظف قاعدة البيانات يمكنه فقط العمل على نسخ غير معتمدة <em>(dev, a, b, RC)</em>, اذا كان "DEBUG" مفعل من خلال ملف config الخاص بـ phpBB3',
));
