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
	'REPARSE_BBCODE'			=> 'Reparse BBCode',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBCodes have been reparsed.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Are you sure you want to reparse all BBCodes? Please note that this tool has the potential to damage your database beyond repair; therefore, <strong>be sure to backup your database before proceeding</strong>. Moreover, note that this tool may take some time to complete.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Step %1$d completed. Moving on to step %2$d in a moment...',
));

?>