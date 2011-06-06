<?php
/**
*
* @package Support Toolkit - Restore Delted Users
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
	'NO_DELETED_USERS'	=> 'Δεν υπάρχουν διαγραμμένα μέλη για επαναφορά',
	'NO_USER_SELECTED'	=> 'Δεν έχετε επιλέξει μέλη!',

	'RESTORE_DELETED_USERS'						=>'Αποκατάσταση διαγραφέντων μελών ',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Αποκατάσταση διαγραφέντων μελών  :: Σύγκρουση',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Αυτό το εργαλείο επιτρέπει σε σας να αποκαταστήσετε μέλη που έχουν διαγραφεί από την Δ. Συζήτηση, αλλά εξακολουθούν να έχουν "επισκέπτης" δημοσιεύσεις στην Δ. Συζήτηση. <br /> Σε αυτά τα μέλη  θα πρέπει να τεθεί ένας τυχαίος κωδικός  πρόσβασης που θα πρέπει να επαναφέρετε με το χέρι αφού έχετε τρέξει το εργαλείο.  Αυτό το εργαλείο παρέχει μια λίστα με τους κωδικούς πρόσβασης που παράγονται ανά μέλος! <br /> <br /> Κατά την τελευταία εκτέλεση αυτού του εργαλείου  βρέθηκαν κάποια ονόματα μελών που υπάρχουν ήδη στο εν λόγω Δ. Συζήτηση. Παρακαλώ δώστε ένα νέο όνομα για αυτά τα μέλη.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Αυτό το εργαλείο επιτρέπει σε σας να αποκαταστήσετε μέλη που έχουν διαγραφεί από την Δ. Συζήτηση, αλλά εξακολουθούν να έχουν "επισκέπτης" δημοσιεύσεις στην Δ. Συζήτηση.<br />Σε αυτά τα μέλη  θα πρέπει να τεθεί ένας τυχαίος κωδικός  πρόσβασης που θα πρέπει να επαναφέρετε με το χέρι αφού έχετε τρέξει το εργαλείο. Αυτό το εργαλείο παρέχει μια λίστα με τους κωδικούς πρόσβασης που παράγονται ανά μέλος!',

	'SELECT_USERS'	=> 'Επιλέξτε μέλη για αποκατάσταση',

	'USER_RESTORED_SUCCESSFULLY'	=> 'Το επιλεγμένο μέλος έχει αποκατασταθεί επιτυχώς.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Τα επιλεγμένα μέλη έχουν αποκατασταθεί επιτυχώς .',
));
