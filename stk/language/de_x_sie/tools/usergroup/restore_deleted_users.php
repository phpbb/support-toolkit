<?php
/**
*
* @package Support Toolkit - Restore Delted Users
* @version $Id: restore_deleted_users.php 544 2011-01-30 16:52:26Z philippk $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Deutsche Übersetzung durch die Übersetzer-Gruppe von phpBB.de:
* siehe docs/AUTHORS und http://www.phpbb.de/go/ubersetzerteam
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
	'NO_DELETED_USERS'	=> 'Es sind keine gelöschten Benutzer vorhanden, die wiederhergestellt werden könnten.',
	'NO_USER_SELECTED'	=> 'Es wurden keine Benutzer ausgewählt!',

	'RESTORE_DELETED_USERS'						=> 'Gelöschte Benutzer wiederherstellen',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Gelöschte Benutzer wiederherstellen :: Konflikte',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Dieses Tool ermöglicht es, Benutzer wiederherzustellen, die gelöscht wurden, aber von denen noch Beiträge als Gast existieren.<br />Diesen Benutzern wird ein zufälliges Passwort zugeordnet, das Sie manuell zurücksetzen müssen, nachdem das Tool ausgeführt wurde. Das Tool stellt <strong>keine</strong> Liste dieser generierten Passwörter zur Verfügung!<br /><br />Beim letzten Durchlauf hat das Tool Benutzernamen gefunden, die bereits vergeben sind. Bitte legen Sie für diese Benutzer einen neuen Benutzernamen fest.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Dieses Tool ermöglicht es, Benutzer wiederherzustellen, die gelöscht wurden, aber von denen noch Beiträge als Gast existieren.<br />Diesen Benutzern wird ein zufälliges Passwort zugeordnet, das Sie manuell zurücksetzen müssen, nachdem das Tool ausgeführt wurde. Das Tool stellt <strong>keine</strong> Liste dieser generierten Passwörter zur Verfügung!',

	'SELECT_USERS'	=> 'Benutzer zum Wiederherstellen auswählen',

	'USER_RESTORED_SUCCESSFULLY'	=> 'Der ausgewählte Benutzer wurde erfolgreich wiederhergestellt.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Die ausgewählten Benutzer wurden erfolgreich wiederhergestellt.',
));
