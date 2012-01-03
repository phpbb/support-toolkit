<?php
/**
*
* @package Support Toolkit - Auto Cookies
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2011 phpBBItalia.net - translated on 2011-10-08
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
	'AUTO_COOKIES'				=> 'Cookie automatici',
	'AUTO_COOKIES_EXPLAIN'		=> 'Questo strumento permette di cambiare le impostazioni dei cookie del tuo forum. Le impostazioni suggerite dovrebbero essere corrette nella maggior parte dei casi. Se non sei sicuro delle corrette impostazioni, cerca la guida nel forum di supporto prima di cambiarle, perché le impostazioni errate possono impedirti di accedere al tuo Forum.',

	'COOKIE_SETTINGS_UPDATED'	=> 'Le impostazioni dei cookie sono state aggiornate con successo.',
));
