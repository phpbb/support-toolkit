<?php
/**
*
* @package Support Toolkit - Make Founder
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
	'DEMOTE_FAILED'				=> 'Δεν ήταν δυνατό να αφαιρεθεί η κατάσταση Ιδρυτή από όλους τους χρήστες!',
	'DEMOTE_FOUNDERS'			=> 'Υποβιβασμός ιδρυτών',
	'DEMOTE_SUCCESSFULL'		=> 'Επιτυχής αφαίρεση κατάστασης ιδρυτή από %d χρήστες!',

	'FOUNDERS'					=> 'Χρήστες με κατάσταση ιδρυτή',

	'MAKE_FOUNDER'				=> 'Κάντε έναν χρήστη Ιδρυτή',
	'MAKE_FOUNDER_CONFIRM'		=> 'Είστε σίγουροι οτι θέλετε να κάνετε τον <a href="%1$s">%2$s</a> Ιδρυτή;  Αυτό θα δώσει στον <a href="%1$s">%2$s</a> την ικανότητα να διαγράψει τον λογαριασμό σας, όπως και άλλες δυνατότητες.',
	'MAKE_FOUNDER_FAILED'		=> 'Δεν ήταν δυνατό να προβιβαστεί ο χρήστης σε ιδρυτή',
	'MAKE_FOUNDER_SUCCESS'		=> 'Ο χρήστης <a href="%1$s">%2$s</a> έγινε επιτυχώς ιδρυτής.',
	'MANAGE_FOUNDERS'			=> 'Διαχείρηση ιδρυτών',

	'NO_FOUNDERS'				=> 'Δεν βρέθηκε ιδρυτής',
	
	'PROMOTE_FOUNDER'			=> 'Προβιβασμός σε ιδρυτή',

	'USER_TO_FOUNDER'			=> 'Χρήστης για να γίνει ιδρυτής',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'Εισάγετε το όνομα χρήστη ή το ID χρήστη του χρήστη που θέλετε να κάνετε ιδρυτή.',
));
