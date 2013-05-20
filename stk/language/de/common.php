<?php
/**
*
* @package Support Toolkit [Deutsch — Du]
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Deutsche Übersetzung durch die Übersetzer-Gruppe von phpBB.de:
* siehe docs/README und https://www.phpbb.de/go/ubersetzerteam
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
// ’ » „ “ — …
//

$lang = array_merge($lang, array(
	'BACK_TOOL'							=> 'Zurück zum zuletzt verwendeten Tool',
	'BOARD_FOUNDER_ONLY'				=> 'Nur Gründer dürfen das Support Toolkit nutzen.',

	'CAT_ADMIN'							=> 'Admin-Tools',
	'CAT_ADMIN_EXPLAIN'					=> 'Die Admin-Tools können vom Administrator genutzt werden, um einzelne Aspekte des Forums zu verwalten und häufige Probleme zu lösen.',
	'CAT_DEV'							=> 'Entwickler-Tools',
	'CAT_DEV_EXPLAIN'					=> 'Die Entwickler-Tools können von phpBB- und Mod-Entwicklern genutzt werden, um häufig vorkommende Vorgänge auszuführen.',
	'CAT_ERK'							=> 'Notfall-Reparatur',
	'CAT_ERK_EXPLAIN'					=> 'Die Notfall-Reparatur ist ein getrenntes Paket des Support Toolkits, das einige Prüfungen durchführt, um Einstellungen zu finden, die die Funktion von phpBB beeinträchtigen könnten. Klicke <a href="%s">hier</a>, um die Notfall-Reparatur zu starten.',
	'CAT_MAIN'							=> 'Allgemein',
	'CAT_MAIN_EXPLAIN'					=> 'Das Support Toolkit (STK) kann genutzt werden, um häufige Probleme einer phpBB 3.0.x-Installation zu lösen. Es fungiert als zweiter Administrations-Bereich und stattet den Administrator mit einer Sammlung von Tools aus. Diese Tools können häufige Probleme lösen, die eine ordnungsgemäße Funktion einer phpBB 3-Installation verhindern können.',
	'CAT_SUPPORT'						=> 'Support-Tools',
	'CAT_SUPPORT_EXPLAIN'				=> 'Die Support-Tools können genutz werden, um eine phpBB 3.0.x-Installation zu reparieren, die nicht mehr funktioniert.',
	'CAT_USERGROUP'						=> 'Benutzer/Gruppen-Tools',
	'CAT_USERGROUP_EXPLAIN'				=> 'Die Benutzer- und Gruppen-Tools können genutzt werden, um Aspekte von Benutzern und Gruppen zu verwalten, die in einer phpBB 3.0.x-Standardinstallation nicht möglich sind.',
	'CONFIG_NOT_FOUND'					=> 'Die Konfigurationsdatei des STK konnte nicht geladen werden. Bitte überprüfe deine Installation.',

	'DOWNLOAD_PASS'						=> 'Passwort-Datei herunterladen',

	'EMERGENCY_LOGIN_NAME'				=> 'STK Notfall-Anmeldung',
	'ERK'								=> 'Notfall-Reparatur',

	'FAIL_REMOVE_PASSWD'				=> 'Die Passwort-Datei konnte nicht entfernt werden. Bitte entferne die Datei von Hand!',

	'GEN_PASS_FAILED'					=> 'Das Support-Toolkit war nicht in der Lage, ein neues Passwort zu erstellen. Bitte versuche es erneut.',
	'GEN_PASS_FILE'						=> 'Passwort-Datei erstellen',
	'GEN_PASS_FILE_EXPLAIN'				=> 'Wenn du dich nicht an deinem Board anmelden kannst, kannst du die interne Authentifizierung des Support Toolkits nutzen. Um diese Methode zu benutzen, musst du eine neue Passwort-Datei <a href="%s"><strong>erstellen</strong></a>.',

	'INCORRECT_CLASS'					=> 'Fehlerhafte Klasse in: stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'Das Passwort ist falsch',
	'INCORRECT_PHPBB_VERSION'			=> 'Die verwendete phpBB-Version ist mit diesem Tool nicht kompatibel. Dieses Tool funktioniert nur mit phpBB %1$s oder höher.',

	'LOGIN_STK_SUCCESS'					=> 'Du hast dich erfolgreich angemeldet und wirst nun zum Support Toolkit weitergeleitet.',

	'NOTICE'							=> 'Hinweis',
	'NO_VERSION_FILE'					=> 'Das Support Toolkit (STK) war nicht in der Lage, die aktuelle Version zu ermitteln. Bitte besuche die <a href="http://phpbb.com/support/stk">Seiten des Support Toolkits auf phpBB.com</a> und prüfe, ob du die aktuelle Version verwendest, bevor du fortfährst.',

	'REQUEST_PHPBB_VERSION'				=> 'phpBB-Version festlegen',
	'REQUEST_PHPBB_VERSION_EXPLAIN'		=> 'Die Support-Tools waren nicht in der Lage, die verwendete phpBB-Version zu identifizieren. Bitte wähle die richtige Version aus der Liste aus, bevor du fortfährst.<br />Bitte besuche die <a href="http://www.phpbb.com/community/viewforum.php?f=46">Support-Foren</a> (<a href="https://www.phpbb.de/go/3/supportforum">deutschsprachige Foren</a>), um Unterstützung bei der Behebung des Problems zu erhalten.',

	'PASS_GENERATED'					=> 'Deine STK Passwort-Datei wurde erfolgreich erstellt!<br/>Das Passwort, das für dich erstellt wurde, lautet: <em>%1$s</em><br />Dieses Passwort ist gültig bis: <span style="text-decoration: underline;">%2$s</span>. Nach Ablauf dieser Zeit <strong>musst</strong> du eine neue Passwort-Datei erstellen, um den Notfall-Zugang weiterhin nutzen zu können!<br /><br />Benutze die folgende Schaltfläche, um die Datei herunterzuladen. Anschließend musst du die Datei in das „stk“-Verzeichnis des Servers hochladen.',
	'PASS_GENERATED_REDIRECT'			=> 'Sobald du die Datei im richtigen Verzeichnis hochgeladen hast, klicke <a href="%s">hier</a>, um zur Anmelde-Seite zurückzukehren.',
	'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Dieses Tool ist nicht mit der verwendeten phpBB-Version kompatibel',
	'PROCEED_TO_STK'					=> '%sWeiter zum Support Toolkit%s',

	'STK_FOUNDER_ONLY'					=> 'Du musst deine Anmeldung bestätigen, bevor du das Support Toolkit nutzen kannst.',
	'STK_LOGIN'							=> 'Support Toolkit-Anmeldung',
	'STK_LOGIN_WAIT'					=> 'Du musst drei Sekunden warten, bevor du einen erneuten Anmeldeversuch unternehmen kannst. Bitte versuch es erneut.',
	'STK_LOGOUT'						=> 'STK beenden',
	'STK_LOGOUT_SUCCESS'				=> 'Du wurdest erfolgreich vom Support Toolkit abgemeldet.',
	'STK_NON_LOGIN'						=> 'Anmeldung zum STK.',
	'STK_OUTDATED'						=> 'Die Installation des Support Toolkits scheint veraltet zu sein. Die aktuell verfügbare Version ist <strong style="color: #008000;">%1$s</strong>, während diese Installation Version <strong style="color: #FF0000;">%2$s</strong> ist.<br /><br />Auf Grund der möglichen großen Auswirkungen dieses Tools auf die Installation wurde es deaktiviert, bis ein Update durchgeführt wurde. Es wird dringend empfohlen, die auf dem Server verwendete Software aktuell zu halten. Weitere Informationen zum letzten Update sind in der <a href="%3$s">Bekanntmachung</a> verfügbar.<br /><br /><em>Wenn diese Meldung nach einem Update angezeigt wird, kann der Versions-Cache <a href="%4$s">hier</a> gelöscht werden.</em>',
	'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
	'SUPPORT_TOOL_KIT_INDEX'			=> 'Support Toolkit-Übersicht',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Passwort',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Da du nicht in deinem phpBB 3 angemeldet bist, musst du bestätigen, dass du der Besitzer des Boards bist, in dem du das Support Toolkit-Passwort eingibst.<br /><br /><strong>Cookies MÜSSEN von deinem Browser akzeptiert werden, damit du angemeldet bleibst.</strong>',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'Dieses Tool versucht eine Datei (%1$s) zu laden, die nicht existiert.',
	'TOOL_NAME'							=> 'Name des Tools',
	'TOOL_NOT_AVAILABLE'				=> 'Das angeforderte Tool ist nicht verfügbar.',

	'USING_STK_LOGIN'					=> 'Du bist mit der STK-eigenen Anmeldemethode angemeldet. Diese Methode sollte <strong>nur</strong> genutzt werden, wenn du dich nicht an deinem phpBB anmelden kannst.<br />Um diese Anmeldemethode zu deaktivieren, klicke <a href="%1$s">hier</a>.',
));
