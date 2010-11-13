<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id: merge_users.php 489 2010-08-13 07:40:58Z toonarmy $
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Fundir utilizadores',
	'MERGE_USERS_EXPLAIN'				=> 'Ferramenta para fundir contas activas de utilizadores. São copiadas as definições de utilizador e de Grupo. São copiadas as permissões de utilizador, acessórios, bans, marcadores de páginas, rascunhos, acompanhamento de Fóruns e Tópicos, o fórum / tópico assistindo, registos de log, votos em votações, mensagens, mensagens privadas, relatórios, temas, avisos e amigos e inimigos.',

	'MERGE_USERS_BOTH_FOUNDERS'			=> 'Não pode fundir um Fundador com um utilizador normal.',
	'MERGE_USERS_BOTH_IGNORE'			=> 'Não pode fundir um bot com um utilizador normal.',

	'MERGE_USERS_MERGED'				=> 'Utilizadores fundidos com sucesso',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Remover o utilizador fonte',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Se estiver assinalada esta ferramenta irá eliminar o utilizador fonte do fórum',

	'MERGE_USERS_SAME_USERS'			=> 'Tem que definir o utilizador Fonte e Alvo',

	'MERGE_USERS_USER_SOURCE'			=> 'Utilizador fonte',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Mensagens, mensagens privadas, permissões, avisos, etc, serão movidas a partir deste utilizador para o utilizador alvo, membros do grupo e as configurações de utilizador são copiados.',

	'MERGE_USERS_USER_TARGET'			=> 'Utilizador alvo',
));

?>