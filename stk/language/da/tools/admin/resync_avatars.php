<?php
/**
*
* @package Support Toolkit - Resync Avatars
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
	'RESYNC_AVATARS'			=> 'Synkronisering af avatars',
	'RESYNC_AVATARS_CONFIRM'	=> 'Synkroniseringen vil sikre at alle avatars anvendt på boardet også eksisterer på serveren. Konstateres manglende filer, fjernes tilsvarende avatars fra brugere. Er du sikker på at du vil fortsætte?',
	'RESYNC_AVATARS_FINISHED'	=> 'Synkronisering af avatars fuldført!',
	'RESYNC_AVATARS_NEXT_MODE'	=> 'Skifter til gruppevatars. Afbryd venligst ikke processen!',
	'RESYNC_AVATARS_PROGRESS'	=> 'Synkronisering af avatars under udførsel. Afbryd venligst ikke processen!',
));
