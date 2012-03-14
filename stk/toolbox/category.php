<?php

class stk_toolbox_category
{
	private $active;
	private $name;
	private $path;
	private $toolList;

	public function __construct(SplFileInfo $path)
	{
		$this->active	= false;
		$this->name		= $path->getBasename();
		$this->path		= $path;
		$this->toolList	= array();
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
