<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2010 phpBB Group
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

/**@#+
* phpbb_chmod() permissions
*/
@define('CHMOD_ALL', 7);
@define('CHMOD_READ', 4);
@define('CHMOD_WRITE', 2);
@define('CHMOD_EXECUTE', 1);
/**@#-*/

/**
* This critical repair class will go through all phpBB .php files and will look
* for any junk outside the php opening and closing tags.
* Being it a BOM or white lines/spaces/etc. Once found the tool will compose a
* package of the files so the user can correct the files.
*/
class erk_bom_sniffer
{
	/**
	* @var _stk_bom_sniffer_cache Object of the cache class of this tool
	* @access private
	*/
	var $cache = null;

	/**
	* @var boolean Flag to keep track whether the current file has to be updated by the sniffer
	* @access private
	*/
	var $file_changed = false;

	/**
	* @var Array Messages that will be triggered by this tool
	* @access private
	*/
	var $messages = array(
		'bom_sniffer_writable'	=> 'The BOM sniffer requires %s to exist and to be writable!',
		'issue_found'			=> 'As part of the “Emergency Repair Kit” of the Support Toolkit the ERK has checked your phpBB files and determined that some of the files contain invalid content that potentially could stop the board from operating. The Support Toolkit has tried to resolve these issues and created a package with the corrected files <em>(backed up versions can be found in <c>store/bom_sniffer_backup/</c>)</em>. This package is stored in the <c>store/bom_sniffer/</c> directory. To apply the changed files to your board please <strong>move</strong> the files from the “store” to their correct location and load the Support Toolkit again. The toolkit will check these files again and will redirect you to the ERK if no flaws are found.<br /><br /><strong style="color: #ff0000;">Before moving the generated files, please make sure that the generated files are correct!</strong> When in doubt please seek assistance in the <a href="http://www.phpbb.com/community/viewforum.php?f=46">support forum</a>.',
		'remove_dir'			=> "The Support Toolkit has tried to remove the repaired file storage directory of this tool but wasn't able to do so. In order for this tool to run correctly the '<c>%s</c>' must be removed from the server. Please remove this directory manually and release the Support Toolkit.",
		'store_write'			=> 'The BOM sniffer requires the <c>store</c> directory to exist and to be writable!',
		'no_whitelist'			=> 'The BOM sniffer couldn\'t read the whitelist, and can\'t run the tests. Please seek assistance in the <a href="%s">Support Forums</a>.'
	);

	/**
	* @var string The php close string
	* @access private
	*/
	var $php_close = '?>';

	/**
	* @var string The php open string
	* @access private
	*/
	var $php_open = '<?php';

	/**
	* @var Array Array that is filled while running through the file. This array is used to rewrite the file after changes have been made
	* @access private
	*/
	var $write_buffer = array();

	/**
	* @var Array The sniffer will only check files that come with a vanilla install. This list contains all files that *will* be sniffed
	* @access private
	*/
	var $whitelist = array();

	/**
	* @var int The current timestamp. This is used to generate an unique backup directory for this tool
	*/
	var $backuptime = 0;

