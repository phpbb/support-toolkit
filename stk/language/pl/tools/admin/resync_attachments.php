<?php
/**
 *
 * @package Support Toolkit - Resync Attachments
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @translation (c) 2011 Olympus.pl http://www.phpbb.pl
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
	'RESYNC_ATTACHMENTS'			=> 'Synchronizuj załączniki',
	'RESYNC_ATTACHMENTS_CONFIRM'	=> 'To narzędzie sprawdza czy wszystkie załączniki przechowywane w bazie danych mają plik na serwerze. Jeżeli brakuje pliku, wtedy załącznik jest usuwany z bazy danych. Czy na pewno chcesz kontynuować?',
	'RESYNC_ATTACHMENTS_FINISHED'	=> 'Załączniki zostały zsynchronizowane.',
	'RESYNC_ATTACHMENTS_PROGRESS'	=> 'Trwa synchronizowanie załączników. Nie przerywaj tego procesu.',
));
