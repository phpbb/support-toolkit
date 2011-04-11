<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2010 phpBB.it - translated on 2010/06/12
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
	'BACK_TOOL'							=> 'Torna agli strumenti',
	'BOARD_FOUNDER_ONLY'				=> 'Solo i founders della boards hanno accesso al Supporto Toolkit.',

	'CAT_ADMIN'							=> 'Strumenti Amministrativi',
	'CAT_ADMIN_EXPLAIN'					=> 'Gli strumenti all’interno di questa categoria possono essere utilizzati dall’amministratore per svolgere compiti riguardanti la board e l’installazione di phpBB 3.0.x.',
	'CAT_DEV'							=> 'Strumenti di sviluppo',
	'CAT_DEV_EXPLAIN'					=> 'Gli "strumenti di svliluppo" sono strumenti che possono essere utilizzati dagli sviluppatori di phpBB.',
    'CAT_ERK'							=> 'Kit riparazione d’emergenza',
	'CAT_ERK_EXPLAIN'					=> 'Il kit di riparazione di emergenza è un pacchetto separato della STK che è costruito per eseguire alcune verifiche che possono rilevare i problemi all’interno della tua installazione di phpBB che potrebbero ostacolare il lavoro della board. Clicca <a href="%s">qui</a> per eseguire ERK.',
	'CAT_MAIN'							=> 'Principale',
	'CAT_MAIN_EXPLAIN'					=> 'Il supporto Toolkit, o STK, è un pacchetto che può essere utilizzato per recuperare installazioni di phpBB 3.0.x , o risolvere problemi comuni in alcune installazioni. Il pacchetto crea una seconda interfaccia di ACP che può essere facilmente installata su qualsiasi board di phpBB 3.0.x, l’aspetto grafico è lo stesso che viene utilizzato nell’interfaccia predefinita ACP di phpBB. STK crea nuovi strumenti che possono essere utilizzati nei casi in cui phpBB non funziona più correttamente.',
	'CAT_SUPPORT'						=> 'Strumenti di Supporto',
	'CAT_SUPPORT_EXPLAIN'				=> 'Gli strumenti di supporto sono usati per riparare alcune parti di installazioni di phpBB 3.0.x.',
	'CAT_USERGROUP'					    => 'Strumenti Utenti/Gruppi',
	'CAT_USERGROUP_EXPLAIN'			    => 'Questa categoria contiene strumenti specifici per utenti e gruppi',
	'CONFIG_NOT_FOUND'					=> 'La configurazione di STK non è stata caricata. Controlla la tua installazione',

	'DOWNLOAD_PASS'						=> 'Scarica il file password.',

	'EMERGENCY_LOGIN_NAME'				=> 'STK strumento login di emergenza',
    'ERK'								=> 'Kit riparazione d’emergenza',
	'FAIL_REMOVE_PASSWD'				=> 'Impossibile rimuovere il file, è scaduta la password. Devi eliminare questo file manualmente!',

	'GEN_PASS_FAILED'					=> 'Qualcosa è andato storto durante la generazione del file contenente la password. Devi generare una nuova password.',
	'GEN_PASS_FILE'						=> 'Generazione file password.',
	'GEN_PASS_FILE_EXPLAIN'				=> 'Se non sei in grado di accedere a phpBB è possibile utilizzare il metodo di autenticazione interno del supporto toolkit. Per utilizzare questo metodo è necessario <a href="%s"><strong>generare</strong></a> una nuova password.',

	'INCORRECT_CLASS'					=> 'Classe non corretta in: stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'Password non corretta',
	'INCORRECT_PHPBB_VERSION'			=> 'La tua versione di phpBB è incompatibile con questo strumento. Assicurati che la tua versione di phpBB è: %1$s, prima di eseguire questo strumento',

	'LOGIN_STK_SUCCESS'					=> 'Ti sei correttamente loggato ed ora verrai reindirizzato al Supporto Toolkit.',

	'NOTICE'							=> 'Avviso',
	'NO_VERSION_FILE'					=> 'Il supporto toolkit non è in grado di determinare la versione più recente del pacchetto. Vai sul sito web <a href="http://www.phpbb.com/support/stk/">Supporto Toolkit</a> e assicurati di usare l’ultima versione del pacchetto prima di continuare ad usarla.',

	'PASS_GENERATED'					=> 'La tua password STK è stata correttamente generata!<br/>Il file password è stato generato in : <em>%1$s</em><br />La password scade il: <span style="text-decoration: underline;">%2$s</span>, dopo questo tempo <strong>devi</strong> generare un nuovo file per continuare ad utilizzare la funzione di login di emergenza!<br /><br />Utilizza il pulsante seguente per scaricare il file. Una volta scaricato il file è necessario caricarlo sul tuo server nella directory "stk".',
	'PASS_GENERATED_REDIRECT'			=> 'Dopo aver caricato il file password nella posizione corretta, fai clic <a href="%s">qui</a> per tornare alla pagina di login.',
	'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Questo strumento non è compatibile con la versione di phpBB che stai utilizzando.',
	'PROCEED_TO_STK'					=> '%sEsegui gli strumenti di Supporto Toolkit%s',

	'STK_FOUNDER_ONLY'					=> 'Devi loggarti nuovamente prima di poter utilizzare il Supporto Toolkit!',
	'STK_LOGIN'							=> 'Login Supporto Toolkit',
	'STK_LOGIN_WAIT'					=> 'Si può solo tentare un login ogni 3 secondi, per favore riprova.',
	'STK_LOGOUT'						=> 'Logout STK',
	'STK_LOGOUT_SUCCESS'				=> 'Ti sei sloggato con successo dal Supporto Toolkit.',
	'STK_NON_LOGIN'						=> 'Login per accedere in STK.',
	'STK_OUTDATED'						=> 'La tua versione di Supporto Toolkit non è aggiornata. L’ultima versione è disponibile è <strong style="color: #008000;">%1$s</strong>, mentre la tua versione installata è <strong style="color: #FF0000;">%2$s</strong>.<br /><br />A causa del grande impatto di questo strumento nella tua installazione di phpBB, è stato disattivato fino a quando un aggiornamento venga eseguito. Si consiglia vivamente di mantenere il software in esecuzione sul server aggiornato. Per ulteriori informazioni riguardanti l’ultimo aggiornamento, leggi <a href="%3$s">l’argomento di versione</a>.',
	'SUPPORT_TOOL_KIT'					=> 'Supporto Toolkit',
	'SUPPORT_TOOL_KIT_INDEX'			=> 'Indice Supporto Toolkit',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Password',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Poiché non sei connesso a phpBB3 è necessario verificare che tu sia il Founder della board inserendo la password di STK.<br /><br /><strong>I Cookies devono essere abilitati dal browser o non sarai in grado di rimanere connesso.</strong>',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'Questo strumento sta cercando di caricare un file che non esiste: %1$s',
	'TOOL_NAME'							=> 'Nome Strumento',
	'TOOL_NOT_AVAILABLE'				=> 'Lo strumento richiesto non è disponibile!',

	'USING_STK_LOGIN'					=> 'Sei connesso con il metodo di autenticazione interno STK. Si consiglia di usare <strong>solo</strong> di usare questo metodo quando sei in grado di accedere a phpBB.<br />Per disabilitare questo motodo di login clicca<a href="%1$s">qui</a>.',
));

?>