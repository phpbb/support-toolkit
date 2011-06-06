<?php
/**
 *
 * @package Support Toolkit - Flash checker
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
	'FLASH_CHECKER'				=> 'Flash έλεγχος',
	'FLASH_CHECKER_CONFIRM'		=> 'Στην έκδοση phpBB 3.0.7-pl1, ένα πιθανό κενό XSS vulnerability βρέθηκε στο ενσωματωμένο flash BBCode. Αυτό το κενό έχει διορθωθεί στην έκδοση phpBB 3.0.8. Αυτό το εργαλείο θα ελέγξει όλες τις δημοσιεύσεις, προσωπικά μηνύματα, και οι υπογραφές για αυτό το ευάλωτο BBCode. Αν βρεθεί κάτι αυτό σας επιτρέπει να διορθώσετε γρήγορα  τις δημοσιεύσεις αυτές και να βεβαιωθείτε ότι η ιστοσελίδα σας είναι ασφαλές. Ελέγξτε <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">την ανακοίνωση  για την έκδοση phpBB 3.0.8</a> για περισσότερες πληροφορίες σχετικά με αυτό το θέμα ασφαλείας.',
	'FLASH_CHECKER_FOUND'		=> 'Ο έλεγχος flash βρήκε μερικά επικίνδυνα  flash BBCodes στην ιστοσελίδα σας. Πατήστε <a href="%s">εδώ</a>  για να διορθώσετε τις δημοσιεύσεις και τα προσωπικά μηνύματα που περιέχουν τα επικίνδυνα flash BBCode .',
	'FLASH_CHECKER_NO_FOUND'	=> 'Κανένα επικίνδυνο  flash BBCodes δεν βρέθηκε.',
));
