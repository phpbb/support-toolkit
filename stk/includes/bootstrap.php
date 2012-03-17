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

// Setup the class loaders
require PHPBB_FILES . 'includes/class_loader.php';
$stk_class_loader = new phpbb_class_loader('stk_', STK_ROOT, '.php');
$stk_class_loader->register();
$phpbb_class_loader = new phpbb_class_loader('phpbb_', PHPBB_FILES . 'includes/', '.php');
$phpbb_class_loader->register();

// Include our own configuration data
$stk_config_class = (file_exists(STK_ROOT . 'local_config.php')) ? 'stk_local_config' : 'stk_config';
$stk_config	= new $stk_config_class();

// Load phpBB
$phpbb_root_path = $stk_config['phpbb_root_path'];
$phpEx = $stk_config['phpEx'];

require(PHPBB_FILES . 'includes/startup.php');
if (file_exists($phpbb_root_path . 'config.php'))
{
	require($phpbb_root_path . 'config.php');
}

// No valid installation and not testing, kill it
if (!defined('PHPBB_INSTALLED'))
{
	trigger_error('No working phpBB installation found, please assure that you correctly installed the toolkit!');
}

// Include some phpBB files that can't be auto loaded
require PHPBB_FILES . 'includes/constants.php';
require PHPBB_FILES . "includes/db/{$dbms}.php";
require PHPBB_FILES . 'includes/functions.php';
require PHPBB_FILES . 'includes/session.php';
require PHPBB_FILES . 'includes/utf/utf_tools.php';

// Setup phpBB's request object
$request = new phpbb_request();
request_var('', 0, false, false, $request); // "dependency injection" for a function

// Setup DBAL
$db = new $sql_db();
$db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false, defined('PHPBB_DB_NEW_LINK') ? PHPBB_DB_NEW_LINK : false);
unset($dbpasswd);

// set up caching
// The support toolkit doesn't cache any phpBB related information!
// Although a second cacheing object is used to cache STK related information
$cache_factory = new phpbb_cache_factory('null');
$cache = $cache_factory->get_service();
$stk_cache_factory = new stk_wrapper_cache_factory('file');
$stk_cache = $stk_cache_factory->get_service();

// Get the actual phpBB config array
$phpbb_config = new phpbb_config_db($db, $cache->get_driver(), CONFIG_TABLE);

// Some phpBB code relies on the phpBB config data, to control the behavior
// of this we will use an mock cache object containing static settings whenever
// possible
$config = new stk_includes_phpbb_mock_config($phpbb_config);
set_config(null, null, null, $config);
set_config_count(null, null, null, $config);

// Initialise the phpBB user object
$user = new stk_wrapper_user();

// Setup template object
$phpbb_template_locator = new phpbb_template_locator();
$phpbb_template_path_provider = new phpbb_template_path_provider();
$template = new stk_wrapper_template($phpbb_root_path, $phpEx, $config, $user, $phpbb_template_locator, $phpbb_template_path_provider);

// Setup user
$user->session_begin(false);
$user->setup(array('acp/common'));
$user->stk_add_lang('common');

// Use the STK template directory
$template->set_custom_template(STK_ROOT . 'view/template/', 'supporttoolkit');

// Set notice when the cache can't be used
if (!is_writable($stk_cache->get_driver()->getCacheDir()))
{
	$template->addNotice('STK_CACHE_NOT_WRITABLE', 'STK_CACHE_NOT_WRITABLE_DESCRIPTION', true);
}

// Include some STK files that can't be auto loaded
require STK_ROOT . 'includes/constants.php';

// Initialise the version check controller
$vc = stk_toolbox_version_check::getInstance('https://raw.github.com/gist/2039820/stk_version_check.json', $stk_cache);

// Initialise the toolkit
$toolbox = new stk_toolbox(new SplFileInfo(STK_ROOT . 'tools/'));
