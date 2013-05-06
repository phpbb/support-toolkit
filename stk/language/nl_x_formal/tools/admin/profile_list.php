<?php
/**
*
* @package Support Toolkit - Profile List
* @version $Id$
* @copyright (c) 2009 phpBB Group , 2013 http://www.phpBBservice.nl
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
	'ALL'					=> 'Alles',
	
	'CLICK_TO_DELETE'		=> 'Verwijder alle geselecteerde gebruikers door te klikken op deze knop. <em>(Wanneer dit is gedaan kan het niet meer ongedaan gemaakt worden!)</em>',

	'FILTER'				=> 'Filter',

	'LIMIT'					=> 'Beperk',

	'ONLY_NON_EMPTY'		=> 'Alleen ingevulde',
	'ORDER_BY'				=> 'Rangschrik op',

	'PROFILE_LIST'			=> 'Profiellijst',
	'PROFILE_LIST_EXPLAIN'	=> 'Dit hulpmiddel geeft profielinformatie van meerdere gebruikers weer. Het kan ook worden gebruikt om spamaccounts te identificeren.',
	
	'USERS_DELETE'				=> 'Verwijder geselecteerde gebruikers',
	'USERS_DELETE_CONFIRM'		=> 'Weet u zeker dat u de geselecteerde gebruikers wilt verwijderen? Het verwijderen van gebruikers via dit hulpmiddel zal er voor zorgen dat ook alle berichten van deze gebruikers zullen worden verwijderd!',
	'USERS_DELETE_SUCCESSFULL'	=> 'Alle geselecteerde gebruikers zijn succesvol verwijderd!',	
));

?>