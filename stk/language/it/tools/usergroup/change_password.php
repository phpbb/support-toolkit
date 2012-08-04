<?php
/**
*
* @package Support Toolkit - Change Password
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2011 phpBBItalia.net - translated on 2011-10-01
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
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
	'CHANGE_PASSWORD'			=> 'Modifica Password',
	'CHANGE_PASSWORD_EXPLAIN'	=> 'Modifica la password di un utente.',
	'CHANGE_PASSWORD_SUCCESS'	=> 'La password per <a href="%s">%s</a> è stata modificata con successo.',

	'PASSWORD_CONFIRM'			=> 'Conferma password',

	'USERNAMEID'				=> 'Nome utente o ID utente',
	'USERNAMEID_EXPLAIN'		=> 'Inserisci il nome utente o l’ID utente di cui vuoi modificare la password.',
));
