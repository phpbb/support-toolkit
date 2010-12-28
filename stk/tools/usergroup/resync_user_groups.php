<?php
/**
 *
 * @package Support Toolkit - Resynchronise Users groups
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

class resync_user_groups
{
	/**
	 * Batch size of the ammount of users we move around per run
	 * @var Integer
	 */
	var $batch_size = 500;

	/**
	 * The `resync_registered` object
	 * @var resync_registered
	 */
	var $rr = null;

	/**
	 * The `resync_newly_registered` object
	 * @var resync_newly_registered
	 */
	var $rnr = null;

	/**
	 * Keep track of the `rr` and `rnr` statuses
	 * for redirect
	 * @var Boolean
	 */
	var $run_rr		= false;
	var $run_rnr	= false;

	/**
	 * Display Options
	 *
	 * @return void
	 */
	function display_options()
	{
		// Set the runners
		$this->rr	= new resync_registered($this);
		$this->rnr	= new resync_newly_registered($this);

		// Set the options
		$vars = array();
		if ($this->rr->can_run() === true)
		{
			$vars['rr'] = array('lang' => 'RUN_RR', 'type' => 'checkbox', 'explain' => true);
		}

		if ($this->rnr->can_run() === true)
		{
			$vars['rnr'] = array('lang' => 'RUN_RNR', 'type' => 'checkbox', 'explain' => true);
		}

		// No need to do a thing
		if (empty($vars))
		{
			trigger_error('RESYNC_USER_GROUPS_NO_RUN');
		}

		// Finish the options array and return it
		$options 			= array();
		$options['title']	= 'RESYNC_USER_GROUPS';
		$options['vars']	= array_merge(array(
			'legend1'	=> 'RESYNC_USER_GROUPS_SETTINGS',
		), $vars);

		return $options;
	}

	/**
	 * Run the required resync actions
	 */
	function run_tool(&$error)
	{
		$this->run_rr	= request_var('rr', false);
		$this->run_rnr	= request_var('rnr', false);

		// Done nothing
		if (!$this->run_rr && !$this->run_rnr)
		{
			trigger_error('SELECT_RUN_GROUP');
		}

		// Run the required sections
		if ($this->run_rr)
		{
			$this->rr = new resync_registered($this);
			$this->rr->resync();
		}

		if ($this->run_rnr)
		{
			$this->rnr = new resync_newly_registered($this);
			$this->rnr->resync();
		}

		// Done trigger the correct notice
		if ($this->run_rr && $this->run_rnr)
		{
			trigger_error('RUN_BOTH_FINISHED');
		}

		// only one
		$msg = ($this->run_rr) ? 'RUN_RR_FINISHED' : 'RUN_RNR_FINISHED';
		trigger_error($msg);
	}
}

/**
 * The class that handles the resync of the registered users
 * group
 */
class resync_registered
{
	/**
	 * The `resync_user_groups` object
	 * @var resync_user_groups
	 */
	var $parent = null;

	/**
	 * Constructor
	 */
	function resync_registered($main_object)
	{
		$this->parent = $main_object;
	}

	/**
	 * Make sure that this process can/must be run
	 */
	function can_run()
	{
		return $this->_fetch_users(true);
	}

	/**
	 * Resync this group
	 */
	function resync()
	{
		global $config, $db;

		// Get the needed data
		$batch = $this->_fetch_users();
		$g = $this->_get_group_ids();

		// The board doesn't bother about COPPA
		if (!$config['coppa_enable'])
		{
			foreach ($batch as $row)
			{
				$insert_reg[] = array(
					'group_id'		=> $g['REGISTERED'],
					'user_id'		=> $row['user_id'],
					'group_leader'	=> false,
					'user_pending'	=> false,
				);
			}
		}
		else
		{
			foreach ($batch as $row)
			{
				$insert = $this->_get_new_group($row['user_birthday']);

				array_push($$insert, array(
					'group_id'		=> (int) ($insert == 'insert_coppa') ? $g['REGISTERED_COPPA'] : $g['REGISTERED'],
					'user_id'		=> (int) $row['user_id'],
					'group_leader'	=> false,
					'user_pending'	=> false,
				));
			}
		}

		$db->sql_multi_insert(USER_GROUP_TABLE, $insert_coppa);
		$db->sql_multi_insert(USER_GROUP_TABLE, $insert_reg);
	}

