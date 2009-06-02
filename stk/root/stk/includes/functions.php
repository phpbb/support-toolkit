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
* Build configuration template for acp configuration pages
*
* Slightly modified from adm/index.php
*/
function build_cfg_template($tpl_type, $name, $vars)
{
	global $user;

	$tpl = array();

	// Give the option to not do a request_var here and never do it for password fields.
	if ((!isset($vars['no_request_var']) || !$vars['no_request_var']) && $tpl_type[0] != 'password')
	{
		$default = (isset($vars['default'])) ? request_var($name, $vars['default']) : request_var($name, '');
	}
	else
	{
		$default = (isset($vars['default'])) ? $vars['default'] : '';
	}

	switch ($tpl_type[0])
	{
		case 'text':
			// If requested set some vars so that we later can display the link correct
			if (isset($vars['select_user']) && $vars['select_user'] === true)
			{
				$tpl['find_user']		= true;
				$tpl['find_user_field']	= $name;
			}
		case 'password':
			$size = (int) $tpl_type[1];
			$maxlength = (int) $tpl_type[2];

			$tpl['tpl'] = '<input id="' . $name . '" type="' . $tpl_type[0] . '"' . (($size) ? ' size="' . $size . '"' : '') . ' maxlength="' . (($maxlength) ? $maxlength : 255) . '" name="' . $name . '" value="' . $default . '" />';
		break;

		case 'textarea':
			$rows = (int) $tpl_type[1];
			$cols = (int) $tpl_type[2];

			$tpl['tpl'] = '<textarea id="' . $name . '" name="' . $name . '" rows="' . $rows . '" cols="' . $cols . '">' . $default . '</textarea>';
		break;

		case 'radio':
			$name_yes	= ($default) ? ' checked="checked"' : '';
			$name_no	= (!$default) ? ' checked="checked"' : '';

			$tpl_type_cond = explode('_', $tpl_type[1]);
			$type_no = ($tpl_type_cond[0] == 'disabled' || $tpl_type_cond[0] == 'enabled') ? false : true;

			$tpl_no = '<label><input type="radio" name="' . $name . '" value="0"' . $name_no . ' class="radio" /> ' . (($type_no) ? $user->lang['NO'] : $user->lang['DISABLED']) . '</label>';
			$tpl_yes = '<label><input type="radio" id="' . $name . '" name="' . $name . '" value="1"' . $name_yes . ' class="radio" /> ' . (($type_no) ? $user->lang['YES'] : $user->lang['ENABLED']) . '</label>';

			$tpl['tpl'] = ($tpl_type_cond[0] == 'yes' || $tpl_type_cond[0] == 'enabled') ? $tpl_yes . $tpl_no : $tpl_no . $tpl_yes;
		break;

		case 'checkbox':
			$checked	= ($default) ? ' checked="checked"' : '';

			$tpl['tpl'] = '<input type="checkbox" id="' . $name . '" name="' . $name . '"' . $checked . ' />';
		break;

		case 'select':
		case 'select_multiple' :
		case 'custom':

			$return = '';

			if (isset($vars['function']))
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
							$value = $default;
						break;

						case '{KEY}':
							$value = $name;
						break;
					}

					$args[] = $value;
				}
			}
			else
			{
				$args = array($default, $name);
			}

			$return = call_user_func_array($call, $args);

			if ($tpl_type[0] == 'select')
			{
				$tpl['tpl'] = '<select id="' . $name . '" name="' . $name . '">' . $return . '</select>';
			}
			else if ($tpl_type[0] == 'select_multiple')
			{
				$tpl['tpl'] = '<select id="' . $name . '" name="' . $name . '[]" multiple="multiple">' . $return . '</select>';
			}
			else
			{
				$tpl['tpl'] = $return;
			}

		break;

		default:
		break;
	}

	if (isset($vars['append']))
	{
		$tpl['tpl'] .= $vars['append'];
	}

	return $tpl;
}

/**
* Use Lang
*
* A function for checking if a language key exists and changing the inputted var to the language value if it does.
* Build for the array_walk used on $error
*/
function use_lang(&$lang_key)
{
	global $user;

	if (isset($user->lang[$lang_key]))
	{
		$lang_key = $user->lang[$lang_key];
	}
}

