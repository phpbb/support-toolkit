<?php
/**
*
* [french]
*
* @package Support Toolkit - Profile List
* @version $Id:	papicx	1.0.7	05/05/2013	19h48	$
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'ALL'						=> 'Tous',

	'CLICK_TO_DELETE'			=> 'Supprimer tous les utilisateurs sélectionnés en cliquant sur ce bouton. <em>Attention, cette action est irréversible !</em>',

	'FILTER'					=> 'Filtre',

	'LIMIT'						=> 'Limite',

	'ONLY_NON_EMPTY'			=> 'Remplis uniquement',
	'ORDER_BY'					=> 'Trier par',

	'PROFILE_LIST'				=> 'Liste des profils',
	'PROFILE_LIST_EXPLAIN'		=> 'Cet outil affiche les informations de profil de plusieurs utilisateurs. Il peut également être utilisé afin de vous aider dans l’identification des comptes de spammeurs.',

	'USERS_DELETE'				=> 'Supprimer les utilisateurs sélectionnés',
	'USERS_DELETE_CONFIRM'		=> 'Êtes-vous sûr(e) de vouloir supprimer les utilisateurs sélectionnés ? Cet outil supprimera également <strong>tous</strong> leurs messages !',
	'USERS_DELETE_SUCCESSFULL'	=> 'Tous les utilisateurs sélectionnés ont été supprimés, ainsi que tous leurs messages !',
));
