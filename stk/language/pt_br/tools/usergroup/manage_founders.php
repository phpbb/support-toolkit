<?php
/**
*
* @package Support Toolkit - Make Founder
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
	'BOTH_FIELDS_FILLED'		=> 'Tanto o campo Nome de Usuário quanto o campo ID de Usuário não podem ser preenchidos.',

	'DEMOTE_FAILED'				=> 'Não foi possível remover os status de Fundador de todos os usuários!',
	'DEMOTE_FOUNDERS'			=> 'Demitir Fundadores',
	'DEMOTE_SUCCESSFULL'		=> 'Os status de Fundador foram removidos de %d usuários com sucesso!',

	'FOUNDERS'					=> 'Usuários com status de Fundador',

	'MAKE_FOUNDER'				=> 'Tornar um usuário Fundador',
	'MAKE_FOUNDER_CONFIRM'		=> 'Você deseja realmente transformar o usuário <a href="%1$s">%2$s</a> em um Fundador? Isto possibilitará ao usuário <a href="%1$s">%2$s</a> a habilidade de deletar a sua conta, além de outros poderes.',
	'MAKE_FOUNDER_FAILED'		=> 'Não foi possível promover este usuário a Fundador',
	'MAKE_FOUNDER_SUCCESS'		=> 'O usuário <a href="%1$s">%2$s</a> foi transformado em um Fundador com sucesso.',
	'MANAGE_FOUNDERS'			=> 'Gerenciar fundadores',

	'NO_FOUNDERS'				=> 'Nenhum Fundador encontrado',

	'PROMOTE_FOUNDER'			=> 'Promover a Fundador',

	'USER_NAME_TO_FOUNDER'			=> 'Nome de usuário para tornar Fundador',
	'USER_NAME_TO_FOUNDER_EXPLAIN'	=> 'Escreva o nome de usuário qual você gostaria de transformar em um Fundador.',
	'USER_ID_TO_FOUNDER'			=> 'ID do usuário para tornar Fundador',
	'USER_ID_TO_FOUNDER_EXPLAIN'	=> 'Escreva a ID do usuário qual você gostaria de transformar em um Fundador.',
));
