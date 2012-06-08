<?php
/**
 *
 * @package Support Toolkit - Resync Attachments
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
	'RESYNC_ATTACHMENTS'			=> 'Resynchronise attachments',
	'RESYNC_ATTACHMENTS_CONFIRM'	=> 'This tool will make sure that all attachments stored in the database actually have a file on the server. If the file is missing, this tool will remove the attachment from the database. Are you sure that you want to continue?',
	'RESYNC_ATTACHMENTS_FINISHED'	=> 'Attachments successfully resynchronised!',
	'RESYNC_ATTACHMENTS_PROGRESS'	=> 'Resynchronising attachments in progress. Please do not interrupt this process.',
));
