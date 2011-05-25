<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'Kullanıcı gruplarını yeniden senkronize et',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Bu araç, tüm kullanıcıların varsayılan gruplarının doğru olup olmadığını kontrol etmek için geliştirimiştir <em>(Kayıtlı Kullanıcılar, Kayıtlı COPPA Kullanıcıları ve Yeni Kayıtlı Kullanıcılar)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Tüm gruplar güncel görünüyor!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Yeniden senkronize seçenekleri',
	'RUN_BOTH_FINISHED'				=> 'Tüm kullanıcı grupları başarıyla yeniden senkronize edildi!',
	'RUN_RNR'						=> 'Yeni kayıtlı kullanıcıları yeniden senkronize et',
	'RUN_RNR_EXPLAIN'				=> 'Bu işlem "Yeni Kayıtlı Kullanıcılar" grubunu güncelleyecek, böylece YKPde belirlenen kritere uygun tüm kullanıcıları içerecektir.',
	'RUN_RNR_FINISHED'				=> 'Yeni Kayıtlı Kullanıcılar grubu başarıyla yeniden senkronize edili!',
	'RUN_RNR_NOT_FINISHED'			=> 'Yeni Kayıtlı Kullanıcılar grubu şu anda yeniden senkronize oluyor. Lütfen bu işlemi yarıda kesmeyin.',
	'RUN_RR'						=> 'Kayıtlı kullanıcıları yeniden senkronize et',
	'RUN_RR_EXPLAIN'				=> 'Araç, mesaj panonuzdaki kullanıcıların hiç birisinin "Kayıtlı <em>(COPPA)</em> kullanıcıları" grubunun üyesi olmadıklarını belirledi. Bu grupları yeniden senkronize etmek ister misiniz?<br /><strong>Not:</strong> Eğer mesaj panonuzda COPPA özelliği açıksa doğum tarihini girmeyen bir kullanıcı "Kayıtlı COPPA kullanıcıları" grubuna yerleştirilecektir!',
	'RUN_RR_FINISHED'				=> 'Kullanıcılar başarıyla yeniden senkronize edildi!',

	'SELECT_RUN_GROUP'	=> 'Yeniden senkronize edilecek en az bir grup seçin.',
));
