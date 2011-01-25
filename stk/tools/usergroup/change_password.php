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
				'user_req'				=> array('lang' => 'USERNAMEID', 'type' => 'text:40:255', 'explain' => true, 'select_user' => true),
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

        if (!check_form_key('change_password'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		$user_req = utf8_normalize_nfc(request_var('user_req', '', true));

		if (!$user_req)
		{
			$error[] = 'NO_USER';
			return;
		}

		$sql = 'SELECT user_id, username, user_type FROM ' . USERS_TABLE . '
			WHERE ' . ((!is_numeric($user_req)) ? 'username_clean = \'' . $db->sql_escape(utf8_clean_string($user_req)) . '\'' : 'user_id = ' . (int) $user_req);
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		$user_id = (int) $row['user_id'];
		$username = $row['username'];

		if (!$user_id)
		{
			$error[] = 'NO_USER';
			return;
		}

		$user->add_lang('ucp');
		if (!function_exists('validate_data'))
		{
			include(PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
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

		add_log('admin', 'LOG_USER_NEW_PASSWORD', $user_req);

		trigger_error(sprintf($user->lang['CHANGE_PASSWORD_SUCCESS'], append_sid(PHPBB_ROOT_PATH . 'memberlist.' . PHP_EXT, 'mode=viewprofile&amp;u=' . $user_id), $username));
	}
}
