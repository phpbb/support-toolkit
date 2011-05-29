<?php
/**
*
* @package Support Toolkit - Make Founder
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
	'DEMOTE_FAILED'				=> 'لم تتم إزالة صلاحيات المؤسس من جميع المستخدمين!',
	'DEMOTE_FOUNDERS'			=> 'إزالة المؤسسين',
	'DEMOTE_SUCCESSFULL'		=> 'تمت إزالة صلاحيات المؤسس من الأعضاء %d!',

	'FOUNDERS'					=> 'الأعضاء الذي لديهم صلاحيات المؤسس',

	'MAKE_FOUNDER'				=> 'تعيين العضو كمؤسس',
	'MAKE_FOUNDER_CONFIRM'		=> 'هل أنت متأكد أنك تريد تعيين <a href="%1$s">%2$s</a> كمؤسس?  هذا سيعطي <a href="%1$s">%2$s</a> القدرة على حذف حسابك، بالإضافة لصلاحيات أخرى.',
	'MAKE_FOUNDER_FAILED'		=> 'لا يمكن ترقية هذا المستخدم لمؤسس',
	'MAKE_FOUNDER_SUCCESS'		=> 'تم تعيين <a href="%1$s">%2$s</a> كمؤسس بنجاح.',
	'MANAGE_FOUNDERS'			=> 'إدارة المؤسسين',

	'NO_FOUNDERS'				=> 'لم يتم إيجاد مؤسسين',

	'PROMOTE_FOUNDER'			=> 'ترقية لمؤسس',

	'USER_TO_FOUNDER'			=> 'العضو الذي تريد تعيينه مؤسس',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'أدخل اسم أو رقم العضو الذي تريد تعيينه كمؤسس.',
));
