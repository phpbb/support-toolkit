<?php
/**
*
* @package Support Toolkit - Anonymous group check
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
	'ANONYMOUS_CLEANED'					=> 'The user information for the anonymous user has been cleaned.',
	'ANONYMOUS_CREATED'					=> 'The anonymous user was recreated',
	'ANONYMOUS_CREATION_FAILED'			=> 'The tool kit couldn\'t create a new anonymous user. Please ask further support in the phpbb.com support forums.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'The anonymous user was removed from all access groups',
	'ANONYMOUS_MISSING'					=> 'Anonymous user is missing',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'The anonymous user is missing in your database. This user is used to allow guests to visit your board. Do you want to create a new one?',
	'ANONYMOUS_WRONG_DATA'				=> 'The anonymous user data is incorrect',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Some of the anonymous user data is incorrect. Do you want to fix this?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'The anonymous user is in the wrong groups',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'The anonymous user is in the wrong user groups. The anonymous user should only be in the "GUESTS" group. Do you want to fix this?',

	'REDIRECT_NEXT_STEP'	=> 'You are being redirected to the next step',

	'SANITIZE_ANONYMOUS_USER'	=> 'Sanitize Anonymous user',
	'SANITIZE_SUCCESSFULL'		=> 'The anonymous user was successfully sanitized.',
));
?>