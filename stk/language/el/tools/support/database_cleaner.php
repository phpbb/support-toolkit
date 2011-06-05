<?php
/**
*
* @package Support Toolkit - Database Cleaner
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
	'BOARD_DISABLE_REASON'			=> 'Η απενεργοποίηση της Δ. Συζήτησης οφείλεται σε συντήρηση της βάσης δεδομένων. Παρακαλώ ελέγξτε ξανά σύντομα!',
	'BOARD_DISABLE_SUCCESS'			=> 'Το σύστημα έχει απενεργοποιηθεί επιτυχώς!',
	'COLUMNS'						=> 'Στήλες',
	'CONFIG_SETTINGS'				=> 'Ρυθμίσεις',
	'CONFIG_UPDATE_SUCCESS'			=> 'Οι ρυθμίσεις έχουν ενημερωθεί επιτυχώς!',
	'CONTINUE'						=> 'Συνέχεια',

	'DATABASE_CLEANER'				=> 'Καθαριστής Β. Δεδομένων',
	'DATABASE_CLEANER_EXTRA'		=> 'Όλα τα υπόλοιπα είναι επιπλέον χαρακτηριστικά που μπήκαν από πρόσθετα.  <strong>Αν το κουτάκι είναι επιλεγμένο θα διαγραφούν</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Όλα τα πεδία με κόκκινο φόντο όπως εδώ είναι χαρακτηριστικά που λείπουν και πρέπει να προστεθούν.  <strong>Αν το κουτάκι είναι επιλεγμένο θα προστεθούν</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Ο καθαριστής της Β. Δεδομένων ολοκληρώθηκε επιτυχώς!<br /><br />Παρακαλώ σιγουρευτείτε ότι κρατήσατε αντίγραφο ασφαλείας ξανά.',
	'DATABASE_CLEANER_WARNING'		=> 'Αυτό το εργαλείο έρχεται με ΑΠΟΛΥΤΩΣ ΚΑΜΙΑ ΕΓΓΥΗΣΗ και οι χρήστες του θα πρέπει να κρατήσουν αντίγραφο ασφαλείας ολόκληρης της Β. Δεδομένων σε περίπτωση που αποτύχει.<br /><br />Πριν συνεχίσετε, βεβαιωθείτε ότι έχετε αντίγραφο ασφαλείας της βάσης!',
	'DATABASE_CLEANER_WELCOME'		=> 'Καλωσορίσατε στο εργαλείο εκκαθάρισης της βάσης δεδομένων!<br /><br />Αυτό το εργαλείο σχεδιάστηκε για να αφαιρεί πρόσθετες στήλες, σειρές, και πίνακες από μία βάση που δεν είναι η αρχική εγκατάσταση του phpBB3, και να προσθέτει στοιχεία της βάσης που λείπουν.<br /><br />Όταν είστε έτοιμος για να συνεχίσετε πατήστε στο κουμπί Συνέχεια για να ξεκινήσετε να χρησιμοποιείτε το εργαλείο (σημειώστε ότι η Δ. Συζήτησή σας θα είναι ανενεργή μέχρι να τελειώσει).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Οι στήλες της βάσης σας ενημερώθηκαν επιτυχώς!',
	'DATABASE_TABLES'				=> 'Πίνακες Β. Δεδομένων',
	'DATABASE_TABLES_SUCCESS'		=> 'Οι πίνακες της βάσης σας ενημερώθηκαν επιτυχώς!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'Η επαναφορά των ρόλων του  phpBB συστήματος έγιναν επιτυχώς!',
	'DATABASE_ROLES_SUCCESS'		=> 'Οι ρόλοι ενημερώθηκαν επιτυχώς!',
	'DATAFILE_NOT_FOUND'			=> 'Η εργαλειοθήκη υποστήριξης δεν μπόρεσε να βρεί το κατάλληλο αρχείο δεδομένων για την έκδοση του phpBB!',

	'EMPTY_PREFIX'					=> 'Κανένα πρόθεμα βάσης',
	'EMPTY_PREFIX_CONFIRM'			=> 'Ο καθαριστής  βάσης δεδομένων πρόκειται να κάνει αλλαγές στους πίνακες της βάσης δεδομένων σας, αλλά εάν εσείς χρησιμοποιείτε ένα κενό πίνακα πρόθεμα αυτό μπορεί να επηρεάσει τους μη phpBB πίνακες. Είστε σίγουροι ότι θέλετε να συνεχίσετε?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'Ο καθαριστής της βάσης δεδομένων  έχει καθορίσει ότι εσείς έχετε βάλει ένα πρόθεμα στους πίνακες της βάσης δεδομένων του  phpBB. Ο καθαριστής βάσης θα ελέγξει <strong>όλους</strong> τους πίνακες στην βάση δεδομένων. Να προσέξετε ιδιαίτερα αυτήν την  διαδικασία και να βεβαιωθείτε ότι έχετε αποκλείσει τους πίνακες που δεν ανήκουν στο phpBB από την επιλογή. Αλλιώς θα καταστρέψει τους πίνακες που δεν ανήκουν στο phpBB.<br />Αν δεν είστε σίγουρος πως να προχωρήσετε ζητήστε βοήθεια στο <a href="http://www.phpbb.com/community/viewforum.php?f=46">phpBB Φόρουμ Υποστήριξης</a>.',
	'ERROR'							=> 'Σφάλμα',
	'EXTRA'							=> 'Πρόσθετα',
	'EXTENSION_GROUPS_SUCCESS'		=> 'Η επαναφορά της ομάδας επεκτάσεων έγινε με επιτυχία',
	'EXTENSIONS_SUCCESS'			=> 'Η επαναφορά της επέκτασης έγινε με επιτυχία',

	'FINAL_STEP'					=> 'Αυτό είναι το τελικό βήμα.<br /><br />Θα ενεργοποιήσουμε ξανά την Δ. Συζήτησή σας και θα καθαρίσουμε την προσωρινή μνήμη.',

	'INSTRUCTIONS'					=> 'Οδηγίες',

	'MISSING'						=> 'Λείπουν',
	'MODULE_UPDATE_SUCCESS'			=> 'Οι μονάδες ενημερώθηκαν επιτυχώς!',

	'NO_BOT_GROUP'					=> 'Τα bot δεν μπορούν να επαναρυθμιστούν, λείπει η ομάδα των Bot.',

	'PERMISSION_SETTINGS'			=> 'Επιλογές δικαιωμάτων',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Οι ρυθμίσεις δικαιωμάτων ενημερώθηκαν επιτυχώς!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Η έκδοση του phpBB3 δεν υποστηρίζεται (ή μερικά αρχεία από την εργαλειοθήκη υποστήριξης λείπουν).<br />Το phpBB 3.0.0+ υποστηρίζεται, αλλά μπορεί να πάρει λίγο χρόνο μέχρι ή νέα έκδοση phpBB3 να ανακοινωθεί και το παρόν εργαλείο να ενημερωθεί για να υποστηρίζει την νέα έκδοση του phpBB 3.0.',

	'QUIT'							=> 'Ακύρωση',

	'RESET_BOTS'					=> 'Επαναρύθμιση Bot',
	'RESET_BOTS_EXPLAIN'			=> 'Θέλετε να επαναρυθμίσετε τη λίστα bot στην αρχική λίστα του phpBB3;  Όλα τα υπάρχοντα bot θα διαγραφούν και θα αντικατασταθούν από το προεπιλεγμένο σετ.',
    'RESET_BOTS_SKIP'				=> 'Η επαναφορά των bot έχει γίνει παράβλεψη',
	'RESET_BOT_SUCCESS'				=> 'Τα bot επαναρυθμίστηκαν επιτυχώς!',
	'RESET_MODULES'					=> 'Επαναρύθμιση μονάδων',
	'RESET_MODULES_EXPLAIN'			=> 'Θέλετε να επαναρυθμίσετε τις μονάδες στις αρχικές του phpBB3;  Όλες οι υπάρχουσες μονάδες θα διαγραφούν και θα αντικατασταθούν από τις προεπιλεγμένες.',
	'RESET_MODULES_SKIP'			=> 'Έχει γίνει παράβλεψη επαναφοράς των μονάδων',
	'RESET_MODULE_SUCCESS'			=> 'Οι μονάδες επαναρυθμίστηκαν επιτυχώς!',
	'RESET_REPORT_REASONS'			=> 'Επαναφορά λόγοι αναφορών',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Θα θέλατε να επαναφέρετε τους λόγους αναφοράς στην προεπιλογή; Αυτό θα αφαιρέσει όλα τους προστιθέμενους λόγους αναφορών!',
	'RESET_REPORT_REASONS_SKIP'		=> 'Έχει γίνει επαναφορά των λόγων αναφορών',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'Έχει γίνει επιτυχής επαναφορά των λόγων αναφορών!',
	'RESET_ROLE_DATA'				=> 'Επαναφορά ρόλων δεδομένα',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Το βήμα αυτό θα επαναφέρει τους  ρόλους phpBB πίσω στην αρχική τους κατάσταση, προτείνετε ιδιαίτερα να εκτελέσετε αυτό αν έχετε κάνει αλλαγές στο προηγούμενο βήμα.',
	'ROWS'							=> 'Σειρές',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'Οι πίνακες δεν έχουν αλλάξει',
		'columns'			=> 'Οι στήλες δεν έχουν αλλάξει',
		'config'			=> 'Οι ρυθμίσεις δεν έχουν αλλάξει',
		'extension_groups'	=> 'Οι ομάδες επεκτάσεων δεν έχουν αλλάξει',
		'extensions'		=> 'Οι επεκτάσεις δεν έχουν αλλάξει',
		'permissions'		=> 'Τα δικαιώματα δεν έχουν αλλάξει',
		'groups'			=> 'Οι ομάδες δεν έχουν αλλάξει',
		'roles'				=> 'Οι ρόλοι δεν έχουν αλλάξει',
		'final_step'		=> 'Τελικό βήμα',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'Οι πίνακες στην βάση δεδομένων έχουν αλλάξει',
		'columns'			=> 'Οι στήλες στην βάση δεδομένων έχουν αλλάξει',
		'config'			=> 'Ο πίνακας των ρυθμίσεων δεν έχει νέες/ανύπαρκτες τιμές',
		'extension_groups'	=> 'Ο πίνακας των επεκτάσεων δεν έχει νέες/ανύπαρκτες τιμές',
		'extensions'		=> 'Η προεπιλεγμένη επέκταση έχει αλλαγές',
		'permissions'		=> 'Δεν υπάρχουν αλλαγές στον πίνακα δικαιωμάτων',
		'groups'			=> 'Δεν υπάρχουν αλλαγές στις ομάδες συστήματος του phpBB',
		'roles'				=> 'Δεν προστέθηκε ή διαγράφτηκε κανέςνας ρόλος',
		'final_step'		=> 'Αυτό το τελευταίο βήμα, θα σβήσει την προσωρινή λανθάνουσα μνήμη και θα ενεργοποιήσει εκ νέου την Δ. Συζήτηση.',
	),

	'SUCCESS'						=> 'Επιτυχία',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Η επαναφορά των ομάδων του συστήματος έχει επιτυχώς ',
	'TYPE'							=> 'Τύπος',
	'UNSTABLE_DEBUG_ONLY'			=> 'Ο καθαριστής βάσης μπορεί να τρέξει μόνο σε δοκιμαστικές εκδόσεις  phpBB <em>(dev ή RC)</em>, εάν η  "Αποσφαλμάτωση" είναι ενεργοποιημένη στο αρχείο config του phpBB.',
));
