<?php
/**
*
* @package Support Toolkit - Update email hashes
* @version $Id: update_email_hashes.php 327 2010-10-17 21:01:58Z Raimon $
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
	'UPDATE_EMAIL_HASHES'				=> 'E-mail hashes bijwerken',
	'UPDATE_EMAIL_HASHES_CONFIRM'		=> 'In phpBB-installaties naar 3.0.7, kan de switch van een 32 bit OS naar 64 bit OS de e-mail-hashes beschadigen. <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">Klik hier om de gerelateerde bugmelding te bekijken</a>).<br />Met dit hulpmiddel kunt u de hashes bijwerken in de database zodat ze correct functioneren.',
	'UPDATE_EMAIL_HASHES_COMPLETE'		=> 'Alle e-mail-hashes zijn succesvol bijgewerkt!',
	'UPDATE_EMAIL_HASHES_NOT_COMPLETE'	=> 'Bezig met het bijwerken van de e-mail-hashes.',
));
?>