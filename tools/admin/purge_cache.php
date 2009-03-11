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
	exit();
}

class stk_purge_cache extends stk_tool
{
	/**
	 * Main constructor.
	 * Set the tool details
	 */
	function __construct()
	{
		// Set the options
		$this->options = 'PURGE_CACHE';
		
		// Call the parent
		parent::__construct();
	}
	
	function run_tool()
	{
		global $cache;
		
		$cache->purge();
		
		trigger_error('PURGE_CACHE_COMPLETE');
	}
	
	
	
	/**
	 * php4
	 */
	function stk_purge_cache()
	{
		$this->__construct();
	}
}

?>