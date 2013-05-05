<?php
/**
*
* [french]
*
* @package Support Toolkit - Change Password
* @version $Id:	papicx	1.0.7	05/05/2013	16h07	$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @Translation phpBB-fr http://www.phpbb-fr.com
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'CHANGE_PASSWORD'			=> 'Modifier le mot de passe',
	'CHANGE_PASSWORD_EXPLAIN'	=> 'Modifier le mot de passe d’un utilisateur.<br /><strong>Vous pouvez entrer le nom d’utilisateur ou votre ID utilisateur, mais pas les deux.</strong>',
	'CHANGE_PASSWORD_SUCCESS'	=> 'Le mot de passe de <a href="%s">%s</a> a été modifié.',

	'FIELDS_NOT_FILLED'			=> 'Un champ doit être rempli.',
	'FIELDS_BOTH_FILLED'		=> 'Un seul champ peut être rempli.',

	'PASSWORD_CONFIRM'			=> 'Saisissez de nouveau le mot de passe',

	'USERNAME_NAME'				=> 'Nom de l’utilisateur',
	'USERNAME_NAME_EXPLAIN'		=> 'Saisissez le nom de l’utilisateur dont vous souhaitez modifier le mot de passe.',
	'USERNAMEID'				=> 'ID de l’utilisateur',
	'USERNAMEID_EXPLAIN'		=> 'Saisissez l’ID de l’utilisateur dont vous souhaitez modifier le mot de passe.',
));
