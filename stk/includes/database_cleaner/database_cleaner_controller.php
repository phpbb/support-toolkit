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
* Class that contains all methods that actuall perform the actions
*/
class database_cleaner_controller
{
	/**
	* @var database_cleaner_data The database cleaner data object
	*/
	var $db_cleaner = array();

	function database_cleaner_controller($db_cleaner)
	{
		$this->db_cleaner = $db_cleaner;
	}

	/**
	* Reset all bots
	*/
	function bots(&$error)
	{
		global $config, $db;

		if (isset($_POST['yes']))
		{
			$sql = 'SELECT group_id, group_colour
				FROM ' . GROUPS_TABLE . "
				WHERE group_name = 'BOTS'";
			$result = $db->sql_query($sql);
			$group_id		= (int) $db->sql_fetchfield('group_id', false, $result);
			$group_colour	= $db->sql_fetchfield('group_colour', 0, $result);
			$db->sql_freeresult($result);

			if (!$group_id)
			{
				// If we reach this point then something has gone very wrong
				$error[] = 'NO_BOT_GROUP';
				return;
			}
			else
			{
				if (!function_exists('user_add'))
				{
					include(PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
				}

				// Remove existing bots
				$uids = array();
				$sql = 'SELECT user_id FROM ' . BOTS_TABLE;
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$uids[] = $row['user_id'];
				}
				$db->sql_freeresult($result);
				if (!empty($uids))
				{
					$db->sql_query('DELETE FROM ' . USERS_TABLE . ' WHERE ' . $db->sql_in_set('user_id', $uids));
					$db->sql_query('DELETE FROM ' . BOTS_TABLE);
				}

				// Add the bots
				foreach ($this->db_cleaner->data->bots as $bot_name => $bot_ary)
				{
					/* Clean the users table of any bots matching this...
					* this is an issue if a default bot was removed from the bots group. */
					$username_clean = utf8_clean_string($bot_name);

					if (empty($username_clean))
					{
						// This shouldn't happen but we should handle it anyway...
						continue;
					}

					$sql = 'DELETE FROM ' . USERS_TABLE . ' WHERE username_clean = \'' . $username_clean . '\'';
					$db->sql_query($sql);

					$user_row = array(
						'user_type'				=> USER_IGNORE,
						'group_id'				=> $group_id,
						'username'				=> $bot_name,
						'user_regdate'			=> time(),
						'user_password'			=> '',
						'user_colour'			=> $group_colour,
						'user_email'			=> '',
						'user_lang'				=> $config['default_lang'],
						'user_style'			=> 1,
						'user_timezone'			=> 0,
						'user_dateformat'		=> $config['default_dateformat'],
						'user_allow_massemail'	=> 0,
					);

					$user_id = user_add($user_row);

					if ($user_id)
					{
						$sql = 'INSERT INTO ' . BOTS_TABLE . ' ' . $db->sql_build_array('INSERT', array(
							'bot_active'	=> 1,
							'bot_name'		=> (string) $bot_name,
							'user_id'		=> (int) $user_id,
							'bot_agent'		=> (string) $bot_ary[0],
							'bot_ip'		=> (string) $bot_ary[1],
						));

						$result = $db->sql_query($sql);
					}
				}
			}
		}
	}

	/**
	* Fix the database columns.
	*
	* - Add removed columns
	* - Remove added columns
	*/
	function columns(&$error, $selected)
	{
		global $umil;

		foreach ($this->db_cleaner->data->tables as $table_name => $data)
		{
			// Don't touch this table
			if ($table_name == PROFILE_FIELDS_DATA_TABLE)
			{
				continue;
			}

			$existing_columns = get_columns($table_name);

			if ($existing_columns === false)
			{
				// Table doesn't exist, don't handle here.
				continue;
			}

			$columns = array_unique(array_merge(array_keys($data['COLUMNS']), $existing_columns));

			foreach ($columns as $column)
			{
				if (isset($selected[$table_name . '_' . $column]))
				{
					if (!isset($data['COLUMNS'][$column]) && in_array($column, $existing_columns))
					{
						$result = $umil->table_column_remove($table_name, $column);
						if (stripos($result, 'SQL ERROR'))
						{
							$error[] = $result;
						}
					}
					else if (isset($data['COLUMNS'][$column]) && !in_array($column, $existing_columns))
					{
						// This can return an error under some circumstances, like when trying to add an auto-increment field (hope to hell nobody drops one of those)
						$result = $umil->table_column_add($table_name, $column, $data['COLUMNS'][$column]);
						if (stripos($result, 'SQL ERROR'))
						{
							$error[] = $result;
						}

						// We can re-add *some* keys
						if (isset($data['KEYS']))
						{
							if (in_array($column, $data['KEYS']))
							{
								if ($data['KEYS'][$column][0] == 'INDEX' && $data['KEYS'][$column][1] == $column)
								{
									$result = $umil->table_index_add($table_name, $column, $column);
									if (stripos($result, 'SQL ERROR'))
									{
										$error[] = $result;
									}
								}
							}
						}
					}
				}
			}
		}
	}

