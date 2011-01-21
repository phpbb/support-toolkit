<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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

class mysql_upgrader
{
	/**
	 * The database cleaner object
	 * @var database_cleaner
	 */
	var $_db_cleaner = null;

	/**
	 * The build script
	 * @var string
	 */
	var $_upgrader = '';

	/**
	 * Do we have a datafile for this version?
	 */
	function tool_active()
	{
		// Only available for MySQL DBMS
		global $db;
		if (!in_array($db->sql_layer, array('mysql', 'mysql4', 'mysqli')))
		{
			return 'TOOL_MYSQL_ONLY';
		}

		// Load the database cleaner here, we piggy back on the database
		// cleaner for this tool
		if (!class_exists('database_cleaner'))
		{
			require STK_INDEX . 'tools/support/database_cleaner.' . PHP_EXT;
		}
		$this->_db_cleaner = new database_cleaner();

		// Is the database cleaner available?
		return $this->_db_cleaner->tool_active();
	}

	/**
	 * Display Options
	 */
	function display_options()
	{
		global $cache, $error;

		// The user requested to download the result?
		if (($download = request_var('download', false)) !== false)
		{
			$this->_download_result();
		}
		else if (($run = request_var('run', false)) !== false)
		{
			$this->_run_result();
		}

		$cache->destroy('_stk_mysql_upgrader_result');

		// Won't win a beauty contest, but it works
		$error[] = user_lang('MYSQL_UPGRADER_BACKUP');

		return array(
			'title'	=> 'MYSQL_UPGRADER',
			'vars'	=> array(
				'legend1'	=> 'MYSQL_UPGRADER',
				'download'	=> array('lang'  => 'MYSQL_UPGRADER_DOWNLOAD', 'type' => 'checkbox:mode', 'default' => true, 'explain' => 'true'),
				'run'		=> array('lang'  => 'MYSQL_UPGRADER_RUN', 'type' => 'checkbox:mode', 'explain' => 'true'),
			),
		);
	}

