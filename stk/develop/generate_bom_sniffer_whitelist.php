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
// This generator build the ERK BOM Sniffer whitelist. The white list is downloaded
// once created and should be uploaded to the <c>stk/includes/critical_repair/</c>
// directory
//
die("Please read the first lines of this script for instructions on how to enable it");

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if (!function_exists('filelist'))
{
	include $phpbb_root_path . 'includes/functions_admin.' . $phpEx;
}

$fl = filelist($phpbb_root_path, '', 'php');

$whitelist = array();

foreach ($fl as $d => $fs)
{
	// Compensate for filelist weirdness
	if (empty($d))
	{
		continue;
	}

	// Cache files are always ignored
	if ($d == 'cache/')
	{
		continue;
	}

	// Skip non-english
	if (preg_match('#^(stk/){0,1}language/(?!en)#', $d))
	{
		continue;
	}

	foreach ($fs as $f)
	{
		// The STK config file is handled separate
		if ($d == 'stk/' && $f == 'config.' . $phpEx)
		{
			continue;
		}

		// Strip the .php
		$f = substr($f, 0, -(strlen('.' . $phpEx)));
		$whitelist[] = $d . $f;
	}
}

// Download the generated file
header("Content-Type: text/x-delimtext; name=\"whitelist.txt\"");
header("Content-disposition: attachment; filename=whitelist.txt");
print(implode("\n", $whitelist));
