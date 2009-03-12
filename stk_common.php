<?php
/**
 *
 * @package Support Tool Kit
 * @version $Id$
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * Minimum Requirement: PHP 4.3.3
 * 
 * This is a replication of the phpBB common.php, it is used to correctly initialize the
 * STK classes.
 */

/**
 * @ignore
 */
if (!defined('IN_STK'))
{
	exit ();
}

$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];

// Report all errors, except notices
error_reporting(E_ALL ^ E_NOTICE);

/*
* Remove variables created by register_globals from the global scope
* Thanks to Matt Kavanagh
*/
function deregister_globals()
{
	$not_unset = array(
		'GLOBALS'	=> true,
		'_GET'		=> true,
		'_POST'		=> true,
		'_COOKIE'	=> true,
		'_REQUEST'	=> true,
		'_SERVER'	=> true,
		'_SESSION'	=> true,
		'_ENV'		=> true,
		'_FILES'	=> true,
		'phpEx'		=> true,
		'phpbb_root_path'	=> true
	);

	// Not only will array_merge and array_keys give a warning if
	// a parameter is not an array, array_merge will actually fail.
	// So we check if _SESSION has been initialised.
	if (!isset($_SESSION) || !is_array($_SESSION))
	{
		$_SESSION = array();
	}

	// Merge all into one extremely huge array; unset this later
	$input = array_merge(
		array_keys($_GET),
		array_keys($_POST),
		array_keys($_COOKIE),
		array_keys($_SERVER),
		array_keys($_SESSION),
		array_keys($_ENV),
		array_keys($_FILES)
	);

	foreach ($input as $varname)
	{
		if (isset($not_unset[$varname]))
		{
			// Hacking attempt. No point in continuing unless it's a COOKIE
			if ($varname !== 'GLOBALS' || isset($_GET['GLOBALS']) || isset($_POST['GLOBALS']) || isset($_SERVER['GLOBALS']) || isset($_SESSION['GLOBALS']) || isset($_ENV['GLOBALS']) || isset($_FILES['GLOBALS']))
			{
				exit;
			}
			else
			{
				$cookie = &$_COOKIE;
				while (isset($cookie['GLOBALS']))
				{
					foreach ($cookie['GLOBALS'] as $registered_var => $value)
					{
						if (!isset($not_unset[$registered_var]))
						{
							unset($GLOBALS[$registered_var]);
						}
					}
					$cookie = &$cookie['GLOBALS'];
				}
			}
		}

		unset($GLOBALS[$varname]);
	}

	unset($input);
}

// If we are on PHP >= 6.0.0 we do not need some code
if (version_compare(PHP_VERSION, '6.0.0-dev', '>='))
{
	/**
	* @ignore
	*/
	define('STRIP', false);
}
else
{
	@set_magic_quotes_runtime(0);

	// Be paranoid with passed vars
	if (@ini_get('register_globals') == '1' || strtolower(@ini_get('register_globals')) == 'on' || !function_exists('ini_get'))
	{
		deregister_globals();
	}

	define('STRIP', (get_magic_quotes_gpc()) ? true : false);
}

// Preset config variables. These are filled later if required
$dbms = $dbhost = $dbport = $dbname = $dbuser = $dbpasswd = $table_prefix = $acm_type = $load_extensions = '';

// Set phpBB vars
define('IN_PHPBB', true);
$phpbb_root_path = PHPBB_ROOT_PATH;
$phpEx = PHP_EXT;

// Load the STK core
include STK_ROOT_PATH . 'includes/classes/stk_core.' . PHP_EXT;
$stk = new stk();

// Include all required files
include PHPBB_ROOT_PATH . 'includes/constants.' . PHP_EXT;
include PHPBB_ROOT_PATH . 'includes/functions.' . PHP_EXT;
include PHPBB_ROOT_PATH . 'includes/functions_content.' . PHP_EXT;
include PHPBB_ROOT_PATH . 'includes/utf/utf_tools.' . PHP_EXT;

include STK_ROOT_PATH . 'includes/constants.' . PHP_EXT;
include STK_ROOT_PATH . 'includes/classes/stk_acm.' . PHP_EXT;
//include STK_ROOT_PATH . 'includes/classes/stk_auth.' . PHP_EXT;
include STK_ROOT_PATH . 'includes/classes/stk_db.' . PHP_EXT;
include STK_ROOT_PATH . 'includes/classes/stk_session.' . PHP_EXT;
include STK_ROOT_PATH . 'includes/classes/stk_template.' . PHP_EXT;
include STK_ROOT_PATH . 'includes/classes/stk_tool.' . PHP_EXT;
//include STK_ROOT_PATH . 'includes/classes/stk_uri.' . PHP_EXT;
include STK_ROOT_PATH . 'includes/functions.' . PHP_EXT;

// Set PHP error handler to ours
set_error_handler(defined('PHPBB_MSG_HANDLER') ? PHPBB_MSG_HANDLER : 'msg_handler');

// Construct all the other classes
/**
 * No ACL required
 * Once in the STK users have full rights
$auth = new stk_auth();
 */
$cache = new stk_acm();
$db = new stk_db();
$template = new stk_template();
//$uri = new stk_uri();
$user = new stk_user();

// Grab global variables, re-cache if necessary
$config = $cache->obtain_config();

// Add own hook handler
require($phpbb_root_path . 'includes/hooks/index.' . $phpEx);
$phpbb_hook = new phpbb_hook(array('exit_handler', 'phpbb_user_session_handler', 'append_sid', array('template', 'display')));

foreach ($cache->obtain_hooks() as $hook)
{
	@include($phpbb_root_path . 'includes/hooks/' . $hook . '.' . $phpEx);
}
?>