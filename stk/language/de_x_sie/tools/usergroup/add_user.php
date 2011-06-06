<?php
/**
*
* @package Support Toolkit - Add User
* @version $Id: add_user.php 544 2011-01-30 16:52:26Z philippk $
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
	'ADD_USER'				=> 'Benutzer hinzufügen',
	'ADD_USER_GROUP'		=> 'Benutzer zu Gruppen hinzufügen',

	'DEFAULT_GROUP'			=> 'Hauptgruppe',
	'DEFAULT_GROUP_EXPLAIN'	=> 'Die Hauptgruppe dieses Benutzers.',

	'GROUP_LEADER'			=> 'Gruppenleiter',
	'GROUP_LEADER_EXPLAIN'	=> 'Benutzer zum Leiter der ausgewählten Gruppen machen.',

	'USER_ADDED'			=> 'Der Benutzer wurde erfolgreich angelegt!',
	'USER_GROUPS'			=> 'Benutzergruppen',
	'USER_GROUPS_EXPLAIN'	=> 'Benutzer zum Mitglied der ausgewählten Gruppen machen.',
));
