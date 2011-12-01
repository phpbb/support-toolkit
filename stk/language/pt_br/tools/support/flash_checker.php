<?php
/**
 *
 * @package Support Toolkit - Flash checker
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
	'FLASH_CHECKER'				=> 'Verificador Flash',
	'FLASH_CHECKER_CONFIRM'		=> 'No phpBB 3.0.7-pl1, uma possível vulnerabilidade XSS foi encontrada no BBCode Flash padrão. Este problema foi resolvido no phpBB 3.0.8. Esta ferramente verificará todas as mensagens, mensagens privadas e assinaturas para este BBcode vulnerével. Se encontrado, lhe permitirá rapidamente re-analisar essas mensagens para se certificar que seu fórum é seguro. Confira no <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">anúncio de lançamento do phpBB 3.0.8</a> para mais informações acerca deste problema.',
	'FLASH_CHECKER_FOUND'		=> 'O verificador flash encontrou alguns BBCodes Flash potencialmente perigosos no seu fórum. Clique <a href="%s">aqui</a> para re-analisar as mensagens e mensagens privadas que contém esses BBCode Flash.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Nenhum BBCodes Flash potencialmente perigoso encontrado.',
));
