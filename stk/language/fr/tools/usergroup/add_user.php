<?php
/**
*
* @package Support Toolkit - Add User
* @version 1.0.1-dev
* @author Maël Soucaze (Maël Soucaze) <maelsoucaze@phpbb.com> http://mael.soucaze.com/
* @copyright (c) 2009 phpBB Group, 2009 Maël Soucaze
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
	'ADD_USER'				=> 'Ajouter un utilisateur',
	'ADD_USER_GROUP'		=> 'Ajouter un utilisateur aux groupes',

	'DEFAULT_GROUP'			=> 'Groupe par défaut',
	'DEFAULT_GROUP_EXPLAIN'	=> 'Le groupe par défaut de cet utilisateur.',

	'GROUP_LEADER'			=> 'Responsable du groupe',
	'GROUP_LEADER_EXPLAIN'	=> 'Faire de cet utilisateur le responsable des groupes sélectionnés.',

	'USER_ADDED'			=> 'L’utilisateur a été créé avec succès !',
	'USER_GROUPS'			=> 'Groupes d’utilisateurs',
	'USER_GROUPS_EXPLAIN'	=> 'Faire de cet utilisateur un membre des groupes sélectionnés.',
));