<?php
/**
*
* @package Support Toolkit - Merge Users
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
	'MERGE_USERS'							=> 'Gebruikers samenvoegen',
	'MERGE_USERS_EXPLAIN'					=> 'Een hulpmiddel om de gegevens van een gebruikersaccount samen te voegen met een andere account, de gegevens van de brongebruiker en de groepspermissies worden gekopiëerd. De gegevens zijn: gebruikerspermissies, bijlagen, verbanningen, bladwijzers, concepten, bekeken forum/onderwerpen, abonnementen van forum/onderwerpen, logboekvermeldingen, stemmen van peilingen, privéberichten, meldingen, onderwerpen, waarschuwingen en vrienden en vijanden.<br /><strong>U mag alleen een gebruikersnaam of gebruikers-ID invoeren, niet beide.</strong>',

	'MERGE_USERS_BOTH_FOUNDERS'				=> 'U kunt niet een oprichter samenvoegen met een gebruiker die geen oprichter is.',
	'MERGE_USERS_BOTH_IGNORE'				=> 'U kunt geen bot samenvoegen met een normale gebruiker.',

	'MERGE_USERS_MERGED'					=> 'Gebruikers zijn succesvol samengevoegd.',

	'MERGE_USERS_REMOVE_SOURCE'				=> 'Brongebruiker verwijderen',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'		=> 'Wanneer u dit hulpmiddel aanvinkt, zal het de brongebruiker van het forum verwijderen.',

	'MERGE_USERS_SAME_USERS'				=> 'De bron- en doelgebruiker moeten verschillend zijn.',

	'MERGE_USERS_USER_SOURCE_NAME'			=> 'Brongebruiker. (Gebruikersnaam)',
	'MERGE_USERS_USER_SOURCE_ID'			=> 'Brongebruiker. (Gebruikers-ID)',
	'MERGE_USERS_USER_SOURCE_NAME_EXPLAIN'	=> 'Berichten, privéberichten, permissies, waarschuwingen, etc. worden verplaatst van deze gebruiker naar de doelgebruiker, groepslidmaatschappen en gebruikersinstellingen worden gekopiëerd.',
	'MERGE_USERS_USER_TARGET_NAME'			=> 'Doelgebruiker. (Gebruikersnaam)',
	'MERGE_USERS_USER_TARGET_ID'			=> 'Doelgebruiker. (Gebruikers-ID)',
	
	'NO_SOURCE_USER'						=> 'De brongebruiker die opgegeven is bestaat niet.',
	'NO_TARGET_USER'						=> 'De doelgebruiker die opgegeven is bestaat niet.',
	
	'BOTH_SOURCE_USER'						=> 'Vul alleen één veld in voor de brongebruiker.',
	'BOTH_TARGET_USER'						=> 'Vul alleen één veld in voor de doelgebruiker.',	
));

?>