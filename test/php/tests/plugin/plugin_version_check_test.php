<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class plugin_version_check_test extends stk_test_case
{
	private $version_controller;

	protected function setUp()
	{
		$stk			= $this->get_test_case_helpers()->getSTKObject();
		$plugin_config = json_decode(file_get_contents(__DIR__ . '/plugins/plugin.json'), true);
		$this->version_controller = new stk_plugin_version_controller($plugin_config['version_check'], __DIR__ . '/plugins/', $stk['cache']['stk']);
	}

	public function test_get_version_data()
	{
		$expected = '{
	"_plugins": {
		"versions": {
			"disabled": {
				"latest"	: "1.0.0",
				"disabled"	: true
			},
			"blocked": {
				"latest"	: "1.0.5",
				"blocking"	: [
					"1.0.3",
					"1.0.4"
				]
			},
			"not_blocked": {
				"latest"	: "1.0.5",
				"blocking"	: [
					"1.0.3"
				]
			},
			"no_latest": {
			},
			"ok": {
				"latest"	: "1.0.0"
			},
			"warning": {
				"latest"	: "1.0.0"
			}
		}
	}
}';

		$this->assertSame($expected, $this->version_controller->get_version_data(true));
	}

	public function validate_provider()
	{
		return array(
			array(
				stk_plugin_version_controller::NO_VERSION_DATA,
				'not_set',
			),
			array(
				stk_plugin_version_controller::NO_VERSION_DATA,
				'no_latest',
			),
			array(
				stk_plugin_version_controller::NO_VERSION_DATA,
				'no_plugin_json',
			),
			array(
				stk_plugin_version_controller::DISABLED,
				'disabled',
			),
			array(
				stk_plugin_version_controller::BLOCKED,
				'blocked',
			),
			array(
				stk_plugin_version_controller::OK,
				'not_blocked',
			),
			array(
				stk_plugin_version_controller::OK,
				'ok',
			),
		);
	}

	/**
     * @dataProvider validate_provider
     */
	public function test_validate($expected, $plugin)
	{
		$this->assertSame($expected, $this->version_controller->validate('versions', $plugin));
	}
}
