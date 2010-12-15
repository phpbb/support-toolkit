<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'O Perfil do Utilizador anónimo foi limpo com sucesso.',
	'ANONYMOUS_CORRECT'					=> 'O Utilizador anónimo existe e todos os seus dados estão configurados correctamente!',
	'ANONYMOUS_CREATED'					=> 'O Utilizador anónimo foi recriado com sucesso.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Não foi possível recriar o Utilizador anónimo. Procure mais ajuda no fórum de suporte do phpBB.com.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'O Utilizador anónimo foi removido do acesso a todos os grupos',
	'ANONYMOUS_MISSING'					=> 'O Utilizador anónimo está em falta.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'O Utilizador anónimo está em falta na sua Base de Dados. Este utilizador é usado para permitir a entrada de Visitantes. Deseja criar um novo?',
	'ANONYMOUS_WRONG_DATA'				=> 'A data de perfil do Utilizador anónimo está errada.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'O perfil do Utilizador anónimo está parcialmente incorrecto. Deseja repará-lo?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'O Utilizador anónimo pertence a vários grupos.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'O Utilizador anónimo pertence a vários grupos, pretende removê-lo de todos excepto do grupo dos visitantes?',

	'REDIRECT_NEXT_STEP'				=> 'Está a ser redireccionado para a próxima etapa.',

	'SANITISE_ANONYMOUS_USER'			=> 'Limpar Utilizador anónimo',
));

?>