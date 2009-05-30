<?php
/**
*
* @package Support Tool Kit - Anonymous group check
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class anonymous_group_check
{
	/**
	 * Keep track of the groups.
	 */
	var $_in_guests_group	= FALSE;
	var $_in_other_groups	= FALSE;

	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $user;

		$groups = $this->_get_anon_groups();

		foreach ($groups as $group)
		{
			// The guests group
			if ($group['group_name'] == 'GUESTS')
			{
				$this->_in_guests_group = true;
				continue;
			}

			// Other groups
			$this->_in_other_groups = true;
		}

		// Display the correct page
		if ($this->_in_guests_group == true && $this->_in_other_groups == false)
		{
			trigger_error($user->lang['GROUPS_CORRECT']);
		}

		return 'GROUPS_INCORRECT';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool()
	{
		// Fetch the groups
		$groups = $this->_get_anon_groups();

		if (!function_exists('group_user_del'))
		{
			include (PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
		}

		// Walk through the groups
		foreach ($groups as $group)
		{
			if ($group['group_name'] != 'GUESTS')
			{
				group_user_del($group['group_id'], array(ANONYMOUS));
			}
			else
			{
				$this->_in_guests_group = true;
			}
		}

		// No GUESTS group?
		if (!$this->_in_guests_group)
		{
			// Get the GUESTS group id
			global $db;

			$sql = 'SELECT group_id
				FROM ' . GROUPS_TABLE . "
				WHERE group_name = 'GUESTS'";
			$result	= $db->sql_query($sql);
			$grd	= $db->sql_fetchfield('group_id', false, $result);
			$db->sql_freeresult($result);

			group_user_add($grd, array(ANONYMOUS), false, false, true);
		}

		trigger_error('GROUPS_SUCESSFULLY_RESET');
	}

	/**
	 * Get all the groups the anonymous user is in
	 */
	function _get_anon_groups()
	{
		global $db;

		$groups = array();

		// First grep the group_id of the GUESTS group
		$sql = 'SELECT g.group_name, g.group_id
			FROM (' . GROUPS_TABLE . ' g, ' . USER_GROUP_TABLE . ' ug)
			WHERE ug.group_id = g.group_id
				AND ug.user_id = ' . ANONYMOUS;
		$result	= $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$groups[] = $row;
		}
		$db->sql_freeresult($result);

		return $groups;
	}
}
?>