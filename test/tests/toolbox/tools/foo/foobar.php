<?php
/**
 *
 * @package SupportToolkitTest
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class stktool_foo_foobar extends stk_toolbox_toolBase
{
	const TOOL_VERSION = '1.0.0-rc1';

	public function __construct()
	{
		$this->toolName = 'testtool';
	}

	public function displayOptions() {}
}
