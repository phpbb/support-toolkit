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
* @package   Support Toolkit - Restore Delted Users
* @author    Maël Soucaze <maelsoucaze@gmail.com> http://mael.soucaze.com/
* @copyright (c) 2009 phpBB Group
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License
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
	'NO_DELETED_USERS'	=> 'Il n’y a aucun utilisateur supprimé pouvant être restauré',
	'NO_USER_SELECTED'	=> 'Aucun utilisateur n’a été sélectionné !',

	'RESTORE_DELETED_USERS'						=> 'Restaurer les utilisateurs supprimés',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Restaurer les utilisateurs supprimés :: En conflit',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Cet outil vous permet de restaurer des utilisateurs qui ont été supprimés à partir du forum mais qui conservent des messages en “invité”.<br />Ces utilisateurs se verront assigner un mot de passe aléatoire que vous devrez réinitialiser manuellement après que l’outil ait été exécuté. Cet outil ne fournit pas une liste de mots de passe générés par utilisateur !<br /><br />Durant sa dernière exécution, cet outil a trouvé certains noms d’utilisateurs qui existent déjà sur ce forum. Veuillez fournir un nouveau nom concernant ces utilisateurs.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Cet outil vous permet de restaurer des utilisateurs qui ont été supprimés à partir du forum mais qui conservent des messages en “invité”.<br />Ces utilisateurs se verront assigner un mot de passe aléatoire que vous devrez réinitialiser manuellement après que l’outil ait été exécuté. Cet outil ne fournit pas une liste de mots de passe générés par utilisateur !',

	'SELECT_USERS'	=> 'Sélectionner les utilisateurs à restaurer',

	'USER_RESTORED_SUCCESSFULLY'	=> 'L’utilisateur que vous avez sélectionné a été restauré avec succès.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'Les utilisateurs que vous avez sélectionné ont été restaurés avec succès.',
));

?>