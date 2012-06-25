<?php

abstract class stk_test_case extends phpbb_test_case
{
	public function __construct($name = NULL, array $data = array(), $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
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
