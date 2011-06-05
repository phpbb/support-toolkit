<?php
/**
*
* @package Support Toolkit - Update email hashes
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
    'UPDATE_EMAIL_HASHES'                => 'Ενημέρωση κωδικών κατακερματισμού διευθύνσεων email',
    'UPDATE_EMAIL_HASHES_CONFIRM'        => 'Σε εγκαταστάσεις phpBB  πριν από την 3.0.7, μια αλλαγή από 32 bit λειτουργικό σύστημα(ΛΣ) σε 64 bit ΛΣ θα κατέστρεφε τους κωδικούς κατακερματισμού των email. <em>(<a href="http://tracker.phpbb.com/browse/PHPBB3-9072">Προβολή της σχετικής αναφοράς bug</a>)</em><br />Αυτό το εργαλείο επιτρέπει την ενημέρωση των κωδικών κατακερματισμού στην βάση δεδομένων για να λειτουργούν σωστά.',
    'UPDATE_EMAIL_HASHES_COMPLETE'        => 'Όλοι οι κωδικοί κατακερματισμού των email ενημερώθηκαν επιτυχώς!',
    'UPDATE_EMAIL_HASHES_NOT_COMPLETE'    => 'Ενημέρωση κωδικών κατακερματισμού emailσε εξέλιξη.',
));
