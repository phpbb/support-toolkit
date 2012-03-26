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
	private $toolBox;

	protected function setUp()
	{
		$cache_factory	= new stk_wrapper_cache_factory('null');
		$this->cache	= $cache_factory->get_service();
		$this->path		= __DIR__ . '/tools/foo/';
		$this->toolBox	= new stk_toolbox(new SplFileInfo(__DIR__ . '/tools/'), $this->cache);
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
		$cat->setCache($this->cache);
		$cat->loadTools();

		$expected = new stk_toolbox_tool(new SplFileInfo($this->path . 'foobar.php'));

		$this->assertCount(2, $cat->getToolList());
		$this->assertEquals($expected, $cat->getTool('foobar'));
		$this->assertNull($cat->getTool('notdefined'));
	}

	public function test_serialize()
	{
		$cat = new stk_toolbox_category(new SplFileInfo($this->path));
		$serialized = serialize($cat);
		$this->assertEquals($cat, unserialize($serialized));
	}

	public function test_serializeToolsLoaded()
	{
		$cat = new stk_toolbox_category(new SplFileInfo($this->path));
		$cat->setCache($this->cache);
		$cat->loadTools();

		$serialized = serialize($cat);
		$this->assertEquals($cat, unserialize($serialized));
	}
}
