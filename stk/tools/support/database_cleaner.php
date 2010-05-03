<?php
/**
*
* @package Support Toolkit - Database Cleaner
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

class database_cleaner
{
	/**
	* @var Array An array that is used to link step numbers with the action. Used to call the correct methods
	*/
	var $step_to_action = array(
		'introduction',
		'tables',
		'columns',
		'config',
		'permissions',
		'groups',
		'modules',
		'bots',
		'final_step',
	);

	/**
	* @var database_cleaner_data The database cleaner data object
	*/
	var $data = null;

	/**
	* @var mixed Contains the views or controller object, depending on what is going on
	*/
	var $object = null;

	/**
	* @var String phpBB version number
	*/
	var $phpbb_version = '';

	/**
	* @var Integer The step that is being ran
	*/
	var $step = 0;

	/**
	* Do we have a datafile for this version?
	*/
	function tool_active()
	{
		global $config;

		// Correctly format the version number. Only RC releases are in uppercase
		$this->phpbb_version = str_replace(array('.', '-', 'rc'), array('_', '_', 'RC'), strtolower($config['version']));

		// Unstable version can only be used when debugging
		if (!defined('DEBUG') && preg_match('#a|b|dev|RC$#i', $this->phpbb_version))
		{
			return false;
		}

		if (file_exists(STK_ROOT_PATH . 'includes/database_cleaner/data/' . $this->phpbb_version . '.' . PHP_EXT) === false)
		{
			return 'DATAFILE_NOT_FOUND';
		}

		// As this method is always called we can use a small hackish way to ensure the database cleaner is always setup when needed
		if (request_var('t', '') == 'database_cleaner' && !class_exists('database_cleaner_data'))
		{
			$this->_setup();
		}

		return true;
	}

	/**
	* Correctly setup the database cleaner
	*/
	function _setup()
	{
		global $submit;

		// Get the step.
		// If the step is outside the $this->step_to_action range set it to 0
		$this->step = request_var('step', 0);
		if ($this->step < 0 || $this->step > sizeof($this->step_to_action))
		{
			$this->step = 0;
		}

		// include the required file for this version
		include(STK_ROOT_PATH . 'includes/database_cleaner/functions.' . PHP_EXT);
		include(STK_ROOT_PATH . 'includes/database_cleaner/database_cleaner_data.' . PHP_EXT);

		// Load all data for this version
		$this->data = new database_cleaner_data();
		fetch_cleaner_data($this->data, $this->phpbb_version);

		// Load the correct object
		if (!$submit)
		{
			include STK_ROOT_PATH . 'includes/database_cleaner/database_cleaner_views.' . PHP_EXT;
			$this->object = new database_cleaner_views($this);
		}
		else
		{
			include STK_ROOT_PATH . 'includes/database_cleaner/database_cleaner_controller.' . PHP_EXT;
			$this->object = new database_cleaner_controller($this);
		}
	}

	/**
	* Display the correct confirmation screen
	*/
	function display_options()
	{
		global $template, $user;

		// Setup
		$user->add_lang('acp/common');

		// Call the correct view method
		call_user_func(array($this->object, $this->step_to_action[$this->step]));

		// Output the page
		$this->object->display();
	}

	/**
	* Perform the right actions
	*/
	function run_tool()
	{
		$selected = request_var('items', array('' => ''));

		if ($this->step > 0)
		{
			// Kick them if bad form key
			check_form_key('database_cleaner', false, append_sid(STK_INDEX, array('c' => 'support', 't' => 'database_cleaner')), true);
		}

		// Call the correct method
		call_user_func(array($this->object, $this->step_to_action[$this->step]), $selected);

		// Step 6 & 7 can trigger two messages
		$did_run = true;
		if (($this->step == 6 || $this->step == 7) && !isset($_POST['yes']))
		{
			$did_run = false;
		}

		// Redirect to the next step
		redirect(append_sid(STK_INDEX, array('c' => 'support', 't' => 'database_cleaner', 'step' => $this->step + 1, 'did_run' => $did_run)));
	}
}