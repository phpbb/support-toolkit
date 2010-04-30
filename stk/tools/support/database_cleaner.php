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

class database_cleaner
{
	/**
	* @var database_cleaner_data The database cleaner data object
	*/
	var $data = null;

	/**
	* @var String phpBB version number
	*/
	var $phpbb_version = '';

	/**
	* @var Integer The step that is being ran
	*/
	var $step = 0;

	/**
	* Do we have a datafile for this version?
	*/
	function tool_active()
	{
		global $config;

		// Correctly format the version number. Only RC releases are in uppercase
		$this->phpbb_version = str_replace(array('.', '-', 'rc'), array('_', '_', 'RC'), strtolower($config['version']));

		// Unstable version can only be used when debugging
		if (!defined('DEBUG') && preg_match('#a|b|dev|RC$#i', $this->phpbb_version))
		{
			return false;
		}

		if (file_exists(STK_ROOT_PATH . 'includes/database_cleaner/data/' . $this->phpbb_version . '.' . PHP_EXT) === false)
		{
			return 'DATAFILE_NOT_FOUND';
		}

		// As this method is always called we can use a small hackish way to ensure the database cleaner is always setup when needed
		if (request_var('t', '') == 'database_cleaner' && !class_exists('database_cleaner_data'))
		{
			$this->step = request_var('step', 0);

			// include the required file for this version
			include(STK_ROOT_PATH . 'includes/database_cleaner/functions.' . PHP_EXT);
			include(STK_ROOT_PATH . 'includes/database_cleaner/database_cleaner_data.' . PHP_EXT);

			// Load all data for this version
			$this->data = new database_cleaner_data();
			fetch_cleaner_data($this->data, $this->phpbb_version);
		}

		return true;
	}

