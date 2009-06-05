<?php
/**
*
* @package Support Tool Kit - Make Founder
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class make_founder
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return array(
			'title'	=> 'MAKE_FOUNDER',
			'vars'	=> array(
				'legend1'				=> 'MAKE_FOUNDER',
				'user_to_founder'		=> array('lang' => 'USER_TO_FOUNDER', 'type' => 'text:40:255', 'explain' => true, 'select_user' => true),
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
		global $db, $plugin, $user;

        if (!confirm_box(true) && !check_form_key('make_founder'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		$user_req = utf8_normalize_nfc(request_var('user_to_founder', '', true));
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

		if ($row['user_type'] == USER_FOUNDER)
		{
			$error[] = sprintf($user->lang['USER_ALREADY_FOUNDER'], $username);
			return;
		}

		// Let's confirm just in case they enter the wrong username (and that username happens to be registered).
		if (confirm_box(true))
		{
			$db->sql_query('UPDATE ' . USERS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array('user_type' => USER_FOUNDER)) . ' WHERE user_id = ' . $user_id);

			trigger_error(sprintf($user->lang['MAKE_FOUNDER_SUCCESS'], append_sid(PHPBB_ROOT_PATH . 'memberlist.' . PHP_EXT, 'mode=viewprofile&amp;u=' . $user_id), $username));
		}
		else
		{
			$hidden_fields = build_hidden_fields(array('user_to_founder' => $user_req, 'submit' => true));
			confirm_box(false, sprintf($user->lang['MAKE_FOUNDER_CONFIRM'], append_sid(PHPBB_ROOT_PATH . 'memberlist.' . PHP_EXT, 'mode=viewprofile&amp;u=' . $user_id), $username), $hidden_fields);
		}
		redirect(append_sid(STK_INDEX, 't=make_founder', true, $user->session_id));
	}
}
?>