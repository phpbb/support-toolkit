<?php
/**
 *
 * @package Support Toolkit - Flash checker
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
	'FLASH_CHECKER'				=> 'Flash checker',
	'FLASH_CHECKER_CONFIRM'		=> 'In phpBB 3.0.7-pl1, a possible XSS vulnerability was found in the built-in flash BBCode. This issue was resolved in phpBB 3.0.8. This tool will check all posts, private messages, and signatures for this vulnerable BBCode. If found it allows you to quickly reparse these posts to make sure that your board is safe. Check <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">the phpBB 3.0.8 release announcement</a> for more information about the issue.',
	'FLASH_CHECKER_FOUND'		=> 'The flash checker found some potentially dangerous flash BBCodes on your board. Click <a href="%s">here</a> to reparse the posts and private messages that contain this flash BBCode.',
	'FLASH_CHECKER_NO_FOUND'	=> 'No potentially dangerous flash BBCodes found.',
));
