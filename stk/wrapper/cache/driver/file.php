<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * STK File cache
 *
 * An extension to the phpBB file cache, this class adds session based
 * caching to the phpBB cache. Meaning that data is cached until the
 * `SID` changes.
 */
class stk_wrapper_cache_driver_file extends phpbb_cache_driver_file
{
	private $user;

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

		$data = parent::get($var_name);

		if ($var_name[0] == '_')
		{
			// Recache if the sid has been changed
			if ($data === false || $_SID != $data['sid'])
			{
				return false;
			}

			$data =  $data['data'];
		}

		return $data;
	}

	/**
	 * Put data into cache
	 */
	public function put($var_name, $var, $ttl = 31536000)
	{
		$var = array(
			'sid'	=> $this->user->data['session_id'],
			'data'	=> $var,
		);

		parent::put($var_name, $var, $ttl);
	}

	public function getCacheDir()
	{
		return $this->cache_dir;
	}

	public function setDependencies(Pimple $stk)
	{
		$this->user = $stk['phpbb']['user'];
	}
}
