<?php
/**
*
* @package Support Tool Kit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_STK'))
{
	exit;
}

$acm_type = $stk->get_config('stk_acm');
include PHPBB_ROOT_PATH . "includes/acm/acm_{$acm_type}." . PHP_EXT;
include PHPBB_ROOT_PATH . 'includes/cache.' . PHP_EXT;

/**
 * @todo enable caching in these methods if required.
 *
 */
class stk_acm extends cache
{
	var $_tool_list_name = '_stk_tool_list';
	
	/**
	* Construct, set the internal cache path
	*/
	function __construct()
	{
		$this->cache_dir = PHPBB_ROOT_PATH . 'cache/';
	}

	/**
	 * Create an array containing all available tools.
	 *
	 * @param String $dir Path to the "tools" directory
	 * @param Boolean $cache_list Defines whether the list will be cached
	 * @return The list holding all categories and tools
	 */
	function obtain_tool_list($dir, $cache_list = true)
	{
		// When not caching clear the file
		if (!$cache_list)
		{
			$this->clear_tool_list();
		}
		
		if (false === ($dir_list = $this->get($this->_tool_list_name)))
		{	
			if (false !== ($handle = opendir($dir)))
			{
				while (false !== ($file = readdir($handle)))
				{
					$file = utf8_strtolower($file);
					
					// Skip hidden files
					if ($file[0] == '.')
					{
						continue;
					}
		
					if (is_dir($dir . $file))
					{
						$dir_list[$file] = $this->obtain_tool_list($dir . $file . '/');
					}
					else
					{
						// Strip the extiontion
						$file = substr($file, 0, strpos($file, '.'));
						$dir_list[] = $file;
					}
				}
			}

			$this->put($this->_tool_list_name, $dir_list);
		}
		
		return $dir_list;
	}

	/**
	 * Method to remove the tool list from the cache.
	 */
	function clear_tool_list()
	{
		$this->destroy($this->_tool_list_name);
	}
	
	/**
	* Gracefully fall back for php4
	*/
	function stk_core()
	{
		$this->__construct();
	}
}
?>