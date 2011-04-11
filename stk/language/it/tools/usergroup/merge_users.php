<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Unione utenti',
	'MERGE_USERS_EXPLAIN'				=> 'Strumento per spostare le attività di un account utente in un altro account, l’utente sorgente con impostazioni e le appartenenze ai gruppi saranno copiati. Lo strumento comprende i permessi utente, i collegamenti, i permessi, i segnalibri, i progetti, forum/tracciatura argomento, forum/argomento, le voci di registro, i voti dei sondaggi, i messaggi, i messaggi privati​​, relazioni, stili, richiami e amici o ignorati.',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'Non puoi unire un utente founder con un utente non founder.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Non puoi unire un utente bot con un utente normale.',

	'MERGE_USERS_MERGED'		=> 'Utenti uniti con successo.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Elimina origine utente',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Se selezionato questo strumento può eliminare la fonte utente dalla board.',

	'MERGE_USERS_SAME_USERS'	=> 'La fonte e il target utenti sono differenti.',

	'MERGE_USERS_USER_SOURCE'			=> 'Origine utente',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Messaggi, messaggi privati​​, permessi, richiami, ecc. vengono spostati da questo utente in utente di destinazione, le appartenenze di gruppo e le impostazioni utente vengono copiate.',

	'MERGE_USERS_USER_TARGET'	=> 'Target utente',
));
