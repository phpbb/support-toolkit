<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

// Define some initial constants
if (!defined('STK_ROOT'))
{
	define('STK_ROOT', __DIR__ . '/../');
}

if (!defined('PHPBB_FILES'))
{
	define('PHPBB_FILES', STK_ROOT . 'phpBB/');
}

if (!defined('IN_PHPBB'))
{
	define('IN_PHPBB', true);
}

// Version constants
define('STK_VERSION', '2.0.0-dev');
define('STK_QA', true);

// Enforce the usage of the SID
define('NEED_SID', true);

// Tool options
define('TOOL_OVERVIEW_TRIGGER', 1);
