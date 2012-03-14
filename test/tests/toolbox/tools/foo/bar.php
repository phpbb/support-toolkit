<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class stktool_foo_bar extends stk_toolbox_toolBase
{
	public function __construct()
	{
		$this->toolName = __CLASS__;
	}

	public function displayOptions() {}
}
