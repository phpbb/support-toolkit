<?php
/**
*
* @package Support Toolkit - Merge Users
* @version $Id: merge_users.php 327 2010-10-17 21:01:58Z Raimon $
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
	'MERGE_USERS_EXPLAIN'				=> 'Een hulpmiddel de gegevens van een gebruikersaccount samen te voegen met een andere account, de bron gebruikersinstellingen en groepslidmaatschappen zullen worden gekopiëerd. De gegevens zijn; gebruikerspermisies, bijlagen, verbanning, bladwijzers, concepten, bekeken forum/onderwerpen, abonnementen van forum/onderwerpen, lopgboekvermeldingen, stemmen van peilingen, privéberichten, meldingen, onderwerpen, waarschuwingen en vrienden en vijanden.',

	'MERGE_USERS_BOTH_FOUNDERS'	=> 'U kan niet een oprichter samenvoegen met een gebruiker die geen oprichter is.',
	'MERGE_USERS_BOTH_IGNORE'	=> 'U kan geen bot samenvoegen met een normale gebruiker.',

	'MERGE_USERS_MERGED'		=> 'Gebruikers zijn succesvol samengevoegd.',

	'MERGE_USERS_REMOVE_SOURCE'			=> 'Brongebruiker verwijderen',
	'MERGE_USERS_REMOVE_SOURCE_EXPLAIN'	=> 'Wanneer u dit hulpmiddel aanvinkt, zal het de brongebruiker van het forum verwijderen.',

	'MERGE_USERS_SAME_USERS'	=> 'De bron- en doelgebruiker moeten verschillend zijn.',

	'MERGE_USERS_USER_SOURCE'			=> 'Brongebruiker',
	'MERGE_USERS_USER_SOURCE_EXPLAIN'	=> 'Berichten, privéberichten, permissies, waarschuwingen, etc. worden verplaatst van deze gebruiker naar de doelgebruiker, groepslidmaatschappen en gebruikersinstellingen worden gekopiëerd.',

	'MERGE_USERS_USER_TARGET'	=> 'Doelgebruiker',
));

?>