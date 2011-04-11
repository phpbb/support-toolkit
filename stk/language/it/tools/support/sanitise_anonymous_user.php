<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2010 phpBB.it - translated on 2010/05/16
* @copyright (c) 2011 portalxl.eu - update translation on 2011/04/06
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
	'ANONYMOUS_CLEANED'					=> 'L’utente anonimo è stato ripulito.',
	'ANONYMOUS_CORRECT'					=> 'L’utente anonimo esiste e tutti i suoi dati sono impostati correttamente!',
	'ANONYMOUS_CREATED'					=> 'L’utente anonimo è stato ricreato con successo.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Non è possibile ricreare l’utente anonimo. Sei pregato di chiedere assistenza sul Forum di Supporto di phpBB.com',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'L’utente anonimo è stato eliminato dall’accesso dei gruppi.',
	'ANONYMOUS_MISSING'					=> 'L’utente anonimo è mancante.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'L’utente anonimo è mancante nel tuo database. L’utente è usato per permettere agli ospiti di visitare la tua board. Vuoi crearne uno nuovo?',
	'ANONYMOUS_WRONG_DATA'				=> 'I dati dell’utente anonimo non sono corretti.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Il profilo dell’utente anonimo è parzialmente corretto. Vuoi ripararlo?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'L’utente anonimo appartiene in modo improprio ai gruppi utenti multipli.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'L’utente anonimo appartiene in modo improprio ai gruppi utenti multipli. Vuoi eliminare l’utente anonimo per impostarlo nel gruppo "OSPITI"?',

	'REDIRECT_NEXT_STEP'				=> 'Stai per essere reindirizzato alla fase successiva.',

	'SANITISE_ANONYMOUS_USER'			=> 'Pulizia utente anonimo',
));
