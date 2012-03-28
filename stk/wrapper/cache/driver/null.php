<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class stk_wrapper_cache_driver_null extends phpbb_cache_driver_null
{
	public function __construct()
	{
		parent::__construct();
	}
}