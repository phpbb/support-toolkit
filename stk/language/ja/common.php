<?php
/**
*
* @package Support Toolkit
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
   'BACK_TOOL'							=> '元のツールへ',
   'BOARD_FOUNDER_ONLY'					=> 'Support Toolkit を使用できるのはウェブマスターだけです',

   'CAT_ADMIN'							=> 'Adminツール',
   'CAT_ADMIN_EXPLAIN'					=> 'Adminツール は Admin が利用するためのツールです',
   'CAT_DEV'							=> '開発者ツール',
   'CAT_DEV_EXPLAIN'					=> '開発者ツールは phpBB の開発者または MOD 作者が利用するためのツールです',
   'CAT_ERK'							=> 'Emergency Repair Kit',
   'CAT_ERK_EXPLAIN'					=> 'Emergency Repair Kit ( ERK ) は STK とは別のパッケージです。phpBB3 が何らかの問題で正常に動作しなくなった場合、このツールを発動させることで問題の箇所を検出できます。<a href="%s">コチラ</a>をクリックすれば ERK が発動します。',
   'CAT_MAIN'							=> 'メイン',
   'CAT_MAIN_EXPLAIN'					=> 'Support Toolkit （ 以下 STK ） は phpBB 3.0.x のファイルまたはデータベースの管理・修正・再構築を目的としたツールキットです。STK はもう１つの AdminCP であり、phpBB3 が正常に機能しなくなった場合に問題を解決する手段を提供します。',
   'CAT_SUPPORT'						=> 'サポートツール',
   'CAT_SUPPORT_EXPLAIN'				=> 'サポートツールは正常に機能しなくなった phpBB3 を元に戻すためのツールです',
   'CAT_USERGROUP'						=> 'ユーザー＆グループツール',
   'CAT_USERGROUP_EXPLAIN'				=> 'ユーザー＆グループツールはユーザーとグループのデータを管理するためのツールです',
   'CONFIG_NOT_FOUND'					=> 'STK のコンフィグファイルが見つかりませんでした。コンフィグファイルがきちんと存在しているかご確認ください。',

   'DOWNLOAD_PASS'						=> 'パスワードファイルのダウンロード',

   'EMERGENCY_LOGIN_NAME'				=> 'STK Emergency login',
   'ERK'								=> 'Emergency Repair Kit',

   'FAIL_REMOVE_PASSWD'					=> 'パスワードファイルを削除できませんでした。手動で削除してください！',

   'GEN_PASS_FAILED'					=> '新しいパスワードの発行に失敗しました。もう一度お試しください。',
   'GEN_PASS_FILE'						=> 'パスワードファイルの生成',
   'GEN_PASS_FILE_EXPLAIN'				=> 'ウェブマスターが何らかの問題でログインできない場合、救済措置として STKログイン認証 が用意されています。STKログイン認証 でログインするにはまず<a href="%s"><strong>パスワードファイルを生成</strong></a>する必要があります。',

   'INCORRECT_CLASS'					=> '不正なクラスが存在します: stk/tools/%1$s.%2$s',
   'INCORRECT_PASSWORD'					=> 'パスワードが正しくありません',
   'INCORRECT_PHPBB_VERSION'			=> 'ご利用の phpBB のバージョンが古すぎてこのツールを使用できません。phpBB のバージョンは少なくとも %1$s 以上である必要があります。',

   'LOGIN_STK_SUCCESS'					=> '認証に成功しました。STK へ自動的にリダイレクトします。',

   'NOTICE'								=> '注意',
   'NO_VERSION_FILE'					=> 'Support Toolkit (STK) にはバージョンが最新であるかどうかを自動的にチェックする機能がありません。 ご利用になる前に <a href="http://phpbb.com/support/stk">Support Toolkit section of phpBB.com</a> を訪れてこの STK が最新バージョンであるかどうかをお確かめください。',

   'PASS_GENERATED'						=> 'パスワードファイル生成の準備が整いました！<br/>仮パスワード: <em>%1$s</em><br />仮パスワードの有効期限: <span style="text-decoration: underline;">%2$s</span>.<br /><br />下のボタンをクリックすればパスワードファイルをダウンロードできます。サーバの "stk" ディレクトリへパスワードファイルをアップロードすることで仮パスワードは有効化されます。',
   'PASS_GENERATED_REDIRECT'			=> 'パスワードファイルのアップロード後、<a href="%s">コチラ</a>をクリックしてログインしてください',
   'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'ご利用の phpBB のバージョンが古すぎてこのツールを利用することができません',
   'PROCEED_TO_STK'						=> '%sSTK へ移動する%s',

   'STK_FOUNDER_ONLY'					=> 'STK へ入室するにはもう一度ユーザー認証する必要があります',
   'STK_LOGIN'							=> 'STK ログイン',
   'STK_LOGIN_WAIT'						=> '３秒以上待ってからログインしてください',
   'STK_LOGOUT'							=> 'STK ログアウト',
   'STK_LOGOUT_SUCCESS'					=> 'STK のログアウトに成功しました',
   'STK_NON_LOGIN'						=> 'Support Toolkit ログイン',
   'STK_OUTDATED'						=> 'ご利用の Support Toolkit が最新ではありません。最新バージョンは <strong style="color: #008000;">%1$s</strong> です。一方、ご利用のバージョンは <strong style="color: #FF0000;">%2$s</strong> です。<br /><br />このツール の性格上、最新バージョンへアップデートされるまでツールの利用はできないようになっています。STK のアップデートを行う前にサーバにインストールされている全てのソフトウェアをできるだけ最新にしておくことを強く勧めます。最新バージョンを含めた詳細については <a href="%3$s">release topic</a> をご覧ください。<br /><br /><em>STK アップデート完了後でもまだこのメッセージが表示される場合は<a href="%4$s">コチラ</a>をクリックしてバージョンチェックのキャッシュを消去してください。</em>',
   'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
   'SUPPORT_TOOL_KIT_INDEX'				=> 'Support Toolkit トップ',
   'SUPPORT_TOOL_KIT_PASSWORD'			=> 'パスワード',
   'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'ウェブマスターであることを証明するパスワードをご入力ください。<br /><br /><strong>ブラウザの Cookie は必ず有効化されている必要があります。Cookie が無効化されているとログイン状態を維持できませんのでご注意ください。</strong>',

   'TOOL_INCLUTION_NOT_FOUND'			=> 'ファイル (%1$s) が存在しないためこのツールを利用することはできません',
   'TOOL_NAME'							=> 'ツール名',
   'TOOL_NOT_AVAILABLE'					=> 'リクエストされたツールは利用できません',

   'USING_STK_LOGIN'					=> '現在 STKログイン認証 でログインしています。この STKログイン認証 は phpBB のログインにどうしても成功しない場合に<strong>だけ</strong>利用されるべきです。<br />STKログイン認証 からログアウトするには<a href="%1$s">コチラ</a>をクリックしてください。',
));
