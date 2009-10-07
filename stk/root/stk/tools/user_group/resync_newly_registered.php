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
	* Array used to link steps to groups
	*/
	var $groups	= array(
		0	=> 'REGISTERED',
		1	=> 'REGISTERED_COPPA',
		2	=> 'NEWLY_REGISTERED',
	);

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
}

?>