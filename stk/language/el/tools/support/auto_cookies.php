<?php
/**
*
* @package Support Toolkit - Auto Cookies
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
	'AUTO_COOKIES'				=> 'Αυτόματα Cookies',
	'AUTO_COOKIES_EXPLAIN'		=> 'Αυτό το εργαλείο σας επιτρέπει να αλλάξετε τις ρυθμίσεις cookie της Δ. Συζήτησής σας. Οι προτεινόμενες ρυθμίσεις είναι σωστές τις περισσότερες φορές. Εάν δεν είστε σίγουροι για τις σωστές ρυθμίσεις, παρακαλούμε ελέγξτε στο Φόρουμ Υποστήριξης πριν αλλάξετε κάτι στις ρυθμίσεις  γιατί μια λανθασμένη ρύθμιση  μπορεί να έχει σαν αποτέλεσμα να μην μπορείτε να συνδεθείτε στην ιστοσελίδα σας.',

	'COOKIE_SETTINGS_UPDATED'	=> 'Οι ρυθμίσεις cookie ενημερώθηκαν επιτυχώς.',
));
