<?php
/**
*
* @package Support Toolkit - Fix Left/Right ID's
* @version $Id: fix_left_right_ids.php 415 2010-06-09 00:44:26Z iwisdom $
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
	'FIX_LEFT_RIGHT_IDS'			=> 'Corrigir ID’s da esquerda/direita',
	'FIX_LEFT_RIGHT_IDS_CONFIRM'	=> 'Tem certeza que deseja corrigir os ID’s da esquerda/direita?<br /><br /><strong>Faça uma Cópia de Segurança da Base de Dados antes de usar esta ferramenta!</strong>',

	'LEFT_RIGHT_IDS_FIX_SUCCESS'	=> 'Os ID’s da esquerda/direita foram corrigidos com sucesso.',
	'LEFT_RIGHT_IDS_NO_CHANGE'		=> 'A ferramenta concluiu a análise de todos os ID’s de esquerda/direita e todas as colunas estão correctas não necessitando portanto de alterações.',
));

?>