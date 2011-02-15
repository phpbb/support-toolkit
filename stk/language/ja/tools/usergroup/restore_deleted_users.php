<?php
/**
*
* @package Support Toolkit - Restore Delted Users
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
	'NO_DELETED_USERS'	=> '復元可能なユーザーが存在しません',
	'NO_USER_SELECTED'	=> 'ユーザーが選択されていません！',

	'RESTORE_DELETED_USERS'						=> '削除済みユーザーの復元',
	'RESTORE_DELETED_USERS_CONFLICT'			=> '削除済みユーザーの復元 :: 衝突',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'このツールでは削除されたユーザーを復元することができます。ただし投稿した記事がまだ残っているユーザーだけに限ります。<br />復元されたユーザーにはランダムなパスワードが新しく与えられます。パスワードの内容は表示され<b>ません</b>。そのためこのツールの使用後、ユーザーのパスワードを Admin が再設定しそのパスワードをユーザーに通知する必要があります。<br /><br />削除済みユーザーのユーザー名を持つユーザーが既に存在している場合、新しいユーザー名を与えてください',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'このツールでは削除されたユーザーを復元することができます。ただし投稿した記事がまだ残っているユーザーだけに限ります。<br />復元されたユーザーにはランダムなパスワードが新しく与えられます。パスワードの内容は表示され<b>ません</b>。そのためこのツールの使用後、ユーザーのパスワードを Admin が再設定しそのパスワードをユーザーに通知する必要があります。',

	'SELECT_USERS'	=> '復元するユーザーの選択',

	'USER_RESTORED_SUCCESSFULLY'	=> 'ユーザーの復元に成功しました',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'ユーザーの復元に成功しました',
));
