<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class plugin_sniffer_test extends stk_test_case
{
	private $path;
	private $manager;

	protected function setUp()
	{
		$this->path		= __DIR__ . '/plugins';
		$stk			= $this->get_test_case_helpers()->getSTKObject();
		$sniffer		= new stk_plugin_sniffer($stk, $this->path);
		$this->manager	= new stk_plugin_manager($sniffer);

		// Setup plugin auto loader
		$class_loader = new stk_core_class_loader('plugin_', $this->path . '/');
		$class_loader->register();
	}

	public function regex_provider()
	{
		return array(
			array(
				0,
				'/',
			),
			array(
				0,
				'/category/plugin/plugin_class.php',
			),
			array(
				0,
				'/cat3gory/plugin/plugin.php',
			),

			array(
				1,
				'/category',
			),
			array(
				1,
				'/category/plugin',
			),
			array(
				1,
				'/category/plugin/plugin.php',
			),
		);
	}

	/**
     * @dataProvider regex_provider
     */
	public function test_regex($result, $path)
	{
		$this->assertSame($result, preg_match($this->manager->sniffer->get_regex(), $this->path . $path));
	}

	public function test_category_sniff()
	{
		$this->manager->sniffer->sniff();

		$expected = array(
			0 => new stk_plugin_category('main', true),
			1 => new stk_plugin_category('category'),
			2 => new stk_plugin_category('versions'),
		);
		$expected[0]->add_plugin('home', true);
		$expected[1]->add_plugin('bar');
		$expected[2]->add_plugins(array(
			array(
				'name'		=> 'ok',
				'active'	=> false,
			),
			array(
				'name'	=> 'warning',
			),
		));

		$this->assertEquals($expected, $this->manager->sniffer->get_plugin_tree());
	}

	public function test_iterator()
	{
		$this->manager->sniffer->sniff();

		$expected = array(
			0 => 'main',
			1 => 'category',
			2 => 'versions',
		);

		foreach ($this->manager->sniffer->get_plugin_tree() as $key => $category)
		{
			$this->assertEquals($expected[$key], $category->get_name());
		}
	}
}
