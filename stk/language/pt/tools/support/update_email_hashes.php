<?php
/**
*
* @package Support Toolkit - Update email hashes
* @version $Id: update_email_hashes.php 426 2010-06-11 21:27:34Z erikfrerejean $
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
	'UPDATE_EMAIL_HASHES'				=> 'Actualizar hashes de email',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'Nas instalações phpBB anteriores à 3.0.7, a mudança do Sistema Operativo de 32 bits para 64 bits iria quebrar as hashes de email.  <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">leia o relatório completo</a>)</em>.<br />Esta ferramenta permite-lhe actualizar as hashes na Base de Dados para que funcionem correctamente.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'Todas as hashes de email foram actualizadas com sucesso!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'Actualizando as hashes de email.',
));
?>