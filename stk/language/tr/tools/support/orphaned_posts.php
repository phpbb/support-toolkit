<?php
/**
*
* @package Support Toolkit - Orphaned posts/topics
* @version $Id$
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
	'AUTHOR'					=> 'Yazar',
	'FORUM_NAME'				=> 'Forum Adı',
	'NEW_TOPIC_ID'				=> 'Yeni Başlık ID numarası',
	'POST_ID'					=> 'Mesaj ID numarası',
	'TOPIC_ID'					=> 'Başlık ID numarası',

	'DELETE_EMPTY_TOPICS'		=> 'Bu düğmeye tıkladığınız zaman seçilen tüm başlıklar silinecektir. (Geri dönüşü olmayan bir işlemdir!)',
	'EMPTY_TOPICS'				=> 'Boş Başlıklar',
	'EMPTY_TOPICS_EXPLAIN'		=> 'Bu başlıklar hiç bir mesaja sahip olmayan ya da hiç bir mesaj ile ilişkilendirilmemiş başlıklardır.',
	'NO_EMPTY_TOPICS'			=> 'Hiç bir boş başlık bulunamadı',
	'NO_TOPICS_SELECTED'		=> 'Hiç bir başlık seçilmedi',

	'ORPHANED_POSTS'			=> 'Boşta Kalan Mesajlar',
	'ORPHANED_POSTS_EXPLAIN'	=> 'Bu mesajlar hiç bir başlığa sahip olmayan ya da hiç bir başlık ile ilişkilendirilmemiş mesajlardır. Mesajı herhangi bir başlığa eklemek için o yeni başlığın ID numarasını belirtin.',
	'NO_ORPHANED_POSTS'			=> 'Hiç bir boşta kalan mesaj bulunamadı',
	'NO_TOPIC_IDS'				=> 'Hiç bir başlık ID numarası belirtilmedi',
	'NONEXISTENT_TOPIC_IDS'		=> 'Belirtilen hedef başlık ID numarası mevcut değil: %s.<br />Lütfen belirtilen başlık ID numarasını doğrulayın.',
	'REASSIGN'					=> 'Yeniden tanımla',

	'DELETE_SHADOWS'			=> 'Bu düğmeye tıkladığınız zaman seçilen tüm gölgeli başlıklar silinecektir. (Geri dönüşü olmayan bir işlemdir!)',
	'ORPHANED_SHADOWS'			=> 'Boşta Kalan Gölgeli Başlıklar',
	'ORPHANED_SHADOWS_EXPLAIN'	=> 'Bu gölgeli başlıklar, yönlendirildiği hedef başlığı artık mevcut olmayan başlıklardır.',
	'NO_ORPHANED_SHADOWS'		=> 'Hiç bir gölgeli başlık bulunamadı',

	'POSTS_DELETED'				=> '%d mesaj silindi',
	'POSTS_REASSIGNED'			=> '%d mesaj yeniden tanımlandı',
	'TOPICS_DELETED'			=> '%d başlık silindi',
));
