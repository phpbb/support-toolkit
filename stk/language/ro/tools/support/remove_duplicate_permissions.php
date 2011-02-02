<?php
/**
*
* @package Support Toolkit - Duplicate Permission Remover
* @version $Id: remove_duplicate_permissions.php 244 2009-10-22 11:00:13Z erikfrerejean $
* @translate $Id: remove_duplicate_permissions.php 244 2010-02-14 14:22:18 dorin rosculete $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'DUPLICATES_FOUND'						=> 'Acest utilitar a găsit şi eliminat toate permisiunile duplicate.',

	'NO_DUPLICATES_FOUND'					=> 'Utilitarul a terminat verificarea permisiunilor duplicate şi nu a găsit niciuna.',

	'REMOVE_DUPLICATE_PERMISSIONS'			=> 'Şterge permisiunile duplicate',
	'REMOVE_DUPLICATE_PERMISSIONS_CONFIRM'	=> 'Doriţi ştergerea permisiunilor duplicate?',
));

?>