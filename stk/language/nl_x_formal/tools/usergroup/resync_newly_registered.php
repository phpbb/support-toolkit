<?php
/**
*
* @package Support Toolkit - Resynchronise Newly Registered users group
* @version $Id: resync_newly_registered.php 280 2010-02-28 00:55:41Z Raimon $
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
	'RESYNC_NEWLY_REGISTERED'				=> 'Pas geregistreerde gebruikers hersynchroniseren',
	'RESYNC_NEWLY_REGISTERED_CONFIRM'		=> 'Weet u zeker dat u de pas geregistreerde gebruikersgroep wilt hersynchroniseren? Dit zal eerst alle gebruikers verwijderen van de “Pas geregistreerde gebruikersgroep” en vervolgens zal het dan alle gebruikers toevoegen naar de “Pas geregistreerde gebruikersgroep” aan de hand van de instellingen in het beheerderspaneel.',
	'RESYNC_NEWLY_REGISTERED_FINISHED'		=> 'De pas geregistreerde gebruikersgroep is succesvol gehersynchroniseerd!',
	'RESYNC_NEWLY_REGISTERED_NOT_FINISHED'	=> 'Bezig met hersynchoniseren van de pas geregistreerde gebruikersgroep. Onderbreek dit proces niet!',
));

?>