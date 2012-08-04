<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'ユーザーのマージ',
	'MERGE_USERS_EXPLAIN'				=> 'このツールではユーザーのアカウントを他のユーザーのアカウントに マージ（合併・吸収） できます。マージ元ユーザーからマージ先ユーザーへ、ユーザー設定とグループメンバーシップはコピーされ、ユーザーパーミッション、添付ファイル、アクセス禁止、ブックマーク、下書き、フォーラムとトピックの既読、フォーラムとトピックのウォッチ、ログ、投票、投稿記事、PM、通報、トピック、警告、フレンドリストとブロックリスト、は移譲されます。',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'ウェブマスターを非ウェブマスターユーザーへマージすることはできません',
	'MERGE_USERS_BOTH_IGNORE'	=> 'ボットを非ボットユーザーへマージすることはできません',

	'MERGE_USERS_MERGED'		=> 'ユーザーのマージに成功しました',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'マージ元ユーザーを削除する',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'チェックした場合、マージ元ユーザーが削除されます',

	'MERGE_USERS_SAME_USERS'	=> 'マージ元ユーザーとマージ先ユーザーが同一ユーザーであってはいけません',

	'MERGE_USERS_USER_SOURCE'			=> 'マージ元ユーザー',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'マージ元ユーザーからマージ先ユーザーへ、投稿記事、PM、パーミッション、警告、などは移動され、グループメンバーシップとユーザー設定はコピーされます',

	'MERGE_USERS_USER_TARGET'	=> 'マージ先ユーザー',
));
