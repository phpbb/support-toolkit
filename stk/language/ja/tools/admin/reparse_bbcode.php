<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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

/**
* DO NOT CHANGE
*/
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
	'REPARSE_ALL'				=> 'BBCode を全て再解析する',
	'REPARSE_ALL_EXPLAIN'		=> '掲示板に投稿されたメッセージを全て再解析します; 投稿記事、プライベートメッセージ、サイン。上で記事または PM が指定された場合、このオプションは無効化されます。',
	'REPARSE_BBCODE'			=> 'BBCode の再解析',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBCode の再解析が完了しました',
	'REPARSE_BBCODE_CONFIRM'	=> 'BBCode を再解析してもよろしいですか？ このツールにはデータベースに修復不可能なダメージを与えてしまう危険があります; そのため<strong>データベースのバックアップは必ず行ってください</strong>。また再解析が完了するまでページ移動しないでください。',
	'REPARSE_BBCODE_PROGRESS'	=> '現在 %1$d ステップまで処理が完了しました。ステップ　%2$d の処理を実行します...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> '投稿記事の再解析が終了しました。プライベートメッセージの再解析へ移行します。',
		2	=> 'プライベートメッセージの再解析が終了しました。サインの再解析へ移行します。',
	),
	'REPARSE_IDS_INVALID'			=> 'ID が正しくありません; ID がきちんとコンマで区切られているかご確認ください  （例 1,2,3,5,8,13 ）。',
	'REPARSE_POST_IDS'				=> '記事の再解析',
	'REPARSE_POST_IDS_EXPLAIN'		=> '特定の記事のみ再解析したい場合、記事の ID をコンマで区切って並べてください  （例 1,2,3,5,8,13 ）。',
	'REPARSE_PM_IDS'				=> 'PM の再解析',
	'REPARSE_PM_IDS_EXPLAIN'		=> '特定の PM のみ再解析したい場合、PM の ID をコンマで区切って並べてください  （例 1,2,3,5,8,13 ）。',	
));
