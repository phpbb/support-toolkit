<?php
/**
*
* @package Support Tool Kit - Merge Groups
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class merge_groups
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
			'NAME'			=> $user->lang['MERGE_GROUPS'],	// The name of this tool that will be shown to the user
			'NAME_EXPLAIN'	=> $user->lang['MERGE_GROUPS_EXPLAIN'],

			'CATEGORY'		=> $user->lang['USER_GROUP_TOOLS'],	// The category this tool should be shown in
		);
	}

	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return  array(
			'title'	=> 'MERGE_GROUPS',
			'vars'	=> array(
				'legend1'				=> 'MERGE_GROUPS',
				'groups_to_merge'		=> array('lang' => 'GROUPS_TO_MERGE', 'type' => 'select', 'function' => 'groups_select_options', 'params' => array('{CONFIG_VALUE}'), 'multiple' => true, 'explain' => true),
				'groups_merge_target'	=> array('lang' => 'GROUPS_MERGE_TO', 'type' => 'text:40:255', 'explain' => true),
				'groups_remove'			=> array('lang' => 'GROUPS_REMOVE', 'type' => 'checkbox', 'explain' => true),
		));
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		global $stk_root_path, $db, $user;
		global $phpbb_root_path, $phpEx;

        if (!check_form_key('merge_groups'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		// Some vars
		$groups			= request_var('groups_to_merge', array(0, 0));
		$target_group	= utf8_normalize_nfc(request_var('groups_merge_target', '', true));
		$groups_remove	= (isset($_POST['groups_remove']) ? true : false);

		// Check vars
		if (!$groups || sizeof($groups) == 1)
		{
			$error[] = 'NO_MERGE_GROUP';
		}
		if ($target_group == '')
		{
			$error[] = 'NO_TARGET_GROUP';
		}

		if (sizeof($error))
		{
			return false;
		}

		// Include nececeiry files
		if (!function_exists('group_user_add'))
		{
			include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
		}

		// First select all the users in these groups
		$users = array();
		$sql = 'SELECT user_id, group_leader, user_pending
				FROM ' . USER_GROUP_TABLE . '
					WHERE ' . $db->sql_in_set('group_id', $groups) . '
					ORDER BY group_leader DESC, user_pending DESC';
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if (!isset($users[$row['user_id']]))
			{
				$users[$row['user_id']] = $row;
			}
		}
		$db->sql_freeresult($result);

		// Are we working with an existing group?
		$sql = 'SELECT group_id
				FROM ' . GROUPS_TABLE . '
					WHERE group_name = \'' . $db->sql_escape($target_group) . "'";
		$result		= $db->sql_query_limit($sql, 1, 0);
		$group_id	= $db->sql_fetchfield('group_id', false, $result);
		$db->sql_freeresult($result);

		// If the group doesn't exist, create it
		if (!$group_id)
		{
			$group_id = $this->create_group($target_group);
		}

		// Now assign the users to the group
		foreach ($users as $user_id => $data)
		{
			if ($err_msg = group_user_add($group_id, $user_id, false, false, true, $data['group_leader'], $data['user_pending']))
			{
				$error[] = $err_msg;
				break;
			}
		}

		// Do we have to remove the old groups?
		if ($groups_remove && !sizeof($error))
		{
			foreach ($groups as $group_id)
			{
				if ($err_msg = group_delete($group_id))
				{
					$error[] = $err_msg;
					break;
				}
			}
		}

		// Notify the user we're done here
		if (sizeof($error))
		{
			return false;
		}
		else
		{
			trigger_error($user->lang['GROUPS_MERGE_SUCCESS']);
		}
	}

	/**
	* Create a new group, the new group is default hidden (GROUP_HIDDEN)
	*
	* @param	$group_name		the name of the new group
	* @return	$group_id		the id of the new group
	*/
	function create_group($group_name)
	{
		// Set the default data
		$group_id		= 0;
		$group_data_ary = array(
			'colour'			=>'',
			'rank'				=> 0,
			'receive_pm'		=> 1,
			'legend'			=> 0,
			'message_limit'		=> 0,
			'founder_manage'	=> 0,
		);

		group_create($group_id, GROUP_HIDDEN, $group_name, '', $group_data_ary);

		return $group_id;
	}
}

/**
* Get groups
*
* Get all the groups that are availible on this board, and generate the options for the select field
*/
function groups_select_options()
{
	global $db, $user;

	$return = '';

	$sql = 'SELECT group_id, group_type, group_name
			FROM ' . GROUPS_TABLE . '
				ORDER BY group_id ASC';
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result))
	{
		$return .= '<option value="' . $row['group_id'] . '">' . (($row['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name']) . '</option>';
	}
	$db->sql_freeresult($result);

	return $return;
}
?>
