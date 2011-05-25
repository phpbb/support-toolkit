<?php
/**
*
* @package Support Toolkit - Profile List
* @phpBB source: profile_list.php 277 2010-01-20 01:38:28Z iwisdom $
* @version $Id: profile_list.php 136 2011-05-16 12:57:20Z jan skovsgaard $
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
	'ALL'					=> 'Alle',

	'CLICK_TO_DELETE'    => 'Klik på denne knap for at slette alle valgte brugere. <em>(Kan ikke fortrydes!)</em>',

	'FILTER'				=> 'Filter',

	'LIMIT'					=> 'Grænse',

	'ONLY_NON_EMPTY'		=> 'Kun med indlæg', //Only Non-Empty
	'ORDER_BY'				=> 'Sorteret efter',

	'PROFILE_LIST'			=> 'Profilliste',
	'PROFILE_LIST_EXPLAIN'	=> 'Viser profilinformation for flere brugere. Dette værktøj kan hjælpe til at identificere brugerkonti oprettet af spambotter.',

	'USERS_DELETE'        => 'Slet valgte brugere',
	'USERS_DELETE_CONFIRM'    => 'Er du sikke på at ønsker at slette valgte brugere? Når brugere slettes med dette værktøj, <strong>slettes</strong> samtidig alle disse brugeres indlæg!',
	'USERS_DELETE_SUCCESSFULL'  => 'Alle brugere blev slettet!',
));
