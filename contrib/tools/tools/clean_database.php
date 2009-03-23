<?php
/**
*
* @package Support Tool Kit - Clean Database
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class clean_database
{
	// auto_include was removed
	var $auto_include = array(
		'clean_database_functions'			=> true,
		'schemas/restore_auth_schema.sql'	=> false,
		'schemas/restore_config_schema.sql'	=> false,
	);

	/**
	* Variable that holds the database schema
	*/
	var $schema;

	/**
	* Instance of the db_tools class
	*/
	var $db_tools;

	/**
	* This tool should only be used within a specific phpBB version
	*/
	var $phpbb_version = '3.0.3';

	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['RESTORE_DB'],
			'NAME_EXPLAIN'	=> $user->lang['RESTORE_DB_EXPLAIN'],

			'CATEGORY'		=> $user->lang['ADMIN_TOOLS'],
		);
	}

	function display_options()
	{
		return array(
			'title'	=> 'RESTORE_DB',
			'vars'	=> array(
				'legend1'			=> 'SETUP_DATABASE_CLEANER',
				'remove_tables'		=> array('lang' => 'REMOVE_TABLES', 'explain' => true, 'default' => true, 'type' => 'checkbox'),
				'restore_tables'	=> array('lang' => 'RESTORE_TABLES', 'explain' => true, 'default' => true, 'type' => 'checkbox'),
				/* Function disabled for now as it screws up the auth tables :(*/
				'restore_auth'		=> array('lang' => 'RESTORE_AUTH', 'explain' => true, 'default' => true, 'type' => 'checkbox'),
				/**/
				'restore_bots'		=> array('lang' => 'RESTORE_BOTS', 'explain' => true, 'default' => true, 'type' => 'checkbox'),
				'restore_config'	=> array('lang' => 'RESTORE_CONFIG', 'explain' => true, 'default' => true, 'type' => 'checkbox'),
			),
		);
	}

	function run_tool(&$error)
	{
		global $cache, $config, $db, $user;
		global $stk_root_path, $phpbb_root_path, $phpEx;

        if (!check_form_key('clean_database') && !confirm_box(true))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		// Is this tool enabled?
		if (!defined('CLEAN_DATABASE') || CLEAN_DATABASE == false)
		{
			trigger_error('TOOL_DISABLED');
		}

		// Is this phpBB version supported?
		if (version_compare($config['version'], $this->phpbb_version, "eq") != 1)
		{
			meta_refresh(5, append_sid($stk_root_path . 'index.' . $phpEx));
			trigger_error(sprintf($user->lang['INCORRECT_PHPBB_VERSION'], $this->phpbb_version));
		}

		// Because we'll be messing around in the db, lock the board.
		set_config('board_disable', '1', false);
		set_config('board_disable_msg', $user->lang['RESTORE_DB_BOARD_LOCKED'], false);

		// Get some vars
		$req_data = array(
			'remove_tables'		=> request_var('remove_tables', false),
			'restore_tables'	=> request_var('restore_tables', false),
			'restore_auth'		=> request_var('restore_auth', false),
			'restore_bots'		=> request_var('restore_bots', false),
			'restore_config'	=> request_var('restore_config', false),
		);

		/*
		* If the user wants to restore the config or auth table slap him and let him confirm this action!
		*/
		if ($req_data['restore_config'] || $req_data['restore_auth'])
		{
			$hidden_fields = build_hidden_fields(array_merge($req_data, array('submit' => true)));
			confirm_box(false, 'CONFIRM_RESTORE_TABLES', $hidden_fields);
		}

		// Include db tools, and construct cause we're going to need it :)
		if (!class_exists('phpbb_db_tools'))
		{
			include($phpbb_root_path . 'includes/db/db_tools.' . $phpEx);
		}
		$this->db_tools = new phpbb_db_tools($db);

		// Include the functions_install
		if (!function_exists('get_tables'))
		{
			include($phpbb_root_path . 'includes/functions_install.' . $phpEx);
		}

		// Load vars
		if ($req_data['remove_tables'] || $req_data['restore_tables'])
		{
			$this->schema = get_schema_struct();
		}

		// Remove all non original tables
		if ($req_data['remove_tables'])
		{
			$this->remove_tables();
		}

		// Restore all vanilla tables
		if ($req_data['restore_tables'])
		{
			$this->restore_tables();
		}

		// Restore the acl_* tables
		if ($req_data['restore_auth'])
		{
			$this->restore_auth();
		}

		// Restore the bots table
		if ($req_data['restore_bots'])
		{
			$this->restore_bots();
		}

		// Restore the config table
		if ($req_data['restore_config'])
		{
			$this->restore_config();
		}

		// Purge the cache
		$cache->purge();

		// Release the board
		set_config('board_disable', '0', false);
		set_config('board_disable_msg', '', false);

		// Done :D
		trigger_error('DATABASE_CLEANED');
	}

	/**
	* This function will remove all tables from the database that doens't come with a clean installation
	*/
	function remove_tables()
	{
		global $db, $table_prefix;

		$db_all_tables	= get_tables($db);
		$test_tables	= array();
		$phpbb_tables	= array();
		foreach ($db_all_tables as $table_name)
		{
			// Only test phpBB tables
			if (!preg_match('#' . $table_prefix . '#i', $table_name))
			{
				continue;
			}

			$test_tables[] = $table_name;
		}

		// Now we have to find all the tables that should be there
		foreach ($this->schema as $table => $table_data)
		{
			array_push($phpbb_tables, $table);
		}

		// Now walk through the tables that we have and DROP the ones that shouldn't be there
		foreach ($test_tables as $test_table)
		{
			if (!in_array($test_table, $phpbb_tables))
			{
				$db->sql_query("DROP TABLE {$test_table}");
			}
		}
	}

	/**
	* This function will remove all collumns from the datbase tables that doesn't come with a clean installation
	* And will restore all indexes on the tables
	*/
	function restore_tables()
	{
		global $db;

		$table_columns = $table_indexes = array();

		// Walk through all the tables and drop the columns that were added
		foreach ($this->schema as $phpbb_table => $phpbb_table_data)
		{
			// Get the columns
			$table_columns = $this->get_columns($phpbb_table);

			// Get the indexes on this table
			$table_indexes = $this->db_tools->sql_list_index($phpbb_table);

			// Obtain the columns that should there
			$valid_columns = array();
			foreach ($phpbb_table_data['COLUMNS'] as $phpbb_column => $data_type)
			{
				array_push($valid_columns, $phpbb_column);
			}

			// Obtain the indexes that should be here, but only they are set for this column
			if (isset($phpbb_table_data['KEYS']))
			{
				$valid_indexes = array();
				foreach ($phpbb_table_data['KEYS'] as $key_name => $key_options)
				{
					if ($key_options[0] == 'INDEX')
					{
						$valid_indexes[$key_name] = array(
							'index_name'	=> $key_name,
							'on_column'		=> $key_options[1],
						);
					}
				}
			}

			// Walk through the columns and remove all that shouldn't be there
			foreach ($table_columns as $test_column)
			{
				if (!in_array($test_column, $valid_columns))
				{
					$this->db_tools->sql_column_remove($phpbb_table, $test_column);
				}
			}

			// Only fix keys if this table has keys
			if (sizeof($valid_indexes))
			{
				// Walk through the indexes and remove the indexes that doesn't come default
				foreach ($table_indexes as $test_index)
				{
					if (!array_key_exists($test_index, $valid_indexes))
					{
						$this->db_tools->sql_index_drop($phpbb_table, $test_index);
					}
				}

				// Walk through the indexes and add missing ones
				foreach ($valid_indexes as $test_index)
				{
					if (!in_array($test_index['index_name'], $table_indexes))
					{
						$this->db_tools->sql_create_index($phpbb_table, $test_index['index_name'], array($test_index['on_column']));
					}
				}
			}

			// Reset index arrays, because they will cause problems if not done
			$table_indexes = $valid_indexes = array();
		}
	}

	/**
	* Get all the columns of a table.
	* Based on $db_tools->sql_column_exists();
	*
	* @param	String	$table	The table of which we need the columns
	*/
	function get_columns($table)
	{
		global $db;

		$sql = '';
		$column_name = '';

		// Set the query and column for each dbms
		switch ($this->db_tools->sql_layer)
		{
			// MySQL
			case 'mysql_40'	:
			case 'mysql_41'	:
				$sql = "SHOW COLUMNS FROM {$table}";
				$column_name = 'Field';
			break;

			// PostgreSQL
			case 'postgres'	:
				$sql = "SELECT a.attname
					FROM (pg_class c, pg_attribute a)
					WHERE c.relname = '{$table}'
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
					WHERE o.name = '{$table}'";
				$column_name = 'name';
			break;

			// Oracle
			case 'oracle'	:
				$sql = "SELECT column_name
					FROM user_tab_columns
					WHERE table_name = '{$table}'";
				$column_name = 'column_name';
			break;

			// Firebird
			case 'firebird'	:
				$sql = "SELECT RDB\$FIELD_NAME as FNAME
					FROM RDB\$RELATION_FIELDS
					WHERE RDB\$RELATION_NAME = '{$table}'";
				$column_name = 'fname';
			break;

			// SQLite
			case 'sqlite'	:
				$sql = "SELECT sql
					FROM sqlite_master
					WHERE type = 'table'
						AND name = '{$table}'";
				$column_name = 'sql';
			break;
		}

		// Get the columns
		$columns = array();

		if ($this->db_tools->sql_layer != 'sqlite')
		{
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				array_push($columns, $row[$column_name]);
			}
			$db->sql_freeresult($result);
		}
		else
		{
			// Unfortunately SQLite doen't play as nice as the others
			$col_ary = $entities = $matches = array();
			$cols = $declaration = '';

			$result = $db->sql_query($sql);
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
			$db->sql_freeresult($result);
		}

		return $columns;
	}

	/**
	* He're we restore the acl_* tables to the original state,
	* only one exeption, we don't assign permissions for the first category
	*/
	function restore_auth()
	{
		global $db;

		// prepare the data
		$auth_sql_ary = $this->prepare_schema('restore_auth');

		// ACL tables
		$acl_tables = array(ACL_GROUPS_TABLE, ACL_OPTIONS_TABLE, ACL_ROLES_DATA_TABLE, ACL_ROLES_TABLE, ACL_USERS_TABLE);

		// Empty the ACL tables
		foreach ($acl_tables as $table)
		{
			/*
			 Lets use TRUNCATE over DELETE to make sure that the ids are restored
			 It might cause problems later is some DBMS as it is a non default command, but we can work around it when the problem apears.
			*/
			//$db->sql_query("DELETE FROM {$table}");
			$db->sql_query("TRUNCATE {$table}");
		}

		// Now fill the tables
		foreach ($auth_sql_ary as $sql)
		{
			$db->sql_query($sql);
		}
	}

	/**
	* He're we restore the config table to its original state.
	* Based on the code that handles this in install_install.php
	*/
	function restore_bots()
	{
		global $config, $db;

		if (!function_exists('user_add'))
		{
			global $phpbb_root_path, $phpEx;
			include ($phpbb_root_path . 'includes/functions_user.' . $phpEx);
		}

		// Select needed bot group data
		$sql = 'SELECT group_id, group_colour
			FROM ' . GROUPS_TABLE . "
			WHERE group_name = 'BOTS'";
		$result		= $db->sql_query_limit($sql, 1, 0);
		$group_id	= $db->sql_fetchfield('group_id', false, $result);
		$bot_colour	= $db->sql_fetchfield('group_colour', 0, $result);
		$db->sql_freeresult($result);

		// Make sure that there aren't any bots in the db
		$db->sql_query('DELETE FROM ' . USERS_TABLE . ' WHERE group_id = ' . (int) $group_id);
		$db->sql_query('DELETE FROM ' . BOTS_TABLE);

		// Now re create all bots.
		$bot_list = get_bot_list();
		foreach ($bot_list as $bot_name => $bot_ary)
		{
			$bot_row = array(
				'user_type'				=> USER_IGNORE,
				'group_id'				=> $group_id,
				'username'				=> $bot_name,
				'user_regdate'			=> time(),
				'user_password'			=> '',
				'user_colour'			=> $bot_colour,
				'user_email'			=> '',
				'user_lang'				=> $config['default_lang'],
				'user_style'			=> 1,
				'user_timezone'			=> 0,
				'user_dateformat'		=> $config['default_dateformat'],
				'user_allow_massemail'	=> 0,
			);

			$bot_id = user_add($bot_row);

			if (!$bot_id)
			{
				// Couldn't insert the bot. Stop here
				trigger_error('BOT_NOT_INSERT', E_USER_ERROR);
			}

			$sql = 'INSERT INTO ' . BOTS_TABLE . ' ' . $db->sql_build_array('INSERT', array(
				'bot_active'	=> 1,
				'bot_name'		=> (string) $bot_name,
				'user_id'		=> (int) $bot_id,
				'bot_agent'		=> (string) $bot_ary[0],
				'bot_ip'		=> (string) $bot_ary[1],
			));

			$db->sql_query($sql);
		}
	}

	/**
	* He're we restore the config table to its original state
	*/
	function restore_config()
	{
		global $config, $db;

		// Prepare the data
		$config_sql_ary = $this->prepare_schema('restore_config');

		// Add the config values that come from the table
		$sql_add = '';
		$save_config = get_save_config_list();
		foreach ($save_config as $config_key => $is_dynamic)
		{
			if ($is_dynamic)
			{
				$sql_add = 'INSERT INTO ' . CONFIG_TABLE . " (config_name, config_value, is_dynamic) VALUES ('{$config_key}', '{$config[$config_key]}', 1)";
			}
			else
			{
				$sql_add = 'INSERT INTO ' . CONFIG_TABLE . " (config_name, config_value) VALUES ('{$config_key}', '{$config[$config_key]}')";
			}

			array_push($config_sql_ary, $sql_add);
		}

		// Clear the config table completely
		$db->sql_query('DELETE FROM ' . CONFIG_TABLE);

		// Now refill the table
		foreach ($config_sql_ary as $sql)
		{
			$db->sql_query($sql);
		}
	}

	/**
	* Do all the default actions on a schema
	*/
	function prepare_schema($schema_file)
	{
		global $table_prefix;
		global $stk_root_path, $phpEx;

		// First read the schema into the system
		if (!file_exists($stk_root_path . 'includes/clean_database/schemas/' . $schema_file . '_schema.sql'))
		{
			// Shouldn't happen
			trigger_error (sprintf($user->lang['NON_EXISTING_SCHEMA'], $schema_file), E_USER_ERROR);
		}
		else
		{
			$schema = file_get_contents("{$stk_root_path}includes/clean_database/schemas/{$schema_file}_schema.sql");
		}

		// Correct the table prefix
		preg_replace('#phpbb_#i', $table_prefix, $schema);

		// Change language strings...
		$schema = preg_replace_callback('#\{L_([A-Z0-9\-_]*)\}#s', 'adjust_language_keys_callback', $schema);

		// Remove commends and split the schema into an array
		remove_remarks($schema);
		$schema = split_sql_file(trim($schema), ';');

		// retrun the schema
		return $schema;
	}
}
?>
