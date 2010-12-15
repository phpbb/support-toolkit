<?php
/**
*
* @package Support Toolkit - Add User
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* Translated By: http://phpbbportugal.com/
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
	'ADD_USER'				=> 'Criar Utilizador',
	'ADD_USER_GROUP'		=> 'Adicionar o Utilizador aos Grupos',

	'DEFAULT_GROUP'			=> 'Grupo Padrão',
	'DEFAULT_GROUP_EXPLAIN'	=> 'Grupo Padrão para este Utilizador.',

	'GROUP_LEADER'			=> 'Lider do Grupo',
	'GROUP_LEADER_EXPLAIN'	=> 'Tornar este Utilizador Líder dos Grupos seleccionados.',

	'USER_ADDED'			=> 'O Utilizador foi criado com sucesso!',
	'USER_GROUPS'			=> 'Grupos do Utilizador',
	'USER_GROUPS_EXPLAIN'	=> 'Tornar este Utilizador membro dos Grupos seleccionados.',
));

?>