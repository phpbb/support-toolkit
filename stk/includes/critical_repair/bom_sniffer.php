<?php
/**
*
* @package Support Toolkit
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
*
* @todo At the moment this runs every page load. Should get something to limit this.
*/
class stk_bom_sniffer
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
	* @var Array An array with directories that will not be checked by this tool
	* @access private
	*/
	var $ignored_dirs = array(
		'cache/',
		'develop/',
		'files/',
		'install/',
		'store/',
		'stk/includes/critical_repair/',
		'stk/includes/critical_repair/autorun/',
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
	* Constructor. Prep the tool
	* Uses die to not display to much useless information to the user (as trigger_error does)
	*/
	function stk_bom_sniffer()
	{
		// "Store" must be writable
		if (@is_writable(PHPBB_ROOT_PATH . 'store') !== true)
		{
			die("The BOM sniffer requires the <c>store</c> directory to exist and to be writable!");
		}

		// Make sure the BOM sniffer dir store dir doesn't exist
		if (file_exists(PHPBB_ROOT_PATH . 'store/bom_sniffer'))
		{
			// Try to remove the directory
			if ($this->recursively_remove_dir(PHPBB_ROOT_PATH . 'store/bom_sniffer') === false)
			{
				die('Please remove the [' . PHPBB_ROOT_PATH . 'store/bom_sniffer] directory from your server. The BOM sniffer can\'t operate when this directory is in place');
			}
		}

		// Init the internal cache
		$this->cache = new _stk_bom_sniffer_cache($this);
	}

	/**
	* Run the tool
	* This tool will run through the files and all files that are new, or of
	* which the last change date has been changed will be checked for invalid
	* characters.
	*/
	function run()
	{
		// Get all the files
		$filelist = filelist(PHPBB_ROOT_PATH, '', 'php');

		foreach ($filelist as $directory => $files)
		{
			// Skip some dirs
			if (in_array($directory, $this->ignored_dirs))
			{
				continue;
			}

			// Step into the files
			if (is_array($files))
			{
				foreach ($files as $file)
				{
					// File never checked or was changed after the last run
					if (!isset($this->cache->cache_data[$directory. $file]) || filectime(PHPBB_ROOT_PATH . $directory . $file) != $this->cache->cache_data[$directory . $file])
					{
						// Read the file
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

							$writefile = fopen(PHPBB_ROOT_PATH . 'store/bom_sniffer/' . $directory. $file, 'wb');
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
				}
			}
		}
		// Once finished always write the new data back to the cache file
		$this->cache->storedata();

		// Inform the user what to do if we've created files
		if (is_dir(PHPBB_ROOT_PATH . 'store/bom_sniffer'))
		{
			$this->display_finish_message();
		}
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
	* Output a page informing the user what to do with the created files
	*/
	function display_finish_message()
	{
		header('Content-type: text/html; charset=UTF-8');
		?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
		<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<meta http-equiv="content-style-type" content="text/css" />
			<meta http-equiv="imagetoolbar" content="no" />
			<title>BOM sniffer - Support Toolkit</title>
			<link href="<?php echo STK_ROOT_PATH; ?>/style/style.css" rel="stylesheet" type="text/css" media="screen" />
		</head>
		<body id="errorpage">
			<div id="wrap">
				<div id="page-header">

				</div>
				<div id="page-body">
					<div id="acp">
						<div class="panel">
							<span class="corners-top"><span></span></span>
								<div id="content">
									<h1>BOM sniffer</h1>
									<p>
										As part of the critical repair toolset of the Support Toolkit the STK has checked your phpBB
										files and determined that some of the files contain invalid content that potentially could
										stop the board from operating. The support Toolkit has tried to fix those issues and created
										a package with the updated files in the "store" directory of your board.<br />
										Please move the files from this package to their correct location and load the Support Toolkit
										again. The toolkit will check these files again and will redirect you to the STK if no flows are
										found.
									</p>
									<p>
										Click <a href="<?php echo STK_ROOT_PATH; ?>">here</a> to reload the STK.
									</p>
								</div>
							<span class="corners-bottom"><span></span></span>
						</div>
					</div>
				</div>
				<div id="page-footer">
					Powered by phpBB &copy; 2000, 2002, 2005, 2007 <a href="http://www.phpbb.com/">phpBB Group</a>
				</div>
			</div>
		</body>
	</html>
		<?php
		exit;
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
		}

		if (empty($match))
		{
			return false;
		}

		return (preg_match('~' . $match . '~ise', $buffer)) ? true : false;
	}

	//-- Wrapper
	/**
	* Global function for chmodding directories and files for internal use
	* This function determines owner and group whom the file belongs to and user and group of PHP and then set safest possible file permissions.
	* The function determines owner and group from common.php file and sets the same to the provided file. Permissions are mapped to the group, user always has rw(x) permission.
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
	* @param $filename The file/directory to be chmodded
	* @param $perms Permissions to set
	* @return true on success, otherwise false
	*
	* @author faw, phpBB Group
	*/
	function phpbb_chmod($filename, $perms = CHMOD_READ)
	{
		// Return if the file no longer exists.
		if (!file_exists($filename))
		{
			return false;
		}

		if (!function_exists('fileowner') || !function_exists('filegroup'))
		{
			$file_uid = $file_gid = false;
			$common_php_owner = $common_php_group = false;
		}
		else
		{
			// Determine owner/group of common.php file and the filename we want to change here
			$common_php_owner = fileowner(PHPBB_ROOT_PATH . 'common.' . PHP_EXT);
			$common_php_group = filegroup(PHPBB_ROOT_PATH . 'common.' . PHP_EXT);

			$file_uid = fileowner($filename);
			$file_gid = filegroup($filename);

			// Try to set the owner to the same common.php has
			if ($common_php_owner !== $file_uid && $common_php_owner !== false && $file_uid !== false)
			{
				// Will most likely not work
				if (@chown($filename, $common_php_owner));
				{
					clearstatcache();
					$file_uid = fileowner($filename);
				}
			}

			// Try to set the group to the same common.php has
			if ($common_php_group !== $file_gid && $common_php_group !== false && $file_gid !== false)
			{
				if (@chgrp($filename, $common_php_group));
				{
					clearstatcache();
					$file_gid = filegroup($filename);
				}
			}
		}

		// And the owner and the groups PHP is running under.
		$php_uid = (function_exists('posix_getuid')) ? @posix_getuid() : false;
		$php_gids = (function_exists('posix_getgroups')) ? @posix_getgroups() : false;

		// Who is PHP?
		if ($file_uid === false || $file_gid === false || $php_uid === false || $php_gids === false)
		{
			$php = NULL;
		}
		else if ($file_uid == $php_uid /* && $common_php_owner !== false && $common_php_owner === $file_uid*/)
		{
			$php = 'owner';
		}
		else if (in_array($file_gid, $php_gids))
		{
			$php = 'group';
		}
		else
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
			case null:
			case 'owner':
				/* ATTENTION: if php is owner or NULL we set it to group here. This is the most failsafe combination for the vast majority of server setups.

				$result = @chmod($filename, ($owner << 6) + (0 << 3) + (0 << 0));

				clearstatcache();

				if (!is_null($php) || (is_readable($filename) && is_writable($filename)))
				{
					break;
				}
			*/

			case 'group':
				$result = @chmod($filename, ($owner << 6) + ($perms << 3) + (0 << 0));

				clearstatcache();

				if (!is_null($php) || ((!($perms & CHMOD_READ) || is_readable($filename)) && (!($perms & CHMOD_WRITE) || is_writable($filename))))
				{
					break;
				}

			case 'other':
				$result = @chmod($filename, ($owner << 6) + ($perms << 3) + ($perms << 0));

				clearstatcache();

				if (!is_null($php) || ((!($perms & CHMOD_READ) || is_readable($filename)) && (!($perms & CHMOD_WRITE) || is_writable($filename))))
				{
					break;
				}

			default:
				return false;
			break;
		}

		return $result;
	}
}

/**
* We can't rely on the phpBB cache at this moment. So we'll implement our own
* very simplyfied version of it for this tool.
*/
class _stk_bom_sniffer_cache
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
	function _stk_bom_sniffer_cache($bom_sniffer)
	{
		$this->bom_sniffer = $bom_sniffer;

		$this->_cache_path = PHPBB_ROOT_PATH . 'cache/';

		// Dir exists and is writable
		if (@is_writable($this->_cache_path) !== true)
		{
			trigger_error("The BOM sniffer requires $this->_cache_path to exist and to be writable!");
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