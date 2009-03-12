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
	exit ();
}

if (!isset($stk_config) || !is_array($stk_config))
{
	$stk_config = array();
}

/**
 * This configuration variable controls whether the tool list should be cached
 * by the system.
 * 
 * @todo Decide whether we want to have the ability to cache the tools, or just load
 *       fetch the list everytime we load a page!
 */
$stk_config['cache_tools'] = false;
?>