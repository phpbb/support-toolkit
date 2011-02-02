<?php
/**
*
* @package Support Toolkit - Restore Delted Users
* @version $Id: restore_deleted_users.php 416 2010-06-09 00:49:36Z iwisdom $
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
	'NO_DELETED_USERS'	=> 'Nu există niciun utilizator care poate fi restaurat',
	'NO_USER_SELECTED'	=> 'Niciun utilizator selectat!',

	'RESTORE_DELETED_USERS'						=> 'Restaurează utilizatorii şterşi',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Restaurează utilizatorii şterşi :: Conflict',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Acest utilitar vă permite să restauraţi utilizatorii care sunt şterşi din forum dar care încă au mesaje "vizitator" pe forum.<br />Acestor utilizatori le vor fi alocate parole aleatoare pe care trebuie să le resetaţi manual după ce utilitarul a rulat. Acest utilitar <b>nu</b> furnizează o listă a parolelor generate!<br /><br />În timpul ultimei execuţii, acest utilitar a găsit câteva nume de utilizatori care există deja în forum. Vă rugăm să specificaţi un nume nou pentru aceşti utilizatori.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Acest utilitar vă permite să restauraţi utilizatorii care sunt şterşi din forum dar care încă au mesaje "vizitator" pe forum.<br />Acestor utilizatori le vor fi alocate parole aleatoare pe care trebuie să le resetaţi manual după ce utilitarul a rulat. Acest utilitar <b>nu</b> furnizează o listă a parolelor generate!',

	'SELECT_USERS'	=> 'Selectaţi utilizatorii ce vor fi restauraţi',

	'USER_RESTORED_SUCCESSFULLY'	=> 'Utilizatorul selectat a fost restaurat cu succes.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Utilizatorii selectaţi au fost restauraţi cu succes.',
));

?>