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
* @package   Support Toolkit - Anonymous group check
* @author    Maël Soucaze <maelsoucaze@phpbb.fr> (Maël Soucaze) http://www.phpbb.fr/
* @copyright (c) 2009 phpBB Group
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License
* @version   $Id: sanitize_anonymous_user.php 155 2009-06-13 20:06:09Z marshalrusty $
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
	'ANONYMOUS_CLEANED'					=> 'Les données de profil de l’utilisateur anonyme ont été nettoyées avec succès.',
	'ANONYMOUS_CORRECT'					=> 'L’utilisateur anonyme existe et a été configuré correctement.',
	'ANONYMOUS_CREATED'					=> 'L’utilisateur anonyme a été recréé avec succès.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Il n’a pas été possible de recréer l’utilisateur anonyme. Veuillez demander de l’aide sur le forum de support de phpBB.com ou de phpBB.fr.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'L’utilisateur anonyme a été supprimé de tous les groupes d’accès avec succès.',
	'ANONYMOUS_MISSING'					=> 'L’utilisateur anonyme est manquant.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'L’utilisateur anonyme est manquant dans votre base de données. Cet utilisateur est utilisé afin d’autoriser les invités à visiter votre forum. Souhaitez-vous en créer un nouveau ?',
	'ANONYMOUS_WRONG_DATA'				=> 'Les données de profil de l’utilisateur anonyme sont incorrectes.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Les données de profil de l’utilisateur anonyme sont partiellement incorrectes. Souhaitez-vous réparer cela ?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'L’utilisateur anonyme appartient anormalement à plusieurs groupes d’utilisateurs.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'L’utilisateur anonyme appartient anormalement à plusieurs groupes d’utilisateurs. Souhaitez-vous supprimer l’utilisateur anonyme de tous les groupes, mis à part du groupe “INVITÉS” ?',

	'REDIRECT_NEXT_STEP'				=> 'Vous allez être redirigé vers la prochaine étape.',

	'SANITISE_ANONYMOUS_USER'			=> 'Nettoyer l’utilisateur anonyme',
));

?>