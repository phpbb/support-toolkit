<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'MYSQL_UPGRADER'					=> 'MySQL Αναβάθμιση',
	'MYSQL_UPGRADER_BACKUP'				=> 'Το εργαλείο αυτό είναι αρκετά επικίνδυνο? βεβαιωθείτε ότι έχετε κάνει ένα αντίγραφο ασφαλείας της βάσης δεδομένων σας πριν προχωρήσετε!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Το εργαλείο αυτό έχει σχεδιαστεί για να επιλύσει ορισμένα προβλήματα που προκαλούνται όταν η βάση δεδομένων MySQL που χρησιμοποιείται από την εγκατάσταση phpBB σας αναβαθμίζεται. Η αναβάθμιση αυτή θα ενημερώσει το σχήμα βάσης δεδομένων  με τη νέα έκδοση <em>Μπορείτε να δείτε σχετικό “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>” ΒΓ άρθρο.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Μεταφόρτωση',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Με τον έλεγχο αυτής της επιλογής της MySQL αναβάθμιση για να δημιουργήσει τα ερωτήματα και να εμφανίσει το αποτέλεσμα σε  σας, από εκεί μπορείτε να κατεβάσετε το αρχείο με τα  αποτελέσματα.',
	'MYSQL_UPGRADER_RESULT'				=> 'Ακολουθούν οι ερωτήσεις που πρέπει να τρέξετε για να ενημερώσετε το σχήμα βάσης  δεδομένων για τη σωστή έκδοση MySQL. Πατήστε <a href="%s">εδώ</a> για να μεταφορτώσετε τα ερωτήματα σε ένα .sql αρχείο.',
	'MYSQL_UPGRADER_RUN'				=> 'Εκτέλεση',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Με τον έλεγχο αυτής της επιλογής της MySQL αναβάθμιση για να δημιουργήσει τα ερωτήματα και να εκτελέσει αυτόματα το αποτέλεσμα στην βάση δεδομένων σας. <br /> Αυτό θα μπορούσε να πάρει κάποιο χρόνο, <strong> μην </ strong> διακόψετε αυτή τη διαδικασία, έως ότου το εργαλείο σας ειδοποιήσει ότι είναι έτοιμο.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'Χειρόγραφο αναβάθμισης MySQL',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'Η αναβάθμιση της MySQL έχει εκτελεστεί επιτυχώς',
	
	'QUERY_FINISHED'	=> 'Ολοκλήρωση εκτέλεσης ερωτήματος  %1$d of %2$d, προχωρήστε στο επόμενο βήμα.',

	'TOOL_MYSQL_ONLY'	=> 'Αυτό το εργαλείο είναι διαθέσιμο μόνο για τους χρήστες του MySQL DBMS',
));
