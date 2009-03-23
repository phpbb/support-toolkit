<?php
/**
*
* @package Support Tool Kit - Clean Database
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
	'CONFIRM_RESTORE_TABLES'			=> 'Restore tables?',
	'CONFIRM_RESTORE_TABLES_CONFIRM'	=> 'You are trying to restore some tables to their original state. Doing this will restore the tables to their original state.<br/>Are you sure that you want to continue this proccess?',

	'DATABASE_CLEANED'					=> 'The database was successfully restored to its original state.',

	'REMOVE_TABLES'						=> 'Remove tables',
	'REMOVE_TABLES_EXPLAIN'				=> 'When enabled this tool will remove all non phpBB tables <em>(but having the phpBB table prefix)</em> from the database.',
	'RESTORE_AUTH'						=> 'Restore permissions',
	'RESTORE_AUTH_EXPLAIN'				=> 'When enabled this tool will restore all the permissions to its original state <strong style="color: #f00;">this means that all permissions will be lost, and custom permissions will be removed</strong>',
	'RESTORE_BOTS'						=> 'Restore bots',
	'RESTORE_BOTS_EXPLAIN'				=> 'When enabled this tool will remove all existing bots from the system and re-add all bots that are installed by default.',
	'RESTORE_CONFIG'					=> 'Restore config',
	'RESTORE_CONFIG_EXPLAIN'			=> 'When enabled this tool fill restore the config table to its original state <strong>all non default values will be removed</strong>.',
	'RESTORE_DB'						=> 'Restore database',
	'RESTORE_DB_EXPLAIN'				=> 'This tool allowes you to restore your phpBB (partionally) to the original state.',
	'RESTORE_DB_BOARD_LOCKED'			=> 'Due to some database mentenance the board it temparelly offline.',
	'RESTORE_TABLES'					=> 'Restore tables',
	'RESTORE_TABLES_EXPLAIN'			=> 'When enabled this tool will restore all phpBB tables to its original state <em>all non default columns will be removed</em>.',

	'SETUP_DATABASE_CLEANER'			=> 'Setup the database cleaner',
));

?>