<?php
/**
*
* @package Support Toolkit - Generate a BOM sniffer white list.
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* This script outputs a correctly formatted array containing the file tree of
* a vanilla phpBB install. This is the list that is used by the BOM sniffer to
* determine which files will be checked and which won't.
*/

//
// Security message:
//
// This script is potentially dangerous.
// Remove or comment the next line (die(".... ) to enable this script.
// Do NOT FORGET to either remove this script or disable it after you have used it.
//
die("Please read the first lines of this script for instructions on how to enable it");

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_admin.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

$filelist = filelist($phpbb_root_path, '', $phpEx);
foreach ($filelist as $dir => $fl)
{
	// Remove empty stuff
	if (empty($fl))
	{
		unset($filelist[$dir]);
	}

	// Remove ignored dirs
	if (preg_match("#cache/|develop/|files/|install/|store/|stk/includes/critical_repair/#ise", $dir))
	{
		unset($filelist[$dir]);
	}
}

// Print the array to the screen
echo '<pre>';
foreach ($filelist as $dir => $fl)
{
	$dirname = var_export($dir, true);
	echo "\t\t$dirname => array(\n";

	foreach ($fl as $key => $file)
	{
		$filename = var_export($file, true);
		echo"\t\t\t$key\t=> $filename,\n";
	}

	echo "\t\t),\n";
}