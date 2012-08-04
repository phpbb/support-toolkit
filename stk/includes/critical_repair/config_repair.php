<?php
/**
*
* @package Support Toolkit
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

class erk_config_repair
{
	function run()
	{
		if (!file_exists(PHPBB_ROOT_PATH . 'config.' . PHP_EXT))
		{
			$this->repair();
			header('Location: ' . STK_INDEX);
			exit;
		}
		return true;
	}
	function repair()
	{
		include(PHPBB_ROOT_PATH . 'includes/functions_install.' . PHP_EXT);
		$available_dbms = get_available_dbms();

		$error = array();
		$data = array(
			'dbms'			=> (isset($_POST['dbms'])) ? $_POST['dbms'] : '',
			'dbhost'		=> (isset($_POST['dbhost'])) ? $_POST['dbhost'] : '',
			'dbport'		=> (isset($_POST['dbport'])) ? $_POST['dbport'] : '',
			'dbname'		=> (isset($_POST['dbname'])) ? $_POST['dbname'] : '',
			'dbuser'		=> (isset($_POST['dbuser'])) ? $_POST['dbuser'] : '',
			'dbpasswd'		=> (isset($_POST['dbpasswd'])) ? $_POST['dbpasswd'] : '',
			'table_prefix'	=> (isset($_POST['table_prefix'])) ? $_POST['table_prefix'] : 'phpbb_',
		);

		if (isset($_POST['submit']))
		{
			if (!isset($available_dbms[$data['dbms']]))
			{
				$error[] = 'Database Connection not available.';
			}
			else
			{
				$connect_test = $this->critical_connect_check_db(true, $error, $available_dbms[$data['dbms']], $data['table_prefix'], $data['dbhost'], $data['dbuser'], htmlspecialchars_decode($data['dbpasswd']), $data['dbname'], $data['dbport']);
				if (!$connect_test)
				{
					$error[] = 'Database Connection failed.';
				}
			}
		}

		if (isset($_POST['submit']) && empty($error))
		{
			// Time to convert the data provided into a config file
			$config_data = "<?php\n";
			$config_data .= "// phpBB 3.0.x auto-generated configuration file\n// Do not change anything in this file!\n";

			$config_data_array = array(
				'dbms'			=> $available_dbms[$data['dbms']]['DRIVER'],
				'dbhost'		=> $data['dbhost'],
				'dbport'		=> $data['dbport'],
				'dbname'		=> $data['dbname'],
				'dbuser'		=> $data['dbuser'],
				'dbpasswd'		=> htmlspecialchars_decode($data['dbpasswd']),
				'table_prefix'	=> $data['table_prefix'],
				'acm_type'		=> 'file',
				'load_extensions'	=> '',
			);

			foreach ($config_data_array as $key => $value)
			{
				$config_data .= "\${$key} = '" . str_replace("'", "\\'", str_replace('\\', '\\\\', $value)) . "';\n";
			}
			unset($config_data_array);

			$config_data .= "\n@define('PHPBB_INSTALLED', true);\n";
			$config_data .= "// @define('DEBUG', true);\n";
			$config_data .= "// @define('DEBUG_EXTRA', true);\n";
			$config_data .= '?' . '>'; // Done this to prevent highlighting editors getting confused!

			// Assume it will work ... if nothing goes wrong below
			$written = true;

			if (!($fp = @fopen(PHPBB_ROOT_PATH . 'config.' . PHP_EXT, 'w')))
			{
				// Something went wrong ... so let's try another method
				$written = false;
			}

			if (!(@fwrite($fp, $config_data)))
			{
				// Something went wrong ... so let's try another method
				$written = false;
			}

			@fclose($fp);

			if ($written)
			{
				// We may revert back to chmod() if we see problems with users not able to change their config.php file directly
				phpbb_chmod(PHPBB_ROOT_PATH . 'config.' . PHP_EXT, CHMOD_READ);
			}
			else
			{
				header('Content-type: text/html; charset=UTF-8');
				echo 'ERROR: Could not write config file.  Please copy the text below, put it in a file named config.php, and place it in the root directory of your forum.<br /><br />';
				echo nl2br(htmlspecialchars($config_data));
				exit;
			}
		}
		else
		{
			header('Content-type: text/html; charset=UTF-8');
			?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
		<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<meta http-equiv="content-style-type" content="text/css" />
			<meta http-equiv="imagetoolbar" content="no" />
			<title>Config Repair - Support Toolkit</title>
			<link href="<?php echo STK_ROOT_PATH; ?>style/style.css" rel="stylesheet" type="text/css" media="screen" />
			<link href="<?php echo STK_ROOT_PATH; ?>style/erk_style.css" rel="stylesheet" type="text/css" media="screen" />
		</head>
		<body id="errorpage">
			<div id="wrap">
				<div id="page-header">

				</div>
				<div id="page-body">
					<div id="acp">
						<div class="panel">
							<span class="corners-top"><span></span></span>
								<div id="content">
									<h1>Config Repair</h1>
									<br />
									<p>
										Through this tool you can regenerate your configuration file.
									</p>
									<form id="stk" method="post" action="<?php echo STK_ROOT_PATH . 'index.' . PHP_EXT; ?>" name="support_tool_kit">
										<fieldset>
											<?php if (!empty($error)) {?>
												<div class="errorbox">
													<h3>Error</h3>
													<p><?php echo implode('<br />', $error); ?></p>
												</div>
											<?php } ?>
											<dl>
												<dt><label for="dbms">Database type:</label></dt>
												<dd><select name="dbms">
													<?php foreach (get_available_dbms() as $dbms => $dbms_data) { ?>
														<option value="<?php echo $dbms; ?>" <?php if ($data['dbms'] == $dbms) { echo ' selected="selected"'; } ?>><?php echo $dbms_data['LABEL']; ?>
													<?php } ?>
												</select></dd>
											</dl>
											<dl>
												<dt><label for="dbhost">Database server hostname or DSN:</label><br /><span class="explain">DSN stands for Data Source Name and is relevant only for ODBC installs.</span></dt>
												<dd><input id="dbhost" type="text" value="<?php echo $data['dbhost']; ?>" name="dbhost" maxlength="100" size="25"/></dd>
											</dl>
											<dl>
												<dt><label for="dbport">Database server port:</label><br /><span class="explain">Leave this blank unless you know the server operates on a non-standard port.</span></dt>
												<dd><input id="dbport" type="text" value="<?php echo $data['dbport']; ?>" name="dbport" maxlength="100" size="25"/></dd>
											</dl>
											<dl>
												<dt><label for="dbname">Database name:</label></dt>
												<dd><input id="dbname" type="text" value="<?php echo $data['dbname']; ?>" name="dbname" maxlength="100" size="25"/></dd>
											</dl>
											<dl>
												<dt><label for="dbuser">Database username:</label></dt>
												<dd><input id="dbuser" type="text" value="<?php echo $data['dbuser']; ?>" name="dbuser" maxlength="100" size="25"/></dd>
											</dl>
											<dl>
												<dt><label for="dbpasswd">Database password:</label></dt>
												<dd><input id="dbpasswd" type="password" value="" name="dbpasswd" maxlength="100" size="25"/></dd>
											</dl>
											<dl>
												<dt><label for="table_prefix">Prefix for tables in database:</label></dt>
												<dd><input id="table_prefix" type="text" value="<?php echo $data['table_prefix']; ?>" name="table_prefix" maxlength="100" size="25"/></dd>
											</dl>
											<p class="submit-buttons">
												<input class="button1" type="submit" id="submit" name="submit" value="Submit" />&nbsp;
												<input class="button2" type="reset" id="reset" name="reset" value="Reset" />
											</p>
										</fieldset>
									</form>
								</div>
							<span class="corners-bottom"><span></span></span>
						</div>
					</div>
				</div>
				<div id="page-footer">
					Support Toolkit &copy; <a href="http://www.phpbb.com/">phpBB Group</a><br />
					Powered by <a href="http://www.phpbb.com/">phpBB</a>&reg; Forum Software &copy; phpBB Group
				</div>
			</div>
		</body>
	</html>
			<?php
			exit;
		}
	}
	/**
	* Used to test whether we are able to connect to the database the user has specified
	* and identify any problems (eg there are already tables with the names we want to use
	* @param	array	$dbms should be of the format of an element of the array returned by {@link get_available_dbms get_available_dbms()}
	*					necessary extensions should be loaded already
	*/
	function critical_connect_check_db($error_connect, &$error, $dbms_details, $table_prefix, $dbhost, $dbuser, $dbpasswd, $dbname, $dbport, $prefix_may_exist = false, $load_dbal = true, $unicode_check = true)
	{
		// Must be globalized here for when including the DB file
		global $phpbb_root_path, $phpEx;

		$dbms = $dbms_details['DRIVER'];

		if ($load_dbal)
		{
			// Include the DB layer
			include(PHPBB_ROOT_PATH . 'includes/db/' . $dbms . '.' . PHP_EXT);
		}

		// Instantiate it and set return on error true
		$sql_db = 'dbal_' . $dbms;
		$db = new $sql_db();
		$db->sql_return_on_error(true);

		// Check that we actually have a database name before going any further.....
		if ($dbms_details['DRIVER'] != 'sqlite' && $dbms_details['DRIVER'] != 'oracle' && $dbname === '')
		{
			$error[] = 'No database name specified.';
			return false;
		}

		// Check the prefix length to ensure that index names are not too long and does not contain invalid characters
		switch ($dbms_details['DRIVER'])
		{
			case 'mysql':
			case 'mysqli':
				if (strspn($table_prefix, '-./\\') !== 0)
				{
					$error[] = 'The table prefix you have specified is invalid for your database.';
					return false;
				}

			// no break;

			case 'postgres':
				$prefix_length = 36;
			break;

			case 'mssql':
			case 'mssqlnative':
			case 'mssql_odbc':
				$prefix_length = 90;
			break;

			case 'sqlite':
				$prefix_length = 200;
			break;

			case 'firebird':
			case 'oracle':
				$prefix_length = 6;
			break;
		}

		if (strlen($table_prefix) > $prefix_length)
		{
			$error[] = 'The table prefix you have specified is invalid for your database.';
			return false;
		}

		// Try and connect ...
		if (is_array($db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false, true)))
		{
			$db_error = $db->sql_error();
			$error[] = 'Could not connect to the database, see error message below.' . '<br />' . (($db_error['message']) ? $db_error['message'] : 'No error message given.');
		}
		else
		{
			// Make sure that the user has selected a sensible DBAL for the DBMS actually installed
			switch ($dbms_details['DRIVER'])
			{
				case 'mysqli':
					if (version_compare(mysqli_get_server_info($db->db_connect_id), '4.1.3', '<'))
					{
						$error[] = 'The version of MySQL installed on this machine is incompatible with the “MySQL with MySQLi Extension” option you have selected. Please try the “MySQL” option instead.';
					}
				break;

				case 'sqlite':
					if (version_compare(sqlite_libversion(), '2.8.2', '<'))
					{
						$error[] = 'The version of the SQLite extension you have installed is too old, it must be upgraded to at least 2.8.2.';
					}
				break;

				case 'firebird':
					// check the version of FB, use some hackery if we can't get access to the server info
					if ($db->service_handle !== false && function_exists('ibase_server_info'))
					{
						$val = @ibase_server_info($db->service_handle, IBASE_SVC_SERVER_VERSION);
						preg_match('#V([\d.]+)#', $val, $match);
						if ($match[1] < 2)
						{
							$error[] = 'The version of Firebird installed on this machine is older than 2.0, please upgrade to a newer version.';
						}
						$db_info = @ibase_db_info($db->service_handle, $dbname, IBASE_STS_HDR_PAGES);

						preg_match('/^\\s*Page size\\s*(\\d+)/m', $db_info, $regs);
						$page_size = intval($regs[1]);
						if ($page_size < 8192)
						{
							$error[] = 'The database you selected for Firebird has a page size less than 8192, it must be at least 8192.';
						}
					}
					else
					{
						$sql = "SELECT *
							FROM RDB$FUNCTIONS
							WHERE RDB$SYSTEM_FLAG IS NULL
								AND RDB$FUNCTION_NAME = 'CHAR_LENGTH'";
						$result = $db->sql_query($sql);
						$row = $db->sql_fetchrow($result);
						$db->sql_freeresult($result);

						// if its a UDF, its too old
						if ($row)
						{
							$error[] = 'The version of Firebird installed on this machine is older than 2.0, please upgrade to a newer version.';
						}
						else
						{
							$sql = "SELECT FIRST 0 char_length('')
								FROM RDB\$DATABASE";
							$result = $db->sql_query($sql);
							if (!$result) // This can only fail if char_length is not defined
							{
								$error[] = 'The version of Firebird installed on this machine is older than 2.0, please upgrade to a newer version.';
							}
							$db->sql_freeresult($result);
						}

						// Setup the stuff for our random table
						$char_array = array_merge(range('A', 'Z'), range('0', '9'));
						$char_len = mt_rand(7, 9);
						$char_array_len = sizeof($char_array) - 1;

						$final = '';

						for ($i = 0; $i < $char_len; $i++)
						{
							$final .= $char_array[mt_rand(0, $char_array_len)];
						}

						// Create some random table
						$sql = 'CREATE TABLE ' . $final . " (
							FIELD1 VARCHAR(255) CHARACTER SET UTF8 DEFAULT '' NOT NULL COLLATE UNICODE,
							FIELD2 INTEGER DEFAULT 0 NOT NULL);";
						$db->sql_query($sql);

						// Create an index that should fail if the page size is less than 8192
						$sql = 'CREATE INDEX ' . $final . ' ON ' . $final . '(FIELD1, FIELD2);';
						$db->sql_query($sql);

						if (ibase_errmsg() !== false)
						{
							$error[] = 'The database you selected for Firebird has a page size less than 8192, it must be at least 8192.';
						}
						else
						{
							// Kill the old table
							$db->sql_query('DROP TABLE ' . $final . ';');
						}
						unset($final);
					}
				break;

				case 'oracle':
					if ($unicode_check)
					{
						$sql = "SELECT *
							FROM NLS_DATABASE_PARAMETERS
							WHERE PARAMETER = 'NLS_RDBMS_VERSION'
								OR PARAMETER = 'NLS_CHARACTERSET'";
						$result = $db->sql_query($sql);

						while ($row = $db->sql_fetchrow($result))
						{
							$stats[$row['parameter']] = $row['value'];
						}
						$db->sql_freeresult($result);

						if (version_compare($stats['NLS_RDBMS_VERSION'], '9.2', '<') && $stats['NLS_CHARACTERSET'] !== 'UTF8')
						{
							$error[] = 'The version of Oracle installed on this machine requires you to set the <var>NLS_CHARACTERSET</var> parameter to <var>UTF8</var>. Either upgrade your installation to 9.2+ or change the parameter.';
						}
					}
				break;

				case 'postgres':
					if ($unicode_check)
					{
						$sql = "SHOW server_encoding;";
						$result = $db->sql_query($sql);
						$row = $db->sql_fetchrow($result);
						$db->sql_freeresult($result);

						if ($row['server_encoding'] !== 'UNICODE' && $row['server_encoding'] !== 'UTF8')
						{
							$error[] = 'The database you have selected was not created in <var>UNICODE</var> or <var>UTF8</var> encoding. Try installing with a database in <var>UNICODE</var> or <var>UTF8</var> encoding.';
						}
					}
				break;
			}

			$tables = get_tables($db);
			if (!in_array($table_prefix . 'acl_options', $tables) || !in_array($table_prefix . 'config', $tables) || !in_array($table_prefix . 'forums', $tables))
			{
				$error[] = 'phpBB3 tables could not be found on this database with this table prefix.';
			}
		}

		if ($error_connect && empty($error))
		{
			return true;
		}
		return false;
	}
}
