<?php
/**
*
* @package Support Toolkit - SRT Generator [Deutsch — Sie]
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
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Unterhalb ist Ihre Kopie des Support Request Templates. Kopieren Sie das Template in Ihre Zwischenablage, danach erstellen Sie mit diesen Informationen ein neues Thema in den <a href="https://www.phpbb.de/community/viewforum.php?f=97">Supportforen</a>. Wenn Sie schon ein Thema zu diesem Problem eröffnet haben, kopieren Sie bitte das Template in eine Antwort auf dieses Thema und erstellen Sie kein neues Thema.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'Der Support Request Template Generator konnte die Antworten nicht empfangen. Stellen Sie sicher, dass Sie das Tool korrekt gestartet haben.',
	'SRT_GENERATOR'					=> 'Support Anfrage Vorlage Generator',
	'SRT_GENERATOR_LANDING'			=> 'Support Anfrage Vorlage Generator',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Willkommen beim Support Teams Support Request Template Generator. Das ist die schnellste und effizienteste Methode unsere Support Anfrage Vorlage auszufüllen. Der Generator wird Ihnen eine Reihe von acht bis zehn Fragen stellen, die hilfreich sind die meisten Probleme zu erkennen. Danach werden Ihre Antworten in einer Liste zusammengestellt, die Sie kopieren und in Ihr Support Thema einfügen können.<br />Dieses STK Tool macht das gleiche wie der <a href="http://www.phpbb.com/support/stk/">SRT Generator auf www.phpbb.com</a> aber versucht verschiedene Fragen automatisch auszufüllen.<br /><br />Wollen Sie den Support Anfrage Vorlagen Generator starten?',
	'SRT_NO_CACHE'					=> 'Der Support Request Template Generator nutzt das phpBB Cachesystem um die Informationen zwischen zu speichern, während Sie durch alle Schritte gehen. Sie nutzen den phpBB null Cache, der ist mit diesem Tool nicht kompatibel. Bitte wechseln Sie zu einem anderen Caching Backend, um das Tool zu nutzen oder nutzen Sie den <a href="http://www.phpbb.com/support/srt/">online Generator</a>',
	'START_OVER'					=> 'Neu beginnen',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'Bezieht sich Ihr Problem auf eine MOD?',
	'STEP1_MOD_EXPLAIN'		=> 'Hat das Problem nach der Installation oder Deinstallation einer MOD begonnen?',
	'STEP1_MOD_ERROR'		=> 'Support Fragen für MOD spezifische Probleme sollten dort gestellt werden, wo Sie die MOD runtergeladen haben (z.B. wenn Sie gerade eine MOD installiert haben und nun Fehler bekommen). Wenn Sie die MOD von einer anderen Seite (als phpBB.com) haben, müssen Sie dort nach Support suchen.<br /><br /><a href="http://www.phpbb.com/community/viewforum.php?f=81">Zu den MOD-Foren gehen</a>',
	'STEP1_HACKED'			=> 'Wurde Ihr Board gehackt?',
	'STEP1_HACKED_EXPLAIN'	=> 'Wähle "Ja" aus, wenn Du Support brauchst, weil Ihr Board andersweitig kompromitiert wurde.',
	'STEP1_HACKED_ERROR'	=> 'Wenn Ihr Board gehackt wurde, bitten wir Sie Ihren Bericht im "Incident Investigation Tracker" einzustellen und nicht im Support Forum, damit keine privaten Daten öffentlich angezeigt werden.<br /><br />Sehen Sie dazu diesen <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">Beitrag</a>.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Welche Version von phpBB verwenden Sie?',
			'board_url'			=> 'Wie ist die URL zu Ihrem Board?',
			'dbms'				=> 'Welchen Datenbanktyp und -version verwenden Sie?',
			'php'				=> 'Welche PHP-Version verwenden Sie?',
			'host_name'			=> 'Wo ist Ihr Board gehostet?',
			'install_type'		=> 'Wie haben Sie Ihr Board installiert?',
			'inst_converse'		=> 'Ist Ihr Board eine frische Installation oder eine Konvertierung?',
			'mods_installed'	=> 'Haben Sie MODs installiert?',
			'registration_req'	=> 'Braucht man einen Benutzer-Account um das Problem reproduzieren zu können?',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Welche Styles haben Sie aktuell installiert?',
			'installed_languages'	=> 'Welche Sprachpakete werden aktuell von Ihnen verwendet?',
			'xp_level'				=> 'Wie groß ist Ihre Erfahrung?',
			'problem_started'		=> 'Seit wann haben Sie das Problem?',
			'problem_description'	=> 'Bitte beschreiben Sie Ihr Problem.',
			'installed_mods'		=> 'Welche MODs haben Sie installiert?',
			'test_username'			=> 'Welcher Benuter kann verwendet werden, um das Problem zu sehen?',
			'test_password'			=> 'Welches Passwort kann verwendet werden, um das Problem zu sehen?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Der SRT Generator konnte die phpBB Version nicht bestimmen, bitte wählen Sie die Richtige aus. Um diese Angabe zu finden, müssen Sie sich bei Ihrem Board anmelden und ganz nach unten scrollen. Klicken Sie auf "Administrations-Bereich". Gehen Sie in den Tab "System".',
			'board_url'			=> 'Ihre Board URL ist die Adresse, die Sie verwenden, um Ihr Board aufzurufen. Die meisten Probleme lassen sich einfacher lösen, wenn man das Board besuchen kann. Wenn Sie uns diese Information nicht geben wollen, geben Sie "n/a" ein.',
			'dbms'				=> 'Um den Datenbanktyp und die Datenbankversion bestimmen zu können, gehen Sie in den Administrations-Bereich. Im Tab "Allgemein" finden Sie "Datenbank-Server:" in der "Board-Statistik" Tabelle.',
			'php'				=> 'Um die PHP-Version bestimmen zu können, gehen Sie in den Administrations-Bereich. Im Tab "Allgemein", auf "PHP-Information", dort sehen Sie "PHP Version x.y.z"',
			'host_name'			=> 'Verschiedene Probleme mit phpBB Boards können auf verschiedenen Provider/Hosts zurückgeführt werden. Dieses Feld sollte mit dem Unternehmen ausgefüllt werden, was Ihren Webspace/Server bereitstellt (wie 1&1, Strato, Hetzner etc.). Wenn Sie Ihr Board selbst hosten, dann weise daraufhin. Ebenfalls, falls Du nicht wissen solltest, wer Ihr Board hostet.',
			'install_type'		=> 'Wenn Sie ihr phpBB installiert haben, in dem Sie die phpBB Dateien runtergeladen, auf Ihren Server hochgeladen, die Installation aufgerufen haben, wählen Sie "Ich habe das Board selbst installiert." aus. Wenn Sie jemand hatten, der für Sie die Installation ausgeführt hat, wählen Sie "Jemand anderes hat das Board für mich installiert" aus. Wenn Sie ein automatisches Tool wie Fantastico genutzt hast, wähle "Ich habe einen Auto-Installer meines Webspace/Server Providers genutzt".',
			'inst_converse'		=> 'Mit "Neue Installation" ist gemeint, dass Ihr Board vor der Installation von phpBB nicht existiert hat. Wenn Sie Ihr Board kürzlich von einer älteren phpBB3 Version aktualisiert haben, bevor Ihr Problem auftrat, dann wähle "Update von einer älteren phpBB Version" aus. Wenn es eine Konvertierung ist, ist gemeint, dass Ihr Board vorher mit einer anderen Forensoftware lief und später zu phpBB konvertiert wurde.',
			'mods_installed'	=> 'MODs sind oft die Ursache für viele Probleme mit phpBB. Diese Information kann helfen die exakte Ursache des Problems zu bestimmen.',
			'registration_req'	=> 'Wähle "Ja", wenn man registriert und angemeldet sein muss, um das Problem zu reproduzieren.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Ein veralteter Style kann viele Probleme verursachen. Wenn Sie nicht wissen, welchen Style Sie installiert haben, gehen Sie in den Administrations-Bereich in den Tab "Styles".',
			'installed_languages'	=> 'Ein veraltetes Sprachpaket kann viele Probleme verursachen. Wenn Sie nicht wissen, welche Sprachpakete Sie installiert haben, gehen Sie in den Administration in den Tab "System". Jetzt wählen Sie "Sprachpakete" von der Liste auf der linken Seite.',
			'xp_level'				=> 'Bitte wählen Sie die Auswahlmöglichkeit, die Sie am besten beschreibt.',
			'problem_started'		=> 'Bitte beschreiben Sie die Tätigkeiten (Aktualisieren des Boards, MOD-Installation, usw.), die Sie ausgeführt haben bevor das Problem bemerkt wurde.',
			'problem_description'	=> 'Wenn Sie ihr Problem beschreiben, versuchen Sie bitte so genau wie möglich zu sein. Inklusive Informationen, wann das Problem begann, Schritte um das Problem zu reproduzieren und jede andere Information die nützlich sein kann.',
			'installed_mods'		=> 'Bitte seien Sie so detailiert wie möglich, wenn Sie Ihre installierten MODs auflistest. Diese Information wird uns im hohem Maße helfen die Ursache Ihres Problems zu bestimmen.',
			'test_username'			=> 'Bitte stellen Sie uns den Benutzernamen des Testaccounts, mit dem das Problem betrachtet werden kann, zur Verfügung. Stellen Sie diese Information <strong>nicht</strong> bereit, wenn der Benutzer mehr Berechtigungen als die Standard "Benutzer" benötigt (z.B. Moderator- oder Administrator-Berechtigugnen).',
			'test_password'			=> 'Bitte stellen Sie uns das Passwort des Testaccounts, mit dem das Problem betrachtet werden kann, zur Verfügung. Stellen Sie diese Information <strong>nicht</strong> bereit, wenn der Benutzer mehr Berechtigungen als die Standard "Benutzer" benötigt (z.B. Moderator- oder Administrator-Berechtigugnen).',
		),
	),
));

// Language strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				null			=> 'Bitte wählen Sie eine Antwort aus',
				'myself'		=> 'Ich habe das Komplettpaket von phpBB.com/phpBB.de runtergeladen',
				'third'			=> 'Ich habe ein Komplettpaket von einer anderen Website runtergeladen',
				'someone_else'	=> 'Jemand anderes hat das Board für mich installiert',
				'automated'		=> 'Ich habe einen Auto-Installer meines Webspace/Server Providers genutzt',
			),
			'inst_converse'	=> array(
				null			=> 'Bitte wählen Sie eine Antwort aus',
				'fresh'				=> 'Neue Installation',
				'phpbb_update'		=> 'Update von einer älteren phpBB Version',
				'convert_phpbb2'	=> 'Konvertierung von phpBB2',
				'convert_other'		=> 'Konvertierung von anderer Forensoftware',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				null			=> 'Bitte wählen Sie eine Antwort aus',
				'new_both'		=> 'Einsteiger in PHP und phpBB',
				'new_phpbb'		=> 'Einsteiger in phpBB aber nicht bei PHP',
				'new_php'		=> 'Einsteiger in PHP aber nicht in phpBB',
				'comfort'		=> 'Vertraut mit PHP und phpBB',
				'experienced'	=> 'Erfahren mit PHP und phpBB',
			),
		),
	),
));