/**
* Stk add lang
*
* A wrapper for the $user->add_lang method that will use the custom language path that is used
* in this tool kit.
* The function shall first try to include the file in the users language, if that fails it will
* take the boards default language, if that also fails it will fall back to English
*
* @param	String	$lang_file	the name of the language file
*/
function stk_add_lang($lang_file = '')
{
	global $config, $user;

	// Path from the default lang directory
	$path = './../../stk/language/';

	// Set the correct language path
	if (file_exists(STK_ROOT_PATH . "language/{$user->data['user_lang']}/{$lang_file}." . PHP_EXT))
	{
		$path .= $user->data['user_lang'];
	}
	else if (file_exists(STK_ROOT_PATH . 'language/' . basename($config['default_lang']) . "/{$lang_file}." . PHP_EXT))
	{
		$path .= basename($config['default_lang']);
	}
	else if (file_exists(STK_ROOT_PATH . "language/en/{$lang_file}." . PHP_EXT))
	{
		$path .= 'en';
	}
	else
	{
		// This should really never happen
		trigger_error("Language file stk/language/{$user->data['user_lang']}/$lang_file." . PHP_EXT . ' missing!', E_USER_ERROR);
	}

	// Include the file
	$user->add_lang($path . '/' . $lang_file);
}

/**
* Output a custom page. This function will do two things:
* 1) Assign two template variables: {L_TITLE} and {L_TITLE_EXPLAIN}, based on the content of $title.
* 2) Parse the page
*
* @param	String	$file				The template file that is used for this page (minus .html)
* @param	String	$title				The page title, can be a key for the user->lang array
* @param	array	$sprintf_title		A array with replacements for the title
* @param	array	$sprintf_explain	A array with replacemetns for the explain text
*/
function parse_page($file, $title = '', $sprintf_title = array(), $sprintf_explain = array())
{
	global $template, $user;

	// Also allow the tool author to use only the lang key
	$l_title	= (isset($user->lang[$title])) ? $user->lang[$title] : $title;
	$l_explain	= (isset($user->lang[$title . '_EXPLAIN'])) ? $user->lang[$title . '_EXPLAIN'] : '';	// Only set if the key exists

	// Run vsprintf if needed
	if (!empty($sprintf_title))
	{
		$l_title = vsprintf($l_title, $sprintf_title);
	}
	if (!empty($sprintf_explain))
	{
		$l_explain = vsprintf($l_explain, $sprintf_explain);
	}

	// Set the template vars
	$template->assign_vars(array(
		'L_TITLE'			=> $l_title,
		'L_TITLE_EXPLAIN'	=> $l_explain,
	));

	page_header($l_title);

	$template->set_filenames(array(
		'body' => $file . '.html',
	));

	page_footer();
}

/**
 * Perform all quick tasks that has to be ran before we authenticate
 *
 * @param String $action
 */
function perform_unauthed_quick_tasks($action)
{
	global $template, $user;

	switch ($action)
	{
		// If the user wants to destroy their STK login cookie
		case 'stklogout' :
			setcookie('stk_token', '', (time() - 31536000));
			meta_refresh(3, append_sid(PHPBB_ROOT_PATH . 'index.' . PHP_EXT));
			trigger_error('STK_LOGOUT_SUCCESS');
		break;

		// Generate the passwd file
		case 'genpasswdfile' :
			// Create a 25 character alphanumeric password (easier to select with a browser and won't cause confusion like it could if it ends in "." or something).
			$_pass_string = substr(preg_replace("#([^a-zA-Z0-9])#", '', phpbb_hash(unique_id())), 2, 25);

			// The password is usable for 6 hours from now
			$_pass_exprire = time() + 21600;

			// Print a message and tell the user what to do and where to download this page
			page_header($user->lang['GEN_PASS_FILE'], false);

			$template->assign_vars(array(
				'PASS_GENERATED'			=> sprintf($user->lang['PASS_GENERATED'], $_pass_string, $user->format_date($_pass_exprire, false, true)),
				'PASS_GENERATED_REDIRECT'	=> sprintf($user->lang['PASS_GENERATED_REDIRECT'], append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT)),
				'S_HIDDEN_FIELDS'			=> build_hidden_fields(array('pass_string' => $_pass_string, 'pass_exp' => $_pass_exprire)),
				'U_ACTION'					=> append_sid(STK_INDEX, array('action' => 'downpasswdfile')),
			));

			$template->set_filenames(array(
				'body'	=> 'gen_password.html',
			));
			page_footer(false);
		break;

		// Download the passwd file
		case 'downpasswdfile' :
			$_pass_string	= request_var('pass_string', '', true);
			$_pass_exprire	= request_var('pass_exp', 0);

			// Something went wrong, stop execution
			if (!isset($_POST['download_passwd']) || empty($_pass_string) || $_pass_exprire <= 0)
			{
				trigger_error($user->lang['GEN_PASS_FAILED'], E_USER_ERROR);
			}

			// Create the file and let the user download it
			header('Content-Type: text/x-delimtext; name="passwd.' . PHP_EXT . '"');
			header('Content-disposition: attachment; filename=passwd.' . PHP_EXT);

			print ("<?php
/**
* Support Tool Kit emergency password. Generated on: " . $user->format_date($_pass_exprire - 21600, false, true)) . " expires on: " . $user->format_date($_pass_exprire, false, true) . "
*/

\$stk_passwd\t\t\t\t= '{$_pass_string}';
\$stk_passwd_expiration\t= {$_pass_exprire};
?>";
			exit_handler();
		break;
	}
}

