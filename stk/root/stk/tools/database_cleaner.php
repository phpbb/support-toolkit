<?php
/**
*
* @package Support Tool Kit - Database Cleaner
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class database_cleaner
{
	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['DATABASE_CLEANER'],
			'NAME_EXPLAIN'	=> $user->lang['DATABASE_CLEANER_EXPLAIN'],
			'CATEGORY'		=> $user->lang['ADMIN_TOOLS'],
		);
	}

	function display_options()
	{
		global $config;

		$step = request_var('step', 0);

		if ($step > 0)
		{
			// Kick them if bad form key
			check_form_key('database_cleaner', false, append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, 't=database_cleaner'), true);
		}

		// include the required file for this version
		$version_file = preg_replace('#([^0-9]+)#', '_', $config['version']) . '.' . PHP_EXT;
		if (!file_exists(STK_ROOT_PATH . 'database_cleaner/' . $version_file))
		{
			trigger_error('PHPBB_VERSION_NOT_SUPPORTED');
		}

		switch ($step)
		{
			case 0 :
				// Display a quick intro here and make sure they know what they are doing...
			break;

			case 1 :
				// Start off simple by displaying extra config variables and let them check/uncheck the ones they want to remove
				// Insert any missing config variables (hopefully there are none missing!)
			break;

			case 2 :
				// Remove the extra config variables they selected.

				// Display the extra permission fields and again let them select ones to remove
				// Insert any missing permission settings (hopefully there are none missing!)
			break;

			case 3 :
				// Remove the permission fields they selected

				// Display the extra modules and let them select what to remove, also display a list of any missing and if they want to re-add them
			break;

			case 4 :
				// Remove the extra modules they selected, add any they selected to be added

				// Ask if they would like to reset the bots
			break;

			case 5 :
				// Reset the bots if they wanted to

				// Time to start going through the database and listing any extra/missing fields

				// Output a list of the name of the table followed by all of the fields in it.  Any extras give the option to remove and any missing give the option to add
				//(grey background for ones that are there and should be, green for ones that are there and should not be, red for ones that are not there and should be)

				// When checking for database columns, select a row from the table to find all the column names.
				// If there were no rows in the table, attempt to insert a row from the data on the table stored in the file for this version,
					// catch any errors in case a column was added, and keep going until a row is added successfully.
					// Once one was added successfully we can record the columns and then remove the row again
			break;

			case 6 :
				// Update the tables according to what they selected last time

				// Find any extra tables and list them as options to remove
			break;

			case 7 :
				// Remove the extra selected tables

				// Finished?
			break;
		}
	}
}
?>