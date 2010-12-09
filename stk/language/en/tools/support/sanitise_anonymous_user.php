<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'The Anonymous user’s profile data has been successfully sanitised.',
	'ANONYMOUS_CORRECT'					=> 'The Anonymous user exists and is correctly configured.',
	'ANONYMOUS_CREATED'					=> 'The Anonymous user has been successfully re-created.',
	'ANONYMOUS_CREATION_FAILED'			=> 'It was not possible to recreate the Anonymous user. Please ask for further assistance in the phpBB.com Support Forum.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'The Anonymous user was successfully removed from all access groups.',
	'ANONYMOUS_MISSING'					=> 'The Anonymous user is missing.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'The Anonymous user is missing in your database. This user is used to allow guests to visit your board. Do you want to create a new one?',
	'ANONYMOUS_WRONG_DATA'				=> 'The Anonymous user’s profile data is incorrect.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'The Anonymous user’s profile data is partially incorrect. Would you like to repair this?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'The Anonymous user improperly belongs to multiple user groups.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'The Anonymous user improperly belongs to multiple user groups. Would you like to remove the Anonymous user from all but the "GUESTS" group?',

	'REDIRECT_NEXT_STEP'				=> 'You are being redirected to the next step.',

	'SANITISE_ANONYMOUS_USER'			=> 'Sanitise Anonymous User',
));
