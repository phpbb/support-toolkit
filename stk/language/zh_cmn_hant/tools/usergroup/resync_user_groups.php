<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
 * @copyright (c) 2009 phpBB-TW (心靈捕手) http://phpbb-tw.net/phpbb/
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
	'RESYNC_USER_GROUPS'			=> '重新同步會員群組',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> '這個工具目的在檢查所有的會員其預設群組是否正確 <em>(註冊會員、註冊 COPPA 會員以及新註冊會員)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> '所有的群組似乎都是最新的！',
	'RESYNC_USER_GROUPS_SETTINGS'	=> '重新同步選項',
	'RUN_BOTH_FINISHED'				=> '所有的會員群組已成功地重新同步！',
	'RUN_RNR'						=> '重新同步新註冊會員',
	'RUN_RNR_EXPLAIN'				=> '這將更新「新註冊會員」群組，以使得所有的會員都適用在 ACP 的標準規定。',
	'RUN_RNR_FINISHED'				=> '新註冊會員群組已成功地重新同步！',
	'RUN_RNR_NOT_FINISHED'			=> '新註冊會員群組正在進行重新同步，請不要中斷這個過程！',
	'RUN_RR'						=> '重新同步註冊會員',
	'RUN_RR_EXPLAIN'				=> '此工具已確定您的論壇有部份會員是「註冊 <em>(COPPA)</em> 會員」群組。您要重新同步這些群組嗎？<br /><strong>注意：</strong>如果您的論壇有啟用 COPPA，而某會員沒有填入其出生日期，那麼此會員會被放進「註冊 COPPA 會員」群組！',
	'RUN_RR_FINISHED'				=> '會員已成功地重新同步！',

	'SELECT_RUN_GROUP'	=> '至少要選擇一種群組類型，以執行重新同步。',
));

?>