<?php
/**
*
* [french]
*
* @package Support Toolkit - MySQL Upgrader
* @version $Id:	papicx	1.0.7	05/05/2013	21h10	$
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
	'MYSQL_UPGRADER'					=> 'Outil de mise à niveau de MySQL',
	'MYSQL_UPGRADER_BACKUP'				=> 'Cet outil est potentiellement dangereux. Veuillez vous assurer d’avoir créé une sauvegarde de votre base de données avant de continuer !',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Cet outil a été réalisé afin de résoudre certains problèmes rencontrés lorsque la base de données MySQL de votre installation de phpBB a été mise à niveau. Cet outil de mise à niveau rendra incompatible votre schéma de base de données avec la nouvelle version. <em>Veuillez également consulter l’article de la base de connaissance à propos de « <a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Erreur : doesn’t have a default value</a> » (en anglais).</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Télécharger',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'En cochant cette option, l’outil de mise à niveau de MySQL génèrera les requêtes et vous affichera la conclusion à partir de laquelle vous pourrez télécharger le fichier de résultat.',
	'MYSQL_UPGRADER_RESULT'				=> 'Vous trouverez, ci-dessous, les requêtes qui doivent être exécutées afin de mettre à jour le schéma de la base de données vers la bonne version de MySQL. Cliquez <a href="%s">ici</a> afin de télécharger les requêtes dans un fichier .sql.',
	'MYSQL_UPGRADER_RUN'				=> 'Exécuter',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'En cochant cette option, l’outil de mise à niveau de MySQL génèrera les requêtes et exécutera automatiquement le résultat sur votre base de données.<br />Cela peut prendre un certain temps, <strong>n’interrompez pas</strong> ce processus tant que l’outil ne vous l’a pas notifié.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'Script de l’outil de mise à niveau de MySQL',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'L’outil de mise à niveau de MySQL a été exécuté.',
	
	'QUERY_FINISHED'	=> 'Termine d’exécuter la requête %1$d sur %2$d, continue vers la prochaine étape.',

	'TOOL_MYSQL_ONLY'	=> 'Cet outil n’est disponible que pour les utilisateurs de MySQL DBMS.',
));
