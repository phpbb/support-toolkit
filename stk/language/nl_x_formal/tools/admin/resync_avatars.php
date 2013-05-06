<?php
/**
*
* @package Support Toolkit - Resync Avatars
* @version $Id$
* @copyright (c) 2009 phpBB Group , 2013 http://www.phpBBservice.nl
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
	'RESYNC_AVATARS'			=> 'Avatars hersynchroniseren',
	'RESYNC_AVATARS_CONFIRM'	=> 'Dit hulpmiddel controleert of alle avatars die gebruikt worden op het forum ook bestaan op de server. Wanneer de bestanden niet gevonden kunnen worden wordt de avatar verwijderd van het gebruikersprofiel. Weet u zeker dat u door wilt gaan?',
	'RESYNC_AVATARS_FINISHED'	=> 'Avatars zijn succesvol hersynchroniseerd!',
	'RESYNC_AVATARS_NEXT_MODE'	=> 'Overschakelen naar groepsavatars, onderbreek dit proces niet!',
	'RESYNC_AVATARS_PROGRESS'	=> 'Bezig met hersynchroniseren van avatars. Onderbreek dit proces niet!',
));
