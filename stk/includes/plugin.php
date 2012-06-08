<?php
/**
*
* @package Support Toolkit - Plugin handler
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

// Load functions_admin.php if required
if (!function_exists('filelist'))
{
	include(PHPBB_ROOT_PATH . 'includes/functions_admin.' . PHP_EXT);
}

class plugin
{
	/**
	 * A list containing file and directory names that should be ignored
	 *
	 * @var array
	 * @access private
	 */
	var $ignore_tools = array('index.htm', 'tutorial.php');

	/**
	 * List containing all available tools and in which category they belong.
	 * Categories and tools kan de defined here to force their order on the
	 * page listing.
	 *
	 * @var array
	 * @access private
	 */
	var $plugin_list = array(
		'main' 		=> array(
			'erk',
		),
		'support'	=> array(),
	);

	/**
	 * Path to the tools directory
	 *
	 * @var String
	 * @access public
	 */
	var $tool_box_path = '';

	/**
	 * Parts, used to build the query string
	 */
	var $_parts = array(
		'c' => 'main',
		't' => '',
	);

	/**
	 * Constructor
	 * Load the list with available plugins and assign them in the correct category
	 */
	function plugin()
	{
		// Set the path
		$this->tool_box_path = STK_ROOT_PATH . 'tools/';

		// Create a list with tools
		$filelist = filelist($this->tool_box_path, '', PHP_EXT);

		// Need to do some sanitization on the result of filelist
		foreach ($filelist as $cat => $tools)
		{
			// Don't need those
			if (empty($cat))
			{
				continue;
			}

			$cat = (substr($cat, -1) == '/') ? substr($cat, 0, -1) : $cat;

			if (!isset($this->plugin_list[$cat]))
			{
				$this->plugin_list[$cat] = array();
			}

			// Don't want the extension
			foreach ($tools as $key => $tool)
			{
				$tools[$key] = (($pos = strpos($tool, '.' . PHP_EXT)) !== false) ? substr($tool, 0, $pos) : $tool;
			}

			$this->plugin_list[$cat] = $tools;
		}

		// Get the requested cat and tool
		$this->_parts['c'] = request_var('c', $this->_parts['c']);
		$this->_parts['t'] = request_var('t', $this->_parts['t']);

		// We shouldn't rely on the given category request, unless there really is a tool with that name in the given category
		if ($this->_parts['t'] && (!isset($this->plugin_list[$this->_parts['c']]) || !in_array($this->_parts['t'], $this->plugin_list[$this->_parts['c']])))
		{
			foreach ($this->plugin_list as $cat => $tools)
			{
				foreach ($tools as $tool)
				{
					if ($tool == $this->_parts['t'])
					{
						$this->_parts['c'] = $cat;
					}
				}
			}
		}

		// Check if they want to use a tool or not, make sure that the tool name is legal, and make sure the tool exists
		if (!$this->_parts['t'] || preg_match('#([^a-zA-Z0-9_])#', $this->_parts['t']) || !file_exists(STK_ROOT_PATH . 'tools/' . $this->_parts['c'] . '/' . $this->_parts['t'] . '.' . PHP_EXT))
		{
			$this->_parts['t'] = '';
		}

		// Make sure the form_key is set
		add_form_key($this->_parts['t']);

		// Assign the two menus to the template
		$this->gen_top_nav();
		$this->gen_left_nav();
	}

	/**
	 * Load the requested tool
	 *
	 * @param String $tool_cat The category of this tool.
	 * @param String $tool_name The name of this tool
	 * @param Boolean $return Specify whether an object of this tool will be returned
	 * @return The object of the requested tool if $return is set to true else this method will return true
	 */
	function load_tool($tool_cat, $tool_name, $return = true)
	{
		global $user;

		static $tools_loaded = array();

		if (isset($tools_loaded[$tool_name]))
		{
			return ($return) ? $tools_loaded[$tool_name] : true;
		}

		$tool_path = $this->tool_box_path . $tool_cat . '/' . $tool_name . '.' . PHP_EXT;
		if (false === (@include $tool_path))
		{
			trigger_error(sprintf($user->lang['TOOL_INCLUTION_NOT_FOUND'], $tool_path), E_USER_ERROR);
		}

		if (!class_exists($tool_name))
		{
			trigger_error(sprintf($user->lang['INCORRECT_CLASS'], $tool_name, PHP_EXT), E_USER_ERROR);
		}

		// Construct the class
		$tools_loaded[$tool_name] = new $tool_name();

		// Add the language file (not needed for 'erk' ;))
		if ($tool_name != 'erk')
		{
			// SRT Generator gets handled a bit different
			$force_lang = ($tool_name == 'srt_generator') ? 'en' : false;
			stk_add_lang('tools/' . $tool_cat . '/' . $tool_name, $force_lang);
		}

		// Return
		return ($return) ? $tools_loaded[$tool_name] : true;
	}

	/**
	 * Create the correct URI arguments for the current page
	 *
	 * @param Define whether this function returns an array with elements or a string
	 * @return An array|String with the URI parameters
	 */
	function url_arg($string = false)
	{
		$args	= array();
		$str	= '?';

		// Run through the parts
		foreach ($this->_parts as $key => $value)
		{
			if ($value != '')
			{
				$args[$key] = $value;

				if (substr($str, -5) != '&amp;')
				{
					$str .= '&amp;';
				}

				$str .= $key . '=' . $value;
			}
		}

		return ($string) ? $str : $args;
	}

	/**
	 * Get a given part
	 */
	function get_part($key)
	{
		if (empty($this->_parts))
		{
			return false;
		}

		return $this->_parts[$key];
	}

	/**
	 * Add a new part
	 */
	function set_part($key, $value)
	{
		$this->_parts[$key] = $value;
	}

	/**
	 * Build the top "category" navigation for every page
	 */
	function gen_top_nav()
	{
		global $template, $user;

		// Loop through the plugin list. The first keys are the categories
		$cats = array_keys($this->plugin_list);
		foreach ($cats as $cat)
		{
			// Ignore all categories that are empty (excluding "main" and erk)
			if (empty($this->plugin_list[$cat]) && !in_array($cat, array('main', 'erk')))
			{
				continue;
			}

			// Active cat?
			$_s_active = ($cat == $this->_parts['c']) ? true : false;

			// Assign to the template
			$template->assign_block_vars('top_nav', array(
				'L_TITLE'		=> $user->lang['CAT_' . strtoupper($cat)],
				'S_SELECTED'	=> $_s_active,
				'U_TITLE'		=> append_sid(STK_INDEX, array('c' => $cat)),
			));
		}
	}

	/**
	 * Build the left "tool" navigation for every page
	 * This is based upon the active tool
	 */
	function gen_left_nav()
	{
		global $template, $user;

		// Grep the correct category
		$tool_list = $this->plugin_list[$this->_parts['c']];

		// Run through the tools and collect all info we need
		$tpl_data = array();
		foreach ($tool_list as $tool)
		{
			$class = $this->load_tool($this->_parts['c'], $tool);

			// Can this tool be used?
			if (method_exists($class, 'tool_active'))
			{
				if ($class->tool_active() !== true)
				{
					continue;
				}
			}

			// Get the info
			if (method_exists($class, 'info'))
			{
				$info = $class->info();
			}
			else
			{
				// For us lazy people
				$info = array(
					'NAME'			=> (isset($user->lang[strtoupper($tool)])) ? $user->lang[strtoupper($tool)] : strtoupper($tool),
				);
			}

			$tpl_data[$tool] = $info['NAME'];
		}

		// Sort the data based on the tool name. This way we'll keep the menu sorted correctly for translations
		asort($tpl_data);

		// Now go ahead and build the template
		foreach ($tpl_data as $tool => $name)
		{
			$_s_active = ($tool == $this->_parts['t']) ? true : false;

			// Assign to the template
			$template->assign_block_vars('left_nav', array(
				'L_TITLE'		=> $name,
				'S_SELECTED'	=> $_s_active,
				'U_TITLE'		=> append_sid(STK_INDEX, array('c' => $this->_parts['c'], 't' => $tool)),
			));
		}
	}
}
