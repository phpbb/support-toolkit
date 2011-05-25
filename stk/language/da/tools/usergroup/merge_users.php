<?php
/**
*
* @package Support Toolkit - Merge Users
* @phpBB source:: merge_users.php 489 2010-08-13 07:40:58Z toonarmy $
* @version $Id: merge_users.php 115 2011-01-15 20:29:09Z jan skovsgaard $
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Sammenlæg brugere',
	'MERGE_USERS_EXPLAIN'				=> 'Flytter en brugerkontos tilknytninger til en anden konto. Brugersourcens indstillinger og gruppemedlemskaber kopieres. Tilknytninger omfatter tilladelser, vedhæftede filer, udelukkelser, bogmærker, kladder, overvågninger, logninger, afstemninger, indlæg, private beskeder, rapporter, emner, advarsler, venner og ignorerede brugere.',

	'MERGE_USERS_BOTH_FOUNDERS' => 'Du kan ikke sammenlægge en grundlægger med en ikke-grundlægger.',
	'MERGE_USERS_BOTH_IGNORE' => 'Du kan ikke sammenlægge en bot med en almindelig bruger.',

	'MERGE_USERS_MERGED'		=> 'Brugere er nu sammenlagt.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Slet brugersource',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Vælges denne, sletter scriptet brugersource fra boardet.',

	'MERGE_USERS_SAME_USERS'	=> 'Brugersource og mål skal være forskellige.',

	'MERGE_USERS_USER_SOURCE'			=> 'Brugersource',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Indlæg, private beskeder, tilladelser, advarsler, et cetera flyttes fra denne bruger til brugermål. Gruppemedlemskaber og indstillinger kopieres.',

	'MERGE_USERS_USER_TARGET'	=> 'Brugermål',
));