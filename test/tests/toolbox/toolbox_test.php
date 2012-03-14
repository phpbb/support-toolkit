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

	protected function setUp()
	{
		$this->path = __DIR__ . '/tools/';
	}

	public function test_loadToolboxCategories()
	{
		$tb = new stk_toolbox(new SplFileInfo($this->path));
		$tb->loadToolboxCategories();

		$expected = new stk_toolbox_category(new SplFileInfo($this->path . 'foo'));

		$this->assertEquals($expected, $tb->getToolboxCategory('foo'));
		$this->assertNull($tb->getToolboxCategory('notfound'));
	}

	/**
	 * Test switch active
	 */
	public function test_switchActive()
	{
		$tb = new stk_toolbox(new SplFileInfo($this->path));
		$tb->loadToolboxCategories();
		$tb->getToolboxCategory('foo')->loadTools();

		// Verify off
		$this->assertFalse($tb->getToolboxCategory('foo')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('bar')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('foobar')->isActive());

		// Toggle just the category
		$tb->setActiveTool('foo');
		$this->assertTrue($tb->getToolboxCategory('foo')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('bar')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('foobar')->isActive());

		// Toggle also the tool
		$tb->setActiveTool('foo', 'foobar');
		$this->assertTrue($tb->getToolboxCategory('foo')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('bar')->isActive());
		$this->assertTrue($tb->getToolboxCategory('foo')->getTool('foobar')->isActive());

		// Toggle an other tool
		$tb->setActiveTool('foo', 'bar');
		$this->assertTrue($tb->getToolboxCategory('foo')->isActive());
		$this->assertTrue($tb->getToolboxCategory('foo')->getTool('bar')->isActive());
		$this->assertFalse($tb->getToolboxCategory('foo')->getTool('foobar')->isActive());
	}

	/**
	 * Test get active
	 */
	public function test_getActiveTool()
	{
		$tb = new stk_toolbox(new SplFileInfo($this->path));
		$tb->loadToolboxCategories();
		$tb->getToolboxCategory('foo')->loadTools();

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
