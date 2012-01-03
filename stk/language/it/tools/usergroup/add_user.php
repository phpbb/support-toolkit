<?php
/**
*
* @package Support Toolkit - Add User
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2011 phpBBItalia.net - translated on 2011-10-01
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
	'ADD_USER'				=> 'Aggiungi utente',
	'ADD_USER_GROUP'		=> 'Aggiungi utente a gruppi',

	'DEFAULT_GROUP'			=> 'Gruppo predefinito',
	'DEFAULT_GROUP_EXPLAIN'	=> 'Gruppo predefinito per questo utente.',

	'GROUP_LEADER'			=> 'Leader gruppo',
	'GROUP_LEADER_EXPLAIN'	=> 'Rendi questo utente leader del gruppo dei gruppi selezionati.',

	'USER_ADDED'			=> 'L’utente è stato creato con successo!',
	'USER_GROUPS'			=> 'Gruppi utente',
	'USER_GROUPS_EXPLAIN'	=> 'Rendi questo utente un membro dei gruppi selezionati.',
));
