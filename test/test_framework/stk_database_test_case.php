<?php

abstract class stk_database_test_case extends phpbb_database_test_case
{
	public function __construct($name = NULL, array $data = array(), $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
	}

	public function get_database_config()
	{
		$config = array();

		if (!defined('dbms'))
		{
			$config = array_merge($config, array(
				'dbms'		=> 'sqlite',
				'dbhost'	=> dirname(__FILE__) . '/../blog_unit_tests.sqlite2', // filename
				'dbport'	=> '',
				'dbname'	=> '',
				'dbuser'	=> '',
				'dbpasswd'	=> '',
			));
		}
		else
		{
			$config = array_merge($config, array(
				'dbms'		=> dbms,
				'dbhost'	=> dbhost,
				'dbport'	=> dbport,
				'dbname'	=> dbname,
				'dbuser'	=> dbuser,
				'dbpasswd'	=> dbpasswd,
			));
		}

		return $config;
	}

	protected function create_connection_manager($config)
	{
		return new stk_database_test_connection_manager($config);
	}

	public function get_test_case_helpers()
	{
		if (!$this->test_case_helpers)
		{
			$this->test_case_helpers = new stk_test_case_helpers($this);
		}

		return $this->test_case_helpers;
	}
}
