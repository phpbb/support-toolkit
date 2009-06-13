<?php
/**
*
* @package Support Toolkit - Add User
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

class add_user
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $user;

		$user->add_lang('ucp');

		return array(
			'title'	=> 'ADD_USER',
			'vars'	=> array(
				'legend1'				=> 'ADD_USER',
				'ad_username'			=> array('lang' => 'USERNAME', 'explain' => false, 'type' => 'text:40:255'),
				'ad_userpass'			=> array('lang' => 'PASSWORD', 'explain' => false, 'type' => 'password:40:255'),
				'ad_userpass_confirm'	=> array('lang' => 'PASSWORD_CONFIRM', 'explain' => false, 'type' => 'password:40:255'),
				'ad_email'				=> array('lang' => 'EMAIL_ADDRESS', 'explain' => false, 'type' => 'text:40:255'),
				'ad_email_confirm'		=> array('lang' => 'CONFIRM_EMAIL', 'explain' => false, 'type' => 'text:40:255'),
				'ad_lang'				=> array('lang' => 'LANGUAGE', 'explain' => false, 'type' => 'select', 'function' => 'language_select'),
				'ad_tz'					=> array('lang' => 'TIMEZONE', 'explain' => false, 'type' => 'select', 'function' => 'tz_select'),

				'legend2'				=> 'ADD_USER_GROUP',
				'ad_usergroups'			=> array('lang' => 'USER_GROUPS', 'explain' => true, 'type' => 'select_multiple', 'function' => 'get_groups'),
				'ad_defaultgroup'		=> array('lang' => 'DEFAULT_GROUP', 'explain' => true, 'type' => 'select', 'function' => 'get_groups'),
				'ad_groupleader'		=> array('lang' => 'GROUP_LEADER', 'explain' => true, 'type' => 'select_multiple', 'function' => 'get_groups'),
			)
		);
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		global $config, $user;

		$user->add_lang('acp/groups');

		if (!check_form_key('add_user'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		// Try to manually determine the timezone and adjust the dst if the server date/time complies with the default setting +/- 1
		$timezone = date('Z') / 3600;
		$is_dst = date('I');

		if ($config['board_timezone'] == $timezone || $config['board_timezone'] == ($timezone - 1))
		{
			$timezone = ($is_dst) ? $timezone - 1 : $timezone;

			if (!isset($user->lang['tz_zones'][(string) $timezone]))
			{
				$timezone = $config['board_timezone'];
			}
		}
		else
		{
			$is_dst = $config['board_dst'];
			$timezone = $config['board_timezone'];
		}

		// Collect the user data
		$data = array(
			'ad_username'		=> utf8_normalize_nfc(request_var('ad_username', '', true)),
			'ad_pass'			=> request_var('ad_userpass', '', true),
			'ad_pass_confirm'	=> request_var('ad_userpass_confirm', '', true),
			'ad_email'			=> utf8_strtolower(request_var('ad_email', '')),
			'ad_email_confirm'	=> utf8_strtolower(request_var('ad_email_confirm', '')),
			'ad_lang'			=> basename(request_var('ad_lang', $user->lang_name)),
			'ad_tz'				=> request_var('ad_tz', (float) $timezone),
		);

		// Check vars
		$this->validate_data($data, $error);

		// Something went wrong
		if (!empty($error))
		{
			$user->add_lang('ucp');
			return false;
		}

		// Collect the groups data
		$groups = array(
			'default'	=> request_var('ad_defaultgroup', 0),
			'groups'	=> request_var('ad_usergroups', array(0)),
			'leaders'	=> request_var('ad_groupleader', array(0)),
		);

		// Register the user
		$user_row = array(
			'username'				=> $data['ad_username'],
			'user_password'			=> phpbb_hash($data['ad_pass']),
			'user_email'			=> $data['ad_email'],
			'group_id'				=> (int) $groups['default'],
			'user_timezone'			=> (float) $data['ad_tz'],
			'user_dst'				=> $is_dst,
			'user_lang'				=> $data['ad_lang'],
			'user_type'				=> USER_NORMAL,
			'user_actkey'			=> '',
			'user_ip'				=> $user->ip,
			'user_regdate'			=> time(),
			'user_inactive_reason'	=> 0,
			'user_inactive_time'	=> 0,
		);
		$user_id = user_add($user_row, false);

		// Remove the default group from the groups array. Keeping it here causes an error
		if (in_array($groups['default'], $groups['groups']))
		{
			foreach ($groups['groups'] as $group_key => $group_id)
			{
				if ($group_id == $groups['default'])
				{
					unset($groups['groups'][$group_key]);
					break;
				}
			}
		}

		// This should not happen, because the required variables are listed above...
		if ($user_id === false)
		{
			trigger_error('NO_USER', E_USER_ERROR);
		}

		// Add the user to the selected groups
		$this->add_groups($user_id, $groups, $error);

		// Last check for errors
		if (!empty($error))
		{
			return false;
		}

		// And done
		trigger_error('USER_ADDED');
	}

	/**
	* Validate data
	* Validate the inputted data
	*
	* @param	mixed array		$data
	* @param	mixed array		$error	An array holding all the error messages
	*/
	function validate_data($data, &$error)
	{
		global $config;

		if (!function_exists('validate_data'))
		{
			include(PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
		}

		$error = validate_data($data, array(
			'ad_username'			=> array(
				array('string', false, $config['min_name_chars'], $config['max_name_chars']),
				array('username', '')),
			'ad_pass'				=> array(
				array('string', false, $config['min_pass_chars'], $config['max_pass_chars']),
				array('password')),
			'ad_pass_confirm'		=> array('string', false, $config['min_pass_chars'], $config['max_pass_chars']),
			'ad_email'				=> array(
				array('string', false, 6, 60),
				array('email')),
			'ad_email_confirm'		=> array('string', false, 6, 60),
			'ad_tz'					=> array('num', false, -14, 14),
			'ad_lang'				=> array('match', false, '#^[a-z_\-]{2,}$#i'),
		));
		if ($data['ad_pass'] != $data['ad_pass_confirm'])
		{
			$error[] = $user->lang['NEW_PASSWORD_ERROR'];
		}

		if ($data['ad_email'] != $data['ad_email_confirm'])
		{
			$error[] = $user->lang['NEW_EMAIL_ERROR'];
		}
	}

	/**
	* Add groups
	* Add the user to the selected gourps
	*
	* @param	int		$user_id	The user id
	* @param	array	$group_data	The group data
	* @param	array	&$error		The error array
	*/
	function add_groups($user_id, $group_data, &$error)
	{
		foreach ($group_data['groups'] as $group_id)
		{
			$default = $leader = false;

			if ($group_data['default'] == $group_id)
			{
				$default = true;
			}

			if (in_array($group_id, $group_data['leaders']))
			{
				$leader = true;
			}

			// Add to the group
			if (($msg = group_user_add($group_id, array($user_id), false, false, $default, $leader)) !== false)
			{
				// Something went wrong
				$error[] = $msg;
				return false;
			}
		}
	}
}

/**
* Get all the groups for the groups dropdown.
*/
function get_groups()
{
	static $option_list = null;

	// Only run this once
	if ($option_list == null)
	{
		global $db, $user;

		// Just ignore the BOTS and GUESTS groups
		$group_ignore = array('BOTS', 'GUESTS');

		// Get the groups and build the dropdown list
		$sql = 'SELECT group_id, group_type, group_name
			FROM ' . GROUPS_TABLE . '
			WHERE ' . $db->sql_in_set('group_name', $group_ignore, true);
		$result = $db->sql_query($sql);

		$option_list = '';
		while ($row = $db->sql_fetchrow($result))
		{
			$group_name = ($row['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name'];
			$option_list .= "<option value='{$row['group_id']}'>{$group_name}</option>";
		}

		$db->sql_freeresult($result);
	}

	return $option_list;
}
?>