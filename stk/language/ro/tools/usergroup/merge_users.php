<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id: merge_users.php 348 2010-04-20 19:37:47Z erikfrerejean $
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Unire utilizatori',
	'MERGE_USERS_EXPLAIN'				=> 'Utilitarul mută tot ce ţine de un anumit utilizator în alt cont, setările şi grupurile utilizatorilor sursă fiind copiate. Acestea includ permisiunile utilizatorului, suspendările, marcajele, mesajele în lucru, urmărirea subiectelor/forumurilor, înregistrările din jurnal, voturile din chestionare, mesajele, mesajele private, rapoartele, subiectele, avertismentele, prietenii şi persoanele neagreate.',

  'MERGE_USERS_BOTH_FOUNDERS'	=> 'Nu puteţi să uniţi un fondator cu un utilizator care nu este fondator.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Nu puteţi să uniţi un robot cu un utilizator normal.',

	'MERGE_USERS_MERGED'		=> 'Utilizatori uniţi cu succes.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Şterge utilizatorul sursă',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Dacă este activată, utilitarul va şterge utilizatorul sursă de pe forum.',

	'MERGE_USERS_SAME_USERS'	=> 'Utilizatorii sursă şi destinaţie trebuie să fie diferiţi.',

	'MERGE_USERS_USER_SOURCE'			=> 'Utilizator sursă',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Mesajele, Mesajele private, permisiunile, avertismentele, et cetera sunt mutate de la acest utilizator la utilizatorul destinaţie iar apartenenţa la grupuri şi setările utilizatorului sunt copiate.',

	'MERGE_USERS_USER_TARGET'	=> 'Utilizator destinaţie',
));

?>