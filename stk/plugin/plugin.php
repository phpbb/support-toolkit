<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * Plugin wrapper
 *
 * Container class for plugins, contains various common utility
 * methods for plugins
 */
class stk_plugin
{
	/**
	 * @var String Plugin identifier should be formatted `[category]_[pluginname]`
	 */
	private $identifier;

	/**
	 * @var stk_plugin_interface instance of the actual plugin class
	 */
	private $instance;

	/**
	 * @var bool defines whether this plugin is active
	 */
	private $active;

	/**
	 * Construct the object
	 *
	 * @param string               $identifier Identifier of this plugin
	 * @param bool                 $active     Whether this plugin is active
	 */
	public function __construct($identifier, $active = false)
	{
		$this->active		= $active;
		$this->identifier	= $identifier;
	}

	/**
	 * Construct the actual plugin
	 */
	public function initialise()
	{
		if (is_null($this->instance))
		{
			$rf = new ReflectionClass("plugin_{$this->identifier}");
			$this->instance = $rf->newInstance();
			$this->active = true;
		}
	}

	/**
	 * Checks whether this plugin is active
	 *
	 * @return bool
	 */
	public function is_active()
	{
		return $this->active;
	}

	/**
	 * Change the `$active` flag
	 * 
	 * @param bool $new 
	 */
	public function set_active($new)
	{
		$this->active = (bool) $new;
	}

	/**
	 * Get this plugins identifier
	 *
	 * @return string
	 */
	public function get_identifier()
	{
		return $this->identifier;
	}

	/**
	 * Get the plugin object
	 *
	 * @return stk_plugin_interface
	 */
	public function get_instance()
	{
		return $this->instance;
	}

	/**
	 * Pass remaining calls into the actual plugin object
	 * 
	 * @param type $name
	 * @param type $arguments
	 * @return type
	 */
	public function __call($name, $arguments)
	{
		if (is_null($this->instance))
		{
			$this->initialise();
		}

		return call_user_func_array(array($this->instance, $name), $arguments);
	}
}
