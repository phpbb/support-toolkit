<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class stk_toolbox
{
	private $categories;
	private $stk;
	private $toolsPath;

	/**
	 * Construct the toolbox
	 *
	 * @param Pimple $stk The main STK object
	 */
	public function __construct(Pimple $stk)
	{
		$this->categories	= array();
		$this->stk			= $stk;
		$this->toolsPath	= $stk['toolbox']['toolpath'];

		// Bind a toolbox specific classloader
		$toolbox_class_loader = new stk_core_class_loader('stktool_', $this->toolsPath->getPathname() . '/');
		$toolbox_class_loader->register();
	}

	/**
	 * Load all categories
	 */
	public function loadToolboxCategories()
	{
		$this->categories = $this->stk['cache']['stk']->obtainSTKCategories($this->toolsPath);
		uksort($this->categories, array($this, 'categorysSort'));

		foreach ($this->categories as $category)
		{
			$category->setDIContainer($this->stk);
			$category->loadCategoryLanguageFile();
		}
	}

	/**
	 * Sorting method to make sure that the categories are ordered correctly
	 */
	public function categorysSort($a, $b)
	{
		// Main is always the first
		if ($a == 'main' || $b == 'main')
		{
			return ($a == 'main') ? -1 : 1;
		}

		return strcasecmp($a, $b);
	}

	/**
	 * Switches the active tool
	 *
	 * @param type $category
	 * @param type $tool
	 */
	public function setActiveTool($category, $tool = '')
	{
		foreach ($this->getToolboxCategories() as $catName => $cat)
		{
			$bool = ($catName == $category) ? true : false;
			$cat->setActive($bool);

			if ($cat->getToolCount() > 0)
			{
				foreach ($cat->getToolList() as $toolName => $t)
				{
					$bool = ($toolName == $tool) ? true : false;
					$t->setActive($bool);
				}
			}
		}
	}

	/**
	 * Get the active category.
	 *
	 * @return stk_toolbox_category|null The active category object or null when
	 *                                   none is set to be active
	 */
	public function getActiveCategory()
	{
		foreach ($this->getToolboxCategories() as $cat)
		{
			if ($cat->isActive())
			{
				return $cat;
			}
		}

		return null;
	}

	/**
	 * Get the active tool
	 *
	 * @return stk_toolbox_tool|null The active tool object or null when none is
	 *                               active
	 */
	public function getActiveTool()
	{
		if (null !== ($cat = $this->getActiveCategory()) && $cat->getToolCount() > 0)
		{
			foreach ($cat->getToolList() as $tool)
			{
				if ($tool->isActive())
				{
					return $tool;
				}
			}
		}

		return null;
	}

	/**
	 * Get all the categories
	 */
	public function getToolboxCategories()
	{
		if (empty($this->categories))
		{
			$this->categories = $this->loadToolboxCategories();
		}

		return $this->categories;
	}

	/**
	 * Get the specified category if it exists. Otherwise null
	 */
	public function getToolboxCategory($categoryName)
	{
		return (!empty($this->categories[$categoryName])) ? $this->categories[$categoryName] : null;
	}
}
