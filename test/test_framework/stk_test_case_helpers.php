<?php

class stk_test_case_helpers extends phpbb_test_case_helpers
{
	/**
	 * Create the STK "Pimple" Object for all tests
	 */
	public function getSTKObject()
	{
		global $phpbb_root_path;

		$stk = new Pimple();
		$stk['cache'] = $stk->share(function() { return new Pimple(); });
		$stk['phpbb'] = $stk->share(function() { return new Pimple(); });
		$stk['plugin'] = $stk->share(function() { return new Pimple(); });

		$stk['cache']['stk'] = $stk->share(function() use ($stk) {
			$cache_factory = new stk_wrapper_cache_factory('null');
			$cache_service = $cache_factory->get_service();
			return $cache_service;
		});
		$stk['config'] = array(
			'phpbb_root_path'	=> $phpbb_root_path,
			'phpEx'				=> 'php',
		);
		$stk['phpbb']['user'] = $stk->share(function() use ($stk) {
			//return new stk_test_mock_user();
			return new stk_wrapper_user($stk);
		});

		// If in a db test set the DBAL
		if (method_exists($this->test_case, 'new_dbal'))
		{
			$_tc = $this->test_case;
			$stk['phpbb']['db'] = $stk->share(function() use ($_tc) {
				return $_tc->new_dbal();
			});
		}

		return $stk;
	}
}
