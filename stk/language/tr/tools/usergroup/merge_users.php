<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id: merge_users.php 348 2010-04-20 19:37:47Z erikfrerejean $
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Kullanıcıları birleştir',
	'MERGE_USERS_EXPLAIN'				=> 'Araç, bir kullanıcının hesabını diğer bir kullanıcı üzerine taşımak içindir, kaynak kullanıcıların ayarları ve grup üyelikleri kopyalanacaktır. Kullanıcı izinleri, eklentiler, yasaklamalar, yer imleri, taslaklar, forum/başlık takipleri, forum/başlık izlemeleri, kayıt girdileri, anket oyları, mesajlar, özel mesajlar, bildiriler, başlıklar, uyarılar, arkadaşlar ve engellenenler taşınacaktır.<br /><strong>Kullanıcı Adı ya da Kullanıcı ID numarasından birini girebilirsiniz.</strong>',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'Bir kurucu ile kurucu olmayan bir kullanıcıyı birleştiremezsiniz.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Bir bot ile bir normal kullanıcıyı birleştiremezsiniz.',

	'MERGE_USERS_MERGED'		=> 'Kullanıcılar başarıyla birleştirildi.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Kaynak kullanıcıyı sil',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Eğer işaretlenirse bu araç mesaj panonuzdan kaynak kullanıcıyı silecektir.',

	'MERGE_USERS_SAME_USERS'	=> 'Kaynak ve hedef kullanıcılar farklı olmalıdır.',

	'MERGE_USERS_USER_SOURCE_NAME'			=> 'Kaynak kullanıcı. (Kullanıcı adı)',
	'MERGE_USERS_USER_SOURCE_ID'			=> 'Kaynak kullanıcı. (Kullanıcı ID)',
	'MERGE_USERS_USER_SOURCE_NAME_EXPLAIN'	=> 'Mesajlar, özel mesajlar, izinler, uyarılar, v.b. bu kullanıcıdan hedef kullanıcıya taşınır, grup üyelikleri ve kullanıcı ayarları ise kopyalanır.',	

	'MERGE_USERS_USER_TARGET_NAME'	=> 'Hedef kullanıcı. (Kullanıcı adı)',
	'MERGE_USERS_USER_TARGET_ID'	=> 'Hedef kullanıcı. (Kullanıcı ID)',

	'NO_SOURCE_USER'		=> 'İstenilen kaynak kullanıcı mevcut değil',
	'NO_TARGET_USER'		=> 'İstenilen hedef kullanıcı mevcut değil',

	'BOTH_SOURCE_USER'		=> 'Sadece bir kaynak alanını doldurun.',
	'BOTH_TARGET_USER'		=> 'Sadece bir hedef alanını doldurun.',	
));
