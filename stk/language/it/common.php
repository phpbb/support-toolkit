<?php
/**
*
* @package Support Toolkit
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2012 phpBBItalia.net - translated on 2012-06-25
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
   'BACK_TOOL'							=> 'Torna all’ultimo strumento',
   'BOARD_FOUNDER_ONLY'					=> 'Solo i Fondatori della Board possono accedere al Support Toolkit.',

   'CAT_ADMIN'							=> 'Strumenti di amministrazione',
   'CAT_ADMIN_EXPLAIN'					=> 'Gli Strumenti di amministrazione possono essere utilizzati da un amministratore per gestire aspetti particolari del proprio Forum e per risolvere problemi comuni.',
   'CAT_DEV'							=> 'Strumenti di sviluppo',
   'CAT_DEV_EXPLAIN'					=> 'Gli Strumenti di sviluppo possono essere utilizzati dagli sviluppatori e dai modders di phpBB per eseguire le operazioni più comuni.',
   'CAT_ERK'							=> 'Kit di riparazione d’emergenza',
   'CAT_ERK_EXPLAIN'					=> 'Il Kit di riparazione di emergenza è un pacchetto separato della STK che è costruito per eseguire alcuni controlli che possono rilevare i problemi all’interno della tua installazione di phpBB che potrebbero impedire il funzionamento della Board. Clicca <a href="%s">qui</a> per eseguire ERK',
   'CAT_MAIN'							=> 'Principale',
   'CAT_MAIN_EXPLAIN'					=> 'Il Support Toolkit (STK) può essere usato per risolvere problemi comuni all’interno di un’installazione funzionante di phpBB 3.0.x. Opera come un secondo PCA, fornendo un amministratore con una serie di strumenti per risolvere i problemi comuni che possono impedire il corretto funzionamento del phpBB3.',
   'CAT_SUPPORT'						=> 'Strumenti di supporto',
   'CAT_SUPPORT_EXPLAIN'				=> 'Gli Strumenti di supporto possono essere usati per aiutare nel recupero di un’installazione di phpBB 3.0.x che non funziona più correttamente.',
   'CAT_USERGROUP'						=> 'Utente/Gruppo Strumenti',
   'CAT_USERGROUP_EXPLAIN'				=> 'Strumenti di utenti e gruppi possono essere utilizzati per gestire utenti e gruppi in modo che non siano disponibili in un impianto di installazione di phpBB 3.0.x.',
   'CONFIG_NOT_FOUND'					=> 'Il file di configurazione STK non può essere caricato. Controlla la tua installazione',

   'DOWNLOAD_PASS'						=> 'Scarica il file delle password.',

   'EMERGENCY_LOGIN_NAME'				=> 'STK emergenza login',
   'ERK'								=> 'Kit di riparazione d’emergenza',

   'FAIL_REMOVE_PASSWD'					=> 'Impossibile rimuovere il file password scaduto. Si prega di rimuovere questo file manualmente!',

   'GEN_PASS_FAILED'					=> 'Il Support Toolkit è stato in grado di generare una nuova password. Si prega di riprovare.',
   'GEN_PASS_FILE'						=> 'Genera il file delle password.',
   'GEN_PASS_FILE_EXPLAIN'				=> 'Se non sei in grado di accedere al phpBB3 è possibile utilizzare il metodo di autenticazione interno del Toolkit supporto. Per utilizzare questo metodo è necessario <a href="%s"><strong>generare</strong></a> un nuovo file password.',

   'INCORRECT_CLASS'					=> 'Classe non corretta in: stk/tools/%1$s.%2$s',
   'INCORRECT_PASSWORD'					=> 'La password non è corretta',
   'INCORRECT_PHPBB_VERSION'			=> 'La tua versione di phpBB non è compatibile con questo strumento. Per esguire questo strumento, l’installazione deve essere la versione phpBB %1$s o successiva.',

   'LOGIN_STK_SUCCESS'					=> 'Autenticazione avvenuta; ora sarai reindirizzato al Support Toolkit.',

   'NOTICE'								=> 'Notifica',
   'NO_VERSION_FILE'					=> 'Support Toolkit (STK) non è stato in grado di determinare la versione in uso. Vai sulla sezione di <a href="http://phpbb.com/support/stk">Support Toolkit</a> di phpBB.com e verifica se in effetti stai usando l’ultima versione stabile di STK',

   'REQUEST_PHPBB_VERSION'				=> 'Definisci la versione di phpBB',
   'REQUEST_PHPBB_VERSION_EXPLAIN'		=> 'Il Support Toolkit è stato in grado di identificare correttamente quale versione phpBB si esegue; seleziona la versione appropriata in questo form prima di continuare.<br />Visita il <a href="http://www.phpbb.com/community/viewforum.php?f=46">forum di supporto</a> per ricevere assistenza.',

   'PASS_GENERATED'						=> 'Il tuo file delle password STK è stato generato con successo!<br />La password è stata generata per voi è!: <em>%1$s</em><br />Questa password scadrà il: <span style="text-decoration: underline;">%2$s</span>. Trascorso questo tempo <strong>dovrai</strong> generare un nuovo file di password per continuare ad usare il modulo login di emergenza!<br /><br />Utilizza il pulsante di seguito per scaricare il file. Una volta scaricato il file è necessario caricarlo sul server della cartella "stk" ',
   'PASS_GENERATED_REDIRECT'			=> 'Dopo aver caricato il file delle password nella posizione corretta, fai click <a href="%s">qui</a> per tornare alla pagina del login',
   'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Questo strumento non è compatibile con la versione di phpBB in uso',
   'PROCEED_TO_STK'						=> '%sProcedi con Support Toolkit%s',

   'STK_FOUNDER_ONLY'					=> 'Tu devi riautenticarti prima di usare Support Toolkit.',
   'STK_LOGIN'							=> 'Login di Support Toolkit',
   'STK_LOGIN_WAIT'						=> 'È necessario attendere tre secondi prima di tentare nuovamente il login. Riprova dopo che i tre secondi in questione sono passati.',
   'STK_LOGOUT'							=> 'STK Logout',
   'STK_LOGOUT_SUCCESS'					=> 'Support Toolkit: disconnessione avvenuta con successo.',
   'STK_NON_LOGIN'						=> 'Login per accedere al STK.',
   'STK_OUTDATED'						=> 'L’installazione di Support Toolkit sembra sia obsoleta. L’ultima versione disponibile è <strong style="color: #008000;">%1$s</strong>, mentre la versione in uso qui è la <strong style="color: #FF0000;">%2$s</strong>.<br /><br />A causa del grande impatto di questo strumento nella propria installazione di phpBB, è stato disattivato fino a quando non verrà eseguito un aggiornamento. Si consiglia di mantenere tutto il software in esecuzione su server aggiornati. Per ulteriori informazioni relative all’ultimo aggiornamento, consulta l’<a href="%3$s">argomento di rilascio</a>.<br /><br /><em>Se vedi questo avviso dopo un aggiornamento di Support Toolkit, clicca <a href="%4$s">qui</a> per svuotare la cache del controllo della versione.</em>',
   'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
   'SUPPORT_TOOL_KIT_INDEX'				=> 'Indice Support Toolkit',
   'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Password',
   'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Dal momento che non si è effettuato l’accesso al phpBB3 è necessario verificare che sei il proprietario della Bord inserendo la password in Support Toolkit.<br /><br /><strong>I cookie DEVONO essere consentiti nel tuo browser o non sarà in grado di rimanere collegato.</strong>',

   'TOOL_INCLUTION_NOT_FOUND'			=> 'Questo strumento sta cercando di caricare un file (%1$s) che non esiste.',
   'TOOL_NAME'							=> 'Nome del Tool',
   'TOOL_NOT_AVAILABLE'					=> 'Lo strumento richiesto non è disponibile.',

   'USING_STK_LOGIN'					=> 'Sei stato registrato utilizzando il metodo di autenticazione interno ad STK. Si consiglia di utilizzare questo metodo <strong>solo</strong> quando non si riesce ad accedere a phpBB.<br />Disabilita questo metodo di autenticazione <a href="%1$s">qui</a>.',
));
