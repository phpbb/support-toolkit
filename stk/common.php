<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2010 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

// What version are we using?
define('STK_VERSION', '1.0.2-dev');
define('STK_QA', true);

define('IN_PHPBB', true);
define('ADMIN_START', true);

// This seems like a rather nasty thing to do, but the only places this IN_LOGIN is checked is in session.php when creating a session
// Reason for having it is that it allows us in the STK if we can not login and the board is disabled.
define('IN_LOGIN', true);

if (!defined('PHPBB_ROOT_PATH')) { define('PHPBB_ROOT_PATH', './../'); }
if (!defined('STK_DIR_NAME')) { define('STK_DIR_NAME', substr(strrchr(dirname(__FILE__), DIRECTORY_SEPARATOR), 1)); }	// Get the name of the stk directory
if (!defined('STK_INDEX')) { define('STK_INDEX', STK_ROOT_PATH . 'index.' . PHP_EXT); }

// Make that phpBB itself understands out paths
$phpbb_root_path = PHPBB_ROOT_PATH;
$phpEx = PHP_EXT;
$stk_config = array();

// Include all common stuff
require(PHPBB_ROOT_PATH . 'common.' . PHP_EXT);
require(STK_ROOT_PATH . 'includes/functions.' . PHP_EXT);
require(STK_ROOT_PATH . 'includes/plugin.' . PHP_EXT);
// We test for UMIL twice. First look whether this user already has an UMIL installation in its default location.
if (file_exists(PHPBB_ROOT_PATH . 'umil/umil.' . PHP_EXT))
{
	require PHPBB_ROOT_PATH . 'umil/umil.' . PHP_EXT;
}
else
{
	require STK_ROOT_PATH . 'includes/umil.' . PHP_EXT;
}

// Overwrite the phpBB error handler
set_error_handler('stk_msg_handler');

// Make sure that umil is always usable
$umil = new umil(true);

?>