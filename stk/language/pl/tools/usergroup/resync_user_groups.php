<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'Synchronizuj grupy użytkowników',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Te narzędzie zostało stworzone do sprawdzania czy wszyscy użytkownicy są członkami prawidłowej grupy domyślnej <em>(Zarejestrowani użytkownicy, Zarejestrowani użytkownicy COPPA i Nowo zarejestrowani użytkownicy)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Żadne grupy nie wymagają synchronizacji!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Opcje synchronizacji',
	'RUN_BOTH_FINISHED'				=> 'Wszystkie grupy zostały zsynchronizowane.',
	'RUN_RNR'						=> 'Synchronizuj nowo zarejestrowanych użytkowników',
	'RUN_RNR_EXPLAIN'				=> 'To zaktualizuje grupę "Nowo zarejestrowani użytkownicy", tak aby zawierała użytkowników, którzy spełniają kryteria określone w panelu administracji.',
	'RUN_RNR_FINISHED'				=> 'Grupa nowo zarejestrowanych użytkowników została zsynchronizowana.',
	'RUN_RNR_NOT_FINISHED'			=> 'Trwa synchronizowanie grupy nowo zarejestrowanych użytkowników. Nie przerywaj tego procesu.',
	'RUN_RR'						=> 'Synchronizuj zarejestrowanych użytkowników',
	'RUN_RR_EXPLAIN'				=> 'Narzędzie stwierdziło, że nie wszyscy użytkownicy są członkami grupy "Zarejestrowani użytkownicy <em>(COPPA)</em>". Czy chcesz zsynchronizować te grupy?<br /><strong>Uwaga:</strong> Jeżeli na Twojej witrynie włączona jest opcja COPPA, a użytkownik nie ma wprowadzonej daty urodzenia, to zostanie umieszczony w grupie "Zarejestrowani użytkownicy COPPA"!',
	'RUN_RR_FINISHED'				=> 'Użytkownicy zostali zsynchronizowani.',

	'SELECT_RUN_GROUP'	=> 'Zaznacz co najmniej jedną grupę do zsynchronizowania.',
));
