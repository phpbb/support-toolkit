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
* @package   Support Toolkit - Database Cleaner
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
	'BOARD_DISABLE_REASON'			=> 'Le forum est actuellement désactivé car une maintenance de la base de données est en cours. Merci de revenir ultérieurement !',
	'BOARD_DISABLE_SUCCESS'			=> 'Le forum a été désactivé avec succès !',

	'COLUMNS'						=> 'Colonnes',
	'CONFIG_SETTINGS'				=> 'Réglages de la configuration',
	'CONFIG_UPDATE_SUCCESS'			=> 'Les réglages de la configuration ont été mis à jour avec succès !',
	'CONTINUE'						=> 'Continuer',

	'DATABASE_CLEANER'				=> 'Nettoyeur de base de données',
	'DATABASE_CLEANER_EXTRA'		=> 'Tous les autres sont des objets supplémentaires ajoutés par des modifications. <strong>Si la case est cochée, ils seront supprimés</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Tous les champs surlignés sur un fond rouge comme celui-ci sont des objets manquants qui devraient être ajoutés. <strong>Si la case est cochée, ils seront ajoutés</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Le nettoyeur de base de données a terminé toutes ses tâches avec succès !<br /><br />Veuillez vous assurer de sauvegarder à nouveau votre base de données.',
	'DATABASE_CLEANER_WARNING'		=> 'Cet outil n’apporte AUCUNE GARANTIE et les utilisateurs de cet outil devraient sauvegarder entièrement leur base de données en cas d’échec.<br /><br />Avant de continuer, veuillez vous assurer de détenir une sauvegarde de votre base de données !',
	'DATABASE_CLEANER_WELCOME'		=> 'Bienvenue sur l’outil de nettoyage de la base de données !<br /><br />Cet outil a été créé afin de supprimer les colonnes, les lignes et les tables supplémentaires de votre base de données qui ne sont pas présentes par défaut dans l’installation de phpBB3, et il ajoute les éléments manquants qui peuvent être nécessaires dans la base de données.<br /><br />Lorsque vous êtes prêt à continuer, veuillez cliquer sur le bouton “continuer” afin de commencer à utiliser l’outil de nettoyage de la base de données (veuillez noter que votre forum sera désactivé le temps de l’opération).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Les colonnes de la base de données ont été mises à jour avec succès !',
	'DATABASE_TABLES'				=> 'Tables de la base de données',
	'DATABASE_TABLES_SUCCESS'		=> 'Les tables de la base de données ont été mises à jour avec succès !',
	'DATAFILE_NOT_FOUND'			=> 'Le Support Toolkit n’a pas été capable de trouver le fichier de données que vous recherchez concernant votre version de phpBB !',

	'EMPTY_PREFIX'					=> 'Aucun préfixe de base de données',
	'EMPTY_PREFIX_CONFIRM'			=> 'Le nettoyeur de base de données permet d’apporter des modifications aux tables de votre base de données, mais étant donné que vous n’utilisez pas de préfixe de table, cela peut altérer des tables n’ayant aucun rapport avec phpBB. Êtes-vous sûr de vouloir continuer ?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'Le nettoyeur de base de données a déterminé que vous n’utilisez pas de préfixe de table concernant les tables de phpBB. Le nettoyeur de base de données va devoir alors vérifier <strong>l’intégralité</strong> des tables dans votre base de données. Soyez prudent lors de son exécution et assurez-vous d’avoir exclu de la sélection toutes les tables n’ayant aucun rapport avec phpBB car elles peuvent être altérées par cet outil.<br />Si vous avez un doute sur la manipulation à suivre, demandez de l’aide dans les <a href="http://www.phpbb.com/community/viewforum.php?f=46">forums de support de phpBB</a>.',
	'ERROR'							=> 'Erreur',
	'EXTRA'							=> 'Supplémentaire',

	'FINAL_STEP'					=> 'Ceci est l’étape finale.<br /><br />Nous allons à présent réactiver votre forum et purger son cache.',

	'INSTRUCTIONS'					=> 'Instructions',

	'MISSING'						=> 'Manquant',
	'MODULE_UPDATE_SUCCESS'			=> 'Les modules ont été mis à jour avec succès !',

	'NO_BOT_GROUP'					=> 'Impossible de réinitialiser les robots, le groupe des robots est manquant.',

	'PERMISSION_SETTINGS'			=> 'Options des permissions',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Les réglages des permissions ont été mis à jour avec succès !',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Votre version de phpBB3 n’est pas supportée (ou certains fichiers du Support Toolkit sont manquants).<br />phpBB 3.0.0+ devrait être supporté, mais il se peut que la mise à jour de cet outil prenne un certain temps avant d’être disponible, ce qui est souvent le cas lorsqu’une nouvelle version de phpBB 3.0 vient à peine de sortir.',

	'QUIT'							=> 'Quitter',

	'RESET_BOTS'					=> 'Réinitialiser les robots',
	'RESET_BOTS_EXPLAIN'			=> 'Souhaitez-vous réinitialiser la liste des robots avec la liste des robots présente par défaut dans phpBB3 ? Tous les robots existants seront supprimés afin d’être remplacés par les robots présents par défaut.',
	'RESET_BOTS_SKIP'				=> 'La réinitialisation du robot a été ignorée',
	'RESET_BOT_SUCCESS'				=> 'Les robots ont été réinitialisés avec succès !',
	'RESET_MODULES'					=> 'Réinitialiser les modules',
	'RESET_MODULES_EXPLAIN'			=> 'Souhaitez-vous réinitialiser les modules avec les modules présents par défaut dans phpBB3 ? Tous les modules existants seront supprimés afin d’être remplacés par les modules présents par défaut.',
	'RESET_MODULES_SKIP'			=> 'La réinitialisation du module a été ignorée',
	'RESET_MODULE_SUCCESS'			=> 'Les modules ont été réinitialisés avec succès !',
	'ROWS'							=> 'Lignes',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		1	=> 'Tables non modifiées',
		2	=> 'Colonnes non modifiées',
		3	=> 'Configuration non modifiée',
		4	=> 'Permissions non modifiées',
		5	=> 'Groupes non modifiés',
		8	=> 'Étape finale',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		1	=> 'Les tables de la base de données n’ont pas été modifiées',
		2	=> 'Les colonnes de la base de données n’ont pas été modifiées',
		3	=> 'La table de configuration n’a aucune nouvelle valeur ou valeur manquante',
		4	=> 'Il n’y a aucune modification dans les tables de permissions',
		5	=> 'Il n’y a aucune modification dans les groupes système de phpBB',
		8	=> 'Cette dernière étape videra le cache et réactivera le forum.',
	),
	'SUCCESS'						=> 'Succès',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Les groupes système ont été réinitialisés avec succès',

	'TYPE'							=> 'Type',

	'UNSTABLE_DEBUG_ONLY'			=> 'Le nettoyeur de base de données ne peut s’exécuter que sur les versions instables <em>(dev, a, b, RC)</em> de phpBB, lorsque “DEBUG” est activé dans le fichier de configuration de phpBB.',
));

?>