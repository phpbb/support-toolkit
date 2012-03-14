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

class change_password
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return array(
			'title'	=> 'CHANGE_PASSWORD',
			'vars'	=> array(
				'legend1'				=> 'CHANGE_PASSWORD',
				'req_username'			=> array('lang' => 'USERNAME_NAME', 'type' => 'text:40:255', 'explain' => true, 'select_user' => true),
				'req_user_id'			=> array('lang' => 'USERNAMEID', 'type' => 'text:10:50', 'explain' => true, 'select_user' => false),
				'new_password'			=> array('lang' => 'PASSWORD', 'type' => 'password:40:255', 'explain' => false),
				'password_confirm'		=> array('lang' => 'PASSWORD_CONFIRM', 'type' => 'password:40:255', 'explain' => false),
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
		global $config, $db, $user;

		$user->add_lang('ucp');

        if (!check_form_key('change_password'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		$req_username = utf8_normalize_nfc(request_var('req_username', '', true));
		$req_user_id = utf8_normalize_nfc(request_var('req_user_id', 0));

		// Check that at least one field is filled in.
		if (!$req_username && !$req_user_id)
		{
			$error[] = 'FIELDS_NOT_FILLED';
			return;
		}

		// Not allowed to have both username and user_id filled.
		if ($req_username && $req_user_id)
		{
			$error[] = 'FIELDS_BOTH_FILLED';
			return;
		}

		// Get the correct user data and make sure that he exists
		if (!function_exists('user_get_id_name'))
		{
			include (PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
		}

		$user_id = array();
		$username = array();
		$user_type = array();

		if (!empty($req_user_id))
		{
			$user_id[] = $req_user_id;
		}
		if (!empty($req_username))
		{
			$username[] = $req_username;
		}
		$user_type[] = USER_NORMAL;

		// Get user_id
		$result = user_get_id_name($user_id, $username, $user_type);

		// Was a user_id found?
		if (!sizeof($user_id) || $result !== false)
		{
			$error[] = 'NO_USER';
			return;
		}

		// Drop the arrays
		$user_id = array_shift($user_id); 
		$username = array_shift($username);

		// No user found
		if (!$user_id)
		{
			$error[] = 'NO_USER';
			return;
		}

		$data = array(
			'new_password'		=> request_var('new_password', '', true),
			'password_confirm'	=> request_var('password_confirm', '', true),
		);

		if ($data['new_password'] != $data['password_confirm'])
		{
			$error[] = 'NEW_PASSWORD_ERROR';
			return;
		}

		$error = validate_data($data, array(
			'new_password'		=> array('password'),
			'password_confirm'	=> array('string', false, $config['min_pass_chars'], $config['max_pass_chars']),
		));
		if (!empty($error))
		{
			return;
		}

		$db->sql_query('UPDATE ' . USERS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array('user_password' => phpbb_hash($data['new_password']),)) . ' WHERE user_id = ' . $user_id);

		add_log('admin', 'LOG_USER_NEW_PASSWORD', $username);

		trigger_error(sprintf($user->lang['CHANGE_PASSWORD_SUCCESS'], append_sid(PHPBB_ROOT_PATH . 'memberlist.' . PHP_EXT, 'mode=viewprofile&amp;u=' . $user_id), $username));
	}
}