	/**
	 * Run Tool
	 */
	function run_tool()
	{
		global $cache, $db, $dbname, $table_prefix, $template, $umil;

		// Setup the database cleaner
		$this->_db_cleaner->_setup();

		// See what to do
		$mode	= request_var('mode', 'download');
		$run_result = ($mode == 'run') ? true : false;

		$sql = 'DESCRIBE ' . POSTS_TABLE . ' post_text';
		$result = $db->sql_query($sql);

		$row = $db->sql_fetchrow($result);

		$db->sql_freeresult($result);

		$mysql_indexer = $drop_index = false;

		if (strtolower($row['Type']) === 'mediumtext')
		{
			$mysql_indexer = true;
		}

		if (strtolower($row['Key']) === 'mul')
		{
			$drop_index = true;
		}

		foreach ($this->_db_cleaner->data->tables as $table_name => $table_data)
		{
			// Write comment about table
			if (!$run_result)
			{
				$this->_upgrader .= '# Table: ' . $table_name . PHP_EOL;
			}

			// Create Table statement
			$generator = $textimage = false;

			// Do we need to DROP a fulltext index before we alter the table?
			if ($table_name == ($table_prefix . 'posts') && $drop_index)
			{
				$this->_upgrader .= 'ALTER TABLE ' . $table_name . PHP_EOL;
				$this->_upgrader .= 'DROP INDEX post_text, ';
				$this->_upgrader .= 'DROP INDEX post_subject, ';
				$this->_upgrader .= 'DROP INDEX post_content;' . PHP_EOL . PHP_EOL;
			}

			$line = 'ALTER TABLE ' . $table_name . PHP_EOL;

			// Table specific so we don't get overlap
			$modded_array = array();

			// Write columns one by one...
			foreach ($table_data['COLUMNS'] as $column_name => $column_data)
			{
				// Get type
				if (strpos($column_data[0], ':') !== false)
				{
					list($orig_column_type, $column_length) = explode(':', $column_data[0]);
					$column_type = sprintf($umil->db_tools->dbms_type_map['mysql_41'][$orig_column_type . ':'], $column_length);

					if (isset($umil->db_tools->dbms_type_map['mysql_40'][$orig_column_type . ':']['limit'][0]))
					{
						switch ($umil->db_tools->dbms_type_map['mysql_40'][$orig_column_type . ':']['limit'][0])
						{
							case 'mult':
								if (($column_length * $umil->db_tools->dbms_type_map['mysql_40'][$orig_column_type . ':']['limit'][1]) > $umil->db_tools->dbms_type_map['mysql_40'][$orig_column_type . ':']['limit'][2])
								{
									$modded_array[$column_name] = $column_type;
								}
							break;
						}
					}

					$orig_column_type .= ':';
				}
				else
				{
					$orig_column_type = $column_data[0];
					$other_column_type = $umil->db_tools->dbms_type_map['mysql_40'][$column_data[0]];
					if ($other_column_type == 'text' || $other_column_type == 'blob')
					{
						$modded_array[$column_name] = $column_type;
					}
					$column_type = $umil->db_tools->dbms_type_map['mysql_41'][$column_data[0]];
				}

				// Adjust default value if db-dependant specified
				if (is_array($column_data[1]))
				{
					$column_data[1] = (isset($column_data[1][$dbms])) ? $column_data[1][$dbms] : $column_data[1]['default'];
				}

				$line .= "\tMODIFY {$column_name} {$column_type} ";

				// For hexadecimal values do not use single quotes
				if (!is_null($column_data[1]) && substr($column_type, -4) !== 'text' && substr($column_type, -4) !== 'blob')
				{
					$line .= (strpos($column_data[1], '0x') === 0) ? "DEFAULT {$column_data[1]} " : "DEFAULT '{$column_data[1]}' ";
				}
				$line .= 'NOT NULL';

				if (isset($column_data[2]))
				{
					if ($column_data[2] == 'auto_increment')
					{
						$line .= ' auto_increment';
					}
					else if ($column_data[2] == 'true_sort')
					{
						$line .= ' COLLATE utf8_unicode_ci';
					}
					else if ($column_data[2] == 'no_sort')
					{
						$line .= ' COLLATE utf8_bin';
					}
				}
				else if (preg_match('/(?:var)?char|(?:medium)?text/i', $column_type))
				{
					$line .= ' COLLATE utf8_bin';
				}

				$line .= ',' . PHP_EOL;
			}

			// Write Keys
			if (isset($table_data['KEYS']))
			{
				foreach ($table_data['KEYS'] as $key_name => $key_data)
				{
					$temp = '';
					if (!is_array($key_data[1]))
					{
						$key_data[1] = array($key_data[1]);
					}

					$temp .= ($key_data[0] == 'INDEX') ? "\tADD KEY" : '';
					$temp .= ($key_data[0] == 'UNIQUE') ? "\tADD UNIQUE" : '';
					$repair = false;
					foreach ($key_data[1] as $key => $col_name)
					{
						if (isset($modded_array[$col_name]))
						{
							$repair = true;
						}
					}
					if ($repair)
					{
						$line .= "\tDROP INDEX " . $key_name . ',' . PHP_EOL;
						$line .= $temp;
						$line .= ' ' . $key_name . ' (' . implode(', ', $key_data[1]) . '),' . PHP_EOL;
					}
				}
			}

			//$line .= "\tCONVERT TO CHARACTER SET `utf8`$newline";
			$line .= "\tDEFAULT CHARSET=utf8 COLLATE=utf8_bin;" . PHP_EOL . PHP_EOL;

			$this->_upgrader .= $line . PHP_EOL;

			// Do we now need to re-add the fulltext index? ;)
			if ($table_name == ($table_prefix . 'posts') && $drop_index)
			{
				$this->_upgrader .= 'ALTER TABLE ' . $table_name . ' ADD FULLTEXT (post_subject), ADD FULLTEXT (post_text), ADD FULLTEXT post_content (post_subject, post_text)' . PHP_EOL;
			}
		}

		// Write the result also to the cache so it can be downloaded later on
		$cache->put('_stk_mysql_upgrader_result', $this->_upgrader);
		
		// If the user only checked "run" than we run the result set
		if ($run_result)
		{
			redirect(append_sid(STK_INDEX, array('c' => 'support', 't' => 'mysql_upgrader', 'run' => true)));
		}

		// Set the template var
		$template->assign_vars(array(
			'L_MYSQL_UPGRADER_RESULT' => user_lang('MYSQL_UPGRADER_RESULT', append_sid(STK_INDEX, array('c' => 'support', 't' => 'mysql_upgrader', 'download' => true))),
			'UPGRADER' => str_replace("\t", "&nbsp;&nbsp;&nbsp;", nl2br($this->_upgrader)),
		));

		// Output the result to the template
		page_header(user_lang('MYSQL_UPGRADER'));

		$template->set_filenames(array(
			'body' => 'tools/mysql_upgrader.html',
		));

		page_footer();
	}

	/**
	 * Download the MySQL Upgrader script
	 * @access private
	 * @return void
	 */
	function _download_result()
	{
		global $cache;

		// Read from the cache
		$result = $cache->get('_stk_mysql_upgrader_result');
		if ($result === false)
		{
			return;
		}

		// Write the file
		header('Content-Type: text/x-delimtext; name="mysql_upgrader.sql"');
		header('Content-disposition: attachment; filename=mysql_upgrader.sql');
		print($result);

		// Exit
		garbage_collection();
		exit_handler();
	}

	/**
	 * Directly run the script
	 * @access private
	 * @return void
	 */	
	function _run_result()
	{
		global $cache, $umil;
		
		// Read from teh cache
		$this->_upgrader = $cache->get('_stk_mysql_upgrader_result');
		if ($this->_upgrader === false)
		{
			return;
		}

		// Split up in seperate queries
		$queries = explode(';', $this->_upgrader);

		// The right query
		$step = request_var('step', 0);
		if (!empty($queries[$step]))
		{
			$query = trim($queries[$step]);
			$umil->db_tools->db->sql_query($query);
			meta_refresh(0, append_sid(STK_INDEX, array('c' => 'support', 't' => 'mysql_upgrader', 'run' => true, 'step' => ++$step)));
			trigger_error(user_lang('QUERY_FINISHED', $step, sizeof($queries)));
		}

		trigger_error('MYSQL_UPGRADER_SUCCESSFULL');
	}
}
