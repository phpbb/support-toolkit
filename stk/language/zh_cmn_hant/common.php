<?php
/**
*
* @package Support Toolkit
* @version $Id$
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
   'BACK_TOOL'							=> '回到上個工具',
   'BOARD_FOUNDER_ONLY'					=> '只有論壇創始者可以使用支援工具包 (STK)。',

   'CAT_ADMIN'							=> '管理工具',
   'CAT_ADMIN_EXPLAIN'					=> '管理工具可以讓管理員處理論壇特別的部份以及解決問題。',
   'CAT_DEV'							=> '開發工具',
   'CAT_DEV_EXPLAIN'					=> '管理工具可以讓 phpBB 開發者以及外掛者執行一般的任務。',
   'CAT_ERK'							=> '緊急修補包',
   'CAT_ERK_EXPLAIN'					=> '緊急修補包是 STK 之單獨的套裝軟體，可檢查與偵測其阻止您安裝 phpBB 的問題。按 <a href="%s">這裡</a> 回到緊急修補包。',
   'CAT_MAIN'							=> '主要的',
   'CAT_MAIN_EXPLAIN'					=> '這支援工具包 (STK) 可以用來恢復 phpBB 3.0.x 安裝，或修復安裝期間的普通問題。這個工具包是第二個 ACP，它可以很容易地安裝在任何運行的 phpBB 3 論壇，以及具有 ACP 的外觀與感覺，但是給管理員進入到一套全新的工具，它也許可以使用在 phpBB 無法再正常工作的案件上。',
   'CAT_SUPPORT'						=> '支援工具',
   'CAT_SUPPORT_EXPLAIN'				=> '這支援工具可以用來救援以恢復安裝 phpBB 3.0.x 時不再正常運作的功能。',
   'CAT_USERGROUP'						=> '會員/群組工具',
   'CAT_USERGROUP_EXPLAIN'				=> '會員以及群組工具可以用普通的 phpBB 3.0.x 安裝所沒有的方式來管理會員以及群組。',
   'CONFIG_NOT_FOUND'					=> '這支援工具包 (STK) 組態設定檔案無法被上傳。請檢查您的安裝。',

   'DOWNLOAD_PASS'						=> '下載密碼檔案。',

   'EMERGENCY_LOGIN_NAME'				=> 'STK 緊急狀況登入',
   'ERK'								=> '緊急修補包',

   'FAIL_REMOVE_PASSWD'					=> '無法移除過期的密碼檔案。請以手工移除這個檔案！',

   'GEN_PASS_FAILED'					=> '這支援工具包無法生成新的密碼。請再試一次。',
   'GEN_PASS_FILE'						=> '生成密碼檔案。',
   'GEN_PASS_FILE_EXPLAIN'				=> '如果您無法登入 phpBB，那麼您可以使用支援工具包 (STK) 的內部身份驗證方式。要使用這個方式，您必須 <a href="%s"><strong>產生</strong></a> 一個新的密碼檔案。',

   'INCORRECT_CLASS'					=> '不正確的 class 在: stk/tools/%1$s.%2$s',
   'INCORRECT_PASSWORD'					=> '密碼不正確',
   'INCORRECT_PHPBB_VERSION'			=> '您的 phpBB 版本不相容這個工具。為了要使用著工具，您所安裝的 phpBB 版本必須是: %1$s 或更新的版本，以便運作這個工具。',

   'LOGIN_STK_SUCCESS'					=> '您已經成功地驗證，以及現在將會回到支援工具包 (STK)。',

   'NOTICE'								=> '注意',
   'NO_VERSION_FILE'					=> '這支援工具包 (STK) 無法判定這壓縮包的最新版本。請前往支援工具包 <a href="http://www.phpbb.com/support/stk/">頁面</a> 以及再繼續使用它之前，請確認您正在使用的壓縮包之最新版本。',

   'PASS_GENERATED'						=> '您的 STK 密碼檔案已經成功地生成！<br/>這個密碼是：<em>%1$s</em><br />這個密碼使用期限：<span style="text-decoration: underline;">%2$s</span>，在這個時間以後，為了繼續使用緊急狀況登入功能，您 <strong>必須</strong> 生成一個新的檔案！<br /><br />使用下列的按鈕來下載這個檔案。當您已經下載這個檔案後，您必須將它上傳到伺服器的「stk」資料夾中。',
   'PASS_GENERATED_REDIRECT'			=> '當您已經上傳密碼檔案到正確的位置後，按 <a href="%s">這裡</a> 回到登入的頁面。',
   'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> '這個工具不相容您正在運作的 phpBB 版本',
   'PROCEED_TO_STK'						=> '%s前往支援工具包 (STK)%s',

   'STK_FOUNDER_ONLY'					=> '在您使用支援工具包 (STK) 之前，您必須重新重新驗證身份。',
   'STK_LOGIN'							=> '支援工具包 (STK) 登入',
   'STK_LOGIN_WAIT'						=> '在重新登入之前，您必須等待 3 秒鐘。請再試一次。',
   'STK_LOGOUT'							=> '登出 STK',
   'STK_LOGOUT_SUCCESS'					=> '您已經成功地從支援工具包 (STK) 登出。',
   'STK_NON_LOGIN'						=> '登入以使用支援工具包 (STK)。',
   'STK_OUTDATED'						=> '您安裝的支援工具包 (STK) 看來是過時了。最新的可用版本是 <strong style="color: #008000;">%1$s</strong>，而您所安裝的版本是 <strong style="color: #FF0000;">%2$s</strong>。<br /><br />由於這個工具對於您的 phpBB 安裝有很大的影響，所以它已經被停用，直到您執行完更新。我們強烈建議您，保持所有運行在您伺服器上的軟體都是最新的。欲瞭解關於最近更新的訊息，請參閱 <a href="%3$s">釋出主題</a>。<br /><br /><em>如果您在更新支援工具包後看見本通知，那麼按 <a href="%4$s">這裡</a> 去清除版本檢查的快取。</em>',
   'SUPPORT_TOOL_KIT'					=> '支援工具包 (STK)',
   'SUPPORT_TOOL_KIT_INDEX'				=> 'STK 首頁',
   'SUPPORT_TOOL_KIT_PASSWORD'			=> 'STK 密碼',
   'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> '因為您尚未登入，所以您必須輸入支援工具包 (STK) 密碼，以證實您是論壇的擁有者。<br /><br /><strong>您的瀏覽器必須允許 Cookies，否則您將無法保持登入狀態。</strong>',

   'TOOL_INCLUTION_NOT_FOUND'			=> '這個工具正在試著上傳的檔案（%1$s）不存在。',
   'TOOL_NAME'							=> '工具名稱',
   'TOOL_NOT_AVAILABLE'					=> '所要求的工具無法使用。',

   'USING_STK_LOGIN'					=> '您正在使用內部支援工具包 (STK) 驗證方式登入。建議您 <strong>只有</strong> 在當您無法正常登入論壇時，才使用此方式。<br />要停用這個驗證方式，請按 <a href="%1$s">這裡</a>。',
));

?>