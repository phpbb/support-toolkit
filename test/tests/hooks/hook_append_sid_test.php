<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

if (!function_exists('phpbb_session_append_sid_test'))
{
	global $phpbb_tests_path;
	require $phpbb_tests_path . 'session/append_sid_test.php';
}

/**
 * This test suite extends the phpbb append_sid tests
 * to assure that the default behavior doesn't get broken.
 */
class hook_append_sid_test extends phpbb_session_append_sid_test
{
	private $board_url;

	protected function setUp()
	{
		global $phpbb_hook, $request, $user;

		// Setup the hook
		require_once PHPBB_FILES . 'includes/hooks/index.php';
		require_once STK_ROOT . 'hooks/append_sid.php';
		$phpbb_hook = new phpbb_hook(array('append_sid'));
		$phpbb_hook->register('append_sid', 'stk_append_sid');

		$request = new phpbb_request(null, false);
		$user = new stk_test_mock_user();

		$this->board_url = generate_board_url();
	}

	public function hook_append_sid_data()
	{
		return array(
			array(array('home', 'main'), false, true, false, '/index.php?c=home&amp;t=main', 'Parameter less call'),
			array(array('home', 'main', array('p' => 'param', 'p2' => 'param2')), false, true, false, '/index.php?c=home&amp;t=main&amp;p=param&amp;p2=param2', 'Parameters in url segement'),
			array(array('home', 'main'), array('p' => 'param', 'p2' => 'param2'), true, false, '/index.php?c=home&amp;t=main&amp;p=param&amp;p2=param2', 'Parameters array'),
			array(array('home', 'main'), 'p=param&amp;p2=param2', true, false, '/index.php?c=home&amp;t=main&amp;p=param&amp;p2=param2', 'parameters in params-argument using &'),
			array(array('home', 'main'), 'p=param&p2=param2', false, false, '/index.php?c=home&t=main&p=param&p2=param2', 'parameters in params-argument using &amp;'),

			// Incorrect but rescuable calls
			array(array(false, 'main'), false, true, false, '/index.php?c=home&amp;t=main', 'Missing category, defaults to home'),
			array(array('home'), false, true, false, '/index.php?c=home&amp;t=', 'Missing tool, default to empty'),
		);
	}

	public function hook_append_sid_phpbb_call_data()
	{
		return array(
			// phpBB calls using $phpbb_root_path
			array(PHPBB_ROOT_PATH . 'index.php', false, true, false, 'index.php', 'Append SID call with $phpbb_root_path'),
		);
	}

	/**
	 * @dataProvider hook_append_sid_data
	 */
	public function test_hook_append_sid($url, $params, $is_amp, $session_id, $expected, $description)
	{
		$this->assertEquals($this->board_url . $expected, append_sid($url, $params, $is_amp, $session_id), $description);
	}

	/**
	 * @dataProvider hook_append_sid_phpbb_call_data
	 */
	public function test_hook_append_sid_phpbb_call($url, $params, $is_amp, $session_id, $expected, $description)
	{
		$this->assertEquals($expected, append_sid($url, $params, $is_amp, $session_id), $description);
	}
}
