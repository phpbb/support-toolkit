<?php
/**
*
* @package Support Toolkit - Profile List
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
	'ALL'					=> 'Todos',
	
	'CLICK_TO_DELETE'		=> 'Excluir todos os usuários selecionados clicando neste botão. <em>(Não pode ser desfeito!)</em>',

	'FILTER'				=> 'Filtrar',

	'LIMIT'					=> 'Limitar',

	'ONLY_NON_EMPTY'		=> 'Apenas Não-Vazios',
	'ORDER_BY'				=> 'Ordenar por',

	'PROFILE_LIST'			=> 'Lista de perfis',
	'PROFILE_LIST_EXPLAIN'	=> 'Esta ferramenta exibe as informações do perfil de múltiplos usuários. Ela poderá também lhe auxiliar a identificar contas provenientes de spam.',
	
	'USERS_DELETE'				=> 'Excluir usuários selecionados',
	'USERS_DELETE_CONFIRM'		=> 'Você deseja realmente excluir os usuários selecionados? Excluindo os usuários através dessa ferramenta, <strong>removerá</strong> todas as suas mensagens!',
	'USERS_DELETE_SUCCESSFULL'	=> 'Todos os usuários selecionados foram excluídos com sucesso',
));
