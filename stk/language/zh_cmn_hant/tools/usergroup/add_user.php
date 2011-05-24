<?php
/**
*
* @package Support Toolkit - Add User
* @version $Id$
* @copyright (c) 2009 phpBB-TW (心靈捕手) http://phpbb-tw.net/phpbb/
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
	'ADD_USER'				=> '增加會員',
	'ADD_USER_GROUP'		=> '增加會員到群組',

	'DEFAULT_GROUP'			=> '預設群組',
	'DEFAULT_GROUP_EXPLAIN'	=> '這個會員的預設群組。',

	'GROUP_LEADER'			=> '群組組長',
	'GROUP_LEADER_EXPLAIN'	=> '讓這個會員成為所選擇群組的群組組長。',

	'USER_ADDED'			=> '這個會員已經成功地建立！',
	'USER_GROUPS'			=> '會員群組',
	'USER_GROUPS_EXPLAIN'	=> '讓這個會員成為所選擇群組的群組會員。',
));

?>