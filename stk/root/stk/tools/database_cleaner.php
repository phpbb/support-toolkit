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
	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['DATABASE_CLEANER'],
			'NAME_EXPLAIN'	=> $user->lang['DATABASE_CLEANER_EXPLAIN'],
			'CATEGORY'		=> $user->lang['ADMIN_TOOLS'],
		);
	}

	function display_options()
	{
		global $config, $db, $template, $user;

		$continue = (isset($_POST['continue'])) ? true : false;
		$step = request_var('step', 0);
		$selected = request_var('items', array('' => ''));

		// Apply Changes to the DB?
		$apply_changes = false;

		if ($step > 0)
		{
			// Kick them if bad form key
			check_form_key('database_cleaner', false, append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, 't=database_cleaner'), true);
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

		switch ($step)
		{
			case 0 :
				// Display a quick intro here and make sure they know what they are doing...
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
				$template->assign_var('STEP_SUCCESS', $user->lang['BOARD_DISABLE_SUCCESS']);

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
				$template->assign_var('STEP_SUCCESS', $user->lang['CONFIG_UPDATE_SUCCESS']);

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
				$template->assign_var('STEP_SUCCESS', $user->lang['PERMISSION_UPDATE_SUCCESS']);

				// Display the extra modules and let them select what to remove, also display a list of any missing and if they want to re-add them
			break;

			case 4 :
				// Remove the extra modules they selected, add any they selected to be added
				if ($apply_changes)
				{

				}

				// Ask if they would like to reset the bots
			break;

			case 5 :
				// Reset the bots if they wanted to
				if ($apply_changes)
				{

				}

				// Time to start going through the database and listing any extra/missing fields

				// Output a list of the name of the table followed by all of the fields in it.  Any extras give the option to remove and any missing give the option to add
				//(grey background for ones that are there and should be, green for ones that are there and should not be, red for ones that are not there and should be)

				// When checking for database columns, select a row from the table to find all the column names.
				// If there were no rows in the table, attempt to insert a row from the data on the table stored in the file for this version,
					// catch any errors in case a column was added, and keep going until a row is added successfully.
					// Once one was added successfully we can record the columns and then remove the row again
			break;

			case 6 :
				// Update the tables according to what they selected last time
				if ($apply_changes)
				{

				}

				// Find any extra tables and list them as options to remove
			break;

			case 7 :
				// Remove the extra selected tables
				if ($apply_changes)
				{

				}

				// Misc things will be done next
				$template->assign_var('SPECIAL_MESSAGE', $user->lang['FINAL_STEP']);
			break;

			case 8 :
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

			'U_NEXT_STEP'	=> append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, 't=database_cleaner&amp;step=' . ($step + 1)),
		));

		$template->set_filenames(array(
			'body' => 'tools/database_cleaner.html',
		));

		page_footer();
	}
}
?>