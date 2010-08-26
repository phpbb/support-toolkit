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
	* @var Array This step needs a confirmbox, this array contains all the data
	*
	* $_confirm_box = array(
	*	'title'		=> 'The title',
	*	'message	=> 'The message',
	* );
	*/
	var $_confirm_box = array();

	/**
	* @var Array Array that is used to build lists of found changes
	*/
	var $_section_data = array();

	/**
	* @var database_cleaner_data The database cleaner data object
	*/
	var $db_cleaner = array();

	/**
	* @var String The message that is displayed once a step is done successfully
	*/
	var $success_message = '';

	/**
	 * @var Boolean Has changes.
	 */
	var $_has_changes = false;

	/**
	* Constructor
	* @param database_cleaner $db_cleaner Object of the current database cleaner class
	*/
	function database_cleaner_views($db_cleaner)
	{
		$this->db_cleaner = $db_cleaner;
	}

	/**
	* Output the page
	*/
	function display()
	{
		global $error, $template, $user;

		// Error?
		if (!empty($error))
		{
			$error_msg = '';
			foreach ($error as $e)
			{
				$error_msg .= user_lang($e) . '<br />';
			}
			$template->assign_var('ERROR_MESSAGE', $error_msg);
		}

		// This page has a "confirm box"
		if (!empty($this->_confirm_box))
		{
			$template->assign_vars(array(
				'L_CONFIRM_TITLE'	=> user_lang($this->_confirm_box['title']),
				'L_CONFIRM_EXPLAIN'	=> user_lang($this->_confirm_box['message']),
				'S_CONFIRM_BOX'		=> true,
			));
		}
		// This step found some changes
		elseif (!empty($this->_section_data))
		{
			// Output the sections
			foreach($this->_section_data as $section)
			{
				// Its possible the section exist but there aren't any items
				if (empty($section['ITEMS']))
				{
					continue;
				}

				// Create the section
				$template->assign_block_vars('section', array(
					'NAME'	=> user_lang($section['NAME']),
					'TITLE'	=> user_lang($section['TITLE']),
				));

				// Output the items
				foreach($section['ITEMS'] as $item)
				{
					$template->assign_block_vars('section.items', array(
						'NAME'			=> user_lang($item['NAME']),
						'FIELD_NAME'	=> user_lang($item['FIELD_NAME']),
						'MISSING'		=> $item['MISSING'],
					));
				}
			}
		}

		// Assign no changes text
		if (isset($user->lang['SECTION_NOT_CHANGED_TITLE'][$this->db_cleaner->step]))
		{
			$template->assign_vars(array(
				'NO_CHANGES_TEXT'	=> user_lang('SECTION_NOT_CHANGED_EXPLAIN', $this->db_cleaner->step),
				'NO_CHANGES_TITLE'	=> user_lang('SECTION_NOT_CHANGED_TITLE', $this->db_cleaner->step),
			));
		}

		// Determine the link for the next step
		if ($this->_has_changes || !empty($this->_confirm_box))
		{
			$_u_next_step = append_sid(STK_INDEX, array('c' => 'support', 't' => 'database_cleaner', 'step' => $this->db_cleaner->step, 'submit' => true));
		}
		else
		{
			$_u_next_step = append_sid(STK_INDEX, array('c' => 'support', 't' => 'database_cleaner', 'step' => ($this->db_cleaner->step + 1)));
		}

		// Output some stuff we need always
		$template->assign_vars(array(
			'LAST_STEP'			=> sizeof($this->db_cleaner->step_to_action),
			'STEP'				=> $this->db_cleaner->step,
			'SUCCESS_MESSAGE'	=> user_lang($this->success_message),

			// Create submit link, always set "submit" so we'll continue in the run_tool method
			'U_NEXT_STEP'	=> $_u_next_step,
		));

		// Do tha page
		page_header(user_lang('DATABASE_CLEANER'), false);

		$template->set_filenames(array(
			'body' => 'tools/database_cleaner.html',
		));

		page_footer();
	}

	/**
	* Reset bots?
	*/
	function bots()
	{
		$this->_confirm_box = array(
			'title'		=> 'RESET_BOTS',
			'message'	=> 'RESET_BOTS_EXPLAIN',
		);

		// Only success message when the modules have been reset
		$did_run = request_var('did_run', false);
		$this->success_message = ($did_run) ? 'RESET_MODULE_SUCCESS' : 'RESET_MODULES_SKIP';
	}

	/**
	* Validate all columns in the database
	*/
	function columns()
	{
		// Time to start going through the database and listing any extra/missing fields
		$last_output_table = '';
		foreach ($this->db_cleaner->data->tables as $table_name => $data)
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

						$this->_section_data[$table_name] = array(
							'NAME'	=> $table_name,
							'TITLE'	=> 'COLUMNS',
						);
					}

					// Add the data
					$this->_section_data[$table_name]['ITEMS'][] = array(
						'NAME'			=> $column,
						'FIELD_NAME'	=> $table_name . '_' . $column,
						'MISSING'		=> (!in_array($column, $existing_columns)) ? true : false,
					);

					if ($this->_has_changes === false)
					{
						$this->_has_changes = true;
					}
				}
			}
		}

		$this->success_message = 'DATABASE_TABLES_SUCCESS';
	}

	/**
	* Validate all entries in the config table
	*/
	function config()
	{
		// display extra config variables and let them check/uncheck the ones they want to add/remove
		$this->_section_data['config'] = array(
			'NAME'		=> 'CONFIG_SETTINGS',
			'TITLE'		=> 'ROWS',
		);

		$config_rows = $existing_config = array();
		get_config_rows($this->db_cleaner->data->config_data, $config_rows, $existing_config);
		foreach ($config_rows as $name)
		{
			// Skip ones that are in the default install and are in the existing config
			if (isset($this->db_cleaner->data->config_data[$name]) && in_array($name, $existing_config))
			{
				continue;
			}

			$this->_section_data['config']['ITEMS'][] = array(
				'NAME'			=> $name,
				'FIELD_NAME'	=> $name,
				'MISSING'		=> (!in_array($name, $existing_config)) ? true : false,
			);

			if ($this->_has_changes === false)
			{
				$this->_has_changes = true;
			}
		}

		$this->success_message = 'DATABASE_COLUMNS_SUCCESS';
	}

	/**
	* Display the last step
	*/
	function final_step()
	{
		global $template;

		// Only success message when the bots have been reset
		$did_run = request_var('did_run', false);
		$this->success_message = ($did_run) ? 'RESET_BOT_SUCCESS' : 'RESET_BOTS_SKIP';

		$this->_has_changes = true;
	}

	/**
	* Validate all system groups
	*/
	function groups()
	{
		global $template, $user;

		// Display the system groups that are missing or aren't from a vanilla installation
		$this->_section_data['groups'] = array(
			'NAME'		=> 'ACP_GROUPS_MANAGEMENT',
			'TITLE'		=> 'ROWS',
		);

		$group_rows = $existing_groups = array();
		get_group_rows($this->db_cleaner->data->groups, $group_rows, $existing_groups);
		foreach ($group_rows as $name)
		{
			// Skip ones that are in the default install and are in the existing permissions
			if (isset($this->db_cleaner->data->groups[$name]) && in_array($name, $existing_groups))
			{
				continue;
			}

			$this->_section_data['config']['ITEMS'][] = array(
				'NAME'			=> $name,
				'FIELD_NAME'	=> $name,
				'MISSING'		=> (!in_array($name, $existing_groups)) ? true : false,
			);

			if ($this->_has_changes === false)
			{
				$this->_has_changes = true;
			}
		}

		$this->success_message = 'PERMISSION_UPDATE_SUCCESS';
	}

	/**
	* Display a quick intro here and make sure they know what they are doing...
	*/
	function introduction()
	{
		global $template, $user;

		$template->assign_vars(array(
			'SUCCESS_TITLE'		=> $user->lang['DATABASE_CLEANER'],
			'ERROR_TITLE'		=> ' ',
			'ERROR_MESSAGE'		=> $user->lang['DATABASE_CLEANER_WARNING'],
		));

		$this->success_message = 'DATABASE_CLEANER_WELCOME';
	}

	/**
	* Reset modules?
	*/
	function modules()
	{
		$this->_confirm_box = array(
			'title'		=> 'RESET_MODULES',
			'message'	=> 'RESET_MODULES_EXPLAIN',
		);

		$this->success_message = 'SYSTEM_GROUP_UPDATE_SUCCESS';
	}

	/**
	* Validate all permissions
	*/
	function permissions()
	{
		$this->_section_data['permissions'] = array(
			'NAME'		=> 'PERMISSION_SETTINGS',
			'TITLE'		=> 'ROWS',
		);

		$permission_rows = $existing_permissions = array();
		get_permission_rows($this->db_cleaner->data->permissions, $permission_rows, $existing_permissions);
		foreach ($permission_rows as $name)
		{
			// Skip ones that are in the default install and are in the existing permissions
			if (isset($this->db_cleaner->data->permissions[$name]) && in_array($name, $existing_permissions))
			{
				continue;
			}

			$this->_section_data['permissions']['ITEMS'][] = array(
				'NAME'			=> $name,
				'FIELD_NAME'	=> $name,
				'MISSING'		=> (!in_array($name, $existing_permissions)) ? true : false,
			);

			if ($this->_has_changes === false)
			{
				$this->_has_changes = true;
			}
		}

		$this->success_message = 'CONFIG_UPDATE_SUCCESS';
	}

	/**
	* Validate all tables in the database
	*/
	function tables()
	{
		$found_tables	= get_phpbb_tables();
		$req_tables		= $this->db_cleaner->data->tables;
		$tables			= array_unique(array_merge(array_keys($req_tables), $found_tables));
		sort($tables);

		$this->_section_data['tables'] = array(
			'NAME'		=> 'DATABASE_TABLES',
			'TITLE'		=> 'DATABASE_TABLES',
		);

		foreach ($tables as $table)
		{
			// Table was added or removed
			if (!isset($req_tables[$table]) && in_array($table, $found_tables) || isset($req_tables[$table]) && !in_array($table, $found_tables))
			{
				$this->_section_data['tables']['ITEMS'][] = array(
					'NAME'			=> $table,
					'FIELD_NAME'	=> $table,
					'MISSING'		=> isset($req_tables[$table]) ? true : false,
				);

				if ($this->_has_changes === false)
				{
					$this->_has_changes = true;
				}
			}
		}

		$this->success_message = 'BOARD_DISABLE_SUCCESS';
	}
}