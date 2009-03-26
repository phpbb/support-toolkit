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

				// Display the extra modules and let them select what to remove, also display a list of any missing and if they want to re-add them
			break;

			case 4 :
				// Remove the extra modules they selected, add any they selected to be added
				if ($apply_changes)
				{

				}

				// Ask if they would like to reset the bots (handled in the template)
				$template->assign_vars(array(
					'S_BOT_OPTIONS'		=> true,
					'S_NO_INSTRUCTIONS'	=> true,
				));
			break;

			case 5 :
				// Reset the bots if they wanted to
				if (isset($_POST['yes']) && $apply_changes)
				{
					$sql = 'SELECT group_id
						FROM ' . GROUPS_TABLE . "
						WHERE group_name = 'BOTS'";
					$result = $db->sql_query($sql);
					$group_id = (int) $db->sql_fetchfield('group_id');
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
								'user_colour'			=> '9E8DA7',
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

				// Output a list of the name of the table followed by all of the fields in it.  Any extras give the option to remove and any missing give the option to add
				//(grey background for ones that are there and should be, green for ones that are there and should not be, red for ones that are not there and should be)

				// When checking for database columns, select a row from the table to find all the column names.
				// If there were no rows in the table, attempt to insert a row from the data on the table stored in the file for this version,
					// catch any errors in case a column was added, and keep going until a row is added successfully.
					// Once one was added successfully we can record the columns and then remove the row again

				$last_output_table = '';
				foreach ($cleaner->tables as $table_name => $data)
				{
					$existing_columns = $this->get_existing_columns($table_name, $data);

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

			case 6 :
				// Update the tables according to what they selected last time
				$error = array();
				if ($apply_changes)
				{
					foreach ($cleaner->tables as $table_name => $data)
					{
						$existing_columns = $this->get_existing_columns($table_name, $data);

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

			case 7 :
				// Remove the extra selected tables
				$error = array();
				if (true)//$apply_changes)
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

	function get_existing_columns($table_name, $data)
	{
		global $db;

		$existing_columns = array();

		$db->return_on_error = true;
		$sql = 'SELECT * FROM ' . $table_name;
		$result = $db->sql_query_limit($sql, 1);

		if (!$result)
		{
			// Table does not exist?
			return false;
		}

		$row = $db->sql_fetchrow($result);
		$db->return_on_error = false;

		if ($row)
		{
			foreach ($row as $name => $value)
			{
				$existing_columns[] = $name;
			}
		}
		else
		{
			// No rows in the database...gotta do it the hard way.
			$no_row = true;
			$db->return_on_error = true; // Must catch errors
			$sql_ary = array();

			foreach ($data['COLUMNS'] as $name => $type)
			{
				if ($type[1] !== NULL) // Skip auto increment fields
				{
					$sql_ary[$name] = $type[1];
				}
			}

			while ($no_row)
			{
				$sql = 'INSERT INTO ' . $table_name . ' ' . $db->sql_build_array('INSERT', $sql_ary);
				$result = $db->sql_query($sql);

				if (!$result)
				{
					$error = $db->sql_error_returned['message'];

					$matches = array();
					preg_match("#column '([a-zA-Z0-9_\-]+)'#", $error, $matches);

					if (!isset($matches[1]))
					{
						trigger_error('Please record the following error and report it to the Support Team at phpbb.com<br /><br />' . $error);
					}
					$column = $matches[1];

					if (isset($sql_ary[$column]))
					{
						if (stripos($error, 'unknown'))
						{
							unset($sql_ary[$column]);
						}
						else
						{
							// keep trying to guess what type it is...
							if ($sql_ary[$column] === '')
							{
								$sql_ary[$column] = 0;
							}
							else
							{
								trigger_error('Please record the following error and report it to the Support Team at phpbb.com<br /><br />' . $error);
							}
						}
					}
					else
					{
						$sql_ary[$column] = '';
					}
				}
				else
				{
					// Looks like an insertion worked.
					$sql = 'SELECT * FROM ' . $table_name;
					$result = $db->sql_query_limit($sql, 1);
					$row = $db->sql_fetchrow($result);

					if ($row)
					{
						foreach ($row as $name => $value)
						{
							$existing_columns[] = $name;
						}

						$no_row = false;
					}
					else
					{
						trigger_error('Unknown Error - Line 425.  Please contact the Support Team at phpbb.com.');
					}
				}
			}

			// Clean out the table again
			$db->sql_query('DELETE FROM ' . $table_name);

			$db->return_on_error = false;
		}

		return $existing_columns;
	}
}
?>