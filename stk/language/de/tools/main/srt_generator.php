<?php
/**
*
* @package Support Toolkit - SRT Generator [Deutsch — Du]
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Deutsche Übersetzung durch die Übersetzer-Gruppe von phpBB.de:
* siehe docs/README und http://www.phpbb.de/go/ubersetzerteam
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
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Unterhalb ist deine Vorlage für die Supportanfrage. Kopiere das Template in deine Zwischenablage, danach erstellst du mit diesen Informationen ein neues Thema in den <a href="http://www.phpbb.de/go/3/supportforum">Supportforen</a>. Wenn du schon ein Thema zu diesem Problem eröffnet hast, kopiere bitte das Template in eine Antwort auf dieses Thema und erstelle kein neues Thema.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'Der Vorlagengenerator für Supportanfragen konnte die Antworten nicht empfangen. Stelle sicher, dass du das Tool korrekt gestartet hast.',
	'SRT_GENERATOR'					=> 'Vorlagengenerator für Supportanfragen',
	'SRT_GENERATOR_LANDING'			=> 'Vorlagengenerator für Supportanfragen',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Willkommen beim Vorlagengenerator für Supportanfragen. Dies ist die schnellste und effizienteste Methode, unsere Vorlage für Support-Anfragen auszufüllen. Der Generator wird dir eine Reihe von acht bis zehn Fragen stellen, die dabei helfen, die meisten Probleme zu erkennen. Danach werden deine Antworten in einer Liste zusammengestellt. Diese kannst du kopieren und in dein Support-Thema einfügen.<br />Dieses STK-Tool macht das gleiche wie der <a href="http://www.phpbb.com/support/stk/">Vorlagengenerator für Supportanfragen auf www.phpbb.com</a>, versucht aber, verschiedene Fragen automatisch auszufüllen.<br /><br />Willst du den Vorlagengenerator für Supportanfragen starten?',
	'SRT_NO_CACHE'					=> 'Der Vorlagengenerator für Supportanfragen verwendet das Cache-System von phpBB, um die Informationen zwischenzuspeichern, während du durch alle Schritte gehst. Du nutzt den phpBB null-Cache, der mit diesem Tool nicht kompatibel ist. Bitte wechsel zu einem anderen Caching-Backend, um das Tool zu nutzen oder nutze die <a href="http://www.phpbb.com/support/srt/">Online-Version</a>.',
	'START_OVER'					=> 'Neu beginnen',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'Bezieht sich dein Problem auf eine Modifikation (Mod)?',
	'STEP1_MOD_EXPLAIN'		=> 'Hat das Problem nach der Installation oder Deinstallation einer Modifikation (Mod) begonnen?',
	'STEP1_MOD_ERROR'		=> 'Supportfragen für Modifikations-spezifische Probleme sollten dort gestellt werden, wo du die Modifikation heruntergeladen hast (z. B. wenn du gerade eine Modifikation installiert hast und nun Fehlermeldungen bekommst). Wenn du die Modifikation von einer anderen Seite als phpBB.com hast, musst du dort nach Support suchen.<br /><br /><a href="http://www.phpbb.com/community/viewforum.php?f=81">Zu den Mod-Foren gehen</a>',
	'STEP1_HACKED'			=> 'Wurde dein Board gehackt?',
	'STEP1_HACKED_EXPLAIN'	=> 'Wähle „Ja“ aus, wenn du Support brauchst, weil dein Board anderweitig manipuliert wurde.',
	'STEP1_HACKED_ERROR'	=> 'Wenn dein Board gehackt wurde, bitten wir dich, deinen Bericht im „Incident Investigation Tracker“ einzustellen und nicht im Support Forum, damit keine privaten Daten öffentlich angezeigt werden.<br /><br />Siehe dazu diesen <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">Beitrag</a>.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Welche Version von phpBB verwendest du?',
			'board_url'			=> 'Wie lautet die URL zu deinem Board?',
			'dbms'				=> 'Welchen Datenbanktyp und -version verwendest du?',
			'php'				=> 'Welche PHP-Version verwendest du?',
			'host_name'			=> 'Wo ist dein Board gehostet?',
			'install_type'		=> 'Wie hast du dein Board installiert?',
			'inst_converse'		=> 'Ist dein Board eine frische Installation oder eine Konvertierung?',
			'mods_installed'	=> 'Hast du Modifikationen (Mods) installiert?',
			'registration_req'	=> 'Braucht man einen Benutzer-Account, um das Problem reproduzieren zu können?',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Welche Styles hast du aktuell installiert?',
			'installed_languages'	=> 'Welche Sprachpakete werden aktuell von dir verwendet?',
			'xp_level'				=> 'Wie groß sind deine Erfahrungen?',
			'problem_started'		=> 'Wann ist das Problem zum ersten Mal aufgetreten?',
			'problem_description'	=> 'Bitte beschreibe dein Problem.',
			'installed_mods'		=> 'Welche Modifikationen (Mods) hast du installiert?',
			'test_username'			=> 'Welcher Benuter kann verwendet werden, um das Problem nachzuvollziehen?',
			'test_password'			=> 'Welches Passwort kann verwendet werden, um das Problem nachzuvollziehen?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Der Vorlagengenerator für Supportanfragen konnte die phpBB-Version nicht bestimmen, bitte wähle die richtige aus. Um diese Angabe zu finden, musst du dich auf deinem Board anmelden und ganz nach unten scrollen. Klick dort auf „Administrations-Bereich“ und wechsel auf das Register „System“.',
			'board_url'			=> 'Die URL des Boards ist die Adresse, die du verwendest, um dein Board aufzurufen. Die meisten Probleme lassen sich einfacher lösen, wenn man das Board aufrufen kann. Wenn du uns diese Information nicht geben willst, gib „n/a“ ein.',
			'dbms'				=> 'Um den Datenbanktyp und die Datenbankversion bestimmen zu können, wechsle in den Administrations-Bereich. Im Register „Allgemein“ findest du den Eintrag „Datenbank-Server“ in der Tabelle „Board-Statistik“.',
			'php'				=> 'Um die PHP-Version zu bestimmen, wechsle in den Administrations-Bereich. Im Register „Allgemein" rufst du „PHP-Information“ auf, dort siehst du die Information „PHP Version x.y.z“',
			'host_name'			=> 'Verschiedene Probleme mit phpBB-Boards sind von bestimmten Providern/Hosts abhängig. Dieses Feld sollte mit dem Name des Unternehmens ausgefüllt werden, welches deinen Webspace/Server bereitstellt (wie 1&amp;1, Strato, Hetzner etc.). Wenn du dein Board selbst hostest, dann weise bitte darauf hin. Gleiches gilt für den Fall, dass du nicht weißt, wo dein Board gehostet ist.',
			'install_type'		=> 'Wenn du dein phpBB installiert hast, in dem du die phpBB-Dateien heruntergeladen, auf deinen Server hochgeladen und das Installationsprogramm aufgerufen hast, wähle „Ich habe das Komplettpaket von phpBB.com/phpBB.de heruntergeladen“ oder „Ich habe ein Komplettpaket von einer anderen Website heruntergeladen“ aus. Wenn du jemand hattest, der für dich die Installation durchgeführt hat, wähle „Jemand anderes hat das Board für mich installiert“. Wenn du ein automatisches Tool wie Fantastico genutzt hast, wähle „Ich habe einen Auto-Installer meines Webspace-/Server-Providers genutzt“.',
			'inst_converse'		=> 'Mit „Neue Installation“ ist gemeint, dass dein Board vor der Installation von phpBB nicht existiert hat. Wenn du dein Board kürzlich von einer älteren phpBB3-Version aktualisiert hast, bevor das Problem auftrat, dann wähle „Update von einer älteren phpBB-3.0-Version“ aus. Eine Konvertierung liegt vor, wenn dein Board vorher mit einer anderen Forensoftware bzw. mit phpBB 2.0 lief und später zu phpBB 3.0 konvertiert wurde.',
			'mods_installed'	=> 'Modifikationen sind oft die Ursache für Probleme mit phpBB. Diese Information kann helfen, die exakte Ursache des Problems zu bestimmen.',
			'registration_req'	=> 'Wähle „Ja“, wenn man registriert und angemeldet sein muss, um das Problem zu reproduzieren.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Ein veralteter Style kann viele Probleme verursachen. Wenn du nicht weißt, welche Styles du installiert hast, so kannst du diese Information im Administrations-Bereich im Register „Styles“ finden.',
			'installed_languages'	=> 'Ein veraltetes Sprachpaket kann viele Probleme verursachen. Wenn du nicht weißt, welche Sprachpakete du installiert hast, so kannst du diese Information im Administrations-Bereich im Register „System“ finden. Dort wählst du „Sprachpakete“ in der Liste auf der linken Seite.',
			'xp_level'				=> 'Bitte wähle die Auswahlmöglichkeit, die deinen Erfahrungs-Level am besten beschreibt.',
			'problem_started'		=> 'Bitte beschreibe die Tätigkeiten (Aktualisieren des Boards, Mod-Installation usw.), die du ausgeführt hast, bevor das Problem bemerkt wurde.',
			'problem_description'	=> 'Wenn du dein Problem beschreibst, versuche bitte so genau wie möglich zu sein. Dies beinhaltet auch Informationen, wann das Problem begann, Schritte um das Problem zu reproduzieren und jede andere Information, die nützlich sein könnte.',
			'installed_mods'		=> 'Bitte sei so detailiert wie möglich, wenn du deine installierten Modifikationen (Mods) auflistest. Diese Information kann eine wichtige Hilfe sein, um die Ursache deines Problems zu bestimmen.',
			'test_username'			=> 'Bitte stelle uns den Benutzernamen des Testaccounts, mit dem das Problem nachvollzogen werden kann, zur Verfügung. Stelle diese Information <strong>nicht</strong> bereit, wenn der Benutzer mehr Berechtigungen als die Standard-Einstellung „Benutzer“ benötigt (z. B. Moderator- oder Administrator-Berechtigungen).',
			'test_password'			=> 'Bitte stelle uns das Passwort des Testaccounts, mit dem das Problem nachvollzogen werden kann, zur Verfügung. Stelle diese Information <strong>nicht</strong> bereit, wenn der Benutzer mehr Berechtigungen als die Standard-Einstellung „Benutzer“ benötigt (z. B. Moderator- oder Administrator-Berechtigungen).',
		),
	),
));

// Language strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				null			=> 'Bitte wähle eine Antwort aus',
				'myself'		=> 'Ich habe das Komplettpaket von phpBB.com/phpBB.de heruntergeladen',
				'third'			=> 'Ich habe ein Komplettpaket von einer anderen Website heruntergeladen',
				'someone_else'	=> 'Jemand anderes hat das Board für mich installiert',
				'automated'		=> 'Ich habe einen Auto-Installer meines Webspace-/Server-Providers genutzt',
			),
			'inst_converse'	=> array(
				null			=> 'Bitte wähle eine Antwort aus',
				'fresh'				=> 'Neue Installation',
				'phpbb_update'		=> 'Update von einer älteren phpBB-3.0-Version',
				'convert_phpbb2'	=> 'Konvertierung von phpBB2',
				'convert_other'		=> 'Konvertierung von anderer Forensoftware',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				null			=> 'Bitte wähle eine Antwort aus',
				'new_both'		=> 'Einsteiger in PHP und phpBB',
				'new_phpbb'		=> 'Einsteiger in phpBB, aber nicht in PHP',
				'new_php'		=> 'Einsteiger in PHP, aber nicht in phpBB',
				'comfort'		=> 'Vertraut mit PHP und phpBB',
				'experienced'	=> 'Erfahren mit PHP und phpBB',
			),
		),
	),
));
