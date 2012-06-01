<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * Plugin category
 *
 * Object that acts as an plugin category
 */
class stk_plugin_category implements Iterator
{
	private $active;
	private $name;
	private $plugins;

	/**
	 * Construct the category
	 *
	 * @param type  $name    Name of the category
	 * @param type  $active  Sets this category as active
	 */
	public function __construct($name, $active = false)
	{
		$this->active = $active;
		$this->name = $name;
		$this->plugins = array();
	}

	/**
	 * Add a new plugin
	 *
	 * @param type $plugin_name Name of the plugin
	 * @param type $active      Sets this plugin as active
	 */
	public function add_plugin($plugin_name, $active = false)
	{
		$this->plugins[] = new stk_plugin("{$this->name}_{$plugin_name}", $active);

		// assure that the plugins keep ordered the same, everywhere, always
		usort($this->plugins, function ($a, $b) {
			// main_home is always the first
			if ($a->get_identifier() == 'main_home' || $b->get_identifier() == 'main_home')
			{
				return ($a->get_identifier() == 'main_home') ? -1 : 1;
			}

			return strcasecmp($a->get_identifier(), $b->get_identifier());
		});
	}

	/**
	 * Add multiple plugins at once
	 *
	 * @param array $plugins
	 */
	public function add_plugins(array $plugins)
	{
		foreach ($plugins as $plugin)
		{
			$this->add_plugin($plugin['name'], !empty($plugin['active']));
		}
	}

	/**
	 * Build the correct URL pointing to this category
	 */
	public function build_url()
	{
		return append_sid(array($this->name));
	}

	/**
	 * Get the name of this category
	 *
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * Checks whether this category has any plugins set
	 *
	 * @return bool
	 */
	public function has_plugins()
	{
		return !empty($this->plugins);
	}

	/**
	 * Get the first active plugin of this category
	 *
	 * @return stk_plugin
	 */
	public function get_active_plugin()
	{
		foreach ($this->plugins as $plugin)
		{
			if ($plugin->is_active())
			{
				return $plugin;
			}
		}
	}

	/**
	 * Get the requested plugin
	 *
	 * @param  string          $identifier Identifier of the plugin
	 * @return null|stk_plugin             The plugin if it exists otherwise
	 *                                     `null`
	 */
	public function get_plugin($identifier)
	{
		foreach ($this->plugins as $plugin)
		{
			if ($plugin->get_identifier() == "{$this->name}_{$identifier}")
			{
				return $plugin;
			}
		}

		return null;
	}

	/**
	 * Get all the plugins that belong to this category
	 *
	 * @return array
	 */
	public function get_plugins()
	{
		return $this->plugins;
	}

	/**
	 * Check whether this category is active
	 *
	 * @return boolean
	 */
	public function is_active()
	{
		return $this->active;
	}

	/**
	 * Set the `$active` variable
	 *
	 * @param bool $set
	 */
	public function set_active($set)
	{
		$this->active = (bool) $set;
	}

	//-- Iterator implementation
	private $iterator_position = 0;

	public function current()
	{
		return $this->plugins[$this->iterator_position];
	}

	public function key()
	{
		$this->iterator_position;
	}

	public function next()
	{
		$this->iterator_position++;
	}

	public function rewind()
	{
		$this->iterator_position = 0;
	}

	public function valid()
	{
		return !empty($this->plugins[$this->iterator_position]);
	}
}
