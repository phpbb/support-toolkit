<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * Mock config object
 *
 * This object is used to define various phpBB config options, this static
 * variation is used to assure that these configuration options don't behave
 * in an unexpected manner. In most cases this information is used when
 * phpbb interacts with its configuration array.
 */
class stk_wrapper_config extends phpbb_config
{
	/**
	 * The phpBB actual config object
	 * @var type 
	 */
	private $phpbb_config;

	public function __construct(phpbb_config $phpbb_config)
	{
		$this->phpbb_config = $phpbb_config;

		// Set some static configuration options
		$mock_config = array(

		);

		// In certain cases we *must* rely on the actual configuration
		// merge these options into the mock data
		$mock_config = array_merge($mock_config, array(
			'auth_method'	=> $this->phpbb_config['auth_method'],
			'default_lang'	=> $this->phpbb_config['default_lang'],
		));

		parent::__construct($mock_config);
	}
}