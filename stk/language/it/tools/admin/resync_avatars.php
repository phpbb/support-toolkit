<?php
/**
 *
 * @package Support Toolkit - Resync Avatars
 * @copyright (c) 2009 phpBB Group
 * @copyright (c) 2011 phpBBItalia.net - translated on 2011-09-30
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
	'RESYNC_AVATARS'			=> 'Risincronizza avatar',
	'RESYNC_AVATARS_CONFIRM'	=> 'Questa opzione assicura che ad ogni avatar utilizzato nella Board corrisponda un file sul server. Se il file è mancante, questa opzione rimuove l’avatar dal profilo utente. Sei sicuro di voler continuare?',
	'RESYNC_AVATARS_FINISHED'	=> 'Avatar risincronizzati con successo!',
	'RESYNC_AVATARS_NEXT_MODE'	=> 'Passaggio al gruppo avatar, non interrompere l’operazione!',
	'RESYNC_AVATARS_PROGRESS'	=> 'Risincronizzamento avatar in corso. Non interrompere l’operazione!',
));
