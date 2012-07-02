<?php
/**
*
* @package Support Toolkit - Resynchronise Registered users groups
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
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
	'RESYNC_USER_GROUPS'      => 'Synkronisering af brugergrupper',	
	'RESYNC_USER_GROUPS_EXPLAIN'  => 'Værktøjet er konstrueret til at kontrollere alle brugere er korrekt tilknyttet en af standardgrupperne <em>Tilmeldte brugere, Tilmeldte COPPA-brugere og Nye brugere</em>',
 	'RESYNC_USER_GROUPS_NO_RUN'    => 'Alle grupper synes at være opdaterede!',
 	'RESYNC_USER_GROUPS_SETTINGS'  => 'Mulige synkroniseringer',
 	'RUN_BOTH_FINISHED'        => 'Synkronisering af alle brugergrupper er fuldført!',
 	'RUN_RNR'            => 'Synkronisering af nye brugere',
 	'RUN_RNR_EXPLAIN'        => 'Brugergruppen "Nye brugere" opdateres, så den indeholder alle brugere som matcher indstillingerne i ACP.',
 	'RUN_RNR_FINISHED'        => 'Synkronisering af gruppen nye brugere er fuldført!',
 	'RUN_RNR_NOT_FINISHED'      => 'Synkronisering af gruppen nye brugere er under udførsel. Afbryd venligst ikke processen',
 	'RUN_RR'            => 'Synkroniser tilmeldte brugere',
 	'RUN_RR_EXPLAIN'        => 'Ikke alle boardets brugere er medlem af gruppen "Tilmeldte <em>(COPPA)</em>-brugere". Ønsker du at synkronisere disse grupper?<br /><strong>Bemærk</strong> at er COPPA aktiv på dit board, vil brugere som ikke har angivet en fødseldato blive tilknyttet gruppen "Tilmeldte COPPA-brugere"!',
 	'RUN_RR_FINISHED'        => 'Synkronisering af brugere er fuldført!',

 	'SELECT_RUN_GROUP'  => 'Vælg mindst en gruppe til synkronisering.',
));
