<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'					=> 'MySQL アップグレーダー',
	'MYSQL_UPGRADER_BACKUP'				=> 'このツールは危険です； 実行する前にデータベースを必ずバックアップしてください！',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'このツールは MySQL データベースのアップグレード時に発生するある種の問題 （エラーメッセージ <strong><em>Field \'forum_last_post_subject\' doesn\'t have a default value [1364]</em></strong> が表示される） を解決するために用意されたツールです。 MySQL のアップグレードによってデータベーススキーマが変更されてしまうとこのエラーが発生します （多くの場合、ホスティングサービス運営会社が通知なしでホストサーバの MySQL をアップグレードすることにより突如このエラーが発生します）。 詳しくは Knowledge Base の記事 <em>“<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>”</em> をご覧ください。' ,
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'ダウンロード',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'このオプションをチェックした場合、データベーススキーマをアップグレードするための SQL クエリが生成され、画面に表示されます。そちらから SQL ファイルをダウンロードしてください。',
	'MYSQL_UPGRADER_RESULT'				=> '下のスクリプトはデータベーススキーマを適正な MySQL のバージョンへアップデートするための MySQL クエリです。 <a href="%s">コチラ</a> をクリックして .sql ファイルをダウンロードしてください。',
	'MYSQL_UPGRADER_RUN'				=> '実行',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'このオプションをチェックした場合、データベーススキーマをアップグレードするための SQL クエリが生成され、自動的にそのクエリが実行されます。<br />クエリの実行には時間がかかるのが普通です。通知メッセージが表示されるまでページを<strong>絶対に</strong>移動しないでください。',
	'MYSQL_UPGRADER_SCRIPT'				=> 'MySQL アップグレードスクリプト',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'データベーススキーマのアップグレードに成功しました',
	
	'QUERY_FINISHED'	=> '%2$d 個のクエリ中、 %1$d 番目のクエリを実行しました。アップグレードはまだ進行中です。',

	'TOOL_MYSQL_ONLY'	=> 'このツールはデータベースが MySQL の場合にのみ利用できます',
));
