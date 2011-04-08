<?php
/**
 *
 * @package Support Toolkit
 * @version $Id$
 * @copyright (c) 2010 phpBB Group
 * @copyright (c) 2011 portalxl.eu - translated on 2011/04/06 
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
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Qui di seguito c’è la copia del modello della richiesta di supporto. Clicca qui sotto per copiarlo negli appunti, quindi creare un nuovo post nel <a href="http://www.phpbb.com/community/viewforum.php?f=46">Forum di supporto</a> con queste informazioni. Se il tuo argomento è già esistente nel forum, copia il modello in una risposta nell’argomento esistente anziché crearne uno nuovo.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'Il generatore di template non ha potuto caricare le risposte. Assicurati di aver correttamente avviato lo strumento.',
	'SRT_GENERATOR'					=> 'Generatore di richiesta di supporto',
	'SRT_GENERATOR_LANDING'			=> 'Generatore di richiesta di supporto',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Benvenuto nel generatore di richiesta supporto Team. Questo è il modo più rapido ed efficiente per completare il nostro modello di richiesta supporto. Il generatore farà una serie di otto-dieci domande che sono utili per la diagnosi della maggior parte dei problemi. Successivamente dovrai compilare le tue risposte in un elenco che può essere copiato e incollato nell’argomento di supporto.<br />Questo strumento STK fa la stessa cosa come il <a href="http://www.phpbb.com/support/stk/">generatore SRT disponibile su www.phpbb.com</a> ma con alcuni tentativi di domande pre-compliate.<br /><br />Vuoi eseguire il generatore SRT?',
	'SRT_NO_CACHE'					=> 'Il generatore richiesta di supporto fa utilizzo del sistema cache per memorizzare le informazioni mentre passa attraverso tutti i passaggi. Si sta utilizzando la cache null che non è compatibile con questo strumento. Devi utilizzare un altro tipo di cache per usare questo strumento o utilizzare il <a href="http://www.phpbb.com/support/srt/">generatore online SRT</a>',
	'START_OVER'					=> 'Ricomincia',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'Il tuo problema è relativo ad una MOD?',
	'STEP1_MOD_EXPLAIN'		=> 'Ha avuto inizio questa problema dopo l’installazione o l’eliminazione di una MOD?',
	'STEP1_MOD_ERROR'		=> 'Domande di supporto per le problematiche connesse alle MOD (es., se hai installato una MOD e ora hai nuovi errori) devi scrivere nell’argomento dove hai scaricato la MOD. Se la MOD è stata scaricata su un altro sito devi chiedere supporto su quel sito.<br /><br /><a href="http://www.phpbb.com/community/viewforum.php?f=81">Vai al forum delle MOD</a>',
	'STEP1_HACKED'			=> 'La tua board è stata hackerata?',
	'STEP1_HACKED_EXPLAIN'	=> 'Seleziona "Si" per questa opzione se vuoi chiedere supporto in seguito alla deturpazione, quindi compromessa della tua board.',
	'STEP1_HACKED_ERROR'	=> 'Se la tua board è stata hackerata, ti chiediamo di presentare una relazione con l’indagine sugli incidenti nel tracker invece di postare nel forum di supporto in modo che non siano divulgate informazioni private.<br /><br />Vedi <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">questo argomento</a> per leggere le istruzioni.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Quale versione di phpBB stai usando?',
			'board_url'			=> 'Qual’è l’URL della tua board?',
			'dbms'				=> 'Che tipo/versione di database stai usando?',
			'php'				=> 'Quale versione di PHP stai usando?',
			'host_name'			=> 'Qual’è il nome del tuo host?',
			'install_type'		=> 'Che tipo di installazione hai fatto sulla tua board?',
			'inst_converse'		=> 'La tua, è una nuova installazione o una conversione?',
			'mods_installed'	=> 'Hai altre MOD installate?',
			'registration_req'	=> 'E’ necessaria la registrazione per riprodurre l’errore?',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Quali stili sono attualmente installati?',
			'installed_languages'	=> 'Quali lingue sono attualmente installate sulla tua board e quale usi?',
			'xp_level'				=> 'Qual’è il tuo livello di esperienza?',
			'problem_started'		=> 'Come è cominciato il tuo problema?',
			'problem_description'	=> 'Descrivi il tuo problema.',
			'installed_mods'		=> 'Quali MOD hai installato?',
			'test_username'			=> 'Quale nome utente può essere usata per testare il problema?',
			'test_password'			=> 'Quale password può essere usata per vedere il problema?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Il generatore SRT non può determinare la tua versione di phpBB, seleziona quindi la tua attuale versione. Per trovare questa informazione, loggati sulla tua board e clicca sul link a fondo pagina. Clicca su "Pannello di Controllo Amministratore". Clicca sulla scheda "Sistema".',
			'board_url'			=> 'L’URL è l’indirizzo internet della tua board. La maggior parte dei problemi sono più facilmente risolvibili quando si può visualizzare la tua board. Se non vuoi dare queste informazioni, scrivi "n/a".',
			'dbms'				=> 'Determina la versione database e il tipo che attualmente stai usando, vai nel Pannello di Controllo Amministratore. Nella scheda "Generale", individua "Server Database:" nella tabella statistica.',
			'php'				=> 'Determina quale versione di PHP stai usando, trovi questa informazione nel Pannello di Controllo Amministratore. Nella scheda "Generale", clicca su "Informazione PHP", e trova la "Versione di PHP x.y.z"',
			'host_name'			=> 'Alcuni problemi riscontrati con le board phpBB possono essere attribuiti a determinati host. Questo spazio deve essere riempito con la società che fornisce il pacchetto di web hosting (come GoDaddy, Yahoo, 1 & 1, ecc.). Allo stesso modo, se sei a conoscenza su quale host la tua board è ospitata, indica anche questo.',
			'install_type'		=> 'Se si è installato la board scaricando i file phpBB, caricandoli sul tuo host, quindi con la navigazione al programma di installazione, selezionare "Ho installato la board personalmente." Se invece qualcuno altro ha fatto l’installazione per te, seleziona "Qualcun altro ha installato per me". Se è stato utilizzato uno strumento automatico come Fantastico, selezionare "ho utilizzato uno strumento fornito dal mio host."',
			'inst_converse'		=> 'Se la tua board è una nuova installazione questo significa che la board non esisteva prima di installare phpBB. Se hai recentemente aggiornato la tua board da una versione precedente di phpBB3 devi selezionate "Aggiornamento da una versione precedente di phpBB3". Se si tratta di una conversione, questo significa che la tua board è stato installato in precedenza con un altro software, quindi, successivamente convertito in phpBB.',
			'mods_installed'	=> 'Le MOD sono spesso la causa di molti problemi con phpBB. Queste informazioni possono aiutare a determinare la causa esatta del problema.',
			'registration_req'	=> 'Seleziona "Si" se occorre essere registrato e loggato per verificare questo problema.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Uno stile non aggiornato è la causa di molti problemi. Se non conosci quali stili hai installato, vai al Pannello di Controllo Amministratore, quindi vai alla scheda "Stili".',
			'installed_languages'	=> 'Un pacchetto li lingua è la causa di molti problemi. Se non conosci quale pacchetto di lingua hai installato, vai al Pannello di Controllo Amministratore, quindi vai alla scheda "Sistema". Seleziona "Pacchetti lingua" dalla lista delle pagine sulla sinistra.',
			'xp_level'				=> 'Seleziona l’opzione che ti descrive.',
			'problem_started'		=> 'Descrivi l’azione che descrive il problema e come è iniziato (aggiornamento della board, installando una MOD, etc.), queste notizie sono prioritarie.',
			'problem_description'	=> 'Quando descrivi il problema cerca di essere il più dettagliato possibile. Includi le informazioni riguardanti il problema e quando è iniziato, come riprodurre il problema, e qualsiasi altra informazione che ritieni utile.',
			'installed_mods'		=> 'Cerca di essere il più dettagliato possibile sulle MOD installate. Queste informazioni ci aiutano molto nel determinare la causa del problema.',
			'test_username'			=> 'Comunica un nome utente per testare il problema. <strong>Non</strong> comunicare un nome utente esistente ma un nome utente test con normali privileggi.',
			'test_password'			=> 'Comunica una password per il nome utente affinchè possiamo testare il problema. <strong>Non</strong> comunicare una password di un nome utente esistente ma una password di un nome utente test con normali privileggi.',
		),
	),
));

// Langauge strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				'myself'		=> 'Ho usato il pacchetto di download da phpBB.com',
				'third'			=> 'Ho usato il pacchetto di download da un altro sito',
				'someone_else'	=> 'Qualcun altro ha installato la board per me',
				'automated'		=> 'Ho usato uno strumento automatico fornito dal mio host',
			),
			'inst_converse'	=> array(
				'fresh'				=> 'Nuova installazione',
				'phpbb_update'		=> 'Aggiornamento da una versione precedente di phpBB3',
				'convert_phpbb2'	=> 'Conversione da phpBB2',
				'convert_other'		=> 'Conversione da un altro software',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				'new_both'		=> 'Nuovo a PHP e phpBB',
				'new_phpbb'		=> 'Nuovo a phpBB ma non a PHP',
				'new_php'		=> 'Nuovo a PHP ma non a phpBB',
				'comfort'		=> 'Sufficiente a PHP e phpBB',
				'experienced'	=> 'Esperto con PHP e phpBB',
			),
		),
	),
));
