<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * STK User class
 *
 * Suppor toolkit user class that extends the phpBB core user class.
 */
class stk_wrapper_user extends phpbb_user
{
	/**
	* Constructor to set the lang path
	*/
	function __construct($stk)
	{
		// phpBB core language files are fetched from the phpBB installation
		$this->lang_path = $stk['config']['phpbb_root_path'] . 'language/';
	}

	/**
	 * Add Language Items - use_db and use_help are assigned where needed (only use them to force inclusion)
	 *
	 * @param mixed  $lang_file  specifies the language entries to include
	 * @param mixed  $force_lang when set to a language iso code this language is used, otherwise
	 *                           the users default language will be used.
	 * @param bool   $use_db     internal variable for recursion, do not use
	 * @param bool   $use_help   internal variable for recursion, do not use
	 * @param string $ext_name   The extension to load language from, or empty for core files
	 * @param bool   $canfail    If the language file doesn't exist don't trigger an error
	 */
	function stk_add_lang($lang_file, $force_lang = false, $use_db = false, $use_help = false, $ext_name = '', $canfail = false)
	{
		global $config;

		// Internally cache some data
		static $lang_data	= array();
		static $lang_dirs	= array();
		static $loaded		= array();

		// Only include a language file once
		if (in_array($lang_file, $loaded))
		{
			return;
		}

		// Store current phpBB data
		if (empty($lang_data))
		{
			$lang_data = array(
				'lang_path'	=> $this->lang_path,
				'lang_name'	=> $this->lang_name,
			);
		}

		// Find out what languages we could use
		if (empty($lang_dirs))
		{
			$lang_dirs = array(
				!empty($this->data['user_lang']) ? $this->data['user_lang'] : 'en',						// User default
				!empty($config['default_lang']) ? basename($config['default_lang']) : 'en',	// Board default
				'en',																					// System default
			);

			// Only unique dirs
			$lang_dirs = array_unique($lang_dirs);
		}

		// Empty the lang_name
		$this->lang_name = '';

		// Switch to the STK language dir
		$this->lang_path = STK_ROOT . 'language/';

		// Test all languages
		foreach ($lang_dirs as $dir)
		{
			// When forced skip all others
			if ($force_lang !== false && $dir != $force_lang)
			{
				continue;
			}

			if (file_exists($this->lang_path . $dir . "/{$lang_file}.php"))
			{
				$this->lang_name = $dir;
				break;
			}
		}

		// No language file :/
		if (empty($this->lang_name) && !$canfail)
		{
			trigger_error("Language file: {$lang_file}.php" . ' missing!', E_USER_ERROR);
		}
		else if (!empty($this->lang_name))
		{
			// Add the file
			parent::add_lang($lang_file, $use_db, $use_help, $ext_name);
			$loaded[] = $lang_file;
		}

		// Now reset the paths so phpBB can continue to operate as usual
		$this->lang_path = $lang_data['lang_path'];
		$this->lang_name = $lang_data['lang_name'];
	}
}
