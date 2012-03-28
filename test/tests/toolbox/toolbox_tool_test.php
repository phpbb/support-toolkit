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
		$this->path = __DIR__ . '/tools/foo/';

		$this->stk = $this->get_test_case_helpers()->getSTKObject();

		$tool_class_loader = new stk_core_class_loader('stktool_', $this->path);
		$tool_class_loader->register();

		$this->path .= 'classformat/';
	}

	public function test_incorrectly_formatted_class()
	{
		$tool = new stk_toolbox_tool();
		$tool->setDIContainer($this->stk);
		$tool->setPath(new SplFileInfo($this->path . 'unvalid_t0kens.php'));
		$tool->validateAndLoad();
		$error	= $tool->getLoadError();
		$this->assertSame('TOOL_CLASSNAME_WRONG_FORMAT', $error);
	}

	public function test_interface_not_implemented()
	{
		$tool = new stk_toolbox_tool();
		$tool->setDIContainer($this->stk);
		$tool->setPath(new SplFileInfo($this->path . 'nonInterfaceTool.php'));
		$tool->validateAndLoad();
		$error	= $tool->getLoadError();
		$this->assertSame('TOOL_CLASS_NOT_IMPLEMENTS_INTERFACE', $error);
	}

	public function test_correct()
	{
		$tool = new stk_toolbox_tool();
		$tool->setDIContainer($this->stk);
		$tool->setPath(new SplFileInfo($this->path . 'foo_bar.php'));
		$tool->validateAndLoad();
		$this->assertEquals(new stktool_classformat_foo_bar($this->stk), $tool->getTool());
	}
}
