<?php
/**
 *
 * @package Support Toolkit - Resync Avatars
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
	'RESYNC_AVATARS'			=> 'Synchronizuj avatary',
	'RESYNC_AVATARS_CONFIRM'	=> 'Narzędzie to sprawdza czy wszystkie używane na forum avatary istnieją na serwerze. Jeżeli plik nie istnieje narzędzie usunie avatar z profilu użytkownika. Czy jesteś pewien że chcesz kontynuować?',
	'RESYNC_AVATARS_FINISHED'	=> 'Avatary zostały pomyślnie synchronizowane!',
	'RESYNC_AVATARS_NEXT_MODE'	=> 'Przechodzenie do avatarów grup, nie przerywaj tego procesu!',
	'RESYNC_AVATARS_PROGRESS'	=> 'Synchronizacja avatarów w toku, nie przerywaj tego procesu!',
));
