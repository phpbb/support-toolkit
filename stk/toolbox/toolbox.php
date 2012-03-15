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
	private $toolsPath;

	public function __construct(SplFileInfo $toolsPath)
	{
		$this->categories	= array();
		$this->toolsPath	= $toolsPath;

		// Bind a toolbox specific classloader
		$toolbox_class_loader = new phpbb_class_loader('stktool_', $this->toolsPath->getPathname() . '/');
		$toolbox_class_loader->register();
	}

	public function loadToolboxCategories()
	{
		$it = new DirectoryIterator($this->toolsPath->getPathname());
		foreach ($it as $dir)
		{
			// Skip what we don't need
			if ($dir->isDot() || !$dir->isDir())
			{
				continue;
			}

			$this->categories[$dir->getBasename()] = new stk_toolbox_category(new SplFileInfo($dir->getPathname()));
		}

		uksort($this->categories, array($this, 'categorysSort'));
	}

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

	public function getToolboxCategories()
	{
		return $this->categories;
	}

	public function getToolboxCategory($categoryName)
	{
		return (!empty($this->categories[$categoryName])) ? $this->categories[$categoryName] : null;
	}
}
