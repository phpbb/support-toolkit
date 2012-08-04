<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'ユーザーグループの再同期',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'このツールは特別グループ <em>（登録ユーザー、COPPA-登録ユーザー、一見さん）</em> についてメンバーを再同期できます。',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'グループは全て問題ないようです！',
	'RESYNC_USER_GROUPS_SETTINGS'	=> '再同期オプション',
	'RUN_BOTH_FINISHED'				=> 'ユーザーグループの再同期に成功しました！',
	'RUN_RNR'						=> '一見さん グループを再同期する',
	'RUN_RNR_EXPLAIN'				=> '"一見さん" グループを再同期します。掲示板の全ユーザーについて AdminCP での一見さん設定を基に一見さんであるかどうかをチェックし直します。',
	'RUN_RNR_FINISHED'				=> '一見さん グループの再同期に成功しました！',
	'RUN_RNR_NOT_FINISHED'			=> '一見さん グループの再同期中です。ページを移動しないでください。',
	'RUN_RR'						=> '(COPPA-)登録ユーザー グループを再同期する',
	'RUN_RR_EXPLAIN'				=> '"登録ユーザー" または "COPPA-登録ユーザー" にメンバーが存在することを確認しました。これらのグループについて再同期しますか？<br /><strong>注意 : </strong>COPPA を有効にしている場合、誕生日が未入力の登録ユーザーは全て "<em>COPPA</em>-登録ユーザー" へ配属されます！',
	'RUN_RR_FINISHED'				=> '(COPPA-)登録ユーザー グループの再同期に成功しました！',

	'SELECT_RUN_GROUP'	=> 'グループを選択してください',
));
