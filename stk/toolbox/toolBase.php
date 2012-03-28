<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

abstract class stk_toolbox_toolBase implements stk_toolbox_toolInterface
{
	protected $stk;

	public function __construct(Pimple $stk)
	{
		$this->stk = $stk;
	}

	public function run()
	{
		throw new RuntimeException('Tool not yet implemented!');
	}
}
