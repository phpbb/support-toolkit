<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2012 phpBBItalia.net - translated on 2012-06-18
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
	'MERGE_USERS'						=> 'Unisci utenti',
	'MERGE_USERS_EXPLAIN'				=> 'Strumento per spostare le attività di un account utente in un altro account, le impostazioni dell’utente di origine e le appartenenze a un gruppo vengono copiate. Le attività includono i permessi degli utenti, allegati, ban, segnalibri, bozze, forum/argomenti sottoscritti, forum/argomenti visitati, log attività, voti sondaggi, messaggi, messaggi privati, segnalazioni, argomenti, richiami amici e ignorati.<br /><strong>Puoi inserire o il nome utente o l’ID utente, non entrambi.</strong>',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'Non puoi unire un utente Fondatore con un utente non Fondatore.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Non puoi unire un utente Bot con un utente normale.',

	'MERGE_USERS_MERGED'		=> 'Utenti uniti con successo.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Elimina utente di origine',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Se selezionato questo strumento può eliminare l’utente di origine dalla Board.',

	'MERGE_USERS_SAME_USERS'	=> 'Gli utenti di origine e di destinazione devono essere diversi.',

	'MERGE_USERS_USER_SOURCE_NAME'		=> 'Utente di origine. (Nome utente)',
	'MERGE_USERS_USER_SOURCE_ID'		=> 'Utente di origine. (ID utente)',
	'MERGE_USERS_USER_SOURCE_NAME_EXPLAIN'	=> 'Messaggi, messaggi privati, permessi, richiami, ecc., vengono spostati dall’account di questo utente all’account dell’utente di destinazione; le appartenenze ai gruppi e le impostazioni utente vengono copiate.',

	'MERGE_USERS_USER_TARGET_NAME'	=> 'Utente di destinazione. (Nome utente)',
	'MERGE_USERS_USER_TARGET_ID'	=> 'Utente di destinazione. (ID utente)',

	'NO_SOURCE_USER'		=> 'L’utente di origine richiesto non esiste',
	'NO_TARGET_USER'		=> 'L’utente target richiesto non esiste',

	'BOTH_SOURCE_USER'		=> 'Compila un solo campo di origine.',
	'BOTH_TARGET_USER'		=> 'Compila un solo campo di destinazione.',
));