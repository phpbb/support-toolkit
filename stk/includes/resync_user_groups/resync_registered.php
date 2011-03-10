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

		$insert_coppa = $insert_reg = array();

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
