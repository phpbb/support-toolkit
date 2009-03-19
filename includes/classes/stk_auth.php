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
 * @ignore
 */
if (!defined('IN_STK'))
{
	exit ();
}

if (!class_exists('auth'))
{
	include PHPBB_ROOT_PATH . 'includes/auth.' . PHP_EXT;
}

class stk_auth extends auth
{
	function stk_login($username, $password, $autologin = false, $viewonline = 1, $admin = 0)
	{
		if (!STK_STANDALONE && !defined('STK_LOGIN'))
		{
			return $this->login($username, $password, $autologin, $viewonline, $admin);
		}
		else
		{
			
		}
	}
}

?>