<?php
/**
*
* @package Support Toolkit - Change Password
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

class resync_newly_registered
{
	/**
	* Batch size of the ammount of users we move around per run
	*/
	var $batch_size = 500;

	/**
	* Variable defining whether we are looking for users with more
	* or les posts than $config['new_member_post_limit'].
	* 0 => more		(Remove from NEWLY group)
	* 1 => less		(Add to NEWLY group)
	*/
	//var $ml = 0;

	/**
	* Array used to link steps to groups
	*/
	var $groups	= array(
		0	=> 'REGISTERED',
		1	=> 'REGISTERED_COPPA',
		2	=> 'NEWLY_REGISTERED',
	);

	/**
	* Array that is used to build the user select queries
	*/
	var $sql_user_ary = array();

	/**
	* Return message
	*/
	var $return_msg = 'RESYNC_COMPLETE';

	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return 'RESYNC_NEWLY_REGISTERED';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool()
	{
		global $config, $user;

		$user->add_lang('acp/groups');

		// Get global variables
		$last = request_var('last', 0); // The user_id of the last user in this batch
		$step = request_var('step', 0);	// Step 0 is syncing the REGISTERED, 1 is REGISTERED_COPPA and 2 is NEWLY_REGISTERED

		// Get the user ids
		$nr_gid		= 0;
		$group_name	= $this->groups[$step];
		$users		= $this->_get_user_batch($group_name, $last, $nr_gid);

		// Finished this step go to the next
		if (empty($users))
		{
			// There is a next step?
			if ($step == 2)
			{
				trigger_error('RESYNC_NEWLY_REGISTERED_FINISHED');
			}
			else
			{
				meta_refresh(3, append_sid(STK_ROOT_PATH, array('c' => 'user_group', 't' => 'resync_newly_registered', 'step' => ++$step, 'submit' => 1)));
				trigger_error('RESYNC_NEWLY_REGISTERED_NOT_FINISHED');
			}
		}

		// Prepare the correct function call
		$function	= '';
		$args		= array();
		switch ($group_name)
		{
			// Users with not enough posts
			case 'REGISTERED'		:
			case 'REGISTERED_COPPA'	:
				$function	= 'group_user_add';
				$args		= array(
					$nr_gid,
					$users,
					false,
					false,
					$config['new_member_group_default'],
				);
			break;

			case 'NEWLY_REGISTERED'	:
				$function	= 'group_user_del';
				$args		= array(
					$nr_gid,
					$users,
				);
			break;
		}

		// Call the function
		if (!function_exists('group_user_add'))
		{
			include(PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
		}

		if (($error = call_user_func_array($function, $args)) !== false)
		{
			trigger_error($error);
		}

		// Next batch
		meta_refresh(3, append_sid(STK_ROOT_PATH, array('c' => 'user_group', 't' => 'resync_newly_registered', 'step' => $step, 'last' => array_pop($users), 'submit' => 1)));
		trigger_error('RESYNC_NEWLY_REGISTERED_NOT_FINISHED');
	}

	/**
	* Get the next batch of users.
	*
	* @param	$group_name	The name of the group of which the users are fetched
	* @param	$last		The id of the last user in the previous batch
	* @param	$group_id	Variable that will be filled with the group_id of the NEWLY_REGISTERED users group
	*/
	function _get_user_batch($group_name, $last, &$nr_gid)
	{
		global $config, $db;

		$users = array();

		// Grep the group id of this user group
//		$sql = 'SELECT group_id
//			FROM ' . GROUPS_TABLE . "
//			WHERE group_name = '" . $group_name . "'";
//		$result		= $db->sql_query_limit($sql, 1);
//		$group_id	= $db->sql_fetchfield('group_id', false, $result);
//		$db->sql_freeresult($result);

		// Get the group_id of the NEWLY_REGISTERED users group
		$sql = 'SELECT group_id
			FROM ' . GROUPS_TABLE . "
			WHERE group_name = 'NEWLY_REGISTERED'";
		$result	= $db->sql_query_limit($sql, 1, 0, 3600);
		$nr_gid	= $db->sql_fetchfield('group_id', false, $result);
		$db->sql_freeresult($result);

		// Set some group dependant sql stuff
		$sql_token = '';
		switch ($group_name)
		{
			// Users with not enough posts
			case 'REGISTERED'		:
			case 'REGISTERED_COPPA'	:
				$sql_token = '<';
			break;

			case 'NEWLY_REGISTERED'	:
				$sql_token = '>=';
			break;
		}
		$sql_where = "u.user_posts {$sql_token} " . (int) $config['new_member_post_limit'];

		$sql_ary = array(
			'SELECT'	=> 'u.user_id',
			'FROM'		=> array(
				USERS_TABLE			=> 'u',
				USER_GROUP_TABLE	=> 'ug',
			),
			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(
						GROUPS_TABLE => 'g',
					),
					'ON'	=> "g.group_name = '" . $group_name . "'",
				),
			),
			//'WHERE'		=> "ug.group_id = g.group_id AND (u.user_id = ug.user_id AND {$sql_where})",
			'WHERE'			=> "ug.group_id = g.group_id AND ug.user_id > {$last} AND (u.user_id = ug.user_id AND {$sql_where})",
		);
		$sql	= $db->sql_build_query('SELECT', $sql_ary);
		$result	= $db->sql_query_limit($sql, $this->batch_size, 0);
		while ($row = $db->sql_fetchrow($result))
		{
			$users[] = $row['user_id'];
		}
		$db->sql_freeresult($result);

		return $users;
	}



