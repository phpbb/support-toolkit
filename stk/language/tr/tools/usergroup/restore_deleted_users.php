<?php
/**
*
* @package Support Toolkit - Restore Delted Users
* @version $Id: restore_deleted_users.php 416 2010-06-09 00:49:36Z iwisdom $
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
	'DAMAGED_POSTS'			=> 'Hasarlı Mesajlar',
	'DAMAGED_POSTS_EXPLAIN'	=> 'Aşağıdaki kullanıcı bilgisi içeren mesaj ID numaraları geri getirmek için çok fazla hasarlı. Lütfen bu sorunun nasıl çözüleceğine dair yardım almak için <a href="https://www.phpbb.com/community/viewforum.php?f=46">destek forumlarını</a> ziyaret edin.',

	'NO_DELETED_USERS'	=> 'Geri getirilebilecek hiç bir silinmiş kullanıcı yok',
	'NO_USER_SELECTED'	=> 'Hiç bir kullanıcı seçilmedi!',

	'RESTORE_DELETED_USERS'						=> 'Silinen Kullanıcıları Geri Getir',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Silinen Kullanıcıları Geri Getir :: Çakışanlar',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Bu araç mesaj panonuzdan silinen ve hala "misafir" olarak mesajları mevcut olan kullanıcıları geri getirmeye izin verir.<br />Bu kullanıcılara rastgele bir şifre tanımlanacaktır, bu nedenle aracı çalıştırdıktan sonra manuel olarak şifreyi sıfırlamalısınız. Bu araç her bir kullanıcı için oluşturulan şifrelerin listesini vermez!<br /><br />Bu araç son çalıştırılma esnasında mesaj panonuzda zaten varolan bazı kullanıcı adları buldu. Lütfen bu kullanıcılar için yeni bir ad belirtin.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Bu araç mesaj panonuzdan silinen ve hala "misafir" olarak mesajları mevcut olan kullanıcıları geri getirmeye izin verir.<br />Bu kullanıcılara rastgele bir şifre tanımlanacaktır, bu nedenle aracı çalıştırdıktan sonra manuel olarak şifreyi sıfırlamalısınız. Bu araç her bir kullanıcı için oluşturulan şifrelerin listesini vermez!',

	'SELECT_USERS'	=> 'Geri getirmek için kullanıcılar seçin',

	'USER_RESTORED_SUCCESSFULLY'	=> 'Seçilen kullanıcı başarıyla geri getirildi.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Seçilen kullanıcılar başarıyla geri getirildi.',
));
