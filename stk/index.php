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
$requestCategory	= $stk['phpbb']['request']->variable('c', 'main', false, phpbb_request_interface::GET);
$requestTool		= $stk['phpbb']['request']->variable('t', '', false, phpbb_request_interface::GET);

// Prepare the toolbox to handle the correct category/tool
$stk['toolbox']->loadToolboxCategories();
$stk['toolbox']->getToolboxCategory($requestCategory)->loadTools();
$stk['toolbox']->setActiveTool($requestCategory, $requestTool);

// When no tool is active show the categories overview page
if (is_null($stk['toolbox']->getActiveTool()))
{
	$stk['toolbox']->getActiveCategory()->createOverview();
}
// When not submitting show the tools options
else if ($stk['phpbb']['request']->is_set('submit') === false)
{
	$stk['toolbox']->getActiveTool()->createOverview();
}

$stk['utilities']->page_header('phpBB Support Toolkit "Ascraeus"');
$stk['utilities']->page_footer('index_body');
