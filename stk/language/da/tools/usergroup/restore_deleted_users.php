<?php
/**
*
* @package Support Toolkit - Restore Deleted Users
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
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
	'NO_DELETED_USERS' => 'Ingen slettede brugere kan gendannes',
	'NO_USER_SELECTED'	=> 'Ingen brugere valgt!',

	'RESTORE_DELETED_USERS'						=> 'Gendannelse af slettede brugere',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Gendannelse af slettede brugere :: Konfliktede',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Her har du mulighed for at gendanne brugere som er slettet fra boardet, men hvis indlæg er bevaret som "gæsteindlæg" på boardet.<br />De gendannede brugere får tildelt et fælles tilfældigt kodeord, som du efterfølgende skal nulstille manuelt for hver bruger. Værktøjet er ikke i stand til at danne kodeord for hver bruger!<br /><br />Under seneste gendannelse fandt værktøjet nogle brugernavne som allerede eksisterer på boardet. Tildel venligst disse brugere et nyt brugernavn.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Her har du mulighed for at gendanne brugere som er slettet fra boardet, men hvis indlæg er bevaret som "gæsteindlæg" på boardet.<br />De gendannede brugere får tildelt et fælles tilfældigt kodeord, som du efterfølgende skal nulstille manuelt for hver bruger. Værktøjet er ikke i stand til at danne kodeord for hver bruger!',

	'SELECT_USERS'	=> 'Vælg brugere til gendannelse',

	'USER_RESTORED_SUCCESSFULLY'	=> 'Valgte bruger er gendannet.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Valgte brugere er gendannet.',
));