	/**
	* Constructor. Prep the tool
	*/
	function erk_bom_sniffer()
	{
		global $critical_repair, $stk_config;

		// "Store" must be writable
		if (@is_writable(PHPBB_ROOT_PATH . 'store') !== true)
		{
			$critical_repair->trigger_error($this->messages['store_write']);
		}

		// Make sure the BOM sniffer dir store dir doesn't exist
		if (file_exists(PHPBB_ROOT_PATH . 'store/bom_sniffer'))
		{
			// Empty dir is okay
			if (array("" => array()) !== filelist(PHPBB_ROOT_PATH . 'store/bom_sniffer', '', PHP_EXT))	// Rather nasty, but don't know a better php 4 way atm
			{
				// Not empty try to remove the store dir
				if ($this->recursively_remove_dir(PHPBB_ROOT_PATH . 'store/bom_sniffer') === false)
				{
					$critical_repair->trigger_error(sprintf($this->messages['remove_dir'], PHPBB_ROOT_PATH . "store/bom_sniffer/"));
				}
			}
		}

		// Read the whitelist
		if (!file_exists(STK_ROOT_PATH . 'includes/critical_repair/whitelist.txt'))
		{
			$critical_repair->trigger_error(sprintf($this->messages['no_whitelist'], 'http://www.phpbb.com/community/viewforum.php?f=46'));
		}
		$this->whitelist = file(STK_ROOT_PATH . 'includes/critical_repair/whitelist.txt', FILE_IGNORE_NEW_LINES);

		// Set the timestamp
		$this->backuptime = time();

		// Correct paths to the stk directory, when the STK isn't located in 'stk/'
		if (STK_DIR_NAME != 'stk')
		{
			foreach ($this->whitelist as $dir => $files)
			{
				if (strpos($dir, 'stk') !== false)
				{
					$this->whitelist[str_replace('stk', STK_DIR_NAME, $dir)] = $files;
					unset($this->whitelist[$dir]);
				}
			}
		}
		ksort($this->whitelist);

		// Re-append extensions
		array_walk($this->whitelist, array($this, 'readd_extensions'), PHP_EXT);

		// Init the internal cache
		$this->cache = new _erk_bom_sniffer_cache($this);

		// Here we test the stk config.php, when no issues found we'll include it
		$this->sniff(STK_DIR_NAME, 'config.' . PHP_EXT);
		$stk_config['bom_sniffer_force_full_scan'] = true;
		if (!file_exists(PHPBB_ROOT_PATH . 'store/bom_sniffer/stk/config.' . PHP_EXT))
		{
			include STK_ROOT_PATH . 'config.' . PHP_EXT;
		}
	}

	function readd_extensions(&$file, $key, $phpEx)
	{
		$file .= ".{$phpEx}";
	}

	/**
	* Run the tool
	* This tool will run through the files and all files that are new, or of
	* which the last change date has been changed will be checked for invalid
	* characters.
	*/
	function run()
	{
		global $critical_repair, $stk_config;

		// Get all the files
		$filelist = filelist(PHPBB_ROOT_PATH, '', PHP_EXT);

		foreach ($filelist as $directory => $files)
		{
			// As the install dir can be renamed, we need to check here whether this
			// is an install directory
			if(in_array('convert_phpbb20.' . PHP_EXT, $files) || in_array('new_normalizer.' . PHP_EXT, $files) || in_array('database_update.' . PHP_EXT, $files))
			{
				// It is and we're not forcing a full scan, skip it
				if (!$stk_config['bom_sniffer_force_full_scan'])
				{
					continue;
				}
			}

			// Step into the files
			if (!empty($files))
			{
				// Test whether we're sniffing a language directory (any)
				$lang_test_dir	= '';
				$lang_matches	= array();
				if (preg_match('#language/([a-zA-Z\-_]+)/#ise', $directory, $lang_matches))
				{
					$lang_test_dir = str_replace($lang_matches[1], '..', $directory);
				}

				foreach ($files as $file)
				{
					// If this is inside a language directory we need to check whether this file is
					// in the whitelist and adjust the whitelist to include it
					$sniff_lang_file = false;
					if (!empty($lang_test_dir))
					{
						$sniff_lang_file = (in_array($lang_test_dir . $file, $this->whitelist)) ? true : false;
					}

					// Test this file against the whitelist
					if (!$stk_config['bom_sniffer_force_full_scan'] && (!in_array($directory . $file, $this->whitelist) && $sniff_lang_file === false))
					{
						continue;
					}
					// File never checked or was changed after the last run
					else if (!isset($this->cache->cache_data[$directory. $file]) || filectime(PHPBB_ROOT_PATH . $directory . $file) != $this->cache->cache_data[$directory . $file] || !$stk_config['bom_sniffer_force_full_scan'])
					{
						$this->sniff($directory, $file);
					}
				}
			}
		}

		// Once finished always write the new data back to the cache file
		$this->cache->storedata();

		// Inform the user what to do if we've created files
		if (is_dir(PHPBB_ROOT_PATH . 'store/bom_sniffer'))
		{
			$critical_repair->trigger_error($this->messages['issue_found']);
		}
	}

