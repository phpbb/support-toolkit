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
		return 'MYSQL_UPGRADER';
	}

	/**
	 * Run Tool
	 */
	function run_tool()
	{
		// Setup the database cleaner
		$this->_db_cleaner->_setup();
	}
}
?>