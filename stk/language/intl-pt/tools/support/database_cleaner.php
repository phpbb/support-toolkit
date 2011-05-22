<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @version $Id$
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
	'BOARD_DISABLE_REASON'			=> 'O Fórum está desativado para manutenção da Base de Dados. Por favor, volte em breve!',
	'BOARD_DISABLE_SUCCESS'			=> 'O Fórum foi desativado com sucesso',

	'COLUMNS'						=> 'Colunas',
	'CONFIG_SETTINGS'				=> 'Configuração de definições',
	'CONFIG_UPDATE_SUCCESS'			=> 'As definições de configuração foram atualizadas com sucesso!',
	'CONTINUE'						=> 'Continuar',

	'DATABASE_CLEANER'				=> 'Limpeza da Base de Dados',
	'DATABASE_CLEANER_EXTRA'		=> 'Outros elementos extra foram adicionados por Modificações.  <strong>Selecione a caixa de verificação para remover</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Os campos com fundo vermelho como este são itens em falta que devem ser acrescentados. <strong>Selecione a caixa de verificação para adicionar</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Todas as tarefas de limpeza da Base de dados terminaram com sucesso<br /><br />Faça uma nova cópia de segurança da Base de Dados.',
	'DATABASE_CLEANER_WARNING'		=> 'Esta ferramenta NÃO TEM GARANTIA e a sua utilização aconselha uma Cópia de Segurança da Base de Dados, para usar em caso de fracasso.<br /><br />Antes de continuar, certifique-se que tem uma cópia de segurança da Base de Dados!',
	'DATABASE_CLEANER_WELCOME'		=> 'Bem vindo à ferramenta de limpeza da Base de dados<br /><br />Esta ferramenta foi concebida para remover Colunas, Linhas e Tabelas não presentes na instalação padrão do phpBB3, e adicionar os elementos em falta de dados que podem ser necessários.<br /><br />Quando estiver pronto para continuar clique no botão <strong>Continuar</strong> para começar a usar esta ferramenta, (o Fórum será desativado durante o processo).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'As colunas da Base de Dados foram atualizadas com sucesso!',
	'DATABASE_TABLES'				=> 'Tabelas da Base de Dados',
	'DATABASE_TABLES_SUCCESS'		=> 'As Tabelas da Base de dados foram atualizadas com sucesso!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'As tarefas do sistema phpBB, foram restauradas com sucesso!',
	'DATABASE_ROLES_SUCCESS'		=> 'As tarefas foram restauradas com sucesso!',
	'DATAFILE_NOT_FOUND'			=> 'O Support Toolkit não localizou o ficheiro de dados necessários a sua versão do phpBB!',

	'EMPTY_PREFIX'					=> 'Sem prefixo na Base de Dados',
	'EMPTY_PREFIX_CONFIRM'			=> 'A limpeza da Base de Dados irá fazer alterações às tabelas na sua Base de Dados, mas como não está a usar uma prefixo nas tabelas, pode afetar tabelas que não sejam do phpBB. Tem certeza que deseja continuar?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'A limpeza da Base de Dados verificou que não tem definido um prefixo de tabela para as tabelas phpBB da Base de Dados. Por isso a limpeza de Base de Dados irá verificar <strong>todas</strong> as tabelas da Base de Dados. Tenha especial atenção ao processo e exclua todas as tabelas que não pertençam ao phpBB da seleção. Se não o fizer, irá danificar as tabelas da Base de Dados que não fazem parte do phpBB.<br />Se você não tem certeza sobre como proceder, procure ajuda no <a href="http://www.phpbb.com/community/viewforum.php?f=46">phpBB Support Forums</a>.',
	'ERROR'							=> 'Erro',
	'EXTRA'							=> 'Extra',
	'EXTENSION_GROUPS_SUCCESS'		=> 'Os grupos de extensões foram repostos com sucesso',
	'EXTENSIONS_SUCCESS'			=> 'As extensões foram repostas com sucesso',

	'FINAL_STEP'					=> 'Etapa final<br /><br />O fórum será reativado e a cache eliminada.',

	'INSTRUCTIONS'					=> 'Instruções',

	'MISSING'						=> 'Perdido',
	'MODULE_UPDATE_SUCCESS'			=> 'Os módulos foram atualizados com sucesso!',

	'NO_BOT_GROUP'					=> 'Não foi possível redefinir os Bots. Falta o Grupo de Bots.',

	'PERMISSION_SETTINGS'			=> 'Opções de Permissões',
	'PERMISSION_UPDATE_SUCCESS'		=> 'As configurações das permissões foram atualizados com sucesso!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'A sua versão do phpBB3 não é suportada (ou alguns ficheiros do Suporte Toolkit estão em falta).<br />O phpBB 3.0.0+ deveria ser suportado, mas há um tempo entre uma nova versão do phpBB ser lançada e a atualização desta ferramenta.',

	'QUIT'							=> 'Sair',

	'RESET_BOTS'					=> 'Desativar Bots',
	'RESET_BOTS_EXPLAIN'			=> 'Gostaria de repor os bots padrão do phpBB3? Todos os bots extra existentes serão removidos e substituídos pelo padrão definido.',
	'RESET_BOTS_SKIP'				=> 'A redefinição do bot foi ignorada',
	'RESET_BOT_SUCCESS'				=> 'Os bots foram redefinidos com sucesso!',
	'RESET_MODULES'					=> 'Desativa Módulos',
	'RESET_MODULES_EXPLAIN'			=> 'Gostaria de repor os módulos para o padrão phpBB3? Todos os módulos extra existentes serão removidos e serão substituído pelo padrão phpBB3.',
	'RESET_MODULES_SKIP'			=> 'A redefinição do módulo foi ignorada',
	'RESET_MODULE_SUCCESS'			=> 'Os Módulos foram redefinidos com sucesso',
	'RESET_REPORT_REASONS'			=> 'Restabelecer razões de denúncias',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Pretende restabelecer as razões de denúncias predefinidas? Isto irá apagar todas as razões de denúncias adicionadas!',
	'RESET_REPORT_REASONS_SKIP'		=> 'As razões de denúncias não foram restabelecidas',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'As razões de denúncias foram restabelecidas com sucesso!',
	'RESET_ROLE_DATA'				=> 'Restabelecer dados dos tarefas',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Esta etapa irá restabelecer os tarefas do sistema phpBB de volta ao seu estado original, é altamente recomendável correr isto se fez alterações na etapa anterior.',
	'ROWS'							=> 'Linhas',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'					=> 'Tabelas sem alterações',
		'columns'					=> 'Colunas sem alterações',
		'config'					=> 'Configurações sem alterações',
		'extension_groups'			=> 'Grupos de extensões sem alterações',
		'extensions'				=> 'Extensões sem alterações',
		'permissions'				=> 'Permissões sem alterações',
		'groups'					=> 'Grupos sem alterações',
		'roles'						=> 'Tarefas sem alterações',
		'final_step'				=> 'Etapa final',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'					=> 'As tabelas da Base de Dados não foram alteradas',
		'columns'					=> 'As colunas da Base de Dados não foram alteradas',
		'config'					=> 'A tabela das configurações não tem novos valores ou valores em falta',
		'extension_groups'			=> 'A tabela de grupos de extensões não tem novos valores ou valores em falta',
		'extensions'				=> 'As extensões predefinidas não foram alteradas',
		'permissions'				=> 'Não houve alterações nas tabelas de permissão',
		'groups'					=> 'Não houve alterações no sistema de grupos phpBB',
		'roles'						=> 'Não foram adicionadas ou removidas tarefas',
		'final_step'				=> 'Esta última etapa vai limpar a cache e reativar o fórum.',
	),
	'SUCCESS'						=> 'Sucesso',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Os Sistema de Grupos foi redefinido com sucesso',

	'TYPE'							=> 'Tipo',

	'UNSTABLE_DEBUG_ONLY'			=> 'A limpeza da Base de Dados só pode ser executada em versões phpBB instáveis <em>(dev, a, b, RC)</em>, quando o "DEBUG" é ativado no ficheiro config.php do phpBB',
));

?>