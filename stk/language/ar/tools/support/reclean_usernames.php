<?php
/**
*
* @package Support Toolkit - Reclean Usernames
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
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'RECLEAN_USERNAMES'					=> 'إعد تنضيف اسماء الاعضاء',
	'RECLEAN_USERNAMES_COMPLETE'		=> 'لقد تم تنضيف جميع اسماء الاعضاء بنجاح.',
	'RECLEAN_USERNAMES_CONFIRM'			=> 'هل انت متاكد من رغبتك بالقيام بتنضيف اسماء الاعضاء؟',
	'RECLEAN_USERNAMES_NOT_COMPLETE'	=> 'هذه العملية ستاخذ القليل من الوقت ... الرجاء لا توقف هذه العملية لتتجنب المشاكل.',
));
