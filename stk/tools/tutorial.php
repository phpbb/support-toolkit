<?php
/**
*
* @package Support Toolkit - Tutorial
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/*
* This will be a tutorial page for how to build a new tool to be used with the Support Toolkit.
*
* Before you ask why this tool does not show in the Tools list in the Support Toolkit, that is because the Support Toolkit is setup to ignore the file named tutorial.php.
*
* You do not need to add any language files.
* If you name your language file the same as the name of this file and put it in the stk/language/en/tools/ directory it will be loaded automatically
*/

/*
* Make sure you have this check for security reasons.
*/
/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

/*
* The class name MUST be the same as the filename (minus .PHP_EXT)
*/
class tutorial
{
	/**
	* Tool active
	*
	* This method allows you to limit access to the tool based upon certain criteria. For example if a tool is designed to fix an issue
	* that only arises in certain phpBB version you can activate this tool only for that version through this method.
	* If you leave this method out no limit will be set
	*
	* If the tool can be used this method must return true. If not you can both return the boolean value "false" or a language entry
	* explaining why the tool can't be used
	*/
	function tool_active()
	{
		// Limit access to phpBB 3.0.2
		if (version_compare(PHPBB_VERSION, '3.0.2', '='))
		{
			return 'TUTORIAL_NOT_AVAILABLE';
		}

		return true;
	}

	/*
	* Display Options
	*
	* This function sets up the display page which will show the options we want to show for this tool
	*
	* There are a few things that can be done with this function.
	* 	1. Return a string.
	*		Returning a string makes the system show a confirm page using confirm_box
	*		Send the string like 'TUTORIAL', like the normal confirm box it will use $user->lang['TUTORIAL'] and $user->lang['TUTORIAL_CONFIRM']
	*	2. Return an array
	*		Returning an array makes the system show a page similar to the acp_board. (More on this later)
	*	3. Return false
	*		Returning false makes the system do nothing with the initial display.
	*		This may be used to display your own page.  You can do anything you'd like.
	*		Just be sure that your page sets 'submit' in $_POST or you will have to check that yourself and run the $this->run_tool function if required
	*/
	function display_options()
	{
		/*
		* Method 1
		*/
		return 'TUTORIAL';

		/*
		* Method 2
		*/
		return array(
			'title'	=> 'TUTORIAL',
			'vars'	=> array(
				'legend1'			=> 'TUTORIAL',
				'tutorial'			=> array('lang' => 'TUTORIAL', 'type' => 'text:40:255', 'explain' => true),
			)
		);

		/*
		* Method 3
		*/
		// Setup your own page here, as example see tools/admin/database_cleaner.php

		return false;
	}

	/*
	* Run Tool
	*
	* This function should do what this tool was designed to do.
	*
	* If you did NOT return a string in display_options() you will recieve an array to put in any errors.
	*	Using &$error allows you to put any error in the array and then return.  If this is done the system will call display_options again and output any error
	*	If you used Method 2 for display_options the errors will be outputted automatically
	*/
	function run_tool(&$error)
	{
		/*
		* If Method 2 was used you must check the form key to verify that it is sent and correct for security reasons.
		*
		* For the string to send for the check, use the name of this file.  The form key has already been added by the core automatically so you do not need to set it up.
		*/
        if (!check_form_key('tutorial'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		/*
		* Do anything here
		*
		* For examples you may check other tools in stk/tools/
		*/
	}
}
