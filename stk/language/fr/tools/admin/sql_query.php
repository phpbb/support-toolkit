<?php
/**
*
* [french]
*
* @package Support Toolkit - SQL Query
* @version $Id:	papicx	1.0.7	18/04/2013	14h47	$
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
	'ERROR_QUERY'		=> 'Requête contenant l’erreur',

	'NO_RESULTS'		=> 'Aucun résultat',
	'NO_SQL_QUERY'		=> 'Vous devez saisir une requête à exécuter.',

	'QUERY_RESULT'		=> 'Résultats de la requête',

	'SHOW_RESULTS'		=> 'Afficher les résultats',
	'SQL_QUERY'			=> 'Exécuter une requête SQL',
	'SQL_QUERY_EXPLAIN'	=> 'Saisissez la requête SQL que vous souhaitez exécuter. L’outil remplacera « phpbb_ » par votre préfixe de table.<br />Si vous avez coché l’affichage des résultats, l’outil affichera les résultats <em>(s’il y en a)</em> de la requête.',

	'SQL_QUERY_LEGEND'	=> 'Requête SQL',
	'SQL_QUERY_SUCCESS'	=> 'La requête SQL a été exécutée.',
));
