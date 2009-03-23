<?php
/**
*
* @package Support Tool Kit - Fix Module Left/Right ID's
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class fix_modules
{
	/**
	* Tool Info
	*
	* @return Returns an array with the info about this tool.
	*/
	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['FIX_MODULES'],
			'NAME_EXPLAIN'	=> $user->lang['FIX_MODULES_EXPLAIN'],

			'CATEGORY'		=> $user->lang['ADMIN_TOOLS'],
		);
	}

	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return 'FIX_MODULES';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool()
	{
		global $cache, $db, $phpbb_root_path, $phpEx;

		// We need to do each module class separately, so we need to get a list of each class available.
		$result = $db->sql_query('SELECT DISTINCT(module_class) FROM ' . MODULES_TABLE);
		while ($row = $db->sql_fetchrow($result))
		{
			// Now start fixing the modules for this class
			$id = 1;
			$this->fixem($id, $row['module_class']);
		}
		$db->sql_freeresult($result);

		// Purge the cache so the next time a page with modules is viewed it is not getting an old version from the cache
		$cache->purge();

		trigger_error('MODULE_FIX_SUCCESS');
	}

	// I <3 recursion.
	function fixem(&$id, $class, $parent_id = 0)
	{
		global $db;

		$sql = 'SELECT * FROM ' . MODULES_TABLE . ' WHERE module_class = \'' . $db->sql_escape($class) . '\' AND parent_id = ' . intval($parent_id) . ' ORDER BY left_id ASC';
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			// First we update the left_id for this module
			if ($row['left_id'] != $id)
			{
				$db->sql_query('UPDATE ' . MODULES_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array('left_id' => $id)) . ' WHERE module_id = ' . $row['module_id']);
			}
			$id++;

			// Then we go through any children and update their left/right id's
			$this->fixem($id, $class, $row['module_id']);

			// Then we come back and update the right_id for this module
			if ($row['right_id'] != $id)
			{
				$db->sql_query('UPDATE ' . MODULES_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array('right_id' => $id)) . ' WHERE module_id = ' . $row['module_id']);
			}
			$id++;
		}
		$db->sql_freeresult($result);
	}
}

?>