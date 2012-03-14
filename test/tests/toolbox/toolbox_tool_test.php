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
	private $catName;
	private $path;
	private $toolbox;

	protected function setUp()
	{
		$this->catName	= 'classformat';
		$this->path		= __DIR__ . '/tools/classformat/';
		$this->toolbox	= new stk_toolbox(new SplFileInfo($this->path));
	}

	public function test_incorrectly_formatted_class()
	{
		$tool = stk_toolbox_tool::createTool(new SplFileInfo($this->path . 'unvalid_t0kens.php'));
		$this->assertSame('TOOL_CLASSNAME_WRONG_FORMAT', $tool);
	}

	public function test_interface_not_implemented()
	{
		$tool = stk_toolbox_tool::createTool(new SplFileInfo($this->path . 'nonInterfaceTool.php'));
		$this->assertSame('TOOL_CLASS_NOT_IMPLEMENTS_INTERFACE', $tool);
	}

	public function test_correct()
	{
		$tool = stk_toolbox_tool::createTool(new SplFileInfo($this->path . 'foo_bar.php'));
		$this->assertEquals(new stktool_classformat_foo_bar(), $tool->getTool());
	}
}
