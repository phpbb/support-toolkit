<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @version $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
* @translate $Id: sanitize_anonymous_user.php 155 2010-02-14 14:26:04 dorin rosculete $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'ANONYMOUS_CLEANED'					=> 'Profilul vizitatorilor anonimi a fost sterilizat cu succes.',
	'ANONYMOUS_CORRECT'					=> 'Vizitatorul anonim există şi este corect configurat.',
	'ANONYMOUS_CREATED'					=> 'Vizitatorul anonim au fost recreat cu succes.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Reerearea utilizatorului anonim nu a fost posibilă. Vă rugăm să cereţi ajutor suplimentar pe forumul phpBB.ro.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'Utilizatorul anonim a fost şters din toate grupurile cu acces.',
	'ANONYMOUS_MISSING'					=> 'Utilizatorul anonim lipseşte.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'Utilizatorul anonim lipseşte din baza de date. Acest utilizator este folosit pentru a permite vizitatorilor să acceseze forumul dumneavoastră. Nu doriţi să creaţi unul nou acum?',
	'ANONYMOUS_WRONG_DATA'				=> 'Datele profilului utilizatorului anonim sunt incorecte.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Datele profilului utilizatorului anonim sunt parţial incorecte. Doriţi repararea acestei probleme?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Utilizatorul anonim face parte în mod abuziv din mai multe grupuri de utilizatori.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Utilizatorul anonim face parte în mod abuziv din mai multe grupuri de utilizatori. Doriţi ştergerea utilizatorului anonim din toate grupurile mai puţin grupul de "VIZITATORI"?',

	'REDIRECT_NEXT_STEP'				=> 'Sunteţi redirecţionat la pasul următor.',

	'SANITISE_ANONYMOUS_USER'			=> 'Sterilizare utilizator anonim',
));

?>