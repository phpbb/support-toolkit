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
	private $pathInfo;
	private $stk;

	protected function setUp()
	{
		$this->path = __DIR__ . '/tools/';

		$this->stk = $this->get_test_case_helpers()->getSTKObject();

		$tool_class_loader = new stk_core_class_loader('stktool_', $this->path);
		$tool_class_loader->register();

		$this->path .= 'foo/';
		$this->pathInfo = new SplFileInfo($this->path);
	}

	/**
	 * Test initialisation of a new category
	 */
	public function test_createCategory()
	{
		$cat = new stk_toolbox_category($this->stk);
		$cat->setPath($this->pathInfo);

		$this->assertSame('foo', $cat->getName());
		$this->assertSame(0, $cat->getToolCount());
	}

	/**
	 * Test loading the tools that belong to a given category
	 */
	public function test_loadTools()
	{
		$cat = $this->stk['toolbox']['category'];
		$cat->setPath($this->pathInfo);
		$cat->setDIContainer($this->stk);
		$cat->loadTools();

		$expected = new stk_toolbox_tool();
		$expected->setDIContainer($this->stk);
		$expected->setPath(new SplFileInfo($this->path . 'foobar.php'));
		$expected->validateAndLoad();

		$this->assertCount(2, $cat->getToolList());
		$this->assertEquals($expected, $cat->getTool('foobar'));
		$this->assertNull($cat->getTool('notdefined'));
	}
}
