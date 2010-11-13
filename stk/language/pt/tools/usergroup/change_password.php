<?php
/**
*
* @package Support Toolkit - Change Password
* @version $Id: change_password.php 244 2009-10-22 11:00:13Z erikfrerejean $
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
	'CHANGE_PASSWORD'			=> 'Alterar Senha',
	'CHANGE_PASSWORD_EXPLAIN'	=> 'Alterar Senha de Utilizadores.',
	'CHANGE_PASSWORD_SUCCESS'	=> 'A Senha de <a href="%s">%s</a> foi alterada com sucesso.',

	'PASSWORD_CONFIRM'			=> 'Confirme a Senha',

	'USERNAMEID'				=> 'Nome ou ID do Utilizador',
	'USERNAMEID_EXPLAIN'		=> 'Introduza o Nome ou a ID do utilizador cuja Senha pretende alterar.',
));

?>