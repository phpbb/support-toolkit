<?php
/**
*
* @package Support Toolkit - Update email hashes
* @version $Id: update_email_hashes.php 415 2010-06-09 00:44:26Z iwisdom $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'UPDATE_EMAIL_HASHES'				=> 'E-posta hashlerini güncelle',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'phpBB 3.0.7\'den önceki phpBB kurulumlarında, 32 bitlik bir İşletim Sisteminden 64 bitliğe geçişte e-posta hashlerinin bozulma sorunu yaşanıyordu. <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">İlgili hata raporuna bakın</a>)</em><br />Bu araç düzgün bir şekilde çalışmaları için veritabanınızdaki hashleri güncellemenize izin verir.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'Tüm e-posta hashleri başarıyla güncellendi!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'E-posta hashleri güncellemesi devam ediyor.',
));