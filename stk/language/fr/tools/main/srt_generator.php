<?php
/**
*
* [french]
*
* @package Support Toolkit	srt generator
* @version $Id:	papicx	1.0.7	05/05/2013	16h07	$
* @copyright (c) 2010 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @Translation phpBB-fr http://www.phpbb-fr.com
*
*/

/**
* @ignore
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
// ’ « » " " …
// --------------------------------------------------------------------------------------------
// For the time being this file isn't translatable. The Support Toolkit will always force the
// English version when the "Support Request Generator" is ran.
// Pour le moment, ce fichier n'est pas traduisible. La boîte à outils de soutien sera toujours forcer la
// Version anglaise lorsque le « Générateur de Demande d'assistance » est exécuté.
//

$lang = array_merge($lang, array(
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Ci-dessous se trouve une copie du modèle de demande de support. Cliquez ci-dessous pour le copier dans votre presse-papiers, puis créez un nouveau message dans les <a href="https://www.phpbb.com/community/viewforum.php?f=46">forums de support phpBB.com</a> ou les <a href="http://forums.phpbb-fr.com/support-phpbb3/">forums de support phpBB-fr.com</a> avec ces informations. Si un sujet de support existe déjà concernant votre question, veuillez copier le modèle dans une réponse à votre sujet existant plutôt que d’en créer un nouveau.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'Le générateur de modèle de demande de support n’a pas pu charger les réponses. Vérifiez que vous avez correctement démarré STK.',
	'SRT_GENERATOR'					=> 'Générateur de modèle de demande de support',
	'SRT_GENERATOR_LANDING'			=> 'Générateur de modèle de demande de support (SRT)',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Bienvenue sur le générateur de modèle pour la demande de support à l’équipe d’assistance. C’est le moyen le plus rapide et efficace pour compléter notre modèle de demande de support. Le générateur vous posera une série de huit à dix questions qui sont utiles pour effectuer un diagnostic. Les réponses seront compilées dans une liste qui peut être copiée et collée dans votre sujet de support.
	<br />Cet outil STK fait la même chose que le <a href="https://www.phpbb.com/support/srt/?step=1">SRT Generator sur www.phpbb.com</a>, mais certaines questions sont pré-remplies.<br /><br /> Souhaitez-vous exécuter le Générateur SRT ?',
	'SRT_NO_CACHE'	=> 'Le générateur de modèle pour la demande de support utilise le système de cache de phpBB pour stocker des informations à chaque étape. Vous n’utilisez aucun cache pour phpbb ce qui n’est pas compatible avec cet outil. Veuillez utiliser un cache pour utiliser cet outil ou allez sur le <a href="https://www.phpbb.com/support/srt/?step=1">générateur en ligne SRT</a>',
	'START_OVER'	=> 'Tout recommencer',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'Votre problème est-il lié à un MOD ?',
	'STEP1_MOD_EXPLAIN'		=> 'Votre problème a commencé après l’installation ou la suppression d’un MOD ?',
	'STEP1_MOD_ERROR'		=> 'Les demandes de support pour des problèmes liés aux MODs (par exemple, si vous venez d’installer un MOD et constatez des erreurs) doivent être postées dans le sujet où vous avez téléchargé le MOD. Si le MOD est issu d’un autre forum, veuillez vous adresser à celui-ci.<br /><br />Allez dans les <a href="http://www.phpbb.com/community/viewforum.php?f=81">forums de support des MODs de phpBB.com</a> ou les <a href="http://forums.phpbb-fr.com/support-mods-phpbb3/">forums de support des MODs de phpBB-fr.com</a>.',
	'STEP1_HACKED'			=> 'Votre forum a été piraté ?',
	'STEP1_HACKED_EXPLAIN'	=> 'Sélectionnez « Oui » si vous cherchez du support car votre forum a été effacé ou endommagé d’une façon quelconque.',
	'STEP1_HACKED_ERROR'	=> 'Si votre forum a été piraté, nous vous demandons de déposer un rapport au Suivi des Enquêtes sur les Incidents au lieu de poster dans le forum de support afin qu’aucune information privée ne soit divulguée.<br /><br />Lisez <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">ce sujet</a> (en anglais) pour les instructions à suivre.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Quelle version de phpBB utilisez-vous ?',
			'board_url'			=> 'Quelle est l’URL de votre forum ?',
			'dbms'				=> 'Type/version de la base de données utilisé ?',
			'php'				=> 'Quelle version de PHP utilisez-vous ?',
			'host_name'			=> 'Quel est votre hébergeur ?',
			'install_type'		=> 'Comment avez-vous installé votre forum ?',
			'inst_converse'		=> 'Est-ce que votre forum est une nouvelle installation ou une conversion ?',
			'mods_installed'	=> 'Avez-vous des MODs installés ?',
			'registration_req'	=> 'Est-il nécessaire de s’enregistrer pour reproduire ce problème ?',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Quels sont les styles que vous avez actuellement installés ?',
			'installed_languages'	=> 'Quelle(s) langue(s) votre forum utilise actuellement ?',
			'xp_level'				=> 'Quel est votre niveau d’expérience ?',
			'problem_started'		=> 'Quand votre problème a-t-il commencé ?',
			'problem_description'	=> 'Décrivez votre problème.',
			'installed_mods'		=> 'Quels MODs avez-vous installé ?',
			'test_username'			=> 'Quel pseudo peut être utilisé pour voir ce problème ?',
			'test_password'			=> 'Quel mot de passe peut être utilisé pour voir ce problème ?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Le générateur de SRT n’a pas pu déterminer quelle version de phpBB est utilisée, veuillez sélectionner la version appropriée. Pour trouver cette information, connectez-vous à votre forum et allez en bas de page. Cliquez sur « Panneau d’administration » et cliquez sur l’onglet « Système ».',
			'board_url'			=> 'L’URL de votre forum est l’adresse que vous utilisez pour accéder à votre forum. La plupart des problèmes sont plus rapidement résolus si l’on peut voir votre Panneau d’administration. Si vous ne voulez pas donner cette information, veuillez indiquer « n/a ».',
			'dbms'				=> 'Pour déterminer la version et le type de la base de données utilisée, allez dans le « Panneau de Contrôle d’Administration (ACP) », onglet « Général », cherchez « Serveur de base de données » dans « Statistiques du forum ».',
			'php'				=> 'Pour déterminer la version de PHP utilisée, allez dans le « Panneau de Contrôle d’Administration (ACP) », onglet « Général », cliquez sur  « Informations PHP » dans « Accès rapide » et cherchez « PHP Version x.y.z ».',
			'host_name'			=> 'Certains problèmes rencontrés avec phpBB peuvent être attribués à des hébergeurs particuliers. Ce champ doit être rempli avec l’hébergeur qui fournit votre pack d’hébergement (comme GoDaddy, Yahoo!, 1&1, etc.). Si vous hébergez vous-même le forum, veuillez le signaler. De même, si vous ne savez pas qui est votre hébergeur, veuillez le signaler aussi.',
			'install_type'		=> 'Si vous avez installé votre forum en téléchargeant les fichiers de phpBB, les transférant à votre hébergeur, puis en accédant à l’installateur, sélectionnez « J’ai installé le forum tout seul ». Si vous avez demandé à quelqu’un d’effectuer l’installation à votre place, sélectionnez « Quelqu’un d’autre à installé ce forum pour moi ». Si vous avez utilisé un outil automatisé comme « Fantastico », sélectionnez « J’ai utilisé un outil fourni par mon hébergeur ».',
			'inst_converse'		=> '« Nouvelle installation » signifie que votre forum n’existait pas avant l’installation de phpBB. Si vous avez récemment mis à jour votre forum à partir d’une version antérieure de phpBB3 et que vos problèmes sont apparus après, sélectionnez « Mis à jour depuis une version antérieure de phpBB3 ». « Conversion d’un autre logiciel » signifie que votre forum a été installé précédemment comme un autre logiciel (exemple PHP-Nuke), puis plus tard converti à phpBB.',
			'mods_installed'	=> 'Les Mods sont souvent la cause de nombreux problèmes avec phpBB. Cette information peut aider à déterminer la cause exacte de votre problème.',
			'registration_req'	=> 'Sélectionnez « Oui » si l’on doit être inscrit et connecté pour voir le problème.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Les anciens styles sont souvent la cause de nombreux problèmes. Si vous ne savez pas quels styles sont installés, allez dans le Panneau de Contrôle d’Administration (ACP) et cliquez sur l’onglet « Styles ».',
			'installed_languages'	=> 'Les anciens packs de langue sont souvent la cause de nombreux problèmes. Si vous ne savez pas quels packs de langue sont installés, allez dans le Panneau de Contrôle d’Administration (ACP), onglet « Sytème », « Tâches générales » et cliquez sur « Langues » dans la liste de gauche.',
			'xp_level'				=> 'Veuillez sélectionner l’option qui vous décrit le mieux.',
			'problem_started'		=> 'Veuillez indiquer les actions effectuées (mise à jour de votre forum, installation de MODs, etc.) avant que le problème ne devienne perceptible.',
			'problem_description'	=> 'Lors de la description de votre problème, veuillez être aussi précis que possible. Indiquez les informations concernant le moment où le problème est apparu, les étapes pour reproduire le problème et toutes autres informations que vous jugez utiles.',
			'installed_mods'		=> 'Veuillez être le plus précis possible en indiquant les MODs installés. Cette information contribue beaucoup à nous aider pour déterminer la cause de votre problème.',
			'test_username'			=> 'Veuillez fournir les identifiants d’un compte de test pouvant être utilisé pour afficher le problème. <strong>Ne pas</strong> donner ces informations si cela requière des privilèges élevés.',
			'test_password'			=> 'Veuillez fournir le mot de passe d’un compte de test pouvant être utilisé pour afficher le problème. <strong>Ne pas</strong> donner ces informations si cela requière des privilèges élevés.',
		),
	),
));

// Language strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				null			=> 'Veuillez sélectionner votre réponse',
				'myself'		=> 'J’ai utilisé le package de téléchargement de phpBB.com',
				'third'			=> 'J’ai utilisé le package de téléchargement d’un autre site',
				'someone_else'	=> 'Une autre personne a installé mon forum pour moi',
				'automated'		=> 'J’ai utilisé l’outil fourni par mon hébergeur',
			),
			'inst_converse'	=> array(
				null				=> 'Veuillez sélectionner votre réponse',
				'fresh'				=> 'Nouvelle installation',
				'phpbb_update'		=> 'Mise à jour depuis une version antérieure de phpBB3',
				'convert_phpbb2'	=> 'Conversion de phpBB2',
				'convert_other'		=> 'Conversion d’un autre logiciel',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				null			=> 'Veuillez sélectionner votre réponse',
				'new_both'		=> 'Débutant PHP et phpBB',
				'new_phpbb'		=> 'Débutant phpBB mais pas PHP',
				'new_php'		=> 'Débutant PHP mais pas phpBB',
				'comfort'		=> 'À l’aise avec PHP et phpBB',
				'experienced'	=> 'Expérimenté avec PHP et phpBB',
			),
		),
	),
));
