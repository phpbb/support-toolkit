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
$requestTool		= $stk['phpbb']['request']->variable('t', 'home', false, phpbb_request_interface::GET);




echo'<pre>';
var_export($stk['plugin']['manager']);
exit;

/*
// Prepare the toolbox to handle the correct category/tool
$stk['toolbox']['box']->loadToolboxCategories();
$stk['toolbox']['box']->getToolboxCategory($requestCategory)->loadTools();
$stk['toolbox']['box']->setActiveTool($requestCategory, $requestTool);

// When no tool is active show the categories overview page
if (is_null($stk['toolbox']['box']->getActiveTool()))
{
	$stk['toolbox']['box']->getActiveCategory()->createOverview();
}
// When not submitting show the tools options
else if ($stk['phpbb']['request']->is_set('submit') === false)
{
	$stk['toolbox']['box']->getActiveTool()->createOverview();
}

$stk['utilities']->page_header('phpBB Support Toolkit "Ascraeus"');
$stk['utilities']->page_footer('index_body');
*/
