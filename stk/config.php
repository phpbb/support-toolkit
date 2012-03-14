<?php

/**
 * Support toolkit default configuration
 *
 * This class contains various Support Toolkit related configuration options,
 * to overwrite/change these options copy this file to `local_config.php`
 * and change the class definition from `class stk_config extends phpbb_config`
 * to `stk_local_config extends stk_config` at that point you can edit the
 * configuration data that is being set.
 *
 * As chaning the configuration of the support toolkit might cause unexpected
 * behavior only do this when you understand the impact of your change or when
 * instructed to do so by a support team member.
 */
class stk_config extends phpbb_config
{
	public function __construct(array $local_config = array())
	{
		$config = array(
			// Relative path to a working phpBB 3.1.x installation.
			'phpbb_root_path'	=> './../',

			// Used file extension
			'phpEx'	=> 'php',
		);

		if (!empty($local_config))
		{
			$config = array_merge($config, $local_config);
		}

		parent::__construct($config);
	}
}
