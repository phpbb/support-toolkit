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
	* Tool Info
	*
	* @return Returns an array with the info about this tool.
	*/
	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['PURGE_CACHE'],
			'NAME_EXPLAIN'	=> $user->lang['PURGE_CACHE_EXPLAIN'],

			'CATEGORY'		=> $user->lang['ADMIN_TOOLS'],
		);
	}

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
		global $cache;

		$cache->purge();

		trigger_error('PURGE_CACHE_COMPLETE');
	}
}

?>