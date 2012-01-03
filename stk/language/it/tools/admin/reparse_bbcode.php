<?php
/**
*
* @package Support Toolkit - Reparse BBCode
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2011 phpBBItalia.net - translated on 2011-09-30
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
	'REPARSE_ALL'				=> 'Ricontrolla tutti i BBCode',
	'REPARSE_ALL_EXPLAIN'		=> 'Se selezionato, saranno ricontrollati tutti i BBCode della Board; per impostazione predefinita, l’opzione ricontrolla solo messaggi/messaggi privati/firme che sono stati già controllati da phpBB. Questa opzione ignora i messaggi/messaggi privati specificati sotto.',
	'REPARSE_BBCODE'			=> 'Ricontrolla BBCode',
	'REPARSE_BBCODE_COMPLETE'	=> 'I BBCode sono stati ricontrollati.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Sei sicuro di voler ricontrollare tutti i BBCode? Fai attezione, questa opzione può potenzialmente danneggiare il tuo database in maniera irreversibile. Quindi, <strong>assicurati di aver fatto un backup dei dati prima di procedere</strong>. L’operazione potrebbe richiedere un po’ di tempo per essere completata.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Passo %1$d completato. Passo %2$d a breve...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Finito controllo messaggi, passo ai messaggi privati.',
		2	=> 'Finito controllo messaggi privati, passo alle firme.',
	),
	'REPARSE_IDS_INVALID'			=> 'L’ID che hai inserito non è valido; assicurati che gli ID dei messaggi siano scritti in una lista e separati da virgola (es.: 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Ricontrolla uno specifico messaggio',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Per ricontrollare specifici messaggi, indica gli ID dei messaggi in una lista, separati da virgola.',
	'REPARSE_PM_IDS'				=> 'Ricontrolla specifici messaggi privati',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Per ricontrollare solamente specifici messaggi privati, indicali in una lista, separati da virgola (es.: 1,2,3,5,8,13).',
));
