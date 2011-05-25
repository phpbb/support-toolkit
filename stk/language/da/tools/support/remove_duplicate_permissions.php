<?php
/**
*
* @package Support Toolkit - Duplicate Permission Remover
* @phpBB source: remove_duplicate_permissions.php 415 2010-06-09 00:44:26Z iwisdom $
* @version $Id: remove_duplicate_permissions.php 115 2011-01-15 20:29:09Z jan skovsgaard $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
*
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
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'DUPLICATES_FOUND'						=> 'Alle dublerede tilladelser fundet og fjernet.',

	'NO_DUPLICATES_FOUND'					=> 'Der blev ikke fundet dublerede tilladelser.',

	'REMOVE_DUPLICATE_PERMISSIONS'			=> 'Fjern dublerede tilladelser',
	'REMOVE_DUPLICATE_PERMISSIONS_CONFIRM'	=> 'Er du sikker på at du vil fjerne dublerede tilladelser?',
));