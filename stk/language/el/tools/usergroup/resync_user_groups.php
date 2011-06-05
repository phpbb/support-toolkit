<?php
/**
*
* @package Support Toolkit - Resynchronise Registered users groups
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
	'RESYNC_USER_GROUPS'			=> 'Συγχρονισμός ομάδων μελών',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Το εργαλείο αυτό έχει σχεδιαστεί για να ελέγξει εάν όλα τα μέλη είναι μέρος τη σωστή ομάδα προεπιλογής <em>(Εγγεγραμμένα Μέλη, Εγγεγραμμένα COPPA Μέλη και Πρόσφατα Εγγεγραμμένα Μέλη)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Όλες οι ομάδες φαίνεται να είναι ενημερωμένες!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Ρυθμίσεις συγχρονισμού',
	'RUN_BOTH_FINISHED'				=> 'Όλες οι ομάδες μελών έχουν συγχρονιστεί επιτυχώς!',
	'RUN_RNR'						=> 'Συγχρονισμός Πρόσφατων Εγγεγραμμένων Μελών',
	'RUN_RNR_EXPLAIN'				=> 'Αυτό θα ενημερώσει τα "Πρόσφατα Εγγεγραμμένα Μέλη"της ομάδας έτσι ώστε να περιλαμβάνει όλα τα μέλη που ταιριάζουν με τα κριτήρια που έχετε ορίσει στον ΠΕΔ.',
	'RUN_RNR_FINISHED'				=> 'Ο συγχρονισμός της ομάδας Πρόσφατων Εγγεγραμμένων Μελών έγινε επιτυχώς!',
	'RUN_RNR_NOT_FINISHED'			=> 'Γίνετε συγχρονισμός της ομάδας των Πρόσφατων Εγγεγραμμένων Μελών. Παρακαλώ μην διακόψετε αυτή τη διαδικασία',
	'RUN_RR'						=> 'Συγχρονισμός Εγγεγραμμένων Μελών',
	'RUN_RR_EXPLAIN'				=> 'Το εργαλείο  έχει βρει   ότι δεν ανήκουν  όλα τα μέλη της ιστοσελίδας σας στην "Εγγεγραμμένα <em>(COPPA)</em> μέλη" ομάδα. Θέλετε να γίνει συγχρονισμός αυτών των ομάδων?<br /><strong>Σημείωση:</strong> Εάν η ιστοσελίδας σας έχει ενεργοποιημένο την  COPPA εγγραφή  και το μέλος έχει προσθέσει τα γενέθλιά του τότε το μέλος θα προστεθεί στην "Εγγεγραμμένα COPPA μέλη" ομάδα!',
	'RUN_RR_FINISHED'				=> 'Ο συγχρονισμός των μελών έγινε επιτυχώς!',

	'SELECT_RUN_GROUP'	=> 'Επιλέξτε τουλάχιστον έναν τύπο ομάδας που θα συγχρονιστεί.',
));