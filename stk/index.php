<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
require __DIR__ . '/includes/bootstrap.php';

// Get the requested category/tool
$request_category	= $stk['phpbb']['request']->variable('c', 'main', false, phpbb_request_interface::GET);
$request_tool		= $stk['phpbb']['request']->variable('t', 'home', false, phpbb_request_interface::GET);

$stk['plugin']['manager']->switch_active($request_category, $request_tool);

$stk['utilities']->page_header('phpBB Support Toolkit "Ascraeus"');
$stk['utilities']->page_footer('index_body');
