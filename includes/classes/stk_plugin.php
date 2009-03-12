<?php
/**
 *
 * @package Support Tool Kit
 * @version $Id$
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 * @ignore
 */
if (!defined('IN_STK'))
{
	exit ();
}

/**
 * Plugins
 * This class controls the tools.
 */
class stk_plugin
{
	var $tool_dir = '';
	
	/**
	 * Array containing all the tools in the correct order and within their
	 * categories
	 *
	 * @var array
	 */
	var $tool_list = array();
	
	/**
	 * Main constructor
	 * Load all the data required for this class
	 */
	function __construct()
	{
		global $cache, $stk;
		
		// Set the tool dir
		$this->tool_dir = STK_TOOL_BOX;
		
		// Build the tool list
		$this->tool_list = $cache->obtain_tool_list($this->tool_dir, $stk->get_config('cache_tools', false));
	}

	/**
	 * Activate the requested tool. Before doing so check whether to requested tool is valid
	 *
	 * @param String $cat The category this tool should be in
	 * @param unknown_type $tool
	 * @return unknown
	 */
	function activate_tool($cat, $tool)
	{
		// Only do this once per tool
		static $tools_init = array();

		if (isset($tools_init[$tool]))
		{
			return $tools_init[$tool];
		}

		global $user;
		
		// Check the request
		if (!isset($this->tool_list[$cat]))
		{
			trigger_error('CAT_NOT_EXISTS', E_USER_ERROR);
		}
		else if (!in_array($tool, $this->tool_list[$cat]))
		{
			trigger_error('TOOL_NOT_EXISTS', E_USER_ERROR);
		}
		
		// Include the file
		if ((@include STK_TOOL_BOX . $cat . '/' . $tool . '.' . PHP_EXT) === false)
		{
			trigger_error('TOOL_NOT_EXISTS');
		}
		
		$class_name = 'stk_' . $tool;
		
		// Check the class
		if (!class_exists($class_name))
		{
			$msg_text = get_lang_entry('TOOL_INVALID_CLASS');
			trigger_error(sprintf($msg_text, STK_TOOL_BOX . $cat . '/' . $tool . '.' . PHP_EXT, 'stk_' . $tool), E_USER_ERROR);
		}
		
		// Load the main language file
		$user->add_lang("tools/{$cat}/{$tool}");
		
		// Construct the tool
		$tool_obj = new $class_name();
		$tools_init[$tool] = $tool_obj;
		return $tools_init[$tool];
	}
	
	/**
	 * Get all the tool categories
	 *
	 * @return The categories
	 */
	function get_categories()
	{
		static $cat_list = null;
		
		if ($cat_list !== null)
		{
			return $cat_list;
		}
		
		// The categories are the first array keys
		$cat_list = array_keys($this->tool_list);
		
		return $cat_list;
	}
	
	function get_tools($cat)
	{
		// Main doesn't contain any tools
		if ($cat == 'main')
		{
			return array();
		}
		return $this->tool_list[$cat];
	}
	
	/**
	 * Generate the tabbed top menu.
	 *
	 * @param String $active_cat the category we're in at the momen
	 */
	function create_tab_menu($active_cat)
	{
		global $template;
		
		$tabs = $this->get_categories();
		
		foreach ($tabs as $tab)
		{
			$active = false;
			if ($tab == $active_cat)
			{
				$active = true;
			}

			$template->assign_block_vars('t_block1', array(
				'L_TITLE'		=> get_lang_entry('CAT_' . utf8_strtoupper($tab)),
				'U_TITLE'		=> append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, array('c' => $tab)),
				'S_SELECTED'	=> $active,
			));
		}
	}
	
	function create_left_menu($active_cat, $active_tool)
	{
		global $template;
		
		$tools = $this->get_tools($active_cat);
		
		foreach ($tools as $key => $tool)
		{
			$active = false;
			if ($tool == $active_tool)
			{
				$active = true;
			}

			// Load the tool
			$this->activate_tool($active_cat, $tool);
			
			$template->assign_block_vars('l_block2', array(
				'L_TITLE'		=> get_lang_entry('TOOL_' . utf8_strtoupper($tool)),
				'U_TITLE'		=> append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, array('c' => $active_cat, 't' => $tool)),
				'S_SELECTED'	=> $active,
			));
		}
	}
}

?>