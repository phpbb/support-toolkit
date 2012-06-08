<?php
/**
*
* @package Support Toolkit - Auto Cookies
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

class auto_cookies
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $config, $user;

		$user->add_lang('acp/board');

		// Remove "www". Bug #62132
		$_domain = ((!empty($_SERVER['HTTP_HOST'])) ? htmlspecialchars(strtolower($_SERVER['HTTP_HOST']), ENT_COMPAT, 'UTF-8') : ((!empty($_SERVER['SERVER_NAME'])) ? htmlspecialchars($_SERVER['SERVER_NAME'], ENT_COMPAT, 'UTF-8') : htmlspecialchars(getenv('SERVER_NAME'), ENT_COMPAT, 'UTF-8')));
		$_domain = (strpos($_domain, 'www') === 0) ? substr($_domain, 3) : $_domain;

		return array(
			'title'	=> 'AUTO_COOKIES',
			'vars'	=> array(
				'legend1'				=> 'AUTO_COOKIES',
				'cookie_domain'			=> array('lang' => 'COOKIE_DOMAIN', 'type' => 'text:40:255', 'explain' => false, 'default' => $_domain),
				'cookie_name'			=> array('lang' => 'COOKIE_NAME', 'type' => 'text:40:255', 'explain' => false, 'default' => $config['cookie_name']),
				'cookie_path'			=> array('lang' => 'COOKIE_PATH', 'type' => 'text:40:255', 'explain' => false, 'default' => htmlspecialchars(substr($_SERVER['PHP_SELF'], 0, -13)), ENT_COMPAT, 'UTF-8'),
				'cookie_secure'			=> array('lang' => 'COOKIE_SECURE', 'type' => 'radio:disabled_enabled', 'explain' => true, 'default' => ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? true : false)),
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
		if (!check_form_key('auto_cookies'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		set_config('cookie_domain', request_var('cookie_domain', ''));
		set_config('cookie_name', request_var('cookie_name', ''));
		set_config('cookie_path', request_var('cookie_path', ''));
		set_config('cookie_secure', request_var('cookie_secure', 0));

		trigger_error('COOKIE_SETTINGS_UPDATED');
	}
}
