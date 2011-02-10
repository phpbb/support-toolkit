<?php
/**
*
* @package Support Toolkit
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

			if (empty($tpl_type[1]))
			{
				$tpl['tpl'] = '<input type="checkbox" id="' . $name . '" name="' . $name . '"' . $checked . ' />';
			}
			else
			{
				$tpl['tpl'] = '<input type="radio" id="' . $name . '" name="' . $tpl_type[1] . '" value="' . $name . '"' . $checked . ' />';
			}
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

	$lang_key = user_lang($lang_key);
}

/**
* A wrapper function for the phpBB $user->lang() call. This method was introduced
* in phpBB 3.0.3. In all versions ≥ 3.0.3 this function will simply call the method
* for the other versions this method will imitate the method as seen in 3.0.3.
*
* More advanced language substitution
* Function to mimic sprintf() with the possibility of using phpBB's language system to substitute nullar/singular/plural forms.
* Params are the language key and the parameters to be substituted.
* This function/functionality is inspired by SHS` and Ashe.
*
* Example call: <samp>$user->lang('NUM_POSTS_IN_QUEUE', 1);</samp>
*/
function user_lang()
{
	global $user;

	$args = func_get_args();

	if (method_exists($user, 'lang'))
	{
		return call_user_func_array(array($user, 'lang'), $args);
	}
	else
	{
		$key = $args[0];

		// Return if language string does not exist
		if (!isset($user->lang[$key]) || (!is_string($user->lang[$key]) && !is_array($user->lang[$key])))
		{
			return $key;
		}

		// If the language entry is a string, we simply mimic sprintf() behaviour
		if (is_string($user->lang[$key]))
		{
			if (sizeof($args) == 1)
			{
				return $user->lang[$key];
			}

			// Replace key with language entry and simply pass along...
			$args[0] = $user->lang[$key];
			return call_user_func_array('sprintf', $args);
		}

		// It is an array... now handle different nullar/singular/plural forms
		$key_found = false;

		// We now get the first number passed and will select the key based upon this number
		for ($i = 1, $num_args = sizeof($args); $i < $num_args; $i++)
		{
			if (is_int($args[$i]))
			{
				$numbers = array_keys($user->lang[$key]);

				foreach ($numbers as $num)
				{
					if ($num > $args[$i])
					{
						break;
					}

					$key_found = $num;
				}
			}
		}

		// Ok, let's check if the key was found, else use the last entry (because it is mostly the plural form)
		if ($key_found === false)
		{
			$numbers = array_keys($user->lang[$key]);
			$key_found = end($numbers);
		}

		// Use the language string we determined and pass it to sprintf()
		$args[0] = $user->lang[$key][$key_found];
		return call_user_func_array('sprintf', $args);
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
* @param	mixed	$force_lang	If this parameter contains an ISO code this language
*								is used for the file. If set to "false" the users default
*								langauge will be used
*/
function stk_add_lang($lang_file, $fore_lang = false)
{
	global $config, $user;

	// Internally cache some data
	static $lang_data	= array();
	static $lang_dirs	= array();
	static $is_302		= null;

	// Store current phpBB data
	if (empty($lang_data))
	{
		$lang_data = array(
			'lang_path'	=> $user->lang_path,
			'lang_name'	=> $user->lang_name,
		);
	}

	// Empty the lang_name
	$user->lang_name = '';

	// Find out what languages we could use
	if (empty($lang_dirs))
	{
		$lang_dirs = array(
			$user->data['user_lang'],			// User default
			basename($config['default_lang']),	// Board default
			'en',								// System default
		);

		// Only unique dirs
		$lang_dirs = array_unique($lang_dirs);
	}

	// Which phpBB version is the user using
	if (is_null($is_302))
	{
		// There are different ways of handling language paths due to the changes
		// made in phpBB 3.0.3 (set custom lang path)
		if (version_compare($config['version'], '3.0.2', '<='))
		{
			$is_302 = true;
		}
		else
		{
			$is_302 = false;
		}
	}

	// Switch to the STK language dir
	$user->lang_path = STK_ROOT_PATH . 'language/';

	// Test all languages
	foreach ($lang_dirs as $dir)
	{
		// When forced skip all others
		if ($fore_lang !== false && $dir != $fore_lang)
		{
			continue;
		}

		if (file_exists($user->lang_path . $dir . "/{$lang_file}." . PHP_EXT))
		{
			$user->lang_name = $dir;
			break;
		}
	}

	// No language file :/
	if (empty($user->lang_name))
	{
		trigger_error("Language file: {$lang_file}." . PHP_EXT . ' missing!', E_USER_ERROR);
	}

	// In phpBB <= 3.0.2 the lang_name is stored in the lang_path
	if ($is_302)
	{
		$user->lang_path .= $user->lang_name . '/';
	}

	// Add the file
	$user->add_lang($lang_file);

	// Now reset the paths so phpBB can continue to operate as usual
	$user->lang_path = $lang_data['lang_path'];
	$user->lang_name = $lang_data['lang_name'];
}

/**
 * Perform all quick tasks that has to be ran before we authenticate
 *
 * @param	String	$action	The action to perform
 */
function perform_unauthed_quick_tasks($action)
{
	global $template, $user;

	switch ($action)
	{
		// If the user wants to destroy their STK login cookie
		case 'stklogout' :
			setcookie('stk_token', '', (time() - 31536000));
			$user->unset_admin();
			meta_refresh(3, append_sid(PHPBB_ROOT_PATH . 'index.' . PHP_EXT));
			trigger_error('STK_LOGOUT_SUCCESS');
		break;

		// Generate the passwd file
		case 'genpasswdfile' :
			// Create a 25 character alphanumeric password (easier to select with a browser and won't cause confusion like it could if it ends in "." or something).
			$_pass_string = substr(preg_replace(array('#([^a-zA-Z0-9])#', '#0#', '#O#'), array('', 'Z', 'Y'), phpbb_hash(unique_id())), 2, 25);

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
* Support Toolkit emergency password.
* The file was generated on: " . $user->format_date($_pass_exprire - 21600, 'd/M/Y H:i.s', true)) . " and will expire on: " . $user->format_date($_pass_exprire, 'd/M/Y H:i.s', true) . ".
*/

// This file can only be from inside the Support Toolkit
if (!defined('IN_PHPBB') || !defined('STK_VERSION'))
{
	exit;
}

\$stk_passwd\t\t\t\t= '{$_pass_string}';
\$stk_passwd_expiration\t= {$_pass_exprire};
";
			exit_handler();
		break;
	}
}

/**
 * Perform all quick tasks that require the user to be authenticated
 *
 * @param	String	$action	The action we'll be performing
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

	// We cache the result, check once per session
	$version_check = $cache->get('_stk_version_check');
	if (!$version_check || $version_check['last_check_session'] != $user->session_id || isset($_GET['force_check']))
	{
		// Make sure that the cache file is distroyed if we got one
		if ($version_check || isset($_GET['force_check']))
		{
			$cache->destroy('_stk_version_check');
		}

		// Lets collect the latest version data. We can use UMIL for this
		$info = $umil->version_check('version.phpbb.com', '/stk', ((defined('STK_QA') && STK_QA) ? 'stk_qa.txt' : 'stk.txt'));

		// Compare it and cache the info
		$version_check = array();
		if (is_array($info) && isset($info[0]) && isset($info[1]))
		{
			if (version_compare(STK_VERSION, $info[0], '<'))
			{
				$version_check = array(
					'outdated'	=> true,
					'latest'	=> $info[0],
					'topic'		=> $info[1],
					'current'	=> STK_VERSION,
				);
			}

			$version_check['last_check_session'] = $user->session_id;

			// We've gotten some version data, cache the result for a hour or until the session id changes
			$cache->put('_stk_version_check', $version_check, 3600);
		}
	}

	// Something went wrong while retrieving the version file, lets inform the user about this, but don't kill the STK
	if (empty($version_check))
	{
		$template->assign_var('S_NO_VERSION_FILE', true);
		return;
	}
	// The STK is outdated, kill it!!!
	else if (isset($version_check['outdated']) && $version_check['outdated'] === true)
	{
		// Need to clear the $user->lang array to prevent the error page from breaking
		$msg = sprintf($user->lang['STK_OUTDATED'], $version_check['latest'], $version_check['current'], $version_check['topic'], append_sid(STK_ROOT_PATH . $user->page['page_name'], $user->page['query_string'] . '&amp;force_check=1'));

		// Trigger
		trigger_error($msg, E_USER_ERROR);
	}
}

/**
* Wrapper function for the default phpBB msg_handler method.
* This function will overwrite the $phpbb_root_path variable
* if $errno == E_USER_ERROR. This way the "return to index"
* link on the error page will point towards the STK index
* instead of the phpBB index
*/
function stk_msg_handler($errno, $msg_text, $errfile, $errline)
{
	// Sometimes phpBB call this after finishing a certain task, this breaks the ERK!
	// A little bit of fallback here, call the critical repair kit error handler
	if (defined('IN_ERK'))
	{
		global $critical_repair;
		$critical_repair->trigger_error($msg_text, false, array($errno, $errfile, $errline));
	}

	// If the STK triggers a fatal error before IN_STK is defined we'll show a page
	// informing the user that the ERK *might* resolve this issue.
	if (!defined('IN_STK') && in_array($errno, array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE)))
	{
		// Trigger error through the critical repair class
		if (!class_exists('critical_repair'))
		{
			include STK_ROOT_PATH . 'includes/critical_repair.' . PHP_EXT;
		}
		$cr = new critical_repair();

		if ($errno == E_USER_ERROR)
		{
			$lines = array(
				'The Support Toolkit encountered a fatal error.',
				'The Support Toolkit includes an Emergency Repair Kit (ERK), a tool designed to resolve certain errors that prevent phpBB from functioning. It is advised that you run the ERK now so it can attempt to repair the error it has detected.<br />
To run the ERK, click <a href="' . STK_ROOT_PATH . 'erk.php">here</a>.',
			);
			$redirect_stk = false;
		}
		else
		{
			$lines = array($msg_text);
			$redirect_stk = true;
		}

		// Trigger
		$cr->trigger_error($lines, $redirect_stk);
	}

	// This is nasty :(
	if ($errno == E_USER_ERROR)
	{
		global $phpbb_root_path;

		$phpbb_root_path = STK_ROOT_PATH;
	}

	// Call the phpBB error message handler
	msg_handler($errno, $msg_text, $errfile, $errline);
}

//-- Wrappers for functions that only exist in newer php version
if (!function_exists('array_fill_keys'))
{
	/**
	* Fills an array with the value of the value parameter, using the values of the keys array as keys.
	* @param Array $keys Array of values that will be used as keys. Illegal values for key will be converted to string.
	* @param mixed $value Value to use for filling
	*/
	function array_fill_keys($keys, $value)
	{
		$array = array();

		foreach ($keys as $key)
		{
			$array[$key] = $value;
		}

		return $array;
	}
}

if (!function_exists('adm_back_link'))
{
	/**
	* Generate back link for acp pages
	*/
	function adm_back_link($u_action)
	{
		return '<br /><br /><a href="' . $u_action . '">&laquo; ' . user_lang('BACK_TO_PREV') . '</a>';
	}
}

// php.net, laurynas dot butkus at gmail dot com, http://us.php.net/manual/en/function.html-entity-decode.php#75153
function html_entity_decode_utf8($string)
{
	static $trans_tbl;

	// replace numeric entities
	$string = preg_replace('~&#x([0-9a-f]+);~ei', '_code2utf8(hexdec("\\1"))', $string);
	$string = preg_replace('~&#([0-9]+);~e', '_code2utf8(\\1)', $string);

	// replace literal entities
	if (!isset($trans_tbl))
	{
		$trans_tbl = array();

		foreach (get_html_translation_table(HTML_ENTITIES) as $val => $key)
		{
			$trans_tbl[$key] = utf8_encode($val);
		}
	}

	return strtr($string, $trans_tbl);
}

// Returns the utf string corresponding to the unicode value (from php.net, courtesy - romans@void.lv)
function _code2utf8($num)
{
	$return = '';

	if ($num < 128)
	{
		$return = chr($num);
	}
	else if ($num < 2048)
	{
		$return = chr(($num >> 6) + 192) . chr(($num & 63) + 128);
	}
	else if ($num < 65536)
	{
		$return = chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
	}
	else if ($num < 2097152)
	{
		$return = chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
	}

	return $return;
}

/**
* wrapper for pathinfo($file, PATHINFO_FILENAME), as PATHINFO_FILENAME is
* php > 5.2
* Function by php [spat] hm2k.org (http://www.php.net/manual/en/function.pathinfo.php#88159)
 */
function pathinfo_filename($file) { //file.name.ext, returns file.name
	if (defined('PATHINFO_FILENAME'))
	{
		return pathinfo($file, PATHINFO_FILENAME);
	}

	if (strstr($file, '.'))
	{
		return substr($file, 0, strrpos($file, '.'));
	}
}
