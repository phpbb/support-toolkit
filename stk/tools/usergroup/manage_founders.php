<?php
/**
*
* @package Support Toolkit - Make Founder
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

class manage_founders
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $db, $template, $user;

		// Generate a list of founders
		$sql = 'SELECT user_id, username, user_colour
			FROM ' . USERS_TABLE . '
			WHERE user_type = ' . USER_FOUNDER;
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$template->assign_block_vars('founders', array(
				'L_FOUNDER_FULL'	=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
				'L_FOUNDER_ID'		=> $row['user_id'],
				'S_DISABLED'		=> ($row['user_id'] == $user->data['user_id']) ? true : false,
			));
		}
		$db->sql_freeresult($result);

		// Additional template stuff
		$template->assign_vars(array(
			'U_DEMOTE_FOUNDERS'	=> append_sid(STK_INDEX, array('c' => 'user_group', 't' => 'manage_founders', 'mode' => 'demote', 'submit' => 1)),
			'U_FIND_USER'		=> append_sid(PHPBB_ROOT_PATH . 'memberlist.' . PHP_EXT, array('mode' => 'searchuser', 'form' => 'select_user', 'field' => 'username', 'select_single' => 'true', 'form' => 'stk_promote_founder', 'field' => 'username')),
			'U_PROMOTE_FOUNDER'	=> append_sid(STK_INDEX, array('c' => 'user_group', 't' => 'manage_founders', 'mode' => 'promote', 'submit' => 1)),
		));

		$template->set_filenames(array(
			'body' => 'tools/manage_founders.html',
		));

		page_header($user->lang['MANAGE_FOUNDERS'], false);
		page_footer();
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		global $db, $user;

		if (!check_form_key('manage_founders'))
		{
			trigger_error('FORM_INVALID');
		}

		// Lets do something
		$mode = request_var('mode', '');
		switch ($mode)
		{
			case 'demote' :
				$req_founders	= request_var('founders', array(0 => ''));
				if (!sizeof($req_founders))
				{
					trigger_error('NO_USER');
				}

				// Make sure we only have users that do exist
				$req_founders	= array_keys($req_founders);
				$founder_ids	= array();

				$sql = 'SELECT user_id
					FROM ' . USERS_TABLE . '
					WHERE ' . $db->sql_in_set('user_id', $req_founders) . '
						AND user_type = ' . USER_FOUNDER;
				$result			= $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$founder_ids[] = $row['user_id'];
				}
				$db->sql_freeresult($result);

				// Remove founder status from these users
				$sql = 'UPDATE ' . USERS_TABLE . '
					SET ' . $db->sql_build_array('UPDATE', array(
						'user_type'	=> USER_NORMAL,
					)) . '
					WHERE ' . $db->sql_in_set('user_id', $founder_ids);
				$db->sql_query($sql);

				// Did everything to right?
				if (sizeof($founder_ids) == $db->sql_affectedrows())
				{
					trigger_error(sprintf($user->lang['DEMOTE_SUCCESSFULL'], $db->sql_affectedrows()));
				}
				trigger_error($user->lang['DEMOTE_FAILED']);
			break;

			case 'promote' :
				$req_username = utf8_normalize_nfc(request_var('username', '', true));
				$req_user_id = utf8_normalize_nfc(request_var('user_id', 0));

				// Check that at least one field is filled in.
				if (!$req_username && empty($req_user_id))
				{
					trigger_error('NO_USER');
				}

				// Not allowed to have both username and user_id filled.
				if ($req_username && $req_user_id)
				{
					$error[] = 'BOTH_FIELDS_FILLED';
					return;
				}

				// Get the correct user data and make sure that he exists
				if (!function_exists('user_get_id_name'))
				{
					include (PHPBB_ROOT_PATH . 'includes/functions_user.' . PHP_EXT);
				}

				$user_id = $username = $user_type = array();

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
					trigger_error('NO_USER');
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

				// Now promote the guy
				$sql = 'UPDATE ' . USERS_TABLE . '
					SET ' . $db->sql_build_array('UPDATE', array(
						'user_type'	=> USER_FOUNDER,
					)) . '
					WHERE user_id = ' . (int) $user_id;
				$db->sql_query($sql);

				// Success?
				if ($db->sql_affectedrows() == 1)
				{
					trigger_error(sprintf($user->lang['MAKE_FOUNDER_SUCCESS'], append_sid(PHPBB_ROOT_PATH . 'memberlist.' . PHP_EXT, array('mode' => 'viewprofile', 'u' => $user_id[0])), $username));
				}
				trigger_error($user->lang['MAKE_FOUNDER_FAILED']);
			break;

			default :
				trigger_error('NO_MODE');
		}
	}
}
