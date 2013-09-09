<?php
/**
*
* @package Support Toolkit - Orphaned posts/topics
* @version $Id$
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
	'AUTHOR'					=> 'Auteur',
	'FORUM_NAME'				=> 'Forum Naam',
	'NEW_TOPIC_ID'				=> 'Nieuw onderwerp ID',
	'POST_ID'					=> 'Bericht ID',
	'TOPIC_ID'					=> 'Onderwerp ID',

	'DELETE_EMPTY_TOPICS'		=> 'Verwijder de geselecteerde onderwerpen. (Dit kan niet ongedaan worden gemaakt!)',
	'EMPTY_TOPICS'				=> 'Verwijder onderwerpen',
	'EMPTY_TOPICS_EXPLAIN'		=> 'Berichtloze onderwerpen.',
	'NO_EMPTY_TOPICS'			=> 'Geen berichtloze onderwerpen gevonden',
	'NO_TOPICS_SELECTED'		=> 'Geen onderwerpen geselecteerd',

	'ORPHANED_POSTS'			=> 'Niet toegewezen berichten',
	'ORPHANED_POSTS_EXPLAIN'	=> 'Dit zijn berichten welke niet toegewezen zijn aan een topic. Selecteer een topic ID om de berichten te verplaatsen naar het geselecteerde topic.',
	'NO_ORPHANED_POSTS'			=> 'Geen berichten gevonden welke nog niet zijn toegewezen.',
	'NO_TOPIC_IDS'				=> 'Geen onderwerp IDs opgegeven',
	'NONEXISTENT_TOPIC_IDS'		=> 'Het volgende doel onderwerp ID bestaat niet: %s.<br />Controleer de opgegeven onderwerp IDs.',
	'REASSIGN'					=> 'Verplaats',

	'DELETE_SHADOWS'			=> 'Verwijder alle geselecteerde gekopieerde onderwerpen. (Kan niet ongedaan worden gemaakt!)',
	'ORPHANED_SHADOWS'			=> 'Niet toegewezen onderwerpen',
	'ORPHANED_SHADOWS_EXPLAIN'	=> 'Dit zijn niet toegewezen onderwerpen waarvan het doelonderwerp niet langer bestaat.',
	'NO_ORPHANED_SHADOWS'		=> 'Geen berichtloze gekopieerde onderwerpen gevonden',

	'POSTS_DELETED'				=> '%d berichten verwijderd',
	'POSTS_REASSIGNED'			=> '%d berichten verplaatst',
	'TOPICS_DELETED'			=> '%d onderwerpen verwijderd',
));
