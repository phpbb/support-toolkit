<?php
/**
*
* @package Support Toolkit - Restore Delted Users
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
	'DAMAGED_POSTS'			=> 'Damaged Posts',
	'DAMAGED_POSTS_EXPLAIN'	=> 'The following post IDs contain user information that is too damaged to restore. Please visit the <a href="https://www.phpbb.com/community/viewforum.php?f=46">support forums</a> to receive assistance to resolve this issue.',

	'NO_DELETED_USERS'	=> 'There are no deleted users that can be restored',
	'NO_USER_SELECTED'	=> 'No users selected!',

	'RESTORE_DELETED_USERS'						=> 'Restore Deleted Users',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Restore Deleted Users :: Conflicted',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'This tool allows you to restore users that are deleted from the board but still have "guest" posts on the board.<br />These users will be assigned a random password that you must reset manually after the tool has been run; this tool does <b>not</b> provide a list of these generated passwords.<br /><br />During the last run this tool found some usernames that already exist on this board. Please provide a new name for these users.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'This tool allows you to restore users that are deleted from the board but still have "guest" posts on the board.<br />These users will be assigned a random password that you must reset manually after the tool has been run; this tool does <b>not</b> provide a list of these generated passwords.',

	'SELECT_USERS'	=> 'Select users to restore',

	'USER_RESTORED_SUCCESSFULLY'	=> 'The selected user has been restored successfully.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'The selected users have been restored successfully.',
));
