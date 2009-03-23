<?php
/**
*
* @package Support Tool Kit - Fix Module Left/Right ID's
* @version $Id$
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
	'FIX_MODULES'			=> 'Fix Module Left/Right ID\'s',
	'FIX_MODULES_CONFIRM'	=> 'Are you sure you want to fix the modules left and right ID\'s?<br /><br /><strong>Make sure you backup your modules table before running this just in case something goes wrong.</strong>',
	'FIX_MODULES_EXPLAIN'	=> 'Repair the UCP/MCP/ACP module left and right ID\'s.  For more info <a href="http://www.lithiumstudios.org/forum/viewtopic.php?f=9&t=691">read this topic</a>.',

	'MODULE_FIX_SUCCESS'	=> 'The modules left/right ID\'s have been successfully fixed.',
));

?>