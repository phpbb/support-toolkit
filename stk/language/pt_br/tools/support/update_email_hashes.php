<?php
/**
*
* @package Support Toolkit - Update email hashes
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
	'UPDATE_EMAIL_HASHES'				=> 'Hashes de e-mails atualizados',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'Nas instalações antes do phpBB 3.0.7, a mudança do OS 32 bit para 64 bit causa a quebra de hashes de emails. <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">Veja a notificação de bug</a>)</em><br />Esta ferramenta permite que você atualize os hashes no banco de dados para que eles funcionem corretamente.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'Todos os hashes de emails foram atualizados com sucesso!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'Atualização de hashes de emails em progresso.',
));
