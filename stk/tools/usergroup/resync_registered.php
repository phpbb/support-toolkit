<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
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

class resync_registered
{
	/**
	 * Display Options
	 *
	 * @return void
	 */
	function display_options()
	{
		global $db;

		// Get teh group IDs
		$g = $this->_get_group_ids();

		// Now figure out whether there are users that aren't part in any of these
		if (!function_exists('group_memberships'))
		{
			require PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT;
		}
		$users = array();
		$data = group_memberships($g);

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
			$result	= $db->sql_query_limit($sql, 1, 0);
			$set	= $db->sql_fetchfield('user_id', false, $result);
			$db->sql_freeresult($result);
	
			if ($set === false)
			{
				trigger_error(user_lang('NO_RESYNC_REGISTERED'));
			}
		}

		return 'RESYNC_REGISTERED';
	}

	/**
	 * Run the tool
	 */
	function run_tool()
	{
		global $config, $db;

		// Get teh group IDs
		$g = $this->_get_group_ids();

		// Now figure out whether there are users that aren't part in any of these
		if (!function_exists('group_memberships'))
		{
			require PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT;
		}
		$users = array();
		$data = group_memberships($g);
		foreach ($data as $user)
		{
			$users[] = (int) $user['user_id'];
		}

		$sql = 'SELECT user_id
			FROM ' . USERS_TABLE . '
			WHERE ' . $db->sql_in_set('user_id', $users, true) . '
			AND user_type <> ' . USER_IGNORE;
		$result	= $db->sql_query($sql);
		$batch	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

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
			$limit	= strtotime('- 13 years'); // Timestamp of "13" = COPPA years

			foreach ($batch as $row)
			{
				$insert = '';

				// No birthday give
				if (empty($row['user_birthday']))
				{
					$insert = 'insert_coppa';
				}
				// Determine whether this is a coppa user
				else
				{
					list($day,$month,$year) = explode('-', $row['user_birthday']);
					$birthday_stamp = mktime(0, 0, 0, $month, $day, $year);

					// Is this user < || > 13?
					if ($birthday_stamp > $limit)
					{
						$insert = 'insert_coppa';
					}
					else
					{
						$insert = 'insert_reg';
					}
				}

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

		trigger_error('RESYNC_REGISTERED_SUCCESS');
	}

	/**
	 * Fetch the group IDs of the two groups
	 * @return void
	 */
	function _get_group_ids()
	{
		global $db;

		$g = array();
		$sql = 'SELECT group_id
			FROM ' . GROUPS_TABLE . '
			WHERE ' . $db->sql_in_set('group_name', array('REGISTERED', 'REGISTERED_COPPA')) .
				'ORDER BY group_name DESC';
		$result	= $db->sql_query_limit($sql, 2, 0);
		$g['REGISTERED_COPPA'] = $db->sql_fetchfield('group_id', false, $result);
		$g['REGISTERED'] = $db->sql_fetchfield('group_id', false, $result);
		$db->sql_freeresult($result);

		return $g;
	}
}

?>