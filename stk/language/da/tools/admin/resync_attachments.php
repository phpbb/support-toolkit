<?php
/**
*
* @package Support Toolkit - Resync Attachments
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
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
	'RESYNC_ATTACHMENTS'			=> 'Synkronisering af vedhæftede filer',
	'RESYNC_ATTACHMENTS_CONFIRM'	=> 'Synkroniseringen vil sikre at alle vedhæftede filer anført i databasen også har en matchende fil på serveren. Mangler en fil, vil dens anførsel i databasen blive fjernet. Er du sikker på at du vil fortsætte?',
	'RESYNC_ATTACHMENTS_FINISHED'	=> 'Synkronisering af vedhæftede filer fuldført!',
	'RESYNC_ATTACHMENTS_PROGRESS'	=> 'Synkronisering af vedhæftede filer under udførsel. Afbryd venligst ikke processen.',
));
