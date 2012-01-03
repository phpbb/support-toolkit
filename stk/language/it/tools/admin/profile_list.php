<?php
/**
*
* @package Support Toolkit - Profile List
* @version $Id$
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
	'ALL'					=> 'Tutti',

	'CLICK_TO_DELETE'		=> 'Cancella tutti gli utenti selezionati cliccando su questo bottone. <em>(Operazione irreversibile!)</em>',

	'FILTER'				=> 'Filtra',

	'LIMIT'					=> 'Limita',

	'ONLY_NON_EMPTY'		=> 'Solo non vuoti',
	'ORDER_BY'				=> 'Ordina per',

	'PROFILE_LIST'			=> 'Lista profili',
	'PROFILE_LIST_EXPLAIN'	=> 'Questa opzione visualizza le informazioni del profilo per più utenti. Può essere utile anche per identificare account di spam.',

	'USERS_DELETE'				=> 'Elimina gli utenti selezionati',
	'USERS_DELETE_CONFIRM'		=> 'Sei sicuro di voler eliminare gli utenti selezionati? La rimozione attraverso questa opzione <strong>cancellerà</strong> anche i relativi messaggi!',
	'USERS_DELETE_SUCCESSFULL'	=> 'Utenti selezionati eliminati con successo!',
));
