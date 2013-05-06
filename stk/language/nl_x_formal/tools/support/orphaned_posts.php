<?php
/**
*
* @package Support Toolkit - Orphaned posts/topics
* @version $Id$
* @copyright (c) 2009 phpBB Group , 2013 http://www.phpBBservice.nl
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
	'AUTHOR'					=> 'Auteur',
	'FORUM_NAME'				=> 'Forumnaam',
	'NEW_TOPIC_ID'				=> 'Nieuw onderwerp-ID',
	'POST_ID'					=> 'Bericht-ID',
	'TOPIC_ID'					=> 'Onderwerp-ID',

	'DELETE_EMPTY_TOPICS'		=> 'Verwijder alle geselecteerde berichten door te klikken op deze knop. (Dit kan niet worden teruggedraaid!)',
	'EMPTY_TOPICS'				=> 'Lege onderwerpen',
	'EMPTY_TOPICS_EXPLAIN'		=> 'Dit zijn onderwerpen die geen berichten bevatten.',
	'NO_EMPTY_TOPICS'			=> 'Geen lege onderwerpen gevonden',
	'NO_TOPICS_SELECTED'		=> 'Geen onderwerpen geslecteerd.',

	'ORPHANED_POSTS'			=> 'Berichtloze berichten',
	'ORPHANED_POSTS_EXPLAIN'	=> 'Dit zijn berichten waar geen onderwerp is aan toegewezen. Selecteer een nieuw onderwerp-ID, aan dit onderwerp zal dan het bericht worden toegewezen.',
	'NO_ORPHANED_POSTS'			=> 'Geen berichtloze berichten gevonden',
	'NO_TOPIC_IDS'				=> 'Geen onderwerp-ID opgegeven',
	'NONEXISTENT_TOPIC_IDS'		=> 'De volgende doelonderwerp-ID(s) bestaan niet: %s.<br />Controleer de opgegeven onderwerp-IDs.',
	'REASSIGN'					=> 'Hertoewijzen',

	'DELETE_SHADOWS'			=> 'Verwijder alle geselecteerde schaduwonderwerpen door te klikken op deze knop. (Dit kan niet worden teruggedraaid!)',
	'ORPHANED_SHADOWS'			=> 'Berichtloze schaduwonderwerpen',
	'ORPHANED_SHADOWS_EXPLAIN'	=> 'Dit zijn schaduwonderwerpen waarvan het doelonderwerp niet meer van bestaat.',
	'NO_ORPHANED_SHADOWS'		=> 'Geen berichtloze schaduwonderwerpen gevonden',

	'POSTS_DELETED'				=> '%d berichten verwijderd',
	'POSTS_REASSIGNED'			=> '%d berichten hertoegewezen',
	'TOPICS_DELETED'			=> '%d onderwerpen verwijderd',
));
