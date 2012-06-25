<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class plugin_manager_test extends stk_test_case
{
	private $manager;

	protected function setUp()
	{
		$path			= __DIR__ . '/plugins';
		$stk			= $this->get_test_case_helpers()->getSTKObject();
		$sniffer		= new stk_plugin_sniffer($stk, $path);
		$sniffer->sniff();
		$this->manager	= new stk_plugin_manager($sniffer);

		// Setup plugin auto loader
		$class_loader = new stk_core_class_loader('plugin_', $path . '/');
		$class_loader->register();
	}

	public function test_get_active_category()
	{
		// Should be `main`
		$this->assertEquals('main', $this->manager->get_active()->get_name());
	}

	public function test_get_active_plugin()
	{
		$this->assertEquals('main', $this->manager->get_active()->get_name());
		$this->assertEquals('main_home', $this->manager->get_active(true)->get_identifier());
	}

	public function test_switch_active_category()
	{
		$this->assertEquals('main', $this->manager->get_active()->get_name());
		$this->manager->switch_active('category');
		$this->assertEquals('category', $this->manager->get_active()->get_name());
	}

	public function test_switch_active_plugin()
	{
		$this->assertEquals('main_home', $this->manager->get_active(true)->get_identifier());
		$this->manager->switch_active('versions', 'ok');
		$this->assertEquals('versions_ok', $this->manager->get_active(true)->get_identifier());
	}
}
