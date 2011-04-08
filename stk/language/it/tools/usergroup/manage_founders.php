<?php
/**
*
* @package Support Toolkit - Make Founder
* @version $Id$
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
	'DEMOTE_FAILED'				=> 'Non è possibile eliminare lo stato di founder di tutti gli utenti!',
	'DEMOTE_FOUNDERS'			=> 'Retrocedi founders',
	'DEMOTE_SUCCESSFULL'		=> 'Eliminato con successo lo stato di founder di %d utenti!',

	'FOUNDERS'					=> 'Utenti con lo stato di founder',

	'MAKE_FOUNDER'				=> 'Rendi un utente Founder della Board',
	'MAKE_FOUNDER_CONFIRM'		=> 'Sei sicuro di voler creare <a href="%1$s">%2$s</a> un Founder della board?  Questo darà <a href="%1$s">%2$s</a> la possibilità di eliminare il tuo account, e altri poteri.',
	'MAKE_FOUNDER_FAILED'		=> 'Non puoi promuovere questo utente come founder',
	'MAKE_FOUNDER_SUCCESS'		=> 'Creato con successo <a href="%1$s">%2$s</a> un founder della board.',
	'MANAGE_FOUNDERS'			=> 'Gestione board founders',

	'NO_FOUNDERS'				=> 'Nessun founders trovato',

	'PROMOTE_FOUNDER'			=> 'Promuovi a founder',

	'USER_TO_FOUNDER'			=> 'Utenti resi founder',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'Aggiungi il nome utente o l’ID dell’utente che vuoi rendere founder.',
));
