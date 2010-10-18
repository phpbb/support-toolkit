<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2010 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

define('IN_PHPBB', true);
define('IN_ERK', true);

if (!defined('PHPBB_ROOT_PATH')) { define('PHPBB_ROOT_PATH', './../'); }
if (!defined('PHP_EXT')) { define('PHP_EXT', substr(strrchr(__FILE__, '.'), 1)); }
if (!defined('STK_DIR_NAME')) { define('STK_DIR_NAME', substr(strrchr(dirname(__FILE__), DIRECTORY_SEPARATOR), 1)); }	// Get the name of the stk directory
if (!defined('STK_ROOT_PATH')) { define('STK_ROOT_PATH', './'); }
if (!defined('STK_INDEX')) { define('STK_INDEX', STK_ROOT_PATH . 'index.' . PHP_EXT); }

// Init critical repair and run the tools that *must* be ran before initing anything else
include STK_ROOT_PATH . 'includes/critical_repair.' . PHP_EXT;
$critical_repair = new critical_repair();
$critical_repair->run_tool('bom_sniffer');
$critical_repair->run_tool('config_repair');

require STK_ROOT_PATH . 'common.' . PHP_EXT;

// We'll run the rest of the critical repair tools automatically now
$critical_repair->autorun_tools();

// At this point things should be runnable
// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('acp/common', $config['default_style']);

// Purge teh caches
$umil = new umil(true);
$umil->cache_purge(array(
	'data',
	'template',
	'theme',
	'imageset',
));


// Let's tell the user all is okay :)
$critical_repair->trigger_error("The Emergency Repair Kit hasn't found any critical issues within your phpBB installation.", true);

?>