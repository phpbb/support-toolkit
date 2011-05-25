<?php
/**
*
* @package Support Toolkit - Auto Cookies
* @phpBB source: auto_cookies.php 415 2010-06-09 00:44:26Z iwisdom $
* @version $Id: auto_cookies.php 115 2011-01-15 20:29:09Z jan skovsgaard $
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
	'AUTO_COOKIES'				=> 'Auto Cookies',
	'AUTO_COOKIES_EXPLAIN'		=> 'Værktøjet giver mulighed for at ændre boardets cookie-indstillinger. De foreslåede indstillinger burde i de fleste tilfælde være korrekte. Er du usikker på de korrekte indstilling, bedes du søge hjælp i Supportforummet. Forkerte indstillinger kan medføre at du ikke kan logge på dit board.',

	'COOKIE_SETTINGS_UPDATED'	=> 'Cookie-indstillinger er opdateret.',
));