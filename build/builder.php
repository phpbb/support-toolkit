<?php
/**
 *
 * @package Support Toolkit
 * @copyright (c) 2010 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
 
/**
 * @ignore
 */
if (php_sapi_name() != 'cli')
{
	die("This program must be run from the command line.\n");
}

/**
 * The main STK Build class
 */
class stk_builder
{
	/**
	 * The build command in a usable format
	 */
	public $build_command = array();

	/**
	 * Adjust the whitelist to include some other phpBB products
	 * these should be added to the "whitelist_additional" directory
	 * the following directories can be used:
	 * * phpBB3: The latest phpBB build
	 * * automod: *only* the contents of the `upload` dir in the package
	 * * umil: *only* the contents of the `root` dir in the package
	 *
	 * The array values of each "extra" define the dirs ([0]) and files([1])
	 * that won't be included in the whitelist. If the third key is set, than
	 * then that value will be prepended to the whitelist entry
	 */
	static private $whitelist_extras = array(
		'phpBB3'	=> array(
			array('cache', 'develop', 'files', 'install', 'store'),
			array(),
		),
		'automod'	=> array(
			array('develop', 'umil'),
			array(),
		),
		'umil'		=> array(
			array(),
			array(),
			'umil',
		),
	);
	
	/**
	 * An array containing all language pack builders
	 * @var Array
	 */
	private $lang_builders = array();

	/**
	 * An array that keeps track of all language keys that
	 * are in the English lang pack. This is used later for
	 * the validation of the translations.
	 * @var Array
	 */
	private $lang_en_contents = array();
	
	/**
	 * Holds errors encounered in language pack validation
	 * @var Array
	 */
	private $lang_errors = array();
	
	/**
	 * Keep track of the files that were validated, only way to
	 * know whether files were removed
	 * @var Array
	 */
	private $lang_files_checked = array();
	
	/**
	 * The version of the package that will be created
	 * @var String
	 */
	private $stk_version = '';
	
	/**
	 * The STK Builder
	 * @var compress_zip
	 */
	private $stk_build = null;
	
	/**
	 * Hold all the translation identifiers
	 * @var Array
	 */
	public $translations = array();
	
	/**
	 * The BOM Sniffer whitelist
	 * @var Array
	 */
	private $whitelist = array();
	
	/**
	 * Construct the builder
	 */
	public function __construct()
	{
		// Fetch the options
		$options = getopt('v:fslb');

		// Make sure that we can run
		if (empty($options))
		{
			print("This build script requires some commandline arguments in order to run.\n");
			print("Usage: php build.php -v version [OPTIONS]\n");
			print("\nOPTIONS\n");
			print("\t-v version           The version for the generated package. (mandatory)\n");
			print("\t-f                   Defines whether all packages are created (stk,\n");
			print("\t                     translations and the BOM Sniffer whitelist.)\n");
			print("\t                     This is the default mode in which this builder runs! (optional)\n");
			print("\t-s                   Build only the Support Toolkit (optional)\n");
			print("\t-l                   Build only the translation packs. (optional)\n");
			print("\t-b                   Build only the BOM Sniffer whitelist file. (optional)\n");
			print("\nEXAMPLES\n");
			print("\tphp build.php -v 1.0.0\n");
			print("\tphp build.php -v 1.0.0 -f\n");
			print("\t\tThese command creates the a full packages with version number 1.0.0\n");
			print("\tphp build.php -v 1.0.0 -s\n");
			print("\t\tThis command only builds the STK package for version 1.0.0\n");
			print("\tphp build.php -v 1.0.0 -l\n");
			print("\t\tThis command only builds and validates the language packages\n");
			print("\tphp build.php -v 1.0.0 -b\n");
			print("\t\tThis command will generate and output the whitelist\n");
			exit;
		}

		$this->build_command['version'] = $options['v'];
		$this->build_command['full']	= (isset($options['f'])) ? $options['f'] : false;
		$this->build_command['stk']		= (isset($options['f'])) ? $options['s'] : false;
		$this->build_command['lang']	= (isset($options['f'])) ? $options['l'] : false;
		$this->build_command['bom']		= (isset($options['f'])) ? $options['b'] : false;

		// Set to full if no other arguments are given.
		if ($this->build_command['full'] == false &&
			$this->build_command['stk'] == false &&
			$this->build_command['lang'] == false &&
			$this->build_command['bom'] == false)
		{
			$this->build_command['full'] = true;
		}

		// Set the version number
		$this->stk_version = str_replace('.', '_', $this->build_command['version']);

		// Make sure we can build
		if (!is_writable('package'))
		{
			die("Make sure that this script can write to the `package` directory\n");
		}
	}
	
