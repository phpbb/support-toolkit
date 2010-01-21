<?php
/**
*
* @package Support Toolkit - Recache moderators
* @version $Id$
* @copyright (c) 2010 phpBB Group
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

class recache_moderators
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return 'RECACHE_MODERATORS';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool()
	{
		if (!function_exists('cache_moderators'))
		{
			global $phpbb_root_path, $phpEx;

			include("{$phpbb_root_path}includes/functions_admin.$phpEx");
		}

		cache_moderators();

		trigger_error('RECACHE_MODERATORS_COMPLETE');
	}
}

?>