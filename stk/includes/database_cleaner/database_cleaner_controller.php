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
					// Remove all the bots
					foreach ($uids as $uid)
					{
						user_delete('remove', $uid);
					}

					// Clear out the bots table
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

					$sql = 'DELETE FROM ' . USERS_TABLE . ' WHERE username_clean = \'' . $db->sql_escape($username_clean) . '\'';
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
		get_config_rows($this->db_cleaner->data->config, $config_rows, $existing_config);
		foreach ($config_rows as $name)
		{
			if (isset($this->db_cleaner->data->config[$name]) && in_array($name, $existing_config))
			{
				continue;
			}

			if (isset($selected[$name]))
			{
				if (isset($this->db_cleaner->data->config[$name]) && !in_array($name, $existing_config))
				{
					// Add it with the default settings we've got...
					set_config($name, $this->db_cleaner->data->config[$name]['config_value'], $this->db_cleaner->data->config[$name]['is_dynamic']);
				}
				else if (!isset($this->db_cleaner->data->config[$name]) && in_array($name, $existing_config))
				{
					// Remove it
					$db->sql_query('DELETE FROM ' . CONFIG_TABLE . " WHERE config_name = '" . $db->sql_escape($name) . "'");
				}
			}
		}
	}
	
	/**
	* Fix the extension groups
	*/
	function extension_groups(&$error, $selected)
	{
		global $db;

		$extension_groups_rows = $existing_extension_groups = array();
		get_extension_groups_rows($this->db_cleaner->data->extension_groups, $extension_groups_rows, $existing_extension_groups);
		foreach ($extension_groups_rows as $name)
		{
			if (isset($this->db_cleaner->data->extension_groups[$name]) && in_array($name, $existing_extension_groups))
			{
				continue;
			}

			if (isset($selected[$name]))
			{
				if (isset($this->db_cleaner->data->extension_groups[$name]) && !in_array($name, $existing_extension_groups))
				{
					$insert = array(
						'group_name'		=> $name,
						'cat_id'			=> $this->db_cleaner->data->extension_groups[$name][0],
						'allow_group'		=> $this->db_cleaner->data->extension_groups[$name][1],
						'download_mode'		=> $this->db_cleaner->data->extension_groups[$name][2],
						'upload_icon'		=> $this->db_cleaner->data->extension_groups[$name][3],
						'max_filesize'		=> $this->db_cleaner->data->extension_groups[$name][4],
						'allowed_forums'	=> $this->db_cleaner->data->extension_groups[$name][5],
					);

					// Add it
					$db->sql_query('INSERT INTO ' . EXTENSION_GROUPS_TABLE . ' ' . $db->sql_build_array('INSERT', $insert));
				}
				else if (!isset($this->db_cleaner->data->extension_groups[$name]) && in_array($name, $existing_extension_groups))
				{
					// Remove it
					$db->sql_query('DELETE FROM ' . EXTENSION_GROUPS_TABLE . " WHERE group_name = '" . $db->sql_escape($name) . "'");
				}
			}
		}
	}

	/**
	* Fix teh extensions
	*/
	function extensions()
	{
		global $db;

		foreach ($this->db_cleaner->data->extensions as $group => $data)
		{
			$group_id = 0;
			$existing_extensions = get_extensions($group, $group_id);
			$extensions = array_unique(array_merge($data, $existing_extensions));
			sort($extensions);

			foreach ($extensions as $extension)
			{
				if (!in_array($extension, $data) && in_array($extension, $existing_extensions))
				{
					// Delete
					$db->sql_query('DELETE FROM ' . EXTENSIONS_TABLE . '
						WHERE group_id = ' . (int) $group_id . "
							AND extension = '" . $db->sql_escape($extension) . '\'');
				}
				else if (in_array($extension, $data) && !in_array($extension, $existing_extensions))
				{
					$insert = array(
						'group_id'	=> $group_id,
						'extension'	=> $extension,
					);
					$db->sql_query('INSERT INTO ' . EXTENSIONS_TABLE . ' ' . $db->sql_build_array('INSERT', $insert));
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

		$data = $group_rows = $existing_groups = array();
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
					$db->sql_query('SELECT group_id FROM ' . GROUPS_TABLE . ' WHERE group_name = \'' . $db->sql_escape($name) . '\'');
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
		global $db, $lang;

		if (isset($_POST['yes']))
		{
			// Remove existing modules
			$db->sql_query('DELETE FROM ' . MODULES_TABLE);

			// Re-add the modules
			if (!class_exists('acp_modules'))
			{
				include PHPBB_ROOT_PATH . 'includes/acp/acp_modules.' . PHP_EXT;
			}

			$_module = &new acp_modules();
			$module_classes = array('acp', 'mcp', 'ucp');

			// Add categories
			foreach ($module_classes as $module_class)
			{
				$categories = array();

				// Set the module class
				$_module->module_class = $module_class;

				foreach ($this->db_cleaner->data->module_categories[$module_class] as $cat_name => $subs)
				{
					$module_data = array(
						'module_basename'	=> '',
						'module_enabled'	=> 1,
						'module_display'	=> 1,
						'parent_id'			=> 0,
						'module_class'		=> $module_class,
						'module_langname'	=> $cat_name,
						'module_mode'		=> '',
						'module_auth'		=> '',
					);

					// Add category
					$_module->update_module_data($module_data, true);

					// Check for last sql error happened
					if ($db->sql_error_triggered)
					{
						$error = $db->sql_error($db->sql_error_sql);
						trigger_error($error);
					}

					$categories[$cat_name]['id'] = (int) $module_data['module_id'];
					$categories[$cat_name]['parent_id'] = 0;

					// Create sub-categories...
					if (is_array($subs))
					{
						foreach ($subs as $level2_name)
						{
							$module_data = array(
								'module_basename'	=> '',
								'module_enabled'	=> 1,
								'module_display'	=> 1,
								'parent_id'			=> (int) $categories[$cat_name]['id'],
								'module_class'		=> $module_class,
								'module_langname'	=> $level2_name,
								'module_mode'		=> '',
								'module_auth'		=> '',
							);

							$_module->update_module_data($module_data, true);

							// Check for last sql error happened
							if ($db->sql_error_triggered)
							{
								$error = $db->sql_error($db->sql_error_sql);
								trigger_error($error);
							}

							$categories[$level2_name]['id'] = (int) $module_data['module_id'];
							$categories[$level2_name]['parent_id'] = (int) $categories[$cat_name]['id'];
						}
					}
				}

				// Get the modules we want to add... returned sorted by name
				$module_info = $_module->get_module_infos('', $module_class);

				foreach ($module_info as $module_basename => $fileinfo)
				{
					foreach ($fileinfo['modes'] as $module_mode => $row)
					{
						foreach ($row['cat'] as $cat_name)
						{
							if (!isset($categories[$cat_name]))
							{
								continue;
							}

							$module_data = array(
								'module_basename'	=> $module_basename,
								'module_enabled'	=> 1,
								'module_display'	=> (isset($row['display'])) ? (int) $row['display'] : 1,
								'parent_id'			=> (int) $categories[$cat_name]['id'],
								'module_class'		=> $module_class,
								'module_langname'	=> $row['title'],
								'module_mode'		=> $module_mode,
								'module_auth'		=> $row['auth'],
							);

							$_module->update_module_data($module_data, true);

							// Check for last sql error happened
							if ($db->sql_error_triggered)
							{
								$error = $db->sql_error($db->sql_error_sql);
								trigger_error($error);
							}
						}
					}
				}

				// Move some of the modules around since the code above will put them in the wrong place
				if ($module_class == 'acp')
				{
					// Move main module 4 up...
					$sql = 'SELECT *
						FROM ' . MODULES_TABLE . "
						WHERE module_basename = 'main'
							AND module_class = 'acp'
							AND module_mode = 'main'";
					$result = $db->sql_query($sql);
					$row = $db->sql_fetchrow($result);
					$db->sql_freeresult($result);

					$_module->move_module_by($row, 'move_up', 4);

					// Move permissions intro screen module 4 up...
					$sql = 'SELECT *
						FROM ' . MODULES_TABLE . "
						WHERE module_basename = 'permissions'
							AND module_class = 'acp'
							AND module_mode = 'intro'";
					$result = $db->sql_query($sql);
					$row = $db->sql_fetchrow($result);
					$db->sql_freeresult($result);

					$_module->move_module_by($row, 'move_up', 4);

					// Move manage users screen module 5 up...
					$sql = 'SELECT *
						FROM ' . MODULES_TABLE . "
						WHERE module_basename = 'users'
							AND module_class = 'acp'
							AND module_mode = 'overview'";
					$result = $db->sql_query($sql);
					$row = $db->sql_fetchrow($result);
					$db->sql_freeresult($result);

					$_module->move_module_by($row, 'move_up', 5);
				}

				if ($module_class == 'ucp')
				{
					// Move attachment module 4 down...
					$sql = 'SELECT *
						FROM ' . MODULES_TABLE . "
						WHERE module_basename = 'attachments'
							AND module_class = 'ucp'
							AND module_mode = 'attachments'";
					$result = $db->sql_query($sql);
					$row = $db->sql_fetchrow($result);
					$db->sql_freeresult($result);

					$_module->move_module_by($row, 'move_down', 4);
				}

				// And now for the special ones
				// (these are modules which appear in multiple categories and thus get added manually to some for more control)
				if (isset($this->db_cleaner->data->module_extras[$module_class]))
				{
					foreach ($this->db_cleaner->data->module_extras[$module_class] as $cat_name => $mods)
					{
						$sql = 'SELECT module_id, left_id, right_id
							FROM ' . MODULES_TABLE . "
							WHERE module_langname = '" . $db->sql_escape($cat_name) . "'
								AND module_class = '" . $db->sql_escape($module_class) . "'";
						$result = $db->sql_query_limit($sql, 1);
						$row2 = $db->sql_fetchrow($result);
						$db->sql_freeresult($result);

						foreach ($mods as $mod_name)
						{
							$sql = 'SELECT *
								FROM ' . MODULES_TABLE . "
								WHERE module_langname = '" . $db->sql_escape($mod_name) . "'
									AND module_class = '" . $db->sql_escape($module_class) . "'
									AND module_basename <> ''";
							$result = $db->sql_query_limit($sql, 1);
							$row = $db->sql_fetchrow($result);
							$db->sql_freeresult($result);

							$module_data = array(
								'module_basename'	=> $row['module_basename'],
								'module_enabled'	=> (int) $row['module_enabled'],
								'module_display'	=> (int) $row['module_display'],
								'parent_id'			=> (int) $row2['module_id'],
								'module_class'		=> $row['module_class'],
								'module_langname'	=> $row['module_langname'],
								'module_mode'		=> $row['module_mode'],
								'module_auth'		=> $row['module_auth'],
							);

							$_module->update_module_data($module_data, true);

							// Check for last sql error happened
							if ($db->sql_error_triggered)
							{
								$error = $db->sql_error($db->sql_error_sql);
								trigger_error($error);
							}
						}
					}
				}

				$_module->remove_cache_file();
			}
		}
	}

	/**
	* Fix permissions
	*/
	function permissions(&$error, $selected)
	{
		global $umil;

		$data = $permission_rows = $existing_permissions = array();
		get_permission_rows($data, $permission_rows, $existing_permissions);
		foreach ($permission_rows as $name)
		{
			// Skip ones that are in the default install and are in the existing permissions
			if (isset($this->db_cleaner->data->acl_options[$name]) && in_array($name, $existing_permissions))
			{
				continue;
			}

			if (isset($selected[$name]))
			{
				if (isset($this->db_cleaner->data->acl_options[$name]) && !in_array($name, $existing_permissions))
				{
					// Add it with the default settings we've got...
					$umil->permission_add($name, (($this->db_cleaner->data->acl_options[$name]['is_global']) ? true : false));
				}
				else if (!isset($this->db_cleaner->data->acl_options[$name]) && in_array($name, $existing_permissions))
				{
					// Remove it
					$umil->permission_remove($name, true);
					$umil->permission_remove($name, false);
				}
			}
		}
	}
	
	/**
	* Reset the report reasons
	*/
	function report_reasons(&$error)
	{
		global $db;
		
		if (isset($_POST['yes']))
		{
			// First off all grep the ID of the `other`
			$sql = 'SELECT reason_id
				FROM ' . REPORTS_REASONS_TABLE . "
				WHERE LOWER(reason_title) = 'other'";
			$result = $db->sql_query($sql);
			$other_reason_id = (int) $db->sql_fetchfield('reason_id');
			$db->sql_freeresult($result);
			
			// Select everything
			$result = $db->sql_query('SELECT * FROM ' . REPORTS_REASONS_TABLE);
			while ($row = $db->sql_fetchrow($result))
			{
				// This is a default one, unset from the data array
				if (array_key_exists($row['reason_title'], $this->db_cleaner->data->report_reasons))
				{
					unset($this->db_cleaner->data->report_reasons[$row['reason_title']]);
					continue;
				}
				
				// Delete, this is taken from "acp_reasons"
				switch ($db->sql_layer)
				{
					// The ugly one!
					case 'mysqli':
					case 'mysql4':
					case 'mysql':
						// Change the reports using this reason to 'other'
						$sql = 'UPDATE ' . REPORTS_TABLE . '
							SET reason_id = ' . (int) $other_reason_id . ", report_text = CONCAT('" . $db->sql_escape($row['reason_description']) . "\n\n', report_text)
							WHERE reason_id = " . (int) $row['reason_id'];
					break;

					// Standard? What's that?
					case 'mssql':
					case 'mssql_odbc':
					case 'mssqlnative':
						// Change the reports using this reason to 'other'
						$sql = "DECLARE @ptrval binary(16)

								SELECT @ptrval = TEXTPTR(report_text)
									FROM " . REPORTS_TABLE . '
								WHERE reason_id = ' . (int) $row['reason_id'] . "

								UPDATETEXT " . REPORTS_TABLE . ".report_text @ptrval 0 0 '" . $db->sql_escape($row['reason_description']) . "\n\n'

								UPDATE " . REPORTS_TABLE . '
									SET reason_id = ' . (int) $other_reason_id . '
								WHERE reason_id = ' . (int) $reason_id;
					break;

					// Teh standard
					case 'postgres':
					case 'oracle':
					case 'firebird':
					case 'sqlite':
						// Change the reports using this reason to 'other'
						$sql = 'UPDATE ' . REPORTS_TABLE . '
							SET reason_id = ' . (int) $other_reason_id . ", report_text = '" . $db->sql_escape($row['reason_description']) . "\n\n' || report_text
							WHERE reason_id = " . (int) $row['reason_id'];
					break;
				}
				$db->sql_query($sql);

				$db->sql_query('DELETE FROM ' . REPORTS_REASONS_TABLE . ' WHERE reason_id = ' . (int) $row['reason_id']);
			}
			$db->sql_freeresult($result);
			
			// Did the user remove any of the original reasons?
			if (!empty($this->db_cleaner->data->report_reasons))
			{
				global $user;
				$user->add_lang('install');

				if (!function_exists('adjust_language_keys_callback'))
				{
					include PHPBB_ROOT_PATH . 'includes/functions_install.' . PHP_EXT;
				}

				// The highest next order
				$sql = 'SELECT MAX(reason_order) as next
					FROM ' . REPORTS_REASONS_TABLE;
				$result	= $db->sql_query($sql);
				$order	= $db->sql_fetchfield('next', false, $result);
				$db->sql_freeresult($result);
				
				$insert = array();
				foreach ($this->db_cleaner->data->report_reasons as $deleted => $data)
				{
					$insert[] = array(
						'reason_title'			=> $deleted,
						'reason_description'	=> $user->lang[preg_replace_callback('#\{L_([A-Z0-9\-_]*)\}#s', 'adjust_language_keys_callback', $data[0])],
						'reason_order'			=> ++$order,
					);
				}
				
				// Insert
				$db->sql_multi_insert(REPORTS_REASONS_TABLE, $insert);
			}
		}
	}
	
	/**
	* Reset the phpBB system roles
	*/
	function role_data(&$error)
	{
		global $db;

		if (isset($_POST['yes']))
		{
			$system_roles	= $this->db_cleaner->data->acl_role_data;
			$role_ids		= array();
			$sql_format		= 'INSERT INTO ' . ACL_ROLES_DATA_TABLE . ' (role_id, auth_option_id, auth_setting)
								SELECT %1$d, auth_option_id, %2$d
								FROM ' . ACL_OPTIONS_TABLE . '
									WHERE auth_option LIKE %3$s';
			$sql_format_in	= 'INSERT INTO ' . ACL_ROLES_DATA_TABLE . ' (role_id, auth_option_id, auth_setting)
								SELECT %1$d, auth_option_id, %2$d
								FROM ' . ACL_OPTIONS_TABLE . '
									WHERE auth_option LIKE %3$s
									AND %4$s';

			// Fetch the role IDs
			$sql = 'SELECT role_id, role_name
				FROM ' . ACL_ROLES_TABLE . '
				WHERE ' . $db->sql_in_set('role_name', array_keys($system_roles));
			$result	= $db->sql_query($sql);
			while ($role = $db->sql_fetchrow($result))
			{
				$role_ids[$role['role_name']] = $role['role_id'];
			}
			$db->sql_freeresult($result);

			// Clear the ACL_ROLES_DATA_TABLE table
			$sql = 'DELETE FROM ' . ACL_ROLES_DATA_TABLE . '
				WHERE ' . $db->sql_in_set('role_id', $role_ids);
			$db->sql_query($sql);

			// Now re-build the role data
			foreach ($system_roles as $role_name => $role_data)
			{
				// Trim role name to allow multiple entries for the same role
				$role_name = trim($role_name);

				// Create the query
				$query = '';
				if (!empty($role_data['OPTION_IN']))
				{
					$like_negate = (empty($role_data['NEGATE'])) ? false : true;
					$query = sprintf($sql_format_in, $role_ids[$role_name], $role_data['SETTING'], $role_data['OPTION_LIKE'], $db->sql_in_set('auth_option', $role_data['OPTION_IN'], $like_negate));
				}
				else
				{
					$query = sprintf($sql_format, $role_ids[$role_name], $role_data['SETTING'], $role_data['OPTION_LIKE']);
				}

				// Run, run, run
				$db->sql_query($query);
			}
		}
	}
	
	/**
	* Fix system roles
	*/
	function roles(&$error, $selected)
	{
		global $umil;

		$role_rows = $existing_roles = array();
		get_role_rows($this->db_cleaner->data->acl_roles, $role_rows, $existing_roles);
		foreach ($role_rows as $name)
		{
			if (isset($this->db_cleaner->data->acl_roles[$name]) && in_array($name, $existing_roles))
			{
				continue;
			}

			if (isset($selected[$name]))
			{
				if (isset($this->db_cleaner->data->acl_roles[$name]) && !in_array($name, $existing_roles))
				{
					// Add it with the default settings we've got...
					$umil->permission_role_add($name, $this->db_cleaner->data->acl_roles[$name][1], $this->db_cleaner->data->acl_roles[$name][0]);
				}
				else if (!isset($this->db_cleaner->data->acl_roles[$name]) && in_array($name, $existing_roles))
				{
					// Remove it
					$umil->permission_role_remove($name);
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