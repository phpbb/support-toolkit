<?php
/**
*
* @package Support Tool Kit - Auto Cookies
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class auto_cookies
{
	/**
	* Tool Info
	*
	* @return Returns an array with the info about this tool.
	*/
	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['AUTO_COOKIES'],
			'NAME_EXPLAIN'	=> $user->lang['AUTO_COOKIES_EXPLAIN'],
		);
	}

	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $config, $user;

		$user->add_lang('acp/board');

		return array(
			'title'	=> 'AUTO_COOKIES',
			'vars'	=> array(
				'legend1'				=> 'AUTO_COOKIES',
				'cookie_domain'			=> array('lang' => 'COOKIE_DOMAIN', 'type' => 'text:40:255', 'explain' => false, 'default' => ((!empty($_SERVER['HTTP_HOST'])) ? strtolower($_SERVER['HTTP_HOST']) : ((!empty($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : getenv('SERVER_NAME')))),
				'cookie_name'			=> array('lang' => 'COOKIE_NAME', 'type' => 'text:40:255', 'explain' => false, 'default' => $config['cookie_name']),
				'cookie_path'			=> array('lang' => 'COOKIE_PATH', 'type' => 'text:40:255', 'explain' => false, 'default' => substr($_SERVER['PHP_SELF'], 0, -13)),
				'cookie_secure'			=> array('lang' => 'COOKIE_SECURE', 'type' => 'radio:disabled_enabled', 'explain' => true, 'default' => ((isset($_SERVER['HTTPS'])) ? true : false)),
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
?>