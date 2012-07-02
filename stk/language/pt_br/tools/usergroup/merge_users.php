<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Fundir usuários',
	'MERGE_USERS_EXPLAIN'				=> 'Ferramentas para mover contas de usuários para outras contas; as configurações de grupos e usuários serão copiados. O que incluem permissões de usuário, anexos, banimentos, favoritos, rascunhos, resposta em tópicos, acompanhamento em fórum/tópico, entradas no log, votação em enquetes, mensagens, mensagens privadas, notificações, tópicos, advertência, amigos e inimigos.<br /><strong>Você pode inserir o nome de usuário ou a ID do usuário, não ambos.</strong>',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'Você não pode fazer a fusão de um fundador com um usuário que não é fundador.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Você não pode fazer uma fusão de um usuário normal com um bot.',

	'MERGE_USERS_MERGED'		=> 'Fusão de usuários completa.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Remover usuário de origem',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Se estiver marcado o usuário de origem será excluído do fórum.',

	'MERGE_USERS_SAME_USERS'	=> 'O usuário de destino e o de origem devem ser diferentes.',

	'MERGE_USERS_USER_SOURCE_NAME'			=> 'Usuário de origem. (Nome de Usuário)',
	'MERGE_USERS_USER_SOURCE_ID'			=> 'Usuário de origem. (ID do Usuário)',
	'MERGE_USERS_USER_SOURCE_NAME_EXPLAIN'	=> 'Mensagens, mensagens privadas, permissões, advertências, etc. serão movidos deste usuário para o usuário de destino, são copiadas configurações de usuário e membros do grupo.',

	'MERGE_USERS_USER_TARGET_NAME'	=> 'Usuário de destino. (Nome de Usuário)',
	'MERGE_USERS_USER_TARGET_ID'	=> 'Usuário de destino. (ID do Usuário)',

	'NO_SOURCE_USER'		=> 'O usuário de origem selecionado não existe',
	'NO_TARGET_USER'		=> 'O usuário de destino selecionado não existe',

	'BOTH_SOURCE_USER'		=> 'Preencha apenas um campo de origem.',
	'BOTH_TARGET_USER'		=> 'Preencha apenas um campo de destino.',
));
