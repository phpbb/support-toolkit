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
	private $stk;

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

		$this->stk = $stk;
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
			'TITLE'			=> $this->stk['phpbb']['user']->lang($noticeTitle),
			'DESCRIPTION'	=> $this->stk['phpbb']['user']->lang($noticeDescription),
		));
	}

	/**
	 * Assign navigation
	 *
	 * Correctly display the navigation for the current page.
	 *
	 * @param stk_toolbox $toolbox
	 */
	public function assignNavigation()
	{
		$categories = $this->stk['toolbox']['box']->getToolboxCategories();
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
				'L_TITLE'	=> $this->stk['phpbb']['user']->lang(strtoupper($category->getName() . '_TITLE')),
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

				$tool->loadToolLanguageFile();

				$this->assign_block_vars('l_block1', array(
					'L_TITLE'	=> $this->stk['phpbb']['user']->lang($tool->getToolLanguageString()),
					'U_TITLE'	=> $tool->getToolURL(),
					'S_ACTIVE'	=> $active,
				));
			}
		}
	}
}
