<?php
/**
*
* @package Support Toolkit - Reset Styles
* @phpBB source: reset_styles.php 529 2010-10-05 16:17:31Z erikfrerejean $
* @version $Id: reset_styles.php 115 2011-01-15 20:29:09Z jan skovsgaard $
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
	'RESET_STYLES'			=> 'Nulstil typografier',
	'RESET_STYLES_EXPLAIN'	=> 'Værktøjet kan ændre boardets standardtypografi.',
	'RESET_STYLE_COMPLETE'	=> 'Standardtypografien er ændret.',

	'STYLE'					=> 'Typografi',
	'STYLE_EXPLAIN'			=> 'Vælg den typografi der skal være ny standard.',
));