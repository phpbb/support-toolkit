<?php
/**
*
* @package Support Tool Kit - PM Viewer
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
	'MARK_PM_READ'			=> 'Mark the pms you want to read',
	'MESSAGE_BY_AUTHOR'		=> 'by',
	'MESSAGE_TITLE'			=> 'PM title',

	'PM_DELETE'				=> 'Delete pm',
	'PM_DELETED_REDIRECT'	=> 'The pm was successfully deleted.<br/>You will be redirected back to the pm overview of this user',
	'PM_DELETE_CONFIRM'		=> 'Are you sure that you want to delete this pm?',
	'PM_DETAILS'			=> 'Private message details',
	'PM_NOT_DELETED'		=> 'Something went wrong during the removal of the pm',
	'PM_VIEWER'				=> 'Private message viewer',
	'PM_VIEWER_EXPLAIN'		=> 'Here you can read all the PMs that your users have in their in box.',
	'PM_VIEWER_READ'		=> 'Private messages read',
	'PM_VIEWER_USER_LIST'	=> 'Private message overview',

	'REMOVE_PM'				=> 'Delete this private message',

	'SENT_AT'				=> 'send at',

	'USER_NO_PM'			=> '%s doesn\'t have any private messages in his inbox!',

	'VIEW_USER'				=> 'Username',
	'VIEW_USER_EXPLAIN'		=> 'The user whoms private messages you want to view. You can identify the user by username and user id',
));

?>