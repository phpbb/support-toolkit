<?php
/**
*
* @package Support Toolkit - Purge Cache
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

class purge_cache
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return 'PURGE_CACHE';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		global $auth, $cache;

		$cache->purge();

		// Clear permissions
		$auth->acl_clear_prefetch();
		cache_moderators();

		add_log('admin', 'LOG_PURGE_CACHE');

		trigger_error('PURGE_CACHE_COMPLETE');
	}
}
