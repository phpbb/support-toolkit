<?php
/**
*
* @package Support Toolkit
* @copyright (c) 2010 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

// What version are we using?
define('STK_VERSION', '1.0.3');
//define('STK_QA', true);

define('ADMIN_START', true);

/*
 * This seems like a rather nasty thing to do, but the only places this
 * IN_LOGIN is checked is in session.php when creating a session
 * Reason for having it is that it allows us in the STK if we can not login
 * and the board is disabled.
 */
define('IN_LOGIN', true);

$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];

// Report all errors, except notices and deprecation messages
if (!defined('E_DEPRECATED'))
{
	define('E_DEPRECATED', 8192);
}
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

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

// Check the installation of the STK
if (false === (@include(PHPBB_ROOT_PATH . 'config.' . PHP_EXT)))
{
	die('<p>The phpBB config.' . PHP_EXT . ' file could not be found.</p><p>Make sure that you\'ve uploaded the Support Toolkit files to the correct location.</p>');
}

// Make that phpBB itself understands out paths
$phpbb_root_path = PHPBB_ROOT_PATH;
$phpEx = PHP_EXT;

if (defined('DEBUG_EXTRA'))
{
	$base_memory_usage = 0;
	if (function_exists('memory_get_usage'))
	{
		$base_memory_usage = memory_get_usage();
	}
}

// Load Extensions
// dl() is deprecated and disabled by default as of PHP 5.3.
if (!empty($load_extensions) && function_exists('dl'))
{
	$load_extensions = explode(',', $load_extensions);

	foreach ($load_extensions as $extension)
	{
		@dl(trim($extension));
	}
}

// Include some common files
require(PHPBB_ROOT_PATH . "includes/acm/acm_{$acm_type}." . PHP_EXT);
require(PHPBB_ROOT_PATH . 'includes/cache.' . PHP_EXT);
require(PHPBB_ROOT_PATH . 'includes/template.' . PHP_EXT);
require(PHPBB_ROOT_PATH . 'includes/session.' . PHP_EXT);
require(PHPBB_ROOT_PATH . 'includes/auth.' . PHP_EXT);

require(PHPBB_ROOT_PATH . 'includes/functions.' . PHP_EXT);
require(PHPBB_ROOT_PATH . 'includes/functions_content.' . PHP_EXT);

require(PHPBB_ROOT_PATH . 'includes/constants.' . PHP_EXT);
require(PHPBB_ROOT_PATH . "includes/db/$dbms." . PHP_EXT);
require(PHPBB_ROOT_PATH . 'includes/utf/utf_tools.' . PHP_EXT);

require(STK_ROOT_PATH . 'includes/functions.' . PHP_EXT);
require(STK_ROOT_PATH . 'includes/plugin.' . PHP_EXT);
if (file_exists(PHPBB_ROOT_PATH . 'umil/umil.' . PHP_EXT))
{
	// If available use the users global UMIL installation
	require PHPBB_ROOT_PATH . 'umil/umil.' . PHP_EXT;
}
else
{
	// Fall back to the internal UMIL
	require STK_ROOT_PATH . 'includes/umil.' . PHP_EXT;
}

// Set PHP error handler to ours
set_error_handler('stk_msg_handler');

// Instantiate some basic phpBB classes
$user		= new user();
$auth		= new auth();
$template	= new template();
$cache		= new cache();
$db			= new $sql_db();

// Connect to DB
$db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false, defined('PHPBB_DB_NEW_LINK') ? PHPBB_DB_NEW_LINK : false);

// We do not need this any longer, unset for safety purposes
unset($dbpasswd);

// Grab global variables, re-cache if necessary
$config = $cache->obtain_config();

// Load STK config when not in the erk
if (!isset($stk_config))
{
	$stk_config = array();
	include STK_ROOT_PATH . 'config.' . PHP_EXT;
}

/**
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
