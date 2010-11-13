<?php
/**
*
* @package Support Toolkit - Resynchronise Newly Registered users group
* @version $Id: resync_newly_registered.php 263 2009-11-10 22:51:09Z erikfrerejean $
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
	'RESYNC_NEWLY_REGISTERED'				=> 'Ressincroniza Utilizadores recém registrados',
	'RESYNC_NEWLY_REGISTERED_CONFIRM'		=> 'Tem certeza que pretende voltar a sincronizar o novo grupo de utilizadores registrados? Isso irá remover/adicionar todos os utilizadores de e para o "Grupo de utilizadores recém-registrados" que se encaixam nas configurações do ACP.',
	'RESYNC_NEWLY_REGISTERED_FINISHED'		=> 'O primeiro registo do grupo utilizadores ressincronizado com sucesso!',
	'RESYNC_NEWLY_REGISTERED_NOT_FINISHED'	=> 'A ressincronização do grupo de utilizadores recém-registrados está em processamento. Não interrompa o processo',
));

?>