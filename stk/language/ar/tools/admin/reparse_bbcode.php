<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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

/**
* DO NOT CHANGE
*/
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
// ? ? ? î ?
//

$lang = array_merge($lang, array(
    'REPARSE_ALL'                => 'اصلاح جميع الـ BBCode',
    'REPARSE_ALL_EXPLAIN'        => 'عند فحص توزيع الـ BBCode سيتم توزيعها على جميع محتوى المنتدى; الخيار الافتراضي, هذه الاداة ستقوم فقط بتوزيع الاكواد في المشاركات و الرسائل الخاصة و التواقيع المعتمدة من قبل المنتدى. سيتم تجاهل هذا الخيار في حالة مشاركات خاصة و الرسائل الخاصة و التي تم تحديتها في الاعلى..',
    'REPARSE_BBCODE'            => 'اعادة توزيع BBCode',
    'REPARSE_BBCODE_COMPLETE'    => 'تم اعادة توزيع BBCodes بنجاح',
    'REPARSE_BBCODE_CONFIRM'    => 'هل انت متاكد من رغبتك بتوزيع الـ BBCodes؟ يرجى ملاحظة أن هذه الأداة لديه القدرة على الحاق الضرر بقاعدة البيانات و قد لا يمكن إصلاحه قاعدة البيانات الخاصة بك، لذلك ،<strong>تاكد من اخذك لنسخة من قاعدة البيانات قبل البدء بهذه العملية </strong>. تحتاج هذه العملية للكثير من الوقت, فرجاء عدم قطع العملية بعد البدء فيها !',
    'REPARSE_BBCODE_PROGRESS'    => 'خطوة %1$d اكتملت. يتبع الى الخطوة التالية %2$d ...',
    'REPARSE_BBCODE_SWITCH_MODE'    => array(
        1    => 'عملية توزيع الاكواد في المشاركات انتهت, يتم الان التوجه الى توزيع الاكواد في الرسائل الخاصة.',
        2    => 'عملية توزيع الاكواد في الرسائل الخاصة انتهت, يتم الان التوجه الى توزيع الاكواد في التواقيع.',
    ),
    'REPARSE_IDS_INVALID'            => 'العناوين IDs التي قدمتها غير صحيحة; الرجاء التاكد من صحة اراقام المشاركات IDs و ضع علامة فاصلة بين ارقام المشاركات ... كمثال (e.g. 1,2,3,5,8,13).',
    'REPARSE_POST_IDS'                => 'توزيع المشاركات المحددة',
    'REPARSE_POST_IDS_EXPLAIN'        => 'لتوزيع مشاركات محددة فقط, قم بادخال ارقام المشاركات و افصل ما بينهم بفاصلة ... كمثال  (e.g. 1,2,3,5,8,13) .',
    'REPARSE_PM_IDS'                => 'توزيع رسائل خاصة محددة',
    'REPARSE_PM_IDS_EXPLAIN'        => 'لتوزيع رسائل خاصة محددة, قم بادخال ارقام الرسائل الخاصة و افصل ما بينهم بفاصلة ... كمثال  (e.g. 1,2,3,5,8,13).',
));
