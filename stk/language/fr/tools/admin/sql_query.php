<?php
/**
*
* This file is part of French STK translation.
* Copyright (c) 2010 Maël Soucaze.
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; version 2 of the License.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along
* with this program; if not, write to the Free Software Foundation, Inc.,
* 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*
* @package   Support Toolkit - SQL Query
* @author    Maël Soucaze <maelsoucaze@gmail.com> (Maël Soucaze) http://mael.soucaze.com/
* @copyright (c) 2009 phpBB Group
* @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
* @version   $Id$
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
	'NO_RESULTS'					=> 'Aucun résultat',
	'NO_SQL_QUERY'					=> 'Vous devez saisir une requête à exécuter.',

	'QUERY_RESULT'					=> 'Résultats de la requête',

	'SHOW_RESULTS'					=> 'Afficher les résultats',
	'SQL_QUERY'						=> 'Exécuter une requête SQL',
	'SQL_QUERY_EXPLAIN'				=> 'Saisissez la requête SQL que vous souhaitez exécuter. L’outil remplacera “phpbb_” par votre préfixe de table.<br />Si vous avez coché l’affichage des résultats, l’outil affichera les résultats <em>(s’il y en a)</em> de la requête.',

	'SQL_QUERY_LEGEND'				=> 'Requête SQL',
	'SQL_QUERY_SUCCESS'				=> 'La requête SQL a été exécutée avec succès.',
));

?>