<?php
/**
*
* @package Support Toolkit - Update email hashes
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
	'UPDATE_EMAIL_HASHES'				=> 'Update email hashes',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'In phpBB installations prior to phpBB 3.0.7, a switch from a 32 bit OS to a 64 bit OS would break email hashes. <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">See the related bug report</a>)</em><br />This tool allows you update the hashes in the database so that they function properly.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'All email hashes have been updated successfully!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'Updating email hashes in progress.',
));
