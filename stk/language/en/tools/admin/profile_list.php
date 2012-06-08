<?php
/**
*
* @package Support Toolkit - Profile List
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
	'ALL'					=> 'All',

	'CLICK_TO_DELETE'		=> 'Delete all selected users by clicking on this button. <em>(Can’t be undone!)</em>',

	'FILTER'				=> 'Filter',

	'LIMIT'					=> 'Limit',

	'ONLY_NON_EMPTY'		=> 'Only Non-Empty',
	'ORDER_BY'				=> 'Order By',

	'PROFILE_LIST'			=> 'Profile List',
	'PROFILE_LIST_EXPLAIN'	=> 'This tool displays profile information for multiple users. It may also be used to aid in identifying spam accounts.',

	'USERS_DELETE'				=> 'Delete selected users',
	'USERS_DELETE_CONFIRM'		=> 'Are you sure that you want to delete the selected users? Deleting users through this tool <strong>will</strong> remove all their posts as well!',
	'USERS_DELETE_SUCCESSFULL'	=> 'All selected users where deleted successfully!',
));
