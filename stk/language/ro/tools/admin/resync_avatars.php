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
	'RESYNC_AVATARS'			=> 'Resincronizare imagini asociate (avatar)',
	'RESYNC_AVATARS_CONFIRM'	=> 'Acest utilitar va verifica dacă toate imaginile asociate folosite există pe server. Dacă sunt găsite fişiere lipsă atunci imaginea asociată va fi eliminată din profilul utilizatorului. Sunteţi sigur că vreţi să continuaţi?',
	'RESYNC_AVATARS_FINISHED'	=> 'Imaginile asociate au fost resincronizate cu succes!',
	'RESYNC_AVATARS_NEXT_MODE'	=> 'Se face transferul la imaginile asociate pentru grup, vă rugăm să nu întrerupeţi acest proces!',
	'RESYNC_AVATARS_PROGRESS'	=> 'Resincronizare în progres a imaginilor asociate. Vă rugăm să nu întrerupeţi acest proces!',
));

?>