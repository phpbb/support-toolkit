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
class stk_toolbox_version_check
{
	/**#@+
	 * Status constants
	 */
	const VERSION_OK = 1;
	const VERSION_WARNING = 2;
	const VERSION_BLOCKING = 3;
	const VERSION_DISABLED = 4;
	/**#@-*/

	/**
	 * Instance of this object.
	 * @var stk_toolbox_version_check
	 */
	static private $instance = null;

	/**
	 * Array holding the version information as fetched from the version check file
	 * @var array
	 */
	private $versionData = false;

	/**
	 * Initialise the version check object
	 *
	 * @param string $versionCheckFile URL to the versioncheck file
	 */
	final private function __construct($versionCheckFile, phpbb_cache_service $cache = null)
	{
		if (!is_null($cache))
		{
			$cache_driver = $cache->get_driver();
			$this->versionData = $cache_driver->get('_stk_versionData');
		}

		if ($this->versionData === false)
		{
			$opts = array(
				'http' => array(
					'method'		=> 'GET',
					'max_redirects' => '10',
					'user_agent'	=> 'phpBB Support Toolkit version checker',
				),
			);

			$context			= stream_context_create($opts);
			$stream				= fopen($versionCheckFile, 'r', false, $context);
			$responce			= stream_get_contents($stream);
			$this->versionData	= json_decode($responce);
			fclose($stream);

			if (!is_null($cache))
			{
				$cache_driver->put('_stk_versionData', $this->versionData);
			}
		}
	}

	/**
	 * Create a new version check object
	 *
	 * A singleton wrapper to assure only one instance is created
	 *
	 * @param string $versionCheckFile URL to the versioncheck file
	 * @return stk_toolbox_version_check Instance
	 */
	static public function getInstance($versionCheckFile = '', phpbb_cache_service $cache = null)
	{
		if (is_null(self::$instance))
		{
			self::$instance = new static($versionCheckFile, $cache);
		}

		return self::$instance;
	}

	public function testToolVersion($toolCategory, $toolName)
	{
		// Get the tool version
		$rc = new ReflectionClass("stktool_{$toolCategory}_{$toolName}");
		$toolVersion = $rc->getConstant('TOOL_VERSION');

		$versionCode = $this->getVersionResponce($toolCategory, $toolName, $toolVersion);
		return $versionCode;
	}

	/**
	 * Validate tool by version
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
	 * @param  string  $toolCategory The category the requested tool belongs to
	 * @param  string  $toolName     The name of the requested tool
	 * @return integer
	 */
	private function getVersionResponce($toolCategory, $toolName, $currentVersion)
	{
		$_versionData = $this->getVersionData($toolCategory, $toolName);

		// No version information
		if (empty($_versionData))
		{
			return self::VERSION_OK;
		}

		// This tool is "hard disabled"
		if (!empty($_versionData->disabled) && $_versionData->disabled === true)
		{
			return self::VERSION_DISABLED;
		}

		// There are blocking entries
		if (!empty($_versionData->blocking))
		{
			$lastBlocking = reset($_versionData->blocking);

			if (version_compare($currentVersion, $lastBlocking, '<='))
			{
				return self::VERSION_BLOCKING;
			}
		}

		// Our tool is outdated but isn't blocked so trigger an waring about that
		if (version_compare($currentVersion, $_versionData->latest, '<'))
		{
			return self::VERSION_WARNING;
		}

		// We're good
		return self::VERSION_OK;
	}

	/**
	 * Fetch version information
	 *
	 * @param  string   $toolCategory The category the requested tool belongs to
	 * @param  string   $toolName     The name of the requested tool
	 * @return stdClass               stdClass containing the requested version information
	 */
	public function getVersionData($toolCategory = '', $toolName = '')
	{
		$return = null;

		if (!empty($toolCategory) && !empty($toolName))
		{
			$return = (!empty($this->versionData->_tools->$toolCategory->$toolName)) ? $this->versionData->_tools->$toolCategory->$toolName : null;
		}
		else if (!empty($toolCategory) && $toolCategory == 'stk_')
		{
			$return = $this->versionData->_stk;
		}
		else if (!empty($toolCategory))
		{
			$return = (!empty($this->versionData->_tools->$toolCategory)) ? $this->versionData->_tools->$toolCategory : null;
		}
		else
		{
			$return = (!empty($this->versionData)) ? $this->versionData : null;
		}

		return $return;
	}
}
