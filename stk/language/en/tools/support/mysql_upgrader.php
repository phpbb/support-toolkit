<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'			=> 'MySQL Upgrader',
	'MYSQL_UPGRADER_CONFIRM'	=> 'Are you sure you want to run the MySQL upgrader?<br />Make sure that you\'ve made a full backup of the database before proceding!',
	'MYSQL_UPGRADER_RESULT'		=> 'The MySQL Upgrader has successfully generated the query that you can use to correct the database schema of the phpBB installation. This result can be:
									<ul>
										<li>Be run all in one go via phpmyadmin <em>(see http://www.phpbb.com/kb/article/executing-sql-queries-in-phpmyadmin/)</em>.</li>
										<li>Or run via the MySQL console.</li>
										<li>Or given to the host to run.</li>
									</ul>',

	'TOOL_MYSQL_ONLY'	=> 'This tool is only available for users of the MySQL DBMS',
));

?>