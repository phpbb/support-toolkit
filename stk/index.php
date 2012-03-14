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
$requestCategory = $request->variable('c', 'main', false, phpbb_request::GET);
$requestTool = $request->variable('t', 'home', false, phpbb_request::GET);

// Prepare the toolbox to handle the correct category/tool
$toolbox->loadToolboxCategories();
$toolbox->getToolboxCategory($requestCategory)->loadTools();
$toolbox->setActiveTool($requestCategory, $requestTool);

stk_includes_utilities::page_header('phpBB Support Toolkit "Ascraeus"');
stk_includes_utilities::page_footer('index_body');
