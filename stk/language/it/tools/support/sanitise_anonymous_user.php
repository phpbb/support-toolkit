<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'I dati del profilo dell’utente Anonymous sono stati corretti con successo.',
	'ANONYMOUS_CORRECT'					=> 'L’utente Anonymous esiste ed è configurato correttamente.',
	'ANONYMOUS_CREATED'					=> 'L’utente Anonymous è stato ricreato con successo.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Non è stato possibile ricreare l’utente Anonymous. Chiedere ulteriore assistenza sul Forum di phpBB.com.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'L’utente Anonymous è stato rimosso con successo da tutti i gruppi di accesso.',
	'ANONYMOUS_MISSING'					=> 'L’utente Anonymous non è più presente.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'L’utente Anonymous non è presente nel database. Questo utente viene utilizzato per consentire agli ospiti di visitare la Board. Vuoi crearne uno nuovo?',
	'ANONYMOUS_WRONG_DATA'				=> 'I dati del profilo dell’utente Anonymous non sono corretti.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'I dati del profilo dell’utente Anonymous sono parzialmente inesatti. Vuoi correggere la cosa?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'L’utente Anonymous impropriamente appartiene a gruppi di utenti multipli.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'L’utente Anonymous  impropriamente appartiene a gruppi di utenti multipli. Vuoi rimuovere l’utente Anonymous di tutti i gruppi ma non dal gruppo "Ospiti"?',

	'REDIRECT_NEXT_STEP'				=> 'Stai per essere reindirizzato alla fase successiva.',

	'SANITISE_ANONYMOUS_USER'			=> 'Correzione utente Anonymous',
));
