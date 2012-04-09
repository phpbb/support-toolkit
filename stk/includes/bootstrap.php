<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

$starttime = microtime(true);

// Define some initial constants
if (!defined('STK_ROOT')) define('STK_ROOT', __DIR__ . '/../');
if (!defined('PHPBB_FILES')) define('PHPBB_FILES', STK_ROOT . 'phpBB/');
if (!defined('IN_PHPBB')) define('IN_PHPBB', true);

// Enforce the usage of the SID
define('NEED_SID', true);

// Setup the DI container
if (!class_exists('Pimple'))
{
	require STK_ROOT . 'core/DI/Pimple.php';
}
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
$stk['toolbox'] = $stk->share(function() {
	return new Pimple();
});

// Load and register the class loaders
require STK_ROOT . 'core/class_loader.php';
$stk['class_loaders']['stk'] = $stk->share(function() {
	return new stk_core_class_loader('stk_', STK_ROOT);
});
$stk['class_loaders']['phpbb'] = $stk->share(function() {
	return new stk_core_class_loader('phpbb_', PHPBB_FILES . 'includes/');
});
$stk['class_loaders']['stk']->register();
$stk['class_loaders']['phpbb']->register();

// STK Configuration data
$stk['config'] = $stk->share(function() {
	$stk_config_class = (file_exists(STK_ROOT . 'local_config.php')) ? 'stk_local_config' : 'stk_config';
	return new $stk_config_class();
});

// Load some initial phpBB files/information
$phpbb_root_path	= $stk['config']['phpbb_root_path'];
$phpEx				= $stk['config']['phpEx'];

require(PHPBB_FILES . 'includes/startup.php');
if (file_exists($phpbb_root_path . 'config.php'))
{
	require($phpbb_root_path . 'config.php');

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
$stk['cache']['stk'] = $stk->share(function() use ($stk) {
	$cache_factory = new stk_wrapper_cache_factory('file');
	$cache_service = $cache_factory->get_service();
	$cache_service->setDIContainer($stk);
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
$db = $stk['phpbb']['db'];

// Get the actual phpBB configuration object
$stk['phpbb']['config'] = $stk->share(function() use ($db, $cache) {
	return new phpbb_config_db($db, $cache->get_driver(), CONFIG_TABLE);
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
$config = $stk['phpbb']['config_mock'];

// Setup the phpBB User object
$stk['phpbb']['user'] = $stk->share(function() use ($config) {
	return new stk_wrapper_user();
});
$user = $stk['phpbb']['user'];

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
$phpbb_style	= $stk['phpbb']['style'];
$template		= $stk['phpbb']['template'];

// Setup the version controller
$stk['vc'] = $stk->share(function($stk) {
	return new stk_core_version_controller('https://raw.github.com/gist/2039820/stk_version_check.json', $stk['cache']['stk']);
});

// The STK toolbox
$stk['toolbox']['box'] = $stk->share(function() use ($stk) {
	return new stk_toolbox($stk);
});
$stk['toolbox']['category'] = function() use ($stk) {
	return new stk_toolbox_category($stk);
};
$stk['toolbox']['tool'] = function() use ($stk) {
	return new stk_toolbox_tool($stk);
};

// Utilities
$stk['utilities'] = $stk->share(function($stk) {
	return new stk_includes_utilities($stk);
});

// Some settings
$stk['toolbox']['toolpath'] = $stk->share(function() {
	return new SplFileInfo(STK_ROOT . 'tools');
});

// Setup user
$stk['phpbb']['user']->session_begin(false);
$stk['phpbb']['user']->setup(array('acp/common'));
$stk['phpbb']['user']->stk_add_lang('common');

// Use the STK template directory
$stk['phpbb']['style']->set_custom_style();

// Include some STK files that can't be autoloaded
require STK_ROOT . 'includes/constants.php';
