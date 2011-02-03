<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'RESYNC_USER_GROUPS'			=> 'Resincronizare grupuri utilizatori',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Acest utilitar a fost construit pentru a verifica dacă toţi utilizatorii fac corect parte din grupurile standard <em>(Utilizatori înregistraţi, Utilizatori COPPA înregistraţi şi Utilizatori înregistraţi recent)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Toate grupurile par să fie actualizate!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Opţiuni resincronizare',
	'RUN_BOTH_FINISHED'				=> 'Toate grupurile de utilizatori au fost resincronizate cu succes!',
	'RUN_RNR'						=> 'Resincronizare utilizatori înregistraţi recent',
	'RUN_RNR_EXPLAIN'				=> 'Această procedură va actualiza grupul "Utilizatori înregistraţi recent" astfel încât să conţina toţi utilizatorii care corespund criteriului specificat în Panoul administratorului.',
	'RUN_RNR_FINISHED'				=> 'Grupul Utilizatori înregistraţi recent a fost resincronizat cu succes!',
	'RUN_RNR_NOT_FINISHED'			=> 'Grupul Utilizatori înregistraţi recent este în curs de resincronizare. Vă rugăm să nu întrerupeţi acest proces',
	'RUN_RR'						=> 'Resincronizare utilizatori înregistraţi',
	'RUN_RR_EXPLAIN'				=> 'Utilitarul a determinat că nu toţi utilizatorii forumului propriu fac parte din grupul "Utilizatori <em>(COPPA)</em> înregistraţi". Doriţi să resincronizaţi aceste grupuri?<br /><strong>Notă:</strong> Dacă forumul propriu are activată setarea COPPA şi un utilizator nu a specificat o dată de naştere atunci utilizatorul va fi plasat în grupul "Utilizatori COPPA înregistraţi"!',
	'RUN_RR_FINISHED'				=> 'Utilizatorii au fost resincronizaţi cu succes!',

	'SELECT_RUN_GROUP'	=> 'Selectaţi cel puţin un tip de grup care va fi resincronizat.',
));

?>