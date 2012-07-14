<?php
/**
*
* @package Support Toolkit - Make Founder
* @version $Id: manage_founders.php 277 2010-01-20 01:38:28Z iwisdom $
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
	'BOTH_FIELDS_FILLED'		=> 'Kullanıcı Adı alanı ya da Kullanıcı ID alanından birisi doldurulmamış olabilir.',

	'DEMOTE_FAILED'				=> 'Tüm kullanıcıların kurucu statüleri kaldırılamıyor!',
	'DEMOTE_FOUNDERS'			=> 'Kurucuların statülerini düşür',
	'DEMOTE_SUCCESSFULL'		=> '%d kullanıcının kurucu statüsü başarıyla kaldırıldı!',

	'FOUNDERS'					=> 'Kurucu statüsündeki kullanıcılar',

	'MAKE_FOUNDER'				=> 'Kullanıcıyı Mesaj Panosu kurucusu yap',
	'MAKE_FOUNDER_CONFIRM'		=> '<a href="%1$s">%2$s</a> kullanıcısını bir Mesaj Panosu Kurucusu yapmak istediğinize emin misiniz?  Bu işlem <a href="%1$s">%2$s</a> kullanıcısına diğer güçlerin arasında sizin hesabınızı silebilme yeteneğide verecektir..',
	'MAKE_FOUNDER_FAILED'		=> 'Kullanıcının statüsü kurucu derecesine yükseltilemedi',
	'MAKE_FOUNDER_SUCCESS'		=> '<a href="%1$s">%2$s</a> kullanıcısı başarıyla bir Mesaj Panosu Kurucusu yapıldı.',
	'MANAGE_FOUNDERS'			=> 'Mesaj panosu kurucularını yönet',

	'NO_FOUNDERS'				=> 'Hiçbir Kurucu Bulunamadı',
	
	'PROMOTE_FOUNDER'			=> 'Kurucu derecesine yükselt',

	'USER_NAME_TO_FOUNDER'			=> 'Kurucu yapılacak Kullanıcı adı',
	'USER_NAME_TO_FOUNDER_EXPLAIN'	=> 'Mesaj Panosu Kurucusu yapmak istediğiniz Kullanıcı adını girin.',
	'USER_ID_TO_FOUNDER'			=> 'Kurucu yapılacak Kullanıcı ID',
	'USER_ID_TO_FOUNDER_EXPLAIN'	=> 'Mesaj Panosu Kurucusu yapmak istediğiniz Kullanıcı ID numarasını girin.',	
));
