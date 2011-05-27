<?php
/**
*
* @package Support Toolkit - Profile List
* @version $Id$
* @copyright (c) 2009 phpBB Group
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
	'ALL'					=> 'Allemaal',

	'CLICK_TO_DELETE'		=> 'Verwijder de geselecteerde gebruikers door op deze knop te drukken. <em>(Kan niet ongedaan gemaakt worden!)</em>',

	'FILTER'				=> 'Filter',

	'LIMIT'					=> 'Limiet',

	'ONLY_NON_EMPTY'		=> 'Alleen ingevulde',
	'ORDER_BY'				=> 'Sorteren op',

	'PROFILE_LIST'			=> 'Profielenlijst',
	'PROFILE_LIST_EXPLAIN'	=> 'Een tool voor het weergeven van profielinformatie van meerdere gebruikers. Deze tool kan bijdragen in het detecteren van spam accounts.',

	'USERS_DELETE'				=> 'Verwijder geselecteerde gebruikers',
	'USERS_DELETE_CONFIRM'		=> 'Weet je zeker dat je de geselecteerde gebruikers wilt verwijderen? Als je via deze tool gebruikers verwijderd, <strong>worden</strong> tevens al hun berichten verwijderd!',
	'USERS_DELETE_SUCCESSFULL'	=> 'Alle geselecteerde gebruikers zijn succesvol verwijderd!',
));
