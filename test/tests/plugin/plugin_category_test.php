<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class plugin_category_test extends stk_test_case
{
	private $path;

	protected function setUp()
	{
		// Setup plugin auto loader
		$this->path	= __DIR__ . '/plugins/';
		$class_loader = new stk_core_class_loader('plugin_', $this->path);
		$class_loader->register();
	}

	public function test_load_plugins()
	{
		$category = new stk_plugin_category('test');
		$category->add_plugins(array(
			array('name' => 'plugin1'),
			array('name' => 'plugin2'),
		));

		$expected = new stk_plugin('test_plugin1');

		$this->assertCount(2, $category->get_plugins());
		$this->assertEquals($expected, $category->get_plugin('plugin1'));
	}

	public function test_initialise_plugin()
	{
		$plugin = new stk_plugin('main_home');

		$this->assertNull($plugin->get_instance());

		$expected = new plugin_main_home();
		$plugin->initialise();
		$this->assertEquals($expected, $plugin->get_instance());
		$this->assertTrue($plugin->is_active());
	}

	public function test_get_plugin_not_exists()
	{
		$category = new stk_plugin_category('test');
		$category->add_plugins(array(
			array('name' => 'plugin1'),
			array('name' => 'plugin2'),
		));

		$this->assertNull($category->get_plugin('plugin3'));
	}

	public function test_set_active()
	{
		$category = new stk_plugin_category('test');
		$this->assertFalse($category->is_active());
		$category->set_active(true);
		$this->assertTrue($category->is_active());
	}

	public function test_build_url()
	{
		// Prepare the append_sid hook
		global $phpbb_hook, $request, $user;

		// Setup the hook
		require_once PHPBB_FILES . 'includes/hooks/index.php';
		require_once STK_ROOT . 'hooks/append_sid.php';
		$phpbb_hook = new phpbb_hook(array('append_sid'));
		$phpbb_hook->register('append_sid', 'stk_append_sid');

		$request = new phpbb_request(null, false);
		$user = new stk_test_mock_user();

		$board_url = generate_board_url();

		// Create a new category
		$category = new stk_plugin_category('test');

		// Validate the url
		$this->assertSame("{$board_url}/index.php?c=test&amp;t=", $category->build_url());
	}

	public function test__call()
	{
		$plugin = new stk_plugin('main_home');
		$this->assertSame('called', $plugin->__call_test());
	}
}
