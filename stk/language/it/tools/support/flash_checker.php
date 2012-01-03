<?php
/**
 *
 * @package Support Toolkit - Flash checker
 * @copyright (c) 2009 phpBB Group
 * @copyright (c) 2011 phpBBItalia.net - translated on 2011-10-08
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
	'FLASH_CHECKER'				=> 'Controllo Flash',
	'FLASH_CHECKER_CONFIRM'		=> 'In phpBB 3.0.7-PL1, una possibile vulnerabilità XSS è stata individuata nel flash incorporato nel BBCode Flash. Questo problema è stato risolto con la versione phpBB 3.0.8. Questo strumento controlla tutti i messaggi, messaggi privati, e le firme per questo BBCode vulnerabile. Se rilevati, permette di riparare rapidamente questi messaggi per assicurarsi che la Board sia sicura. Controlla <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">l’annuncio di rilascio del phpBB 3.0.8</a> per maggiori informazioni sul problema.',
	'FLASH_CHECKER_FOUND'		=> 'Il controllo Flash ha trovato alcuni Flash BBCode potenzialmente pericolosi sulla tua Board. Clicca <a href="%s">qui</a> per riparare i messaggi e i messaggi privati che contengono il Flash BBCode.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Non è stato trovato nessun potenziale Flash BBCode pericoloso.',
));
