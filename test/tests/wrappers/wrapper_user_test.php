<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class wrapper_user_test extends stk_test_case
{
	private $user;

	protected function setUp()
	{
		$stk = $this->get_test_case_helpers()->getSTKObject();
		$this->user = $stk['phpbb']['user'];
	}

	public function test_stk_add_lang()
	{
		$this->assertArrayNotHasKey('S_CONTENT_DIRECTION', $this->user->lang);
		$this->user->stk_add_lang('common');
		$this->assertArrayHasKey('S_CONTENT_DIRECTION', $this->user->lang);
	}

	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function test_stk_add_lang_not_found()
	{
		$this->user->stk_add_lang('non_existing');
	}
}
