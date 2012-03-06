<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Merge users',
	'MERGE_USERS_EXPLAIN'				=> 'Tool to move a user account’s assets into another account; the source user’s settings and group memberships are copied. Assets include user permissions, attachments, bans, bookmarks, drafts, forum/topic tracking, forum/topic watching, log entries, poll votes, posts, private messages, reports, topics, warnings and friends and foes.<br /><strong>You may enter either the Username or User ID, not both.</strong>',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'You cannot merge a founder with a non founder user.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'You cannot merge a bot with a normal user.',

	'MERGE_USERS_MERGED'		=> 'Users successfully merged.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Remove source user',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'If checked this tool will delete the source user from the board.',

	'MERGE_USERS_SAME_USERS'	=> 'The source and target users must differ.',

	'MERGE_USERS_USER_SOURCE_NAME'			=> 'Source user. (Username)',
	'MERGE_USERS_USER_SOURCE_ID'			=> 'Source user. (User ID)',
	'MERGE_USERS_USER_SOURCE_NAME_EXPLAIN'	=> 'Posts, private messages, permissions, warnings, et cetera are moved from this user into the target user, group memberships and user settings are copied.',

	'MERGE_USERS_USER_TARGET_NAME'	=> 'Target user. (Username)',
	'MERGE_USERS_USER_TARGET_ID'	=> 'Target user. (User ID)',

	'NO_SOURCE_USER'		=> 'The requested source user does not exist',
	'NO_TARGET_USER'		=> 'The requested target user does not exist',

	'BOTH_SOURCE_USER'		=> 'Fill in one source field only.',
	'BOTH_TARGET_USER'		=> 'Fill in one target field only.',
));
