<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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

/**
* DO NOT CHANGE
*/
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
// í ª ì î Ö
//

$lang = array_merge($lang, array(
	'REPARSE_ALL'				=> 'Analizza tutti i BBCodes',
	'REPARSE_ALL_EXPLAIN'		=> 'Quando si effettua il controllo dei BBCode viene analizzato tutto il contenuto della board; per impostazione predefinita, lo strumento analizza messaggi/messaggi privati/firme che sono stati precedentemente analizzati da phpBB.',
	'REPARSE_BBCODE'			=> 'Analizza BBCode',
	'REPARSE_BBCODE_COMPLETE'	=> 'I BBCodes sono stati analizzati.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Sei sicuro di voler analizzare tutti i BBCodes? Questo potrebbe richiedere del tempo.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Fase %1$d completata. Vai alla fase %2$d in un momento...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Analisi messaggi terminata, spostamento ai messaggi privati.',
		2	=> 'Analisi messaggi privati terminata, spostamento sulle firme.',
	),
	'REPARSE_IDS_INVALID'			=> 'Gli ID che hai inviato non erano validi, si prega di assicurarsi che gli ID post sono elencati come un elenco separato da virgole (es. 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Ripara messaggi specifici',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Per i messaggi specifici devi specificare gli ID dei messaggi in un elenco separato da virgole.',
	'REPARSE_PM_IDS'				=> 'Ripara messaggi privati specifici',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Per riparare i messaggi privati specifici devi specificare gli ID dei messaggi in un elenco separato da virgole. (es. 1,2,3,5,8,13).',
));
