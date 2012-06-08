<?php
/**
*
* @package Support Toolkit - Fix Left/Right ID's
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

class fix_left_right_ids
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return 'FIX_LEFT_RIGHT_IDS';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool()
	{
		global $cache, $db;

		$changes_made = false;

		/**
		* Fix Left/Right ID's for the modules table
		*/
		// We need to do each module class separately, so we need to get a list of each class available.
		$result = $db->sql_query('SELECT DISTINCT(module_class) FROM ' . MODULES_TABLE);
		while ($row = $db->sql_fetchrow($result))
		{
			// Now start fixing the modules for this class
			$i = 1;
			$where = array('module_class = \'' . $row['module_class'] .'\'');
			$changes_made = (($this->fixem($i, 'module_id', MODULES_TABLE, 0, $where)) || $changes_made) ? true : false;
		}
		$db->sql_freeresult($result);

		/**
		* Fix the Left/Right ID's for the forums table
		*/
		$i = 1;
		$changes_made = (($this->fixem($i, 'forum_id', FORUMS_TABLE)) || $changes_made) ? true : false;

		// Purge the cache so the next time a page with modules is viewed it is not getting an old version from the cache
		$cache->purge();

		if ($changes_made)
		{
			trigger_error('LEFT_RIGHT_IDS_FIX_SUCCESS');
		}
		else
		{
			trigger_error('LEFT_RIGHT_IDS_NO_CHANGE');
		}
	}

	// I <3 recursion.
	function fixem(&$i, $pkey, $table, $parent_id = 0, $where = array())
	{
		global $db;

		$changes_made = false;

		$sql = 'SELECT * FROM ' . $table . '
			WHERE parent_id = ' . (int) $parent_id .
			((!empty($where)) ? ' AND ' . implode(' AND ', $where) : '') . '
			ORDER BY left_id ASC';
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			// First we update the left_id for this module
			if ($row['left_id'] != $i)
			{
				$db->sql_query('UPDATE ' . $table . ' SET ' . $db->sql_build_array('UPDATE', array('left_id' => $i)) . " WHERE $pkey = {$row[$pkey]}");
				$changes_made = true;
			}
			$i++;

			// Then we go through any children and update their left/right id's
			$changes_made = (($this->fixem($i, $pkey, $table, $row[$pkey], $where)) || $changes_made) ? true : false;

			// Then we come back and update the right_id for this module
			if ($row['right_id'] != $i)
			{
				$db->sql_query('UPDATE ' . $table . ' SET ' . $db->sql_build_array('UPDATE', array('right_id' => $i)) . " WHERE $pkey = {$row[$pkey]}");
				$changes_made = true;
			}
			$i++;
		}
		$db->sql_freeresult($result);

		return $changes_made;
	}
}