	/**
	* Sniff the requested file
	*/
	function sniff($directory, $file)
	{
		global $stk_config;

		// Read the file
		$directory = ($directory && substr($directory, -1) != '/') ? $directory . '/' : $directory;
		$content = fopen(PHPBB_ROOT_PATH . $directory . $file, 'r');

		// Loop through it
		$php_open = $php_close = false;

		while (($buffer = fgets($content)) !== false)
		{
			// No open tag yet
			if (!$php_open)
			{
				// Look for the php open tag.
				if (($pos = strpos($buffer, $this->php_open)) === false)
				{
					// White lines before the open tag, ignore it
					$this->file_changed = true;
					continue;
				}

				// There is something before the tag tell the sniffer to rebuild the file
				if (substr($buffer, 0, strlen($this->php_open)) != $this->php_open)
				{
					$this->file_changed = true;
				}

				// Cut the line so it begins with the open tag and add it to the buffer
				$buffer	= substr($buffer, $pos);
				$this->add_to_write_buffer($buffer);
				$php_open = true;
				continue;
			}

			// Between open and closing tag
			if (!$php_close)
			{
				// Everything between the tags is added without further checking
				if (($pos = strpos($buffer, $this->php_close)) === false)
				{
					$this->add_to_write_buffer($buffer);
					continue;
				}

				// Some files contain a closing tag while it isn't an actual tag.
				// Work around those nasty ones
				if ($this->ifItLooksLikeADuckWalksLikeADuckAndSoundsLikeADuckItIsntADuck($buffer, $directory, $file))
				{
					$this->add_to_write_buffer($buffer);
					continue;
				}

				// If the line is longer than the closing tag its been changed
				if (strlen($buffer) > strlen($this->php_close))
				{
					$this->file_changed = "Closing tag same line";
				}

				// Trash everything after the closing tag
				$buffer	= substr($buffer, 0, ($pos + strlen($this->php_close)));
				$this->add_to_write_buffer($buffer);
				$php_close = true;
				continue;
			}

			// Everything after the closing tag is junk
			if ($php_close)
			{
				// Ignore
				$this->file_changed = true;
				continue;
			}
		}

		// The file has been changed, write a new version to the store directory
		if ($this->file_changed === true)
		{
			// The main dir exists?
			if (!is_dir(PHPBB_ROOT_PATH . 'store/bom_sniffer'))
			{
				mkdir(PHPBB_ROOT_PATH . 'store/bom_sniffer');
				$this->phpbb_chmod(PHPBB_ROOT_PATH . 'store/bom_sniffer', CHMOD_ALL);
			}

			// Dir in the package?
			if (!is_dir(PHPBB_ROOT_PATH . 'store/bom_sniffer/' . $directory))
			{
				mkdir(PHPBB_ROOT_PATH . 'store/bom_sniffer/' . $directory, 0777, true);
				$this->phpbb_chmod(PHPBB_ROOT_PATH . 'store/bom_sniffer' . $directory, CHMOD_ALL);
			}

			$writefile = fopen(PHPBB_ROOT_PATH . 'store/bom_sniffer/' . $directory . $file, 'wb');
			foreach ($this->write_buffer as $buffer)
			{
				// When not the last line add a new line to the buffer
				if ($buffer != $this->php_close)
				{
					$buffer .= "\n";
				}

				// Write the line
				fwrite($writefile, $buffer);
			}

			if (!$stk_config['bom_sniffer_disable_backup'])
			{
				// Also create a backup of the original file
				// The backup dir exists?
				if (!is_dir(PHPBB_ROOT_PATH . 'store/bom_sniffer_backup_' . $this->backuptime))
				{
					mkdir(PHPBB_ROOT_PATH . 'store/bom_sniffer_backup_' . $this->backuptime);
					$this->phpbb_chmod(PHPBB_ROOT_PATH . 'store/bom_sniffer_backup_' . $this->backuptime, CHMOD_ALL);
				}

				// Dest dir
				if (!is_dir(PHPBB_ROOT_PATH . 'store/bom_sniffer_backup_' . $this->backuptime . '/' . $directory))
				{
					mkdir(PHPBB_ROOT_PATH . 'store/bom_sniffer_backup_' . $this->backuptime . '/' . $directory, 0777, true);
					$this->phpbb_chmod(PHPBB_ROOT_PATH . 'store/bom_sniffer_backup/_' . $this->backuptime . '/' . $directory, CHMOD_ALL);
				}

				// Copy the file
				copy(PHPBB_ROOT_PATH . $directory . $file, PHPBB_ROOT_PATH . 'store/bom_sniffer_backup_' . $this->backuptime . '/' . $directory . $file);
			}
		}
		// else set the file as unchanged
		else
		{
			$this->cache->cache_data[$directory. $file] = filectime(PHPBB_ROOT_PATH . $directory . $file);
		}

		// Reset the sniffer
		$this->file_changed = false;
		$this->write_buffer = array();
	}

