<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * STK User class
 *
 * Suppor toolkit cache service, extends the phpBB cache service
 */
class stk_wrapper_cache_service extends phpbb_cache_service
{
	/**
	 * Get categories
	 *
	 * Load all the STK categories
	 *
	 * @param SplFileInfo $path
	 * @return \stk_toolbox_category
	 */
	public function obtainSTKCategories(SplFileInfo $path)
	{
		if (false === ($categorylist = $this->get('_STKCategories')))
		{
			$it = new DirectoryIterator($path->getPathname());
			foreach ($it as $dir)
			{
				// Skip what we don't need
				if ($dir->isDot() || !$dir->isDir())
				{
					continue;
				}

				$category = new stk_toolbox_category(new SplFileInfo($dir->getPathname()));
				$category->setCache($this);
				$categorylist[$dir->getBasename()] = $category;
			}

			$this->get_driver()->put('_STKCategories', $categorylist);
		}

		return $categorylist;
	}

	/**
	 * Get category tools
	 *
	 * Get all the tools associated with a given category
	 *
	 * @param SplFileInfo $path
	 * @return type
	 */
	public function obtainSTKCategoryTools(SplFileInfo $path)
	{
		if (false === ($toollist = $this->get('_STKCategoryTools' . ucfirst($path->getFilename()))))
		{
			$toollist = array();

			$it = new DirectoryIterator($path->getPathname());
			foreach ($it as $file)
			{
				// Skip any directory
				if ($file->isDir())
				{
					continue;
				}

				// A string is returned when an tool isn't loadable. For the category
				// listing we simply skip those cases
				$tool = new stk_toolbox_tool($file->getFileInfo());
				if (false === is_string($tool))
				{
					$toollist[$tool->getID()] = $tool;
				}
			}

			ksort($toollist);

			$this->get_driver()->put('_STKCategoryTools' . ucfirst($path->getFilename()), $toollist);
		}

		return $toollist;
	}

	/**
	 * Retrieve version information
	 */
	public function obtainSTKVersionData($versionCheckFile)
	{
		if (false === ($versionData = $this->get('_STKVersionData')))
		{
			$opts = array(
				'http' => array(
					'method'		=> 'GET',
					'max_redirects' => '10',
					'user_agent'	=> 'phpBB Support Toolkit version checker',
				),
			);

			$context		= stream_context_create($opts);
			$stream			= fopen($versionCheckFile, 'r', false, $context);
			$responce		= stream_get_contents($stream);
			$versionData	= json_decode($responce);
			fclose($stream);

			$this->put('_STKVersionData', $versionData);
		}

		return $versionData;
	}
}
