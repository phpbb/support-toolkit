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
	* @var Array The bots
	*/
	var $bots = array();

	/**
	* @var Array The config array for this version
	*/
	var $config_data = array();

	/**
	* @var Array The permissions array for this version
	*/
	var $permissions = array();

	/**
	 * @var Array array holding the module categorie structure
	 */
	var $module_categories = array();

	/**
	 * @var Array Module extra data
	 */
	var $module_extras = array();

	/**
	* @var Array The groups array for this version
	*/
	var $groups = array();

	/**
	* @var Array The schema struct
	*/
	var $schema_data = array();

	/**
	* @var Array An array containing all tables that are included in a vanilla phpBB install of this version
	*/
	var $tables = array();

	/**
	* Setup extract some information that is needed later
	*/
	function init()
	{
		// Extract tables
		global $table_prefix;

		$this->tables = $this->schema_data;

		// Get the right table prefix!
		if ($table_prefix != 'phpbb_')
		{
			foreach ($this->tables as $table_name => $table_data)
			{
				$this->tables[str_replace('phpbb_', $table_prefix, str_replace($table_prefix, 'phpbb_', $table_name))] = $table_data;

				unset($this->tables[$table_name]);
			}
		}
	}
}