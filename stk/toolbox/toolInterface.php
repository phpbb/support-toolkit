<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

interface stk_toolbox_toolInterface
{
	const TOOL_VERSION = '2.0.0-dev';

	public function getName();
	public function displayOptions();
	public function run();
}
