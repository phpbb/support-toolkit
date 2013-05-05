<?php
/**
*
* [french]
*
* @package Support Toolkit - Orphaned posts/topics
* @version $Id:	papicx	1.0.7	05/05/2013	16h07	$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @Translation phpBB-fr http://www.phpbb-fr.com
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'AUTHOR'					=> 'Auteur',
	'FORUM_NAME'				=> 'Nom du forum',
	'NEW_TOPIC_ID'				=> 'Nouvel ID du sujet',
	'POST_ID'					=> 'ID du message',
	'TOPIC_ID'					=> 'ID du sujet',

	'DELETE_EMPTY_TOPICS'		=> 'Supprimer tous les sujets sélectionnés en cliquant sur ce bouton. (Cette opération est irréversible !)',
	'EMPTY_TOPICS'				=> 'Sujets vides',
	'EMPTY_TOPICS_EXPLAIN'		=> 'Correspond à des sujets n’ayant pas de messages leur étant associés.',
	'NO_EMPTY_TOPICS'			=> 'Aucun sujet vide trouvé',
	'NO_TOPICS_SELECTED'		=> 'Aucun sujet sélectionné',

	'ORPHANED_POSTS'			=> 'Messages orphelins',
	'ORPHANED_POSTS_EXPLAIN'	=> 'Correspond à des messages n’étant pas associés à un sujet. Spécifiez un nouvel ID de sujet pour attacher le message à ce sujet.',
	'NO_ORPHANED_POSTS'			=> 'Aucun message orphelin n’a été trouvé',
	'NO_TOPIC_IDS'				=> 'Aucun ID de sujet indiqué',
	'NONEXISTENT_TOPIC_IDS'		=> 'Les ID de sujet cibles suivants n’existent pas : %s.<br />Veuillez vérifier les ID de sujet spécifiés.',
	'REASSIGN'					=> 'Réaffecter',

	'DELETE_SHADOWS'			=> 'Supprimer tous les sujets fantômes sélectionnés en cliquant sur ce bouton. (Cette opération est irréversible !)',
	'ORPHANED_SHADOWS'			=> 'Sujets fantômes orphelins',
	'ORPHANED_SHADOWS_EXPLAIN'	=> 'Correspond à des sujets fantômes dont le sujet cible n’existe plus.',
	'NO_ORPHANED_SHADOWS'		=> 'Pas de sujets fantômes orphelins trouvés',

	'POSTS_DELETED'				=> '%d messages supprimés',
	'POSTS_REASSIGNED'			=> '%d messages re-affectés',
	'TOPICS_DELETED'			=> '%d sujets supprimés',
));
