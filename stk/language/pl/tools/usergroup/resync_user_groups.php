<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'Synchronizuj grupy użytkowników',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Narzędzie to zostało zaprojektowane do sprawdzania czy wszyscy użytkownicy są częścią domyślnych grup <em>(Zarejestrowani użytkownicy, Zarejestrowani użytkownicy COPPA i Nowi użytkownicy)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Wygląda na to że wszystkie grupy są aktualne!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Synchronizuj ponownie opcje',
	'RUN_BOTH_FINISHED'				=> 'Wszystkie grupy użytkowników zostały pomyślnie zsynchronizowane!',
	'RUN_RNR'						=> 'Synchronizuj nowych użytkowników',
	'RUN_RNR_EXPLAIN'				=> 'Grupa "Nowi użytkownicy" zostanie zaktualizowana tak aby zawierała wszystkich użytkowników którzy pasują do kryteriów ustawionych w Panelu administracyjnym ACP.',
	'RUN_RNR_FINISHED'				=> 'Grupa Nowych użytkowników została pomyślnie zsynchronizowana!',
	'RUN_RNR_NOT_FINISHED'			=> 'Grupa Nowych użytkowników jest w trakcie ponownej synchronizacji. Nie przerywaj procesu',
	'RUN_RR'						=> 'Synchronizuj zarejestrowanych użytkowników',
	'RUN_RR_EXPLAIN'				=> 'Narzędzie wykryło że nie wszyscy użytkownicy na Twoim forum są częścią "Grupy Zarejestrowanych użytkowników <em>(COPPA)</em>". Czy chcesz ponownie zsynchronizować te grupy?<br /><strong>Uwaga:</strong> Jeżeli na forum jest włączona COPPA i użytkownik nie wpisał daty urodzin użytkownik taki zostanie umieszczony w grupie "Zarejestrowanych użytkowników COPPA"!',
	'RUN_RR_FINISHED'				=> 'Użytkownicy zostali pomyślnie zsynchronizowani!',

	'SELECT_RUN_GROUP'	=> 'Wybirze co najmniej jeden typ grupy która zostanie zsynchronizowana.',
));
