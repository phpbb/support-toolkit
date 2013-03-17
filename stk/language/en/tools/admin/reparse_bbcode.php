<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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
	'REPARSE_ALL'				=> 'Reparse all BBCodes',
	'REPARSE_ALL_EXPLAIN'		=> 'When checked the BBCode reparse will reparse all content on the board; by default, the tool will only reparse posts/private messages/signatures that have been previously parsed by phpBB. This option will be ignored if specific posts or PMs are specified above.',
	'REPARSE_BBCODE'			=> 'Reparse BBCode',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBCodes have been reparsed.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Are you sure you want to reparse all BBCodes? Please note that this tool has the potential to damage your database beyond repair; therefore, <strong>be sure to backup your database before proceeding</strong>. Moreover, note that this tool may take some time to complete.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Step %1$d completed. Moving on to step %2$d in a moment...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Finished reparsing the posts, moving on to private messages.',
		2	=> 'Finished reparsing private messages, moving on to signatures.',
	),
	'REPARSE_IDS_INVALID'			=> 'The IDs you submitted were not valid; please ensure that post IDs are listed as a comma separated list (e.g. 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Reparse Specific Posts',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'To reparse specific posts only, specify post IDs in a comma-separated list (e.g. 1,2,3,5,8,13).',
	'REPARSE_PM_IDS'				=> 'Reparse Specific PMs',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'To reparse specific PMs only, specifiy PM IDs in a comma-separated list (e.g. 1,2,3,5,8,13).',
));
