<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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
	'REPARSE_ALL'				=> 'Re-analisar todos os BBCodes',
	'REPARSE_ALL_EXPLAIN'		=> 'Quando a re-analise de BBCode estiver marcada todo o conteúdo do fórum será re-analisado; por padrão, a ferramenta só irá re-analisar mensagens/mensagens privadas/assinaturas que tenham sido previamente analisado pelo phpBB. Esta opção será ignorada se as opções acima forem especificadas.',
	'REPARSE_BBCODE'			=> 'Re-analisar BBCodes',
	'REPARSE_BBCODE_COMPLETE'	=> 'Os BBCodes foram re-analisados.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Você deseja realmente re-analisar todos os BBCodes? Por favor, note que esta ferramenta tem o potencial de danificar seu banco de dados além do reparo; portanto, <strong>certifique-se de fazer o backup do seu banco de dados antes de continuar</strong>. Além disso, note que esta ferramenta pode levar algum tempo para ser concluído.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Etapa %1$d completa. Prosseguindo a etapa %2$d em um momento...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Re-analise de mensagens finalizado, movendo para as mensagens privadas.',
		2	=> 'Re-analise de mensagens privadas finalizado, movendo para as assinaturas.',
	),
	'REPARSE_IDS_INVALID'			=> 'Os IDs que você enviou eram inválidos; por favor, certifique-se que os IDs das mensagens estejam listados como em uma lista separados por vírgulas (exemplo: 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Re-analisar Mensagens Específicas',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Para re-analisar apenas mensagens específicas, especifique os IDs das mensagens em uma separada por vírgulas (exemplo: 1,2,3,5,8,13).',
	'REPARSE_PM_IDS'				=> 'Re-analisar MPs Específicas',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Para re-analisar apenas MPs específicas, especifique os IDs das MPs em uma separada por vírgulas (exemplo: 1,2,3,5,8,13).',
));
