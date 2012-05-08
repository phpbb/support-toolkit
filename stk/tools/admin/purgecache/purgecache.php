<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class plugin_admin_purgecache extends stk_plugin_base
{
	public function displayOptions()
	{
		return TOOL_OVERVIEW_TRIGGER;
	}

	public function run()
	{
		// Initialise the actual cache engine that is used by the board
		global $acm_type;
		$cache_factory	= new phpbb_cache_factory($acm_type);
		$cache_driver	= $cache_factory->get_driver();

		// Purge the cache
		$cache_driver->purge();

		return true;
	}
}
