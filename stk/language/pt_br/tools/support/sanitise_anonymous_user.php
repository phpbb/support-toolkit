<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @Tradução: Suporte phpBB - http://www.suportephpbb.com.br/
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
	'ANONYMOUS_CLEANED'					=> 'Os dados do perfil do usuário anônimo foram desinfectados com sucesso.',
	'ANONYMOUS_CORRECT'					=> 'O usuário anônimo existe e as configurações estão corretas.',
	'ANONYMOUS_CREATED'					=> 'O usuário anônimo foi re-criado com sucesso.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Não foi possível recriar o usuário anônimo. Por favor, solicite assistência gratuita nos fóruns de suporte do phpBB.com ou do SuportephpBB.org.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'O usuário anônimo foi removido de todos os grupos de acesso com sucesso.',
	'ANONYMOUS_MISSING'					=> 'O usuário anônimo está ausente.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'O usuário anônimo está ausente em seu banco de dados. Este usuário é utilizado para permitir que os visitantes possam navegar em seus fóruns. Você deseja criar um novo agora?',
	'ANONYMOUS_WRONG_DATA'				=> 'Os dados do perfil do usuário anônimo estão incorretos.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Os dados do perfil do usuário anônimo estão parcialmente incorretos. Você deseja reparar os erros?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'O usuário anônimo pertence, indevidamente, à vários grupos de usuários.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'O usuário anônimo pertence, indevidamente, à vários grupos de usuários. Você gostaria de excluir o usuário anonimo de todos os grupos de usuários, menos do grupo "visitante"?',

	'REDIRECT_NEXT_STEP'				=> 'Você está sendo redirecionado para o próximo passo.',

	'SANITISE_ANONYMOUS_USER'			=> 'Desinfectar usuário anônimo',
));
