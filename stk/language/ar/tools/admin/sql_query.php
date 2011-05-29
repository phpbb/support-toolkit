<?php
/**
*
* @package Support Toolkit - SQL Query
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
    'ERROR_QUERY'                    => 'الاستعلام المحتوي للخطأ',

    'NO_RESULTS'                    => 'لا يوجد نتائج',
    'NO_SQL_QUERY'                    => 'يجب عليك اضافة استعلام لتنفيذه',

    'QUERY_RESULT'                    => 'نتائج الاستعلام',

    'SHOW_RESULTS'                    => 'اظهار النتائج',
    'SQL_QUERY'                        => 'تنفيذ استعلام SQL',
    'SQL_QUERY_EXPLAIN'                => 'اضاف استعلام SQL الذي تود تنفيذة , الاداة ستقوم بتعديل الاستعلام ليتناسب مع سوابق "phpbb_"<br />اذا قمت بالتعليم على "اظهار النتائج" ستقوم الاداة بعرض النتائج بعد الانتهاء من تنفيذ الاستعلام',

    'SQL_QUERY_LEGEND'                => 'استعلام SQL',
    'SQL_QUERY_SUCCESS'                => 'تم تنفيذ استعلام SQL بنجاح',
));
