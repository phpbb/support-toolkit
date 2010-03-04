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
	'MERGE_USERS_EXPLAIN'				=> 'Tool to move a user accounts assets into another account, the source users settings and group memberships are copied. Assets are user permissions, attachments, bans, bookmarks, drafts, forum/topic tracking, forum/topic watching, log entries, poll votes, posts, private messages, reports, topics, warnings and friends and foes.',

	'MERGE_USERS_MERGED'		=> 'Users successfully merged.',

	'MERGE_USERS_SAME_USERS'	=> 'The source and target users must differ.',

	'MERGE_USERS_USER_SOURCE'			=> 'Source user',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Posts, private messages, permissions, warnings, et cetera are moved from this user into the target user, group memberships and user settings are copied.',

	'MERGE_USERS_USER_TARGET'	=> 'Target user',
));
