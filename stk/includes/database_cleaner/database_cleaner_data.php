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
	var $config = array();

	/**
	* @var Array Config entries that were removed by this version
	*/
	var $removed_config = array();

	/**
	* @var Array The permissions array for this version
	*/
	var $acl_options = array();

	/**
	* @var Array The roles array for this version
	*/
	var $acl_roles = array();

	/**
	* @var Array The role data array for this version
	* This array contains the data needed to build the queries as
	* found in `schemas/schema_data.sql`
	*/
	var $acl_role_data = array();

	/**
	* @var Array All default extension groups
	*/
	var $extension_groups = array();

	/**
	* @var Array All default extensions
	*/
	var $extensions = array();

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
	* @var Array An array containing all report reasons
	*/
	var $report_reasons = array();

	/**
	* Some data needs to be adjusted in certain cases
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

		// Since phpBB 3.0.8 the module extensions are translatable,
		// for earlier versions we'll have to figure out which language
		// was used while installing and hope that this language is still
		// available
		if (version_compare(PHPBB_VERSION, '3.0.8', '<'))
		{
			global $db, $user;

			$sql = 'SELECT group_name
				FROM ' . EXTENSION_GROUPS_TABLE;
			$result	= $db->sql_query_limit($sql, 1, 0);
			$test	= $db->sql_fetchfield('group_name', false, $result);
			$db->sql_freeresult($result);

			$ext_group_trans = array();

			// Be nice and be the users language ^^
			$user->add_lang('install');
			if (in_array($test, $user->lang))
			{
				$ext_group_trans = $user->lang;
			}
			else
			{
				// Loop through all available language packs
				$d = dir(PHPBB_ROOT_PATH . 'language/');
				while (false !== ($entry = $d->read()))
				{
					if (strpos($entry, '.') !== false)
					{
						continue;
					}
					
					include (PHPBB_ROOT_PATH . "language/{$entry}/install." . PHP_EXT);

					if (in_array($test, $lang))
					{
						$ext_group_trans = $lang;
						break;
					}
					$lang = array();
				}
			}

			// Now translate it
			foreach ($this->extension_groups as $name => $data)
			{
				$this->extension_groups[$ext_group_trans[$name]] = $data;
				unset($this->extension_groups[$name]);
			}

			// And the extensions have the same issue :/
			foreach ($this->extensions as $name => $data)
			{
				$this->extensions[$ext_group_trans[$name]] = $data;
				unset($this->extensions[$name]);
			}
		}
	}
}