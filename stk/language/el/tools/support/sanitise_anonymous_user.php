<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'Το προφίλ του χρήστη Anonymous απομονώθηκε επιτυχώς.',
	'ANONYMOUS_CORRECT'					=> 'Ο χρήστης Anonymous υπάρχει και είναι ρυθμισμένος σωστά.',
	'ANONYMOUS_CREATED'					=> 'Ο χρήστης Anonymous ξαναδημιουργήθηκε επιτυχώς.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Δεν ήταν δυνατό να ξαναδημιουργηθεί ο χρήστης Anonymous. Παρακαλώ αναζητήστε περισσότερη βοήθεια στην Δ. συζήτηση υποστήριξης του phpBB.com.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'Ο χρήστης Anonymous αφαιρέθηκε από όλες τις ομάδες πρόσβασης επιτυχώς.',
	'ANONYMOUS_MISSING'					=> 'Ο χρήστης Anonymous λείπει.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'Ο χρήστης Anonymous λείπει από την βάση σας. Αυτός ο χρήστης χρησιμοποιείται για να επιτρέψει στους επισκέπτες να επισκεφτούν την Δ. Συζήτησή σας. Θέλετε να δημιουργήσετε έναν νέο;',
	'ANONYMOUS_WRONG_DATA'				=> 'Οι πληροφορίες προφίλ του χρήστη Anonymous είναι λάθος.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Οι πληροφορίες προφίλ του χρήστη Anonymous είναι εν μέρη λάθος. Θέλετε να επιδιοθωθεί αυτό;',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Ο χρήστης Anonymous ανήκει λανθασμένα σε πολλές ομάδες χρηστών.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Ο χρήστης Anonymous ανήκει λανθασμένα σε πολλές ομάδες χρηστών. Θέλετε να αφαιρεθεί ο χρήστης Anonymous από όλα εκτός από την ομάδα "Επισκέπτες";',

	'REDIRECT_NEXT_STEP'				=> 'Προωθείστε στο επόμενο βήμα.',

	'SANITISE_ANONYMOUS_USER'			=> 'Απομόνωση χρήστη Anonymous',
));
