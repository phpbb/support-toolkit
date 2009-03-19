<?php
/**
 *
 * @package Support Tool Kit
 * @version $Id$
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * Minimum Requirement: PHP 4.3.3
 * 
 * This is a replication of the phpBB common.php, it is used to correctly initialize the
 * STK classes.
 */

/**
 * @ignore
 */
if (!defined('IN_STK'))
{
	exit ();
}

/**
 * Get the given language entry
 *
 * @param String $key
 * @return The string that belongs to the given key. If there isn't such a string return the key.
 */
function get_lang_entry($key)
{
	global $user;

	// Force the key to be all capitals
	$key = utf8_strtoupper($key);
	
	$string = '';
	if (isset($user->lang[$key]))
	{
		$string = $user->lang[$key];
	}
	else
	{
		$string = $key;
	}
	
	return $string;
}

/**
* Build configuration template for acp configuration pages
*/
function build_cfg_template($tpl_type, $key, &$new, $config_key, $vars)
{
	global $user, $module;

	$tpl = '';
	$name = 'config[' . $config_key . ']';

	switch ($tpl_type[0])
	{
		case 'text':
		case 'password':
			$size = (int) $tpl_type[1];
			$maxlength = (int) $tpl_type[2];

			$tpl = '<input id="' . $key . '" type="' . $tpl_type[0] . '"' . (($size) ? ' size="' . $size . '"' : '') . ' maxlength="' . (($maxlength) ? $maxlength : 255) . '" name="' . $name . '" value="' . $new[$config_key] . '" />';
		break;

		case 'dimension':
			$size = (int) $tpl_type[1];
			$maxlength = (int) $tpl_type[2];

			$tpl = '<input id="' . $key . '" type="text"' . (($size) ? ' size="' . $size . '"' : '') . ' maxlength="' . (($maxlength) ? $maxlength : 255) . '" name="config[' . $config_key . '_width]" value="' . $new[$config_key . '_width'] . '" /> x <input type="text"' . (($size) ? ' size="' . $size . '"' : '') . ' maxlength="' . (($maxlength) ? $maxlength : 255) . '" name="config[' . $config_key . '_height]" value="' . $new[$config_key . '_height'] . '" />';
		break;

		case 'textarea':
			$rows = (int) $tpl_type[1];
			$cols = (int) $tpl_type[2];

			$tpl = '<textarea id="' . $key . '" name="' . $name . '" rows="' . $rows . '" cols="' . $cols . '">' . $new[$config_key] . '</textarea>';
		break;

		case 'radio':
			$key_yes	= ($new[$config_key]) ? ' checked="checked"' : '';
			$key_no		= (!$new[$config_key]) ? ' checked="checked"' : '';

			$tpl_type_cond = explode('_', $tpl_type[1]);
			$type_no = ($tpl_type_cond[0] == 'disabled' || $tpl_type_cond[0] == 'enabled') ? false : true;

			$tpl_no = '<label><input type="radio" name="' . $name . '" value="0"' . $key_no . ' class="radio" /> ' . (($type_no) ? $user->lang['NO'] : $user->lang['DISABLED']) . '</label>';
			$tpl_yes = '<label><input type="radio" id="' . $key . '" name="' . $name . '" value="1"' . $key_yes . ' class="radio" /> ' . (($type_no) ? $user->lang['YES'] : $user->lang['ENABLED']) . '</label>';

			$tpl = ($tpl_type_cond[0] == 'yes' || $tpl_type_cond[0] == 'enabled') ? $tpl_yes . $tpl_no : $tpl_no . $tpl_yes;
		break;

		case 'select':
		case 'select_multiple':
		case 'custom':

			$return = '';

			if (isset($vars['method']))
			{
				$call = array($module->module, $vars['method']);
			}
			else if (isset($vars['function']))
			{
				$call = $vars['function'];
			}
			else
			{
				break;
			}

			if (isset($vars['params']))
			{
				$args = array();
				foreach ($vars['params'] as $value)
				{
					switch ($value)
					{
						case '{CONFIG_VALUE}':
							$value = $new[$config_key];
						break;

						case '{KEY}':
							$value = $key;
						break;
					}

					$args[] = $value;
				}
			}
			else
			{
				if ($tpl_type[0] == 'select_multiple')
				{
					$new[$config_key] = @unserialize(trim($new[$config_key]));
				}

				$args = array($new[$config_key], $key);
			}

			$return = call_user_func_array($call, $args);

			if ($tpl_type[0] == 'select_multiple')
			{
				$tpl = '<select id="' . $key . '" name="' . $name . '[]" multiple="multiple">' . $return . '</select>';
			}
			else if ($tpl_type[0] == 'select')
			{
				$tpl = '<select id="' . $key . '" name="' . $name . '">' . $return . '</select>';
			}
			else
			{
				$tpl = $return;
			}

		break;

		default:
		break;
	}

	if (isset($vars['append']))
	{
		$tpl .= $vars['append'];
	}

	return $tpl;
}

