<?php
/**
*
* @package Support Toolkit - Readd Module Management
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*
* @Ελληνική μετάφραση από την ομάδα μετάφρασης του phpbbgr.com. http://phpbbgr.com
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
	'READD_MODULE_MANAGEMENT'			=> 'Επαναδημιουργία μονάδων Διαχείρισης Μονάδων',
	'READD_MODULE_MANAGEMENT_CONFIRM'	=> 'Είστε σίγουροι πως θέλετε να επαναδημιουργήσετε τις μονάδες της Διαχείρσης Μονάδων στον Πίνακα Ελέγχου Διαχειριστή;',
	'READD_MODULE_MANAGEMENT_SUCCESS'	=> 'Οι μονάδες έχουν επαναδημιουργηθεί επιτυχώς!',
));
