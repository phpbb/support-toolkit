<?php
/**
*
* @package Support Toolkit - Database Cleaner
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
	'BOARD_DISABLE_REASON'			=> 'O fórum está desabilitado no momento para manutenção no banco de dados. Tente mais tarde!',
	'BOARD_DISABLE_SUCCESS'			=> 'O painel foi desativado com sucesso!',

	'COLUMNS'						=> 'Colunas',
	'CONFIG_SETTINGS'				=> 'Configurações',
	'CONFIG_UPDATE_SUCCESS'			=> 'As configurações foram atualizadas com sucesso!',
	'CONTINUE'						=> 'Continuar',

	'DATABASE_CLEANER'				=> 'Limpeza do banco de dados',
	'DATABASE_CLEANER_EXTRA'		=> 'Quaisquer outros são itens extras adicionados por modificações. <strong>Se a check box for selecionada estes serão removido</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Quaisquer campos com um fundo vermelho como este são itens ausentes os quais deveriam ser adicionados. <strong>Se a check box for selecionada estes serão adicionados</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'A limpeza do banco de dados finalizou todas as suas etapas com sucesso!<br /><br />Por favor, faça uma cópia de seu banco de dados novamente.',
	'DATABASE_CLEANER_WARNING'		=> 'Esta ferramenta possui NENHUMA GARANTIA de segurança e os seus usuários devem fazer uma cópia de seu banco de dados inteiro em caso de falhas.<br /><br />Antes de prosseguir, certifique-se da existência de uma cópia do seu banco de dados!',
	'DATABASE_CLEANER_WELCOME'		=> 'Bem-vindo à ferramenta de Limpeza do Banco de Dados!<br /><br />Esta ferramenta foi designada para remoção de colunas extras, linhas e tabelas do banco de dados não presentes na instalação padrão do phpBB3, e para adição de elementos ausentes que sejam necessários.<br /><br />Quando você estiver pronto para prosseguir, clique no botão a seguir para iniciar a limpeza no banco de dados (note que o seu painel estará desativado até que o processo seja concluído).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'As colunas do banco de dados foram atualizadas com sucesso!',
	'DATABASE_TABLES'				=> 'Tabelas do banco de dados',
	'DATABASE_TABLES_SUCCESS'		=> 'As tabelas do banco de dados forma atualizadas com sucesso!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'O sitema de tarefas do phpBB foi restaurado com sucesso!',
	'DATABASE_ROLES_SUCCESS'		=> 'As tarefas foram atualizadas com sucesso!',
	'DATAFILE_NOT_FOUND'			=> 'O Support Toolkit não encontrou o arquivo de dados requerido para a sua versão do phpBB!',

	'EMPTY_PREFIX'					=> 'Nenhum prefixo do banco de dados',
	'EMPTY_PREFIX_CONFIRM'			=> 'A limpeza do banco de dados está prestes a alterar as tabelas em seu banco de dados, mas como você está usando uma prefixo de tabela vazio isto poderá afetar as não-tabelas do phpBB. Você tem certeza que deseja continuar?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'A limpeza do banco de dados determinou que você não definiu um prefixo de tabela para as tabelas do banco de dados do seu phpBB. Devido a isso, a limpeza do banco de dados verificará <strong>todas</strong> as tabelas no banco de dados. Tenha cuidado extra ao prosseguir e se certifique que exclui quaisquer tabelas não pertecente ao phpBB da seleção. Não fazer isso danificará as tabelas do banco de dados que não fazem parte do phpBB.<br /> Se você não certeza de como proceder, procure ajuda no <a href="http://www.phpbb.com/community/viewforum.php?f=46">Fórum de Suporte do phpBB.com</a>.',
	'ERROR'							=> 'Erro',
	'EXTRA'							=> 'Extra',
	'EXTENSION_GROUPS_SUCCESS'		=> 'A extensão de grupos foi resetada com sucesso',
	'EXTENSIONS_SUCCESS'			=> 'As extensões foram resetadas com sucesso',

	'FINAL_STEP'					=> 'Esta é a etapa final.<br /><br />Nós iremos agora reativar e limpar o cache de seu painel.',

	'INSTRUCTIONS'					=> 'Instruções',

	'MISSING'						=> 'Ausente',
	'MODULE_UPDATE_SUCCESS'			=> 'Os módulos foram atualizados com sucesso!',

	'NO_BOT_GROUP'					=> 'Não foi possível resetar a sua lista de bots, pois o seu respectivo grupo encontra-se ausente.',

	'PERMISSION_SETTINGS'			=> 'Opções de permissão',
	'PERMISSION_UPDATE_SUCCESS'		=> 'As configurações de permissão foram atualizadas com sucesso!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'A sua versão do phpBB3 não é suportada (ou alguns arquivos do Support Toolkit estão ausentes).<br />Versões superiores ao phpBB 3.0.0 deverão ser suportadas, mas pode-se levar algum tempo entre o lançamento de uma nova versão do phpBB3 e a atualização desta ferramenta para o suporte desta nova versão.',

	'QUIT'							=> 'Sair',

	'RESET_BOTS'					=> 'Resetar bots',
	'RESET_BOTS_EXPLAIN'			=> 'Você deseja realmente resetar a sua lista de bots para a lista de bots padrão do phpBB3? Todos os bots existentes serão removidos e substituídos pelos da lista convencional.',
	'RESET_BOTS_SKIP'				=> 'O reset do bot foi ignorado',
	'RESET_BOT_SUCCESS'				=> 'Os bots foram resetados com sucesso!',
	'RESET_MODULES'					=> 'Resetar módulos',
	'RESET_MODULES_EXPLAIN'			=> 'Você deseja realmente resetar a sua lista de módulos para a lista de módulos padrão do phpBB3? Todos os módulos existentes serão removidos e substituídos pelos da lista convencional.',
	'RESET_MODULES_SKIP'			=> 'O reset do módulo foi ignorado',
	'RESET_MODULE_SUCCESS'			=> 'Os módulos foram resetados com sucesso!',
	'RESET_REPORT_REASONS'			=> 'Relatório de motivos para resetar',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Você deseja redefinir o relatório de motivos para o padrão? Isto removerá todos os relatórios de motivos adicionados!',
	'RESET_REPORT_REASONS_SKIP'		=> 'O relatório de movitos não foi resetado',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'O relatório de movitos foi resetado com sucesso!',
	'RESET_ROLE_DATA'				=> 'Resetar dados de tarefas',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Essa etapa resetará o sitema de tarefas do phpBB ao seu estado original, é altamente recomendado que execute isso se você fez mudanças na etapa anterior.',
	'ROLE_SETTINGS'					=> 'Configurações de Tarefas',
	'ROWS'							=> 'Linhas',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'Tabelas inalteradas',
		'columns'			=> 'Colunas inalteradas',
		'config'			=> 'Config inalteradas',
		'extension_groups'	=> 'Extensão de grupos inalteradas',
		'extensions'		=> 'Extensões inalteradas',
		'permissions'		=> 'Permissões inalteradas',
		'groups'			=> 'Grupos inalterados',
		'roles'				=> 'Tarefas inalterados',
		'final_step'		=> 'Etapa final',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'As tabelas do banco de dados não foram alteradas',
		'columns'			=> 'As colunas do banco de dados não foram alteradas',
		'config'			=> 'A tabela de configuração não tem nenhum novo/valor ausente',
		'extension_groups'	=> 'A tabela de extensão de grupos não tem nenhum novo/valor ausente',
		'extensions'		=> 'As extensões padrão não foram alteradas',
		'permissions'		=> 'Não foram feitas mudanças na tabela de permissões',
		'groups'			=> 'Não foram feitas mudanças no sistema de grupos do phpBB',
		'roles'				=> 'Nenhuma tarefa adicionada ou removida',
		'final_step'		=> 'Esta última etapa irá limpar o cache e reativar seu fórum.',
	),
	'SUCCESS'						=> 'Sucesso',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'O sistema de grupos foi resetado com sucesso',

	'TYPE'							=> 'Tipo',

	'UNSTABLE_DEBUG_ONLY'			=> 'A limpeza na base de dados só pode ser executadas <em>(dev, a, b, RC)</em>, quando "DEBUG" estiver ativado no arquivo config do phpBB.',
));
