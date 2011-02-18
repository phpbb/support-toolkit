<?php
/**
*
* @package Support Toolkit - SQL Query
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
	'ERROR_QUERY'					=> 'O comando contém o erro',

	'NO_RESULTS'					=> 'Não há resultados',
	'NO_SQL_QUERY'					=> 'Você deve escrever um comando para executar.',

	'QUERY_RESULT'					=> 'Resultados do comando',

	'SHOW_RESULTS'					=> 'Exibir resultados',
	'SQL_QUERY'						=> 'Executar comando SQL',
	'SQL_QUERY_EXPLAIN'				=> 'Escreva o comando SQL que deseja executar. A ferramenta irá substituir o prefixo "phpbb_" com o prefixo da sua tabela.<br />Se a opção "Exibir resultados" estiver marcada, a ferramenta exibirá os resultados <em>(se houver)</em> do comando.',

	'SQL_QUERY_LEGEND'				=> 'Comando SQL',
	'SQL_QUERY_SUCCESS'				=> 'O comando SQL foi executado com sucesso.',
));
