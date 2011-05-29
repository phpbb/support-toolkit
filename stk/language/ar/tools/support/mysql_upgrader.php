<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
// You do not need this wهنا single placeholders are used, e.g. 'Message %d' is fine
// equally wهنا a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sهنا%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'MYSQL_UPGRADER'					=> 'تحديث MySQL',
	'MYSQL_UPGRADER_BACKUP'				=> 'هذه الاداة خطيرة للغاية; الرجاء التاكد من اخذك لنسخة من قاعدة البيانات قبل البدء بهذه العملية!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'تم عمل هذه الاداة لحل مشاكل قاعدة البيانات بعد تحديث المنتدى. هذا التحديث سيقوم بتوفيق قاعدة البيانات من الاصدار الجديد من المنتدى <em>اطلع على هذا الخطأ “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>” KB article.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'تحميل',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'عند فحص عملية التحديث, ستقوم هذه الاداة بتلخيص و عرض التغييرات لك, من هناك بامكانك تحميل النتيجة.',
	'MYSQL_UPGRADER_RESULT'				=> 'ستجد بالاسفل استعلامات, يجب تشغيلها لتتم عملية تحديث الـ MySQL . اضغط <a href="%s">هنا</a> لتحميل الاستعلامات كملف  .sql .',
	'MYSQL_UPGRADER_RUN'				=> 'تشغيل',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'بهذا الخيار سيتم تحديث قاعدة البيانات MySQL و سيتم استدعاء الاستعلامات بشكل اوتوماتيكي و تشغيل نتائجها على قاعدة البيانات.<br />هذه العملية ستاخذ بعض الوقت, , الرجاء <strong>عدم</strong> قطع هذه العملية حتى يتم اعلامك بذلك!',
	'MYSQL_UPGRADER_SCRIPT'				=> 'سكربت تحديث الـ MySQL',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'لقد تم تشغيل قاعدة البيانات MySQL بنجاح',
	
	'QUERY_FINISHED'	=> 'الخطوات المنتهيه %1$d من %2$d, واصل الى الخطوة التي تليها.',

	'TOOL_MYSQL_ONLY'	=> 'هذه الاداة تشتغل فقط لمستخدمين MySQL DBMS',
));
