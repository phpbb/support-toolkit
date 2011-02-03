<?php
/**
*
* @package Support Toolkit - Update email hashes
* @version $Id: update_email_hashes.php 415 2010-06-09 00:44:26Z iwisdom $
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
	'UPDATE_EMAIL_HASHES'				=> 'Actualizare codificare email (hash)',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'În instalările phpBB anterioare versiunii phpBB 3.0.7, o schimbare de la un sistem de operare pe 32 biţi la 64 biţi ar afecta codificările adreselor de email (hash). <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">Aici puteţi vedea problema raportată</a>)</em><br />Acest utilitar vă permite să actualizaţi codificările adreselor de email (hash) din baza de date ca să funcţioneze normal.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'Toate codificările adreselor de email (hash) au fost actualizate cu succes!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'Actualizarea codificărilor adreselor de email (hash) este în curs de rulare.',
));

?>