<?php
/**
*
* [french]
*
* @package Support Toolkit - Auto Cookies
* @version $Id:	papicx	1.0.7	18/04/2013	14h47	$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @Translation phpBB-fr http://www.phpbb-fr.com
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'AUTO_COOKIES'				=> 'Automatisation des cookies',
	'AUTO_COOKIES_EXPLAIN'		=> 'Cet outil vous permet de modifier les réglages des cookies de votre forum. Les réglages qui vous sont suggérés sont corrects dans la plupart des cas. Si vous n’êtes pas certain(e) que les réglages soient corrects, veuillez rechercher de l’aide dans le forum de support avant de réaliser une mauvaise manipulation qui pourrait rendre impossible toute connexion à votre forum.',

	'COOKIE_SETTINGS_UPDATED'	=> 'Les réglages des cookies ont été mis à jour.',
));
