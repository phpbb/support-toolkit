<?php
/**
*
* @package Support Toolkit - Make Founder
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2012 phpBBItalia.net - translated on 2012-06-16
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
	'BOTH_FIELDS_FILLED'		=> 'I campi Nome utente e ID utente non possono essere compilati',
	'DEMOTE_FAILED'				=> 'Non è possibile rimuovere lo status di Fondatore di tutti gli utenti!',
	'DEMOTE_FOUNDERS'			=> 'Retrocedi i Fondatori',
	'DEMOTE_SUCCESSFULL'		=> 'Status di Fondatore di %d utenti eliminato con successo!',

	'FOUNDERS'					=> 'Utenti con lo status di Fondatore',

	'MAKE_FOUNDER'				=> 'Rendi Fondatore della Board un utente',
	'MAKE_FOUNDER_CONFIRM'		=> 'Sei sicuro di voler rendere <a href="%1$s">%2$s</a> un Fondatore della Board?  Questo darà <a href="%1$s">%2$s</a> la possibilità di eliminare il tuo account, e altri poteri.',
	'MAKE_FOUNDER_FAILED'		=> 'Non puoi promuovere questo utente come Fondatore',
	'MAKE_FOUNDER_SUCCESS'		=> 'Promosso con successo <a href="%1$s">%2$s</a> a Fondatore della Board.',
	'MANAGE_FOUNDERS'			=> 'Gestione Fondatori Board',

	'NO_FOUNDERS'				=> 'Nessun Fondatore trovato',

	'PROMOTE_FOUNDER'			=> 'Promuovi a Fondatore',
	
	'USER_NAME_TO_FOUNDER'			=> 'Nome utente da rendere Fondatore',
	'USER_NAME_TO_FOUNDER_EXPLAIN'	=> 'Inserisci il nome utente che vuoi rendere Fondatore.',
	'USER_ID_TO_FOUNDER'			=> 'ID dell’utente che vuoi rendere Fondatore.',
	'USER_ID_TO_FOUNDER_EXPLAIN'	=> 'Inserisci l’ID dell’utente che vuoi rendere Fondatore.',
));