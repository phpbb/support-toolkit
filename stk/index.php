<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

define('IN_PHPBB', true);

if (!defined('PHPBB_ROOT_PATH')) { define('PHPBB_ROOT_PATH', './../'); }
if (!defined('PHP_EXT')) { define('PHP_EXT', substr(strrchr(__FILE__, '.'), 1)); }
if (!defined('STK_DIR_NAME')) { define('STK_DIR_NAME', substr(strrchr(dirname(__FILE__), DIRECTORY_SEPARATOR), 1)); }	// Get the name of the stk directory
if (!defined('STK_ROOT_PATH')) { define('STK_ROOT_PATH', './'); }
if (!defined('STK_INDEX')) { define('STK_INDEX', STK_ROOT_PATH . 'index.' . PHP_EXT); }

require STK_ROOT_PATH . 'common.' . PHP_EXT;

// Setup the user
$user->session_begin();
$auth->acl($user->data);
$user->setup('acp/common', $config['default_style']);

// Load UMIL
$umil = new umil(true);

// Set a constant so we know when the STK got to a point where it savely loaded all absolutely required stuff
define('IN_STK', true);

// The PHPBB_VERSION constant was introduced in phpBB 3.0.3, some tools rely on this constant
// if it isn't set here fill it with $config['version'] for backward compatibility
if (!defined('PHPBB_VERSION'))
{
	define('PHPBB_VERSION', $config['version']);
}

// Language path.  We are using a custom language path to keep all the files within the stk/ folder.  First check if the $user->data['user_lang'] path exists, if not, check if the default lang path exists, and if still not use english.
stk_add_lang('common');

// Do not use the normal template path (to prevent issues with boards using alternate styles)
$template->set_custom_template(STK_ROOT_PATH . 'style', 'stk');

// Work around for a bug in phpBB3.
$user->theme['template_storedb'] = false;

// Setup some variables
$action = request_var('action', '');
$submit = request_var('submit', false);

// Perform some quick tasks here that don't require any authentication!
perform_unauthed_quick_tasks($action);

/*
* Start Login
*/
$stk_passwd = $stk_passwd_expiration = false;
// See whether we have an emergency login file
if (file_exists(STK_ROOT_PATH . 'passwd.' . PHP_EXT) && $user->data['user_type'] != USER_FOUNDER)
{
	// Include the file
	include(STK_ROOT_PATH . 'passwd.' . PHP_EXT);

	// Can we use trust this password
	if ($stk_passwd_expiration === false || time() > $stk_passwd_expiration)
	{
		// No? Invalidate the password and try to remove the file
		$stk_passwd = false;
		perform_authed_quick_tasks('delpasswdfile');
	}
}

