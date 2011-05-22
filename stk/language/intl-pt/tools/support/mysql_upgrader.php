<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'					=> 'Atualização MySQL',
	'MYSQL_UPGRADER_BACKUP'				=> 'Esta ferramenta é potencialmente perigosa, antes de continuar faça uma Cópia de Segurança da sua Base de Dados!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Esta ferramenta foi projetada para resolver certos problemas que acontecem quando a Base de Dados MySQL usada no seu phpBB é atualizada. Esta atualização pode causar um esquema de Base de Dados incompatível com a nova versão <em>Veja também o artigo “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Não tenho um valor de erros padrão </a>” (em inglês) na Base de Conhecimento.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Transferir',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Ao marcar esta opção, o script de atualização MySQL vai gerar as consultas e exibir os resultados, permitindo a sua transferência em ficheiro.',
	'MYSQL_UPGRADER_RESULT'				=> 'Em baixo estão as consultas que devem ser executadas para atualizar a Base de Dados MySQL para a versão correta. Clique <a href="%s">aqui</a> para as transferir num arquivo sql.',
	'MYSQL_UPGRADER_RUN'				=> 'Executar',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Ao marcar esta opção, o script de atualização MySQL vai gerar consultas e executar automaticamente o resultado na Base de Dados.<br />Este processo pode demorar algum tempo. Assim, <strong>não</strong> interrompa o processo, até que a ferramenta o dê como concluído.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'Script de atualização MySQL',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'A atualização MySQL foi concluída com êxito',
	
	'QUERY_FINISHED'					=> 'Terminada a execução da consulta %1$d of %2$d, continuar para a próxima etapa.',

	'TOOL_MYSQL_ONLY'					=> 'Esta ferramenta está disponível apenas para utilizadores do MySQL DBMS',
));
