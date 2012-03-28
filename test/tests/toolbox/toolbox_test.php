<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class toolbox_test extends stk_test_case
{
	private $path;
	private $stk;

	protected function setUp()
	{
		$path = __DIR__ . '/tools/';

		$this->stk = $this->get_test_case_helpers()->getSTKObject();
		$this->stk['toolbox']['toolpath'] = $this->stk->share(function() use ($path) {
			return new SplFileInfo($path);
		});

		$tool_class_loader = new stk_core_class_loader('stktool_', $this->path);
		$tool_class_loader->register();

		$this->path = $path;
	}

	public function test_loadToolboxCategories()
	{
		$tb = new stk_toolbox($this->stk);
		$tb->loadToolboxCategories();

		$expected = new stk_toolbox_category();
		$expected->setPath(new SplFileInfo($this->path . 'foo'));
		$expected->setDIContainer($this->stk);

		$this->assertEquals($expected, $tb->getToolboxCategory('foo'));
		$this->assertNull($tb->getToolboxCategory('notfound'));
	}

	/**
	 * Test switch active
	 */
	public function test_switchActive()
	{
		$tb = new stk_toolbox($this->stk);
		$tb->loadToolboxCategories();
		$cat = $tb->getToolboxCategory('foo');
		$cat->setDIContainer($this->stk);
		$cat->loadTools();

		// Verify off
		$this->assertFalse($tb->getToolboxCategory('foo')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('barfoo')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('foobar')->isActive());

		// Toggle just the category
		$tb->setActiveTool('foo');
		$this->assertTrue($tb->getToolboxCategory('foo')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('barfoo')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('foobar')->isActive());

		// Toggle also the tool
		$tb->setActiveTool('foo', 'foobar');
		$this->assertTrue($tb->getToolboxCategory('foo')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('barfoo')->isActive());
		$this->assertTrue($tb->getToolboxCategory('foo')->getTool('foobar')->isActive());

		// Toggle an other tool
		$tb->setActiveTool('foo', 'barfoo');
		$this->assertTrue($tb->getToolboxCategory('foo')->isActive());
		$this->assertTrue($tb->getToolboxCategory('foo')->getTool('barfoo')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('foobar')->isActive());
	}

	/**
	 * Test get active
	 */
	public function test_getActiveTool()
	{
		$tb = new stk_toolbox($this->stk);
		$tb->loadToolboxCategories();
		$cat = $tb->getToolboxCategory('foo');
		$cat->setDIContainer($this->stk);
		$cat->loadTools();

		// None set
		$this->assertNull($tb->getActiveCategory());
		$this->assertNull($tb->getActiveTool());

		// Just set a category
		$tb->setActiveTool('foo');
		$this->assertSame($tb->getToolboxCategory('foo'), $tb->getActiveCategory());
		$this->assertNull($tb->getActiveTool());

		// Get the active tool
		$tb->setActiveTool('foo', 'testtool');
		$this->assertSame($tb->getToolboxCategory('foo'), $tb->getActiveCategory());
		$this->assertSame($tb->getToolboxCategory('foo')->getTool('testtool'), $tb->getActiveTool());
	}
}
