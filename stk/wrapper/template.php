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
	public function addNotice($noticeTitle, $noticeDescription, $global = false)
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
	public function assignNavigation(stk_toolbox $toolbox)
	{
		$categories = $toolbox->getToolboxCategories();
		$activeCategory = null;

		foreach ($categories as $category)
		{
			$active = false;
			if ($category->isActive())
			{
				$active = true;
				$activeCategory = $category;
			}

			$this->assign_block_vars('t_block1', array(
				'L_TITLE'	=> $this->user->lang(strtoupper($category->getName() . '_TITLE')),
				'U_TITLE'	=> $category->getCategoryURL(),
				'S_ACTIVE'	=> $active,
			));
		}

		if ($activeCategory && $activeCategory->getToolCount() > 0)
		{
			$tools = $activeCategory->getToolList();
			foreach ($tools as $tool)
			{
				$active = false;
				if ($tool->isActive())
				{
					$active = true;
				}

				$this->assign_block_vars('l_block1', array(
					'L_TITLE'	=> $this->user->lang($tool->getToolLanguageString()),
					'U_TITLE'	=> $tool->getToolURL(),
					'S_ACTIVE'	=> $active,
				));
			}
		}
	}
}