	/**
	* Fix the config items
	*
	* - Add removed entries
	* - Remove added entries
	*/
	function config(&$error, $selected)
	{
		global $db;

		$config_rows = $existing_config = array();
		get_config_rows($this->db_cleaner->data->config_data, $config_rows, $existing_config);
		foreach ($config_rows as $name)
		{
			if (isset($this->db_cleaner->data->config_data[$name]) && in_array($name, $existing_config))
			{
				continue;
			}

			if (isset($selected[$name]))
			{
				if (isset($this->db_cleaner->data->config_data[$name]) && !in_array($name, $existing_config))
				{
					// Add it with the default settings we've got...
					set_config($name, $this->db_cleaner->data->config_data[$name]['config_value'], $this->db_cleaner->data->config_data[$name]['is_dynamic']);
				}
				else if (!isset($this->db_cleaner->data->config_data[$name]) && in_array($name, $existing_config))
				{
					// Remove it
					$db->sql_query('DELETE FROM ' . CONFIG_TABLE . " WHERE config_name = '" . $db->sql_escape($name) . "'");
				}
			}
		}
	}

	/**
	* Finish it up.
	*
	* - Purge all the cache
	* - Enable the board
	*/
	function final_step()
	{
		global $umil;

		$umil->cache_purge();
		$umil->cache_purge('auth');
		set_config('board_disable', 0);
		set_config('board_disable_msg', '');

		// Finished!
		trigger_error('DATABASE_CLEANER_SUCCESS');
	}

	/**
	* Correct the system groups
	*/
	function groups(&$error, $selected)
	{
		global $db;

		$group_rows = $existing_groups = array();
		get_group_rows($data, $group_rows, $existing_groups);
		foreach ($group_rows as $name)
		{
			// Skip ones that are in the default install and are in the existing permissions
			if (isset($this->db_cleaner->data->groups[$name]) && in_array($name, $existing_groups))
			{
				continue;
			}

			if (isset($selected[$name]))
			{
				if (isset($this->db_cleaner->data->groups[$name]) && !in_array($name, $existing_groups))
				{
					// Add it with the default settings we've got...
					$group_id = false;
					group_create($group_id, $this->db_cleaner->data->groups[$name]['group_type'], $name, $this->db_cleaner->data->groups[$name]['group_desc'], array('group_colour' => $this->db_cleaner->data->groups[$name]['group_colour'], 'group_legend' => $this->db_cleaner->data->groups[$name]['group_legend'], 'group_avatar' => $this->db_cleaner->data->groups[$name]['group_avatar'], 'group_max_recipients' => $this->db_cleaner->data->groups[$name]['group_max_recipients']));
				}
				else if (!isset($this->db_cleaner->data->groups[$name]) && in_array($name, $existing_groups))
				{
					if (!function_exists('group_delete'))
					{
						include(PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
					}
					// Remove it
					$db->sql_query('SELECT group_id FROM ' . GROUPS_TABLE . ' WHERE group_name = \'' . $name . '\'');
					$group_id = $db->sql_fetchfield('group_id');
					group_delete($group_id, $name);
				}
			}
		}
	}

	/**
	* Start the cleaner
	*/
	function introduction()
	{
		global $user;

		// Redirect if they selected quit
		if (isset($_POST['quit']))
		{
			redirect(append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT));
		}

		// Start by disabling the board
		set_config('board_disable', 1);
		set_config('board_disable_msg', user_lang('BOARD_DISABLE_REASON'));
	}

	/**
	* If the user wants this, reset all modules
	*
	* This will remove all added modules and will re-add and re-enable all vanilla
	* modules
	*/
	function modules(&$error)
	{
		global $db;

		if (isset($_POST['yes']))
		{
			// Remove existing modules
			$db->sql_query('DELETE FROM ' . MODULES_TABLE);

			// Add the modules
			$db->sql_multi_insert(MODULES_TABLE, $this->db_cleaner->data->modules);
		}
	}

	/**
	* Fix permissions
	*/
	function permissions(&$error, $selected)
	{
		global $umil;

		$permission_rows = $existing_permissions = array();
		get_permission_rows($data, $permission_rows, $existing_permissions);
		foreach ($permission_rows as $name)
		{
			// Skip ones that are in the default install and are in the existing permissions
			if (isset($this->db_cleaner->data->permissions[$name]) && in_array($name, $existing_permissions))
			{
				continue;
			}

			if (isset($selected[$name]))
			{
				if (isset($this->db_cleaner->data->permissions[$name]) && !in_array($name, $existing_permissions))
				{
					// Add it with the default settings we've got...
					$umil->permission_add($name, (($this->db_cleaner->data->permissions[$name]['is_global']) ? true : false));
				}
				else if (!isset($this->db_cleaner->data->permissions[$name]) && in_array($name, $existing_permissions))
				{
					// Remove it
					$umil->permission_remove($name, true);
					$umil->permission_remove($name, false);
				}
			}
		}
	}

	/**
	* Correct the database tables based upon the selection
	* the user made before.
	*
	* - Add removed tables
	* - Removed added tables
	*/
	function tables(&$error, $selected)
	{
		global $umil;

		$found_tables	= get_phpbb_tables();
		$req_tables		= $this->db_cleaner->data->tables;
		$tables			= array_unique(array_merge(array_keys($req_tables), $found_tables));
		sort($tables);

		// Loop through selected and fix them
		foreach (array_keys($selected) as $table)
		{
			if (isset($req_tables[$table]) && !in_array($table, $found_tables))
			{
				$result = $umil->table_add($table, $req_tables[$table]);
				if (stripos($result, 'SQL ERROR'))
				{
					$error[] = $result;
				}
			}
			else if (!isset($req_tables[$table]) && in_array($table, $found_tables))
			{
				$result = $umil->table_remove($table);
				if (stripos($result, 'SQL ERROR'))
				{
					$error[] = $result;
				}
			}
		}
	}
}