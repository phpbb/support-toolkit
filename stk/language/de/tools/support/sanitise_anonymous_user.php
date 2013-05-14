<?php
/**
*
* @package Support Toolkit - Anonymous group check [Deutsch — Du]
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Deutsche Übersetzung durch die Übersetzer-Gruppe von phpBB.de:
* siehe docs/README und http://www.phpbb.de/go/ubersetzerteam
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
	'ANONYMOUS_CLEANED'					=> 'Die Profil-Daten des Gäste-Benutzerkontos wurden erfolgreich gereinigt.',
	'ANONYMOUS_CORRECT'					=> 'Das Gäste-Benutzerkonto existiert und ist korrekt konfiguriert.',
	'ANONYMOUS_CREATED'					=> 'Das Gäste-Benutzerkonto wurde erfolgreich neu erstellt.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Es war nicht möglich, das Gäste-Benutzerkonto neu zu erstellen. Bitte nutze die Support-Foren auf phpBB.com oder phpBB.de für weitere Unterstützung.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'Das Gäste-Benutzerkonto wurde erfolgreich von allen Benutzergruppen entfernt.',
	'ANONYMOUS_MISSING'					=> 'Das Gäste-Benutzerkonto fehlt.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'Das Gäste-Benutzerkonto fehlt in der Datenbank. Dieses Konto wird benötigt, damit Gäste auf dein Board zugreifen können. Willst du das Konto erneut anlegen?',
	'ANONYMOUS_WRONG_DATA'				=> 'Das Profil des Gäste-Benutzerkontos ist fehlerhaft.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Das Profil des Gäste-Benutzerkontos ist teilweise fehlerhaft. Willst du dies reparieren?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Das Gäste-Benutzerkonto gehört fälschlicherweise mehreren Benutzergruppen an.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Das Gäste-Benutzerkonto gehört fälschlicherweise mehreren Benutzergruppen an. Willst du es aus allen Gruppen außer der „Gäste“-Gruppe entfernen?',

	'REDIRECT_NEXT_STEP'				=> 'Du wirst zum nächsten Schritt weitergeleitet.',

	'SANITISE_ANONYMOUS_USER'			=> 'Gäste-Benutzerkonto reinigen',
));
