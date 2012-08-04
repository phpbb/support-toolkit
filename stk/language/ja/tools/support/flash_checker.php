<?php
/**
 *
 * @package Support Toolkit - Flash checker
* @version $Id$
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
	'FLASH_CHECKER'				=> 'Flash チェッカー',
	'FLASH_CHECKER_CONFIRM'		=> 'phpBB 3.0.7-pl1 の [flash] BBCode には XSS 脆弱性が存在する可能性があります。このセキュリティイシューは既に phpBB 3.0.8 で解決されています。このツールは全ての記事、PM、サイン内の BBCode をチェックし、脆弱性が発見された場合はその BBCode を再解析できます。このセキュリティイシューに関する詳細については <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">the phpBB 3.0.8 release announcement</a> をご覧ください。',
	'FLASH_CHECKER_FOUND'		=> '危険な [flash] BBcode が見つかりました。<a href="%s">コチラ</a>をクリックして記事または PM を再解析してください。',
	'FLASH_CHECKER_NO_FOUND'	=> '危険な [flash] BBcode は見つかりませんでした',
));
