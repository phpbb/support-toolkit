<?php
/**
*
* @package Support Tool Kit - Plugin handler
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
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
	 * On default it contains the "main" category
	 *
	 * @var array
	 * @access private
	 */
	var $plugin_list = array(
		'main' 		=> array(),
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
		$this->plugin_list = array_merge($this->plugin_list, $this->build_tool_list($this->tool_box_path));

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
	 * Build the list with tools. This method will look recursifley in the given directory
	 *
	 * @param String $dir The directory to look in
	 */
	function build_tool_list($dir)
	{
		// Tools in this directory
		$_plugin_list = array();

		// Path
		if (substr($dir, -1) != '/')
		{
			$dir .= '/';
		}

		if (false !== ($handle = opendir($dir)))
		{
			while (false !== ($file = readdir($handle)))
			{
				// Force lowercase
				$file = utf8_strtolower($file);

				// Skip all *nix hidden files
				if ($file[0] == '.')
				{
					continue;
				}

				// Skip ignores
				if (in_array($file, $this->ignore_tools))
				{
					continue;
				}

				if (is_dir($dir . $file))
				{
					$_plugin_list[$file] = $this->build_tool_list($dir . $file);
				}
				else
				{
					// Strip the extention and add the file to the list
					$file = substr($file, 0, strpos($file, '.'));
					$_plugin_list[] = $file;
				}
			}
			closedir($handle);
		}

		return $_plugin_list;
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

		// Add the language file
		stk_add_lang('tools/' . $tool_name);

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
			// Ignore all categories that are empty (excluding "main")
			if (!sizeof($this->plugin_list[$cat]) && $cat != 'main')
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

		// Loop through the tools and create the template
		foreach ($tool_list as $tool)
		{
			// Active tool?
			$_s_active = ($tool == $this->_parts['t']) ? true : false;

			// Make sure the tool is loaded
			$class = $this->load_tool($this->_parts['c'], $tool);

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

			// Assign to the template
			$template->assign_block_vars('left_nav', array(
				'L_TITLE'		=> $info['NAME'],
				'S_SELECTED'	=> $_s_active,
				'U_TITLE'		=> append_sid(STK_INDEX, array('c' => $this->_parts['c'], 't' => $tool)),
			));
		}
	}
}
?>