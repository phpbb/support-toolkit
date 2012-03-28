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
//	public function __construct($phpbb_root_path, $phpEx, $config, $user, phpbb_template_locator $locator, phpbb_template_path_provider_interface $provider)
	public function __construct(Pimple $stk)
	{
		parent::__construct(
			$stk['config']['phpbb_root_path'],
			$stk['config']['phpEx'],
			$stk['phpbb']['config_mock'],
			$stk['phpbb']['user'],
			$stk['phpbb']['template_locator'],
			$stk['phpbb']['template_path_provider']
		);

		$this->stk = $stk;
	}

	/**
	 * Set custom template location (able to use directory outside of phpBB).
	 *
	 * Note: Templates are compiled into the STK cache directory.
	 *
	 * @param string $template_path Path to template directory
	 * @param string $template_name Name of template
	 * @param string $fallback_template_path Path to fallback template
	 * @param string $fallback_template_name Name of fallback template
	 */
	public function set_custom_template($template_path, $template_name, $fallback_template_path = false, $fallback_template_name = false)
	{
		parent::set_custom_template($template_path, $template_name, $fallback_template_path, $fallback_template_name);

		// Change the template cache path to our own
		$this->cachepath = STK_ROOT . 'cache/tpl_';
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
