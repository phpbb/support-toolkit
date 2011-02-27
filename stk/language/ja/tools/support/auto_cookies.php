<?php
/**
*
* @package Support Toolkit - Auto Cookies
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
	'AUTO_COOKIES'				=> 'Cookie の初期化',
	'AUTO_COOKIES_EXPLAIN'		=> 'このツールでは掲示板の Cookie 設定を初期の状態に戻すことができます。多くの場合、既に入力されている各設定は正確です。設定が正確かどうか判断できない場合、設定を変更する前にサポートフォーラムで情報を調べることを勧めます。間違った設定にしてしまうと掲示板にログインできなくなる可能性がありますのでご注意ください。',

	'COOKIE_SETTINGS_UPDATED'	=> 'Cookie 設定の更新に成功しました',
));
