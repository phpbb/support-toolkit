<?php
/**
*
* @package Support Toolkit - Add User
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
	'ADD_USER'				=> 'ユーザーの追加',
	'ADD_USER_GROUP'		=> 'グループの選択',

	'DEFAULT_GROUP'			=> 'デフォルトグループ',
	'DEFAULT_GROUP_EXPLAIN'	=> 'このユーザーのデフォルトグループです',

	'GROUP_LEADER'			=> 'グループリーダー',
	'GROUP_LEADER_EXPLAIN'	=> 'このユーザーにリーダーに任せたいグループがあれば選択してください',

	'USER_ADDED'			=> 'ユーザーの作成に成功しました！',
	'USER_GROUPS'			=> 'ユーザーグループ',
	'USER_GROUPS_EXPLAIN'	=> 'このユーザーに参加させたいグループがあれば選択してください',
));

?>