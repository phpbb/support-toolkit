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
* Class that displays all overview pages
*/
class database_cleaner_views
{
	/**
	* @var database_cleaner_data The database cleaner data object
	*/
	var $data = array();

	function database_cleaner_views($db_cleaner)
	{
		$this->data = $db_cleaner->data;
	}

	/**
	* Reset bots?
	*/
	function bots()
	{
		global $template;

		$template->assign_vars(array(
			'L_OPTION_TITLE'	=> $user->lang('RESET_BOTS'),
			'L_OPTION_EXPLAIN'	=> $user->lang('RESET_BOTS_EXPLAIN'),
		));

		// Only success message when the modules have been reset
		$did_run = request_var('did_run', false);
		return ($did_run) ? 'RESET_MODULE_SUCCESS' : 'RESET_MODULES_SKIP';
	}

	/**
	* Validate all columns in the database
	*/
	function columns()
	{
		global $template;

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

		return 'DATABASE_TABLES_SUCCESS';
	}

	/**
	* Validate all entries in the config table
	*/
	function config()
	{
		global $template, $user;

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

		return 'DATABASE_COLUMNS_SUCCESS';
	}

	/**
	* Display the last step
	*/
	function final_step()
	{
		global $template;

		// Misc things will be done next
		$template->assign_var('S_NO_INSTRUCTIONS', true);

		// Only success message when the bots have been reset
		$did_run = request_var('did_run', false);
		return ($did_run) ? 'RESET_BOT_SUCCESS' : 'RESET_BOTS_SKIP';
	}

	/**
	* Validate all system groups
	*/
	function groups()
	{
		global $template, $user;

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

		return 'PERMISSION_UPDATE_SUCCESS';
	}

	/**
	* Display a quick intro here and make sure they know what they are doing...
	*/
	function introduction()
	{
		global $template, $user;

		$template->assign_vars(array(
			'S_NO_INSTRUCTIONS'	=> true,
			'SUCCESS_TITLE'		=> $user->lang['DATABASE_CLEANER'],
			'ERROR_TITLE'		=> ' ',
			'ERROR_MESSAGE'		=> $user->lang['DATABASE_CLEANER_WARNING'],
		));

		return 'DATABASE_CLEANER_WELCOME';
	}

	/**
	* Reset modules?
	*/
	function modules()
	{
		global $template, $user;

		$template->assign_vars(array(
			'L_OPTION_TITLE'	=> $user->lang('RESET_MODULES'),
			'L_OPTION_EXPLAIN'	=> $user->lang('RESET_MODULES_EXPLAIN'),
		));

		return 'SYSTEM_GROUP_UPDATE_SUCCESS';
	}

	/**
	* Validate all permissions
	*/
	function permissions()
	{
		global $template;

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

		return 'CONFIG_UPDATE_SUCCESS';
	}

	/**
	* Validate all tables in the database
	*/
	function tables()
	{
		global $template, $user;

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

		return 'BOARD_DISABLE_SUCCESS';
	}
}