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

if (!class_exists('user'))
{
	include PHPBB_ROOT_PATH . 'includes/session.' . PHP_EXT;
}

/**
 * Class that extends the phpBB user class. It allows the addition of some logic
 * to the user object. So it can handle the standalone mode
 */
class stk_user extends user
{
	/**
	* Start session management
	*
	* This is where all session activity begins. We gather various pieces of
	* information from the client and server. We test to see if a session already
	* exists. If it does, fine and dandy. If it doesn't we'll go on to create a
	* new one ... pretty logical heh? We also examine the system load (if we're
	* running on a system which makes such information readily available) and
	* halt if it's above an admin definable limit.
	*
	* @param bool $update_session_page if true the session page gets updated.
	*			This can be set to circumvent certain scripts to update the users last visited page.
	* @access public
	*/
	function stk_session_begin()
	{
		// Running inside phpBB call the normal session_begin
		if (!STK_STANDALONE && !defined('STK_LOGIN'))
		{
			$this->session_begin(false);
		}
		else
		{
			$this->_stk_session_begin(false);
		}
	}
	
	/**
	* Start session management
	*
	* This is where all session activity begins. We gather various pieces of
	* information from the client and server. We test to see if a session already
	* exists. If it does, fine and dandy. If it doesn't we'll go on to create a
	* new one ... pretty logical heh? We also examine the system load (if we're
	* running on a system which makes such information 
	* 
	* This method is heavely based upon the phpBB session_begin() method, but it 
	* will make sure that the session is correctly created for the stanalone mode.
	* 
	* @access private
	*/
	function _stk_session_begin($update_session_page = false)
	{
		global $stk, $SID, $_EXTRA_URL, $_SID;
		global $phpbb_root_path;
			
		// Give us some basic information
		$this->time_now				= time();
		$this->cookie_data			= array('u' => 0, 'k' => '');
		$this->update_session_page	= $update_session_page;
		$this->browser				= (!empty($_SERVER['HTTP_USER_AGENT'])) ? htmlspecialchars((string) $_SERVER['HTTP_USER_AGENT']) : '';
		$this->referer				= (!empty($_SERVER['HTTP_REFERER'])) ? htmlspecialchars((string) $_SERVER['HTTP_REFERER']) : '';
		$this->forwarded_for		= (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? (string) $_SERVER['HTTP_X_FORWARDED_FOR'] : '';

		$this->host					= $this->extract_current_hostname();
		$this->page					= $this->extract_current_page($phpbb_root_path);

		$this->session_id = $_SID = request_var('sid', '');
		$SID = '?sid=' . $this->session_id;
		
		$_EXTRA_URL = array();

		// Why no forwarded_for et al? Well, too easily spoofed. With the results of my recent requests
		// it's pretty clear that in the majority of cases you'll at least be left with a proxy/cache ip.
		$this->ip = (!empty($_SERVER['REMOTE_ADDR'])) ? htmlspecialchars($_SERVER['REMOTE_ADDR']) : '';
		$this->load = false;
		
		// Is session_id is set and matches the url param
		if (isset($_GET['sid']) && $this->session_id === $_GET['sid'])
		{
			// Fetch the stored key
			$stk_key = request_var($stk->get_config('stk_cookie_name') . '_key', '', true, true);
			
			// Check
			if (phpbb_check_hash($stk->get_config('atk_password'), $stk_key))
			{
				// We fill the data array, with the required information
				$this->data = array(
					'user_id'			=> STK_USER,
					'user_dateformat'	=> STK_DEFAULT_DATEFORMAT,
					'user_dst'			=> STK_DEFAULT_DST,
					'user_lang' 		=> STK_DEFAULT_LANG,
					'user_timezone'		=> STK_DEFAULT_TIMEZONE,
				);
				
				// Session started
				return true;
			}
		}
		
		// If we reach here then no (valid) session exists. So we'll create a new one
		return $this->_stk_session_create();
	}
	
	/**
	* Create a new session
	*
	* If upon trying to start a session we discover there is nothing existing we
	* jump here. Additionally this method is called directly during login to regenerate
	* the session for the specific user. In this method we carry out a number of tasks;
	* garbage collection, (search)bot checking, banned user comparison. Basically
	* though this method will result in a new session for a specific user.
	* 
	* This method is heavely based upon the phpBB session_create() method, but it 
	* will make sure that the session is correctly created for the stanalone mode.
	* 
	* @access private
	*/
	function _stk_session_create()//$user_id = false, $set_admin = false, $persist_login = false, $viewonline = true)
	{
		// Set data array.
		$this->data = array(
			'user_id'			=> STK_ANONYMOUS,
			'user_dateformat'	=> STK_DEFAULT_DATEFORMAT,
			'user_dst'			=> STK_DEFAULT_DST,
			'user_lang' 		=> STK_DEFAULT_LANG,
			'user_timezone'		=> STK_DEFAULT_TIMEZONE,
		);
	}
	
	/**
	* Setup basic user-specific items (style, language, ...)
	* 
	* @access public
	*/
	function stk_setup($lang_set = false, $style = false)
	{
		if (!STK_STANDALONE)
		{
			$this->setup($lang_set, $style);
		}
		else
		{
			$this->lang_name = STK_DEFAULT_LANG;

			$this->date_format = $this->data['user_dateformat'];
			$this->timezone = $this->data['user_timezone'] * 3600;
			$this->dst = $this->data['user_dst'] * 3600;
			
			// We include common language file here to not load it every time a custom language file is included
			$lang = &$this->lang;
		
			// We include common language file here to not load it every time a custom language file is included
			if ((@include $this->lang_path . $this->lang_name . '/common.' . PHP_EXT) === false)
			{
				die('Language file ' . $this->lang_path . $this->lang_name . '/common.' . PHP_EXT . " couldn't be opened.");
			}
	
			$this->add_lang($lang_set);
			unset($lang_set);
		}
	}

	//-- Some methods to support outdated versions of phpBB3
	//-- And existing method slightly modified to work with the STK (including some additional logic)
	
	/**
	* Function to set custom language path (able to use directory outside of phpBB)
	*
	* @param string $lang_path New language path used.
	* @access public
	*/
	function set_custom_lang_path($lang_path)
	{
		$this->lang_path = $lang_path;

		if (substr($this->lang_path, -1) != '/')
		{
			$this->lang_path .= '/';
		}
	}
	
	/**
	* Add Language Items - use_db and use_help are assigned where needed (only use them to force inclusion)
	*
	* @param mixed $lang_set specifies the language entries to include
	* @param bool $use_db internal variable for recursion, do not use
	* @param bool $use_help internal variable for recursion, do not use
	*
	* Examples:
	* <code>
	* $lang_set = array('posting', 'help' => 'faq');
	* $lang_set = array('posting', 'viewtopic', 'help' => array('bbcode', 'faq'))
	* $lang_set = array(array('posting', 'viewtopic'), 'help' => array('bbcode', 'faq'))
	* $lang_set = 'posting'
	* $lang_set = array('help' => 'faq', 'db' => array('help:faq', 'posting'))
	* </code>
	*/
	function add_lang($lang_set, $use_db = false, $use_help = false)
	{
		// Pre phpBB 3.0.2 installations have the lang name in their lang_path. Remove this the first time this method is called
		if (stripos($this->lang_path, '/' . $this->lang_name . '/') !== false)
		{
			$this->lang_path = substr($this->lang_path, 0, -(strlen('/' . $this->lang_name . '/') - 1));
		}
		
		if (is_array($lang_set))
		{
			foreach ($lang_set as $key => $lang_file)
			{
				// Please do not delete this line.
				// We have to force the type here, else [array] language inclusion will not work
				$key = (string) $key;

				if ($key == 'db')
				{
					$this->add_lang($lang_file, true, $use_help);
				}
				else if ($key == 'help')
				{
					$this->add_lang($lang_file, $use_db, true);
				}
				else if (!is_array($lang_file))
				{
					$this->set_lang($this->lang, $this->help, $lang_file, $use_db, $use_help);
				}
				else
				{
					$this->add_lang($lang_file, $use_db, $use_help);
				}
			}
			unset($lang_set);
		}
		else if ($lang_set)
		{
			$this->set_lang($this->lang, $this->help, $lang_set, $use_db, $use_help);
		}
	}

	/**
	* Set language entry (called by add_lang)
	* @access private
	*/
	function set_lang(&$lang, &$help, $lang_file, $use_db = false, $use_help = false)
	{
		global $config; 

		// Make sure the language name is set (if the user setup did not happen it is not set)
		if (!$this->lang_name)
		{
			global $config;
			$this->lang_name = basename($config['default_lang']);
		}

		// A list with languages that are supported. (ordered in the way they'll be used)
		$langs = array(
			$this->lang_name,
			$config['default_lang'],
			'en', // Always use "en" as last resort as this language pack should always be included
		);
		
		$language_filename = '';

		// Loop through the list and try to find the file
		foreach ($langs as $language)
		{
			if (file_exists($this->lang_path . $language . '/' . $lang_file . '.' . PHP_EXT))
			{
				$language_filename = $this->lang_path . $language . '/' . $lang_file . '.' . PHP_EXT;
				break;
			}
		}

		// Include the file
		if (false === (@include $language_filename))
		{
			trigger_error('Language file ' . $language_filename . 'couldn\'t be opened.', E_USER_ERROR);
		}
	}
}
?>