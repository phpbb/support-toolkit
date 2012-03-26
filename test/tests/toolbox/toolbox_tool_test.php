<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class toolbox_tool_test extends stk_test_case
{
	private $path;
	private $stk;

	protected function setUp()
	{
		$this->path = __DIR__ . '/tools/';

		$cacheFactory = new stk_wrapper_cache_factory('null');
		$cache = $cacheFactory->get_service();

		$this->stk = new Pimple();
		$this->stk['vc'] = $this->stk->share(function() use ($cache) {
			return new stk_core_version_controller('https://raw.github.com/gist/2039820/stk_version_check_test.json', $cache);
		});

		$tool_class_loader = new stk_core_class_loader('stktool_', $this->path);
		$tool_class_loader->register();

		$this->path .= 'classformat/';
	}

	public function test_incorrectly_formatted_class()
	{
		$tool	= new stk_toolbox_tool(new SplFileInfo($this->path . 'unvalid_t0kens.php'));
		$status	= $tool->validateAndLoad();
		$this->assertSame('TOOL_CLASSNAME_WRONG_FORMAT', $status);
	}

	public function test_interface_not_implemented()
	{
		$tool	= new stk_toolbox_tool(new SplFileInfo($this->path . 'nonInterfaceTool.php'));
		$status	= $tool->validateAndLoad();
		$this->assertSame('TOOL_CLASS_NOT_IMPLEMENTS_INTERFACE', $status);
	}

	public function test_correct()
	{
		$tool = new stk_toolbox_tool(new SplFileInfo($this->path . 'foo_bar.php'));
		$tool->setVersionController($this->stk['vc']);
		$tool->validateAndLoad();
		$this->assertEquals(new stktool_classformat_foo_bar(), $tool->getTool());
	}
}
