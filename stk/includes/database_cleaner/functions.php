<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Collect all configiration data.
*/
function get_config_rows(&$phpbb_config, &$config_rows, &$existing_config)
{
	global $db;

	$existing_config = array();
	$sql = 'SELECT config_name FROM ' . CONFIG_TABLE . ' ORDER BY config_name ASC';
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result))
	{
		$existing_config[] = $row['config_name'];
	}
	$db->sql_freeresult($result);

	$config_rows = array_unique(array_merge(array_keys($phpbb_config), $existing_config));
	sort($config_rows);
}

function get_permission_rows(&$cleaner, &$permission_rows, &$existing_permissions)
{
	global $db;

	$existing_permissions = array();
	$sql = 'SELECT auth_option FROM ' . ACL_OPTIONS_TABLE;
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result))
	{
		$existing_permissions[] = $row['auth_option'];
	}
	$db->sql_freeresult($result);

	$permission_rows = array_unique(array_merge(array_keys($cleaner->permissions), $existing_permissions));
	sort($permission_rows);
}

function get_group_rows(&$cleaner, &$group_rows, &$existing_groups)
{
	global $db;

	$existing_groups = array();
	$sql = 'SELECT group_name FROM ' . GROUPS_TABLE . ' WHERE group_type = 3';
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result))
	{
		$existing_groups[] = $row['group_name'];
	}
	$db->sql_freeresult($result);

	$group_rows = array_unique(array_merge(array_keys($cleaner->groups), $existing_groups));
	sort($group_rows);
}

/**
* Get all tables used by phpBB
*/
function get_phpbb_tables()
{
	global $db, $table_prefix;

	static $_tables = array();
	if (!empty($_tables))
	{
		return $_tables;
	}

	if (!function_exists('get_tables'))
	{
		include PHPBB_ROOT_PATH . 'includes/functions_install.' . PHP_EXT;
	}

	// Function returns all tables in the database
	$all_tables = get_tables($db);

	// Only get tables using the phpBB prefix
	foreach ($all_tables as $table)
	{
		if (strpos($table, $table_prefix) === 0)
		{
			$_tables[] = $table;
		}
	}
	sort($_tables);

	return $_tables;
}

/**
* Compile the cleaner data
* @param database_cleaner_data The database cleaner data object
* @param String The version
*/
function fetch_cleaner_data(&$data, $phpbb_version)
{
	// Fetch all the files
	if (!function_exists('filelist'))
	{
		include PHPBB_ROOT_PATH . 'includes/functions_admin.' . PHP_EXT;
	}
	$filelist = array_shift(filelist(STK_ROOT_PATH . 'includes/database_cleaner/', 'data/', PHP_EXT));

	// Add the data
	foreach ($filelist as $file)
	{
		$version	= pathinfo($file, PATHINFO_FILENAME);
		$class		= 'datafile_' . $version;
		if (!class_exists($class))
		{
			include STK_ROOT_PATH . "includes/database_cleaner/data/{$version}." . PHP_EXT;
		}
		$_datafile = new $class();

		// Set the data
		$data->config_data = array_merge($data->config_data, $_datafile->config_data);
		$_datafile->get_schema_struct($data->schema_data);

		// Break after our version
		if (version_compare($version, $phpbb_version, 'eq'))
		{
			break;
		}
	}

	// Perform some actions that only have to be done on given versions or on all
	$data->config_data['version'] = $phpbb_version;		// We always need to set the version afterwards

	// Call init
	$data->init();
}
?>