	/**
	 * Grep the users that aren't in the groups
	 * @param  Boolean $missing If true this function will return whether there are users 
	 *                          missing
	 */
	function _fetch_users($missing = false)
	{
		global $db;

		if (!function_exists('group_memberships'))
		{
			require PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT;
		}

		// Get teh group IDs
		$g = $this->_get_group_ids();

		// Now figure out whether there are users that aren't part in any of these
		$batch	= $users	= array();
		$data	= group_memberships($g);
		if (!empty($data))
		{
			foreach ($data as $user)
			{
				$users[] = (int) $user['user_id'];
			}
	
			$sql = 'SELECT user_id
				FROM ' . USERS_TABLE . '
				WHERE ' . $db->sql_in_set('user_id', $users, true) . '
				AND user_type <> ' . USER_IGNORE;
			$result	= ($missing) ? $db->sql_query_limit($sql, 1, 0) : $db->sql_query($sql);
			$batch	= $db->sql_fetchrowset($result);
			$db->sql_freeresult($result);
		}

		// Return the correct stuff
		if ($missing)
		{
			return (empty($batch)) ? false : true;
		}
		return $batch;
	}

	/**
	 * When coppa is enabled determine the correct group this user is
	 * put into
	 * @param  String $birthday The birthday of the user
	 * @return String The correct group
	 */
	function _get_new_group($birthday)
	{
		// Only determine the COPPA limit once
		static $limit = 0;
		if (empty($limit))
		{
			$limit = strtotime('- 13 years'); // Timestamp of "13" = COPPA years
		}

		// No birthday give
		if (empty($birthday))
		{
			return 'insert_coppa';
		}
		// Determine whether this is a coppa user
		else
		{
			list($day,$month,$year) = explode('-', $birthday);
			$birthday_stamp = mktime(0, 0, 0, $month, $day, $year);

			// Is this user < || > 13?
			if ($birthday_stamp > $limit)
			{
				return 'insert_coppa';
			}
			else
			{
				return 'insert_reg';
			}
		}
	}

	/**
	 * Fetch the group IDs of the two groups
	 * @return void
	 */
	function _get_group_ids()
	{
		global $db;

		$g = array();
		$sql = 'SELECT group_id, group_name
			FROM ' . GROUPS_TABLE . '
			WHERE ' . $db->sql_in_set('group_name', array('REGISTERED', 'REGISTERED_COPPA'));
		$result	= $db->sql_query_limit($sql, 2, 0);
		while ($row = $db->sql_fetchrow($result))
		{
			$g[$row['group_name']] = $row['group_id'];
		}
		$db->sql_freeresult($result);

		return $g;
	}
}

/**
 * The class that handles the resync of the newly
 * registered users group
 */
class resync_newly_registered
{
	/**
	* Array used to link steps to groups
	*/
	var $groups	= array(
		0	=> 'REGISTERED',
		1	=> 'REGISTERED_COPPA',
		2	=> 'NEWLY_REGISTERED',
	);

	/**
	 * The `resync_user_groups` object
	 * @var resync_user_groups
	 */
	var $parent = null;

	/**
	 * Constructor
	 */
	function resync_newly_registered($main_object)
	{
		global $user;
		$user->add_lang('acp/groups');

		$this->parent = $main_object;
	}

	/**
	 * Make sure that this process can/must be run
	 */
	function can_run()
	{
		return (version_compare(PHPBB_VERSION, '3.0.5', '<=')) ? false : true;
	}

	/**
	 * Resync this group
	 */
	function resync()
	{
		global $config;

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
				return;
			}
			else
			{
				meta_refresh(3, append_sid(STK_ROOT_PATH, array('c' => 'user_group', 't' => 'resync_user_groups', 'step' => ++$step, 'submit' => true, 'rr' => $this->parent->run_rr, 'rnr' => $this->parent->run_rnr)));
				trigger_error('RUN_RNR_NOT_FINISHED');
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
			// Handle the errors, though continue if all users are already part of the group
			if ($error != 'GROUP_USERS_EXIST')
			{
				trigger_error($error);
			}
		}

		// Fix the flag
		$this->_fix_new_flag($users, $group_name);

		// Next batch
		meta_refresh(3, append_sid(STK_ROOT_PATH, array('c' => 'usergroup', 't' => 'resync_user_groups', 'step' => $step, 'last' => array_pop($users), 'submit' => true, 'rr' => $this->parent->run_rr, 'rnr' => $this->parent->run_rnr)));
		trigger_error('RUN_RNR_NOT_FINISHED');
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
		$result	= $db->sql_query_limit($sql, $this->parent->batch_size, 0);
		while ($row = $db->sql_fetchrow($result))
		{
			$users[] = $row['user_id'];
		}
		$db->sql_freeresult($result);

		return $users;
	}

	function _fix_new_flag($user_ids, $group_name)
	{
		global $db;

		// Value?
		$new_group_value = ($group_name == 'REGISTERED' || $group_name == 'REGISTERED_COPPA') ? 1 : 0;

		// Set the flag
		$sql = 'UPDATE ' . USERS_TABLE . ' SET user_new = ' . $new_group_value . ' WHERE ' . $db->sql_in_set('user_id', $user_ids);
		$db->sql_query($sql);
	}
}
