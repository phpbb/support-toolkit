<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * Version check controller
 *
 *
 */
class stk_plugin_version_controller
{
	/**#@+
	 * Status constants
	 */
	const BLOCKED = 3;
	const DISABLED = 4;
	const OK = 1;
	const WARNING = 2;
	const NO_VERSION_DATA = 5;
	/**#@-*/

	private $cache;

	private $plugin_path;

	private $responces;

	private $version_data = array();

	private $version_data_raw = false;

	private $version_file;

	private $write_cache = false;

	/**
	 * Initialise the version check object
	 *
	 * @param string $version_file
	 */
	public function __construct($version_file, $plugin_path, stk_wrapper_cache_service $cache = null)
	{
		$this->cache		= $cache;
		$this->plugin_path	= $plugin_path;
		$this->responces	= ($cache) ? $cache->get('stk_version_responces_' . md5($version_file)) : false;
		$this->version_file	= $version_file;
	}

	/**
	 * Validate the version data for the requested plugin
	 *
	 * Tools are by version against the version check file. The followin scenarios
	 * are possible:
	 *  - No entry, there isn't any version information for this tool available,
	 *    in this case it is assumed that the tool is available for usage as it
	 *    is possible that this tool is a third party tool or a new tool that
	 *    isn't added to the version check file yet.
	 *  - Blocked, The version file can set certain versions in a "blocking" state
	 *    if the tools version is smaller than this given version the tool won't
	 *    be available.
	 *  - Warning, If the tool version is smaller than the version as specified
	 *    in the version file but isn't blocked by the "blocking" rule the tool
	 *    is available but the user will be warned about this.
	 *  - Up to date, The version of the tool is equal to the version entry in
	 *    the version file
	 *
	 * @param  string  $group    The category the requested tool belongs to
	 * @param  string  $plugin   The name of the requested tool
	 * @return integer
	 */
	public function validate($group, $plugin)
	{
		if (empty($this->version_data))
		{
			$this->get_version_data(false);
		}

		if (empty($this->responces[$group][$plugin]))
		{
			$this->responces[$group][$plugin] = self::OK;

			$version_data = array();
			if (!empty($this->version_data['_plugins'][$group][$plugin]))
			{
				$version_data = $this->version_data['_plugins'][$group][$plugin];
			}

			switch (true)
			{
				case !empty($version_data['disabled']) :
					$this->responces[$group][$plugin] = self::DISABLED;
				break;

				case empty($version_data) || empty($version_data['latest'])					:
				case !file_exists($this->plugin_path . "{$group}/{$plugin}/{$plugin}.json") :
					$this->responces[$group][$plugin] = self::NO_VERSION_DATA;
				break;

				default :
					$plugin_data = json_decode(file_get_contents($this->plugin_path . "{$group}/{$plugin}/{$plugin}.json"), true);

					// Plugin outdated
					if (empty($version_data['blocking']))
					{
						if (version_compare($plugin_data['version'], $version_data['latest'], '<'))
						{
							$this->responces[$group][$plugin] = self::WARNING;
						}
					}
					else
					{
						$last_blocking = end($version_data['blocking']);

						if (version_compare($plugin_data['version'], $last_blocking, '<='))
						{
							$this->responces[$group][$plugin] = self::BLOCKED;
						}
					}
			}

			// Make sure we recache
			$this->write_cache = true;
		}

		return $this->responces[$group][$plugin];
	}

	private function load()
	{
		if ($this->cache)
		{
			$this->version_data_raw = $this->cache->get('_stk_version_data_raw_' . md5($this->version_file));
		}

		if (false === $this->version_data_raw)
		{
			$opts = array(
				'http' => array(
					'method'		=> 'GET',
					'max_redirects' => '10',
					'user_agent'	=> 'phpBB Support Toolkit version checker',
				),
			);

			$context	= stream_context_create($opts);
			$stream		= fopen($this->version_file, 'r', false, $context);
			$this->version_data_raw = stream_get_contents($stream);
			fclose($stream);

			if ($this->cache)
			{
				$this->cache->put('_stk_version_data_raw_' . md5($this->version_file), $this->version_data_raw);
			}
		}
	}

	public function get_version_data($raw)
	{
		if (empty($this->version_data_raw))
		{
			$this->load();
		}

		if ($raw === false && empty($this->version_data))
		{
			$this->version_data = json_decode($this->version_data_raw, true);
		}

		return ($raw) ? $this->version_data_raw : $this->version_data;
	}

	/**
	 * @todo when events are here, write data through event on garbage collect
	 *
		if ($this->cache && $this->write_cache)
		{
			$this->cache->put('stk_version_responces_' . md5($this->version_file), $this->responces);
		}
	 */
}
