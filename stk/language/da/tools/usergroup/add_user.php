<?php
/**
*
* @package Support Toolkit - Add User
* @phpBB source: add_user.php 251 2009-11-03 13:16:11Z erikfrerejean $
* @version $Id: add_user.php 116 2011-01-16 08:47:02Z jan skovsgaard $
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
	'ADD_USER'				=> 'Opret bruger',
	'ADD_USER_GROUP'		=> 'Tilføj bruger til grupper',

	'DEFAULT_GROUP'			=> 'Standardgruppe',
	'DEFAULT_GROUP_EXPLAIN'	=> 'Denne brugers standardgruppe.',

	'GROUP_LEADER'			=> 'Gruppeleder',
	'GROUP_LEADER_EXPLAIN'	=> 'Forfrem bruger til gruppeleder for valgte grupper.',

	'USER_ADDED'			=> 'Brugeren blev oprettet!',
	'USER_GROUPS'			=> 'Brugergrupper',
	'USER_GROUPS_EXPLAIN'	=> 'Tilmeld bruger valgte grupper.',
));