	/**
	 * The actual builder
	 */
	public function build()
	{
		$filelist = $this->filelist('./../');

		// Remove all non-english translations from the filelist
		foreach ($filelist as $dir => $files)
		{
			if (empty($files))
			{
				unset($filelist[$dir]);
			}

			if (!preg_match('#^stk/language#ise', $dir))
			{
				continue;
			}

			if (preg_match('#^stk/language/(?!en)#ise', $dir))
			{
				unset($filelist[$dir]);
			}
		}

		// The translation list
		$this->get_translations_list();
		
		$this->stk_build = new compress_zip('w', "./package/support_toolkit_{$this->stk_version}.zip");
		$this->create_package(false, 'stk', $this->stk_build, $filelist);
	}
	
	/**
	 * Build the given translations
	 * @param  Array $translations The lang identifiers of the translations that will
	 *                             be build
	 * @return void
	 */
	public function build_translations($translations = array())
	{
		$file_skip = $this->get_file_ignores('lang');

		foreach ($translations as $translation)
		{
			if (!is_dir("./../stk/language/{$translation}"))
			{
				continue;
			}

			// Create the compresser
			if (empty($this->lang_builders[$translation]))
			{
				$this->lang_builders[$translation] = new compress_zip('w', "./package/stk_{$this->stk_version}_{$translation}.zip");
			}
			$this->create_package("./../stk/language/{$translation}", 'language', $this->lang_builders[$translation], false, $translation);

			// Now make sure no files where removed
			$removed_files = array_diff(array_keys($this->lang_en_contents), $this->lang_files_checked[$translation]);
			if (!empty($removed_files))
			{
				foreach ($removed_files as $file)
				{
					if (preg_match("#^{$file_skip}$#ise", $file))
					{
						continue;
					}

					if (!isset($this->lang_errors[$translation]['removed']['files']))
					{
						$this->lang_errors[$translation]['removed']['files'] = array();
					}
		
					$this->lang_errors[$translation]['removed']['files'][] = "./../stk/language/{$translation}/{$file}";
				}
			}
		}
	}
	
	/**
	 * Build the STK Whitelist
	 * @param  Boolean $download Download the file, or if false add to the archive
	 */
	public function build_whitelist($download)
	{
		// First the 'STK'
		$this->_whitelist('./../stk/', array('includes/critical_repair'), array('config', 'erk'), 'stk');

		// Now do the extra packages if they're included
		foreach (self::$whitelist_extras as $extra => $params)
		{
			// Need to run this extra?
			if (!is_dir('./whitelist_additional/' . $extra))
			{
				continue;
			}
			
			$params = array_merge(array('./whitelist_additional/' . $extra), $params);
			call_user_func_array(array($this, '_whitelist'), $params);
		}

		if ($download)
		{
			print(" *********************************************\n");
			print(" *         THE BOM SNIFFER WHITELIST         *\n");
			print(" *********************************************\n");
			print(implode("\n", $this->whitelist) . "\n");

			// When only building the Sniffer we exit
			if (empty($this->build_command['lang']) && empty($this->build_command['stk']))
			{
				exit;
			}

			print(" *********************************************\n");
			print(" *         END BOM SNIFFER WHITELIST         *\n");
			print(" *********************************************\n");
			return;
		}

		// Add the whitelist to the package
		$this->stk_build->add_data(implode("\n", $this->whitelist), 'stk/includes/critical_repair/whitelist.txt');
	}

	/**
	 * Build a list with all the translations that are in the package
	 */
	public function get_translations_list()
	{
		if (!defined('IN_PHPBB'))
		{
			define('IN_PHPBB', true);
		}

		$filelist = $this->filelist('./../stk/language/');
		foreach ($filelist as $dir => $files)
		{
			if (empty($dir) || empty($files))
			{
				continue;
			}

			$parts = array();
			preg_match('#^([a-zA-Z\-_]+)(.*)?$#ise', $dir, $parts);
			if ($parts[1] != 'en')
			{
				// Non English
				unset($filelist[$dir]);
	
				// Track translations
				if (!in_array($parts[1], $this->translations))
				{
					$this->translations[] = $parts[1];
				}
	
				continue;
			}
	
			// Include the language files and store all the keys so we
			// can validate the language packages later.
			foreach ($files as $f)
			{
				if (!preg_match('#([a-zA-Z_]+).php$#ise', $f))
				{
					continue;
				}
	
				$lang = array();
				include "./../stk/language/{$dir}{$f}";
				$this->lang_en_contents[$f] = array_keys($lang);
			}
		}
	}

