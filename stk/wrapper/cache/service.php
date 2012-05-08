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
	 * Get a plugin tree
	 *
	 * Read the requested plugin tree from the cache or otherwise generate
	 * the tree based upon the path that is provided.
	 *
	 * @param type $path
	 * @param type $regex
	 * @param stk_plugin_version_controller $vc
	 * @return stk_plugin_category
	 */
	public function obtain_plugin_tree($path, $regex, stk_plugin_version_controller $vc = null)
	{
		// Try to get from the cache
		$plugin_tree = $this->get('_stk_plugin_sniffer_' . md5($path));
		if ($plugin_tree === false)
		{
			$plugin_tree		= array();

			$directory_iterator	= new RecursiveDirectoryIterator($path);
			$regex_iterator		= new stk_plugin_recursive_regex_iterator($directory_iterator, $regex);
			$iterator_iterator	= new RecursiveIteratorIterator($regex_iterator);

			$category = null;

			foreach ($iterator_iterator as $current)
			{
				$matches = array();
				preg_match($regex, $current->getPathname(), $matches);

				if (!is_null($vc))
				{
					$validated = $vc->validate($matches['category'], $matches['plugin']);
					if (in_array($validated, array(stk_plugin_version_controller::BLOCKED, stk_plugin_version_controller::DISABLED)))
					{
						continue;
					}
				}

				if (is_null($category) || $category->get_name() != $matches['category'])
				{
					// see whether there is already one
					foreach ($plugin_tree as $c)
					{
						if ($c->get_name() == $matches['category'])
						{
							$category = $c;
							break;
						}

						$category = null;
					}

					if (is_null($category))
					{
						$category = new stk_plugin_category($matches['category']);
						$plugin_tree[] = $category;
					}
				}

				$category->add_plugin($matches['plugin']);
			}

			$this->put('_stk_plugin_sniffer_' . md5($path), $plugin_tree);
		}

		return $plugin_tree;
	}
}
