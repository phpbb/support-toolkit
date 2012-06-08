<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'Resynchronise user groups',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'This tool is designed to check whether all users are part of the correct default groups <em>(Registered Users, Registered COPPA Users and Newly Registered Users)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'All groups seem to be up to date!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Resynchronise options',
	'RUN_BOTH_FINISHED'				=> 'All user groups have been resynchronised successfully!',
	'RUN_RNR'						=> 'Resynchronise newly registered users',
	'RUN_RNR_EXPLAIN'				=> 'This will update the "Newly Registered Users" group so that it contains all users that fit the criteria specified in the ACP.',
	'RUN_RNR_FINISHED'				=> 'The Newly Registered Users group was successfully resynchronised!',
	'RUN_RNR_NOT_FINISHED'			=> 'The Newly Registered Users group is currently being resynchronised. Please don’t interrupt this process',
	'RUN_RR'						=> 'Resynchronise registered users',
	'RUN_RR_EXPLAIN'				=> 'The tool has determined that not all users on your board are part of the "Registered <em>(COPPA)</em> users" group. Do you want to resyncronise these groups?<br /><strong>Note:</strong> If your board has COPPA enabled an a user hasn\'t entered a date of birth the user will be placed in the "Registered COPPA users" group!',
	'RUN_RR_FINISHED'				=> 'The users have been resynchronised successfully!',

	'SELECT_RUN_GROUP'	=> 'Select at least one group type that will be resynchronised.',
));
