<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * Implementation of the RecursiveRegexIterator used to filer the plugin
 * tree and only return files that can be used as plugin.
 */
class stk_plugin_recursive_regex_iterator extends RecursiveRegexIterator
{
	public function accept()
	{
		// First check by regex
		if (!parent::accept())
		{
			return false;
		}

		$inner = $this->getInnerIterator();

		// Check the class
		if (false !== strpos($inner->getSubPath(), '/'))
		{
			$class = 'plugin_' . str_replace('/', '_', $inner->getSubPath());

			if (!class_exists($class))
			{
				return false;
			}
		}

		return true;
	}
}
