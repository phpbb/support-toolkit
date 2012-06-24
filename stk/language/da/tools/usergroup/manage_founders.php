<?php
/**
*
* @package Support Toolkit - Make Founder
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
	'BOTH_FIELDS_FILLED'		=> 'Kun et af felterne må udfyldes.',

	'DEMOTE_FAILED'				=> 'Kunne ikke fjerne grundlæggerstatus for alle brugere!',
	'DEMOTE_FOUNDERS'			=> 'Degrader grundlæggere',
	'DEMOTE_SUCCESSFULL'		=> 'Grundlæggerstatus fjernet fra %d brugere!',

	'FOUNDERS'					=> 'Brugere med grundlæggerstatus',

	'MAKE_FOUNDER'				=> 'Forfrem bruger til grundlægger',
	'MAKE_FOUNDER_CONFIRM'		=> 'Er du sikker på at du vil forfremme <a href="%1$s">%2$s</a> til grundlægger? <a href="%1$s">%2$s</a> får blandt andre administrative tilladelser til at slette din konto.',
	'MAKE_FOUNDER_FAILED'		=> 'Bruger kunne ikke forfremmes til grundlægger',
	'MAKE_FOUNDER_SUCCESS'		=> '<a href="%1$s">%2$s</a> er nu forfremmet til grundlægger.',
	'MANAGE_FOUNDERS'			=> 'Grundlæggere',

	'NO_FOUNDERS' => 'Ingen grundlæggere fundet',

	'PROMOTE_FOUNDER'			=> 'Forfrem til grundlægger',

	'USER_NAME_TO_FOUNDER'			=> 'Brugernavn forfremmes til grundlægger',
	'USER_NAME_TO_FOUNDER_EXPLAIN'	=> 'Angiv brugernavn for den bruger du vil forfremme til grundlægger.',
	'USER_ID_TO_FOUNDER'			=> 'Bruger-ID forfremmes til grundlægger',
	'USER_ID_TO_FOUNDER_EXPLAIN'	=> 'Angiv bruger-ID for den bruger du vil forfremme til grundlægger.',
));