// Do the actual login.
if ($stk_passwd !== false)
{
	// We need to reset the session_id here.
	// If an incorrect session_id is in the user's cookies (with the correct sid in the URL) we will keep failing the check_form_key and we can not login to fix the cookie problem otherwise!
	$user->session_id = '';

	// Set some vars
	$cookie_token	= request_var('stk_token', '', true, true);
	$err_msg		= '';
	$login_token	= request_var('stk_pass', '', true);
	$stk_session	= false;

	// One foot in the air for an active session
	if (!empty($cookie_token))
	{
		if (phpbb_check_hash($stk_passwd, $cookie_token))
		{
			$stk_session = true;
			unset($stk_passwd, $login_token);
		}
	}

	// No active session?
	if (!$stk_session)
	{
		// We're trying to login
		if (isset($_POST['login']))
		{
			if ($cache->get('_stk_last_login') !== false)
			{
				// Make sure that we do not have an stk_last_login cache file (expires after 3 seconds).  To prevent a bruteforce attack
				$err_msg = 'STK_LOGIN_WAIT';
			}
			else if (!check_form_key('stk_login_form'))
			{
				$err_msg = 'FORM_INVALID';
			}
			else
			{
				// Create a hash of the given token to compare the password
				$login_token_hash = phpbb_hash($login_token);

				if (phpbb_check_hash($stk_passwd, $login_token_hash))
				{
					$stk_session = true;

					// Create a session cookie to keep the user logged in
					setcookie('stk_token', $login_token_hash, 0);
				}
				else
				{
					// Store a cache file letting us know when the last login failure attempt was
					$cache->put('_stk_last_login', true, 3);

					$err_msg = 'INCORRECT_PASSWORD';
				}
			}
		}

		// Past this point we don't want the passwords anymore
		unset($stk_passwd, $login_token);

		// Still no session. Make the user happy and show him something to work with
		if (!$stk_session)
		{
			add_form_key('stk_login_form');

			$template->assign_vars(array(
				// Password field related
				'TITLE'			=> $user->lang['SUPPORT_TOOL_KIT_PASSWORD'],
				'TITLE_EXPLAIN'	=> $user->lang['SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'],

				// Other page stuff
				'LOGIN_ERROR'			=> (!empty($err_msg)) ? $user->lang[$err_msg] : false,

				'U_ACTION'				=> append_sid(STK_INDEX, false, true, $user->session_id),
				'U_INDEX'				=> append_sid(PHPBB_ROOT_PATH . 'index.' . PHP_EXT),

				// Identify this method in the template
				'S_STK_LOGIN_METHOD'	=> true,
			));

			page_header($user->lang['LOGIN'], false);

			$template->set_filenames(array(
				'body' => 'login_body.html',
			));

			page_footer(false);
		}
	}

	// Tell the template engine we're logged through this
	$template->assign_vars(array(
		'S_STK_LOGIN'			=> true,
		'STK_LOGIN_DISABLE_MSG'	=> sprintf($user->lang['USING_STK_LOGIN'], append_sid(STK_INDEX, array('action' => 'delpasswdfile'))),
	));

	// Don't use "Anonymous" as username
	$user->data['username'] = $user->lang['EMERGENCY_LOGIN_NAME'];
}
// phpBB authentication. Only allow founders to pass!
else
{
	if (!$user->data['is_registered'])
	{
		$user->add_lang('ucp');

		// Assign a string only used here
		$template->assign_var('GEN_PASS_FILE_EXPLAIN', sprintf($user->lang['GEN_PASS_FILE_EXPLAIN'], append_sid(STK_INDEX, array('action' => 'genpasswdfile'))));

		// A user can potentially access this file directly
		login_box('', $user->lang['STK_NON_LOGIN'], '', false, false);
	}

	// This requires that the user is logged in as an administrator (like how the ACP requires two logins)
	if (!isset($user->data['session_admin']) || !$user->data['session_admin'])
	{
		// Proceed to ACP is misleading
		$user->lang['PROCEED_TO_ACP'] = $user->lang['PROCEED_TO_STK'];

		login_box('', $user->lang['STK_FOUNDER_ONLY'], $user->lang['LOGIN_STK_SUCCESS'], true, false);
	}

	// Only Board Founders may use the STK
	if ($user->data['user_type'] != USER_FOUNDER)
	{
		trigger_error('BOARD_FOUNDER_ONLY');
	}
}
/*
* End Login
*/

// Try to override some limits - maybe it helps some...
@set_time_limit(0);
$mem_limit = @ini_get('memory_limit');
if (!empty($mem_limit))
{
	$unit = strtolower(substr($mem_limit, -1, 1));
	$mem_limit = (int) $mem_limit;

	if ($unit == 'k')
	{
		$mem_limit = floor($mem_limit / 1024);
	}
	else if ($unit == 'g')
	{
		$mem_limit *= 1024;
	}
	else if (is_numeric($unit))
	{
		$mem_limit = floor((int) ($mem_limit . $unit) / 1048576);
	}
	$mem_limit = max(128, $mem_limit) . 'M';
}
else
{
	$mem_limit = '128M';
}
@ini_set('memory_limit', $mem_limit);

// Before we continue check whether this is the latest version of the STK, if not. Block access.
stk_version_check();

// From this point we'll be able to use the full STK layout
$template->assign_var('S_STK_FULL_BODY', true);

// Perform some quick tasks here that require the user to be authenticated
perform_authed_quick_tasks($action);

// If they canceled redirect them to the STK index.
if (isset($_POST['cancel']))
{
	redirect(append_sid(STK_INDEX, false, true, $user->session_id));
}

// Setup the plugin manager
$plugin = new plugin();

// Output common stuff
$template->assign_vars(array(
	'U_ACTION'		=> append_sid(STK_INDEX, $plugin->url_arg(), true, $user->session_id),
	'U_ADM_INDEX'	=> append_sid(PHPBB_ROOT_PATH . 'adm/index.' . PHP_EXT, false, true, $user->session_id),
	'U_STK_INDEX'	=> append_sid(STK_INDEX, false, true, $user->session_id),
	'U_STK_LOGOUT'	=> append_sid(STK_INDEX, 'action=stklogout', true, $user->session_id),
	'U_BACK_TOOL'	=> ($plugin->get_part('t')) ? append_sid(STK_INDEX, $plugin->url_arg(), true, $user->session_id) : false,
	'U_INDEX'		=> append_sid(PHPBB_ROOT_PATH . 'index.' . PHP_EXT),
	'U_LOGOUT'		=> append_sid(PHPBB_ROOT_PATH . 'ucp.' . PHP_EXT, 'mode=logout', true, $user->session_id),

	'USERNAME'		=> $user->data['username'],
));

