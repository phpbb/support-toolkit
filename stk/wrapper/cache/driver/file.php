<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * STK User class
 *
 * Suppor toolkit file cache service.
 * Based upon the phpBB file cache but enables session timed caching
 */
class stk_wrapper_cache_driver_file extends phpbb_cache_driver_file
{
	/**
	 * Set cache path
	 */
	public function __construct()
	{
		parent::__construct(STK_ROOT . 'cache/');
	}

	/**
	 * Get saved cache object
	 */
	public function get($var_name)
	{
		global $_SID;

		if ($var_name[0] == '_')
		{
			global $phpEx;

			if (!$this->_exists($var_name))
			{
				return false;
			}

			$data = $this->_read('data' . $var_name);

			// Recache if the sid has been changed
			if ($_SID != $data['sid'])
			{
				return false;
			}

			return $data['data'];
		}
		else
		{
			return ($this->_exists($var_name)) ? $this->vars[$var_name] : false;
		}
	}

	/**
	 * Put data into cache
	 */
	public function put($var_name, $var, $ttl = 31536000)
	{
		// Inject some information
		global $user;

		$var = array(
			'sid'	=> $user->data['session_id'],
			'data'	=> $var,
		);

		if ($var_name[0] == '_')
		{
			$this->_write('data' . $var_name, $var, time() + $ttl);
		}
		else
		{
			$this->vars[$var_name] = $var;
			$this->var_expires[$var_name] = time() + $ttl;
			$this->is_modified = true;
		}
	}

	public function getCacheDir()
	{
		return $this->cache_dir;
	}
}
