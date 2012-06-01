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
class stk_wrapper_template extends phpbb_template
{
	private $plugin_manager;
	private $user;

	/**
	 * Constructor.
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
			$stk['phpbb']['style_path_provider']
		);

		$this->plugin_manager	= $stk['plugin']['manager'];
		$this->user				= $stk['phpbb']['user'];
	}

	/**
	 * Add a notice box
	 *
	 * @param type $noticeTitle
	 * @param type $noticeDescription
	 */
	public function add_notice($noticeTitle, $noticeDescription, $global = false)
	{
		$block = ($global === true) ? 'globalnotices' : 'toolnotices';

		$this->assign_block_vars($block, array(
			'TITLE'			=> $this->user->lang($noticeTitle),
			'DESCRIPTION'	=> $this->user->lang($noticeDescription),
		));
	}

	/**
	 * Assign navigation
	 *
	 * Correctly display the navigation for the current page.
	 *
	 * @param stk_toolbox $toolbox
	 */
	public function assign_navigation()
	{
		$plugin_tree = $this->plugin_manager->sniffer->get_plugin_tree();
		$active_category = null;

		foreach ($plugin_tree as $category)
		{
			$active = false;
			if ($category->is_active())
			{
				$active = true;
				$active_category = $category;
			}

			$this->assign_block_vars('t_block1', array(
				'L_TITLE'	=> $this->user->lang(strtoupper($category->get_name() . '_TITLE')),
				'U_TITLE'	=> $category->build_url(),
				'S_ACTIVE'	=> $active,
			));
		}

		if ($active_category && $active_category->has_plugins())
		{
			$tools = $active_category->get_plugins();
			foreach ($tools as $tool)
			{
				$active = false;
				if ($tool->is_active())
				{
					$active = true;
				}

//				$tool->loadToolLanguageFile();

				$this->assign_block_vars('l_block1', array(
					'L_TITLE'	=> $tool->get_identifier(),
					'U_TITLE'	=> $tool->build_url(),
					'S_ACTIVE'	=> $active,
				));
			}
		}
	}
}
