<?php
/**
*
* @package Support Tool Kit - Database Cleaner
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class database_cleaner
{
	// Will hold existing modules when we get to the modules part
	var $modules = array();

	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['DATABASE_CLEANER'],
			'NAME_EXPLAIN'	=> $user->lang['DATABASE_CLEANER_EXPLAIN'],
		);
	}

	function display_options()
	{
		global $config, $db, $plugin, $template, $user;

		$continue = (isset($_POST['continue'])) ? true : false;
		$step = request_var('step', 0);
		$selected = request_var('items', array('' => ''));

		// Apply Changes to the DB?
		$apply_changes = false;

		if ($step > 0)
		{
			// Unlock the board
			set_config('board_disable', 0);

			// Kick them if bad form key
			check_form_key('database_cleaner', false, append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, array('c' => $plugin->req_cat, 't' => 'database_cleaner')), true);
		}

		// include the required file for this version
		$version_file = preg_replace('#([^0-9]+)#', '_', $config['version']) . '.' . PHP_EXT;
		if (!file_exists(STK_ROOT_PATH . 'includes/database_cleaner/' . $version_file))
		{
			trigger_error('PHPBB_VERSION_NOT_SUPPORTED');
		}
		include(STK_ROOT_PATH . 'includes/database_cleaner/' . $version_file);
		$cleaner = new database_cleaner_data();

		// We will need UMIL
		$umil = new umil();

		$user->add_lang('acp/common');

		switch ($step)
		{
			case 0 :
				// Display a quick intro here and make sure they know what they are doing...
				$template->assign_vars(array(
					'S_NO_INSTRUCTIONS'	=> true,
					'SUCCESS_TITLE'		=> $user->lang['DATABASE_CLEANER'],
					'SUCCESS_MESSAGE'	=> $user->lang['DATABASE_CLEANER_WELCOME'],
					'ERROR_TITLE'		=> ' ',
					'ERROR_MESSAGE'		=> $user->lang['DATABASE_CLEANER_WARNING'],
				));
			break;

			case 1 :
				// Redirect if they selected quit
				if (isset($_POST['quit']))
				{
					redirect(append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT));
				}

				// Start by disabling the board
				if ($apply_changes)
				{
					set_config('board_disable', 1);
				}
				$template->assign_var('SUCCESS_MESSAGE', $user->lang['BOARD_DISABLE_SUCCESS']);

				// Look into any way we can backup the database easily here...

				// Start off simple by displaying extra config variables and let them check/uncheck the ones they want to add/remove
				$template->assign_block_vars('section', array(
					'NAME'		=> $user->lang['CONFIG_SETTINGS'],
					'TITLE'		=> $user->lang['ROWS'],
				));

				$existing_config = array();
				$sql = 'SELECT * FROM ' . CONFIG_TABLE . ' ORDER BY config_name ASC';
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$existing_config[] = $row['config_name'];
				}
				$db->sql_freeresult($result);

				$config_rows = array_unique(array_merge(array_keys($cleaner->config), $existing_config));
				sort($config_rows);

				foreach ($config_rows as $name)
				{
					// Skip ones that are in the default install and are in the existing config
					if (isset($cleaner->config[$name]) && in_array($name, $existing_config))
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

			case 2 :
				// Add/remove the extra config variables they selected.
				if ($apply_changes)
				{
					$existing_config = array();
					$sql = 'SELECT * FROM ' . CONFIG_TABLE;
					$result = $db->sql_query($sql);
					while ($row = $db->sql_fetchrow($result))
					{
						$existing_config[] = $row['config_name'];
					}
					$db->sql_freeresult($result);

					$config_rows = array_unique(array_merge(array_keys($cleaner->config), $existing_config));

					foreach ($config_rows as $name)
					{
						if (isset($cleaner->config[$name]) && in_array($name, $existing_config))
						{
							continue;
						}

						if (isset($selected[$name]))
						{
							if (isset($cleaner->config[$name]) && !in_array($name, $existing_config))
							{
								// Add it with the default settings we've got...
								set_config($name, $cleaner->config[$name]['config_value'], $cleaner->config[$name]['is_dynamic']);
							}
							else if (!isset($cleaner->config[$name]) && in_array($name, $existing_config))
							{
								// Remove it
								$db->sql_query('DELETE FROM ' . CONFIG_TABLE . " WHERE config_name = '" . $db->sql_escape($name) . "'");
							}
						}
					}
				}
				$template->assign_var('SUCCESS_MESSAGE', $user->lang['CONFIG_UPDATE_SUCCESS']);

				// Display the extra permission fields and again let them select ones to add/remove
				$template->assign_block_vars('section', array(
					'NAME'		=> $user->lang['PERMISSION_SETTINGS'],
					'TITLE'		=> $user->lang['ROWS'],
				));

				$existing_permissions = array();
				$sql = 'SELECT * FROM ' . ACL_OPTIONS_TABLE;
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$existing_permissions[] = $row['auth_option'];
				}
				$db->sql_freeresult($result);

				$permission_rows = array_unique(array_merge(array_keys($cleaner->permissions), $existing_permissions));

				foreach ($permission_rows as $name)
				{
					// Skip ones that are in the default install and are in the existing permissions
					if (isset($cleaner->permissions[$name]) && in_array($name, $existing_permissions))
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

			case 3 :
				// Add/remove the permission fields they selected
				if ($apply_changes)
				{
					$existing_permissions = array();
					$sql = 'SELECT * FROM ' . ACL_OPTIONS_TABLE;
					$result = $db->sql_query($sql);
					while ($row = $db->sql_fetchrow($result))
					{
						$existing_permissions[] = $row['auth_option'];
					}
					$db->sql_freeresult($result);

					$permission_rows = array_unique(array_merge(array_keys($cleaner->permissions), $existing_permissions));

					foreach ($permission_rows as $name)
					{
						// Skip ones that are in the default install and are in the existing permissions
						if (isset($cleaner->permissions[$name]) && in_array($name, $existing_permissions))
						{
							continue;
						}

						if (isset($selected[$name]))
						{
							if (isset($cleaner->permissions[$name]) && !in_array($name, $existing_permissions))
							{
								// Add it with the default settings we've got...
								$umil->permission_add($name, (($cleaner->permissions[$name]['is_global']) ? true : false));
							}
							else if (!isset($cleaner->permissions[$name]) && in_array($name, $existing_permissions))
							{
								// Remove it
								$umil->permission_remove($name, true);
								$umil->permission_remove($name, false);
							}
						}
					}
				}
				$template->assign_var('SUCCESS_MESSAGE', $user->lang['PERMISSION_UPDATE_SUCCESS']);

				// Display the system groups that are missing or aren't from a vanilla installation
				$missing_groups	= $cleaner->groups;
				$added_groups	= array();
				$this->get_system_group_data($missing_groups, $added_groups, false);
				
				$template->assign_block_vars('section', array(
					'TITLE'		=> $user->lang['ACP_GROUPS_MANAGEMENT'],
				));
				
				foreach ($missing_groups as $group_name)
				{
					$template->assign_block_vars('section.items', array(
						'FIELD_NAME'	=> "add-{$group_name}",
						'MISSING'		=> true,
						'NAME'			=> isset($user->lang["G_{$group_name}"]) ? $user->lang["G_{$group_name}"] : $group_name,
					));
				}
				
				foreach ($added_groups as $group_name)
				{
					$template->assign_block_vars('section.items', array(
						'FIELD_NAME'	=> "remove-{$group_name}",
						'MISSING'		=> false,
						'NAME'			=> isset($user->lang["G_{$group_name}"]) ? $user->lang["G_{$group_name}"] : $group_name,
					));
				}
			break;
			
			case 4:
				// Add/remove selected system groups
				if ($apply_changes)
				{
					// Build an array with the actions
					$actions = array(
						'add'		=> array(),
						'remove'	=> array(),
					);
					
					foreach ($selected as $field => $value)
					{
						// split and add to the actions array
						$type = explode('-', $field);
						$actions[$type[0]][] = $type[1];
					}
					
					// Get all the default groups
					$default_groups = $cleaner->groups;
					
					// Inlcude required file
					if (!function_exists('user_get_id_name'))
					{
						include (PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
					}
					
					// Get the IDs of the remove groups
					if (sizeof($actions['remove']))
					{
						$remove_ids = array();
						$sql = 'SELECT group_id, group_name
							FROM ' . GROUPS_TABLE . '
							WHERE ' . $db->sql_in_set('group_name', $actions['remove']);
						$result = $db->sql_query($sql);
						while ($group = $db->sql_fetchrow($result))
						{
							$remove_ids[$group['group_name']] = $group['group_id'];
						}
					}
					
					$group_id = 0;
					
					// Run through the actions and do them
					foreach ($actions as $action => $groups)
					{
						foreach ($groups as $group)
						{
							if ($action == 'add')
							{
								group_create($group_id, $default_groups[$group]['group_type'], $group, $default_groups[$group]['group_desc'], array('group_colour' => $default_groups[$group]['group_colour'], 'group_legend' => $default_groups[$group]['group_legend'], 'group_avatar' => $default_groups[$group]['group_avatar'], 'group_max_recipients' => $default_groups[$group]['group_max_recipients']));
							}
							else 
							{
								group_delete($remove_ids[$group], $group);
							}
						}
					}
				}
				
				// Display the extra modules and let them select what to remove, also display a list of any missing and if they want to re-add them
				$missing_modules = $cleaner->modules;
				$extra_modules = array();
				$sql = 'SELECT *
					FROM ' . MODULES_TABLE . '
					ORDER BY left_id';
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$this->modules[$row['module_id']] = $row;

					if (!isset($cleaner->modules[$row['module_class']]))
					{
						if (!isset($extra_modules[$row['module_class']]))
						{
							$extra_modules[$row['module_class']] = array();
						}

						$extra_modules[$row['module_class']][] = $row;
					}
					else
					{
						$extra = true;
						foreach ($cleaner->modules[$row['module_class']] as $module_id => $module)
						{
							$parent = ($module['parent_id']) ? $cleaner->modules[$row['module_class']][$module['parent_id']]['module_langname'] : '';
							$existing_parent = ($row['parent_id']) ? $this->modules[$row['parent_id']]['module_langname'] : '';
							if ($parent == $existing_parent && $module['module_basename'] == $row['module_basename'] && $module['module_mode'] == $row['module_mode'] && $module['module_langname'] == $row['module_langname'])
							{
								$extra = false;
								unset($missing_modules[$row['module_class']][$module_id]);
							}
						}

						if ($extra == true)
						{
							if (!isset($extra_modules[$row['module_class']]))
							{
								$extra_modules[$row['module_class']] = array();
							}

							$extra_modules[$row['module_class']][] = $row;
						}
					}
				}
				$db->sql_freeresult($result);

				$template->assign_block_vars('section', array(
					'TITLE'		=> $user->lang['ACP_MODULE_MANAGEMENT'],
				));

				foreach ($missing_modules as $class => $rows)
				{
					foreach ($rows as $id => $row)
					{
						$parent = ($row['parent_id']) ? $cleaner->modules[$class][$row['parent_id']]['module_langname'] : '';
						$template->assign_block_vars('section.items', array(
							'FIELD_NAME'	=> 'missing-' . $id,
							'NAME'			=> strtoupper($class) . ' -> ' . (($row['parent_id']) ? ((isset($user->lang[$parent])) ? $user->lang[$parent] : $parent) . ' -> ' : '') . ((isset($user->lang[$row['module_langname']])) ? $user->lang[$row['module_langname']] : $row['module_langname']),
							'MISSING'		=> true,
						));
					}
				}

				foreach ($extra_modules as $class => $rows)
				{
					foreach ($rows as $row)
					{
						$template->assign_block_vars('section.items', array(
							'FIELD_NAME'	=> 'extra-' . $row['module_id'],
							'NAME'			=> strtoupper($class) . ' -> ' . (($row['parent_id']) ? ((isset($user->lang[$this->modules[$row['parent_id']]['module_langname']])) ? $user->lang[$this->modules[$row['parent_id']]['module_langname']] : $this->modules[$row['parent_id']]['module_langname']) . ' -> ' : '') . ((isset($user->lang[$row['module_langname']])) ? $user->lang[$row['module_langname']] : $row['module_langname']),
						));
					}
				}
			break;

			case 5 :
				// Remove the extra modules they selected, add any they selected to be added
				$error = array();
				if ($apply_changes)
				{
					$missing_modules = $cleaner->modules;
					$extra_modules = array();
					$sql = 'SELECT * FROM ' . MODULES_TABLE . '
						ORDER BY left_id';
					$result = $db->sql_query($sql);
					while ($row = $db->sql_fetchrow($result))
					{
						$this->modules[$row['module_id']] = $row;

						if (!isset($cleaner->modules[$row['module_class']]))
						{
							if (!isset($extra_modules[$row['module_class']]))
							{
								$extra_modules[$row['module_class']] = array();
							}

							$extra_modules[$row['module_class']][] = $row;
						}
						else
						{
							$extra = true;
							foreach ($cleaner->modules[$row['module_class']] as $module_id => $module)
							{
								if ($module['parent_id'] == $row['parent_id'] && $module['module_basename'] == $row['module_basename'] && $module['module_mode'] == $row['module_mode'] && $module['module_langname'] == $row['module_langname'])
								{
									$extra = false;
									unset($missing_modules[$row['module_class']][$module_id]);
								}
							}

							if ($extra == true)
							{
								if (!isset($extra_modules[$row['module_class']]))
								{
									$extra_modules[$row['module_class']] = array();
								}

								$extra_modules[$row['module_class']][] = $row;
							}
						}
					}
					$db->sql_freeresult($result);

					$to_add = $to_remove = array();
					foreach ($missing_modules as $class => $rows)
					{
						foreach ($rows as $id => $row)
						{
							if (isset($selected['missing-' . $id]))
							{
								$row['class'] = $class;
								$to_add[$id] = $row;
							}
						}
					}

					foreach ($extra_modules as $class => $rows)
					{
						foreach ($rows as $row)
						{
							if (isset($selected['extra-' . $row['module_id']]))
							{
								$row['class'] = $class;
								$to_remove[] = $row;
							}
						}
					}

					$error = array_merge($error, $this->add_modules($to_add, $umil, $cleaner));
					$error = array_merge($error, $this->remove_modules($to_remove, $umil));
				}
				if (sizeof($error))
				{
					$template->assign_var('ERROR_MESSAGE', implode('<br />', $error));
				}
				else
				{
					$template->assign_var('SUCCESS_MESSAGE', $user->lang['MODULE_UPDATE_SUCCESS']);
				}

				// Ask if they would like to reset the bots (handled in the template)
				$template->assign_vars(array(
					'S_BOT_OPTIONS'		=> true,
					'S_NO_INSTRUCTIONS'	=> true,
				));
			break;

			case 6 :
				// Reset the bots if they wanted to
				if (isset($_POST['yes']) && $apply_changes)
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
						if (sizeof($uids))
						{
							$db->sql_query('DELETE FROM ' . USERS_TABLE . ' WHERE ' . $db->sql_in_set('user_id', $uids));
							$db->sql_query('DELETE FROM ' . BOTS_TABLE);
						}

						// Add the bots
						foreach ($this->bot_list as $bot_name => $bot_ary)
						{
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

						$template->assign_var('SUCCESS_MESSAGE', $user->lang['RESET_BOT_SUCCESS']);
					}
				}

				// Time to start going through the database and listing any extra/missing fields
				$last_output_table = '';
				foreach ($cleaner->tables as $table_name => $data)
				{
					$existing_columns = $this->get_columns($table_name);

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

			case 7 :
				// Update the tables according to what they selected last time
				$error = array();
				if ($apply_changes)
				{
					foreach ($cleaner->tables as $table_name => $data)
					{
						$existing_columns = $this->get_columns($table_name);

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

				if (sizeof($error))
				{
					$template->assign_var('ERROR_MESSAGE', implode('<br />', $error));
				}
				else
				{
					$template->assign_var('SUCCESS_MESSAGE', $user->lang['DATABASE_COLUMNS_SUCCESS']);
				}

				// Find any extra tables and list them as options to remove
				if (!function_exists('get_tables'))
				{
					include(PHPBB_ROOT_PATH . 'includes/functions_install.' . PHP_EXT);
				}

				$existing_tables = get_tables($db);
				$tables = array_unique(array_merge(array_keys($cleaner->tables), $existing_tables));
				sort($tables);

				$template->assign_block_vars('section', array(
					'NAME'		=> $user->lang['DATABASE_TABLES'],
					'TITLE'		=> $user->lang['DATABASE_TABLES'],
				));

				foreach ($tables as $table)
				{
					if ((isset($cleaner->tables[$table]) && !in_array($table, $existing_tables)) || (!isset($cleaner->tables[$table]) && in_array($table, $existing_tables)))
					{
						$template->assign_block_vars('section.items', array(
							'NAME'			=> $table,
							'FIELD_NAME'	=> $table,
							'MISSING'		=> (isset($cleaner->tables[$table])) ? true : false,
						));
					}
				}
			break;

			case 8 :
				// Remove the extra selected tables
				$error = array();
				if ($apply_changes)
				{
					if (!function_exists('get_tables'))
					{
						include(PHPBB_ROOT_PATH . 'includes/functions_install.' . PHP_EXT);
					}

					$existing_tables = get_tables($db);
					$tables = array_unique(array_merge(array_keys($cleaner->tables), $existing_tables));

					foreach ($tables as $table)
					{
						if (isset($selected[$table]))
						{
							if (isset($cleaner->tables[$table]) && !in_array($table, $existing_tables))
							{
								$result = $umil->table_add($table, $cleaner->tables[$table]);
								if (stripos($result, 'SQL ERROR'))
								{
									$error[] = $result;
								}
							}
							else if (!isset($cleaner->tables[$table]) && in_array($table, $existing_tables))
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

				if (sizeof($error))
				{
					$template->assign_var('ERROR_MESSAGE', implode('<br />', $error));
				}
				else
				{
					$template->assign_var('SUCCESS_MESSAGE', $user->lang['DATABASE_TABLES_SUCCESS']);
				}

				// Misc things will be done next
				$template->assign_vars(array(
					'SUCCESS_MESSAGE'	=> $user->lang['FINAL_STEP'],
					'S_NO_INSTRUCTIONS'	=> true,
				));
			break;

			case 9 :
				if ($apply_changes)
				{
					set_config('board_disable', 0);
					$umil->cache_purge();
				}

				// Finished?
				trigger_error('DATABASE_CLEANER_SUCCESS');
			break;
		}

		page_header($user->lang['DATABASE_CLEANER'], false);

		$template->assign_vars(array(
			'STEP'			=> $step,

			'U_NEXT_STEP'	=> append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, array('c' => $plugin->req_cat, 't' => 'database_cleaner&amp;step=' . ($step + 1))),
		));

		$template->set_filenames(array(
			'body' => 'tools/database_cleaner.html',
		));

		page_footer();
	}

	/**
	* Bot list from phpBB 3.0.4
	*
	*/
	var $bot_list = array(
		'AdsBot [Google]'			=> array('AdsBot-Google', ''),
		'Alexa [Bot]'				=> array('ia_archiver', ''),
		'Alta Vista [Bot]'			=> array('Scooter/', ''),
		'Ask Jeeves [Bot]'			=> array('Ask Jeeves', ''),
		'Baidu [Spider]'			=> array('Baiduspider+(', ''),
		'Exabot [Bot]'				=> array('Exabot/', ''),
		'FAST Enterprise [Crawler]'	=> array('FAST Enterprise Crawler', ''),
		'FAST WebCrawler [Crawler]'	=> array('FAST-WebCrawler/', ''),
		'Francis [Bot]'				=> array('http://www.neomo.de/', ''),
		'Gigabot [Bot]'				=> array('Gigabot/', ''),
		'Google Adsense [Bot]'		=> array('Mediapartners-Google', ''),
		'Google Desktop'			=> array('Google Desktop', ''),
		'Google Feedfetcher'		=> array('Feedfetcher-Google', ''),
		'Google [Bot]'				=> array('Googlebot', ''),
		'Heise IT-Markt [Crawler]'	=> array('heise-IT-Markt-Crawler', ''),
		'Heritrix [Crawler]'		=> array('heritrix/1.', ''),
		'IBM Research [Bot]'		=> array('ibm.com/cs/crawler', ''),
		'ICCrawler - ICjobs'		=> array('ICCrawler - ICjobs', ''),
		'ichiro [Crawler]'			=> array('ichiro/2', ''),
		'Majestic-12 [Bot]'			=> array('MJ12bot/', ''),
		'Metager [Bot]'				=> array('MetagerBot/', ''),
		'MSN NewsBlogs'				=> array('msnbot-NewsBlogs/', ''),
		'MSN [Bot]'					=> array('msnbot/', ''),
		'MSNbot Media'				=> array('msnbot-media/', ''),
		'NG-Search [Bot]'			=> array('NG-Search/', ''),
		'Nutch [Bot]'				=> array('http://lucene.apache.org/nutch/', ''),
		'Nutch/CVS [Bot]'			=> array('NutchCVS/', ''),
		'OmniExplorer [Bot]'		=> array('OmniExplorer_Bot/', ''),
		'Online link [Validator]'	=> array('online link validator', ''),
		'psbot [Picsearch]'			=> array('psbot/0', ''),
		'Seekport [Bot]'			=> array('Seekbot/', ''),
		'Sensis [Crawler]'			=> array('Sensis Web Crawler', ''),
		'SEO Crawler'				=> array('SEO search Crawler/', ''),
		'Seoma [Crawler]'			=> array('Seoma [SEO Crawler]', ''),
		'SEOSearch [Crawler]'		=> array('SEOsearch/', ''),
		'Snappy [Bot]'				=> array('Snappy/1.1 ( http://www.urltrends.com/ )', ''),
		'Steeler [Crawler]'			=> array('http://www.tkl.iis.u-tokyo.ac.jp/~crawler/', ''),
		'Synoo [Bot]'				=> array('SynooBot/', ''),
		'Telekom [Bot]'				=> array('crawleradmin.t-info@telekom.de', ''),
		'TurnitinBot [Bot]'			=> array('TurnitinBot/', ''),
		'Voyager [Bot]'				=> array('voyager/1.0', ''),
		'W3 [Sitesearch]'			=> array('W3 SiteSearch Crawler', ''),
		'W3C [Linkcheck]'			=> array('W3C-checklink/', ''),
		'W3C [Validator]'			=> array('W3C_*Validator', ''),
		'WiseNut [Bot]'				=> array('http://www.WISEnutbot.com', ''),
		'YaCy [Bot]'				=> array('yacybot', ''),
		'Yahoo MMCrawler [Bot]'		=> array('Yahoo-MMCrawler/', ''),
		'Yahoo Slurp [Bot]'			=> array('Yahoo! DE Slurp', ''),
		'Yahoo [Bot]'				=> array('Yahoo! Slurp', ''),
		'YahooSeeker [Bot]'			=> array('YahooSeeker/', ''),
	);

	function get_columns($table)
	{
		global $db;

		if (!class_exists('phpbb_db_tools'))
		{
			include(PHPBB_ROOT_PATH . 'includes/db/db_tools.' . PHP_EXT);
		}
		$db_tools = new phpbb_db_tools($db);

		$sql = '';
		$column_name = '';

		// Set the query and column for each dbms
		switch ($db_tools->sql_layer)
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

		if ($db_tools->sql_layer != 'sqlite')
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

	// Recursive in case we try to add children before parents or something like that...
	function add_modules($to_add, &$umil, &$cleaner, $cnt = 0)
	{
		global $user;

		$error = $try_again = array();

		foreach ($to_add as $row)
		{
			$parent = ($row['parent_id']) ? $cleaner->modules[$row['class']][$row['parent_id']]['module_langname'] : 0;
			if ($row['module_basename'])
			{
				$umil->module_add($row['class'], $parent, array(
					'module_basename'	=> $row['module_basename'],
					'modes'				=> array($row['module_mode']),
				));
				if ($umil->result != ((isset($user->lang['SUCCESS'])) ? $user->lang['SUCCESS'] : 'SUCCESS'))
				{
					if ($umil->result == 'PARENT_NOT_EXIST' || (isset($user->lang['PARENT_NOT_EXIST']) && $umil->result == $user->lang['PARENT_NOT_EXIST']))
					{
						$try_again[] = $row;
					}

					$error[] = ((isset($user->lang[$row['module_langname']])) ? $user->lang[$row['module_langname']] : $row['module_langname']) . ' - ' . $umil->result;
				}
			}
			else
			{
				$umil->module_add($row['class'], $parent, $row['module_langname']);
				if ($umil->result != ((isset($user->lang['SUCCESS'])) ? $user->lang['SUCCESS'] : 'SUCCESS'))
				{
					if ($umil->result == 'PARENT_NOT_EXIST' || (isset($user->lang['PARENT_NOT_EXIST']) && $umil->result == $user->lang['PARENT_NOT_EXIST']))
					{
						$try_again[] = $row;
					}

					$error[] = ((isset($user->lang[$row['module_langname']])) ? $user->lang[$row['module_langname']] : $row['module_langname']) . ' - ' . $umil->result;
				}
			}
		}

		if (sizeof($try_again) && $cnt < 5)
		{
			return $this->add_modules($try_again, $umil, $cleaner, ($cnt + 1));
		}

		return $error;
	}

	// Recursive in case we try to remove parents before children or something like that...
	function remove_modules($to_remove, &$umil, $cnt = 0)
	{
		global $user;

		$error = $try_again = array();

		foreach ($to_remove as $row)
		{
			$umil->module_remove($row['class'], $row['parent_id'], $row['module_langname']);
			if ($umil->result != ((isset($user->lang['SUCCESS'])) ? $user->lang['SUCCESS'] : 'SUCCESS'))
			{
				if ($umil->result == $user->lang['CANNOT_REMOVE_MODULE'])
				{
					$try_again[] = $row;
				}

				$error[] = ((isset($user->lang[$row['module_langname']])) ? $user->lang[$row['module_langname']] : $row['module_langname']) . ' - ' . $umil->result;
			}
		}

		if (sizeof($try_again) && $cnt < 5)
		{
			return $this->remove_modules($try_again, $umil, ($cnt + 1));
		}

		return $error;
	}
	
	function get_system_group_data(&$missing_groups, &$added_groups, $data = true)
	{
		global $db;
		
		$select = ($data) ? '*' : 'group_name';
		
		$sql = "SELECT {$select}
			FROM " . GROUPS_TABLE . '
			WHERE group_type = 3';
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			// A default group
			if (isset($missing_groups[$row['group_name']]))
			{
				unset($missing_groups[$row['group_name']]);
			}
			else
			{
				if (!isset($added_groups[$row['group_name']]))
				{
					$added_groups[$row['group_name']] = $row;
				}
			}
		}
		
		// If required only pass the names
		if (!$data)
		{
			$missing_groups = array_keys($missing_groups);
			$added_groups	= array_keys($added_groups);
		}
	}
}
?>