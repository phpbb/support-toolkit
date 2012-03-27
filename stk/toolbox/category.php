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
class stk_toolbox_category implements Serializable
{
	private $active;
	private $name;
	private $path;
	private $stk;
	private $toolList;

	/**
	 * Initialse the category
	 *
	 * @param Pimple $stk The STK DI Container
	 */
	public function __construct(Pimple $stk = null)
	{
		$this->active	= false;
		$this->stk		= $stk;
		$this->toolList	= array();
	}

	/**
	 * Create overview
	 *
	 * Generate the overview page of this category
	 */
	public function createOverview()
	{
		$this->stk['phpbb']['template']->assign_vars(array(
			'CATEGORY_TITLE'		=> $this->stk['phpbb']['user']->lang(strtoupper($this->name . '_TITLE')),
			'CATEGORY_DESCRIPTION'	=> $this->stk['phpbb']['user']->lang(strtoupper($this->name . '_DESCRIPTION')),
		));

		$this->stk['utilities']->page_header();
		$this->stk['utilities']->page_footer('category_overview.html');
	}

	/**
	 * Load the language file for this category
	 */
	public function loadCategoryLanguageFile()
	{
		$this->stk['phpbb']['user']->stk_add_lang("categories/{$this->name}");
	}

	/**
	 * Load tools
	 *
	 * Load all the tools associated with this category
	 */
	public function loadTools()
	{
		// Get all tools
		$this->toolList = $this->stk['cache']['stk']->obtainSTKCategoryTools($this->path);

		// Load the tools
		foreach ($this->toolList as $key => $tool)
		{
			$tool->setDIContainer($this->stk);
			if (false === ($tool->validateAndLoad()))
			{
				unset($this->toolList[$key]);
			}
		}

		ksort($this->toolList);
	}

	/**
	 * Category is the current "active" category
	 * @return bool
	 */
	public function isActive()
	{
		return $this->active;
	}

	/**
	 * Build the URL pointing to this category
	 * 
	 * @param array $params Any additional parameters that should be set in the URL
	 * @return string the URL
	 */
	public function getCategoryURL(array $params = array())
	{
		$params['c'] = $this->getName();

		return append_sid(STK_WEB_PATH . '/index.php', $params);
	}

	/**
	 * Set active
	 *
	 * Change the active status of this category
	 *
	 * @param bool $active
	 */
	public function setActive($active = false)
	{
		$this->active = (bool) $active;
	}

	/**
	 * Set category path
	 *
	 * Set the path to this category directory on the filesystem
	 *
	 * @param SplFileInfo $path
	 */
	public function setPath(SplFileInfo $path)
	{
		$this->name	= $path->getBasename();
		$this->path	= $path;
	}

	/**
	 * Get the name of this category
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the number of tools that belong to this category
	 * @return integer
	 */
	public function getToolCount()
	{
		return sizeof($this->toolList);
	}

	/**
	 * Get all the tools
	 * @return array
	 */
	public function getToolList()
	{
		return $this->toolList;
	}

	/**
	 * Get one specific tool
	 *
	 * @param string $toolName
	 * @return stk_toolbox_tool
	 */
	public function getTool($toolName)
	{
		return (!empty($this->toolList[$toolName])) ? $this->toolList[$toolName] : null;
	}

	/**
	 * Set the DI container for this category
	 *
	 * @param Pimple $stk
	 */
	public function setDIContainer(Pimple $stk)
	{
		$this->stk = $stk;
	}

	/**
	 * Serialize this category for storage
	 *
	 * @return string
	 */
	public function serialize()
	{
		$data = array(
			'active'	=> $this->active,
			'name'		=> $this->name,
			// Needed as `SplFileInfo` can't be serialized
			'path'		=> $this->path->getPathname(),
			'toolList'	=> $this->toolList,
		);

		return serialize($data);
	}

	/**
	 * Unserialize this catogry when retrieved from storage
	 *
	 * @param string $serialized
	 */
	public function unserialize($serialized)
	{
		$data = unserialize($serialized);

		$this->active	= $data['active'];
		$this->name		= $data['name'];
		$this->path		= new SplFileInfo($data['path']);
		$this->toolList	= $data['toolList'];
	}
}
