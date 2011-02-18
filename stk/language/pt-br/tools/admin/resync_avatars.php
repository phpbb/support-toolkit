<?php
/**
 *
 * @package Support Toolkit - Resync Avatars
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
	'RESYNC_AVATARS'			=> 'Re-sincronizar avatares',
	'RESYNC_AVATARS_CONFIRM'	=> 'Esta ferramenta certificará de que todos os avatares usados no fórum realmente existam no servidor. Quando os arquivos estiverem em falta, o avatar será removido do perfil dos usuários. Você tem certeza que deseja continuar?',
	'RESYNC_AVATARS_FINISHED'	=> 'Avatares re-sincronizados com sucesso!',
	'RESYNC_AVATARS_NEXT_MODE'	=> 'Mudando para avatares de grupo, por favor, não interrompa este processo!',
	'RESYNC_AVATARS_PROGRESS'	=> 'A re-sincronização de avatares está em andamento, por favor, não interrompa este processo!',
));
