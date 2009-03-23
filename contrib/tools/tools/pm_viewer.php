<?php
/**
*
* @package Support Tool Kit - PM Viewer
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class pm_viewer
{
	/**
	* The template file this page needs
	*/
	var $template_file = '';

	/**
	* The title of this page
	*/
	var $page_title = '';

	/**
	* Tool Info
	*
	* @return Returns an array with the info about this tool.
	*/
	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['PM_VIEWER'],
			'NAME_EXPLAIN'	=> $user->lang['PM_VIEWER_EXPLAIN'],

			'CATEGORY'		=> $user->lang['USER_GROUP_TOOLS'],
		);
	}

	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return  array(
			'title'	=> 'PM_VIEWER',
			'vars'	=> array(
				'legend1'		=> 'PM_VIEWER',
				'view_pm_of'	=> array('lang' => 'VIEW_USER', 'type' => 'text:40:255', 'explain' => true, 'select_user' => true),
			),
		);
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		// What are we doing?
		$mode = request_var('mode', 'list');
		switch ($mode)
		{
			case 'detail' :
				$this->show_pm($error);
			break;

			case 'delete' :
				$this->remove_pm($error);
			break;

			default :
				// Form check
				if (!check_form_key('pm_viewer'))
				{
					$error[] = 'FORM_INVALID';
					return;
				}

				$this->list_user($error);
			break;
		}
	}

	/**
	* Create a list of all the PMs that this user has in his inbox
	*/
	function list_user(&$error)
	{
		global $db, $template, $user;
		global $stk_root_path, $phpEx;

		// Some vars
		$req_user = utf8_normalize_nfc(request_var('view_pm_of', '', true));

		// Make sure that we have a user id
		$sql = 'SELECT user_id, username
				FROM ' . USERS_TABLE . '
					WHERE ' . (is_numeric($req_user) ? 'user_id = ' . (int) $req_user : "username_clean = '" . $db->sql_escape(utf8_clean_string($req_user)) . "'");
		$result		= $db->sql_query_limit($sql, 1, 0);
		$user_id	= (int) $db->sql_fetchfield('user_id', 0, $result);
		$username	= $db->sql_fetchfield('username', 0, $result);
		if (!$user_id)
		{
			$error[] = 'NO_USER';
			return false;
		}
		$db->sql_freeresult($result);

		// Get all the pm titles and ids
		$sql = 'SELECT p.msg_id, p.message_subject
				FROM (' . PRIVMSGS_TABLE . ' p, ' . PRIVMSGS_TO_TABLE . " pt)
					WHERE pt.user_id = {$user_id}
						AND pt.folder_id = " . PRIVMSGS_INBOX . '
						AND p.msg_id = pt.msg_id';
		$result = $db->sql_query($sql);
		// Assign all the data to the template, or trigger an error
		if ($row = $db->sql_fetchrow($result))
		{
			do
			{
				$template->assign_block_vars('pm_list', array(
					'L_PM'	=> censor_text($row['message_subject']),
					'U_PM'	=> append_sid("{$stk_root_path}index.$phpEx", array('t' => 'pm_viewer', 'mode' => 'detail', 'submit' => true, 'owner' => $user_id, 'pm_id' => $row['msg_id'])),
				));
			}
			while($row = $db->sql_fetchrow($result));
		}
		else
		{
			global $user;
			$error[] = sprintf($user->lang['USER_NO_PM'], utf8_ucfirst($username));
		}
		$db->sql_freeresult($result);

		// something went wrong!
		if (sizeof($error))
		{
			return false;
		}

		parse_page('tools/pm_viewer_body', 'PM_VIEWER_USER_LIST');
	}

	/**
	* Display the selected pm
	*/
	function show_pm(&$error)
	{
		global $db, $template, $user;
		global $stk_root_path, $phpbb_root_path, $phpEx;

		// Some vars
		$pm_id = request_var('pm_id', 0);
		$owner = request_var('owner', 0);

		// Get the content of the pms, query comes from ucp_pm.php
		$sql = 'SELECT pt.msg_id, p.message_time, p.message_subject, p.message_text, p.bbcode_bitfield, p.bbcode_uid, u.user_id, u.username, u.user_colour
				FROM (' . PRIVMSGS_TO_TABLE . ' pt, ' . PRIVMSGS_TABLE . ' p, ' . USERS_TABLE . ' u)
					WHERE p.author_id = u.user_id
						AND pt.msg_id = p.msg_id
						AND pt.folder_id = ' . PRIVMSGS_INBOX . "
						AND p.msg_id = {$pm_id}";
		$result = $db->sql_query_limit($sql, 1, 0);
		$pm_row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!$pm_row)
		{
			// Shouldn't be possible, but better save then sorry :).
			$error[] = 'USER_NO_PM';
			return false;
		}
		else
		{
			// Parse the message
			if ($pm_row['bbcode_bitfield'])
			{
				if (!class_exists('bbcode'))
				{
					include($phpbb_root_path . 'includes/bbcode.' . $phpEx);
				}
				$bbcode = new bbcode($pm_row['bbcode_bitfield']);
			}

			// Second parse bbcode here
			if ($pm_row['bbcode_bitfield'])
			{
				$bbcode->bbcode_second_pass($pm_row['message_text'], $pm_row['bbcode_uid'], $pm_row['bbcode_bitfield']);
			}

			// Always process smilies after parsing bbcodes
			$message = bbcode_nl2br($pm_row['message_text']);
			$message = smiley_text($message);

			$template->assign_vars(array(
				// Define page
				'S_PM_DETAIL'	=> true,

				'S_PM_ID'		=> $pm_row['msg_id'],
				'PM_TITLE'		=> censor_text($pm_row['message_subject']),
				'MESSAGE'		=> censor_text($message),
				'SENT_DATE'		=> date($user->data['user_dateformat'], $pm_row['message_time']),
				'AUTHOR_FULL'	=> get_username_string('full', $pm_row['user_id'], $pm_row['username'], $pm_row['user_colour']),
				'U_DELETE'		=> append_sid("{$stk_root_path}index.$phpEx", array('t' => 'pm_viewer', 'mode' => 'delete', 'owner' => $owner, 'pm_id' => $pm_row['msg_id'], 'submit' => true, 'user' => $pm_row['user_id'])),
			));
		}

		parse_page('tools/pm_viewer_body', 'PM_VIEWER_READ');
	}

	/**
	* Remove a pm from the user
	*/
	function remove_pm(&$error)
	{
		$owner	= request_var('owner', 0);
		$pm_id	= request_var('pm_id', 0);

		if (confirm_box(true))
		{
			// Include the pm function
			global $stk_root_path, $phpbb_root_path, $phpEx;
			include($phpbb_root_path . 'includes/functions_privmsgs.' . $phpEx);

			// Remove the pm
			if (!delete_pm($owner, $pm_id, PRIVMSGS_INBOX))
			{
				// Because you never know
				$error[] = 'PM_NOT_DELETED';
				return false;
			}

			// Inform the user that it is done, and redirect back to this users pm overview
			$redir = append_sid("{$stk_root_path}index.$phpEx", array('t' => 'pm_viewer', 'mode' => 'list', 'view_user' => $owner, 'submit' => true));
			meta_refresh(3, $redir);
			trigger_error('PM_DELETED_REDIRECT');
		}
		else
		{
			$hidden_fields = array('t' => 'pm_viewer', 'mode' => 'delete', 'submit' => true, 'pm_id' => $pm_id, 'owner' => $owner);
			confirm_box(false, 'PM_DELETE', build_hidden_fields($hidden_fields));
		}
	}
}
?>