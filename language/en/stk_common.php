<?php
/**
*
* stk_common [English]
*
* @package Support Tool Kit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_STK'))
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

/**
 * Error messages
 */
$lang = array_merge($lang, array(
	'CAT_NOT_EXISTS'		=> 'The requested category doesn\'t exists!',
	'TOOL_INVALID_CLASS'	=> 'The tool file %1$s does not contain the correct class [%2$s]',
	'TOOL_NOT_EXISTS'		=> 'The requested tool doesn\'t exist!',
));

/**
 * Category related language strings
 */
$lang = array_merge($lang, array(
	'CAT_ADMIN'				=> 'Admin tools',
	'CAT_ADMIN_EXPLAIN'		=> 'Administration tools',
//	'CAT_INVALID'	=> 'The requested category doesn\'t exists!',
	'CAT_SUPPORT'			=> 'Support tools',
	'CAT_SUPPORT_EXPLAIN'	=> 'Support related tools',
));

?>