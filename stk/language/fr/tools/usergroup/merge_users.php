<?php
/**
*
* [french]
*
* @package Support Toolkit - Merge Users
* @version $Id:	papicx	1.0.7	05/05/2013	21h10	$
* @copyright (c) 2009 phpBB Group, (c) 2009 phpBB.fr
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'MERGE_USERS'						=> 'Fusionner les utilisateurs',
	'MERGE_USERS_EXPLAIN'				=> 'Cet outil vous permet de déplacer les éléments d’un compte d’utilisateur dans un autre compte. Les éléments incluent les permissions, les fichiers joints, les bannissements, les favoris, les brouillons, les adhésions aux groupes, aux forums, aux sujets et aux messages, les historiques, les votes aux sondages, les messages, les messages privés, les rapports, les sujets, les avertissements, les amis et les ignorés.<br /><strong>Vous pouvez entrer le Nom d’utilisateur ou l’ID utilisateur, mais pas les deux.</strong>',

	'MERGE_USERS_BOTH_FOUNDERS'			=> 'Vous ne pouvez pas fusionner un fondateur avec un utilisateur qui n’en est pas un.',
	'MERGE_USERS_BOTH_IGNORE'			=> 'Vous ne pouvez pas fusionner un robot avec un utilisateur normal.',

	'MERGE_USERS_MERGED'				=> 'Les utilisateurs ont été fusionnés.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Supprimer l’utilisateur source',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Si coché, cet outil supprimera l’utilisateur source du forum.',

	'MERGE_USERS_SAME_USERS'			=> 'Les utilisateurs source et cible doivent être différents.',

	'MERGE_USERS_USER_SOURCE_ID'			=> 'Utilisateur source. (ID d’utilisateur)',
	'MERGE_USERS_USER_SOURCE_NAME'			=> 'Utilisateur source. (Nom d’utilisateur)',
	'MERGE_USERS_USER_SOURCE_NAME_EXPLAIN'	=> 'Les messages, les messages privés, les permissions, les avertissements… sont déplacés de cet utilisateur dans l’utilisateur cible, les adhésions aux groupes et les réglages de l’utilisateur sont copiés.',

	'MERGE_USERS_USER_TARGET_NAME'		=> 'Utilisateur cible. (Nom d’utilisateur)',
	'MERGE_USERS_USER_TARGET_ID'		=> 'Utilisateur cible. (ID d’utilisateur)',

	'NO_SOURCE_USER'					=> 'L’utilisateur source demandé n’existe pas',
	'NO_TARGET_USER'					=> 'L’utilisateur cible demandé n’existe pas',

	'BOTH_SOURCE_USER'					=> 'Remplir un champ source seulement.',
	'BOTH_TARGET_USER'					=> 'Remplir un champ cible seulement.',
));
