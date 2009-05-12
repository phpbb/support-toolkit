<?php
/**
*
* @package Support Tool Kit - Database Cleaner
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
	'BOARD_DISABLE_SUCCESS'			=> 'The board has been disabled successfully!',

	'CONFIG_SETTINGS'				=> 'Config Settings',
	'CONFIG_UPDATE_SUCCESS'			=> 'The configuration settings have been updated successfully!',
	'CONTINUE'						=> 'Continue',

	'DATABASE_CLEANER'				=> 'Database Cleaner',
	'DATABASE_CLEANER_EXPLAIN'		=> 'Reverts the database structure to a base 3.0.x install (used to remove mods and re-add missing items).',
	'DATABASE_CLEANER_EXTRA'		=> 'Any others are extra items added by modifications.  <strong>If the check box is selected it will be removed</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Any fields with a red background like this are missing items that should be added.  <strong>If the check box is selected it will be added</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'The database cleaner has successfully finished all tasks!<br /><br />Please be sure to backup your database again.',
	'DATABASE_CLEANER_WARNING'		=> 'This tool comes with NO WARRANTY and users of this tool should back up their entire database in case of a failure.<br /><br />Before continuing, make sure you have a database backup!',
	'DATABASE_CLEANER_WELCOME'		=> 'Welcome to the Database Cleaner tool!<br /><br />This tool was designed to remove extra columns, rows, and tables from the database not present in the default installation of phpBB3.<br /><br />When you are ready to continue click the Continue button to start using the Database Cleaner tool (note that your board will be disabled until this is finished).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'The database columns have been updated successfully!',
	'DATABASE_TABLES'				=> 'Database Tables',
	'DATABASE_TABLES_SUCCESS'		=> 'The database tables have been updated successfully!',

	'ERROR'							=> 'Error',
	'EXTRA'							=> 'Extra',

	'FINAL_STEP'					=> 'This is the final step.<br /><br />We will now re-enable your board and purge your forum\'s cache.',

	'INSTRUCTIONS'					=> 'Instructions',

	'MISSING'						=> 'Missing',
	'MODULE_UPDATE_SUCCESS'			=> 'The modules have been updated successfully!',

	'NO_BOT_GROUP'					=> 'Could not reset the bots, missing Bot group.',

	'PERMISSION_SETTINGS'			=> 'Permission Options',
	'PERMISSION_UPDATE_SUCCESS'		=> 'The permission settings have been updated successfully!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Your version of phpBB3 is not supported (or some files from the Support Tool Kit are missing).<br />phpBB 3.0.0+ should be supported, but it may take some time between a new version of phpBB3 being released and this tool being updated to support the newest version.',

	'QUIT'							=> 'Quit',

	'RESET_BOTS'					=> 'Reset Bots',
	'RESET_BOTS_EXPLAIN'			=> 'Would you like to reset the bots list to the default phpBB3 bot list?  All existing bots will be removed and be replaced with the default set.',
	'RESET_BOT_SUCCESS'				=> 'The bots have been reset successfully!',
	'RESET_MODULES'					=> 'Reset Modules',
	'RESET_MODULES_EXPLAIN'			=> 'Would you like to reset the modules to the default phpBB3 modules?  All existing modules will be removed and be replaced with the default ones.',
	'RESET_MODULE_SUCCESS'			=> 'The modules have been reset successfully!',
	'ROWS'							=> 'Rows',

	'SUCCESS'						=> 'Success',

	'TYPE'							=> 'Type',
));

?>