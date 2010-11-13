<?php
/**
*
* @package Support Toolkit - Recache moderators
* @version $Id: recache_moderators.php 456 2010-06-24 11:29:29Z erikfrerejean $
* @copyright (c) 2010 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* Translated By: http://phpbbportugal.com/
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
   'RECACHE_MODERATORS'         	=> 'Actualizar a cache de moderadores',
   'RECACHE_MODERATORS_COMPLETE'    => 'A cache de moderadores foi actualizada com sucesso.',
   'RECACHE_MODERATORS_CONFIRM'     => 'Tem a certeza que deseja actualizar a cache de moderadores?',
));

?>