	/**
	* Recursively remove a given directory and all its contents
	*/
	function recursively_remove_dir($rootdir, $dir = '')
	{
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
			return true;
		}

		// Read the directory
		$dh = @opendir($rootdir . $dir);
		if (!$dh)
		{
			return false;
		}

		// Run through the directory
		while (($fname = readdir($dh)) !== false)
		{
			// File? Unlink
			if (is_file($rootdir . $dir . $fname))
			{
				if (@unlink($rootdir . $dir . $fname) === false)
				{
					return false;
				}
			}
			// Step into the next directory
			else if($fname[0] != '.' && is_dir($rootdir . $dir . $fname))
			{
				$this->recursively_remove_dir($rootdir . $dir . $fname);
			}
		}

		// Remove this directory
		if (@rmdir($rootdir . $dir) === false)
		{
			return false;
		}
	}

	/**
	* Add the given string to the write buffer, we use this method so we can
	* manipulate the string at the last moment
	* @param string $string The string that will be added to the buffer
	*/
	function add_to_write_buffer($string)
	{
		// Remove the trailing "\n" in the current line
		$string = str_replace("\n", '', $string);

		// Add
		$this->write_buffer[] = $string;
	}

	/**
	* Some files contain a closing tag
	* <code>
	* ?>
	* </code>
	* were this isn't the end of the file. This method will go through the know
	* files that have this and will determine whether its a closing tag or not
	*
	* @param string $buffer The line that is currently checked
	* @param string $directory The directory that is currently being handled
	* @param string $file The file that is currently being handled
	* @return boolean True if it isn't a closing tag otherwise false
	*/
	function ifItLooksLikeADuckWalksLikeADuckAndSoundsLikeADuckItIsntADuck($buffer, $directory, $file)
	{
		// When it is only an end tag it is a Duck
		if ($buffer == $this->php_close)
		{
			return false;
		}

		// We know the files that have this issue. Hence its easy to check
		$match = '';
		switch ($directory)
		{
			case '' :
				if ($file == 'feed.' . PHP_EXT)
				{
					$match = '<\?xml version="1.0" encoding="UTF-8"\?>';
				}
				else if ($file == 'search.' . PHP_EXT || $file == 'viewtopic.' . PHP_EXT)
				{
					$match = "</s\(\?:cript\|tyle\)\)\?>";
				}
			break;

			case 'includes/' :
				if ($file == 'functions.' . PHP_EXT)
				{
					$match = "\?>#s',";
				}
				else if ($file == 'functions_messenger.' . PHP_EXT)
				{
					$match = 'var_export\(';
				}
				else if ($file == 'functions_template.' . PHP_EXT)
				{
					// This should match all occurances here. I *might* missed some :/
					/*$match = "\?\\\?>#s'|\?>'(;| :)|' \?>(<\?php ){0,1}'|'\?\\1'|#\\\?\\>|; \?>";*/

					// Most of them contain the opening tag or preg_replace or part of a regex
					$match = 'preg_replace|<\?php|\?>#s';
				}
				else if ($file == 'message_parser.' . PHP_EXT)
				{
					$match = '\?>";';
				}
				else if ($file == 'template.' . PHP_EXT)
				{
					$match = "eval\('";
				}
			break;

			case 'includes/acm/' :
				if ($file == 'acm_file.' . PHP_EXT)
				{
					$match = '\n?>"\)|\* <\?php';
				}

			case 'includes/acp/' :
				if ($file == 'acp_language.' . PHP_EXT)
				{
					$match = "\\\$footer";
				}
			break;

			case 'includes/db/' :
				if ($file == 'oracle.' . PHP_EXT)
				{
					$match = "preg_match(_all)?|preg_replace";
				}
			break;

			case 'includes/ucp/' :
				if ($file == 'ucp_pm_viewfolder.' . PHP_EXT)
				{
					$match = '<\?xml version="1.0"\?>';
				}
			break;

			case 'stk/includes/' :
				if ($file == 'functions.' . PHP_EXT)
				{
					$match = '\?>";';
				}
			break;

			case 'stk/includes/critical_repair/' :
				if ($file == 'config_repair.' . PHP_EXT)
				{
					$match = '(\s|{)\?>';
				}
			break;

			default :
				return false;
		}

		return (preg_match('~' . $match . '~ise', $buffer)) ? true : false;
	}

	//-- Wrappers

	/**
	 * Global function for chmodding directories and files for internal use
	 *
	 * This function determines owner and group whom the file belongs to and user and group of PHP and then set safest possible file permissions.
	 * The function determines owner and group from common.php file and sets the same to the provided file.
	 * The function uses bit fields to build the permissions.
	 * The function sets the appropiate execute bit on directories.
	 *
	 * Supported constants representing bit fields are:
	 *
	 * CHMOD_ALL - all permissions (7)
	 * CHMOD_READ - read permission (4)
	 * CHMOD_WRITE - write permission (2)
	 * CHMOD_EXECUTE - execute permission (1)
	 *
	 * NOTE: The function uses POSIX extension and fileowner()/filegroup() functions. If any of them is disabled, this function tries to build proper permissions, by calling is_readable() and is_writable() functions.
	 *
	 * @param string	$filename	The file/directory to be chmodded
	 * @param int	$perms		Permissions to set
	 *
	 * @return bool	true on success, otherwise false
	 * @author faw, phpBB Group
	 */
	function phpbb_chmod($filename, $perms = CHMOD_READ)
	{
		static $_chmod_info;

		// Return if the file no longer exists.
		if (!file_exists($filename))
		{
			return false;
		}

		// Determine some common vars
		if (empty($_chmod_info))
		{
			if (!function_exists('fileowner') || !function_exists('filegroup'))
			{
				// No need to further determine owner/group - it is unknown
				$_chmod_info['process'] = false;
			}
			else
			{
				global $phpbb_root_path, $phpEx;

				// Determine owner/group of common.php file and the filename we want to change here
				$common_php_owner = @fileowner($phpbb_root_path . 'common.' . $phpEx);
				$common_php_group = @filegroup($phpbb_root_path . 'common.' . $phpEx);

				// And the owner and the groups PHP is running under.
				$php_uid = (function_exists('posix_getuid')) ? @posix_getuid() : false;
				$php_gids = (function_exists('posix_getgroups')) ? @posix_getgroups() : false;

				// If we are unable to get owner/group, then do not try to set them by guessing
				if (!$php_uid || empty($php_gids) || !$common_php_owner || !$common_php_group)
				{
					$_chmod_info['process'] = false;
				}
				else
				{
					$_chmod_info = array(
						'process'		=> true,
						'common_owner'	=> $common_php_owner,
						'common_group'	=> $common_php_group,
						'php_uid'		=> $php_uid,
						'php_gids'		=> $php_gids,
					);
				}
			}
		}

		if ($_chmod_info['process'])
		{
			$file_uid = @fileowner($filename);
			$file_gid = @filegroup($filename);

			// Change owner
			if (@chown($filename, $_chmod_info['common_owner']))
			{
				clearstatcache();
				$file_uid = @fileowner($filename);
			}

			// Change group
			if (@chgrp($filename, $_chmod_info['common_group']))
			{
				clearstatcache();
				$file_gid = @filegroup($filename);
			}

			// If the file_uid/gid now match the one from common.php we can process further, else we are not able to change something
			if ($file_uid != $_chmod_info['common_owner'] || $file_gid != $_chmod_info['common_group'])
			{
				$_chmod_info['process'] = false;
			}
		}

		// Still able to process?
		if ($_chmod_info['process'])
		{
			if ($file_uid == $_chmod_info['php_uid'])
			{
				$php = 'owner';
			}
			else if (in_array($file_gid, $_chmod_info['php_gids']))
			{
				$php = 'group';
			}
			else
			{
				// Since we are setting the everyone bit anyway, no need to do expensive operations
				$_chmod_info['process'] = false;
			}
		}

		// We are not able to determine or change something
		if (!$_chmod_info['process'])
		{
			$php = 'other';
		}

		// Owner always has read/write permission
		$owner = CHMOD_READ | CHMOD_WRITE;
		if (is_dir($filename))
		{
			$owner |= CHMOD_EXECUTE;

			// Only add execute bit to the permission if the dir needs to be readable
			if ($perms & CHMOD_READ)
			{
				$perms |= CHMOD_EXECUTE;
			}
		}

		switch ($php)
		{
			case 'owner':
				$result = @chmod($filename, ($owner << 6) + (0 << 3) + (0 << 0));

				clearstatcache();

				if (is_readable($filename) && $this->phpbb_is_writable($filename))
				{
					break;
				}

			case 'group':
				$result = @chmod($filename, ($owner << 6) + ($perms << 3) + (0 << 0));

				clearstatcache();

				if ((!($perms & CHMOD_READ) || is_readable($filename)) && (!($perms & CHMOD_WRITE) || $this->phpbb_is_writable($filename)))
				{
					break;
				}

			case 'other':
				$result = @chmod($filename, ($owner << 6) + ($perms << 3) + ($perms << 0));

				clearstatcache();

				if ((!($perms & CHMOD_READ) || is_readable($filename)) && (!($perms & CHMOD_WRITE) || $this->phpbb_is_writable($filename)))
				{
					break;
				}

			default:
				return false;
			break;
		}

		return $result;
	}

	/**
	 * Test if a file/directory is writable
	 *
	 * This function calls the native is_writable() when not running under
	 * Windows and it is not disabled.
	 *
	 * @param string $file Path to perform write test on
	 * @return bool True when the path is writable, otherwise false.
	 */
	function phpbb_is_writable($file)
	{
		if (strtolower(substr(PHP_OS, 0, 3)) === 'win' || !function_exists('is_writable'))
		{
			if (file_exists($file))
			{
				// Canonicalise path to absolute path
				$file = $this->phpbb_realpath($file);

				if (is_dir($file))
				{
					// Test directory by creating a file inside the directory
					$result = @tempnam($file, 'i_w');

					if (is_string($result) && file_exists($result))
					{
						unlink($result);

						// Ensure the file is actually in the directory (returned realpathed)
						return (strpos($result, $file) === 0) ? true : false;
					}
				}
				else
				{
					$handle = @fopen($file, 'r+');

					if (is_resource($handle))
					{
						fclose($handle);
						return true;
					}
				}
			}
			else
			{
				// file does not exist test if we can write to the directory
				$dir = dirname($file);

				if (file_exists($dir) && is_dir($dir) && $this->phpbb_is_writable($dir))
				{
					return true;
				}
			}

			return false;
		}
		else
		{
			return is_writable($file);
		}
	}

	/**
	 * A wrapper for realpath
	 */
	function phpbb_realpath($path)
	{
		if (!function_exists('realpath'))
		{
			return $this->phpbb_own_realpath($path);
		}
		else
		{
			$realpath = realpath($path);

			// Strangely there are provider not disabling realpath but returning strange values. :o
			// We at least try to cope with them.
			if ($realpath === $path || $realpath === false)
			{
				return $this->phpbb_own_realpath($path);
			}

			// Check for DIRECTORY_SEPARATOR at the end (and remove it!)
			if (substr($realpath, -1) == DIRECTORY_SEPARATOR)
			{
				$realpath = substr($realpath, 0, -1);
			}

			return $realpath;
		}
	}

	/**
	 * @author Chris Smith <chris@project-minerva.org>
	 * @copyright 2006 Project Minerva Team
	 * @param string $path The path which we should attempt to resolve.
	 * @return mixed
	 */
	function phpbb_own_realpath($path)
	{
		// Now to perform funky shizzle

		// Switch to use UNIX slashes
		$path = str_replace(DIRECTORY_SEPARATOR, '/', $path);
		$path_prefix = '';

		// Determine what sort of path we have
		if (is_absolute($path))
		{
			$absolute = true;

			if ($path[0] == '/')
			{
				// Absolute path, *NIX style
				$path_prefix = '';
			}
			else
			{
				// Absolute path, Windows style
				// Remove the drive letter and colon
				$path_prefix = $path[0] . ':';
				$path = substr($path, 2);
			}
		}
		else
		{
			// Relative Path
			// Prepend the current working directory
			if (function_exists('getcwd'))
			{
				// This is the best method, hopefully it is enabled!
				$path = str_replace(DIRECTORY_SEPARATOR, '/', getcwd()) . '/' . $path;
				$absolute = true;
				if (preg_match('#^[a-z]:#i', $path))
				{
					$path_prefix = $path[0] . ':';
					$path = substr($path, 2);
				}
				else
				{
					$path_prefix = '';
				}
			}
			else if (isset($_SERVER['SCRIPT_FILENAME']) && !empty($_SERVER['SCRIPT_FILENAME']))
			{
				// Warning: If chdir() has been used this will lie!
				// Warning: This has some problems sometime (CLI can create them easily)
				$path = str_replace(DIRECTORY_SEPARATOR, '/', dirname($_SERVER['SCRIPT_FILENAME'])) . '/' . $path;
				$absolute = true;
				$path_prefix = '';
			}
			else
			{
				// We have no way of getting the absolute path, just run on using relative ones.
				$absolute = false;
				$path_prefix = '.';
			}
		}

		// Remove any repeated slashes
		$path = preg_replace('#/{2,}#', '/', $path);

		// Remove the slashes from the start and end of the path
		$path = trim($path, '/');

		// Break the string into little bits for us to nibble on
		$bits = explode('/', $path);

		// Remove any . in the path, renumber array for the loop below
		$bits = array_values(array_diff($bits, array('.')));

		// Lets get looping, run over and resolve any .. (up directory)
		for ($i = 0, $max = sizeof($bits); $i < $max; $i++)
		{
			// @todo Optimise
			if ($bits[$i] == '..' )
			{
				if (isset($bits[$i - 1]))
				{
					if ($bits[$i - 1] != '..')
					{
						// We found a .. and we are able to traverse upwards, lets do it!
						unset($bits[$i]);
						unset($bits[$i - 1]);
						$i -= 2;
						$max -= 2;
						$bits = array_values($bits);
					}
				}
				else if ($absolute) // ie. !isset($bits[$i - 1]) && $absolute
				{
					// We have an absolute path trying to descend above the root of the filesystem
					// ... Error!
					return false;
				}
			}
		}

		// Prepend the path prefix
		array_unshift($bits, $path_prefix);

		$resolved = '';

		$max = sizeof($bits) - 1;

		// Check if we are able to resolve symlinks, Windows cannot.
		$symlink_resolve = (function_exists('readlink')) ? true : false;

		foreach ($bits as $i => $bit)
		{
			if (@is_dir("$resolved/$bit") || ($i == $max && @is_file("$resolved/$bit")))
			{
				// Path Exists
				if ($symlink_resolve && is_link("$resolved/$bit") && ($link = readlink("$resolved/$bit")))
				{
					// Resolved a symlink.
					$resolved = $link . (($i == $max) ? '' : '/');
					continue;
				}
			}
			else
			{
				// Something doesn't exist here!
				// This is correct realpath() behaviour but sadly open_basedir and safe_mode make this problematic
				// return false;
			}
			$resolved .= $bit . (($i == $max) ? '' : '/');
		}

		// @todo If the file exists fine and open_basedir only has one path we should be able to prepend it
		// because we must be inside that basedir, the question is where...
		// @internal The slash in is_dir() gets around an open_basedir restriction
		if (!@file_exists($resolved) || (!@is_dir($resolved . '/') && !is_file($resolved)))
		{
			return false;
		}

		// Put the slashes back to the native operating systems slashes
		$resolved = str_replace('/', DIRECTORY_SEPARATOR, $resolved);

		// Check for DIRECTORY_SEPARATOR at the end (and remove it!)
		if (substr($resolved, -1) == DIRECTORY_SEPARATOR)
		{
			return substr($resolved, 0, -1);
		}

		return $resolved; // We got here, in the end!
	}
}

