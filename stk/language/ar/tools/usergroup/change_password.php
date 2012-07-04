<?php
/**
*
* @package Support Toolkit - Change Password
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
	'CHANGE_PASSWORD'			=> 'تغيير كلمة المرور',
	'CHANGE_PASSWORD_EXPLAIN'	=> 'تغيير كلمة مرور عضو.<br /><strong>يمكنك إدخال إما اسم المستخدم أو رقم العضوية، ليس كلاهما.</strong>',
	'CHANGE_PASSWORD_SUCCESS'	=> 'كلمة المرور الخاصة بـ <a href="%s">%s</a> تم تغييرها بنجاح.',
	
	'FIELDS_NOT_FILLED'			=> 'يجب أن يتم ملء حقل واحد.',
	'FIELDS_BOTH_FILLED'		=> 'حقل واحد فقط يمكن ملؤه.',

	'PASSWORD_CONFIRM'			=> 'أعد إدخال كلمة المرور',

	'USERNAME_NAME'				=> 'اسم المستخدم',
	'USERNAME_NAME_EXPLAIN'		=> 'أدخل اسم المستخدم للعضو الذي تريد تغيير كلمة مروره.',
	'USERNAMEID'				=> 'رقم العضوية',
	'USERNAMEID_EXPLAIN'		=> 'أدخل رقم العضوية للعضو الذي تريد تغيير كلمة مروره.',
));
