<?php
/**
*
* [french]
*
* @package Support Toolkit - Database Cleaner
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
	'BOARD_DISABLE_REASON'			=> 'Le forum est actuellement désactivé car une maintenance de la base de données est en cours. Veuillez revenir ultérieurement.',
	'BOARD_DISABLE_SUCCESS'			=> 'Le forum a été désactivé.',

	'COLUMNS'						=> 'Colonnes',
	'CONFIG_SETTINGS'				=> 'Paramètres de configuration',
	'CONFIG_UPDATE_SUCCESS'			=> 'Les paramètres de configuration ont été mis à jour.',
	'CONTINUE'						=> 'Continuer',

	'DATABASE_CLEANER'				=> 'Nettoyeur de base de données',
	'DATABASE_CLEANER_EXTRA'		=> 'Tous les autres sont des objets supplémentaires ajoutés par des modifications. <strong>Si la case est cochée, ils seront supprimés</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Tous les champs surlignés sur un fond rouge comme celui-ci sont des objets manquants qui devraient être ajoutés. <strong>Si la case est cochée, ils seront ajoutés</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Le nettoyeur de base de données a terminé toutes les tâches !<br /><br />Veuillez vous assurer de sauvegarder à nouveau votre base de données.',
	'DATABASE_CLEANER_WARNING'		=> 'Cet outil n’apporte AUCUNE GARANTIE et les utilisateurs de cet outil devraient sauvegarder entièrement leur base de données en cas d’échec.<br /><br />Avant de continuer, veuillez vous assurer de détenir une sauvegarde de votre base de données !',
	'DATABASE_CLEANER_WELCOME'		=> 'Bienvenue sur l’outil de nettoyage de la base de données !<br /><br />Cet outil a été créé afin de supprimer les colonnes, les lignes et les tables supplémentaires de votre base de données qui ne sont pas présentes par défaut dans l’installation de phpBB3, et il ajoute les éléments manquants de la base de données qui peuvent être nécessaires.<br /><br />Lorsque vous êtes prêt(e) à continuer, veuillez cliquer sur le bouton « Continuer » afin de commencer à utiliser l’outil de nettoyage de la base de données (veuillez noter que votre forum sera désactivé le temps de l’opération).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Les colonnes de la base de données ont été mises à jour.',
	'DATABASE_TABLES'				=> 'Tables de la base de données',
	'DATABASE_TABLES_SUCCESS'		=> 'Les tables de la base de données ont été mises à jour.',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'Les rôles systèmes de phpBB ont été restaurés.',
	'DATABASE_ROLES_SUCCESS'		=> 'Les rôles ont été mis à jour.',
	'DATAFILE_NOT_FOUND'			=> 'Support Toolkit n’a pas été capable de trouver le fichier de données correspondant à votre version de phpBB !',

	'EMPTY_PREFIX'					=> 'Aucun préfixe de base de données',
	'EMPTY_PREFIX_CONFIRM'			=> 'Le nettoyeur de base de données permet d’apporter des modifications aux tables de votre base de données, mais étant donné que vous n’utilisez pas de préfixe de table, cela peut altérer des tables n’ayant aucun rapport avec phpBB. Êtes-vous sûr(e) de vouloir continuer ?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'Le nettoyeur de base de données a déterminé que vous n’utilisez pas de préfixe de table concernant les tables de phpBB. Le nettoyeur de base de données va devoir alors vérifier <strong>l’intégralité</strong> des tables dans votre base de données. Soyez prudent(e) lors de son exécution et assurez-vous d’avoir exclu de la sélection toutes les tables n’ayant aucun rapport avec phpBB car elles peuvent être altérées par cet outil.<br />Si vous avez un doute sur la manipulation à suivre, demandez de l’aide dans les <a href="https://www.phpbb.com/community/viewforum.php?f=46">forums de support phpBB.com</a> ou les <a href="http://forums.phpbb-fr.com/support-phpbb3/">forums de support phpBB-fr.com</a>.',
	'ERROR'							=> 'Erreur',
	'EXTRA'							=> 'Supplémentaire',
	'EXTENSION_GROUPS_SUCCESS'		=> 'Les groupes d’extensions ont été réinitialisés.',
	'EXTENSIONS_SUCCESS'			=> 'Les extensions ont été réinitialisées.',

	'FINAL_STEP'					=> 'Ceci est l’étape finale.<br /><br />Nous allons à présent réactiver votre forum et purger son cache.',

	'INSTRUCTIONS'					=> 'Instructions',

	'MISSING'						=> 'Manquant',
	'MODULE_UPDATE_SUCCESS'			=> 'Les modules ont été mis à jour.',

	'NO_BOT_GROUP'					=> 'Impossible de réinitialiser les robots, le groupe des robots est manquant.',

	'PERMISSION_SETTINGS'			=> 'Options des permissions',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Les réglages des permissions ont été mis à jour.',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Votre version de phpBB3 n’est pas supportée (ou certains fichiers de Support Toolkit sont manquants).<br />phpBB 3.0.0+ devrait être supporté, mais il se peut que la mise à jour de cet outil prenne un certain temps avant d’être disponible, ce qui est souvent le cas lorsqu’une nouvelle version de phpBB 3.0 vient de sortir.',

	'QUIT'							=> 'Quitter',

	'RESET_BOTS'					=> 'Réinitialiser les robots',
	'RESET_BOTS_EXPLAIN'			=> 'Souhaitez-vous réinitialiser la liste des robots avec celle définie par défaut dans phpBB3 ? Tous les robots existants seront supprimés afin d’être remplacés par les robots présents par défaut.',
	'RESET_BOTS_SKIP'				=> 'La réinitialisation du robot a été ignorée',
	'RESET_BOT_SUCCESS'				=> 'Les robots ont été réinitialisés.',
	'RESET_MODULES'					=> 'Réinitialiser les modules',
	'RESET_MODULES_EXPLAIN'			=> 'Souhaitez-vous réinitialiser les modules avec les modules présents par défaut dans phpBB3 ? Tous les modules existants seront supprimés afin d’être remplacés par les modules présents par défaut.',
	'RESET_MODULES_SKIP'			=> 'La réinitialisation du module a été ignorée',
	'RESET_MODULE_SUCCESS'			=> 'Les modules ont été réinitialisés.',
	'RESET_REPORT_REASONS'			=> 'Réinitialiser les raisons des rapports',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Souhaitez-vous réinitialiser les raisons des rapports avec les valeurs par défaut ? Cela supprimera toutes les raisons des rapports que vous avez ajoutées !',
	'RESET_REPORT_REASONS_SKIP'		=> 'Les raisons des rapports N’ONT PAS été réinitialisées.',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'Les raisons des rapports ont été réinitialisées.',
	'RESET_ROLE_DATA'				=> 'Réinitialiser les données des rôles',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Cette étape réinitialisera les rôles système de phpBB avec les valeurs par défaut, il est fortement recommandé d’exécuter cela si vous avez apporté des modifications lors de l’étape précédente.',
	'ROLE_SETTINGS'					=> 'Réglages des rôles',
	'ROWS'							=> 'Lignes',

	'SECTION_NOT_CHANGED_TITLE'	=> array(
		'tables'			=> 'Tables non modifiées',
		'columns'			=> 'Colonnes non modifiées',
		'config'			=> 'Configuration non modifiée',
		'extension_groups'	=> 'Groupes d’extensions non modifiés',
		'extensions'		=> 'Extensions non modifiées',
		'permissions'		=> 'Permissions non modifiées',
		'groups'			=> 'Groupes non modifiés',
		'roles'				=> 'Rôles non modifiés',
		'final_step'		=> 'Étape finale',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'Les tables de la base de données n’ont pas été modifiées',
		'columns'			=> 'Les colonnes de la base de données n’ont pas été modifiées',
		'config'			=> 'La table de configuration n’a aucune nouvelle valeur ou valeur manquante',
		'extension_groups'	=> 'La table des groupes d’extensions n’a aucune nouvelle valeur ou n’a aucune valeur manquante',
		'extensions'		=> 'Les extensions par défaut n’ont pas été modifiées',
		'permissions'		=> 'Il n’y a aucune modification dans les tables des permissions',
		'groups'			=> 'Il n’y a aucune modification dans les groupes système de phpBB',
		'roles'				=> 'Il n’y a aucun rôle ajouté ou supprimé',
		'final_step'		=> 'Cette dernière étape videra le cache et réactivera le forum.',
	),
	'SUCCESS'						=> 'Succès',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Les groupes systèmes ont été réinitialisés.',

	'TYPE'							=> 'Type',

	'UNSTABLE_DEBUG_ONLY'			=> 'Le nettoyeur de base de données ne peut s’exécuter sur les versions instables de phpBB <em>(dev, a, b, RC)</em> que lorsque « DEBUG » est activé dans le fichier « config.php ».',
));
