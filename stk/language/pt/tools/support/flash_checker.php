<?php
/**
 *
 * @package Support Toolkit - Flash checker
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
	'FLASH_CHECKER'				=> 'Verificador de Flash',
	'FLASH_CHECKER_CONFIRM'		=> 'No phpBB 3.0.7-pl1, foi encontrada uma possível vulnerabilidade XSS no BBCode de flash embutido. Este problema foi resolvido no phpBB 3.0.8. Esta ferramenta irá verificar todas as mensagens, mensagens privadas e assinaturas este BBCode vulnerável. Se as encontrar, permite que reanalise rapidamente esses locais, para se certificar que seu fórum é seguro. Veja <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">o anúncio de lançamento do phpBB 3.0.8</a> para obter mais informações sobre o assunto.',
	'FLASH_CHECKER_FOUND'		=> 'O verificador de Flash encontrou alguns BBCodes Flash potencialmente perigosos no seu fórum. Clique <a href="%s">aqui</a> para reanalisar as mensagens e mensagens privadas que contêm este BBCode Flash.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Não foram encontrados BBCodes Flash potencialmente perigosos.',
));
