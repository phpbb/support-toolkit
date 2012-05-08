<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * STK style wrapper
 *
 * Wrapper class for the phpBB style object to easily allow additional
 * functionallity.
 */
class stk_wrapper_style extends phpbb_style
{
	protected $_template;

	/**
	 * Construct the style wrapper
	 *
	 * @param Pimple $stk
	 */
	public function __construct(Pimple $stk)
	{
		parent::__construct(
			$stk['config']['phpbb_root_path'],
			$stk['config']['phpEx'],
			$stk['phpbb']['config_mock'],
			$stk['phpbb']['user'],
			$stk['phpbb']['style_locator'],
			$stk['phpbb']['style_path_provider'],
			$stk['phpbb']['template']
		);

		$this->_template = $stk['phpbb']['template'];
	}

	/**
	* Set custom style location (able to use directory outside of phpBB).
	*/
	public function set_custom_style()
	{
		parent::set_custom_style('supporttoolkit', STK_ROOT . 'view/');//, STK_ROOT);
		$this->_template->cachepath = $this->cachepath = STK_ROOT . 'cache/tpl_';
	}
}