// Does the user want to run a tool?
if ($plugin->get_part('t'))
{
	// Load the tool
	$tool = $plugin->load_tool($plugin->get_part('c'), $plugin->get_part('t'));

	// Can we use this tool?
	if (method_exists($tool, 'tool_active'))
	{
		if (($msg = $tool->tool_active()) !== true)
		{
			if ($msg === false)
			{
				$msg = $user->lang['TOOL_NOT_AVAILABLE'];
			}
			else
			{
				$msg = isset($user->lang[$msg]) ? $user->lang[$msg] : $msg;
			}

			trigger_error($msg);
		}
	}

	$error = array();
	if ($submit)
	{
		// In run_tool do whatever is required.  If there is an error, put it into the array and the display options will be ran again
		$tool->run_tool($error);
	}

	if (!$submit || !empty($error))
	{
        /*
        * Instead of building a page yourself you may return an array with the options you want to show.  This is outputted similar to how the acp_board is.
        * You may also send back a string if you just want a confirm box shown with that string used for the title
        */
		$options = $tool->display_options();

		if (is_array($options) && isset($options['vars']))
		{
			page_header($user->lang[$options['title']]);

			// Go through each error and see if the key exists in the $user->lang.  If it does, use that.
			if (!empty($error))
			{
				array_walk($error, 'use_lang');

				foreach ($error as $e)
				{
					$template->assign_block_vars('errormsgrow', array(
						'MSG'	=> $e,
					));
				}
			}

			$template->assign_vars(array(
				'L_TITLE'			=> $user->lang[$options['title']],
				'L_TITLE_EXPLAIN'	=> (isset($user->lang[$options['title'] . '_EXPLAIN'])) ? $user->lang[$options['title'] . '_EXPLAIN'] : '',
			));

			foreach ($options['vars'] as $name => $vars)
			{
				if (!is_array($vars) && strpos($name, 'legend') === false)
				{
					continue;
				}

				if (strpos($name, 'legend') !== false)
				{
					$template->assign_block_vars('options', array(
						'S_LEGEND'		=> true,
						'LEGEND'		=> (isset($user->lang[$vars])) ? $user->lang[$vars] : $vars)
					);

					continue;
				}

				$type = explode(':', $vars['type']);

				$l_explain = '';
				if ($vars['explain'] && isset($vars['lang_explain']))
				{
					$l_explain = (isset($user->lang[$vars['lang_explain']])) ? $user->lang[$vars['lang_explain']] : $vars['lang_explain'];
				}
				else if ($vars['explain'])
				{
					$l_explain = (isset($user->lang[$vars['lang'] . '_EXPLAIN'])) ? $user->lang[$vars['lang'] . '_EXPLAIN'] : '';
				}

				$content = build_cfg_template($type, $name, $vars);

				if (empty($content))
				{
					continue;
				}

				$template->assign_block_vars('options', array(
					'KEY'			=> $name,
					'TITLE'			=> (isset($user->lang[$vars['lang']])) ? $user->lang[$vars['lang']] : $vars['lang'],
					'S_EXPLAIN'		=> $vars['explain'],
					'TITLE_EXPLAIN'	=> $l_explain,
					'CONTENT'		=> $content['tpl'],

					// Find user link
					'S_FIND_USER'	=> (isset($content['find_user'])) ? true : false,
					'U_FIND_USER'	=> (isset($content['find_user'])) ? append_sid(PHPBB_ROOT_PATH . 'memberlist.' . PHP_EXT, array('mode' => 'searchuser', 'form' => 'select_user', 'field' => 'username', 'select_single' => 'true', 'form' => 'stk', 'field' => $content['find_user_field'])) : '',
				));
			}

			$template->set_filenames(array(
				'body' => 'tool_options.html',
			));

			page_footer();
		}
		else if (is_string($options))
		{
			if (confirm_box(true))
			{
				$tool->run_tool();
			}
			else
			{
				confirm_box(false, $options, '', 'confirm_body.html', STK_DIR_NAME . '/index.' . PHP_EXT . $plugin->url_arg(true));
			}
		}
		else
		{
			// The page should have been setup by the tool.  We will exit to prevent the redirect from below.
			exit;
		}
	}

	// Should never get here...
	redirect(append_sid(STK_INDEX, false, true, $user->session_id));
}
else
{
	// Output the main page
	page_header($user->lang['SUPPORT_TOOL_KIT']);

	// In de event the request category is empty force it to main.
	if (!$plugin->get_part('c'))
	{
		$plugin->set_part('c', 'main');
	}

	// Category title and desc if available
	$template->assign_vars(array(
		'L_TITLE'			=> $user->lang['CAT_' . strtoupper($plugin->get_part('c'))],
		'L_TITLE_EXPLAIN'	=> isset($user->lang['CAT_' . strtoupper($plugin->get_part('c')) . '_EXPLAIN']) ? $user->lang['CAT_' . strtoupper($plugin->get_part('c')) . '_EXPLAIN'] : '',
		'CAT'				=> $plugin->get_part('c'),
	));

	$template->set_filenames(array(
		'body' => 'index_body.html',
	));

	page_footer();
}
