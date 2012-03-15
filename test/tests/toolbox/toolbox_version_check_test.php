<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class toolbox_version_check_test extends stk_test_case
{
	private $versionCheck;

	protected function setUp()
	{
		$this->versionCheck = stk_toolbox_version_check::getInstance('https://raw.github.com/gist/2039820/stk_version_check_test.json');
	}

	public function test_getVersionInfo()
	{
		$expected = unserialize('O:8:"stdClass":1:{s:3:"foo";O:8:"stdClass":3:{s:3:"bar";O:8:"stdClass":2:{s:6:"latest";s:9:"2.0.3-rc3";s:8:"blocking";a:2:{i:0;s:5:"1.5.4";i:1;s:5:"1.4.1";}}s:6:"foobar";O:8:"stdClass":2:{s:6:"latest";s:5:"1.0.0";s:8:"blocking";a:0:{}}s:8:"disabled";O:8:"stdClass":3:{s:6:"latest";s:5:"1.5.0";s:8:"blocking";a:0:{}s:8:"disabled";b:1;}}}');
		$this->assertEquals($expected, $this->versionCheck->getVersionInfo());
	}

	public function test_getVersionInfo_category()
	{
		$expected = unserialize('O:8:"stdClass":3:{s:3:"bar";O:8:"stdClass":2:{s:6:"latest";s:9:"2.0.3-rc3";s:8:"blocking";a:2:{i:0;s:5:"1.5.4";i:1;s:5:"1.4.1";}}s:6:"foobar";O:8:"stdClass":2:{s:6:"latest";s:5:"1.0.0";s:8:"blocking";a:0:{}}s:8:"disabled";O:8:"stdClass":3:{s:6:"latest";s:5:"1.5.0";s:8:"blocking";a:0:{}s:8:"disabled";b:1;}}');
		$this->assertEquals($expected, $this->versionCheck->getVersionInfo('foo'));
	}

	public function test_getVersionInfo_tool()
	{
		$expected = unserialize('O:8:"stdClass":2:{s:6:"latest";s:5:"1.0.0";s:8:"blocking";a:0:{}}');
		$this->assertEquals($expected, $this->versionCheck->getVersionInfo('foo', 'foobar'));
	}

	public function test_no_version_entry()
	{
		$this->assertSame(stk_toolbox_version_check::TOOL_OK, $this->versionCheck->testVersion('foo', 'barfoo'));
	}

	public function test_version_warning()
	{
		$this->assertSame(stk_toolbox_version_check::TOOL_WARNING, $this->versionCheck->testVersion('foo', 'foobar'));
	}

	public function test_version_blocking()
	{
		$this->assertSame(stk_toolbox_version_check::TOOL_BLOCKING, $this->versionCheck->testVersion('foo', 'bar'));
	}

	public function test_tool_disabled()
	{
		$this->assertSame(stk_toolbox_version_check::TOOL_DISABLED, $this->versionCheck->testVersion('foo', 'disabled'));
	}
}
