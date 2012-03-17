<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * STK Template wrapper
 *
 * Wrapper class for the phpBB template object to easily allow additional
 * functionallity.
 */
class stk_core_template extends phpbb_template
{
	private $user;

	/**
	 * Constructor.
	 *
	 * @param string $phpbb_root_path phpBB root path
	 * @param user $user current user
	 * @param phpbb_template_locator $locator template locator
	 * @param phpbb_template_path_provider $provider template path provider
	 */
	public function __construct($phpbb_root_path, $phpEx, $config, $user, phpbb_template_locator $locator, phpbb_template_path_provider_interface $provider)
	{
		$this->user = $user;
		parent::__construct($phpbb_root_path, $phpEx, $config, $user, $locator, $provider);
	}

	/**
	 * Add a notice box
	 *
	 * @param type $noticeTitle
	 * @param type $noticeDescription
	 */
	public function addNotice($noticeTitle, $noticeDescription)
	{
		$this->assign_block_vars('notices', array(
			'TITLE'			=> $this->user->lang($noticeTitle),
			'DESCRIPTION'	=> $this->user->lang($noticeDescription),
		));
	}
}
