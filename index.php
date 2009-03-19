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
define('IN_ADMIN', true);
define('IN_STK', true);
define('ADMIN_START', true);
define('NEED_SID', true);

if (!defined('PHPBB_ROOT_PATH')) define('PHPBB_ROOT_PATH', './../');
if (!defined('PHP_EXT')) define('PHP_EXT', substr(strrchr(__FILE__, '.'), 1));
if (!defined('STK_ROOT_PATH')) define('STK_ROOT_PATH', './');
include STK_ROOT_PATH . 'stk_common.' . PHP_EXT;

// Start session management
$user->stk_session_begin(false);
$auth->acl($user->data);
$user->stk_setup('acp/common');

// Switch environment
$stk->switch_env();

// Check login
$stk->check_stk_login();

// Get all the page data
$stk->get_page_data();

// Check the form token
$stk->check_form_token();

// Run some default tasks
$stk->default_tasks();

// Build the correct page
$stk->build_page();
?>