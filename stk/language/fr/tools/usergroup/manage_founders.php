<?php
/**
*
* This file is part of French (Formal Honorifics) STK translation.
* Copyright (C) 2010 phpBB.fr
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
* @package   Support Toolkit - Make Founder
* @author    Maël Soucaze <maelsoucaze@phpbb.fr> (Maël Soucaze) http://www.phpbb.fr/
* @copyright (c) 2009 phpBB Group
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License
* @version   $Id: manage_founders.php 336 2010-04-02 11:13:36Z erikfrerejean $
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
	'DEMOTE_FAILED'				=> 'Impossible de supprimer le statut de fondateur de tous les utilisateurs !',
	'DEMOTE_FOUNDERS'			=> 'Rétrograder les fondateurs',
	'DEMOTE_SUCCESSFULL'		=> 'Le statut de fondateur a été supprimé de %d utilisateurs avec succès !',

	'FOUNDERS'					=> 'Utilisateurs ayant le statut de fondateur',

	'MAKE_FOUNDER'				=> 'Promouvoir un utilisateur en fondateur du forum',
	'MAKE_FOUNDER_CONFIRM'		=> 'Êtes-vous sûr de vouloir promouvoir <a href="%1$s">%2$s</a> en fondateur du forum ? Cela permettra, entre autres, à <a href="%1$s">%2$s</a> de pouvoir supprimer votre compte.',
	'MAKE_FOUNDER_FAILED'		=> 'Impossible de promouvoir cet utilisateur en fondateur',
	'MAKE_FOUNDER_SUCCESS'		=> '<a href="%1$s">%2$s</a> a été promu en fondateur du forum avec succès.',
	'MANAGE_FOUNDERS'			=> 'Gérer les fondateurs du forum',

	'NO_FOUNDERS'				=> 'Aucun fondateur n’a été trouvé',

	'PROMOTE_FOUNDER'			=> 'Promouvoir en fondateur',

	'USER_TO_FOUNDER'			=> 'Utilisateur à promouvoir en fondateur',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'Saisissez le nom ou l’ID de l’utilisateur que vous souhaitez promouvoir en fondateur.',
));

?>
