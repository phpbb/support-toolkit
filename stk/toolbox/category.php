<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * Category object
 *
 * The category object represents a support toolkit category and contains
 * all tools and their information that belong to this category.
 */
class stk_toolbox_category
{
	private $active;
	private $name;
	private $path;
	private $toolList;

	public function __construct(SplFileInfo $path)
	{
		global $user;

		$this->active	= false;
		$this->name		= $path->getBasename();
		$this->path		= $path;
		$this->toolList	= array();

		// @todo, better way to handle test compatibility
		if ($user instanceof user)
		{
			$user->stk_add_lang("categories/{$this->name}");
		}
	}

	public function loadTools()
	{
		$it = new DirectoryIterator($this->path->getPathname());
		foreach ($it as $file)
		{
			// Skip any directory
			if ($file->isDir())
			{
				continue;
			}

			// A string is returned when an tool isn't loadable. For the category
			// listing we simply skip those cases
			$tool = stk_toolbox_tool::createTool($file->getFileInfo());
			if (false === is_string($tool))
			{
				$this->toolList[$tool->getID()] = $tool;
			}
		}

		ksort($this->toolList);
	}

	public function createOverview()
	{
		global $template, $user;

		$template->assign_vars(array(
			'CATEGORY_TITLE'		=> $user->lang(strtoupper($this->name . '_TITLE')),
			'CATEGORY_DESCRIPTION'	=> $user->lang(strtoupper($this->name . '_DESCRIPTION')),
		));

		stk_includes_utilities::page_header();
		stk_includes_utilities::page_footer('category_overview.html');
	}

	public function isActive()
	{
		return $this->active;
	}

	public function setActive($active = false)
	{
		$this->active = $active;
	}

	public function getCategoryURL(array $params = array())
	{
		$params['c'] = $this->getName();

		return append_sid(STK_WEB_PATH . '/index.php', $params);
	}

	public function getName()
	{
		return $this->name;
	}

	public function getToolCount()
	{
		return sizeof($this->toolList);
	}

	public function getToolList()
	{
		return $this->toolList;
	}

	public function getTool($toolName)
	{
		return (!empty($this->toolList[$toolName])) ? $this->toolList[$toolName] : null;
	}
}
