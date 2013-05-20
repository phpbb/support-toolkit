<?php
/**
*
* @package Support Toolkit - Make Founder [Deutsch — Du]
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
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'BOTH_FIELDS_FILLED'		=> 'Es darf entweder der Benutzername oder die ID des Benutzers angegeben werden.',

	'DEMOTE_FAILED'				=> 'Der Gründer-Status konnte nicht allen Benutzern entzogen werden!',
	'DEMOTE_FOUNDERS'			=> 'Gründer-Status entziehen',
	'DEMOTE_SUCCESSFULL'		=> 'Der Gründer-Status wurde erfolgreich %d Benutzern entzogen!',

	'FOUNDERS'					=> 'Benutzer mit Gründer-Status',

	'MAKE_FOUNDER'				=> 'Benutzer zum Gründer ernennen',
	'MAKE_FOUNDER_CONFIRM'		=> 'Bist du sicher, dass du <a href="%1$s">%2$s</a> zum Gründer ernennen willst? Dies gibt <a href="%1$s">%2$s</a> neben anderen Rechten die Möglichkeit, dein Benutzerkonto zu löschen.',
	'MAKE_FOUNDER_FAILED'		=> 'Der Benutzer konnte nicht zum Gründer ernannt werden',
	'MAKE_FOUNDER_SUCCESS'		=> '<a href="%1$s">%2$s</a> erfolgreich zum Gründer ernannt.',
	'MANAGE_FOUNDERS'			=> 'Gründer verwalten',

	'NO_FOUNDERS'				=> 'Es wurden keine Gründer gefunden',

	'PROMOTE_FOUNDER'			=> 'Gründer ernennen',

	'USER_NAME_TO_FOUNDER'			=> 'Benutzername des zum Gründer zu ernennenden Benutzers',
	'USER_NAME_TO_FOUNDER_EXPLAIN'	=> 'Gebe den Benutzernamen des Benutzers an, der zum Gründer ernannt werden soll.',
	'USER_ID_TO_FOUNDER'			=> 'ID des zum Gründer zu ernennenden Benutzers',
	'USER_ID_TO_FOUNDER_EXPLAIN'	=> 'Gebe die ID des Benutzers an, der zum Gründer ernannt werden soll.',
));
