<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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
// í ª ì î Ö
//

$lang = array_merge($lang, array(
	'REPARSE_ALL'				=> '重新解析所有的 BBCodes',
	'REPARSE_ALL_EXPLAIN'		=> '一旦檢查，將重新解析在您論壇的所有 BBCodes 內容；預設下，此工具只有重新解析之前的文章/私訊/簽名檔。如果特殊的文章或私訊是上述指定的，那麼這個選項將被忽略。',
	'REPARSE_BBCODE'			=> '重新解析 BBCode',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBCodes 已經重新解析。',
	'REPARSE_BBCODE_CONFIRM'	=> '您確認要重新解析所有的 BBCodes？請注意！這個工具可能會損害您的資料庫而無法修復；因此，<strong>在執行前一定要備份您的資料庫</strong>。此外，這可能需要花一些時間去完成。',
	'REPARSE_BBCODE_PROGRESS'	=> '步驟 %1$d 已完成。立即移動到步驟 %2$d...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> '已完成重新解析文章，繼續重新解析私訊。',
		2	=> '已完成重新解析私訊，繼續重新解析簽名檔。',
	),
	'REPARSE_IDS_INVALID'			=> '您送出的 ID 是無效的；請確認列表上之文章 ID，以半形逗號分隔 (例如：1,2,3,5,8,13)。',
	'REPARSE_POST_IDS'				=> '重新解析特殊的文章',
	'REPARSE_POST_IDS_EXPLAIN'		=> '只有重新解析特殊的文章，其文章 ID，以半形逗號分隔列表。',
	'REPARSE_PM_IDS'				=> '重新解析特殊的私訊',
	'REPARSE_PM_IDS_EXPLAIN'		=> '只有重新解析特殊的私訊，其私訊 ID，以半形逗號分隔列表 (例如：1,2,3,5,8,13)。',
));

?>