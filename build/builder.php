<?php
/**
 *
 * @package Support Toolkit
 * @copyright (c) 2010 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 * The main STK Build class
 */
class stk_builder
{
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
		// Fetch the version
		if ($_SERVER['argc'] < 2)
		{
			die("You must supply a version number for the packages that will be created!\n");
		}
		
		// Make sure we can build
		if (!is_writable('package'))
		{
			die("Make sure that this script can write to the `package` directory\n");
		}

		$this->stk_version = $_SERVER['argv'][1];
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
			if (!preg_match('#^stk/language#ise', $dir))
			{
				continue;
			}

			$parts = explode('/', $dir);
			if (!empty($parts[2]) && $parts[2] != 'en')
			{
				// Non English
				unset($filelist[$dir]);

				// Track translations
				if (!in_array($parts[2], $this->translations))
				{
					$this->translations[] = $parts[2];
				}
			}
		}
		
		$this->stk_build = new compress_zip('w', "./package/support-toolkit-{$this->stk_version}.zip");
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
		foreach ($translations as $translation)
		{
			if (!is_dir("./../stk/language/{$translation}"))
			{
				continue;
			}

			// Create the compresser
			if (empty($this->lang_builders[$translation]))
			{
				$this->lang_builders[$translation] = new compress_zip('w', "./package/stk-{$this->stk_version}_{$translation}.zip");
			}
			$this->create_package("./../stk/language/{$translation}", 'language', $this->lang_builders[$translation]);
		}
	}
	
	/**
	 * Build the STK Whitelist
	 */
	public function build_whitelist()
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
		
		// Add the whitelist to the package
		$this->stk_build->add_data(implode("\n", $this->whitelist), 'stk/includes/critical_repair/whitelist.txt');
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
	 * @return void
	 */
	private function create_package($path, $mode, $builder, $filelist = false)
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
			
			$dir = rtrim($dir, '/') . '/';

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
					$dest = ltrim($dir . $file, '/');
					$orig = "{$path}/{$dir}{$file}";
				}

				$builder->add_custom_file($orig, $dest);
			}
		}
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
				return 'README.md';
			break;

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
		$this->stk_build->close();
		foreach ($this->lang_builders as $lang_builder)
		{
			$lang_builder->close();
		}
	}
}
