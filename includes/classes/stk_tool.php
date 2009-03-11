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

/**
 * Main tool class. All tools should extend this class.
 */
class stk_tool
{
	var $options = '';
	
	function tool_options()
	{
		return $this->options;
	}
}

?>