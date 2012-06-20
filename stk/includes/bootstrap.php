<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

$starttime = microtime(true);

require (__DIR__ . '/static_constants.php');

// Setup the DI container
require STK_ROOT . 'core/Pimple.php';
$stk = new Pimple();
$stk['cache'] = $stk->share(function() {
	return new Pimple();
});
$stk['class_loaders'] = $stk->share(function() {
	return new Pimple();
});
$stk['phpbb'] = $stk->share(function() {
	return new Pimple();
});
$stk['plugin'] = $stk->share(function() {
	return new Pimple();
});

// Load and register the class loaders
$stk['class_loaders']['stk'] = $stk->share(function() {
	if (!class_exists('stk_core_class_loader'))
	{
		require STK_ROOT . 'core/class_loader.php';
	}
	return new stk_core_class_loader('stk_', STK_ROOT);
});
$stk['class_loaders']['phpbb'] = $stk->share(function() {
	if (!class_exists('stk_core_class_loader'))
	{
		require STK_ROOT . 'core/class_loader.php';
	}
	return new stk_core_class_loader('phpbb_', PHPBB_FILES . 'includes/');
});
$stk['class_loaders']['plugin'] = $stk->share(function() use ($stk) {
	if (!class_exists('stk_core_class_loader'))
	{
		require STK_ROOT . 'core/class_loader.php';
	}
	return new stk_core_class_loader('plugin_', $stk['plugin']['tool_path']);
});
$stk['class_loaders']['stk']->register();
$stk['class_loaders']['phpbb']->register();

// STK Configuration data
$stk['config'] = $stk->share(function() {
	$stk_config_class = (file_exists(STK_ROOT . 'local_config.php')) ? 'stk_local_config' : 'stk_config';
	return new $stk_config_class();
});

// Load some initial phpBB files/information
$phpbb_root_path	= PHPBB_FILES;
$phpEx				= $stk['config']['phpEx'];

require(PHPBB_FILES . 'includes/startup.php');
if (file_exists($stk['config']['phpbb_root_path'] . 'config.php'))
{
	require($stk['config']['phpbb_root_path'] . 'config.php');

	// Store the db_config data in the DI container and unset what we don't need anymore
	$stk['phpbb']['db_config'] = array(
		'dbms'			=> $dbms,
		'dbhost'		=> $dbhost,
		'dbport'		=> $dbport,
		'dbname'		=> $dbname,
		'dbuser'		=> $dbuser,
		'dbpasswd'		=> $dbpasswd,
		'table_prefix'	=> $table_prefix,
		'acm_type'		=> $acm_type,
	);
	unset($dbhost, $dbport, $dbname, $dbuser, $dbpasswd, $acm_type);
}

// Not installed and not testing
if (!defined('PHPBB_INSTALLED'))
{
	die('No phpBB installation found');
}

// Include some phpBB files that can't be auto loaded
require PHPBB_FILES . 'includes/constants.php';
require PHPBB_FILES . 'includes/functions.php';
require PHPBB_FILES . 'includes/hooks/index.php';
require PHPBB_FILES . 'includes/utf/utf_tools.php';

// set up caching
// The Support Toolkit initialises three cache objects
// 1) `$stk['cache']['phpbb']`
//		The cache object that is passed to phpBB code, this cache object
//		is hard coded to use the "null" cache driver
// 2) `$stk['cache']['board_cache']`
//		Cache object that uses the cache driver as defined in `config.php`
//		this object is used when the Support Toolkit needs to interact with
//		the board's cache
// 3) `$stk['cache']['stk']`
//		Cache object that is used when the Support Toolkit needs to cache
//		information. This object uses slightly changed cache drivers/services
$stk['cache']['phpbb'] = $stk->share(function() {
	$cache_factory = new phpbb_cache_factory('null');
	return $cache_factory->get_service();
});
$stk['cache']['board_cache'] = $stk->share(function() use ($stk) {
	$cache_factory = new phpbb_cache_factory($stk['phpbb']['db_config']['acm_type']);
	return $cache_factory->get_service();
});
$stk['cache']['stk'] = $stk->share(function() {
	$cache_factory = new stk_wrapper_cache_factory('file');
	$cache_service = $cache_factory->get_service();
	return $cache_service;
});
$cache = $stk['cache']['phpbb'];

