<?php
/**
*
* @package Support Toolkit - SQL Query
* @version $Id: sql_query.php 415 2010-06-09 00:44:26Z iwisdom $
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
	'NO_RESULTS'					=> 'Sem resultados.',
	'NO_SQL_QUERY'					=> 'Tem de introduzir um comando SQL',
	
	'QUERY_RESULT'					=> 'Resultados da consulta',	

	'SHOW_RESULTS'					=> 'Mostrar Resultados',
	'SQL_QUERY'						=> 'Correr Comando SQL',
	'SQL_QUERY_EXPLAIN'				=> 'Introduza o código sql que deseja executar. Se phpbb_ entrar como prefixo e este não é o que usou para instalar o fórum, então automaticamente será alterado para o prefixo de instalação correcto.',
	
	'SQL_QUERY_LEGEND'				=> 'Comando SQL',
	'SQL_QUERY_SUCCESS'				=> 'Comando SQL executado com sucesso.',
));

?>