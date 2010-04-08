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
* Data class containing all data for the cleaner
*/
class database_cleaner_data
{
	/**
	* @var Array The config array for this version
	*/
	var $config_data = array();

	/**
	* @var Array The schema struct
	*/
	var $schema_data = array();

	/**
	* Only get the phpBB tables
	*/
	function get_tables()
	{
		global $table_prefix;

		$tables = $this->schema_data;

		// Get the right table prefix!
		if ($table_prefix != 'phpbb_')
		{
			foreach ($tables as $table_name => $table_data)
			{
				$tables[str_replace('phpbb_', $table_prefix, str_replace($table_prefix, 'phpbb_', $table_name))] = $table_data;

				unset($tables[$table_name]);
			}
		}

		return $tables;
	}
}