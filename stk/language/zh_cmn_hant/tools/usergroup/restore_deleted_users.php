<?php
/**
*
* @package Support Toolkit - Restore Delted Users
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
	'NO_DELETED_USERS'	=> '沒有可以還原的已刪除之會員',
	'NO_USER_SELECTED'	=> '沒有已選擇的會員！',

	'RESTORE_DELETED_USERS'						=> '還原已刪除的會員',
	'RESTORE_DELETED_USERS_CONFLICT'			=> '還原已刪除的會員 :: 衝突',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> '這個工具允許您還原已自論壇刪除，但是仍有「訪客」的文章之會員。<br />這些會員們將被指定一個隨機密碼，而此工具運行後，您可以手動重新設定它。這個工具 <b>不會</b> 提供每個會員的密碼列表！<br /><br />在運行此工具的過程中，發現某些會員名稱已經存在於論壇，請提供這些會員新的會員名稱。',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> '這個工具允許您還原已自論壇刪除，但是仍有「訪客」的文章之會員。<br />這些會員們將被指定一個隨機密碼，而此工具運行後，您可以手動重新設定它。這個工具 <b>不會</b> 提供每個會員的密碼列表！',

	'SELECT_USERS'	=> '選擇會員以還原',

	'USER_RESTORED_SUCCESSFULLY'	=> '所選擇的會員已經成功地還原。',
	'USERS_RESTORED_SUCCESSFULLY'	=> '所選擇的會員們已經成功地還原。',
));

?>