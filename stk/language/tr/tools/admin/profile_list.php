<?php
/**
*
* @package Support Toolkit - Profile List
* @version $Id: profile_list.php 277 2010-01-20 01:38:28Z iwisdom $
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
	'ALL'					=> 'Tümü',

	'CLICK_TO_DELETE'		=> 'Bu butona tıklandığında bütün kullanıcılar silinir. <em>(Bu, geri dönüşü olmayan bir işlemdir!)</em>',

	'FILTER'				=> 'Filtre',

	'LIMIT'					=> 'Limit',

	'ONLY_NON_EMPTY'		=> 'Sadece Boş Olmayan',
	'ORDER_BY'				=> 'Sırala',

	'PROFILE_LIST'			=> 'Profil Listesi',
	'PROFILE_LIST_EXPLAIN'	=> 'Bu araç çoklu kullanıcılar için profil bilgisini gösterir. Bu araç ayrıca spamcı hesapların tanımlanmasına yardımcı olmak amacıyla kullanılabilir.',
	
	'USERS_DELETE'				=> 'Seçilen kullanıcıları sil',
	'USERS_DELETE_CONFIRM'		=> 'Seçilen kullanıcıları silmek istediğinize emin misiniz? Bu araç aracılığıyla silinen kullanıcıların aynı zamanda <strong>bütün mesajları da silinecektir</strong>!',
	'USERS_DELETE_SUCCESSFULL'	=> 'Tüm seçilen kullanıcılar başarıyla silindi!',	
));
