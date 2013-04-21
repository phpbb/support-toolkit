<?php
/**
*
* @package Support Toolkit - Restore Delted Users
* @version $Id$
* @copyright (c) 2009 phpBB Group
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
    'DAMAGED_POSTS'							=> 'Beschadigde berichten',
	'DAMAGED_POSTS_EXPLAIN'					=> 'De volgende bericht IDs kunnen niet worden hersteld. Bezoek de <a href="http://www.phpbb.nl/forums/viewforum.php?f=40">supportforums</a> om hulp te krijgen om dit probleem op te lossen.',

	'NO_DELETED_USERS'						=> 'Er zijn geen verwijderd gebruikers die hersteld kunnen worden',
	'NO_USER_SELECTED'						=> 'Geen gebruikers geselecteerd!',

	'RESTORE_DELETED_USERS'					=> 'Verwijderde Gebruikers Terughalen',
	'RESTORE_DELETED_USERS_CONFLICT'		=> 'Verwijderde Gebruikers Terughalen :: Conflict gevonden',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'=> 'Deze tool stelt je in staat om gebruikers terug te halen die van het forum zijn verwijderd, maar nog wel "gast" berichten op het forum hebben staan.<br />Voor deze gebruikers zal een willekeurig wachtwoord worden gegenereerd dat je handmatig dient te wijzigen zodra de tool klaar is. Deze tool geeft geen lijst met gegenereerde wachtwoorden per gebruiker!<br /><br />Tijdens de laatste run heeft de tool gebruikersnamen gevonden die al bestaan. Voor deze gebruikers dien je een nieuwe gebruikersnaam op te geven.',
	'RESTORE_DELETED_USERS_EXPLAIN'			=> 'Deze tool stelt je in staat om gebruikers terug te halen die van het forum zijn verwijderd, maar nog wel "gast" berichten op het forum hebben staan.<br />Voor deze gebruikers zal een willekeurig wachtwoord worden gegenereerd dat je handmatig dient te wijzigen zodra de tool klaar is. Deze tool geeft geen lijst met gegenereerde wachtwoorden per gebruiker!',

	'SELECT_USERS'							=> 'Selecteer de Gebruikers om terug te halen',

	'USER_RESTORED_SUCCESSFULLY'			=> 'De geselecteerde gebruiker is terug gezet.',
	'USERS_RESTORED_SUCCESSFULLY'			=> 'De geselecteerde gebruikers zijn terug gezet.',
));
