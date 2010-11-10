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

function get_permission_rows(&$permission_data, &$permission_rows, &$existing_permissions)
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

	$permission_rows = array_unique(array_merge(array_keys($permission_data), $existing_permissions));
	sort($permission_rows);
}

/**
* Get all the phpBB system groups
*/
function get_group_rows(&$group_data, &$group_rows, &$existing_groups)
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

	$group_rows = array_unique(array_merge(array_keys($group_data), $existing_groups));
	sort($group_rows);
}

/**
* Get the columns of a given database table
* @param String $table The name of the table
*/
function get_columns($table)
{
	global $db;

	static $db_tools = null;
	if ($db_tools == null)
	{
		if (!class_exists('phpbb_db_tools'))
		{
			include(PHPBB_ROOT_PATH . 'includes/db/db_tools.' . PHP_EXT);
		}
		$db_tools = new phpbb_db_tools($db);
	}

	// Set the query and column for each dbms
	static $sql = '';
	static $column_name = '';
	if (empty($sql))
	{
		switch ($db_tools->sql_layer)
		{
			// MySQL
			case 'mysql_40'	:
			case 'mysql_41'	:
				$sql = "SHOW COLUMNS FROM %s";
				$column_name = 'Field';
			break;

			// PostgreSQL
			case 'postgres'	:
				$sql = "SELECT a.attname
					FROM pg_class AS c, pg_attribute AS a
					WHERE c.relname = '%s'
						AND a.attnum > 0
						AND a.attrelid = c.oid";
				$column_name = 'attname';
			break;

			// MsSQL
			case 'mssql'	:
				$sql = "SELECT c.name
					FROM syscolumns c
					LEFT JOIN (sysobjects o)
					ON (c.id = o.id)
					WHERE o.name = '%s'";
				$column_name = 'name';
			break;

			// Oracle
			case 'oracle'	:
				$sql = "SELECT column_name
					FROM user_tab_columns
					WHERE table_name = '%s'";
				$column_name = 'column_name';
			break;

			// Firebird
			case 'firebird'	:
				$sql = "SELECT RDB\$FIELD_NAME as FNAME
					FROM RDB\$RELATION_FIELDS
					WHERE RDB\$RELATION_NAME = '%s'";
				$column_name = 'fname';
			break;

			// SQLite
			case 'sqlite'	:
				$sql = "SELECT sql
					FROM sqlite_master
					WHERE type = 'table'
						AND name = '%s'";
				$column_name = 'sql';
			break;
		}
	}

	// Run the query
	$result = $db->sql_query(sprintf($sql, $table));

	// Get the columns
	$columns = array();

	if ($db_tools->sql_layer != 'sqlite')
	{
		while ($row = $db->sql_fetchrow($result))
		{
			array_push($columns, $row[$column_name]);
		}
	}
	else
	{
		// Unfortunately SQLite doen't play as nice as the others
		$col_ary = $entities = $matches = array();
		$cols = $declaration = '';

		while ($row = $db->sql_fetchrow($result))
		{
			preg_match('#\((.*)\)#s', $row[$column_name], $matches);

			$cols = trim($matches[1]);
			$col_ary = preg_split('/,(?![\s\w]+\))/m', $cols);

			foreach ($col_ary as $declaration)
			{
				$entities = preg_split('#\s+#', trim($declaration));
				if ($entities[0] == 'PRIMARY')
				{
					continue;
				}

				array_push($columns, $entities[0]);
			}
		}
	}

	$db->sql_freeresult($result);
	return $columns;
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
	global $config;

	// Fetch all the files
	if (!function_exists('filelist'))
	{
		include PHPBB_ROOT_PATH . 'includes/functions_admin.' . PHP_EXT;
	}
	$filelist = array_shift(filelist(STK_ROOT_PATH . 'includes/database_cleaner/', 'data/', PHP_EXT));
	sort($filelist);

	// Add the data
	foreach ($filelist as $file)
	{
		$version	= pathinfo_filename($file);
		$class		= 'datafile_' . $version;
		if (!class_exists($class))
		{
			include STK_ROOT_PATH . "includes/database_cleaner/data/{$version}." . PHP_EXT;
		}
		$_datafile = new $class();

		// Set the data
		$data->bots					= array_merge($data->bots, $_datafile->bots);
		$data->config_data			= array_merge($data->config_data, $_datafile->config_data);
		$data->permissions			= array_merge($data->permissions, $_datafile->permissions);
		$data->module_categories	= array_merge($data->module_categories, $_datafile->module_categories);
		$data->module_extras		= array_merge($data->module_extras, $_datafile->module_extras);
		$data->groups				= array_merge($data->groups, $_datafile->groups);
		$_datafile->get_schema_struct($data->schema_data);

		// Break after our version
		if (version_compare($version, $phpbb_version, 'eq'))
		{
			break;
		}
	}

	// Perform some actions that only have to be done on given versions or on all
	switch($phpbb_version)
	{
		case '3_0_8_RC1' :
		case '3_0_7_pl1' :
		case '3_0_7' :
		case '3_0_6' :
			// If $config['questionnaire_unique_id] exists add it to the config data array
			if (isset($config['questionnaire_unique_id']))
			{
				$data->config_data['questionnaire_unique_id'] = array('config_value' => $config['questionnaire_unique_id'], 'is_dynamic' => '0');
			}

			// Need to force do some ordering on $module_extras
			$extra_add = array('ACP_FORUM_PERMISSIONS_COPY');
			array_splice($data->module_extras['acp']['ACP_FORUM_BASED_PERMISSIONS'], 1, 0, $extra_add);

		// No Break

		case '3_0_5' :
		case '3_0_4' :
		case '3_0_3' :
		case '3_0_2' :
		case '3_0_1' :
		case '3_0_0' :
			$data->config_data['version'] = $phpbb_version;		// We always need to set the version afterwards
		break;
	}

	// Call init
	$data->init();
}
?>