<?php
/**
 *
 * @package Support Toolkit
 * @version $Id$
 * @copyright (c) 2010 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
// ’ » " " …
// --------------------------------------------------------------------------------------------
// For the time being this file isn't translatable. The Support Toolkit will always force the
// English version when the "Support Request Generator" is ran.
//

$lang = array_merge($lang, array(
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Unterhalb ist deine Kopie des Support Request Templates. Kopiere das Template in deine Zwischenablage, danach erstellst du ein neues Thema in den <a href="https://www.phpbb.de/community/viewforum.php?f=97">Supportforen</a> mit diesen Informationen. Wenn du schon ein Thema zu diesem Problem eröffnet hast, kopiere bitte das Template in eine Antwort auf dieses Thema und erstelle kein neues Thema.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'Der Support Request Template Generator konnte die Antworten nicht empfangen. Stelle sicher, dass du das Tool korrekt gestartet hast.',
	'SRT_GENERATOR'					=> 'Support Anfrage Vorlage Generator',
	'SRT_GENERATOR_LANDING'			=> 'Support Anfrage Vorlage Generator',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Willkommen beim Support Teams Support Request Template Generator. Das ist die schnellste und effizienteste Methode unsere Support Anfrage Vorlage auszufüllen. Der Generator wird dir eine Reihe von acht bis zehn Fragen stellen, die hilfreich sind die meisten Probleme zu erkennen. Danach werden deine Antworten in einer Liste zusammengestellt die du kopieren und in dein Support Thema einfügen kannst.<br />Dieses STK Tool macht das gleiche wie der <a href="http://www.phpbb.com/support/stk/">SRT Generator auf www.phpbb.com</a> aber versucht verschiedene Fragen automatisch auszufüllen.<br /><br />Willst du den Support Anfrage Vorlagen Generator starten?',
	'SRT_NO_CACHE'					=> 'Der Support Anfrage Vorlage Generator nutzt das phpBB Cachesystem um die Informationen zwischen zu speichern, während du durch alle Schritte gehst. Du nutzt den phpBB null Cachem, der ist mit diesem Tool nicht kompatibel. Bitte wechsel zu einem anderen Caching Backend, um das Tool zu nutzen oder nutze den <a href="http://www.phpbb.com/support/srt/">online Generator</a>',
	'START_OVER'					=> 'Neu beginnen',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'Bezieht sich Ihr Problem auf einen MOD?',
	'STEP1_MOD_EXPLAIN'		=> 'Began das Problem nach der Installation oder Deinstallation einer MOD?',
	'STEP1_MOD_ERROR'		=> 'Support Fragen für MOD spezifische Probleme (z.B. wenn Sie gerade einen MOD installiert haben und nun Fehler bekommen) sollten dort in das Thema gestellt werden, wo Sie den MOD runtergeladen haben. Wenn Sie den MOD von einer anderen Seite (als phpBB.com) haben, müssen Sie dort nach Support suchen.<br /><br /><a href="http://www.phpbb.com/community/viewforum.php?f=81">Gehen zu den MOD Foren</a>',
	'STEP1_HACKED'			=> 'Wurde dein Board gehackt?',
	'STEP1_HACKED_EXPLAIN'	=> 'Wähle "Ja" aus, wenn du Support brauchst, weil dein Board andersweitig kompromitiert wurde.',
	'STEP1_HACKED_ERROR'	=> 'Wenn dein Board gehackt wurde, bitten wir Sie Ihrwn Report im "Incident Investigation Tracker" einzustellen und nicht im Support Forum, damit keine privaten Daten öffentlich angezeigt werden.<br /><br />Siehe in diesem <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">Beitrag</a>.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Welche Version von phpBB verwenden Sie?',
			'board_url'			=> 'Wie ist die URL zu Ihrem Board?',
			'dbms'				=> 'Welchen Datenbanktyp und -version verwenden Sie?',
			'php'				=> 'Welche PHP-Version verwenden Sie?',
			'host_name'			=> 'Mit was hosten Sie Ihr Board?',
			'install_type'		=> 'Wie haben Sie Ihr Board installiert?',
			'inst_converse'		=> 'Ist Ihr Board eine frische Installation oder eine Konvertierung?',
			'mods_installed'	=> 'Hast du MODs installiert?',
			'registration_req'	=> 'Braucht man einen Benutzer-Account um das Problem reproduzieren zu können?',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Welche Styles haben Sie aktuell installiert?',
			'installed_languages'	=> 'Welche Sprachpakete werden aktuell genutzt?',
			'xp_level'				=> 'Wie groß ist Ihre Erfahrung?',
			'problem_started'		=> 'Seit wann haben Sie das Problem?',
			'problem_description'	=> 'Bitte beschreiben Sie Ihr Problem.',
			'installed_mods'		=> 'Welche MODs haben Sie installiert?',
			'test_username'			=> 'Welcher Benuter kann benutzt werden, um das Problem zu sehen?',
			'test_password'			=> 'Welches Passwort kann benutzt werden, um das Problem zu sehen?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Der SRT Generator konnte die phpBB Version nicht bestimmen, bitte wähle die richtige aus. Um diese Angabe zu finden, müssen Sie sich bei Ihrem Board anmelden und ganz nach unten scrollen. Klick auf "Administrations-Bereich". Gehe in den Tab "System".',
			'board_url'			=> 'Ihre Board URL ist die Adresse, die Sie nutzen um Ihr Board aufzurufen. Die meisten Problem lassen sich einfacher lösen, wenn man das Board besuchen kann. Wenn Sie uns diese Information nicht geben wollen, gib "n/a" ein.',
			'dbms'				=> 'Um den Datenbanktyp und die Datenbankversion bestimmen zu können, gehst du zum Administrations-Bereich. Im Tab "Allgemein" findest du "Databank-Server:" in der "Board-Statistik" Tabelle.',
			'php'				=> 'Um die PHP-Version bestimmen zu können, gehst du zum Administrations-Bereich. Im Tab "Allgemein", auf "PHP-Information", dort siehst du "PHP Version x.y.z"',
			'host_name'			=> 'Verschiedene Probleme mit phpBB Boards können zurückgeführt werden auf verschiedenen Provider/Hosts. Dieses Feld sollte mit dem Unternehmen ausgefüllt werden, was deinen Webspace/Server bereitstellt (wie 1&1, Strato, Hetzner etc.). Wenn du dein dein Board selbst hostest, dann weise daraufhin. Ebenfalls, falls du nicht wissen solltest, wer dein Board hostet, weise ebenfalls daraufhin.',
			'install_type'		=> 'Wenn Sie ihr phpBB installiert haben, in dem Sie die phpBB Dateien runtergeladen, auf Ihren Server hochgeladen, die Installation aufgerufen haben, wähle "Ich habe das Board selbst installiert." aus. Wenn Sie jemand hatten, der für Sie die Installation ausgeführt hat, wähle "Jemand anderes hat das Board für mich installiert" Wenn du ein automatisches Tool wie Fantastico genutzt hast, wähle "Ich habe einen Auto-Installer meines Webspace/Server Providers genutzt"',
			'inst_converse'		=> 'Wenn dein Board eine "Neue Installation" ist, ist damit ein gemeint, dass dein Board vor der Installation von phpBB nicht existiert hat. Wenn du dein Board kürzlich von einer älteren phpBB3 Version aktualisiert hast, bevor dein Problem auftrat, dann wähle "Update von einer älteren phpBB Version" aus. Wenn es eine Konvertierung ist, ist gemeint dass dein Board vorher mit einer anderen Forensoftware lief und später zu phpBB konvertiert wurde.',
			'mods_installed'	=> 'MODs sind oft die Ursache für viele Probleme mit phpBB. Diese Information kann helfen die exakte Ursache des Problems zu bestimmen.',
			'registration_req'	=> 'Wähle "Ja", wenn man registriert und angemeldet sein muss, um das Problem zu reproduzieren.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Ein veralteter Style kann viele Probleme verursachen. Wenn Sie nicht wissen, welchen Style Sie installiert haben, gehen Sie in den Administrations-Bereich in den Tab "Styles".',
			'installed_languages'	=> 'Ein veraltetes Sprachpaket kann viele Probleme verursachen. Wenn Sie nicht wissen, welche Sprachpakete Sie installiert haben, gehen Sie in den Administration in den Tab "System". Jetzt wählen Sie "Sprachpakete" von der Liste auf der linken Seite.',
			'xp_level'				=> 'Bitte wähle die Auswahlmöglichkeit, die Sie am besten beschreibt.',
			'problem_started'		=> 'Bitte beschreibe die Tätigkeiten (Aktualisieren des Boards, MOD-Installation, usw.), die Sie ausgeführt haben bevor das Problem bemerkt wurde.',
			'problem_description'	=> 'Wenn Sie ihr Problem beschreiben, versuchen Sie bitte so genau wie möglich zu sein. Inklusive Informationen, wann das Problem begann, Schritte um das Problem zu reproduzieren und jede andere Information die nützlich sein kann.',
			'installed_mods'		=> 'Bitte sei so detailiert wie möglich, wenn du deine installierten MODs auflistest. Diese Information wird uns im hohem Maße helfen die Ursache Ihres Problems zu bestimmen.',
			'test_username'			=> 'Bitte stelle uns den Benutzernamen des Testaccounts, mit dem das Problem betrachtet werden kann, zur Verfügung. Stelle diese Information <strong>nicht</strong> bereit, wenn der Benutzer mehr Berechtigungen als die Standard "Benutzer" benötigt (z.B. Moderator- oder Administrator-Berechtigugnen).',
			'test_password'			=> 'Bitte stelle uns das Passwort des Testaccounts, mit dem das Problem betrachtet werden kann, zur Verfügung. Stelle diese Information <strong>nicht</strong> bereit, wenn der Benutzer mehr Berechtigungen als die Standard "Benutzer" benötigt (z.B. Moderator- oder Administrator-Berechtigugnen).',
		),
	),
));

// Langauge strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				null			=> 'Bitte wähle eine Antwort aus',
				'myself'		=> 'Ich habe das Komplettpaket von phpBB.com/phpBB.de runtergeladen',
				'third'			=> 'Ich habe ein Komplettpaket von einer anderen Website runtergeladen',
				'someone_else'	=> 'Jemand anderes hat das Board für mich installiert',
				'automated'		=> 'Ich habe einen Auto-Installer meines Webspace/Server Providers genutzt',
			),
			'inst_converse'	=> array(
				null			=> 'Bitte wähle eine Antwort aus',
				'fresh'				=> 'Neue Installation',
				'phpbb_update'		=> 'Update von einer älteren phpBB Version',
				'convert_phpbb2'	=> 'Konvertierung von phpBB2',
				'convert_other'		=> 'Konvertierung von anderer Forensoftware',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				null			=> 'Bitte wähle eine Antwort aus',
				'new_both'		=> 'Einsteiger in PHP und phpBB',
				'new_phpbb'		=> 'Einsteiger in phpBB aber nicht bei PHP',
				'new_php'		=> 'Einsteiger in PHP aber nicht in phpBB',
				'comfort'		=> 'Zufrieden mit PHP und phpBB',
				'experienced'	=> 'Erfahren mit PHP und phpBB',
			),
		),
	),
));
