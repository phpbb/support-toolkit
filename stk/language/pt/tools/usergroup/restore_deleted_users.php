<?php
/**
*
* @package Support Toolkit - Restore Delted Users
* @version $Id: restore_deleted_users.php 456 2010-06-24 11:29:29Z erikfrerejean $
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
	'NO_DELETED_USERS'							=> 'Não há utilizadores apagados que possam ser recuperados',
	'NO_USER_SELECTED'							=> 'Não há utilizadores seleccionados!',

	'RESTORE_DELETED_USERS'						=> 'Recuperar utilizadores eliminados',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Recuperar utilizadores eliminados :: Conflito',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Esta ferramenta permite recuperar os utilizadores eliminados cujas mensagens foram mantidas no Fórum. <br /> A esses utilizadores será atribuída uma senha aleatória que deve redefinir manualmente após o funcionamento desta ferramenta. Esta ferramenta não fornece uma lista de senhas geradas por utilizador! <br /> <br /> Durante a última execução desta ferramenta foram encontrados alguns nomes que já existem no Fórum. Por favor, indique um novo nome para esses utilizadores.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Esta ferramenta permite recuperar os utilizadores eliminados cujas mensagens foram mantidas no Fórum <br /> A esses utilizadores será atribuída uma senha aleatória que deve redefinir manualmente após o funcionamento desta ferramenta. Esta ferramenta não fornece uma lista de senhas geradas por utilizador!',

	'SELECT_USERS'								=> 'Seleccionar utilizadores para recuperar',

	'USER_RESTORED_SUCCESSFULLY'				=> 'O utilizador seleccionado foi recuperado com sucesso.',
	'USERS_RESTORED_SUCCESSFULLY'				=> 'Os utilizadors seleccionados foram recuperados com sucesso.',
));

?>