<?php
/**
*
* [french]
*
* @package Support Toolkit - Common
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'BACK_TOOL'							=> 'Retour vers le dernier outil',
	'BOARD_FOUNDER_ONLY'				=> 'Seuls les fondateurs du forum peuvent accéder au STK.',

	'CAT_ADMIN'							=> 'Outils pour les administrateurs',
	'CAT_ADMIN_EXPLAIN'					=> 'Les outils pour les administrateurs peuvent être utilisés par un administrateur afin de gérer des caractéristiques particulières de son forum et de résoudre des problèmes fréquents.',
	'CAT_DEV'							=> 'Outils pour les développeurs',
	'CAT_DEV_EXPLAIN'					=> 'Les outils pour les développeurs peuvent être utilisés par les développeurs ou les créateurs de MODs pour phpBB afin de réaliser des tâches fréquentes.',
	'CAT_ERK'							=> 'Kit de Réparation d’Urgence',
	'CAT_ERK_EXPLAIN'					=> 'Le Kit de Réparation d’Urgence est un outil séparé du STK qui a été conçu pour exécuter certains points de contrôle permettant de détecter des problèmes, liés à votre installation de phpBB, qui peuvent favoriser un dysfonctionnement sur votre forum. Cliquez <a href="%s">ici</a> afin d’exécuter le KRU.',
	'CAT_MAIN'							=> 'Principal',
	'CAT_MAIN_EXPLAIN'					=> 'Support Toolkit (STK) peut être utilisé afin de régler les erreurs fréquemment rencontrées dans une installation fonctionnant sous phpBB 3.0.x. Il se présente comme un second « Panneau d’administration », offrant à un administrateur une multitude d’outils pouvant résoudre des problèmes fréquents qui peuvent empêcher une installation phpBB3 de fonctionner correctement.',
	'CAT_SUPPORT'						=> 'Outils de support',
	'CAT_SUPPORT_EXPLAIN'				=> 'Les outils de support peuvent être utilisés afin d’aider à restaurer une installation de phpBB 3.0.x qui ne fonctionne plus correctement.',
	'CAT_USERGROUP'						=> 'Outils pour les utilisateurs et les groupes',
	'CAT_USERGROUP_EXPLAIN'				=> 'Ces outils peuvent être utilisés pour gérer des utilisateurs et des groupes avec certaines fonctionnalités nativement non présentes dans phpBB 3.0.x.',
	'CONFIG_NOT_FOUND'					=> 'Le fichier de configuration de STK n’a pas pu être chargé. Veuillez vérifier votre installation',

	'DOWNLOAD_PASS'						=> 'Télécharger le fichier de mot de passe.',

	'EMERGENCY_LOGIN_NAME'				=> 'Connexion d’urgence de STK',
	'ERK'								=> 'Kit de Réparation d’Urgence',

	'FAIL_REMOVE_PASSWD'				=> 'Impossible de supprimer le fichier de mot de passe expiré. Veuillez supprimer ce fichier manuellement !',

	'GEN_PASS_FAILED'					=> 'STK n’a pas été capable de générer un nouveau mot de passe. Veuillez réessayer.',
	'GEN_PASS_FILE'						=> 'Générer un fichier de mot de passe.',
	'GEN_PASS_FILE_EXPLAIN'				=> 'Si vous n’arrivez plus à vous connecter à phpBB, vous pouvez utiliser la méthode d’authentification interne de STK. Pour utiliser cette méthode, vous devez <a href="%s"><strong>générer</strong></a> un nouveau fichier de mot de passe.',

	'INCORRECT_CLASS'					=> 'Classe incorrecte dans : stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'Le mot de passe est incorrect',
	'INCORRECT_PHPBB_VERSION'			=> 'Votre version de phpBB n’est pas compatible avec cet outil. Votre installation de phpBB doit au moins être mise à jour vers la version %1$s ou plus avant de pouvoir exécuter cet outil.',

	'LOGIN_STK_SUCCESS'					=> 'Vous avez été authentifié(e) et allez à présent être redirigé(e) vers STK.',

	'NOTICE'							=> 'Avertissement',
	'NO_VERSION_FILE'					=> 'STK n’a pas pu déterminer la dernière version. Veuillez vous rendre sur la <a href="http://phpbb.com/support/stk">section relative à STK sur phpBB.com</a> et vérifier que vous utilisez bien la dernière version avant de continuer à utiliser le STK.',

	'REQUEST_PHPBB_VERSION'				=> 'Définir la version de phpBB',
	'REQUEST_PHPBB_VERSION_EXPLAIN'		=> 'Support Toolkit n’a pas pu identifier correctement la version de phpBB que vous utilisez, veuillez sélectionner la version appropriée dans ce formulaire avant de continuer.<br />Cela signifie que vos fichiers du forum et la version du forum sont incompatibles, probablement dû à une mise à jour incomplète. Veuillez consulter les <a href="https://www.phpbb.com/community/viewforum.php?f=46">forums de support phpBB.com</a> ou les <a href="http://forums.phpbb-fr.com/support-phpbb3/">forums de support phpBB-fr.com</a> pour obtenir de l’aide et résoudre ce problème.',

	'PASS_GENERATED'					=> 'Votre fichier de mot de passe STK a été généré.<br/>Le mot de passe généré est : <em>%1$s</em><br />Ce mot de passe expirera le : <span style="text-decoration: underline;">%2$s</span>. Après cette date, vous <strong>devrez</strong> générer un nouveau fichier de mot de passe avant de pouvoir continuer à utiliser la fonctionnalité de la connexion d’urgence !<br /><br />Utilisez le bouton suivant afin de télécharger le fichier. Une fois que vous avez téléchargé ce fichier, vous devrez le transférer sur votre serveur dans le répertoire « stk ».',
	'PASS_GENERATED_REDIRECT'			=> 'Une fois que vous avez transféré le fichier de mot de passe au bon emplacement, cliquez <a href="%s">ici</a> afin de retourner sur la page de connexion.',
	'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Cet outil n’est pas compatible avec la version de phpBB que vous utilisez.',
	'PROCEED_TO_STK'					=> '%sContinuer vers le STK%s',

	'STK_FOUNDER_ONLY'					=> 'Vous devez vous authentifier de nouveau avant de pouvoir utiliser le STK.',
	'STK_LOGIN'							=> 'Connexion au STK',
	'STK_LOGIN_WAIT'					=> 'Vous devez patienter au moins trois secondes avant d’essayer de vous reconnecter.',
	'STK_LOGOUT'						=> 'Déconnexion du STK',
	'STK_LOGOUT_SUCCESS'				=> 'Vous êtes à présent déconnecté(e) du STK.',
	'STK_NON_LOGIN'						=> 'Se connecter afin d’accéder au STK.',
	'STK_OUTDATED'						=> 'Votre installation de STK ne semble pas être à jour. La dernière version disponible est la <strong style="color: #008000;">%1$s</strong>, alors que la version installée est la <strong style="color: #FF0000;">%2$s</strong>.<br /><br />En raison de l’impact considérable de cet outil sur votre installation de phpBB, il a été désactivé jusqu’à ce qu’une mise à jour soit effectuée. Nous vous recommandons fortement de vous assurer que tous les logiciels fonctionnant sur votre serveur soient bien à jour.<br />Pour plus d’informations concernant la dernière mise à jour, veuillez consulter le <a href="%3$s">sujet de publication</a> (en anglais).<br /><br /><em>Si vous obtenez cet avertissement après une mise à jour de STK, cliquez <a href="%4$s">ici</a> afin de vider le cache du contrôle de version.</em>',
	'SUPPORT_TOOL_KIT'					=> 'STK',
	'SUPPORT_TOOL_KIT_INDEX'			=> 'Index de STK',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Mot de passe',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Puisque vous n’êtes plus connecté(e) à phpBB3, vous devez vérifier que vous êtes un fondateur du forum en saisissant le mot de passe de STK.<br /><br /><strong>Les cookies DOIVENT être autorisés par votre navigateur, ou vous ne pourriez pas rester connecté(e).</strong>',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'Cet outil essaie de charger un fichier (%1$s) qui n’existe pas.',
	'TOOL_NAME'							=> 'Nom de l’outil',
	'TOOL_NOT_AVAILABLE'				=> 'L’outil demandé n’est pas disponible.',

	'USING_STK_LOGIN'					=> 'Vous vous êtes connecté(e) en utilisant la méthode d’authentification interne au STK. Il est recommandé d’utiliser cette méthode <strong>seulement</strong> lorsqu’il vous est impossible de vous connecter à phpBB.<br />Pour désactiver cette méthode d’authentification, cliquez <a href="%1$s">ici</a>.',
));
