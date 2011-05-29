<?php
/**
*
* @package Support Toolkit - Fix Left/Right ID's
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
	'FIX_LEFT_RIGHT_IDS'			=> 'تصليح الـ IDs يسار / يمين',
	'FIX_LEFT_RIGHT_IDS_CONFIRM'	=> 'هل انت متاكد من رغبت باصلاح الـ IDs من اليسار الى اليمين؟<br /><br /><strong>مهم للغاية ... قم باخذ نسخة احتياطية قبل البدء بهذه العملية!</strong>',

	'LEFT_RIGHT_IDS_FIX_SUCCESS'	=> 'عملية اصلاح الـ IDs من اليسار الى اليمين تمت بنجاح.',
	'LEFT_RIGHT_IDS_NO_CHANGE'		=> 'لقد قامت الاداة بفحص عناوين IDs من اليسار الى اليمين و وجدتها سليمه و لا يوجد اي تغيير.',
));
