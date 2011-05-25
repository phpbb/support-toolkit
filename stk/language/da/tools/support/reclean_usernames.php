<?php
/**
*
* @package Support Toolkit - Reclean Usernames
* @phpBB source: reclean_usernames.php 277 2010-01-20 01:38:28Z iwisdom $
* @version $Id: reclean_usernames.php 118 2011-01-19 18:34:32Z jan skovsgaard $
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
	'RECLEAN_USERNAMES'					=> 'Rens brugernavne',
	'RECLEAN_USERNAMES_COMPLETE'		=> 'Alle brugernavne er nulstillet og username_clean felterne korrekt udfyldt.',
	'RECLEAN_USERNAMES_CONFIRM'			=> 'Er du sikker på at du vil rense alle brugernavne?',
	'RECLEAN_USERNAMES_NOT_COMPLETE'	=> 'Rensning af brugernavne er endnu ikke fuldført... Afbryd venligst ikke processen.',
));
