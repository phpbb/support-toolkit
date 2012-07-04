<?php
/**
*
* @package Support Toolkit
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
   'BACK_TOOL'							=> 'العودة إلى آخر أداة استعملتها',
   'BOARD_FOUNDER_ONLY'					=> 'فقط المؤسسون هم من يمكنهم استخدام مجموعة أدوات الدعم.',

   'CAT_ADMIN'							=> 'أدوات الإدارة',
   'CAT_ADMIN_EXPLAIN'					=> 'أدوات الإدارة هي مجموعة أدوات تتيح للمديرين لإدارة مناطق معينة من المنتدى وحل المشاكل الشائعة.',
   'CAT_DEV'							=> 'أدوات المطورين',
   'CAT_DEV_EXPLAIN'					=> 'أدوات المطورين يمكن استخدامها من قبل مطوري المنتدى ومطوري الهاكات للقيام بأمور شائعة.',
   'CAT_ERK'							=> 'أدوات الإصلاحات الحرجة',
   'CAT_ERK_EXPLAIN'					=> 'أدوات الإصلاحات الحرجة هي مجموعة أدوات منفصلة من مجموعة أدوات الدعم والتي تم بناؤها لتقوم ببعض الفحوصات والتي بإمكانها تشخيص المشاكل في منتداك والتي قد تمنع منتداك من العمل بشكل صحيح. اضغط <a href="%s">هنا</a> لتشغيل أدوات الإصلاحات الحرجة.',
   'CAT_MAIN'							=> 'الرئيسية',
   'CAT_MAIN_EXPLAIN'					=> 'مجموعة أدوات الدعم يمكن استخدامها لحل معظم المشاكل الشائعة في منتديات phpBB3.0.x. هي تستخدم كلوحة تحكم إدارية ثانية، وتوفر للمدير مجموعة من الأدوات لحل المشاكل الشائعة والتي تمنع منتدى phpBB3 من العمل بشكل صحيح.',
   'CAT_SUPPORT'						=> 'أدوات الدعم',
   'CAT_SUPPORT_EXPLAIN'				=> 'أدوات الدعم يمكن استخدامها للمساعدة في استرجاع نسخة phpBB3.0.x والتي لم تعد تعمل بشكل صحيح.',
   'CAT_USERGROUP'						=> 'أدوات المستخدم/المجموعات',
   'CAT_USERGROUP_EXPLAIN'				=> 'أدوات المستخدم والمجموعات يمكن استخدامها لإدارة المستخدمين والمجموعات بطرق غير متوفرة في النسخة الأساسية من phpBB3.0.x.',
   'CONFIG_NOT_FOUND'					=> 'غير قادر على تحميل ملف الإعدادات لمجموعة أدوات الدعم. يرجى فحص التثبيت',

   'DOWNLOAD_PASS'						=> 'تحميل ملف كلمة المرور.',

   'EMERGENCY_LOGIN_NAME'				=> 'دخول أدوات الإصلاحات الحرجة',
   'ERK'								=> 'أدوات الإصلاحات الحرجة',

   'FAIL_REMOVE_PASSWD'					=> 'غير قادر على حذف ملف كلمة المرور المنتهي. يرجى إزالته يدويا!',

   'GEN_PASS_FAILED'					=> 'مجموعة أدوات الدعم لم تستطع تكوين كلمة مرور جديدة. يرجى المحاولة مرة أخرى.',
   'GEN_PASS_FILE'						=> 'إنشاء ملف كلمة المرور.',
   'GEN_PASS_FILE_EXPLAIN'				=> 'إذا لم تكن قادرا على تسجيل الدخول لـ phpBB يمكنك استخدام طريقة المصادقة الداخلية لمجموعة أدوات الدعم. لاستخدام هذه الأداة يجب عليك <a href="%s"><strong>إنشاء</strong></a> ملف كلمة مرور جديدة.',

   'INCORRECT_CLASS'					=> 'فئة غير صحيحة في: stk/tools/%1$s.%2$s',
   'INCORRECT_PASSWORD'					=> 'كلمة المرور غير صحيحة',
   'INCORRECT_PHPBB_VERSION'			=> 'نسختك من phpBB غير متوافقة مع هذه الأداة. يجب أن تكون نسختك %1$s أو أحدث لتشغيل هذه الأداة.',

   'LOGIN_STK_SUCCESS'					=> 'قمت بتعريف نفسك بنجاح وسيتم تحويلك إلى مجموعة أدوات الدعم.',

   'NOTICE'								=> 'تنبيه',
   'NO_VERSION_FILE'					=> 'مجموعة أدوات الدعم لم تستطع تحديد آخر نسخة. يرجى الذهاب إلى <a href="http://www.phpbbarabia.com/stk.php">مجموعة أدوات الدعم على phpBB.com</a> والتأكد من أنك تستخدم أحدث نسخة قبل استخدامك لمجموعة أدوات الدعم.',
   
   'REQUEST_PHPBB_VERSION'				=> 'عرّف نسخة phpBB',
   'REQUEST_PHPBB_VERSION_EXPLAIN'		=> 'مجموعة أدوات الدعم لم تستطع تحديد نسخة phpBB التي تعمل عليها، يرجى اختيار النسخة المناسبة من هذه الاستمارة قبل المتابعة.<br />يرجى زيارة <a href="http://www.phpbbarabia.com/community/viewforum.php?f=32">منتديات الدعم الفني</a> للمساعدة في حل هذه المشكلة.',

   'PASS_GENERATED'						=> 'تم إنشاء ملف كلمة مرور مجموعة أدوات الدعم بنجاح!<br/>كلمة المرور التي تم تكوينها لك هي: <em>%1$s</em><br />كلمة المرور هذه ستنتهي في: <span style="text-decoration: underline;">%2$s</span>. بعد هذا الوقت المحدد <strong>يجب</strong> عليك إنشاء ملف كلمة مرور جديد لتستطيع استخدام أداة الإصلاحات الحرجة!<br /><br />استخدم الزر التالي لتحميل الملف. عندما تحمل الملف يجب عليك رفعه إلى مجلد "stk"',
   'PASS_GENERATED_REDIRECT'			=> 'عندما تقوم برفع ملف كلمة المرور للمكان الصحيح، اضغط <a href="%s">هنا</a> للعودة لصفحة تسجيل الدخول.',
   'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'هذه الأداة غير متوافقة مع نسخة phpBB التي تستخدمها',
   'PROCEED_TO_STK'						=> '%sالمتابعة إلى مجموعة أدوات الدعم%s',

   'STK_FOUNDER_ONLY'					=> 'يجب عليك إعادة تعريف نفسك قبل استخدامك لمجموعة أدوات الدعم.',
   'STK_LOGIN'							=> 'تسجيل دخول مجموعة أدوات الدعم',
   'STK_LOGIN_WAIT'						=> 'يجب عليك الإنتظار لمدة 3 ثواني قبل أن تحاول تسجيل الدخول مرة أخرى. يرجى المحاولة مرة أخرى.',
   'STK_LOGOUT'							=> 'تسجيل خروج مجموعة أدوات الدعم',
   'STK_LOGOUT_SUCCESS'					=> 'تم تسجيل الخروج بنجاح من مجموعة أدوات الدعم.',
   'STK_NON_LOGIN'						=> 'قم بتسجيل الدخول لتستطيع الوصول إلى مجموعة أدوات الدعم.',
   'STK_OUTDATED'						=> 'نسخة مجموعة أدوات الدعم لديك ليست آخر نسخة. آخر نسخة متوفرة هي <strong style="color: #008000;">%1$s</strong>، والنسخة المثبتة لديك هي <strong style="color: #FF0000;">%2$s</strong>.<br /><br />نظرا للتأثير الكبير لهذه الأداة على منتداك، فقط تم تعطيلها حتى تقوم بتحديثها. نحن ننصح بشدة أن تكون جميع السكربتات المثبتة على سيرفرك محدثة لآخر نسخة. لمعلومات أكثر عن التحديث الأخير، يرجى زيارة <a href="%3$s">موضوع الإطلاق</a>.<br /><br /><em>إذا رأيت هذا التنبيه بعد تحديثك لمجموعة أدوات الدعم، اضغط <a href="%4$s">هنا</a> لمسح المعلومات المخزنة في أداة فحص الإصدار.</em>',
   'SUPPORT_TOOL_KIT'					=> 'مجموعة أدوات الدعم',
   'SUPPORT_TOOL_KIT_INDEX'				=> 'رئيسية مجموعة أدوات الدعم',
   'SUPPORT_TOOL_KIT_PASSWORD'			=> 'كلمة المرور',
   'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'حيث أنك غير مسجل دخولك لـ phpBB3 يجب عليك أن تثبت أنك مالك المنتدى عن طريق إدخال كلمة مرور مجموعة أدوات الدعم.<br /><br /><strong>يجب تفعيل الكوكيز في متصفحك وإلا لن يمكنك أن تظل مسجل دخولك.</strong>',

   'TOOL_INCLUTION_NOT_FOUND'			=> 'هذه الأداة تحاول تحميل ملف (%1$s) وهو غير موجود.',
   'TOOL_NAME'							=> 'اسم الأداة',
   'TOOL_NOT_AVAILABLE'					=> 'الأداة المطلوبة غير متاحة.',

   'USING_STK_LOGIN'					=> 'أنت مسجل دخولك باستخدام طريقة المصادقة الداخلية لمجموعة أدوات الدعم. ينصح باستخدام هذه الطريقة <strong>فقط</strong> عندما تكون غير قادر على تسجيل الدخول لـ phpBB.<br />لتعطيل طريقة المصادقة هذه اضغط <a href="%1$s">هنا</a>.',
));
