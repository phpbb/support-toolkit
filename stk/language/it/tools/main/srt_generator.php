<?php
/**
 *
 * @package Support Toolkit
 * @copyright (c) 2010 phpBB Group
 * @copyright (c) 2012 phpBBItalia.net - translated on 2012-06-25
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 * @ignore
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
// ’ » " " …
//

$lang = array_merge($lang, array(
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Di seguito la copia del modello di richiesta di supporto. Clicca qui sotto per copiarlo negli appunti, quindi crea un nuovo argomento nel <a href="http://www.phpbb.com/community/viewforum.php?f=46">Forum di supporto</a> con queste informazioni. Se l’argomento di supporto è già esistente in riferimento al problema, copia il tuo modello in una risposta nell’argomento esistente invece di crearne uno nuovo.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'Il Generatore di modello richiesta supporto non è riuscito a caricare le risposte. Assicurati di avviare correttamente lo strumento.',
	'SRT_GENERATOR'					=> 'Generatore del modello di richiesta supporto (in seguito abbreviamo in SRT, Support Request Template)',
	'SRT_GENERATOR_LANDING'			=> 'Generatore del modello di richiesta di supporto',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Benvenuto nel team di supporto del Generatore del modello di richiesta supporto. Questo è il modo più rapido ed efficiente per completare il nostro Generatore del modello di richiesta supporto. Il Generatore ti chiederà una serie di domande da otto a dieci  che saranno utili per diagnosticare la maggior parte dei problemi. Quindi le tue risposte saranno compilate in un elenco che potrà essere copiato e incollato nell’argomento di supporto.<br /> Questo strumento STK fa la stessa cosa come il <a href="http://www.phpbb.com/support/stk/">SRT Generator su www.phpbb.com</a> ma tentando di precompliare alcune domande.<br /><br />Vuoi eseguire il Generatore SRT? ',
	'SRT_NO_CACHE'					=> 'Il Generatore di modello richiesta di supporto utilizza il sistema cache di phpBB per memorizzare le informazioni mentre esegue tutti i passaggi. Stai usando la cache null di phpBB che non è compatibile con questo strumento. Si prega di utilizzare altri tipi di sistemi di cache per usare questo strumento o utilizza il <a href="http://www.phpbb.com/support/srt/">Generatore SRT on line</a>',
	'START_OVER'					=> 'Ricomincia',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'Il tuo problema è legato a una MOD?',
	'STEP1_MOD_EXPLAIN'		=> 'Questo problema si è verificato dopo l’installazione o la rimozione della MOD?',
	'STEP1_MOD_ERROR'		=> 'Le domande di supporto per le questioni legate alla MOD (per es., se hai appena installato una MOD e ora sono presenti errori) dovrebbero essere pubblicate nell’argomento da cui hai scaricato la MOD. Se la MOD è stata scaricata da un altro sito, lì devi chiedere supporto.<br /><br /><a bref="http://www.phpbb.com/community/viewforum.php?f=81">Vai ai forum delle MOD</a>',
	'STEP1_HACKED'			=> 'La tua Board è stata violata?',
	'STEP1_HACKED_EXPLAIN'	=> 'Seleziona "Sì" per questa opzione se sei alla ricerca di supporto, perché la Board è stata alterata o compromessa.',
	'STEP1_HACKED_ERROR'	=> 'Se la Board è stata violata, ti chiediamo di presentare una relazione con il Tracker Incident Investigation invece di segnalare la cosa nel forum di supporto in modo che non siano divulgate informazioni private.<br /><br />Vedi <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">questo messaggio</a> per avere le istruzioni su come farlo.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Quale versione di phpBB stai usando?',
			'board_url'			=> 'Qual è l’URL della tua Board?',
			'dbms'				=> 'Che tipo/versione di database stai usando?',
			'php'				=> 'Quale versione di PHP stai usando?',
			'host_name'			=> 'In quale Host è opitata la tua Board?',
			'install_type'		=> 'Come hai installato la tua Board?',
			'inst_converse'		=> 'La tua Board è una installazione nuova o una conversione?',
			'mods_installed'	=> 'Hai altre MOD installate?',
			'registration_req'	=> 'È richiesta la registrazione per riprodurre il problema?',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Quali stili hai attualmente installato?',
			'installed_languages'	=> 'Quale lingua/e la Board ha attualmente in uso?',
			'xp_level'				=> 'Qual è il tuo livello di esperienza?',
			'problem_started'		=> 'Quando è iniziato il tuo problema?',
			'problem_description'	=> 'Prego descrivi il tuo problema.',
			'installed_mods'		=> 'Quali MOD hai installato?',
			'test_username'			=> 'Quale nome utente può essere utilizzato per testare il problema?',
			'test_password'			=> 'Quale password può essere utilizzata per visualizzare questo problema?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Il Generatore SRT non può determinare quale versione di phpBB stai utilizzando; seleziona la corretta versione. Per trovare questa informazione, autenticati sulla Board e vai in fondo alla pagina. Clicca su "Pannello di Controllo Amministratore". Clicca sulla scheda "Sistema".',
			'board_url'			=> 'L’URL della tua Board è l’indirizzo internet della Board. La maggior parte dei problemi sono più facilmente risolvibili quando si può visualizzare la Board. Se non vuoi dare queste informazioni, si prega inserire "n/d".',
			'dbms'				=> 'Per determinare il tipo e la versione che stai usando, vai nel "Pannello di Controllo Amministratore". Nella scheda "Generale", individua "Server Database:" nella tabella "Statistiche".',
			'php'				=> 'Per determinare quale versione di PHP stai usando, vai nel "Pannello di Controllo Amministratore".  Nella scheda "Generale", clicca su "Informazione PHP", qui troverai la "Versione di PHP x.y.z"',
			'host_name'			=> 'Alcuni problemi riscontrati con le Board phpBB possono essere attribuiti a particolari Host. Questo campo deve essere riempito con la società che fornisce il pacchetto di webhosting (come GoDaddy, Yahoo!, etc.). Se provvedi tu stesso all’Hosting per la Board, specificalo. Allo stesso modo, se non conosci l’Hosting della tua Board, specificalo.',
			'install_type'		=> 'Se hai installato la tua Board scaricando i file phpBB, caricandoli sul tuo Host, quindi utilizzando l’installer, seleziona "Ho installato la Board da solo". Se hai avuto qualcuno che ha installato per te, seleziona "Qualcun altro ha installato la mia Board per me". Se utilizzi uno strumento automatico come Fantastico, seleziona "Ho usato uno strumento fornito dal mio Host."',
			'inst_converse'		=> 'Se la tua Board è una nuova installazione questo vuol dire che la Board non esisteva prima di installare phpBB. Se hai recentemente aggiornato la tua Board da una versione precedente di phpBB3 prima che il problema iniziasse, seleziona “Aggiornamento da una versione precedente di phpBB3”. Se si tratta di una conversione, questo significa che la tua Board è stata installata in precedenza con un altro software, quindi, successivamente convertita in phpBB.',
			'mods_installed'	=> 'Le MOD sono spesso la causa di molti problemi con phpBB. Queste informazioni possono aiutare a determinare la causa esatta del problema.',
			'registration_req'	=> 'Seleziona “Sì” se si deve essere registrati e autenticati per verificare questo problema.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Uno stile non aggiornato è la causa di molti problemi. Se non sai quali stili hai installato, vai al "Pannello di  Controllo Amminstrazione", dopo vai alla scheda "Stili".',
			'installed_languages'	=> 'Un pacchetto lingua non aggiornato è la causa di molti problemi. Se non sai quale pacchetto lingua hai installato, vai al "Pannello di Controllo Amministratore", quindi vai alla scheda "Sistema". Seleziona "Pacchetti lingua" dalla lista delle pagine sulla sinistra.',
			'xp_level'				=> 'Seleziona l’opzione più descrittiva.',
			'problem_started'		=> 'Descrivi le azioni eseguite prima che il problema diventasse evidente (aggiornando la Board, installando una MOD, etc.).',
			'problem_description'	=> 'Nel descrivere il problema, cerca di essere il più dettagliato possibile. Includi le informazioni relative a quando il problema è iniziato, riportando il problema in pochi passi, e qualsiasi altra informazione che ritieni utile.',
			'installed_mods'		=> 'Per favore cerca di essere il più dettagliato possibile quando elenchi le MOD installate. Queste informazioni ci aiuteranno molto nel determinare la causa del problema.',
			'test_username'			=> 'Fornisci il nome utente di un account di prova che può essere utilizzato per visualizzare questo problema. <strong>Non</strong> fornire questa informazione se l’utente ha privilegi maggiori di un "regolare utente" .',
			'test_password'			=> 'Si prega di fornire la password di un account di prova che può essere utilizzato per visualizzare questo argomento. <strong>Non</strong> fornire questa informazione se l’utente ha privilegi maggiori di un "regolare utente".',
		),
	),
));

// Langauge strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				null			=> 'Seleziona la tua risposta',
				'myself'		=> 'Ho usato il pacchetto di download da phpBB.com',
				'third'			=> 'Ho usato il pacchetto di download da un altro sito',
				'someone_else'	=> 'Qualcun altro ha installato la mia Board per me',
				'automated'		=> 'Ho usato uno strumento automatico fornito dal mio Host',
			),
			'inst_converse'	=> array(
				null				=> 'Seleziona la tua risposta',
				'fresh'				=> 'Nuova installazione',
				'phpbb_update'		=> 'Aggiornamento da una versione precedente di phpBB3',
				'convert_phpbb2'	=> 'Conversione da phpBB2',
				'convert_other'		=> 'Conversione da un altro software',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				null			=> 'Seleziona la tua risposta',
				'new_both'		=> 'Nuovo a PHP e phpBB',
				'new_phpbb'		=> 'Nuovo a phpBB ma non a PHP',
				'new_php'		=> 'Nuovo a PHP ma non a phpBB',
				'comfort'		=> 'Sciolto con PHP e phpBB',
				'experienced'	=> 'Esperto con PHP e phpBB',
			),
		),
	),
));
