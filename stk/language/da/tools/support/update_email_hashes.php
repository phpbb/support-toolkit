<?php
/**
*
* @package Support Toolkit - Update email hashes
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
	'UPDATE_EMAIL_HASHES'				=> 'Opdatering af email-hashes',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'I phpBB-installationer tidligere end phpBB 3.0.7 medfører et skift fra et 32 til et 64 bits operativsystem at email-hashes bliver defekte. <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">Se den relaterede fejlrapport</a>)</em><br />Dette værktøj opdaterer alle hashes i databasen, så de bliver funktionelle igen.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'Alle email-hashes er korrekt opdaterede!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'Opdatering af email-hashes under udførelse.',
));