// phpBB request class
$stk['phpbb']['request'] = $stk->share(function() {
	$request = new phpbb_request();
	request_var('', 0, false, false, $request); // "dependency injection" for a function

	return $request;
});
$request = $stk['phpbb']['request'];

// phpBB DBAL
$stk['phpbb']['db'] = $stk->share(function($phpbb) use ($dbms, $phpbb_root_path, $phpEx) {
	require PHPBB_FILES . "includes/db/{$dbms}.php";
	$db = new $sql_db();
	$db->sql_connect(
		$phpbb['db_config']['dbhost'],
		$phpbb['db_config']['dbuser'],
		$phpbb['db_config']['dbpasswd'],
		$phpbb['db_config']['dbname'],
		$phpbb['db_config']['dbport'],
		false,
		defined('PHPBB_DB_NEW_LINK') ? PHPBB_DB_NEW_LINK : false
	);

	return $db;
});

// Get the actual phpBB configuration object
$stk['phpbb']['config'] = $stk->share(function($phpbb) use ($stk) {
	return new phpbb_config_db($phpbb['db'], $stk['cache']['phpbb']->get_driver(), CONFIG_TABLE);
});

// Some phpBB code relies on the phpBB config data, to control the behavior
// of this we will use an mock cache object containing static settings whenever
// possible
$stk['phpbb']['config_mock'] = $stk->share(function($phpbb) {
	$config = new stk_wrapper_config($phpbb['config']);
	set_config(null, null, null, $config);
	set_config_count(null, null, null, $config);

	return $config;
});

// Setup the phpBB User object
$stk['phpbb']['user'] = $stk->share(function() use ($stk) {
	return new stk_wrapper_user($stk);
});

// Setup the phpBB template object
$stk['phpbb']['style_locator'] = $stk->share(function() {
	return new phpbb_style_resource_locator();
});
$stk['phpbb']['style_path_provider'] = $stk->share(function() {
	return new phpbb_style_path_provider();
});
$stk['phpbb']['template'] = $stk->share(function() use ($stk) {
	return new stk_wrapper_template($stk);
});
$stk['phpbb']['style'] = $stk->share(function() use ($stk) {
	return new stk_wrapper_style($stk);
});

// The STK plugins
$stk['plugin']['manager'] = $stk->share(function($plugin) use ($stk) {
	$stk['class_loaders']['plugin']->register();
	return new stk_plugin_manager($plugin['sniffer']);
});
$stk['plugin']['sniffer'] = $stk->share(function() use ($stk) {
	$sniffer = new stk_plugin_sniffer($stk, $stk['plugin']['tool_path']);
	$sniffer->sniff();
	return $sniffer;
});
$stk['plugin']['tool_path'] = STK_ROOT . 'tools/';

// Utilities
$stk['utilities'] = $stk->share(function($stk) {
	return new stk_includes_utilities($stk);
});

// phpBB requires some global vars
$db				= $stk['phpbb']['db'];
$config			= $stk['phpbb']['config_mock'];
$phpbb_style	= $stk['phpbb']['style'];
$template		= $stk['phpbb']['template'];
$user			= $stk['phpbb']['user'];

// Register hooks
$stk_hooks = array(
	'append_sid'	=> array(
		'function'	=> 'stk_append_sid',
		'location'	=> 'append_sid',
	),
);
$phpbb_hook = new phpbb_hook(array('exit_handler', 'phpbb_user_session_handler', 'append_sid', array('template', 'display')));

foreach ($stk_hooks as $hook => $call)
{
	require STK_ROOT . "hooks/{$hook}.php";
	$phpbb_hook->register($call['location'], $call['function'], 'standalone');
}

// Setup user
$stk['phpbb']['user']->session_begin(false);
$stk['phpbb']['user']->setup(array('acp/common'));
$stk['phpbb']['user']->stk_add_lang('common');

// Use the STK template directory
$stk['phpbb']['style']->set_custom_style();

// Include some STK files that can't be autoloaded
require STK_ROOT . 'includes/dynamic_constants.php';
