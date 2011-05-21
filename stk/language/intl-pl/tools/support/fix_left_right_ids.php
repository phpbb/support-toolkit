<?php
/**
*
* @package Support Toolkit - Fix Left/Right ID's
* @version $Id: 
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
	'FIX_LEFT_RIGHT_IDS'			=> 'Napraw Lewe/Prawe ID',
	'FIX_LEFT_RIGHT_IDS_CONFIRM'	=> 'Czy jesteś pewien że chcesz naprawić lewe i prawe ID?<br /><br /><strong>Wykonaj kopię zapasową bazy danych przed uruchomieniem tego narzędzia!</strong>',

	'LEFT_RIGHT_IDS_FIX_SUCCESS'	=> 'Pomyślnie naprawiono lewe/prawe ID.',
	'LEFT_RIGHT_IDS_NO_CHANGE'		=> 'Narzędzie ukończyło pracę sprawdzając wszystkie lewe i prawe ID, wszystkie wiersze są poprawne więc zmiany nie są wymagane.',
));

?>