<?php
/**
*
* @package Support Toolkit - Reparse BBCode
* @version $Id$
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

/**
* DO NOT CHANGE
*/
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
// í ª ì î Ö
//

$lang = array_merge($lang, array(
	'REPARSE_ALL'				=> 'Reanalisar todos os BBCodes',
	'REPARSE_ALL_EXPLAIN'		=> 'Quando selecionada, a reanalise de todos os BBCodes, vai reanalisar todo o conteúdo do fórum. Por defeito, esta ferramenta só irá reanalisar as mensagens, mensagens privadas e assinaturas que tenham sido previamente analisado pelo phpBB.',
	'REPARSE_BBCODE'			=> 'Reanalisar BBCodes',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBCodes reanalisados.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Tem a certeza que quer reanalisar todos os BBCodes? A tarefa pode levar algum tempo.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Passo %1$d completo. Seguindo para o passo %2$d dentro de momentos...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Análise das mensagens terminada, a analisar mensagens privadas.',
		2	=> 'Análise das mensagens privadas terminada, a analisar assinaturas.',
	),
	'REPARSE_IDS_INVALID'			=> 'Os IDs que indicou não são válidos; certifique-se que os IDs das mensagens estão separados por vírgulas (Exemplo: 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Reanalisar mensagens específicas',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Para reanalisar apenas mensagens específicas, coloque os IDs das mensagens separados por vírgulas.',
	'REPARSE_PM_IDS'				=> 'Reanalisar PMs específicas',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Para reanalisar apenas PMs específicas, coloque os IDs das PMs separados por vírgulas. (Exemplo: 1,2,3,5,8,13).',
));

?>