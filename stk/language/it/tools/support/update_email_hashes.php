<?php
/**
*
* @package Support Toolkit - Update email hashes
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2011 phpBBItalia.net - translated on 2011-10-09
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
	'UPDATE_EMAIL_HASHES'				=> 'Aggiornamento email in hash',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'Nelle installazioni phpBB precedenti a phpBB 3.0.7, il passaggio da un sistema operativo a 32 bit per sistemi operativi a 64 danneggiava parzialmente le email in hash. <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072"> Vedi la relativa segnalazione del bug</a>)</em><br />Questo strumento consente di aggiornare le email in hash nel database in modo che funzionino correttamente.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'Tutte le email in hash sono state aggiornate con successo!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'Aggiornamento email in hash in corso.',
));
