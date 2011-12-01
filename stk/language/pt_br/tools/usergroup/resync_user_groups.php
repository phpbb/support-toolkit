<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'Re-sincronizar grupos de usuário',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Esta ferramenta foi projetada para verificar se todos os usuários fazem parte do grupo padrão correto <em>(Usuários Registrados, Usuários Registrados da COPPA e Usuários Recentemente Registrados)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Todos os grupos parecem estar atualizados!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Opções de re-sincronização',
	'RUN_BOTH_FINISHED'				=> 'Todos os grupos de usuário foram re-sincronizados com sucesso!',
	'RUN_RNR'						=> 'Re-sincronizar Usuários Recentemente Registrados',
	'RUN_RNR_EXPLAIN'				=> 'Isto atualizará o grupo "Usuários Recentemente Registrados" de modo que ele englobe todos os usuários que se encaixam aos critérios especificados no ACP.',
	'RUN_RNR_FINISHED'				=> 'O grupo de Usuários Recentemente Registrados foi re-sincronizado com sucesso!',
	'RUN_RNR_NOT_FINISHED'			=> 'A re-sincronização do grupo de usuários recentemente registrados está em andamento. Por favor, não interrompa o processo',
	'RUN_RR'						=> 'Re-sincronizando usuário registrados',
	'RUN_RR_EXPLAIN'				=> 'A ferramenta determinou que nem todos os usuários em seu fórum fazer parte do grupo "Usuários Registrados da <em>COPPA</em>". Você deseja realmente re-sincronizar os grupos?<br /><strong>Observação:</strong> Se o seu fórum tem COPPA ativado e um usuário não inseriu a sua data de nascimento, o usuário será colocado no grupo "Usuários Registrados da COPPA"!',
	'RUN_RR_FINISHED'				=> 'Os usuários foram re-sincronizados com sucesso!',

	'SELECT_RUN_GROUP'	=> 'Selecione pelo menos um tipo de grupo que será re-sincronizado.',
));
