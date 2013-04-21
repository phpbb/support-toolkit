<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id$
* @author Chris Smith <toonarmy@phpbb.com> (http://www.cs278.org/)
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
	'MERGE_USERS'						=> 'Gebruikers samenvoegen',
	'MERGE_USERS_EXPLAIN'				=> 'Tool om de accountverwijzingen van een gebruiker naar een ander account te kopiëren. De gebruikersinstellingen en groepslidmaatschappen van het bronaccount worden gekopieerd. Verwijzingen zijn gebruikerspermissies, bijlagen, bans, favorieten, concepten, forum/topic lidmaatschappen, bekeken forums/topics, logboekvermeldingen, poll stemmen, berichten, privéberichten, rapportages, onderwerpen, waarschuwingen en vrienden en vijanden.<br /><strong>Je kan hier de gebruikersnaam of gebruikers-ID invullen, niet beiden.</strong>',

	'MERGE_USERS_BOTH_FOUNDERS'			=> 'Je kunt een eigenaar niet samenvoegen met een niet eigenaar gebruiker.',
	'MERGE_USERS_BOTH_IGNORE'			=> 'Je kunt een bot niet samen voegen met een gewone gebruiker.',

	'MERGE_USERS_MERGED'				=> 'Gebruikers succesvol samengevoegd.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Verwijder brongebruiker',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Indien aangevinkt zal de brongebruiker worden verwijderd.',

	'MERGE_USERS_SAME_USERS'			=> 'De bron- en doelgebruiker mogen niet dezelfde zijn.',

	'MERGE_USERS_USER_SOURCE_NAME'			=> 'Brongebruiker. (Gebruikersnaam)',
	'MERGE_USERS_USER_SOURCE_ID'			=> 'Brongebruiker. (Gebruikers-ID)',
	'MERGE_USERS_USER_SOURCE_NAME_EXPLAIN'	=> 'Berichten, privéberichten, permissies, waarschuwingen, etc. zijn gekopieerd naar de doelgebruiker. Groepslidmaatschappen en instellingen zijn gekopieerd.',

	'MERGE_USERS_USER_TARGET_NAME'		=> 'Doelgebruiker. (Gebruikersnaam)',
	'MERGE_USERS_USER_TARGET_ID'		=> 'Doelgebruiker. (Gebruikers-ID)',

	'NO_SOURCE_USER'		=> 'De gezochte brongebruiker bestaat niet',
	'NO_TARGET_USER'		=> 'De gezochte doelgebruiker bestaat niet',

	'BOTH_SOURCE_USER'		=> 'Vul een veld in voor brongebruiker.',
	'BOTH_TARGET_USER'		=> 'Vul een veld in voor doelgebruiker.',
));
