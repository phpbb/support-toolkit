<?php
/**
*
* @package Support Toolkit - Tutorial
* @version $Id$
* @copyright (c) 2009 phpBB Group, (c) 2009 phpBB.fr
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License 2.0
*
*/

/*
* This will be a tutorial page for how to build a new tool to be used with the Support Toolkit.
*
* Before you ask why this tool does not show in the Tools list in the Support Toolkit, that is because the Support Toolkit is setup to ignore the file named tutorial.php.
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
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
	'TUTORIAL'			=> 'Ceci est un didacticiel',
	'TUTORIAL_EXPLAIN'	=> 'Ceci est une explication du didacticiel',
));