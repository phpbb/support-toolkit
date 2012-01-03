<?php
/**
*
* @package Support Toolkit - Restore Delted Users
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2011 phpBBItalia.net - translated on 2011-10-01
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
	'NO_DELETED_USERS'	=> 'Non ci sono utenti eliminati che possono essere ripristinati',
	'NO_USER_SELECTED'	=> 'Nessun utente selezionato!',

	'RESTORE_DELETED_USERS'						=> 'Ripristina utenti eliminati',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Ripristina utenti eliminati :: Conflitto',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Questo strumento consente di ripristinare gli utenti che vengono eliminati dalla Board ma che abbiano ancora messaggi “ospiti” sulla Board stessa.<br />A questi utenti sarà assegnata una password casuale che è necessario reimpostare manualmente dopo che lo strumento è stato eseguito; Questo strumento <b>non</b> fornisce un elenco di queste password generate.<br /><br />Durante l’ultima esecuzione di questo strumento si potrebbero rilevare alcuni nomi che già esistono in questo forum. Si prega di fornire un nuovo nome per questi utenti.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Questo strumento consente di ripristinare gli utenti che vengono eliminati dalla Board ma che abbiano ancora messaggi “ospiti”  sulla Board.<br />A questi utenti sarà assegnata una password casuale che è necessario reimpostare manualmente dopo che lo strumento è stato eseguito; Questo strumento <b>non</b> fornisce un elenco di queste password generate.',

	'SELECT_USERS'	=> 'Seleziona gli utenti da ripristinare',

	'USER_RESTORED_SUCCESSFULLY'	=> 'L’utente selezionato è stato ripristinato con successo.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Gli utenti selezionati sono stati ripristinati con successo.',
));
