<?php
/**
*
* @package Support Toolkit - Fix Left/Right ID's
* @version $Id: fix_left_right_ids.php 280 2010-02-28 00:55:41Z Raimon $
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
	'FIX_LEFT_RIGHT_IDS'			=> 'Linker/rechter-ID’s repareren',
	'FIX_LEFT_RIGHT_IDS_CONFIRM'	=> 'Weet u zeker dat u de linker en rechter ID’s wilt repareren?<br /><br /><strong>Maak een volledige back-up van uw database wanneer u dit hulpmiddel uitvoert!</strong>',

	'LEFT_RIGHT_IDS_FIX_SUCCESS'	=> 'De linker/rechter ID’s zijn succesvol gerepareerd.',
	'LEFT_RIGHT_IDS_NO_CHANGE'		=> 'Het hulpmiddel is klaar met het doorzoeken van alle linker en rechter id’s en er zijn geen fouten ontdekt, dus er zijn geen wijzigingen aangebracht.',
));

?>