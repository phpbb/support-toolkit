<?php
/**
*
* @package Support Toolkit - Reset Styles
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @copyright (c) 2011 phpBBItalia.net - translated on 2011-10-09
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
	'RESET_STYLES'			=> 'Ripristina stili',
	'RESET_STYLES_EXPLAIN'	=> 'Questo strumento ti permette di cambiare lo stile predefinito della tua Board.',
	'RESET_STYLE_COMPLETE'	=> 'Lo stile predefinito è stato modificato con successo.',

	'STYLE'					=> 'Stile',
	'STYLE_EXPLAIN'			=> 'Seleziona lo stile che si desidera impostare come predefinito.',
));
