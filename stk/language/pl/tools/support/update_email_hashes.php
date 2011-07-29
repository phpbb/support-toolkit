<?php
/**
*
* @package Support Toolkit - Update email hashes
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translation (c) 2011 Olympus.pl http://www.phpbb.pl
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
	'UPDATE_EMAIL_HASHES'				=> 'Zaktualizuj hasze e-mail',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'W instalacjach phpBB nowszych niż 3.0.7, przełączenie z systemu 32 bitowego na 64 bitowy może popsuć hasze e-mail. <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">Zobacz błąd tego rodzaju</a>)</em><br />Te narzędzie pozwala na zaktualizowanie haszy w bazie danych, tak aby były prawidłowe.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'Hasze adresów e-mail zostały zaktualizowane!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'Trwa aktualizowanie haszy adresów e-mail.',
));
