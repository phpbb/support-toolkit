<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @Traduzido por: http://phpbbportugal.com - segundo as normas do Acordo Ortográfico
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
	'RESYNC_USER_GROUPS'			=> 'Sincronizar grupos de utilizadores',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Esta ferramenta está projetada para verificar se todos os utilizadores estão nos grupos padrão corretos <em>(Utilizadores registados, Utilizadores COPPA Registados e Utilizadores Registados Recentemente)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Todos os grupos parecem estar atualizados!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Opções de sincronização',
	'RUN_BOTH_FINISHED'				=> 'Todos os grupos de utilizadores foram sincronizados com sucesso!',
	'RUN_RNR'						=> 'Sincronizar Utilizadores Registados Recentemente',
	'RUN_RNR_EXPLAIN'				=> 'Esta ação atualiza o grupo "Utilizadores Registados Recentemente", para que contenha todos os utilizadores que se enquadram nos critérios especificados no ACP.',
	'RUN_RNR_FINISHED'				=> 'O grupo Utilizadores Registados Recentemente foi sincronizado com sucesso!',
	'RUN_RNR_NOT_FINISHED'			=> 'O grupo Utilizadores Registados Recentemente está a ser sincronizado. Não interrompa este processo',
	'RUN_RR'						=> 'Sincronizar utilizadores registados',
	'RUN_RR_EXPLAIN'				=> 'Esta ferramenta detetou que nem todos os utilizadores fazem parte dos "Utilizadores <em>(COPPA)</em> Registados". Pretende sincronizar este grupo?<br /><strong>Nota:</strong> Se o seu fórum tem o COPPA ativado e um utilizador não tiver colocado a data de nascimento, esse utilizador será colocado no grupo "Utilizadores COPPA Registados"!',
	'RUN_RR_FINISHED'				=> 'Os utilizadores foram sincronizados com sucesso!',

	'SELECT_RUN_GROUP'				=> 'Selecione pelo menos um tipo de grupo para ser sincronizado.',
));
