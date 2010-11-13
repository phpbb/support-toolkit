<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @version $Id: database_cleaner.php 415 2010-06-09 00:44:26Z iwisdom $
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
	'BOARD_DISABLE_REASON'			=> 'O Fórum está desactivado para manutenção da Base de Dados. Por favor, volte em breve!',
	'BOARD_DISABLE_SUCCESS'			=> 'O Fórum foi desactivado com sucesso',

	'COLUMNS'						=> 'Colunas',
	'CONFIG_SETTINGS'				=> 'Configuração de definições',
	'CONFIG_UPDATE_SUCCESS'			=> 'As definições de configuração foram actualizadas com sucesso!',
	'CONTINUE'						=> 'Continuar',

	'DATABASE_CLEANER'				=> 'Limpeza da Base de Dados',
	'DATABASE_CLEANER_EXTRA'		=> 'Outros elementos extra foram adicionados por Modificações.  <strong>Seleccione a caixa de verificação para remover</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Os campos com fundo vermelho como este são itens em falta que devem ser acrescentados. <strong>Seleccione a caixa de verificação para adicionar</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Todas as tarefas de limpeza da Base de dados terminaram com sucesso<br /><br />Faça uma nova cópia de segurança da Base de Dados.',
	'DATABASE_CLEANER_WARNING'		=> 'Esta ferramenta NÃO TEM GARANTIA e a sua utilização aconselha uma Cópia de Segurança da Base de Dados, para usar em caso de fracasso.<br /><br />Antes de continuar, certifique-se que tem uma cópia de segurança da Base de Dados!',
	'DATABASE_CLEANER_WELCOME'		=> 'Bem vindo à ferramenta de limpeza da Base de dados<br /><br />Esta ferramenta foi concebida para remover Colunas, Linhas e Tabelas não presentes na instalação padrão do phpBB3, e adicionar os elementos em falta de dados que podem ser necessários.<br /><br />Quando estiver pronto para continuar clique no botão <strong>Continuar</strong> para começar a usar esta ferramenta, (o Fórum será desactivado durante o processo).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'As colunas da Base de Dados foram actualizadas com sucesso!',
	'DATABASE_TABLES'				=> 'Tabelas da Base de Dados',
	'DATABASE_TABLES_SUCCESS'		=> 'As Tabelas da Base de dados foram actualizadas com sucesso!',
	'DATAFILE_NOT_FOUND'			=> 'O Support Toolkit não localizou o arquivo de dados necessários aa sua versão do phpBB!',

	'ERROR'							=> 'Erro',
	'EXTRA'							=> 'Extra',

	'FINAL_STEP'					=> 'Etapa final<br /><br />O fórum será reactivado e a cache eliminada.',

	'INSTRUCTIONS'					=> 'Instruções',

	'MISSING'						=> 'Perdido',
	'MODULE_UPDATE_SUCCESS'			=> 'Os módulos foram actualizados com sucesso!',

	'NO_BOT_GROUP'					=> 'Não foi possível redefinir os Bots. Falta o Grupo de Bots.',

	'PERMISSION_SETTINGS'			=> 'Opções de Permissões',
	'PERMISSION_UPDATE_SUCCESS'		=> 'As configurações das permissões foram actualizados com sucesso!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'A sua versão do phpBB3 não é suportada (ou alguns arquivos do Suporte Toolkit estão em falta).<br />O phpBB 3.0.0+ deveria ser suportado, mas há um tempo entre uma nova versão do phpBB ser lançada e a actualização desta ferramenta.',

	'QUIT'							=> 'Sair',

	'RESET_BOTS'					=> 'Desactivar Bots',
	'RESET_BOTS_EXPLAIN'			=> 'Gostaria de repor os bots padrão do phpBB3? Todos os bots extra existentes serão removidos e substituídos pelo padrão definido.',
	'RESET_BOTS_SKIP'				=> 'A redefinição do bot foi ignorada',
	'RESET_BOT_SUCCESS'				=> 'Os bots foram redefinidos com sucesso!',
	'RESET_MODULES'					=> 'Desactiva Módulos',
	'RESET_MODULES_EXPLAIN'			=> 'Gostaria de repor os módulos para o padrão phpBB3? Todos os módulos extra existentes serão removidos e serão substituído pelo padrão phpBB3.',
	'RESET_MODULES_SKIP'			=> 'A redefinição do módulo foi ignorada',
	'RESET_MODULE_SUCCESS'			=> 'Os Módulos foram redefinidos com sucesso',
	'ROWS'							=> 'Linhas',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		1	=> 'As tabelas não foram alteradas',
		2	=> 'As Colunas não foram alteradas',
		3	=> 'As Configurações não foram alteradas',
		4	=> 'As Permissões não foram alteradas',
		5	=> 'Os Grupos não foram alterados',
		8	=> 'Etapa final',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		1	=> 'As tabelas da Base de Dados não foram alteradas',
		2	=> 'As Colunas da Base de Dados não foram alteradas',
		3	=> 'A tabela de configuração não tem valores perdidos novos',
		4	=> 'Não há alterações nas Tabelas de Permissão',
		5	=> 'Não há alterações no Sistema de Grupos do phpBB',
		8	=> 'Esta última etapa limpa a Cache e reactiva o Fórum.',
	),
	'SUCCESS'						=> 'Sucesso',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Os Sistema de Grupos foi redefinido com sucesso',

	'TYPE'							=> 'Tipo',

	'UNSTABLE_DEBUG_ONLY'			=> 'O database cleaner só pode ser executado em versões phpBB instáveis <em>(dev, a, b, RC)</em>, quando o "DEBUG" é activado no ficheiro config.php do phpBB',
));

?>