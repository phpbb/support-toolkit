<?php

class stk_test_mock_user extends phpbb_mock_user
{
	public $data;
	public $host;
	public $lang;
	public $page;

	public function __construct()
	{
		global $phpbb_tests_path;
		require_once $phpbb_tests_path . 'mock/lang.php';

		$this->data = array(
			'session_id'	=> microtime(true),
		);

		$this->host = '127.0.0.1/';
		$this->lang = new phpbb_mock_lang();
		$this->page = array(
			'root_script_path'	=> 'stk',
		);
	}

	public function stk_add_lang()
	{
		return true;
	}
}
