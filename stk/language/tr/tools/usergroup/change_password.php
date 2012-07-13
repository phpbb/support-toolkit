<?php
/**
*
* @package Support Toolkit - Change Password
* @version $Id: change_password.php 244 2009-10-22 11:00:13Z erikfrerejean $
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
	'CHANGE_PASSWORD'			=> 'Şifreyi Değiştir',
	'CHANGE_PASSWORD_EXPLAIN'	=> 'Bir kullanıcı’nın şifresini değiştir.<br /><strong>Kullanıcı adı ya da Kullanıcı ID numarasından birini girebilirsiniz.</strong>',
	'CHANGE_PASSWORD_SUCCESS'	=> '<a href="%s">%s</a> için şifre başarıyla değiştirildi.',

	'FIELDS_NOT_FILLED'			=> 'Bir alan doldurulmalıdır.',
	'FIELDS_BOTH_FILLED'		=> 'Sadece bir alan doldurulabilir.',

	'PASSWORD_CONFIRM'			=> 'Şifreyi Tekrar Gir',
	
	'USERNAME_NAME'				=> 'Kullanıcı adı',
	'USERNAME_NAME_EXPLAIN'		=> 'Şifresini değiştirmek istediğiniz Kullanıcı adını girin.',
	'USERNAMEID'				=> 'Kullanıcı ID',
	'USERNAMEID_EXPLAIN'		=> 'Şifresini değiştirmek istediğiniz Kullanıcı ID numarasını girin.',	
));
