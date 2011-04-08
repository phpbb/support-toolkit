<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'					=> 'Aggiornamento MySQL',
	'MYSQL_UPGRADER_BACKUP'				=> 'Questo strumento è potenzialmente pericolos, assicurati di effettuare un backup del database prima di procedere!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Questo strumento è progettato per risolvere alcuni problemi che sono causati quando il database MySQL utilizzato dalla installazione phpBB viene aggiornato. Questo aggiornamento può risolvere il problema della incompatibilità del database con la nuova versione. <em>Vedi anche la “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>” guida.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Download',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Selezionando questa opzione l’aggiornamento MySQL genererà le query e visualizzare il risultato, da lì puoi scaricare il file con l’esito.',
	'MYSQL_UPGRADER_RESULT'				=> 'Qui di seguito troverai le query che dovranno essere eseguite per aggiornare lo schema del database alla versione corretta di MySQL. Clicca <a href="%s">qui</a> per scaricare le queries in un file .sql.',
	'MYSQL_UPGRADER_RUN'				=> 'Esegui',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Selezionando questa opzione l’aggiornamento MySQL genererà le query per eseguire automaticamente il risultato sul database. <br/> Questo potrebbe richiedere del tempo, <strong>non</strong> interrompere questo processo fino a quando il processo non è stato completato.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'MySQL script di aggiornamento',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'L’aggiornamento è stato eseguito con successo',
	
	'QUERY_FINISHED'	=> 'Lo script ha eseguito query %1$d di %2$d, continua al prossimo passaggio.',

	'TOOL_MYSQL_ONLY'	=> 'Questo strumento è disponibile solo per gli utenti MySQL di DBMS',
));