	/**
	 * Output any translation errors
	 */
	public function translation_errors()
	{
		// None, nice translators :)
		if (empty($this->lang_errors))
		{
			return false;
		}

		print(" ********************************\n");
		print(" *   Translation issues found   *\n");
		print(" ********************************\n");

		foreach ($this->lang_errors as $pack => $packerrors)
		{
			print(" - Listing the issues found in: {$pack} -\n");

			foreach ($packerrors as $type => $files)
			{
				print("\t*   The following entries where: {$type}");

				foreach ($files as $file => $errors)
				{
					if ($file != 'files')
					{
						print("\n\t\tIn {$file}:\n\t\t\t- " . implode("\n\t\t\t- ", $errors) . "\n");
					}
					else
					{
						print("\n\t\t- " . implode("\n\t\t- ", $errors) . "\n");
					}
				}

				print("\n\n");
			}
		}

		return true;
	}
	
	/**
	 * Internal handler for the whitelist creation
	 */
	private function _whitelist($dir, $ignore_dirs = array(), $ignore_files = array(), $path_prefix = '')
	{
		$filelist = $this->filelist($dir);

		$ignore_dirs_regex	= !empty($ignore_dirs) ? '#^(' . implode('|', $ignore_dirs) . ')#ise' : '';
		$ignore_files_regex	= !empty($ignore_files) ? '#^(' . implode('|', $ignore_files) . ')#ise' : '';

		foreach ($filelist as $dir => $files)
		{
			if (empty($files))
			{
				continue;
			}
			
			if (!empty($ignore_dirs_regex) && preg_match($ignore_dirs_regex, $dir))
			{
				continue;
			}

			// Language files get some love
			$lang_match = array();
			if (preg_match('#language/([a-zA-Z_\-]+)/#ise', $dir, $lang_match))
			{
				// non-english skip
				if ($lang_match[1] != 'en')
				{
					continue;
				}

				// Replace `en` with `..` gets handled by the BOM Sniffer later on
				$dir = str_replace('language/en/', 'language/../', $dir);
			}

			foreach ($files as $file)
			{
				// Skip all non-php files
				$_filematches = array();
				if (!preg_match('#([a-zA-Z_]+).php$#ise', $file, $_filematches))
				{
					continue;
				}
				
				// Skip system dependant files
				if (!empty($ignore_files_regex) && preg_match($ignore_files_regex, $file))
				{
					continue;
				}
				
				// Add
				$this->whitelist[] = ((!empty($path_prefix)) ? "{$path_prefix}/" : '') . $dir . $_filematches[1];
			}
		}
	}
	
	/**
	 * Create the package
	 * @param  String|Boolean $path     The path to the directory that is used
	 *                                  to build the package or false if the
	 *                                  $filelist argument is provided
	 * @param  String         $mode     The type of package is build can be "stk",
	 *                                  "language" or any of the "extra's"
	 * @param  compress_zip   $builder  The compress object used for this package
	 * @param  Array|Boolean  $filelist If false for the first argument this param
	 *                                  contains the filelist
	 * @param  String         $transl   Must be set when packing non-englis language
	 *                                  files, as these translations will be checked
	 * @return void
	 */
	private function create_package($path, $mode, $builder, $filelist = false, $transl = '')
	{
		// Get the filelist
		if ($path !== false)
		{
			$filelist = $this->filelist($path);
		}

		// Get some mode specific data
		$dir_skip	= $this->get_dir_ignores($mode);
		$file_skip	= $this->get_file_ignores($mode);
		
		// Run through the filelist
		foreach ($filelist as $dir => $files)
		{
			// Empty stuff
			if (empty($files))
			{
				continue;
			}

			// Skip dirs that this mode don't like
			if (!empty($dir_skip) && preg_match("#^{$dir_skip}#ise", $dir))
			{
				continue;
			}
			
			$dir = !empty($dir) ? rtrim($dir, '/') . '/' : $dir;

			// Do the file magic
			foreach ($files as $file)
			{
				// If needed skip some files
				if ($file[0] == '.' || !empty($file_skip) && preg_match("#^{$file_skip}$#ise", $file))
				{
					continue;
				}

				// Add to the package
				$dest = "{$dir}{$file}";
				$orig = "./../{$dir}{$file}";

				if ($mode == 'language')
				{
					// When packing language files the path needs a slight adjustment
					$dest = "{$transl}/{$dir}{$file}";
					$orig = "{$path}/{$dir}{$file}";

					// Validate the language pack
					if (!empty($transl))
					{
						$this->_validate_language_file($orig, $transl);
					}
				}

				$builder->add_custom_file($orig, $dest);
			}
		}
	}

