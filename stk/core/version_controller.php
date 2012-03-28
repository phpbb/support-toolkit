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
class stk_core_version_controller
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
	 * Array holding the version information as fetched from the version check file
	 * @var array
	 */
	private $versionData = false;

	/**
	 * Initialise the version check object
	 *
	 * @param string $versionCheckFile URL to the versioncheck file
	 */
	public function __construct($versionCheckFile, phpbb_cache_service $cache)
	{
		$this->versionData = $cache->obtainSTKVersionData($versionCheckFile);
	}

	/**
	 * Test version of a given tool
	 *
	 * Check the version of the required tool against the corresponding
	 * entry in the version check file
	 *
	 * @param  String  $toolCategory The tools category
	 * @param  String  $toolName     The name of the requested tool
	 * @return Integer               Status code
	 */
	public function testToolVersion($toolCategory, $toolName)
	{
		// Get the tool version
		$rc = new ReflectionClass("stktool_{$toolCategory}_{$toolName}");
		$toolVersion = $rc->getConstant('TOOL_VERSION');

		$versionCode = $this->getVersionResponce($toolCategory, $toolName, $toolVersion);
		return $versionCode;
	}

	/**
	 * Test the version of the Support Toolkit itself
	 */
	public function testSTKVersion()
	{
		$versionCode = $this->getVersionResponce('stk_', '', STK_VERSION);

		// Throw error when disabled
		if ($versionCode == self::VERSION_DISABLED)
		{
			$_versionData = $this->getVersionData('stk_');

			$reason = (!empty($_versionData->reason)) ? $_versionData->reason : 'STK_HARD_DISABLED';
			throw new stk_exceptions_version($reason);
		}
	}

	/**
	 * Get the tools version data and validate the provided information
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
	 * @param  string  $toolCategory   The category the requested tool belongs to
	 * @param  string  $toolName       The name of the requested tool
	 * @param  string  $currentVersion The version that is installed
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
	 * Get the requested selection from the version data
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