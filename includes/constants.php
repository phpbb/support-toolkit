<?php
/**
 *
 * @package Support Tool Kit
 * @version $Id: constants.php 2 2009-03-07 15:48:30Z erikfrerejean $
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

define('STK_ANONYMOUS', -2);
define('STK_USER', -3);

// Setup the STK user
define('STK_DEFAULT_DATEFORMAT', 'D M d, Y g:i a');
define('STK_DEFAULT_DST', 0);
define('STK_DEFAULT_LANG', 'en');
define('STK_DEFAULT_TIMEZONE', 0);

// Paths
define('STK_CACHE_PATH', STK_ROOT_PATH . 'cache/');
define('STK_TOOL_BOX', STK_ROOT_PATH . 'tools/');
?>