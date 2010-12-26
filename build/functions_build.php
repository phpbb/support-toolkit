<?php
/**
 *
 * @package Support Toolkit
 * @copyright (c) 2010 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
 
/**
 * Get physical file listing
 *
 * This function is takes straight from `includes/functions_admin.php`
 * only the file extension check was removed.
 */
function filelist($rootdir, $dir = '')
{
	$matches = array($dir => array());

	// Remove initial / if present
	$rootdir = (substr($rootdir, 0, 1) == '/') ? substr($rootdir, 1) : $rootdir;
	// Add closing / if not present
	$rootdir = ($rootdir && substr($rootdir, -1) != '/') ? $rootdir . '/' : $rootdir;

	// Remove initial / if present
	$dir = (substr($dir, 0, 1) == '/') ? substr($dir, 1) : $dir;
	// Add closing / if not present
	$dir = ($dir && substr($dir, -1) != '/') ? $dir . '/' : $dir;

	if (!is_dir($rootdir . $dir))
	{
		return $matches;
	}

	$dh = @opendir($rootdir . $dir);

	if (!$dh)
	{
		return $matches;
	}

	while (($fname = readdir($dh)) !== false)
	{
		if (is_file("$rootdir$dir$fname"))
		{
			$matches[$dir][] = $fname;
		}
		else if ($fname[0] != '.' && is_dir("$rootdir$dir$fname"))
		{
			$matches += filelist($rootdir, "$dir$fname");
		}
	}
	closedir($dh);

	return $matches;
}