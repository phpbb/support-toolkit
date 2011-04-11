<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
 * @copyright (c) 2009 phpBB Group
 * @copyright (c) 2011 portalxl.eu - translated on 2011/04/06 
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
	'RESYNC_USER_GROUPS'			=> 'Sincronizza gruppi utente',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Questo strumento è progettato per verificare se tutti gli utenti fanno parte di gruppi predefiniti e corretti <em>(utenti registrati, utenti registrati COPPA e nuovi utenti registrati)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Tutti i gruppi risultano aggiornati!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Opzioni sincronizzazione',
	'RUN_BOTH_FINISHED'				=> 'Tutti i gruppi risultano sincronizzati con successo!',
	'RUN_RNR'						=> 'Sincronizza nuovi utenti regiastrati',
	'RUN_RNR_EXPLAIN'				=> 'Questo aggiornerà il gruppo "nuovi utenti registrati" in modo che contenga tutti gli utenti che soddisfano i criteri specificati in ACP.',
	'RUN_RNR_FINISHED'				=> 'Il gruppo nuovi utenti registrati è stato sincronizzato con successo!',
	'RUN_RNR_NOT_FINISHED'			=> 'Il gruppo nuovi utenti registrati è attualmente in fase di sincronizzazione. Non interrompere il processo',
	'RUN_RR'						=> 'Sincronizzazione utenti',
	'RUN_RR_EXPLAIN'				=> 'Questo strumento determina se non tutti gli utenti della tua board fanno parte del gruppo "utenti registrati <em>(COPPA)</em>". Vuoi sincronizzare questo gruppo?<br /><strong>Nota:</strong> Se la tua board ha COPPA abilitato e gli utenti hanno inserito la data di nascita gli utenti potranno essere inseriti nel gruppo "utenti registrati COPPA"!',
	'RUN_RR_FINISHED'				=> 'Gli utenti sono stati sincronizzati con successo!',

	'SELECT_RUN_GROUP'	=> 'Select at least one group type that will be resynchronised.',
));
