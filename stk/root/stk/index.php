<?php
/**
*
* @package Support Tool Kit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* TODO
*
* check out the reparse_bbcode tool, many people have had issues with this script.
*/

define('IN_PHPBB', true);
define('ADMIN_START', true);

if (!defined('PHPBB_ROOT_PATH')) { define('PHPBB_ROOT_PATH', './../'); }
if (!defined('PHPBB_EXT')) { define('PHP_EXT', substr(strrchr(__FILE__, '.'), 1)); }
define('STK_ROOT_PATH', PHPBB_ROOT_PATH . 'stk/');

$phpbb_root_path = PHPBB_ROOT_PATH;
$phpEx = PHP_EXT;

// Check to make sure the config file exists.  If not we will attempt critical repair.
if (!file_exists(PHPBB_ROOT_PATH . 'config.' . PHP_EXT))
{
	include(STK_ROOT_PATH . 'includes/functions_critical_repair.' . PHP_EXT);
	critical_config_repair();
	header('Location: ' . STK_ROOT_PATH . 'index.' . PHP_EXT);
	exit;
}

require(PHPBB_ROOT_PATH . 'common.' . PHP_EXT);
require(STK_ROOT_PATH . 'includes/functions.' . PHP_EXT);
require(STK_ROOT_PATH . 'includes/plugin.' . PHP_EXT);
require(STK_ROOT_PATH . 'includes/umil.' . PHP_EXT);

/* For testing the style repair (when testing comment out the header redirect line below or you'll have an infinate loop :P)
set_config('default_style', 0);
$db->sql_query('TRUNCATE TABLE ' . STYLES_TABLE);
$db->sql_query('TRUNCATE TABLE ' . STYLES_TEMPLATE_TABLE);
$db->sql_query('TRUNCATE TABLE ' . STYLES_THEME_TABLE);
$db->sql_query('TRUNCATE TABLE ' . STYLES_IMAGESET_TABLE);*/

// A basic check to make sure we will be able to get into the STK, not that the styles are messed up.
$sql = 'SELECT s.style_id FROM ' . STYLES_TABLE . ' s, ' . STYLES_TEMPLATE_TABLE . ' t, ' . STYLES_THEME_TABLE . ' c, ' . STYLES_IMAGESET_TABLE . " i
	WHERE s.style_id = {$config['default_style']}
		AND t.template_id = s.template_id
		AND c.theme_id = s.theme_id
		AND i.imageset_id = s.imageset_id";
$result = $db->sql_query($sql);
if (!$db->sql_fetchrow($result))
{
	// Styles appear to be broken.  Attempt automatic repair
	include(STK_ROOT_PATH . 'includes/functions_critical_repair.' . PHP_EXT);
	critical_style_repair();
	header('Location: ' . STK_ROOT_PATH . 'index.' . PHP_EXT);
	exit;
}
$db->sql_freeresult($result);


// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('acp/common', $config['default_style']);

// Language path.  We are using a custom language path to keep all the files within the stk/ folder.  First check if the $user->data['user_lang'] path exists, if not, check if the default lang path exists, and if still not use english.
stk_add_lang('common');

// Some extra stuff that can be done.  Don't add things here that require authentication.
$action = request_var('action', '');
switch ($action)
{
	// If the user wants to destroy their STK login cookie
	case 'stklogout' :
		setcookie('stk_key', '', (time() - 31536000));
		trigger_error('STK_LOGOUT_SUCCESS');
	break;
}

/*
* Start Login
*/
// We need the Support Tool Kit password
$stk_password = false;
if (file_exists(STK_ROOT_PATH . 'config.' . PHP_EXT))
{
	include(STK_ROOT_PATH . 'config.' . PHP_EXT);
}

// If the STK password isn't blank and the user isn't registered we will use the STK login method
if ($stk_password && !$user->data['is_registered'])
{
	/*
	* Allow Alternate login method
	*/
	// The password will be held in a cookie to keep them logged in
	$login_error = 'INCORRECT_PASSWORD';
	if (isset($_COOKIE['stk_key']))
	{
		$stk_cookie = ((STRIP) ? stripslashes($_COOKIE['stk_key']) : $_COOKIE['stk_key']);
		if (phpbb_check_hash($stk_password, $stk_cookie))
		{
			$login_error = false;
			$template->assign_var('S_STK_LOGIN', true);
		}
	}

	if ($login_error !== false)
	{
		if (isset($_POST['submit']))
		{
			$stk_key = request_var('stk_key', '');
			if (check_form_key('stk_login') && phpbb_check_hash($stk_password, phpbb_hash($stk_key)))
			{
				$login_error = false;
				$template->assign_var('S_STK_LOGIN', true);

				// When storing the cookie, hash the password so that *IF* the cookie is stolen, nothing can be done with the password.
				setcookie('stk_key', phpbb_hash($stk_key), time() + 31536000);
			}
			else if (!check_form_key('stk_login'))
			{
				$login_error = 'FORM_INVALID';
			}
		}

		// Display the login page.
		if (!isset($_POST['submit']) || $login_error !== false)
		{
			page_header($user->lang['LOGIN'], false);

			$template->assign_vars(array(
				'L_TITLE'				=> $user->lang['LOGIN'],
				'L_TITLE_EXPLAIN'		=> '',

				'S_ERROR'				=> (isset($_POST['submit'])) ? true : false,
				'ERROR_MSG'				=> $user->lang[$login_error],

				'U_ACTION'				=> append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, false, true, $user->session_id),
				'U_INDEX'				=> append_sid(PHPBB_ROOT_PATH . 'index.' . PHP_EXT),
			));
			add_form_key('stk_login');

			$content = build_cfg_template(array('password', '40', '255'), 'stk_key', array());
			$template->assign_vars(array(
				'FIELD'			=> $content['tpl'],
				'KEY'			=> 'stk_key',
				'TITLE'			=> $user->lang['SUPPORT_TOOL_KIT_PASSWORD'],
				'TITLE_EXPLAIN'	=> $user->lang['SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'],
			));
			
            // Do not use the normal template path (to prevent issues with boards using alternate styles)
			$template->set_custom_template(STK_ROOT_PATH . 'style/');

			$template->set_filenames(array(
				'body' => 'stk_login.html',
			));

			page_footer();
		}
	}
}
else
{
	/*
	* Use Normal login method (phpBB3)
	*/
	if (!$user->data['is_registered'])
	{
		// Could get here if no STK password is set.
		login_box();
	}

	// This requires that the user is logged in as an administrator (like how the ACP requires two logins)
	if (!isset($user->data['session_admin']) || !$user->data['session_admin'])
	{
		login_box('', $user->lang['LOGIN_ADMIN_CONFIRM'], $user->lang['LOGIN_ADMIN_SUCCESS'], true, false);
	}

	// Only Board Founders may use the STK
	if ($user->data['user_type'] != USER_FOUNDER)
	{
		trigger_error('BOARD_FOUNDER_ONLY');
	}
}

