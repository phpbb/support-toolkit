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

function filter_phpbb_tables(&$existing_tables)
{
	global $table_prefix;

	if (empty($existing_tables))
	{
		return;
	}

	// tmp array
	$_existing_tables = array();
	foreach ($existing_tables as $table)
	{
		if (strpos($table, $table_prefix) === 0)
		{
			$_existing_tables[] = $table;
		}
	}

	// Overwrite array
	$existing_tables = $_existing_tables;
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
	$filelist = array_shift(filelist(STK_ROOT_PATH . 'includes/database_cleaner/data/', '', PHP_EXT));

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

		// Break after our version
		if (version_compare($version, $phpbb_version, '>'))
		{
			break;
		}
	}

	// Some things need to be changed later
	switch ($version)
	{
		case '3_0_8_dev' :
		case '3_0_7_pl1' :
		case '3_0_7' :
		case '3_0_6' :
		case '3_0_5' :
		case '3_0_4' :
		case '3_0_3' :
		case '3_0_2' :
		case '3_0_1' :
		case '3_0_0' :
			$data->config_data['version'] = $phpbb_version;
		break;
	}
}
?>