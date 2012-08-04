<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'Misafir kullanıcı’nın profil verisi başarıyla temizlendi.',
	'ANONYMOUS_CORRECT'					=> 'Misafir kullanıcı bulundu ve düzgün şekilde yapılandırıldı.',
	'ANONYMOUS_CREATED'					=> 'Misafir kullanıcı başarıyla yeniden oluşturuldu.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Misafir kullanıcının yeniden oluşturulması mümkün değil. Lütfen daha fazla yardım için phpBB.com Destek Forumuna sorun.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'Misafir kullanıcı tüm erişilen gruplardan başarıyla silindi.',
	'ANONYMOUS_MISSING'					=> 'Misafir kullanıcı bulunamadı.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'Veritabanınızda Misafir kullanıcı bulunamadı. Bu kullanıcı misafirlerin mesaj panonuzu ziyaret etmesine izin verir. Yeni bir tane oluşturmak istiyor musunuz?',
	'ANONYMOUS_WRONG_DATA'				=> 'Misafir kullanıcı’nın profil verisi yanlış.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Misafir kullanıcı’nın profil bilgisi kısmen yanlış. Bunu onarmak istiyor musunuz?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Misafir kullanıcı çoklu kullanıcı gruplarına uygunsuz bir şekilde üye olmuş.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Misafir kullanıcı çoklu kullanıcı gruplarına uygunsuz bir şekilde üye olmuş. Misafir kullanıcıyı "MİSAFİRLER" grubu dışındaki tüm gruplardan silmek istiyor musunuz?',

	'REDIRECT_NEXT_STEP'				=> 'Sonraki adıma yönlendiriliyorsunuz.',

	'SANITISE_ANONYMOUS_USER'			=> 'Misafir Kullanıcıyı Sterilize Et',
));
