<?php
/**
*
* @package Support Toolkit - Anonymous group check
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
	'ANONYMOUS_CLEANED'					=> 'Anonymous ユーザーのプロフィールデータのサニタイズに成功しました',
	'ANONYMOUS_CORRECT'					=> 'Anonymous ユーザーが見つかりました。ユーザーデータも正常です。',
	'ANONYMOUS_CREATED'					=> 'Anonymous ユーザーの作成に成功しました',
	'ANONYMOUS_CREATION_FAILED'			=> 'Anonymous ユーザーを作成できませんでした。より詳しくは phpBB.com のサポートフォーラムで質問してください。 ',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'ユーザーグループから Anonymous ユーザーを除外しました',
	'ANONYMOUS_MISSING'					=> 'Anonymous ユーザーが見つかりません',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'データベースに Anonymous ユーザーが存在しません。 Anonymous ユーザーはゲストが掲示板にアクセスする際に利用されるユーザーです。Anonymous ユーザーを作成しますか？',
	'ANONYMOUS_WRONG_DATA'				=> 'Anonymous ユーザーのプロフィールデータが不正確です',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Anonymous ユーザーのプロフィールデータが一部不正確です。修復しますか？',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Anonymous ユーザーが不適切にもユーザーグループに配属されています',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Anonymous ユーザーが不適切にもユーザーグループに配属されています。 "GUESTS" を除く全てのグループから Anonymous ユーザーを除外してもよろしいですか？',

	'REDIRECT_NEXT_STEP'				=> '次のステップへリダイレクトします',

	'SANITISE_ANONYMOUS_USER'			=> 'Anonymous ユーザーのサニタイズ',
));