/**
 * STK save version of confirm_box
 *
 * Build Confirm box
 * @param boolean $check True for checking if confirmed (without any additional parameters) and false for displaying the confirm box
 * @param string $title Title/Message used for confirm box.
 *		message text is _CONFIRM appended to title.
 *		If title cannot be found in user->lang a default one is displayed
 *		If title_CONFIRM cannot be found in user->lang the text given is used.
 * @param string $hidden Hidden variables
 * @param string $html_body Template used for confirm box
 * @param string $u_action Custom form action
 */
function stk_confirm_box($check, $title = '', $hidden = '', $html_body = 'confirm_body.html', $u_action = '')
{
	global $user, $template, $db;
	global $stk;

	if (isset($_POST['cancel']))
	{
		return false;
	}

	$confirm = false;
	if (isset($_POST['confirm']))
	{
		// language frontier
		if ($_POST['confirm'] === $user->lang['YES'])
		{
			$confirm = true;
		}
	}

	if ($check && $confirm)
	{
		$user_id = request_var('user_id', 0);
		$session_id = request_var('sess', '');
		$confirm_key = request_var('confirm_key', '');

		if ($user_id != $user->data['user_id'] || $session_id != $user->session_id || !$confirm_key || !$user->data['user_last_confirm_key'] || $confirm_key != $user->data['user_last_confirm_key'])
		{
			return false;
		}

		// Reset user_last_confirm_key
		$sql = 'UPDATE ' . USERS_TABLE . " SET user_last_confirm_key = ''
			WHERE user_id = " . $user->data['user_id'];
		$db->sql_query($sql);

		return true;
	}
	else if ($check)
	{
		return false;
	}

	$s_hidden_fields = build_hidden_fields(array(
		'user_id'	=> $user->data['user_id'],
		'sess'		=> $user->session_id,
		'sid'		=> $user->session_id)
	);

	// generate activation key
	$confirm_key = gen_rand_string(10);

	// If activation key already exist, we better do not re-use the key (something very strange is going on...)
	if (request_var('confirm_key', ''))
	{
		// This should not occur, therefore we cancel the operation to safe the user
		return false;
	}

	// re-add sid / transform & to &amp; for user->page (user->page is always using &)
	$use_page = ($u_action) ? PHPBB_ROOT_PATH . $u_action : PHPBB_ROOT_PATH . str_replace('&', '&amp;', $user->page['page']);
	$u_action = reapply_sid($use_page);
	$u_action .= ((strpos($u_action, '?') === false) ? '?' : '&amp;') . 'confirm_key=' . $confirm_key;

	$template->assign_vars(array(
		'MESSAGE_TITLE'		=> (!isset($user->lang[$title])) ? $user->lang['CONFIRM'] : $user->lang[$title],
		'MESSAGE_TEXT'		=> (!isset($user->lang[$title . '_CONFIRM'])) ? $title : $user->lang[$title . '_CONFIRM'],

		'YES_VALUE'			=> $user->lang['YES'],
		'S_CONFIRM_ACTION'	=> $u_action,
		'S_HIDDEN_FIELDS'	=> $hidden . $s_hidden_fields)
	);

	$sql = 'UPDATE ' . USERS_TABLE . " SET user_last_confirm_key = '" . $db->sql_escape($confirm_key) . "'
		WHERE user_id = " . $user->data['user_id'];
	$db->sql_query($sql);

	$stk->page_header(!isset($user->lang[$title]) ? $user->lang['CONFIRM'] : $user->lang[$title]);
	$stk->page_footer($html_body);
}

/**
 * STK save version of login box
 * Generate login box or verify password
 */
