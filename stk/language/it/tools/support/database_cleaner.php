<?php
/**
*
* @package Support Toolkit - Database Cleaner
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
	'BOARD_DISABLE_REASON'			=> 'La board è attualmente disabilitata per manutenzione del database. Controlla puù tardi!',
	'BOARD_DISABLE_SUCCESS'			=> 'La board è stata disabilitata con successo!',

	'COLUMNS'						=> 'Colonne',
	'CONFIG_SETTINGS'				=> 'Configurazione delle impostazioni',
	'CONFIG_UPDATE_SUCCESS'			=> 'La configurazione delle impostazioni è stata aggiornata con successo!',
	'CONTINUE'						=> 'Continua',

	'DATABASE_CLEANER'				=> 'Pulizia Database',
	'DATABASE_CLEANER_EXTRA'		=> 'Eventuali altri elementi aggiunta delle modifiche.  <strong>Se la casella di controllo è selezionata sarà eliminato</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Tutti i campi con uno sfondo rosso come questo sono gli elementi mancanti che devono essere aggiunti.  <strong>Se la casella di controllo è selezionata, verrà aggiunto</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'La pulizia del database ha completato con successo tutti i compiti!<br /><br />Assicurati di aver effettuato nuovamente un backup del tuo database.',
	'DATABASE_CLEANER_WARNING'		=> 'Questo strumento viene fornito senza ALCUNA GARANZIA ti consigliamo vivamente di eseguire il backup del tuo intero database in caso di guasto.<br /><br />Prima di continuare, assicurati di aver eseguito un backup completo del tuo database!',
	'DATABASE_CLEANER_WELCOME'		=> 'Benvenuto nello strumento di Pulizia Database!<br /><br />Questo strumento è stato progettato per eliminare le colonne extra, le righe e le tabelle del database non presenti nell’installazione predefinita di phpBB3, e di aggiungere gli elementi mancanti al database.<br /><br />Quando sei pronto per continuare fai clic sul pulsante Continua per iniziare a utilizzare lo strumento di Pulizia Database (Nota bene che il tuo ACP verrà disattivato fino a quando questo processo non sarà terminato).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Le colonne del database sono state aggiornate!',
	'DATABASE_TABLES'				=> 'Tabelle database',
	'DATABASE_TABLES_SUCCESS'		=> 'Le tabelle del database sono state aggiornate!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'Il ruoli del sistema phpBB sono stati ripristinati con successo!',
	'DATABASE_ROLES_SUCCESS'		=> 'I ruoli sono stati aggiornati con successo!',
	'DATAFILE_NOT_FOUND'			=> 'Il supporto toolkit non ha trovato il file di dati necessari per la versione phpBB!',

	'EMPTY_PREFIX'					=> 'Nessun prefisso database',
	'EMPTY_PREFIX_CONFIRM'			=> 'La pulizia del database è in procinto di apportare modifiche alle tabelle del database, se si utilizza una tabella vuota prefisso questo potrebbe influenzare le tabelle non phpBB. Sei sicuro di voler continuare?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'La pulizia del database ha stabilito che hai impostato un prefisso per le tabelle del database, ora verrà fatto un controllo per verificare su <strong>tutte</strong> le tabelle del database. Fai molta attenzione se procedi e assicurati di escludere tutte le tabelle non-phpBB dalla selezione. In caso contrario si potrebbe danneggiare le tabelle del database che non fanno parte di phpBB.<br />Sei non sei sicuro su come procedere chiedi assistenza sul <a href="http://www.phpbb.com/community/viewforum.php?f=46">Forum di supporto phpBB</a>.',	
	'ERROR'							=> 'Errore',
	'EXTRA'							=> 'Extra',
	'EXTENSION_GROUPS_SUCCESS'		=> 'Il gruppo di estensioni è stato ripristinato con successo',
	'EXTENSIONS_SUCCESS'			=> 'Le estensioni sono state ripristinate con successo',

	'FINAL_STEP'					=> 'Questa è la fase finale.<br /><br />Sarà ora riattivata la board e svuotata la cache.',

	'INSTRUCTIONS'					=> 'Istruzioni',

	'MISSING'						=> 'Mancante',
	'MODULE_UPDATE_SUCCESS'			=> 'I moduli sono stati aggiornati!',

	'NO_BOT_GROUP'					=> 'Impossibile ripristinare il bot, manca il gruppo Bot.',

	'PERMISSION_SETTINGS'			=> 'Opzioni Permessi',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Le impostazioni dei permessi sono state aggiornate!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'La tua versione di phpBB3 non è supportata (o alcuni files del Supporto Toolkit sono mancanti).<br />phpBB 3.0.0+ dovrebbe essere supportata, ma potrebbe richiedere un pò di tempo tra una nuova versione di phpBB3 e questo strumento aggiornato per supportare la versione più recente.',

	'QUIT'							=> 'Esci',

	'RESET_BOTS'					=> 'Reimposta Bots',
	'RESET_BOTS_EXPLAIN'			=> 'Vuoi reimpostare l’elenco bot predefinito?  Tutti gli esistenti bots saranno eliminati e sostituiti con la configurazione predefinita.',
	'RESET_BOT_SUCCESS'				=> 'I Bots sono stati reimpostati con successo!',
	'RESET_MODULES'					=> 'Reimposta Moduli',
	'RESET_MODULES_EXPLAIN'			=> 'Vuoi reimpostare l’elenco Moduli predefinito?  Tutti gli esistenti Moduli saranno eliminati e sostituiti con la configurazione predefinita.',
	'RESET_MODULES_SKIP'			=> 'Il reset del modulo è stato ignorato',
	'RESET_MODULE_SUCCESS'			=> 'I moduli sono stati reimpostati con successo!',
	'ROWS'							=> 'Righe',
	'RESET_REPORT_REASONS'			=> 'Ripristina ragioni segnalazioni',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Vuoi ripristinare le segnalazioni ai valori predefiniti? Questo elimina tutte le segnalazioni aggiunte!',
	'RESET_REPORT_REASONS_SKIP'		=> 'Le segnalazioni sono state ripristinate',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'Le segnalazioni sono state ripristinate con successo!',
	'RESET_ROLE_DATA'				=> 'Ripristina dati ruoli',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Questo passaggio ripristina i ruoli allo stato iniziale, è consigliabile eseguire questo passaggio solo se sono state apportate modifiche nei passaggi precedenti.',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'	        => 'Tabelle non modificate',
		'columns'	        => 'Colonne non modificate',
		'config'	        => 'Configurazione non modificata',
		'extension_groups'	=> 'Estensioni gruppi non modificate',
		'extensions'		=> 'Estensioni non modificate',
		'permissions'   	=> 'Permessi non modificati',
		'groups'        	=> 'Gruppi non modificati',
		'roles'         	=> 'Ruoli non modificati',
		'final_step'		=> 'Passaggio finale',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'	        => 'Le tabelle del database non sono state modificate',
		'columns'	        => 'Le colonne del database non sono state modificate',
		'config'	        => 'La tabella della configurazione non ha nessun nuovo valore',
		'extension_groups'	=> 'La tabella di estensione dei gruppi non ha nessun nuovo/valore mancante',
		'extensions'		=> 'Le estensioni di default non sono modificate',		
		'permissions'	    => 'Nessuna modifica nei permessi delle tabelle',
		'groups'        	=> 'Nessuna modifica nel sistema dei gruppi di phpBB',
		'roles'				=> 'Nessun ruolo aggiunto o eliminato',		
		'final_step'    	=> 'Con questo ultimo step verrà cancellata la cache e riattivata la board.',
	),
	'SUCCESS'						=> 'Successo',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'I gruppi sono stati resettati con successo',

	'TYPE'							=> 'Tipo',

	'UNSTABLE_DEBUG_ONLY'			=> 'La pulizia del database può essere eseguita solo su una versione instabile di phpBB <em>(dev, a, b, RC)</em>, quando il "DEBUG" è attivo (può essere impostato nel config.php).',
));

