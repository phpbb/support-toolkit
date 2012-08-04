<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Συγχώνευση Μελών',
	'MERGE_USERS_EXPLAIN'				=> 'Εργαλείο για να μετακινήσετε έναν λογαριασμό μέλους σε έναν άλλο λογαριασμό, αντιγράφονται οι ρυθμίσεις μελών  και συμμετοχές σε ομάδες. Επίσης όπως τα στοιχεία δικαιώματα των χρηστών, τα συνημμένα, τις απαγορεύσεις, σελιδοδείκτες, σχέδια, δ. συζήτηση / παρακολούθηση θέματος, δ. συζήτηση / θέμα παρακολουθούν, συνδέσεις καταχωρήσεις, ψήφους δημοσκοπήσεις, δημοσιεύσεις, προσωπικά μηνύματα, τις εκθέσεις, τα θέματα, προειδοποιήσεις, φίλους και εχθρούς .',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'Δεν μπορείτε να συγχωνεύσετε έναν Ιδρυτή με ένα μέλος που δεν είναι ιδρυτής.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Δεν μπορείτε να συγχωνεύσετε ένα bot με ένα κανονικό μέλος.',
	
	'MERGE_USERS_MERGED'		=> 'Επιτυχής συγχώνευση μελών.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Διαγραφή πηγή μέλους',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Αν είναι επιλεγμένο αυτό το εργαλείο θα διαγράψει την πηγή μέλους από την δ. συζήτηση.',

	'MERGE_USERS_SAME_USERS'	=> 'Η πηγή και ο προορισμός μέλους πρέπει να είναι διαφορετικός.',

	'MERGE_USERS_USER_SOURCE'			=> 'Πηγή μέλους',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Δημοσιεύσεις,  προσωπικά μηνύματα, τα δικαιώματα, οι προειδοποιήσεις, κ.λπ. μετακινούνται από αυτό το μέλος στο μέλος-προορισμός, επίσης συμμετοχές σε ομάδες και οι ρυθμίσεις  μέλους αντιγράφονται.',

	'MERGE_USERS_USER_TARGET'	=> 'Προορισμός μέλους',
));
