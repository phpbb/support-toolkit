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
	exit;
}

/**
 * Main STK class
 */
class stk
{
	/**
	 * STK configuration array
	 *
	 * @var array
	 * @access private
	 */
	var $_config = array(
		/**
		* Used cache type
		*/
		'stk_acm'	=> 'file',
		/**
		* Name used for STK cookies
		*/
		'stk_cookie_name'	=> 'stk_cookie',
		/**
		* The password for the STK authentication method
		*/
		'stk_pass'	=> '',
		/**
		* Running in standalone?
		*/
		'stk_stand_alone'	=> false,
	);
	
	/**
	 * Array holding all error messages
	 *
	 * @var array
	 * @access private
	 */
	var $_error = array();
	
	/**
	 * Array containing all data regarding the active page
	 *
	 * @var array
	 * @access private
	 */
	var $_page = array(
		'action'	=> '',
		'cat'		=> '',
		'confirm'	=> false,
		'req_tool'	=> '',
		'submit'	=> false,
	);
	
	/**
	 * Main constructor
	 *
	 * @access public
	 */
	function __construct()
	{
		// Load the config data
		if ((@include STK_ROOT_PATH . 'stk_config.' . PHP_EXT) === false)
		{
			trigger_error('The configuration file couldn\'t be found. Please check your STK installation!', E_USER_ERROR);
		}
		$this->_config = array_merge($this->_config, $stk_config);
		unset ($stk_config);
		
		// Define standalone or not
		if (!empty($this->_config['stk_pass']) && $this->_config['stk_stand_alone'] === true)
		{
			define ('STK_STANDALONE', true);
		}
		else
		{
			define ('STK_STANDALONE', false);
			
			// Load the phpBB configuration values
			global $dbms, $dbhost, $dbport, $dbname, $dbuser, $dbpasswd, $table_prefix, $acm_type, $load_extensions;
			
			if ((@include PHPBB_ROOT_PATH . 'config.' . PHP_EXT) === false)
			{
				die('<p>The config.' . PHP_EXT . ' file could not be found.</p><p><a href="' . PHPBB_ROOT_PATH . 'install/index.' . PHP_EXT .'">Click here to install phpBB</a><p>');
			}
			
			// Using the internal login method?
			if (!empty($this->_config['stk_pass']))
			{
				define ('STK_LOGIN', true);
			}
		}
	}
	
	/**
	 * Get all page specific data
	 *
	 * @access public
	 */
	function get_page_data()
	{
		$this->_page['action'] = request_var('action', '');
		$this->_page['cat'] = request_var('c', 'main');
		$this->_page['confirm'] = (isset($_GET['confirm_key'])) ? true : false;
		$this->_page['req_tool'] = request_var('t', '');
		$this->_page['submit'] = (isset($_POST['submit']) || isset($_GET['submit'])) ? true : false;
	}
	
	/**
	 * Check the form token if required.
	 * This method will also trigger the error if the token is incorrect
	 */
	function check_form_token()
	{
		// If there isn't a submit, or the page comes from the confirmation page don't check
		if ($this->_page['submit'] && !$this->_page['confirm'])
		{
			if (!check_form_key('stk_form_key_' . $this->page['req_tool']))
			{
				$this->error[] = 'FROM_INVALID';
				return false;
			}
		}
		
		return true;
	}
	
	/**
	 * This method will switch all paths to custom paths
	 */
	function switch_env()
	{
		global $template, $user;
		
		$user->set_custom_lang_path(STK_ROOT_PATH . 'language/');
		$template->set_custom_template(STK_ROOT_PATH . 'style', 'stk_templates');
		
		// Load the common language file
		$user->add_lang('stk_common');
	}
	
	/**
	 * Build the requested page
	 */
	function build_page()
	{
		global $cache;
		
		// Get all the categories
		$cats = $cache->obtain_stk_categories();

		// Invalid cats means invalid request. Thus reset it
		if (!in_array($this->_page['cat'], $cats))
		{
			$this->_page['action'] = '';
			$this->_page['cat'] = 'main';
			$this->_page['confirm'] = false;
			$this->_page['req_tool'] = '';
			$this->_page['submit'] = false;

			$this->_error[] = 'CAT_INVALID';
		}
		
		// Call the correct method
		switch (true)
		{
			// Category overview page
			case $this->_page['cat'] != 'main' && empty($this->_page['req_tool']) :
				$this->_cat_overview();
			break;
			
			// Tool page
			case $this->_page['cat'] != 'main' && !empty($this->_page['req_tool']) && !$this->_page['submit'] :
				$this->_tool_overview();
			break;
			
			// Run the tool
			case $this->_page['cat'] != 'main' && !empty($this->_page['req_tool']) && $this->_page['submit'] :
				$this->_run_tool();
			break;
			
			// Default main page
			default :
				// Only set some vars
				$this->page_header("STK_WELCOME");
				$this->page_footer('index_body');
		}
	}
	
