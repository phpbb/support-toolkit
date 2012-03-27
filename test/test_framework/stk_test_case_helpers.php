<?php

class stk_test_case_helpers extends phpbb_test_case_helpers
{
	/**
	 * Create the STK "Pimple" Object for all tests
	 */
	public function getSTKObject()
	{
		$stk = new Pimple();
		$stk['cache'] = $stk->share(function() { return new Pimple(); });
		$stk['phpbb'] = $stk->share(function() { return new Pimple(); });
		$stk['toolbox'] = $stk->share(function() { return new Pimple(); });

		$stk['cache']['stk'] = $stk->share(function() use ($stk) {
			$cache_factory = new stk_wrapper_cache_factory('null');
			$cache_service = $cache_factory->get_service();
			$cache_service->setDIContainer($stk);
			return $cache_service;
		});
		$stk['phpbb']['user'] = $stk->share(function() {
			return new stk_test_mock_user();
		});
		$stk['toolbox']['category'] = function () use ($stk) {
			return new stk_toolbox_category($stk);
		};
		$stk['toolbox']['tool'] = function() use ($stk) {
			return new stk_toolbox_tool($stk);
		};
		$stk['vc'] = $stk->share(function($stk) {
			return new stk_core_version_controller('https://raw.github.com/gist/2039820/stk_version_check_test.json', $stk['cache']['stk']);
		});

		return $stk;
	}
}
