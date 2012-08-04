<?php
/**
*
* @package Support Toolkit - Reparse BBCode
* @version $Id: reparse_bbcode.php 289 2010-01-24 07:32:47Z iwisdom $
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
// í ª ì î Ö
//

$lang = array_merge($lang, array(
	'REPARSE_ALL'				=> 'Tüm BBCodeları yeniden biçimlendir',
	'REPARSE_ALL_EXPLAIN'		=> 'Bunu seçtiğiniz zaman BBCode yeniden biçimlendirme mesaj panonuzdaki tüm içerikleri yeniden biçimlendirecektir; varsayılan olarak bu araç sadece phpBB tarafından önceden biçimlendirilen mesajları/özel mesajları/imzaları yeniden biçimlendirecektir. Eğer yukarıda mesajlar ya da özel mesajlar belirlendiyse bu seçenek yoksayılacaktır.',
	'REPARSE_BBCODE'			=> 'BBCode Yeniden Biçimlendirme',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBCodelar yeniden biçimlendirildi.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Tüm BBCodeları yeniden biçimlendirmek istediğinize emin misiniz? Not: Bu araç veritabanınızı onarmanın ötesinde veritabanınıza olası zararlar verebilir; bu nedenle, <strong>işleme başlamadan önce veritabanınızın yedeğini aldığınızdan emin olun</strong>. Ayrıca, bu aracın işlemi tamamlaması uzun zaman alabilir.',
	'REPARSE_BBCODE_PROGRESS'	=> '%1$d numaralı adım tamamlandı. Bir dakika içinde %2$d numaralı adıma geçiliyor...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Mesajların yeniden biçimlendirilmesi tamamlandı, özel mesajlara geçiliyor.',
		2	=> 'Özel mesajların yeniden biçimlendirilmesi tamamlandı, imzalara geçiliyor.',
	),
	'REPARSE_IDS_INVALID'			=> 'Girdiğiniz ID numarası geçerli değil; lütfen mesaj ID numaralarını virgülle ayırarak listelediğinizden emin olun (ör. 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Belirli Mesajları Yeniden Biçimlendir',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Sadece belirli mesajları yeniden biçimlendirmek için, belirlenecek mesaj ID numaralarını virgülle ayırarak listeleyin.',
	'REPARSE_PM_IDS'				=> 'Belirli Özel Mesajları Yeniden Biçimlendir',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Sadece belirli özel mesajları yeniden biçimlendirmek için, belirlenecek özel mesaj ID numaralarını virgülle ayırarak listeleyin (ör. 1,2,3,5,8,13).',	
));
