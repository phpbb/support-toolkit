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

	function obtain_tool_list($dir, $cache_list = true)
	{
		if (!$cache_list || (false === ($dir_list = $this->get($this->_tool_list_name))))
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
						$dir_list[$file] = get_tools($dir . $file . '/');
					}
					else
					{
						// Strip the extiontion
						$file = substr($file, 0, strpos($file, '.'));
						$dir_list[] = $file;
					}
				}
			}
			
			if ($cache_list)
			{
				$this->put($this->_tool_list_name, $dir_list);
			}
		}
		
		return $dir_list;
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