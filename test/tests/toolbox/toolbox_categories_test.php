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
	private $cache;
	private $path;

	protected function setUp()
	{
		$this->path = __DIR__ . '/tools/';

		$cacheFactory = new stk_wrapper_cache_factory('null');
		$this->cache = $cacheFactory->get_service();

		$this->stk = new Pimple();
		$this->stk['vc'] = $this->stk->share(function() use ($cacheFactory) {
			return new stk_core_version_controller('https://raw.github.com/gist/2039820/stk_version_check_test.json', $cacheFactory->get_service());
		});

		$tool_class_loader = new stk_core_class_loader('stktool_', $this->path);
		$tool_class_loader->register();

		$this->path .= 'foo/';
	}

	/**
	 * Test initialisation of a new category
	 */
	public function test_createCategory()
	{
		$cat = new stk_toolbox_category(new SplFileInfo($this->path));

		$this->assertSame('foo', $cat->getName());
		$this->assertSame(0, $cat->getToolCount());
	}

	/**
	 * Test loading the tools that belong to a given category
	 */
	public function test_loadTools()
	{
		$cat = new stk_toolbox_category(new SplFileInfo($this->path));
		$cat->setVersionController($this->stk['vc']);
		$cat->setCache($this->cache);
		$cat->loadTools();

		$expected = new stk_toolbox_tool(new SplFileInfo($this->path . 'foobar.php'));
		$expected->setVersionController($this->stk['vc']);
		$expected->validateAndLoad();

		$this->assertCount(2, $cat->getToolList());
		$this->assertEquals($expected, $cat->getTool('foobar'));
		$this->assertNull($cat->getTool('notdefined'));
	}
}
