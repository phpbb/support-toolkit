<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 *
 */
class stk_plugin_sniffer implements Iterator
{
	/**
	 * Cache instance
	 * @var stk_wrapper_cache_service
	 */
	private $cache;

	/**
	 * Plugin configuration
	 * @var array
	 */
	private $config;

	/**
	 * Absolute path to the plugin directory
	 * @var string
	 */
	private $path;

	/**
	 * The actual plugin tree
	 * @var array
	 */
	private $plugin_tree;

	/**
	 * Instance of the plugin version check controller
	 * @var stk_plugin_version_controller
	 */
	private $version_controller;

	/**
	 * Construct the sniffer
	 *
	 * @param Pimple $stk
	 * @param type $plugin_path
	 */
	public function __construct(Pimple $stk, $plugin_path)
	{
		$this->cache	= $stk['cache']['stk'];
		$this->path		= rtrim($plugin_path, '/');

		// Get plugin config
		$this->config = json_decode(file_get_contents($this->path . '/plugin.json'), true);
		$this->version_controller = new stk_plugin_version_controller($this->config['version_check'], $this->path . '/');
	}

	/**
	 * Sniff the provided path for plugins
	 */
	public function sniff()
	{
		// Read from the cache
		$this->plugin_tree = $this->cache->obtain_plugin_tree($this->path, $this->get_regex(), $this->version_controller);

		// Order the categories correctly, "main" is always the first the rest is alphabetical
		usort($this->plugin_tree, function ($a, $b) {
			// Main is always the first
			if ($a->get_name() == 'main' || $b->get_name() == 'main')
			{
				return ($a->get_name() == 'main') ? -1 : 1;
			}

			return strcasecmp($a->get_name(), $b->get_name());
		});

		// Main is always the active one if we're here
		$this->plugin_tree[0]->set_active(true);
		$this->plugin_tree[0]->get_plugin('home')->set_active(true);
	}

	/**
	 * Get the complete plugin tree
	 *
	 * @return array
	 */
	public function get_plugin_tree()
	{
		return $this->plugin_tree;
	}

	/**
	 * Regex used to filter plugin files
	 *
	 * @return string
	 */
	public function get_regex()
	{
		// More complicated than it probably should, but we need to make sure that all directories
		// between the path and the plugin file are matched, otherwise it is dropped
		return '~^' . preg_quote($this->path) . '/(?<category>[a-z]+)(/(?<plugin>[a-z]+)(/(\3)\.php){0,1}){0,1}$~';
	}

	//-- Iterator implementation
	private $iterator_position = 0;
	
	public function current()
	{
		return $this->plugin_tree[$this->iterator_position];
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
		return !empty($this->plugin_tree[$this->iterator_position]);
	}
}
