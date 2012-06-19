<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * Plugin manager
 *
 * Handles all tasks on the plugin tree
 */
class stk_plugin_manager
{
	/**
	 * Sniffer class
	 *
	 * @var stk_plugin_sniffer
	 */
	public $sniffer;

	/**
	 * Construct the manager
	 *
	 * @param stk_plugin_sniffer $sniffer
	 */
	public function __construct(stk_plugin_sniffer $sniffer)
	{
		$this->sniffer = $sniffer;
	}

	/**
	 * Switch active
	 *
	 * Set a different category/plugin as active, before setting the
	 * new flags this method will deactive the previous active
	 * category and plugin
	 *
	 * @param string $category
	 * @param string $plugin
	 */
	public function switch_active($category, $plugin = '')
	{
		// Reset current active
		$this->get_active(true)->set_active(false);
		$this->get_active()->set_active(false);

		foreach ($this->sniffer->get_plugin_tree() as $c)
		{
			if ($c->get_name() == $category)
			{
				$c->set_active(true);

				if ($plugin)
				{
					foreach ($c as $p)
					{
						if ($p->get_identifier() == "{$category}_{$plugin}")
						{
							$p->set_active(true);
						}
					}
				}
			}
		}
	}

	/**
	 * Get active plugin or category
	 *
	 * @param  boolean $plugin         If set to true the active plugin will be
	 *                                 returned, otherwise the active category
	 * @return stk_category|stk_plugin
	 */
	public function get_active($plugin = false)
	{
		foreach ($this->sniffer as $category)
		{
			if ($category->is_active())
			{
				return ($plugin === false) ? $category : $category->get_active_plugin();
			}
		}
	}
}