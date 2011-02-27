<?php
/**
*
* @package Support Toolkit - Update email hashes
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
	'UPDATE_EMAIL_HASHES'				=> 'メールハッシュの更新',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'phpBB 3.0.7 以前（ 3.0.7 含まない ）の場合、32ビットOS から 64ビットOS への変更はメールハッシュを壊す可能性があります<em>（<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">バグレポートはこちらです</a>）。</em><br />このツールではデータベース内のメールハッシュデータを更新し動作を正常化させることができます。',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'メールハッシュを全て更新しました！',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'メールハッシュを更新しています',
));
