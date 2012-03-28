<?php

class stk_test_mock_user extends phpbb_mock_user
{
	public $data;
	public $lang;

	public function __construct()
	{
		global $phpbb_tests_path;
		require_once $phpbb_tests_path . 'mock/lang.php';

		$this->data = array(
			'session_id'	=> microtime(true),
		);

		$this->lang = new phpbb_mock_lang();
	}

	public function stk_add_lang()
	{
		return true;
	}
}
