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
		$this->versionCheck = stk_core_version_controller::getInstance();
	}

	public function test_getVersionInfo()
	{
		$expected = unserialize('O:8:"stdClass":3:{s:12:"_description";a:15:{i:0;s:60:"This .json file is used to allow the STK use various version";i:1;s:59:"numbers for each of its tools. Tools are groups by category";i:2;s:65:"as they are contained in the toolkit. Each tool entry can contain";i:3;s:22:"the following entries:";i:4;s:10:" - latest:";i:5;s:57:"     The version number of the latest release of the tool";i:6;s:70:"     If the user is using an older version he’ll be notified on this";i:7;s:12:" - blocking:";i:8;s:60:"     A list of version numbers that are considered `blocked`";i:9;s:61:"     if the version the user is using is being blocked by one";i:10;s:51:"     of these versions the tool will be disallowed.";i:11;s:12:" - disabled:";i:12;s:63:"     A special option that will block *any* version of the tool";i:13;s:68:"     will be used to disable a certain tool across all installations";i:14;s:45:"     if deemed necassary by the Support Team.";}s:4:"_stk";O:8:"stdClass":4:{s:6:"latest";s:9:"2.0.0-dev";s:8:"blocking";a:0:{}s:8:"disabled";b:1;s:6:"reason";s:32:"STK disabled for testing purpose";}s:6:"_tools";O:8:"stdClass":1:{s:3:"foo";O:8:"stdClass":3:{s:3:"bar";O:8:"stdClass":2:{s:6:"latest";s:9:"2.0.3-rc3";s:8:"blocking";a:2:{i:0;s:5:"1.5.4";i:1;s:5:"1.4.1";}}s:6:"foobar";O:8:"stdClass":2:{s:6:"latest";s:5:"1.0.0";s:8:"blocking";a:0:{}}s:8:"disabled";O:8:"stdClass":3:{s:6:"latest";s:5:"1.5.0";s:8:"blocking";a:0:{}s:8:"disabled";b:1;}}}}');
		$this->assertEquals($expected, $this->versionCheck->getVersionData());
	}

	public function test_getVersionInfo_category()
	{
		$expected = unserialize('O:8:"stdClass":3:{s:3:"bar";O:8:"stdClass":2:{s:6:"latest";s:9:"2.0.3-rc3";s:8:"blocking";a:2:{i:0;s:5:"1.5.4";i:1;s:5:"1.4.1";}}s:6:"foobar";O:8:"stdClass":2:{s:6:"latest";s:5:"1.0.0";s:8:"blocking";a:0:{}}s:8:"disabled";O:8:"stdClass":3:{s:6:"latest";s:5:"1.5.0";s:8:"blocking";a:0:{}s:8:"disabled";b:1;}}');
		$this->assertEquals($expected, $this->versionCheck->getVersionData('foo'));
	}

	public function test_getVersionInfo_tool()
	{
		$expected = unserialize('O:8:"stdClass":2:{s:6:"latest";s:5:"1.0.0";s:8:"blocking";a:0:{}}');
		$this->assertEquals($expected, $this->versionCheck->getVersionData('foo', 'foobar'));
	}

	public function test_no_version_entry()
	{
		$this->assertSame(stk_core_version_controller::VERSION_OK, $this->versionCheck->testToolVersion('foo', 'barfoo'));
	}

	public function test_version_warning()
	{
		$this->assertSame(stk_core_version_controller::VERSION_WARNING, $this->versionCheck->testToolVersion('foo', 'foobar'));
	}

	public function test_version_blocking()
	{
		$this->assertSame(stk_core_version_controller::VERSION_BLOCKING, $this->versionCheck->testToolVersion('foo', 'bar'));
	}

	public function test_version_disabled()
	{
		$this->assertSame(stk_core_version_controller::VERSION_DISABLED, $this->versionCheck->testToolVersion('foo', 'disabled'));
	}

	public function test_stk_blocked()
	{
		@define('STK_VERSION', '2.0.0-dev');
		try {
			$this->versionCheck->testSTKVersion();
		}
		catch (stk_exceptions_version $e)
		{
			$this->assertSame("STK disabled for testing purpose", $e->getMessage());
			return;
		}

		$this->fail('Expects an `stk_exceptions_version` exception to be thrown');
	}
}
