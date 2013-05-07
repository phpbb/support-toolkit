<?php
/**
*
* @package Support Toolkit - Restore Delted Users
* @version $Id$
* @copyright (c) 2009 phpBB Group , 2013 http://www.phpBBservice.nl
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'DAMAGED_POSTS'			=> 'Beschadigde berichten',
	'DAMAGED_POSTS_EXPLAIN'	=> 'De volgende bericht-IDs bevatten gebruikersinformatie die te beschadigd zijn om hersteld te kunnen worden. Bezoek de <a href="http://forum.phpbbservice.nl/viewforum.php?f=42">supportforums</a> om hulp te krijgen om dit probleem op te lossen.',
	
	'NO_DELETED_USERS'	=> 'Er zijn geen gebruikers die kunnen worden herstelt.',
	'NO_USER_SELECTED'	=> 'er zijn geen gebruikers geselecteerd!',

	'RESTORE_DELETED_USERS'						=> 'Herstel verwijderde gebruikers',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Herstel verwijderde gebruikers :: Er is een conflict opgetreden',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Met dit hulpmiddel kunt u gebruikers herstellen die zijn verwijderd van u forum, maar die nog steeds "gast" berichten hebben op het forum.<br />Deze gebruikers zillen een willekeurig wachtwoord krijgen die ze handmatig moeten reseten nadat dit hulpmiddel is gedraaid. Dit hulpmiddel geeft geen lijst van de wachtwoorden die zijn gegenegeerd per gebruiker!<br /><br />Tijdens de laatste stap van dit hulpmiddel zal er een controle worden uitgevoerd als gebruikersnamen al bestaan op het forum, geef deze gebruikers een nieuwe gebruikersnaam.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Met dit hulpmiddel kunt u gebruikers herstellen die zijn verwijderd van u forum, maar die nog steeds "gast" berichten hebben op het forum.<br />Deze gebruikers zillen een willekeurig wachtwoord krijgen die ze handmatig moeten reseten nadat dit hulpmiddel is gedraaid. Dit hulpmiddel geeft geen lijst van de wachtwoorden die zijn gegenegeerd per gebruiker!',

	'SELECT_USERS'	=> 'Selecteer de gebruiker die u wilt herstellen',

	'USER_RESTORED_SUCCESSFULLY'	=> 'De geselecteerde gebruiker is succesvol hersteld.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'De geselecteerde gberuikers zijn succesvol hersteld.',
));

?>