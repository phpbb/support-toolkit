<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'Risincronizza gruppi utente',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Questo strumento è progettato per verificare se tutti gli utenti fanno parte correttamente dei gruppi predefiniti <em>(Utenti Registrati, Utenti COPPA, Registrati e Nuovi utenti registrati)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Tutti i gruppi risultano aggiornati!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Opzioni di risincronizzazione',
	'RUN_BOTH_FINISHED'				=> 'Tutti i gruppi utente sono stati risincronizzati con successo!',
	'RUN_RNR'						=> 'Risincronizza i nuovi utenti registrati',
	'RUN_RNR_EXPLAIN'				=> 'Questa azione aggiornerà il gruppo "Nuovi Utenti Registrati" affinché contenga tutti gli utenti che rispondono ai criteri specificati nel PCA.',
	'RUN_RNR_FINISHED'				=> 'Il gruppo Nuovi utenti registrati è stato risincronizzato con successo!',
	'RUN_RNR_NOT_FINISHED'			=> 'Il gruppo Nuovi utenti registrati è attualmente in fase di risincronizzazione. Si prega di non interrompere questo processo',
	'RUN_RR'						=> 'Sincronizzazione utenti',
	'RUN_RR_EXPLAIN'				=> 'Lo strumento ha controllato che tutti gli utenti della Board non facciano parte del gruppo "Utenti <em>(COPPA)</em>". Vuoi risincronizzare questi gruppi?<br /><strong>Nota:</strong> Se la tua Board ha utenti COPPA abilitati e un utente non ha inserito la sua data di nascita, l’utente verrà inserito nel gruppo "Utenti COPPA Registrati"!',
	'RUN_RR_FINISHED'				=> 'Gli utenti sono stati risincronizzati con successo!',

	'SELECT_RUN_GROUP'	=> 'Seleziona almeno un tipo di gruppo che verrà risincronizzato.',
));
