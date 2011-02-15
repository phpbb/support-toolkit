<?php
/**
*
* @package Support Toolkit - Resynchronise Newly Registered users group
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
	'RESYNC_NEWLY_REGISTERED'				=> '一見さんの同期',
	'RESYNC_NEWLY_REGISTERED_CONFIRM'		=> '一見さんグループを同期してもよろしいですか？AdminCP の設定に従ってユーザーを “一見さん” グループ へ追加 または除名 します',
	'RESYNC_NEWLY_REGISTERED_FINISHED'		=> '一見さんグループの同期に成功しました！',
	'RESYNC_NEWLY_REGISTERED_NOT_FINISHED'	=> '一見さんグループを同期しています。ページを移動しないでください。',
));

?>