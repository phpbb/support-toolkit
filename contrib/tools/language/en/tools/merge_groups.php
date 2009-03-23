<?php
/**
*
* @package Support Tool Kit - Merge Groups
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
	'GROUPS_MERGE_SUCCESS'		=> 'Successfully merged the groups',
	'GROUPS_MERGE_TO'			=> 'Merge into',
	'GROUPS_MERGE_TO_EXPLAIN'	=> 'The group in which the selected groups will be merged. If the group doesn\'t exist it will be created.',
	'GROUPS_REMOVE'				=> 'Remove groups',
	'GROUPS_REMOVE_EXPLAIN'		=> 'If enabled the merged groups will be removed after the process.',
	'GROUPS_TO_MERGE'			=> 'Groups to merge',
	'GROUPS_TO_MERGE_EXPLAIN'	=> 'Select the groups that you want to merge.',

	'MERGE_GROUPS'				=> 'Merge groups',
	'MERGE_GROUPS_EXPLAIN'		=> 'Here you can merge two or more groups into one.',

	'NO_MERGE_GROUP'			=> 'You must specify atleast 2 groups to be merged',
	'NO_TARGET_GROUP'			=> 'You haven\'t specified a merge target',
));

?>