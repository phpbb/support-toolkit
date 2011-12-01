<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'					=> 'MySQL Upgrader',
	'MYSQL_UPGRADER_BACKUP'				=> 'Esta ferramenta é pontecialmente perigosa; antes de prosseguir, certifique-se da existência de uma cópia do seu banco de dados!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Esta ferramenta foi projetada para resolver determinados problemas que são causados quando o banco de dados MySQL usado na sua instalação do phpBB é atualizado. Esta atualização fará com que o esquema do banco de dados torne-se incompatível com a nova versão. <em>Veja também o artigo na KB do phpBB.com “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>”.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Baixar',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Marcando esta opção, o MySQL Upgrader gerará os comandos e exibirá o resultado pra você, de onde poderá baixar o arquivo com o resultado.',
	'MYSQL_UPGRADER_RESULT'				=> 'Abaixo estão os comandos que devem ser executados para atualizar o esquema do banco de dados para a versão correta do MySQL. Clique <a href="%s">aqui</a> para baixar os comandos em um arquivo .sql.',
	'MYSQL_UPGRADER_RUN'				=> 'Executar',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Marcando esta opção, o MySQL Upgrader gerará os comandos e automaticamente executará o resultado no seu banco de dados.<br />Isto pode levar algum tempo, <strong>não</strong> interrompa este processo até que a ferramenta notifique que esteja pronto.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'Script do MySQL Upgrader',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'O MySQL Upgrader foi executado com sucesso',
	
	'QUERY_FINISHED'	=> 'Concluído a execução do comando %1$d de %2$d, prosseguindo para a etapa seguinte.',

	'TOOL_MYSQL_ONLY'	=> 'Está ferramenta apenas está disponível para usuários de SGBD MySQL',
));
