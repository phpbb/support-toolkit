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
	'RESYNC_AVATARS'			=> 'Hersynchroniseer avatars',
	'RESYNC_AVATARS_CONFIRM'	=> 'Deze tool zorgt er voor dat alle avatars die op het forum gebruikt worden ook op de server bestaan. Indien deze ontbreekt zal de avatar worden verwijderd van het gebruikersprofiel. Weet je zeker dat je door wil gaan?',
	'RESYNC_AVATARS_FINISHED'	=> 'Avatars succesvol gehersynchroniseerd!',
	'RESYNC_AVATARS_NEXT_MODE'	=> 'Omschakelen naar de groep avatars, onderbreek dit proces niet!',
	'RESYNC_AVATARS_PROGRESS'	=> 'Avatars hersynchroniseren is bezig, onderbreek dit proces niet!',
));