/**
 * Perform all quick tasks that require the user to be authenticated
 *
 * @param String $action
 */
function perform_authed_quick_tasks($action)
{
	global $user;

	switch ($action)
	{
		// User wants to logout and remove the password file
		case 'delpasswdfilelogout' :
			$logout = true;

			// No Break;

		// If the user wants to distroy the passwd file
		case 'delpasswdfile' :
			if (file_exists(STK_ROOT_PATH . 'passwd.' . PHP_EXT) && false === @unlink(STK_ROOT_PATH . 'passwd.' . PHP_EXT))
			{
				// Shouldn't happen. Kill the script
				trigger_error($user->lang['FAIL_REMOVE_PASSWD'], E_USER_ERROR);
			}

			// Log him out
			if ($logout)
			{
				perform_unauthed_quick_tasks('stklogout');
			}
		break;
	}
}

/**
 * Check the STK version. If out of date
 * block access to the kit
 * @return unknown_type
 */
function stk_version_check()
{
	global $cache, $template, $umil, $user;
	
	// We run this before the session is start so we'll have to define some language constructs here.
	$user->lang['FILE_NOT_FOUND']	= 'The requested file could not be found.';
	$user->lang['FSOCK_DISABLED']	= 'The operation could not be completed because the <var>fsockopen</var> function has been disabled or the server being queried could not be found.';
	$user->lang['STK_OUTDATED']		= 'Your Support Tool Kit installation appears to be out of date. The latest available version is <strong style="color: #008000;">%1$s</strong>, while the version your have installed is <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Due to the large impact of this tool on your phpBB installation, it has been disabled until an update is performed. We strongly recommend keeping all software running on your server up to date. For more information regarding the latest update, please see the <a href="%3$s">release topic</a>.';
	
	
	// We cache the result, check once per session
	$version_check = $cache->get('_stk_version_check');
	if (!$version_check || $version_check['last_check_session'] != $user->session_id)
	{
		// If we have a cache file trash it
		if ($version_check)
		{
			$cache->destroy('_stk_version_check');
		}
		
		// Lets collect the latest version data. We can use UMIL for this
		$info = $umil->version_check('code.phpbb.com', '/svn/support-toolkit/branches/versioncheck', 'stk_version.txt');
		
		// Compare it and cache the info
		if (is_array($info) && isset($info[0]) && isset($info[1]))
		{
			$version_check = array();
			if (version_compare(STK_VERSION, $info[0], '<'))
			{
				$version_check['outdated']	= true;
				$version_check['latest']	= $info[0];
				$version_check['topic']		= $info[1];
			}
			
			$version_check['last_check_session'] = $user->session_id;
		}
		$cache->put('_stk_version_check', $version_check);
	}
	
	// If we're out of date display the warning
	if (isset($version_check['outdated']) && $version_check['outdated'] == true)
	{
		// Need to clear the $user->lang array to prevent the error page from breaking
		$msg = sprintf($user->lang['STK_OUTDATED'], $version_check['latest'], STK_VERSION, $version_check['topic']);
		$user->lang = array();
		
		// Trigger
		trigger_error($msg, E_USER_ERROR);
	}
}
?>