<?php
/**
*
* @package Support Toolkit - Database Cleaner
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
	'BOARD_DISABLE_REASON'			=> '由於資料庫維護，目前論壇無法使用。請稍後再試！',
	'BOARD_DISABLE_SUCCESS'			=> '此論壇已經成功地停用！',

	'COLUMNS'						=> '欄位',
	'CONFIG_SETTINGS'				=> '基本組態設定',
	'CONFIG_UPDATE_SUCCESS'			=> '基本組態設定已經成功地更新！',
	'CONTINUE'						=> '繼續',

	'DATABASE_CLEANER'				=> '資料庫清理',
	'DATABASE_CLEANER_EXTRA'		=> '任何因外掛而增加的額外項目。<strong>如果有勾選，那麼它將被移除。</strong>.',
	'DATABASE_CLEANER_MISSING'		=> '任何像這個有紅色背景的欄位，是找不到，但應該被增加的項目。<strong>如果有勾選，那麼它將被增加。</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> '資料庫清理已經成功地完成所有的工作！<br /><br />請務必再次備份您的資料庫。',
	'DATABASE_CLEANER_WARNING'		=> '這個工具沒有擔保，使用它的人應該備份整個資料庫以防萬一失敗。<br /><br />繼續之前，請確認您有一個資料庫備份！',
	'DATABASE_CLEANER_WELCOME'		=> '歡迎使用資料庫清理工具！<br /><br />這個工具設計來移除資料庫中 (非安裝 phpBB3 預設的) 額外的欄、列以及資料表，以及增加 (找不到的) 可能需要的資料庫要素。<br /><br />當您準備好要繼續時，按繼續鈕以開始使用資料庫清理工具 (注意！您的論壇將暫時停用，直到這個工作完成)。',
	'DATABASE_COLUMNS_SUCCESS'		=> '資料庫列已經成功地更新！',
	'DATABASE_TABLES'				=> '資料庫資料表',
	'DATABASE_TABLES_SUCCESS'		=> '資料庫資料表已經成功地更新！',
	'DATABASE_ROLE_DATA_SUCCESS'	=> '這 phpBB 系統角色已成功地復原！',                         
	'DATABASE_ROLES_SUCCESS'		=> '這角色已成功地更新！',
	'DATAFILE_NOT_FOUND'			=> '這支援工具包 (STK) 無法找到您的 phpBB 版本所必須的資料庫-檔案！',
                                                                       
	'EMPTY_PREFIX'					=> '沒有資料庫字首',
	'EMPTY_PREFIX_CONFIRM'			=> '資料庫清理即將改變您的資料庫中的資料表，但是因為您使用空的資料表字首，這將影響到非 phpBB 資料表。您確定要繼續嗎？',
	'EMPTY_PREFIX_EXPLAIN'			=> '資料庫清理已確定您在 phpBB 資料庫中，沒有設定資料表字首。由於此工具將檢查資料庫中 <strong>所有的</strong> 資料表，所以當進行時要特別小心，並且確認您已排除選擇任何非 phpBB 的資料表。如果不這樣做，那麼將損害資料庫中非 phpBB 的資料表。<br />如果您不確定如何繼續，那麼請到 <a href="http://www.phpbb.com/community/viewforum.php?f=46">phpBB Support Forums</a> 尋求援助。',
	'ERROR'							=> '錯誤',
	'EXTRA'							=> '額外的',
	'EXTENSION_GROUPS_SUCCESS'		=> '副檔名群組已經成功地重新設定',
	'EXTENSIONS_SUCCESS'			=> '副檔名已經成功地重新設定',

	'FINAL_STEP'					=> '這是最後的步驟。<br /><br />我們將重新啟用您的論壇，以及清除論壇快取。',

	'INSTRUCTIONS'					=> '說明',

	'MISSING'						=> '缺少的',
	'MODULE_UPDATE_SUCCESS'			=> '此模組已經成功地更新！',

	'NO_BOT_GROUP'					=> '找不到機器人群組，無法重新設定機器人 (Bots)。',

	'PERMISSION_SETTINGS'			=> '權限設定',
	'PERMISSION_UPDATE_SUCCESS'		=> '權限設定已經成功地更新！',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> '您的 phpBB3 不被支援 (或者是找不到 STK 的某些檔案)。<br />phpBB 3.0.0+ 應該被支援；但是它可能需要一段時間去更新，以適用於在新釋出的 phpBB3 版本。',

	'QUIT'							=> '離開',

	'RESET_BOTS'					=> '重新設定機器人 (Bots)',
	'RESET_BOTS_EXPLAIN'			=> '您想要重新設定機器人列表為 phpBB3 預設之機器人列表嗎？所有已存在的機器人將被移除，而取代成預設的設定。',
	'RESET_BOTS_SKIP'				=> '機器人重新設定已經跳過',
	'RESET_BOT_SUCCESS'				=> '機器人已經成功地重新設定！',
	'RESET_MODULES'					=> '重新設定模組',
	'RESET_MODULES_EXPLAIN'			=> '您想要重新設定模組為 phpBB3 預設之模組嗎？所有已存在的模組將被移除，而取代成預設者。',
	'RESET_MODULES_SKIP'			=> '模組重新設定已經跳過',
	'RESET_MODULE_SUCCESS'			=> '模組已經成功地重新設定！',
	'RESET_REPORT_REASONS'			=> '重新設定檢舉理由',                                      
	'RESET_REPORT_REASONS_EXPLAIN'	=> '您想要重新設定預設的檢舉理由嗎？這將移除所有已增加的檢舉理由！',
	'RESET_REPORT_REASONS_SKIP'		=> '檢舉理由沒有重新設定',
	'RESET_REPORT_REASONS_SUCCESS'	=> '檢舉理由已成功地重新設定！',
	'RESET_ROLE_DATA'				=> '重新設定角色資料',
	'RESET_ROLE_DATA_EXPLAIN'		=> '這個步驟將重新設定 phpBB 系統角色回到原始的狀態。如果您在之前有改變它，那麼強烈建議您運行這個工具。',
	'ROLE_SETTINGS'					=> '角色設定',
	'ROWS'							=> '列',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> '資料表無法改變',
		'columns'			=> '欄位無法改變',
		'config'			=> '設定值無法改變',
		'extension_groups'	=> '副檔名群組無改變',
		'extensions'		=> '副檔名無改變',
		'permissions'		=> '權限無法改變',
		'groups'			=> '群組無改變',
		'roles'				=> '角色無改變',
		'final_step'		=> '最後一步',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> '資料庫資料表沒有被改變',
		'columns'			=> '資料庫欄位沒有被改變',
		'config'			=> '設定值資料表沒有任何新的或少的值',
		'extension_groups'	=> '副檔名群組資料表沒有任何新的或少的值',
		'extensions'		=> '預設的副檔名沒有變化',
		'permissions'		=> '權限資料表沒有變化',
		'groups'			=> 'phpBB 系統之群組沒有變化',
		'roles'				=> '沒有已增加或已移除的角色',
		'final_step'		=> '最後一步將清除快取，以及重新啟用論壇。',
		1	=> '資料庫資料表沒有被改變',
		2	=> '資料庫欄位沒有被改變',
		3	=> '設定值資料表沒有任何新的或少的值',
		4	=> '權限資料表沒有變化',
		5	=> 'phpBB 系統之群組沒有變化',
		8	=> '最後一步將清除快取，以及重新啟用論壇。',
	),
	'SUCCESS'						=> '成功',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> '系統之群組已經成功地重新設定',

	'TYPE'							=> '類型',

	'UNSTABLE_DEBUG_ONLY'			=> '一旦經由 phpBB 設定檔啟用「DEBUG」，那麼資料庫清理工具只能運行在不穩定的 phpBB 版本 <em>(dev, a, b, RC)</em>。',
));

?>