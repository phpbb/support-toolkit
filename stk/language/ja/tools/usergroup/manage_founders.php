<?php
/**
*
* @package Support Toolkit - Make Founder
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
	'DEMOTE_FAILED'				=> 'ウェブマスターの全てを解任することはできません！',
	'DEMOTE_FOUNDERS'			=> 'ウェブマスターを解任する',
	'DEMOTE_SUCCESSFULL'		=> 'ウェブマスター %d 名を解任しました！',

	'FOUNDERS'					=> 'ウェブマスター',

	'MAKE_FOUNDER'				=> 'ウェブマスターの任命',
	'MAKE_FOUNDER_CONFIRM'		=> 'ユーザー <a href="%1$s">%2$s</a>　をウェブマスターに任命しますか？このことはユーザー <a href="%1$s">%2$s</a> があなたのアカウントを削除できるということを意味します。',
	'MAKE_FOUNDER_FAILED'		=> 'このユーザーをウェブマスターに任命することはできません',
	'MAKE_FOUNDER_SUCCESS'		=> 'ウェブマスター <a href="%1$s">%2$s</a> の作成に成功しました',
	'MANAGE_FOUNDERS'			=> 'ウェブマスターの管理',

	'NO_FOUNDERS'				=> 'ウェブマスターなし',

	'PROMOTE_FOUNDER'			=> 'ウェブマスターに任命する',

	'USER_TO_FOUNDER'			=> 'ウェブマスター任命',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'ウェブマスターに任命したいユーザーの ユーザー名 または ユーザーID を入力してください',
));