	/**
	* Display the correct confirmation screen
	*/
	function display_options()
	{
		global $template, $user;

		// Display the correct options screen
		$user->add_lang('acp/common');
		$success_msg = '';
		switch ($this->step)
		{
			// Display a quick intro here and make sure they know what they are doing...
			case 0 :
				$template->assign_vars(array(
					'S_NO_INSTRUCTIONS'	=> true,
					'SUCCESS_TITLE'		=> $user->lang['DATABASE_CLEANER'],
					'SUCCESS_MESSAGE'	=> $user->lang['DATABASE_CLEANER_WELCOME'],
					'ERROR_TITLE'		=> ' ',
					'ERROR_MESSAGE'		=> $user->lang['DATABASE_CLEANER_WARNING'],
				));
			break;

			// Validate database tables
			case 1 :
				// The confirm message for step 0
				$success_msg = $user->lang('BOARD_DISABLE_SUCCESS');

				$found_tables	= get_phpbb_tables();
				$req_tables		= $this->data->tables;
				$tables			= array_unique(array_merge(array_keys($req_tables), $found_tables));
				sort($tables);

				$template->assign_block_vars('section', array(
					'NAME'		=> $user->lang('DATABASE_TABLES'),
					'TITLE'		=> $user->lang('DATABASE_TABLES'),
				));

				foreach ($tables as $table)
				{
					// Table was added or removed
					if (!isset($req_tables[$table]) && in_array($table, $found_tables) || isset($req_tables[$table]) && !in_array($table, $found_tables))
					{
						$template->assign_block_vars('section.items', array(
							'NAME'			=> $table,
							'FIELD_NAME'	=> $table,
							'MISSING'		=> isset($req_tables[$table]) ? true : false,
						));
					}
				}
			break;

			// Validate db columns
			case 2 :
				$success_msg = $user->lang('DATABASE_TABLES_SUCCESS');

				// Time to start going through the database and listing any extra/missing fields
				$last_output_table = '';
				foreach ($this->data->tables as $table_name => $data)
				{
					// We shouldn't mess with profile fields here.  Users probably will not know what this table does or what would happen if they remove fields added to it.
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
					sort($columns);

					foreach ($columns as $column)
					{
						if ((!isset($data['COLUMNS'][$column]) && in_array($column, $existing_columns)) || (isset($data['COLUMNS'][$column]) && !in_array($column, $existing_columns)))
						{
							// Output the table block if it's not been done yet
							if ($last_output_table != $table_name)
							{
								$last_output_table = $table_name;

								$template->assign_block_vars('section', array(
									'NAME'		=> $table_name,
									'TITLE'		=> $user->lang['ROWS'],
								));
							}

							$template->assign_block_vars('section.items', array(
								'NAME'			=> $column,
								'FIELD_NAME'	=> $table_name . '_' . $column,
								'MISSING'		=> (!in_array($column, $existing_columns)) ? true : false,
							));
						}
					}
				}
			break;

			// Display fix config options.
			case 3 :
				// The confirm message for step 2
				$success_msg = $user->lang('DATABASE_COLUMNS_SUCCESS');

				// display extra config variables and let them check/uncheck the ones they want to add/remove
				$template->assign_block_vars('section', array(
					'NAME'		=> $user->lang['CONFIG_SETTINGS'],
					'TITLE'		=> $user->lang['ROWS'],
				));

				$config_rows = $existing_config = array();
				get_config_rows($this->data->config_data, $config_rows, $existing_config);
				foreach ($config_rows as $name)
				{
					// Skip ones that are in the default install and are in the existing config
					if (isset($this->data->config_data[$name]) && in_array($name, $existing_config))
					{
						continue;
					}

					$template->assign_block_vars('section.items', array(
						'NAME'			=> $name,
						'FIELD_NAME'	=> $name,
						'MISSING'		=> (!in_array($name, $existing_config)) ? true : false,
					));
				}
			break;

			// Go through the permissions
			case 4 :
				$success_msg = $user->lang('CONFIG_UPDATE_SUCCESS');

				$permission_rows = $existing_permissions = array();
				get_permission_rows($this->data->permissions, $permission_rows, $existing_permissions);
				foreach ($permission_rows as $name)
				{
					// Skip ones that are in the default install and are in the existing permissions
					if (isset($this->data->permissions[$name]) && in_array($name, $existing_permissions))
					{
						continue;
					}

					$template->assign_block_vars('section.items', array(
						'NAME'			=> $name,
						'FIELD_NAME'	=> $name,
						'MISSING'		=> (!in_array($name, $existing_permissions)) ? true : false,
					));
				}
			break;

			// Check the system groups
			case 5 :
				$success_msg = $user->lang('PERMISSION_UPDATE_SUCCESS');

				// Display the system groups that are missing or aren't from a vanilla installation
				$template->assign_block_vars('section', array(
					'NAME'		=> $user->lang['ACP_GROUPS_MANAGEMENT'],
					'TITLE'		=> $user->lang['ROWS'],
				));

				$group_rows = $existing_groups = array();
				get_group_rows($this->data->groups, $group_rows, $existing_groups);
				foreach ($group_rows as $name)
				{
					// Skip ones that are in the default install and are in the existing permissions
					if (isset($this->data->groups[$name]) && in_array($name, $existing_groups))
					{
						continue;
					}

					$template->assign_block_vars('section.items', array(
						'NAME'			=> $name,
						'FIELD_NAME'	=> $name,
						'MISSING'		=> (!in_array($name, $existing_groups)) ? true : false,
					));
				}
			break;

			// Does the user wants to reset the modules?
			case 6 :
				$success_msg = $user->lang('SYSTEM_GROUP_UPDATE_SUCCESS');

				$template->assign_vars(array(
					'S_MODULE_OPTIONS'		=> true,
					'S_NO_INSTRUCTIONS'		=> true,
				));
			break;

			// Does the user wants to reset the bots?
			case 7 :
				// Only success message when the modules have been reset
				$success_msg = (isset($_REQUEST['mod_reset'])) ? $user->lang('RESET_MODULE_SUCCESS') : $user->lang('RESET_MODULES_SKIP');

				$template->assign_vars(array(
					'S_BOT_OPTIONS'		=> true,
					'S_NO_INSTRUCTIONS'	=> true,
				));
			break;

			// Go to the final step
			case 8 :
				$success_msg = $user->lang('RESET_BOT_SUCCESS');

				// Misc things will be done next
				$template->assign_var('S_NO_INSTRUCTIONS', true);
			break;
		}

		// Output the page
		page_header($user->lang['DATABASE_CLEANER'], false);

		$template->assign_vars(array(
			'STEP'				=> $this->step,
			'SUCCESS_MESSAGE'	=> $success_msg,

			// Create submit link, always set "submit" so we'll continue in the run_tool method
			'U_NEXT_STEP'	=> append_sid(STK_INDEX, array('c' => 'support', 't' => 'database_cleaner', 'step' => $this->step, 'submit' => true)),
		));

		$template->set_filenames(array(
			'body' => 'tools/database_cleaner.html',
		));

		page_footer();
	}

