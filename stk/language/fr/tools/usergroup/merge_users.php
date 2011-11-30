<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @copyright (c) 2009 phpBB Group, (c) 2009 phpBB.fr
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License 2.0
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
	'MERGE_USERS'						=> 'Fusionner les utilisateurs',
	'MERGE_USERS_EXPLAIN'				=> 'Cet outil vous permet de déplacer les réglages d’un compte d’utilisateur dans un autre compte. Les réglages incluent les permissions, les pièces jointes, les bannissements, les favoris, les brouillons, les adhésions aux groupes, aux forums, aux sujets et aux messages, les historiques, les votes aux sondages, les messages, les messages privés, les rapports, des sujets, les avertissements, les amis et les ignorés.',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'Vous ne pouvez pas fusionner un fondateur avec un utilisateur qui n’en est pas un.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'Vous ne pouvez pas fusionner un robot avec un utilisateur normal.',

	'MERGE_USERS_MERGED'		=> 'Les utilisateurs ont été fusionnés.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Supprimer l’utilisateur source',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Si coché, cet outil supprimera l’utilisateur source du forum.',

	'MERGE_USERS_SAME_USERS'	=> 'Les utilisateurs source et cible doivent être différents.',

	'MERGE_USERS_USER_SOURCE'			=> 'Utilisateur source',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Les messages, les messages privés, les permissions, les avertissements, etc. sont déplacés de cet utilisateur dans l’utilisateur cible, les adhésions aux groupes et les réglages de l’utilisateur sont copiés.',

	'MERGE_USERS_USER_TARGET'	=> 'Utilisateur cible',
));