/**
* We can't rely on the phpBB cache at this moment. So we'll implement our own
* very simplyfied version of it for this tool.
*/
class _erk_bom_sniffer_cache
{
	/**
	* @var bom_sniffer The BOM sniffer object
	* @access private
	*/
	var $bom_sniffer = null;

	/**
	* @var String The path to the "cache" folder
	* @access private
	*/
	var $_cache_path = '';

	/**
	* @var Array that will be filled with the cached data.
	* @access public
	*/
	var $cache_data = array();

	/**
	* Construct the sniffer cache
	*/
	function _erk_bom_sniffer_cache($bom_sniffer)
	{
		$this->bom_sniffer = $bom_sniffer;

		$this->_cache_path = PHPBB_ROOT_PATH . 'cache/';

		// Dir exists and is writable
		if (@is_writable($this->_cache_path) !== true)
		{
			$this->bom_sniffer->trigger_message(sprintf($this->bom_sniffer->messages['bom_sniffer_writable']), $this->_cache_path);
		}

		// If we've got data cached for this load it.
		if (file_exists($this->_cache_path . 'data_stk_bom_sniffer.' . PHP_EXT))
		{
			$this->cache_data = $this->_readdata();
		}
	}

	/**
	* Read the stored data from the cache. This method is a copy of the
	* "data" part of acm_file::_read()
	* @return Array The cached data
	*/
	function _readdata()
	{
		$file = $this->_cache_path . 'data_stk_bom_sniffer.' . PHP_EXT;

		if (!file_exists($file))
		{
			return false;
		}

		if (!($handle = @fopen($file, 'rb')))
		{
			return false;
		}

		// Skip the PHP header
		fgets($handle);

		$data = false;
		$line = 0;

		while (($buffer = fgets($handle)) && !feof($handle))
		{
			$buffer = substr($buffer, 0, -1); // Remove the LF

			// $buffer is only used to read integers
			// if it is non numeric we have an invalid
			// cache file, which we will now remove.
			if (!is_numeric($buffer))
			{
				break;
			}

			if ($line == 0)
			{
				$expires = (int) $buffer;

				if (time() >= $expires)
				{
					break;
				}
			}
			else if ($line == 1)
			{
				$bytes = (int) $buffer;

				// Never should have 0 bytes
				if (!$bytes)
				{
					break;
				}

				// Grab the serialized data
				$data = fread($handle, $bytes);

				// Read 1 byte, to trigger EOF
				fread($handle, 1);

				if (!feof($handle))
				{
					// Somebody tampered with our data
					$data = false;
				}
				break;
			}
			else
			{
				// Something went wrong
				break;
			}
			$line++;
		}
		fclose($handle);

		// unserialize if we got some data
		$data = ($data !== false) ? @unserialize($data) : $data;

		return ($data === false) ? array() : $data;
	}

	/**
	* Write the content of _stk_bom_sniffer_cache::$cache_data.
	* This method is based upon acm_file::_write();
	* @return bool True if the file was successfully created, otherwise false
	*/
	function storedata()
	{
		$file = $this->_cache_path . 'data_stk_bom_sniffer.' . PHP_EXT;

		if ($handle = @fopen($file, 'wb'))
		{
			@flock($handle, LOCK_EX);

			// File header
			fwrite($handle, '<' . '?php exit; ?' . '>');

			// The BOM sniffer cache shouldn't expire
			fwrite($handle, "\n" . PHP_INT_MAX . "\n");

			$data = serialize($this->cache_data);

			fwrite($handle, strlen($data) . "\n");
			fwrite($handle, $data);

			@flock($handle, LOCK_UN);
			fclose($handle);

			$this->bom_sniffer->phpbb_chmod($file, CHMOD_READ | CHMOD_WRITE);

			return true;
		}
	}
}
