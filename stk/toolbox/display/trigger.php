<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 *
 */
class stk_toolbox_display_trigger
{
	private $notice;
	private $tool;

	public function __construct(stk_toolbox_tool $tool = null, $notice = '')
	{
		$this->notice	= $notice;
		$this->tool		= $tool;
	}

	public function display()
	{
		stk_includes_utilities::confirm_box(false, $this->notice, '', 'tool_confirm.html', $this->tool->getToolURL());
	}

	public function isConfirmed()
	{
		return stk_includes_utilities::confirm_box(true);
	}

	public function setNotice($notice)
	{
		$this->notice = $notice;
	}
}