	/**
	* Perform the right actions
	*/
	function run_tool()
	{
		global $config, $db, $umil;

		$continue = (isset($_POST['continue'])) ? true : false;
		$selected = request_var('items', array('' => ''));

		if ($this->step > 0)
		{
			// Kick them if bad form key
			check_form_key('database_cleaner', false, append_sid(STK_INDEX, array('c' => 'support', 't' => 'database_cleaner')), true);
		}

		// Var to allow steps to add something to the redirect uri
		$uri_misc = array();

		// Do the thing
		switch ($this->step)
		{
			// Start the cleaner
			case 0 :
				// Redirect if they selected quit
				if (isset($_POST['quit']))
				{
					redirect(append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT));
				}

				// Start by disabling the board
				set_config('board_disable', 1);
			break;

			// Fix tables
			case 1 :
				$found_tables	= get_phpbb_tables();
				$req_tables		= $this->data->tables;
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
			break;

			// Fix columns
			case 2 :
				foreach ($this->data->tables as $table_name => $data)
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
			break;

			// Fix config
			case 3 :
				$config_rows = $existing_config = array();
				get_config_rows($this->data->config_data, $config_rows, $existing_config);
				foreach ($config_rows as $name)
				{
					if (isset($this->data->config_data[$name]) && in_array($name, $existing_config))
					{
						continue;
					}

					if (isset($selected[$name]))
					{
						if (isset($this->data->config_data[$name]) && !in_array($name, $existing_config))
						{
							// Add it with the default settings we've got...
							set_config($name, $this->data->config_data[$name]['config_value'], $this->data->config_data[$name]['is_dynamic']);
						}
						else if (!isset($this->data->config_data[$name]) && in_array($name, $existing_config))
						{
							// Remove it
							$db->sql_query('DELETE FROM ' . CONFIG_TABLE . " WHERE config_name = '" . $db->sql_escape($name) . "'");
						}
					}
				}

			break;

			// Fix permissions
			case 4 :
				$permission_rows = $existing_permissions = array();
				get_permission_rows($data, $permission_rows, $existing_permissions);
				foreach ($permission_rows as $name)
				{
					// Skip ones that are in the default install and are in the existing permissions
					if (isset($this->data->permissions[$name]) && in_array($name, $existing_permissions))
					{
						continue;
					}

					if (isset($selected[$name]))
					{
						if (isset($this->data->permissions[$name]) && !in_array($name, $existing_permissions))
						{
							// Add it with the default settings we've got...
							$umil->permission_add($name, (($this->data->permissions[$name]['is_global']) ? true : false));
						}
						else if (!isset($this->data->permissions[$name]) && in_array($name, $existing_permissions))
						{
							// Remove it
							$umil->permission_remove($name, true);
							$umil->permission_remove($name, false);
						}
					}
				}
			break;

			// Fix the system groups
			case 5 :
				$group_rows = $existing_groups = array();
				get_group_rows($data, $group_rows, $existing_groups);
				foreach ($group_rows as $name)
				{
					// Skip ones that are in the default install and are in the existing permissions
					if (isset($this->data->groups[$name]) && in_array($name, $existing_groups))
					{
						continue;
					}

					if (isset($selected[$name]))
					{
						if (isset($this->data->groups[$name]) && !in_array($name, $existing_groups))
						{
							// Add it with the default settings we've got...
							$group_id = false;
							group_create($group_id, $this->data->groups[$name]['group_type'], $name, $this->data->groups[$name]['group_desc'], array('group_colour' => $this->data->groups[$name]['group_colour'], 'group_legend' => $this->data->groups[$name]['group_legend'], 'group_avatar' => $this->data->groups[$name]['group_avatar'], 'group_max_recipients' => $this->data->groups[$name]['group_max_recipients']));
						}
						else if (!isset($this->data->groups[$name]) && in_array($name, $existing_groups))
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
			break;

			// Reset modules if required
			case 6 :
				if (isset($_POST['yes']))
				{
					// Remove existing modules
					$db->sql_query('DELETE FROM ' . MODULES_TABLE);

					// Add the modules
					$db->sql_multi_insert(MODULES_TABLE, $this->data->modules);

					// We reset the modules
					$uri_misc = array('mod_reset' => true);
				}
			break;

			// Reset bots
			case 7 :
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
						$template->assign_var('ERROR_MESSAGE', $user->lang['NO_BOT_GROUP']);
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
						foreach ($this->data->bots as $bot_name => $bot_ary)
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
			break;

			case 8 :
				// Enable and purge cache
				$umil->cache_purge();
				$umil->cache_purge('auth');
				set_config('board_disable', 0);

				// Finished!
				trigger_error('DATABASE_CLEANER_SUCCESS');
			break;
		}

		// Redirect to the next step
		redirect(append_sid(STK_INDEX, array_merge(array('c' => 'support', 't' => 'database_cleaner', 'step' => $this->step + 1)), $uri_misc));
	}
}