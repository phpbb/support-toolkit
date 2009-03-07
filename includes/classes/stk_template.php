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

if (!class_exists('template'))
{
	include PHPBB_ROOT_PATH . 'includes/template.' . PHP_EXT;
}

class stk_template extends template
{
	function __construct()
	{
	
	}
}

?>