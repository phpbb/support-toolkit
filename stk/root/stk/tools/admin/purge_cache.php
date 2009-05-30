<?php
/**
*
* @package Support Tool Kit - Purge Cache
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
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
		global $cache, $db;

		// Purge the auth cache in the users table
		$db->sql_query('UPDATE ' . USERS_TABLE . ' SET user_permissions = \'\'');

		$cache->purge();

		trigger_error('PURGE_CACHE_COMPLETE');
	}
}

?>