<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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

/**
* DO NOT CHANGE
*/
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
// í ª ì î Ö
//

$lang = array_merge($lang, array(
	'REPARSE_ALL'				=> 'Ανάλυση όλων των BBCodes',
	'REPARSE_ALL_EXPLAIN'		=> 'Όταν γίνετε έλεγχος ανάλυσης των BBCode θα αναλύσει όλο το συνολικό περιεχόμενο του φόρουμ?  Προεπιλογή αυτό το εργαλείο θα αναλύσει μόνο  δημοσιεύσεις/προσωπικά μηνύματα/υπογραφές  που έχουν προηγουμένως αναλυθεί από το  phpBB.',
	'REPARSE_BBCODE'			=> 'Ξανά ανάλυση BBCode',
	'REPARSE_BBCODE_COMPLETE'	=> 'Τα BBCodes αναλύθηκαν ξανά.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Είστε σίγουρος ότι θέλετε να ξανά αναλύσετε όλα τα BBCodes; Παρακαλώ σημειώστε ότι αυτό το εργαλείο μπορεί να καταστρέψει την βάση δεδομένων σας, γι΄αυτό, <strong>σιγουρευτείτε ότι έχει πλήρες αντίγραφο ασφαλείας πριν προχωρήσετε</strong>. Επίσης, σημειώστε ότι αυτό το εργαλείο μπορεί να διαρκέσει λίγο μέχρι να ολοκληρωθεί.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Βήμα %1$d ολοκληρώθηκε. Μετάβαση στο βήμα %2$d σε λίγο...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Τέλος ανάλυσης των δημοσιεύσεων, συνέχεια με τα προσωπικά μηνύματα.',
		2	=> 'Τέλος ανάλυσης προσωπικών μηνυμάτων, συνέχεια με τις υπογραφές.',
	),
	'REPARSE_IDS_INVALID'			=> 'Οι ταυτότητες που ορίσατε δεν είναι έγκυρες; παρακαλώ καθορίστε την ταυτότητα των δημοσιεύσεων  σε μία χωριστά με κόμμα λίστα (π.χ. 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Ανάλυση καθορισμένων δημοσιεύσεων',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Για να αναλύσετε καθορισμένες δημοσιεύσεις, καθορίστε την ταυτότητα των δημοσιεύσεων  σε μία χωριστά με κόμμα λίστα.',
	'REPARSE_PM_IDS'				=> ' Ανάλυση καθορισμένων  ΠΜ',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Για να αναλύσετε καθορισμένα ΠΜ, καθορίστε την ταυτότητα των ΠΜ  σε μία χωριστά με κόμμα λίστα (π.χ. 1,2,3,5,8,13).',
));