// Unset the password since we no longer need it
unset($stk_password);
/*
* End Login
*/

// Do not use the normal template path (to prevent issues with boards using alternate styles)
$template->set_custom_template(STK_ROOT_PATH . 'style', 'stk');

// Work around for a bug in phpBB3.
$user->theme['template_storedb'] = false;

// Setup some variables
$submit = (isset($_POST['submit']) || isset($_GET['submit'])) ? true : false;

// If they canceled redirect them to the STK index.
if (isset($_POST['cancel']))
{
	redirect(append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, false, true, $user->session_id));
}

// Setup the plugin manager
$plugin = new plugin();

// Output common stuff
$template->assign_vars(array(
	'U_ACTION'		=> append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, $plugin->url_arg(), true, $user->session_id),
	'U_ADM_INDEX'	=> append_sid(PHPBB_ROOT_PATH . 'adm/index.' . PHP_EXT, false, true, $user->session_id),
	'U_ADM_LOGOUT'	=> append_sid(PHPBB_ROOT_PATH . 'adm/index.' . PHP_EXT, 'action=admlogout', true, $user->session_id),
	'U_STK_INDEX'	=> append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, false, true, $user->session_id),
	'U_STK_LOGOUT'	=> append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, 'action=stklogout', true, $user->session_id),
	'U_BACK_TOOL'	=> ($plugin->req_tool) ? append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, $plugin->url_arg(), true, $user->session_id) : false,
	'U_INDEX'		=> append_sid(PHPBB_ROOT_PATH . 'index.' . PHP_EXT),
	'U_LOGOUT'		=> append_sid(PHPBB_ROOT_PATH . 'ucp.' . PHP_EXT, 'mode=logout', true, $user->session_id),

	'USERNAME'		=> $user->data['username'],
));

// Does the user want to run a tool?
if ($plugin->req_tool)
{
	// Load the tool
	$tool = $plugin->load_tool($plugin->req_cat, $plugin->req_tool);

	$error = array();
	if ($submit)
	{
		// In run_tool do whatever is required.  If there is an error, put it into the array and the display options will be ran again
		$tool->run_tool($error);
	}

	if (!$submit || sizeof($error))
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
			if (sizeof($error))
			{
				array_walk($error, 'use_lang');
			}

			$template->assign_vars(array(
				'L_TITLE'			=> $user->lang[$options['title']],
				'L_TITLE_EXPLAIN'	=> (isset($user->lang[$options['title'] . '_EXPLAIN'])) ? $user->lang[$options['title'] . '_EXPLAIN'] : '',

				'S_ERROR'			=> (sizeof($error)) ? true : false,
				'ERROR_MSG'			=> (sizeof($error)) ? implode('<br />', $error) : '',
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

				if (!sizeof($content))
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
					'U_FIND_USER'	=> (isset($content['find_user'])) ? append_sid(PHPBB_ROOT_PATH . 'memberlist.' . PHP_EXT, array('mode' => 'searchuser', 'form' => 'select_user', 'field' => 'username', 'select_single' => 'true', 'form' => 'admin_tool_kit', 'field' => $content['find_user_field'])) : '',
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
				confirm_box(false, $options);
			}
		}
		else
		{
			// The page should have been setup by the tool.  We will exit to prevent the redirect from below.
			exit;
		}
	}

	// Should never get here...
	redirect(append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, false, true, $user->session_id));
}
else
{
	// Output the main page
	page_header($user->lang['SUPPORT_TOOL_KIT']);

	// Set what is being displayed
	if (empty($plugin->req_cat) || $plugin->req_cat == 'main')
	{
		// Just the welcome page
		$template->assign_var('S_WELCOME', true);
	}
	else
	{
		// Category title and desc if available
		$template->assign_vars(array(
			'L_TITLE'			=> $user->lang['CAT_' . strtoupper($plugin->req_cat)],
			'L_TITLE_EXPLAIN'	=> isset($user->lang['CAT_' . strtoupper($plugin->req_cat) . '_EXPLAIN']) ? $user->lang['CAT_' . strtoupper($plugin->req_cat) . '_EXPLAIN'] : '',
		));
	}

	$template->set_filenames(array(
		'body' => 'index_body.html',
	));

	page_footer();
}
?>
