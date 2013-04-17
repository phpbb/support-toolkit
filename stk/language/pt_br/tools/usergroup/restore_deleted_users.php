<?php
/**
*
* @package Support Toolkit - Restore Delted Users
* @version $Id$
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
	'DAMAGED_POSTS'			=> 'Mensagens danificadas',
	'DAMAGED_POSTS_EXPLAIN'	=> 'As seguintes IDs das mensagens contém informação de usuário que estão muito danificado para restaurar. Por favor visite o <a href="https://www.phpbb.com/community/viewforum.php?f=46">fórum de suporte</a> ou o <a href="http://www.suportephpbb.com.br/">Suporte phpBB</a> para obter ajuda para resolver este problema.',

	'NO_DELETED_USERS'	=> 'Não há usuários excluídos que possam ser restaurados',
	'NO_USER_SELECTED'	=> 'Nenhum usuário selecionado!',

	'RESTORE_DELETED_USERS'						=> 'Restaurar Usuários Excluídos',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Restaurar Usuários Excluídos :: Conflito',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Esta ferramenta permite que você restaure os usuários que foram excluídos do seu fórum mas ainda tem as mensagens dos "visitantes" no fórum.<br />Esse usuários receberão uma senha aleatória que depois deve ser redefinida manualmente depois que esta ferramenta for executada.; esta ferramenta <b>não</b> fornece uma lista de senhas geradas por usuários.<br /><br />Durante a última execução desta ferramenta foram encontrados alguns nomes que já existem neste fórum. Por favor, forneça um novo nome para esses usuários.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Esta ferramenta permite que você restaure os usuários que foram excluídos do seu fórum mas ainda tem as mensagens dos "visitantes" no fórum.<br />Esse usuários receberão uma senha aleatória que depois deve ser redefinida manualmente depois que esta ferramenta for executada.; esta ferramenta <b>não</b> fornece uma lista de senhas geradas por usuários.',

	'SELECT_USERS'	=> 'Selecione os usuários para serem restaurados',

	'USER_RESTORED_SUCCESSFULLY'	=> 'O usuário selecionado foi restaurado com sucesso.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Os usuários selecionados foram restaurados com sucesso.',
));
