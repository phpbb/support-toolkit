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
		$this->_page['tool'] = request_var('t', '');
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
		global $plugin;
		
		// Get all the categories
		$cats = $plugin->get_categories();

		// Invalid cats means invalid request. Thus reset it
		if (!in_array($this->_page['cat'], $cats))
		{
			$this->_page['action'] = '';
			$this->_page['cat'] = 'main';
			$this->_page['confirm'] = false;
			$this->_page['tool'] = '';
			$this->_page['submit'] = false;

			$this->_error[] = 'CAT_INVALID';
		}
		
		// Call the correct method
		switch (true)
		{
			// Category overview page
			case $this->_page['cat'] != 'main' && empty($this->_page['tool']) :
				$this->_cat_overview();
			break;
			
			// Tool page
			case $this->_page['cat'] != 'main' && !empty($this->_page['tool']) && !$this->_page['submit'] :
				$this->_tool_overview();
			break;
			
			// Run the tool
			case $this->_page['cat'] != 'main' && !empty($this->_page['tool']) && $this->_page['submit'] :
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
		
		$pag_content = get_lang_entry(utf8_strtoupper('CAT_' . $this->_page['cat']) . '_EXPLAIN');
		
		// Assign vars
		$template->assign_vars(array(
			'CAT_EXPLAIN'	=> $pag_content,
			'S_CAT'			=> true,
		));
		
		// Output
		$this->page_header(utf8_strtoupper('CAT_' . $this->_page['cat']));
		$this->page_footer('index_body');
	}
	
	/**
	 * Create the tool overview page
	 *
	 */
	function _tool_overview()
	{
		global $plugin;
		
		// Load the tool
		$tool = $plugin->activate_tool($this->_page['cat'], $this->_page['tool']);
		$options = $tool->tool_options();
		

	}
	
	/**
	 * Run the requested tool
	 *
	 */
	function _run_tool()
	{
		// Load the tool
		$tool = $this->load_tool($this->_page['cat'], $this->_page['tool']);
		
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
	 * Get a configuration value
	 *
	 * @param String $key The key of the config value
	 * @param mixed $default The value that is returned when the config entry doesn't exist.
	 * @return Returns the value of the given config entry, or $default if there isn't a matching key
	 * @access public
	 */
	function get_config($key, $default = null)
	{
		if (isset($this->_config[$key]))
		{
			return $this->_config[$key];
		}
		
		return $default;
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
		global $cache, $plugin, $template, $user;
		
		if (defined('HEADER_INC'))
		{
			return;
		}

		define('HEADER_INC', true);

		// Create the tabbed menu
		$plugin->create_tab_menu($this->_page['cat']);
		
		// Create the menu
		$plugin->create_left_menu($this->_page['cat'], $this->_page['tool']);
		
		// Template vars required on every page
		$template->assign_vars(array(
			'L_PAGE_TITLE'	=> get_lang_entry($page_title),
		
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