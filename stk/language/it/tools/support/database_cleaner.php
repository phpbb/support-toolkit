<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2011 phpBBItalia.net - translated on 2011-11-28
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
	'BOARD_DISABLE_REASON'			=> 'La Board è momentaneamente irragiungibile a causa di lavori di manutenzione sul database. Torna a trovarci presto!',
	'BOARD_DISABLE_SUCCESS'			=> 'La Board è stata disattivata con successo!',

	'COLUMNS'						=> 'Colonne',
	'CONFIG_SETTINGS'				=> 'Impostazioni configurazione',
	'CONFIG_UPDATE_SUCCESS'			=> 'Le impostazioni di configurazione sono state aggiornate con successo!',
	'CONTINUE'						=> 'Continua',

	'DATABASE_CLEANER'				=> 'Pulizia Database',
	'DATABASE_CLEANER_EXTRA'		=> 'Tutte le altre sono voci extra, aggiunte dalle modifiche. <strong>Se il check box è selezionato saranno rimosse</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Tutti i campi con uno sfondo rosso come questo, sono campi mancanti che dovrebbero essere aggiunti.  <strong>Se il check box è selezionato saranno rimosse</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'La pulizia del database si è conclusa con successo!<br /><br />Esegui il backup ancora una volta.',
	'DATABASE_CLEANER_WARNING'		=> 'Questo Tool è distribuito SENZA GARANZIE e gli utenti dovrebbero eseguire un backup completo del database per poterlo ripristinare in caso di errori.<br /><br />Prima di continuare, assicurati di aver eseguito il backup del database!',
	'DATABASE_CLEANER_WELCOME'		=> 'Benvenuto nel Tool di pulizia del database!<br /><br />Questo tool è stato realizzato per eliminare colonne, righe e tabelle dal database superflue e non presenti nell’installazione di phpBB, e per aggiungere elementi mancanti del database che potrebbero essere necessari.<br /><br /> Quando sei pronto per iniziare clicca sul bottone Continua per utilizzare il tool (nota che la Board sarà disabilitata fino alla fine del processo).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Le colonne del database sono state aggiornate con successo!',
	'DATABASE_TABLES'				=> 'Tabelle database',
	'DATABASE_TABLES_SUCCESS'		=> 'Le tabelle del database sono state aggiornate con successo!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'I ruoli di phpBB sono stati ripristinati con successo!',
	'DATABASE_ROLES_SUCCESS'		=> 'I ruoli di phpBB sono stati aggiornati con successo!',
	'DATAFILE_NOT_FOUND'			=> 'Support Toolkit non ha trovato il file di dati richiesto per la versione phpBB.',

	'EMPTY_PREFIX'					=> 'Nessun prefisso alle tabelle del database',
	'EMPTY_PREFIX_CONFIRM'			=> 'La pulizia del database effettuerà delle modifiche al database ma utilizzando un prefisso tabella vuoto che potrà avere effetto su tabelle che non appartengono a phpBB. Se sicuro di voler continuare?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'La pulizia del database ha determinato che non hai impostato un prefisso per le tabelle del database di phpBB. A causa di questo, la pulizia interesserà <strong>tutte</strong> le tabelle nel database. Fai attenzione e assicurati di escludere tutte le tabelle che non sono di phpBB dalla selezione. Errori di selezione potrebbero danneggiare le tabelle che non fanno parte del database di phpBB.<br /> Se non sei sicuro, consulta <a href="http://www.phpbb.com/community/viewforum.php?f=46">phpBB Support Forum</a>.',
	'ERROR'							=> 'Errore',
	'EXTRA'							=> 'Extra',
	'EXTENSION_GROUPS_SUCCESS'		=> 'Il gruppo estensioni è stato ripristinato con successo',
	'EXTENSIONS_SUCCESS'			=> 'Le estensioni sono state ripristinate con successo',

	'FINAL_STEP'					=> 'Questo è lo stadio finale.<br /><br />Sarà riabilitata la Board e svuotata la cache.',

	'INSTRUCTIONS'					=> 'Istruzioni',

	'MISSING'						=> 'Mancanti',
	'MODULE_UPDATE_SUCCESS'			=> 'I moduli sono stati aggiornati con successo!',

	'NO_BOT_GROUP'					=> 'Non è stato possibile ripristinare i Bot; gruppo Bot mancante.',

	'PERMISSION_SETTINGS'			=> 'Opzioni permessi',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Le impostazioni dei permessi sono state aggiornate con successo!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'La tua versione di phpBB non è supportata (o mancano alcuni file dal Support Toolkit).<br />phpBB 3.0.0+ dovrebbe essere supportato ma potrebbe volerci del tempo affinché questo tool venga aggiornato per nuove versioni di phpBB 3.0.',

	'QUIT'							=> 'Chiudi',

	'RESET_BOTS'					=> 'Ripristina Bot',
	'RESET_BOTS_EXPLAIN'			=> 'Vuoi riportare la lista dei Bot a quella predefinita di phpBB3? Tutti i Bot esistenti verranno eliminati e sostituiti con quelli predefiniti.',
	'RESET_BOTS_SKIP'				=> 'Il ripristino dei Bot è stato saltato.',
	'RESET_BOT_SUCCESS'				=> 'I Bot sono stati ripristinati con successo!',
	'RESET_MODULES'					=> 'Ripristina moduli',
	'RESET_MODULES_EXPLAIN'			=> 'Vuoi riportare i moduli a quelli predefiniti di phpBB3? Tutti i moduli esistenti verranno eliminati e sostituiti con quelli predefiniti.',
	'RESET_MODULES_SKIP'			=> 'Il ripristino dei moduli è stato saltato',
	'RESET_MODULE_SUCCESS'			=> 'I moduli sono stati ripristinati con successo!',
	'RESET_REPORT_REASONS'			=> 'Ripristina le motivazioni delle segnalazioni',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Vuoi ripristinare le motivazioni delle segnalazioni predefinite? Questo eliminerà tutte le motivazioni di segnalazioni aggiunte!',
	'RESET_REPORT_REASONS_SKIP'		=> 'Le motivazioni delle segnalazioni non sono state ripristinate',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'Le motivazioni delle segnalazioni sono state ripristinate con successo!',
	'RESET_ROLE_DATA'				=> 'Ripristina i dati dei ruoli',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Questo stadio ripristina i ruoli di phpBB allo stato originale; si consiglia vivamente di avviare questa procedura se ci sono stati cambiamenti nella fase precedente.',
	'ROLE_SETTINGS'					=> 'Impostazioni Ruolo',	
	'ROWS'							=> 'Colonne',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'Tabelle non modificate',
		'columns'			=> 'Colonne non modificate',
		'config'			=> 'Configurazione non modificata',
		'extension_groups'	=> 'Gruppo estensioni non modificato',
		'extensions'		=> 'Estensioni non modificate',
		'permissions'		=> 'Permessi non modificati',
		'groups'			=> 'Gruppi non modificati',
		'roles'				=> 'Ruoli non modificati',
		'final_step'		=> 'Stadio finale',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'La tabelle del database non sono state modificate',
		'columns'			=> 'Le colonne del database non sono state modificate',
		'config'			=> 'La tabella di configurazione non ha nessun valore nuovo/mancante',
		'extension_groups'	=> 'Il gruppo estensioni non ha nessun valore nuovo/mancante',
		'extensions'		=> 'Le estensioni predefinite non sono state modificate',
		'permissions'		=> 'Non ci sono state modifiche nella tabella permessi',
		'groups'			=> 'Non ci sono state modifiche nei gruppi di sistema di phpBB',
		'roles'				=> 'Non è stato aggiunto o eliminato nessun ruolo',
		'final_step'		=> 'Quest’ultimo stadio pulirà la cache e riabiliterà la Board.',
	),
	'SUCCESS'						=> 'Successo',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'I gruppi di sistema sono stati ripristinati con successo!',

	'TYPE'							=> 'Tipo',

	'UNSTABLE_DEBUG_ONLY'			=> 'La pulizia del database può essere eseguita solo su versioni instabili di phpBB <em>(dev, a, b, RC)</ em>, quando la modalità "DEBUG" è abilitata attraverso il file config.php.',
));