/*
		// Build the query to fetch the user ids
		$this->sql_user_ary = array(
			'SELECT'	=> 'u.user_id',
			'FROM'		=> array(
				USERS_TABLE	=> 'u',
			),
		);

		switch ($this->ml)
		{
			case 0 :
				// User should be in the group AND have more posts than the config value
				$this->sql_user_ary['LEFT_JOIN'][] = array(
					'FROM'	=> array(
						USER_GROUP_TABLE	=> 'ug',
					),
					'ON'	=> 'ug.group_id = ' . $gid,
				);

				$this->sql_user_ary['WHERE'] = '(u.user_id = ug.user_id AND u.user_posts >= ' . (int) $config['new_member_post_limit'] . ')';
			break;

			case 1 :
				// Users shouldn't be in the group AND have less posts than the config value
				$this->sql_user_ary['LEFT_JOIN'][] = array(
					'FROM'	=> array(
						USER_GROUP_TABLE	=> 'ug',
					),
					'ON'	=> 'ug.group_id = ' . $gid,
				);

				$this->sql_user_ary['WHERE'] = '(u.user_id = ug.user_id AND u.user_posts >= ' . (int) $config['new_member_post_limit'] . ')';
			break;
		}

		// Build and execute the query, than get all the user_ids
		$users	= array();
		$sql	= $db->sql_build_query('SELECT', $this->sql_user_ary);
		$result	= $db->sql_query_limit($sql, $this->limit, 0);
		while ($row = $db->sql_fetchrow($result))
		{
			$users[] = $row['user_id'];
		}
		$db->sql_freeresult($result);

		// Loop through the found users and set the group accordingly
		if (!function_exists('user_add'))
		{
			include(PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
		}

		// Add/remove them if the array isn't empty
		if (!empty($users))
		{
			switch ($this->ml)
			{
				case 0 :
					if (($error = group_user_del($gid, $users)) !== false)
					{
						trigger_error($error);
					}
				break;

				case 1 :
					if (($error = group_user_add($gid, $users, false, false, (bool) $config['new_member_group_default'])) !== false)
					{
						trigger_error($error);
					}
				break;
			}

			// Do next batch
			meta_refresh(0, append_sid(STK_INDEX, array('c' => 'user_group', 't' => 'resync_newly_registered', 'ml' => $this->ml, 'submit' => '1')));
			$this->return_msg = 'RESYNC_NOT_COMPLETE';
		}
		else
		{
			// If ml == 0 switch it to 1 and reset the step
			if ($this->ml == 0)
			{
				meta_refresh(0, append_sid(STK_INDEX, array('c' => 'user_group', 't' => 'resync_newly_registered', 'ml' => '1', 'submit' => '1')));
				$this->return_msg = 'RESYNC_NOT_COMPLETE';
			}
		}

		trigger_error($this->return_msg);






		// Join to the GROUPS table to get the group id of the NEWLY_REGISTERED group









		/*
		// Grep variable
		$ml		= request_var('ml', 0);
		$mode	= request_var('mode', 'add');
		$step	= request_var('step', 1);

		// The basic query we use for selecting a buch of users
		$sql_ary = array(
			'SELECT'	=> 'u.user_id',
			'FROM'		=> array(
				USERS_TABLE			=> 'u',
			),
			'WHERE'		=> '',
		);

		// Set mode dependant SQL stuff
		switch ($mode)
		{
			// Users need to be removed from the NEWLY_REGISERED USERS group
			case 'remove' :
				$sql_ary['LEFT_JOIN'] = array(
					array(
						'FROM'	=> array(
							GROUPS_TABLE	=> 'g',
						),
						'ON'	=> "g.group_name = 'NEWLY_REGISTERED'",
					),
					array(
						'FROM'	=> array(
							USER_GROUP_TABLE	=> 'ug',
						),
						'ON'	=> 'ug.group_id = g.group_id',
					)
				);
			break;

			// Users need to be added to the NEWLY_REGISERED USERS group
			case 'add' :
				$sql_ary['LEFT_JOIN'] = array(
					array(
						'FROM'	=> array(
							GROUPS_TABLE	=> 'g',
						),
						'ON'	=> "g.group_name = 'NEWLY_REGISTERED'",
					),
					array(
						'FROM'	=> array(
							USER_GROUP_TABLE	=> 'ug',
						),
						'ON'	=> 'ug.group_id = g.group_id',
					)
				);
			break;
		}

		// Set the correct WHERE clause
		switch ($ml)
		{
			// Users with more than $config['new_member_post_limit'] posts
			case 0 :
				$sql_ary['WHERE']	= "(u.user_id = ug.user_id AND u.user_posts >= {$config['new_member_post_limit']})";
			break;

			// Users with less than $config['new_member_post_limit'] posts
			case 1 :
				$sql_ary['WHERE']	= "(u.user_id = ug.user_id AND u.user_posts <= {$config['new_member_post_limit']})";
			break;
		}

		$sql	= $db->sql_build_query('SELECT', $sql_ary);
		$result	= $db->sql_query_limit($sql, $this->limit, 0);
		$users	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		echo'<pre>';print_r($users);exit;

	}
		*/
}

?>