function stk_login_box($redirect = '', $l_explain = '', $l_success = '', $admin = false)
{
	global $db, $user, $template, $auth, $phpEx, $phpbb_root_path, $config;
	global $stk;

	$err = '';

	// Make sure user->setup() has been called
	if (empty($user->lang))
	{
		$user->setup();
	}

	// Make sure the header is set
	$stk->page_header($user->lang['LOGIN']);
	
	// Print out error if user tries to authenticate as an administrator without having the privileges...
	if ($admin && !STK_LOGIN && !$auth->acl_get('a_'))
	{
		// Not authd
		// anonymous/inactive users are never able to go to the ACP even if they have the relevant permissions
		if ($user->data['is_registered'])
		{
			add_log('admin', 'LOG_ADMIN_AUTH_FAIL');
		}
		trigger_error('NO_AUTH_ADMIN');
	}

	if (isset($_POST['login']))
	{
		// Get credential
		if ($admin)
		{
			$credential = request_var('credential', '');

			if (strspn($credential, 'abcdef0123456789') !== strlen($credential) || strlen($credential) != 32)
			{
				if ($user->data['is_registered'])
				{
					add_log('admin', 'LOG_ADMIN_AUTH_FAIL');
				}
				trigger_error('NO_AUTH_ADMIN');
			}

			$password	= request_var('password_' . $credential, '', true);
		}
		else
		{
			$password	= request_var('password', '', true);
		}

		$username	= request_var('username', '', true);
		$autologin	= (!empty($_POST['autologin'])) ? true : false;
		$viewonline = (!empty($_POST['viewonline'])) ? 0 : 1;
		$admin 		= ($admin) ? 1 : 0;
		$viewonline = ($admin) ? $user->data['session_viewonline'] : $viewonline;

		// Check if the supplied username is equal to the one stored within the database if re-authenticating
		if ($admin && utf8_clean_string($username) != utf8_clean_string($user->data['username']))
		{
			// We log the attempt to use a different username...
			add_log('admin', 'LOG_ADMIN_AUTH_FAIL');
			trigger_error('NO_AUTH_ADMIN_USER_DIFFER');
		}

		// If authentication is successful we redirect user to previous page
		$result = $auth->stk_login($username, $password, $autologin, $viewonline, $admin);

		// If admin authentication and login, we will log if it was a success or not...
		// We also break the operation on the first non-success login - it could be argued that the user already knows
		if ($admin)
		{
			if ($result['status'] == LOGIN_SUCCESS)
			{
				add_log('admin', 'LOG_ADMIN_AUTH_SUCCESS');
			}
			else
			{
				// Only log the failed attempt if a real user tried to.
				// anonymous/inactive users are never able to go to the ACP even if they have the relevant permissions
				if ($user->data['is_registered'])
				{
					add_log('admin', 'LOG_ADMIN_AUTH_FAIL');
				}
			}
		}

		// The result parameter is always an array, holding the relevant information...
		if ($result['status'] == LOGIN_SUCCESS)
		{
			$redirect = request_var('redirect', STK_ROOT_PATH . 'index.' . PHP_EXT);
			$message = ($l_success) ? $l_success : $user->lang['LOGIN_REDIRECT'];
			$l_redirect = ($admin) ? $user->lang['PROCEED_TO_ACP'] : (($redirect === STK_ROOT_PATH . 'index.' . PHP_EXT || $redirect === 'index.' . PHP_EXT) ? $user->lang['RETURN_INDEX'] : $user->lang['RETURN_PAGE']);

			// append/replace SID (may change during the session for AOL users)
			$redirect = reapply_sid($redirect);

			// Special case... the user is effectively banned, but we allow founders to login
			if (defined('IN_CHECK_BAN') && $result['user_row']['user_type'] != USER_FOUNDER)
			{
				return;
			}

			$redirect = meta_refresh(3, $redirect);
			trigger_error($message . '<br /><br />' . sprintf($l_redirect, '<a href="' . $redirect . '">', '</a>'));
		}

		// Something failed, determine what...
		if ($result['status'] == LOGIN_BREAK)
		{
			trigger_error($result['error_msg']);
		}

		// Special cases... determine
		switch ($result['status'])
		{
			case LOGIN_ERROR_ATTEMPTS:

				// Show confirm image
				$sql = 'DELETE FROM ' . CONFIRM_TABLE . "
					WHERE session_id = '" . $db->sql_escape($user->session_id) . "'
						AND confirm_type = " . CONFIRM_LOGIN;
				$db->sql_query($sql);

				// Generate code
				$code = gen_rand_string(mt_rand(5, 8));
				$confirm_id = md5(unique_id($user->ip));
				$seed = hexdec(substr(unique_id(), 4, 10));

				// compute $seed % 0x7fffffff
				$seed -= 0x7fffffff * floor($seed / 0x7fffffff);

				$sql = 'INSERT INTO ' . CONFIRM_TABLE . ' ' . $db->sql_build_array('INSERT', array(
					'confirm_id'	=> (string) $confirm_id,
					'session_id'	=> (string) $user->session_id,
					'confirm_type'	=> (int) CONFIRM_LOGIN,
					'code'			=> (string) $code,
					'seed'			=> (int) $seed)
				);
				$db->sql_query($sql);

				$template->assign_vars(array(
					'S_CONFIRM_CODE'			=> true,
					'CONFIRM_ID'				=> $confirm_id,
					'CONFIRM_IMAGE'				=> '<img src="' . append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=confirm&amp;id=' . $confirm_id . '&amp;type=' . CONFIRM_LOGIN) . '" alt="" title="" />',
					'L_LOGIN_CONFIRM_EXPLAIN'	=> sprintf($user->lang['LOGIN_CONFIRM_EXPLAIN'], '<a href="mailto:' . htmlspecialchars($config['board_contact']) . '">', '</a>'),
				));

				$err = $user->lang[$result['error_msg']];

			break;

			case LOGIN_ERROR_PASSWORD_CONVERT:
				$err = sprintf(
					$user->lang[$result['error_msg']],
					($config['email_enable']) ? '<a href="' . append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=sendpassword') . '">' : '',
					($config['email_enable']) ? '</a>' : '',
					($config['board_contact']) ? '<a href="mailto:' . htmlspecialchars($config['board_contact']) . '">' : '',
					($config['board_contact']) ? '</a>' : ''
				);
			break;

			// Username, password, etc...
			default:
				$err = $user->lang[$result['error_msg']];

				// Assign admin contact to some error messages
				if ($result['error_msg'] == 'LOGIN_ERROR_USERNAME' || $result['error_msg'] == 'LOGIN_ERROR_PASSWORD')
				{
					$err = (!$config['board_contact']) ? sprintf($user->lang[$result['error_msg']], '', '') : sprintf($user->lang[$result['error_msg']], '<a href="mailto:' . htmlspecialchars($config['board_contact']) . '">', '</a>');
				}

			break;
		}
	}

	if (!$redirect)
	{
		// We just use what the session code determined...
		// If we are not within the admin directory we use the page dir...
		$redirect = '';

		if (!$admin)
		{
			$redirect .= ($user->page['page_dir']) ? $user->page['page_dir'] . '/' : '';
		}

		$redirect .= $user->page['page_name'] . (($user->page['query_string']) ? '?' . htmlspecialchars($user->page['query_string']) : '');
	}

	// Assign credential for username/password pair
	$credential = ($admin) ? md5(unique_id()) : false;

	$s_hidden_fields = array(
		'redirect'	=> $redirect,
		'sid'		=> $user->session_id,
	);

	if ($admin)
	{
		$s_hidden_fields['credential'] = $credential;
	}

	$s_hidden_fields = build_hidden_fields($s_hidden_fields);

	$template->assign_vars(array(
		'LOGIN_ERROR'		=> $err,
		'LOGIN_EXPLAIN'		=> $l_explain,

		'S_LOGIN_ACTION'		=> append_sid('index.' . PHP_EXT, false, true, $user->session_id), // Needs to stay index.$phpEx because we are within the admin directory
		'S_HIDDEN_FIELDS' 		=> $s_hidden_fields,

		'S_ADMIN_AUTH'			=> $admin,
		'USERNAME'				=> ($admin) ? $user->data['username'] : '',

		'USERNAME_CREDENTIAL'	=> 'username',
		'PASSWORD_CREDENTIAL'	=> ($admin) ? 'password_' . $credential : 'password',
	));

	$stk->page_footer('login_body');
}

/**
 * Wrapper for adm_page_footer
 * 
 * Page footer for acp pages
 */
function adm_page_footer()
{
	global $stk;
	
	$stk->page_footer();
}
?>