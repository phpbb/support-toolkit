<?php
/**
*
* @package Support Toolkit - Database Cleaner
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
	'BOARD_DISABLE_REASON'			=> '掲示板は現在メンテナンス中です。もうしばらくお待ちください！',
	'BOARD_DISABLE_SUCCESS'			=> '掲示板の停止に成功しました！',

	'COLUMNS'						=> 'カラム',
	'CONFIG_SETTINGS'				=> 'コンフィグ設定',
	'CONFIG_UPDATE_SUCCESS'			=> 'コンフィグ設定の更新に成功しました！',
	'CONTINUE'						=> '次へ',

	'DATABASE_CLEANER'				=> 'データベースクリーナー',
	'DATABASE_CLEANER_EXTRA'		=> '赤色以外のアイテムは MOD で追加されたアイテムです。 <strong>チェックボックスがチェックされていると削除されます</strong>。',
	'DATABASE_CLEANER_MISSING'		=> '赤色のアイテムは欠けているアイテムです。追加する必要があります。 <strong>チェックボックスがチェックされていると追加されます</strong>。',
	'DATABASE_CLEANER_SUCCESS'		=> 'データベースクリーナーの全タスクが終了しました！<br /><br />データベースのバックアップをお忘れなく。',
	'DATABASE_CLEANER_WARNING'		=> 'このツールは品質が保証されていません。このツールをご利用になる前に必ずデータベースをバックアップしてください。<br /><br />“次へ” ボタンをクリックする前に必ずデータベースをバックアップしてください！',
	'DATABASE_CLEANER_WELCOME'		=> 'データベースクリーナーへようこそ！<br /><br />このツールはデータベースの掃除を行います。phpBB3 インストール時に構成されるテーブル、フィールド、データについて足りないものがあれば追加し、余分なものがあれば削除できます。<br /><br />データベースクリーナーを実行するには “次へ” ボタンをクリックしてください （実行中は掲示板が自動的に停止状態に移行します）。',
	'DATABASE_COLUMNS_SUCCESS'		=> 'データベースフィールドの更新に成功しました！',
	'DATABASE_TABLES'				=> 'データベーステーブル',
	'DATABASE_TABLES_SUCCESS'		=> 'データベーステーブルの更新に成功しました！',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'パーミッションセットの復元に成功しました！',
	'DATABASE_ROLES_SUCCESS'		=> 'パーミッションセットの更新に成功しました！',
	'DATAFILE_NOT_FOUND'			=> 'phpBB バージョン情報を取得できませんでした',

	'EMPTY_PREFIX'					=> 'テーブル接頭辞が空です',
	'EMPTY_PREFIX_CONFIRM'			=> 'データベースクリーナーはデータベースのテーブルを変更しようとしています。しかしテーブル接頭辞が空のため、phpBB3 以外のテーブルにも影響してしまう恐れがあります。データベースクリーナーを本当に実行してもよろしいですか？',
	'EMPTY_PREFIX_EXPLAIN'			=> 'データベース内 phpBB3 テーブルのテーブル接頭辞が空であると判明しました。これにより、データベースクリーナーはデータベース内の <strong>すべての</strong> テーブルをチェックします。phpBB3 テーブル以外のテーブルを選択から除外していることを十分注意して確認し、次へ進んでください。phpBB3 テーブル以外のテーブルを選択していた場合、そのテーブルは深刻なダメージを受けてしまうでしょう。<br />どのテーブルを選択してよいか判らない場合、<a href="http://www.phpbb.com/community/viewforum.php?f=46">phpBB Support Forums</a> で助力を求めてください。',
	'ERROR'							=> 'エラー',
	'EXTRA'							=> 'Extra',
	'EXTENSION_GROUPS_SUCCESS'		=> '拡張子グループのリセットに成功しました',
	'EXTENSIONS_SUCCESS'			=> '拡張子のリセットに成功しました',

	'FINAL_STEP'					=> '最終ステップです。<br /><br />掲示板の停止状態を解除し、キャッシュを消去します',

	'INSTRUCTIONS'					=> 'Instructions',

	'MISSING'						=> 'Missing',
	'MODULE_UPDATE_SUCCESS'			=> 'モジュールの更新に成功しました！',

	'NO_BOT_GROUP'					=> 'ボットグループが見つからないため、ボットをリセットできませんでした',

	'PERMISSION_SETTINGS'			=> 'パーミッションオプション',
	'PERMISSION_UPDATE_SUCCESS'		=> 'パーミッション設定の更新に成功しました！',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'ご利用の phpBB3 のバージョンはサポート外です （もしくは STK ファイルがいくつか欠けています）。<br />サポート対象は phpBB 3.0.0+ です。このツールが最新バージョンの phpBB に対応するにはしばらく時間がかかる可能性があります。',

	'QUIT'							=> 'Quit',

	'RESET_BOTS'					=> 'ボットのリセット',
	'RESET_BOTS_EXPLAIN'			=> 'ボットをリセットしてもよろしいですか？ ボットは全て一旦削除され、phpBB3 インストール時のデフォルト状態がセットされます',
	'RESET_BOTS_SKIP'				=> 'ボットのリセットはスキップされました',
	'RESET_BOT_SUCCESS'				=> 'ボットのリセットに成功しました！',
	'RESET_MODULES'					=> 'モジュールのリセット',
	'RESET_MODULES_EXPLAIN'			=> 'モジュールをリセットしてもよろしいですか？ モジュールは全て一旦削除され、phpBB3 インストール時のデフォルト状態がセットされます',
	'RESET_MODULES_SKIP'			=> 'モジュールのリセットはスキップされました',
	'RESET_MODULE_SUCCESS'			=> 'モジュールのリセットに成功しました！',
	'RESET_REPORT_REASONS'			=> '通報の理由のリセット',
	'RESET_REPORT_REASONS_EXPLAIN'	=> '通報の理由をリセットしてもよろしいですか？ 通報の理由は全て一旦削除され、phpBB3 インストール時のデフォルト状態がセットされます',
	'RESET_REPORT_REASONS_SKIP'		=> '通報の理由のリセットはスキップされました',
	'RESET_REPORT_REASONS_SUCCESS'	=> '通報の理由のリセットに成功しました！',
	'RESET_ROLE_DATA'				=> 'パーミッションセットのリセット',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'パーミッションセットを phpBB3 インストール時のオリジナルの状態へ巻き戻します。これ以前のステップでリセットを実行した場合はこのステップを実行することを強く勧めます。',
	'ROWS'							=> 'データ',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'テーブルの変更なし',
		'columns'			=> 'フィールドの変更なし',
		'config'			=> 'コンフィグの変更なし',
		'extension_groups'	=> '拡張子グループの変更なし',
		'extensions'		=> '拡張子の変更なし',
		'permissions'		=> 'パーミッションの変更なし',
		'groups'			=> 'グループの変更なし',
		'roles'				=> 'パーミッションセットの変更なし',
		'final_step'		=> '最終ステップ',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'データベーステーブルに変更点はありません',
		'columns'			=> 'データベーステーブルのフィールドに変更点はありません',
		'config'			=> 'コンフィグテーブルに変更点はありません',
		'extension_groups'	=> '拡張子グループテーブルに変更点はありません',
		'extensions'		=> 'デフォルトの拡張子に変更点はありません',
		'permissions'		=> 'パーミッションテーブルに変更点はありません',
		'groups'			=> 'グループデータに変更点はありません',
		'roles'				=> 'パーミッションセットに変更点はありません',
		'final_step'		=> 'この最終ステップでキャッシュを消去し掲示板の停止を解除します',
	),
	'SUCCESS'						=> '成功',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'グループのリセットに成功しました',

	'TYPE'							=> 'タイプ',

	'UNSTABLE_DEBUG_ONLY'			=> 'ご利用の phpBB3 の config ファイルで "DEBUG" モードを有効にしている場合、 データベースクリーナーは phpBB3 の不安定バージョン <em>(dev, a, b, RC)</em> でのみ動作します',
));