	/**
	 * Validate the provided language file, this makes sure that the translations
	 * atleast are complete
	 * @param  String $path Path to the original file
	 * @param  String $name The language of this translation
	 * @return void
	 */
	private function _validate_language_file($path, $name)
	{
		// Grep the filename
		$filename = array();
		if (!preg_match('#([a-zA-Z_]+).php$#ise', $path, $filename))
		{
			// No .php file
			return;
		}
		$file = $filename[1] . '.php';

		// Added file
		if (!isset($this->lang_en_contents[$file]))
		{
			if (!isset($this->lang_errors[$name]['added']['files']))
			{
				$this->lang_errors[$name]['added']['files'] = array();
			}

			$this->lang_errors[$name]['added']['files'][] = $path;
			return;
		}

		include ($path);

		// Compare the files
		foreach ($this->lang_en_contents[$file] as $entry)
		{
			// The key exists
			if (array_key_exists($entry, $lang))
			{
				unset($lang[$entry]);
			}
			// The key is removed
			else
			{
				if (!isset($this->lang_errors[$name]['removed']))
				{
					$this->lang_errors[$name]['removed'][$path] = array();
				}

				$this->lang_errors[$name]['removed'][$path][] = $entry;
			}
		}

		// Everything remaining in `$lang` was added by the author, notify him about this
		if (!empty($lang))
		{
			foreach (array_keys($lang) as $extra)
			{
				if (!isset($this->lang_errors[$name]))
				{
					$this->lang_errors[$name] = array();
				}

				if (!isset($this->lang_error[$name]['added'][$path]))
				{
					$this->lang_errors[$name]['added'][$path] = array();
				}

				$this->lang_errors[$name]['added'][$path][] = $extra;
			}
		}

		if (!isset($this->lang_files_checked[$name]))
		{
			$this->lang_files_checked[$name] = array();
		}
		$this->lang_files_checked[$name][] = $file;

		// Reset
		$lang	= array();
		$entry	= '';
		$extra	= '';
	}
	
	/**
	 * Get the regex describing the directories that will be ignored
	 * for a certain group
	 * @param  String $type The group
	 * @return String The regex
	 */
	private function get_dir_ignores($type)
	{
		switch ($type)
		{
			case 'stk' :
				return '(build|stk/develop)';
			break;

			default :
				return '';
		}
	}
	
	/**
	 * Get the regex describing the files that will be ignored
	 * for a certain group
	 * @param  String $type The group
	 * @return String The regex
	 */
	private function get_file_ignores($type)
	{
		switch ($type)
		{
			case 'stk' :
				// Also ignore whitelist.txt, if this file already exists for
				// whatever reason, it breaks stuff under certain circumstances (#62636).
				return '(README.md|whitelist.txt)';
			break;

			case 'lang' :
				// SRT generator can't be translated
				return 'srt_generator.php';

			default :
				return '';
		}
	}
	
	/**
	 * Get physical file listing
	 *
	 * This function is takes straight from `includes/functions_admin.php`
	 * only the file extension check was removed.
	 */
	public function filelist($rootdir, $dir = '')
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
				$matches += $this->filelist($rootdir, "$dir$fname");
			}
		}
		closedir($dh);
	
		return $matches;
	}
	
	/**
	 * Destruct the builder
	 */
	public function __destruct()
	{
		// Close all the packages
		if ($this->stk_build instanceof compress)
		{
			$this->stk_build->close();
		}

		foreach ($this->lang_builders as $lang_builder)
		{
			if ($lang_builder instanceof compress)
			{
				$lang_builder->close();
			}
		}
	}
}
