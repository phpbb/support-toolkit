<?php
/**
*
* @package Support Toolkit - Orphaned posts/topics
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
	'AUTHOR'					=> 'Autor',
	'FORUM_NAME'				=> 'Nome do Fórum',
	'NEW_TOPIC_ID'				=> 'ID do Novo Tópico',
	'POST_ID'					=> 'ID da mensagem',
	'TOPIC_ID'					=> 'ID do tópico',

	'DELETE_EMPTY_TOPICS'		=> 'Excluir todos os tópicos selecionados clicando neste botão. (Não pode ser desfeito!)',
	'EMPTY_TOPICS'				=> 'Tópicos Vazios',
	'EMPTY_TOPICS_EXPLAIN'		=> 'Estes são tópicos que não tem mensagens associados a eles.',
	'NO_EMPTY_TOPICS'			=> 'Tópicos vazios não encontrados',
	'NO_TOPICS_SELECTED'		=> 'Nenhum tópico selecionado',

	'ORPHANED_POSTS'			=> 'Mensagens Órfãs',
	'ORPHANED_POSTS_EXPLAIN'	=> 'Estas são mensagens que não tem nenhum tópico associado a elas. Especifique o ID de um novo tópico para ter a mensagem ligada para o tópico.',
	'NO_ORPHANED_POSTS'			=> 'Mensagens órfãs não encontradas',
	'NO_TOPIC_IDS'				=> 'Nenhum ID de tópico fornecido',
	'NONEXISTENT_TOPIC_IDS'		=> 'Os IDs dos seguinte tópicos alvo não existem: %s.<br />Por favor verifique os IDs de tópicos fornecidos.',
	'REASSIGN'					=> 'Reatribuir',

	'DELETE_SHADOWS'			=> 'Excluir todos os tópicos fantasma selecionados clicando neste botão. (Não pode ser desfeito!)',
	'ORPHANED_SHADOWS'			=> 'Tópicos Fantasma Orfãos',
	'ORPHANED_SHADOWS_EXPLAIN'	=> 'Estes são tópicos fantasmas cujo o tópico alvo não existe mais.',
	'NO_ORPHANED_SHADOWS'		=> 'Tópicos fantasma orfãos não encontrados',

	'POSTS_DELETED'				=> '%d mensagens excluídas',
	'POSTS_REASSIGNED'			=> '%d mensagens reatribuídas',
	'TOPICS_DELETED'			=> '%d tópicos excluídos',
));
