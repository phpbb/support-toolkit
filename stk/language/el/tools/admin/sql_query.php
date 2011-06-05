<?php
/**
*
* @package Support Toolkit - SQL Query
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
	'ERROR_QUERY'					=> 'Ερώτημα που περιέχει το λάθος',

	'NO_RESULTS'					=> 'Κανένα αποτέλεσμα',
	'NO_SQL_QUERY'					=> 'Πρέπει να εισαγάγετε ένα ερώτημα για να εκτελεστεί',

	'QUERY_RESULT'					=> 'Αποτελέσματα ερωτήματος',

	'SHOW_RESULTS'					=> 'Προβολή αποτελεσμάτων',
	'SQL_QUERY'						=> 'Εκτέλεση ερωτήματος SQL',
	'SQL_QUERY_EXPLAIN'				=> 'Εισαγάγετε το ερώτημα SQL που επιθυμείτε να εκτελέσετε. Αυτό το εργαλείο θα αντικαταστήσει το πρόθεμα "phpbb_" με το δικό σας πρόθεμα. <br />Αν το "Δείτε τα αποτελέσματα" κουτάκι είναι επιλεγμένο το εργαλείο θα εμφανίσει τα αποτελέσματα <em>(εάν υπάρχουν)</em> του ερωτήματος.',

	'SQL_QUERY_LEGEND'				=> 'Ερώτημα SQL',
	'SQL_QUERY_SUCCESS'				=> 'Το ερώτημα SQL εκτελέστηκε επιτυχώς.',
));
