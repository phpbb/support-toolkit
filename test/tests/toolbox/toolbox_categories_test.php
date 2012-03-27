<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class toolbox_categories_test extends stk_test_case
{
	private $path;
	private $stk;

	protected function setUp()
	{
		$this->path = __DIR__ . '/tools/';

		$stk = new Pimple();
		$stk['cache'] = $stk->share(function() { return new Pimple(); });
		$stk['cache']['stk'] = $stk->share(function() {
			$cacheFactory = new stk_wrapper_cache_factory('null');
			return $cacheFactory->get_service();
		});
		$stk['vc'] = $stk->share(function($stk) {
			return new stk_core_version_controller('https://raw.github.com/gist/2039820/stk_version_check_test.json', $stk['cache']['stk']);
		});
		$this->stk = $stk;

		$tool_class_loader = new stk_core_class_loader('stktool_', $this->path);
		$tool_class_loader->register();

		$this->path .= 'foo/';
	}

	/**
	 * Test initialisation of a new category
	 */
	public function test_createCategory()
	{
		$cat = new stk_toolbox_category(new SplFileInfo($this->path), $this->stk);

		$this->assertSame('foo', $cat->getName());
		$this->assertSame(0, $cat->getToolCount());
	}

	/**
	 * Test loading the tools that belong to a given category
	 */
	public function test_loadTools()
	{
		$cat = new stk_toolbox_category(new SplFileInfo($this->path));
		$cat->setDIContainer($this->stk);
		$cat->loadTools();

		$expected = new stk_toolbox_tool(new SplFileInfo($this->path . 'foobar.php'));
		$expected->setVersionController($this->stk['vc']);
		$expected->validateAndLoad();

		$this->assertCount(2, $cat->getToolList());
		$this->assertEquals($expected, $cat->getTool('foobar'));
		$this->assertNull($cat->getTool('notdefined'));
	}
}
