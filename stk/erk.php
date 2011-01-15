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

// Try to override some limits - maybe it helps some...
@set_time_limit(0);
$mem_limit = @ini_get('memory_limit');
if (!empty($mem_limit))
{
	$unit = strtolower(substr($mem_limit, -1, 1));
	$mem_limit = (int) $mem_limit;

	if ($unit == 'k')
	{
		$mem_limit = floor($mem_limit / 1024);
	}
	else if ($unit == 'g')
	{
		$mem_limit *= 1024;
	}
	else if (is_numeric($unit))
	{
		$mem_limit = floor((int) ($mem_limit . $unit) / 1048576);
	}
	$mem_limit = max(128, $mem_limit) . 'M';
}
else
{
	$mem_limit = '128M';
}
@ini_set('memory_limit', $mem_limit);

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
