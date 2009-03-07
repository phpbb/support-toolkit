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

class stk_acm extends cache
{
	/**
	* Construct, set the internal cache path
	*/
	function __construct() {}

	/**
	 * Get all the tool categories
	 *
	 * @return array Array containing all the categories
	 * @access public
	 */
	function obtain_stk_categories()
	{
		// Cache internally as this method can be called multiple times.
		static $cats = null;
		if ($cats !== null)
		{
			return $cats;
		}
		
		if (($cats = $this->get('_stk_cats')) === false)
		{
			$cats = array();
			
			if (false !== ($handle = opendir(STK_TOOL_BOX)))
			{
				while (false !== ($dir = readdir($handle)))
				{
					// Skip *nix hidden, files and links
					if ($dir[0] == '.' || is_file($dir) || is_link($dir))
					{
						continue;
					}
					
					$cats[] = $dir;
				}
				
				$this->put('_stk_cats', $cats);
			}
			
			sort($cats);
		}
		
		return $cats;
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