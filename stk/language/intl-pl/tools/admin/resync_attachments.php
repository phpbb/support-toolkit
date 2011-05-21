<?php
/**
 *
 * @package Support Toolkit - Resync Attachments
 * @copyright (c) 2009 phpBB Group
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
	'RESYNC_ATTACHMENTS'			=> 'Ponownie synchronizuj załączniki',
	'RESYNC_ATTACHMENTS_CONFIRM'	=> 'Narzędzie to sprawdza czy wszystkie załączniki przechowywane w bazie danych posiadają pliki na serwerze. Jeżeli na serwerze nie znajduje się plik załącznika przechowywanego w bazie danych narzędzie usunie załącznik z bazy danych. Czy jesteś pewien że chcesz kontynuować?',
	'RESYNC_ATTACHMENTS_FINISHED'	=> 'Załączniki zostały pomyślnie zsynchronizowane!',
	'RESYNC_ATTACHMENTS_PROGRESS'	=> 'Ponowna synchronizacja załączników w toku. Nie przerywaj tego procesu.',
));
