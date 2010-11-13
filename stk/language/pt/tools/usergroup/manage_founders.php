<?php
/**
*
* @package Support Toolkit - Make Founder
* @version $Id: manage_founders.php 336 2010-04-02 11:13:36Z erikfrerejean $
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
	'DEMOTE_FAILED'				=> 'Não foi possível remover o estatudo de fundador de todos os utilizadores!',
	'DEMOTE_FOUNDERS'			=> 'Despromover Fundadores',
	'DEMOTE_SUCCESSFULL'		=> 'Removido com sucesso o estatuto de fundador a %d utilizadores!',

	'FOUNDERS'					=> 'Utilizadores com o estatuto de Fundador',

	'MAKE_FOUNDER'				=> 'Promover um utilizador a Fundador',
	'MAKE_FOUNDER_CONFIRM'		=> 'Tem a certeza de que deseja tornar <a href="%1$s">%2$s</a> Fundador do Fórum?  Isto vai dar a  <a href="%1$s">%2$s</a> capacidade de apagar a sua conta, entre outros poderes.',
	'MAKE_FOUNDER_FAILED'		=> 'Não foi possível promover este utilizador a Fundador',
	'MAKE_FOUNDER_SUCCESS'		=> '<a href="%1$s">%2$s</a> foi promovido com sucesso a Fundador.',
	'MANAGE_FOUNDERS'			=> 'Gestão de Fundadores',

	'NO_FOUNDERS'				=> 'Não há Fundadores',

	'PROMOTE_FOUNDER'			=> 'Promover a Fundador',

	'USER_TO_FOUNDER'			=> 'Utilizador a promover a Fundador',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'Introduza o Nome ou ID do utilizador que deseja tornar Fundador',
));

?>