	/**
	 * Create the categories overview page
	 *
	 */
	function _cat_overview()
	{
		global $template;
		
		$pag_content = get_lang_entry(utf8_strtoupper($this->_page['cat']) . '_EXPLAIN');
		
		// Assign vars
		$template->assign_vars(array(
			'CAT_EXPLAIN'	=> $pag_content,
			'S_CAT'			=> true,
		));
		
		// Create the tool list
		$this->create_tool_list($this->_page['cat']);
		
		// Output
		$this->page_header(utf8_strtoupper($this->_page['cat']) . '_TITLE');
		$this->page_footer('index_body');
	}
	
	/**
	 * Create a list with the tools inside this category
	 *
	 * @param String $cat
	 */
	function create_tool_list($cat = '')
	{
		global $cache, $template;
		
		if ($cat == '')
		{
			return;
		}
		
		$tools = $cache->obtain_stk_tools($cat);
		
		// Go through the tools
		foreach ($tools as $tool)
		{
			$this->load_tool($cat, $tool, false);
			
			$selected = ($cat == $this->_page['cat'] && $tool == $this->_page['req_tool']) ? true : false;

			// Assign to the template
			$template->assign_block_vars('l_block2', array(
				'L_TITLE'		=> get_lang_entry('TOOL_' . $tool . '_TITLE'),
				'S_SELECTED'	=> $selected,
				'U_TITLE'		=> append_sid(STK_ROOT_PATH, array('c' => $cat, 't' => $tool)),
			));
		}
	}
	
	/**
	 * Create the tool overview page
	 *
	 */
	function _tool_overview()
	{
		// Load the tool
		$tool = $this->load_tool($this->_page['cat'], $this->_page['req_tool']);
		$options = $tool->tool_options();
		

	}
	
	/**
	 * Run the requested tool
	 *
	 */
	function _run_tool()
	{
		// Load the tool
		$tool = $this->load_tool($this->_page['cat'], $this->_page['req_tool']);
		
		// Run the tool and fetch the errors
		$this->_error = $tool->run_tool();
		
		// Errors?
		if (sizeof($this->_error))
		{
			// Back to the overview
			$this->_tool_overview();
		}
	}
	
	/**
	 * Load the requested tool
	 *
	 * @param String $tool_cat
	 * @param String $tool_name
	 * @param Boolean $init Define whether the class has to be constructed
	 * @return Object instance of the required tool
	 */
	function load_tool($tool_cat, $tool_name)
	{
		global $user;
		
		// Does the file exits?
		if ((@include STK_TOOL_BOX . $tool_cat . '/' . $tool_name . '.' . PHP_EXT) === false)
		{
			trigger_error('TOOL_NOT_EXITS');
		}
		
		// Check the class
		if (!class_exists('stk_' . $tool_name))
		{
			$msg_text = get_lang_entry('TOOL_INVALID_CLASS', E_USER_ERROR);
			trigger_error(sprintf($msg_text, STK_TOOL_BOX . $tool_cat . '/' . $tool_name . '.' . PHP_EXT, 'stk_' . $tool_name));
		}
		
		// Add the default language file
		$user->add_lang('tools/' . $tool_cat . '/' . $tool_name);
		
		$obj = null;
		
		if ($init)
		{
			$obj = new stk_ . $tool_name();
		}
		
		return $obj;
	}
	
	/**
	 * Get a configuration value
	 *
	 * @param String $key The key of the config value
	 * @return Returns the value of the given config entry, or null if there isn't a matching key
	 * @access public
	 */
	function get_config($key)
	{
		if (isset($this->_config[$key]))
		{
			return $this->_config[$key];
		}
		
		return null;
	}
	
	/**
	 * Get the requested tool object
	 *
	 */
	function get_tool()
	{
		
	}
	
	
	/**
	 * Output the page
	 */
	function page_footer($template_file = '')
	{
		global $template;
		
		// Make sure there is an extension
		if (substr(strrchr($template_file, '.'), 0) != '.html')
		{
			$template_file .= '.html';
		}
		
		// Set the template file
		$template->set_filenames(array(
			'stk_body' => $template_file,
		));
		
		// Output
		$template->display('stk_body');

		// GC and exit
		garbage_collection();
		exit_handler();
	}
	
	/**
	 * Create the page header
	 *
	 * @param String $page_title
	 */
	function page_header($page_title = '')
	{
		global $cache, $template, $user;
		
		if (defined('HEADER_INC'))
		{
			return;
		}

		define('HEADER_INC', true);

		// Create the tabbed menu
		$tabs = $cache->obtain_stk_categories();
		foreach ($tabs as $tab)
		{
			$active = false;
			if ($tab == $this->_page['cat'])
			{
				$active = true;
			}

			$template->assign_block_vars('t_block1', array(
				'L_TITLE'		=> get_lang_entry('CAT_' . utf8_strtoupper($tab)),
				'U_TITLE'		=> append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, array('c' => $tab)),
				'S_SELECTED'	=> $active,
			));
		}
		
		// Template vars required on every page
		$template->assign_vars(array(
			'L_PAGE_TITLE'	=> $page_title,
		
			'S_CONTENT_DIRECTION'	=> $user->lang['DIRECTION'],
			'S_STYLE_PATH_FILE'		=> PHPBB_ROOT_PATH . 'adm/style/admin.css',
		));
	}
	
	/**
	 * PHP 4
	 */
	function stk()
	{
		$this->__construct();
	}
}
?>