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
*
* @todo At the moment this runs every page load. Should get something to limit this.
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
	var $whitelist = array(
		'' => array(
			'common.php',
			'config.php',
			'cron.php',
			'faq.php',
			'feed.php',
			'index.php',
			'mcp.php',
			'memberlist.php',
			'posting.php',
			'report.php',
			'search.php',
			'style.php',
			'ucp.php',
			'viewforum.php',
			'viewonline.php',
			'viewtopic.php',
		),
		'adm/' => array(
			'index.php',
			'swatch.php',
		),
		'download/' => array(
			'file.php',
		),
		'includes/acm/' => array(
			'acm_apc.php',
			'acm_eaccelerator.php',
			'acm_file.php',
			'acm_memcache.php',
			'acm_memory.php',
			'acm_null.php',
			'acm_xcache.php',
		),
		'includes/acp/' => array(
			'acp_attachments.php',
			'acp_ban.php',
			'acp_bbcodes.php',
			'acp_board.php',
			'acp_bots.php',
			'acp_captcha.php',
			'acp_database.php',
			'acp_disallow.php',
			'acp_email.php',
			'acp_forums.php',
			'acp_groups.php',
			'acp_icons.php',
			'acp_inactive.php',
			'acp_jabber.php',
			'acp_language.php',
			'acp_logs.php',
			'acp_main.php',
			'acp_modules.php',
			'acp_permission_roles.php',
			'acp_permissions.php',
			'acp_php_info.php',
			'acp_profile.php',
			'acp_prune.php',
			'acp_ranks.php',
			'acp_reasons.php',
			'acp_search.php',
			'acp_send_statistics.php',
			'acp_styles.php',
			'acp_update.php',
			'acp_users.php',
			'acp_words.php',
			'auth.php',
		),
		'includes/acp/info/' => array(
			'acp_attachments.php',
			'acp_ban.php',
			'acp_bbcodes.php',
			'acp_board.php',
			'acp_bots.php',
			'acp_captcha.php',
			'acp_database.php',
			'acp_disallow.php',
			'acp_email.php',
			'acp_forums.php',
			'acp_groups.php',
			'acp_icons.php',
			'acp_inactive.php',
			'acp_jabber.php',
			'acp_language.php',
			'acp_logs.php',
			'acp_main.php',
			'acp_modules.php',
			'acp_permission_roles.php',
			'acp_permissions.php',
			'acp_php_info.php',
			'acp_profile.php',
			'acp_prune.php',
			'acp_ranks.php',
			'acp_reasons.php',
			'acp_search.php',
			'acp_send_statistics.php',
			'acp_styles.php',
			'acp_update.php',
			'acp_users.php',
			'acp_words.php',
		),
		'includes/auth/' => array(
			'auth_apache.php',
			'auth_db.php',
			'auth_ldap.php',
		),
		'includes/' => array(
			'auth.php',
			'bbcode.php',
			'cache.php',
			'constants.php',
			'functions.php',
			'functions_admin.php',
			'functions_compress.php',
			'functions_content.php',
			'functions_convert.php',
			'functions_display.php',
			'functions_install.php',
			'functions_jabber.php',
			'functions_messenger.php',
			'functions_module.php',
			'functions_posting.php',
			'functions_privmsgs.php',
			'functions_profile_fields.php',
			'functions_template.php',
			'functions_transfer.php',
			'functions_upload.php',
			'functions_user.php',
			'message_parser.php',
			'session.php',
			'template.php',
		),
		'includes/captcha/' => array(
			'captcha_factory.php',
			'captcha_gd.php',
			'captcha_gd_wave.php',
			'captcha_non_gd.php',
		),
		'includes/captcha/plugins/' => array(
			'captcha_abstract.php',
			'phpbb_captcha_gd_plugin.php',
			'phpbb_captcha_gd_wave_plugin.php',
			'phpbb_captcha_nogd_plugin.php',
			'phpbb_captcha_qa_plugin.php',
			'phpbb_recaptcha_plugin.php',
		),
		'includes/db/' => array(
			'db_tools.php',
			'dbal.php',
			'firebird.php',
			'mssql.php',
			'mssql_odbc.php',
			'mysql.php',
			'mysqli.php',
			'oracle.php',
			'postgres.php',
			'sqlite.php',
		),
		'includes/diff/' => array(
			'diff.php',
			'engine.php',
			'renderer.php',
		),
		'includes/hooks/' => array(
			'index.php',
		),
		'includes/mcp/info/' => array(
			'mcp_ban.php',
			'mcp_logs.php',
			'mcp_main.php',
			'mcp_notes.php',
			'mcp_pm_reports.php',
			'mcp_queue.php',
			'mcp_reports.php',
			'mcp_warn.php',
		),
		'includes/mcp/' => array(
			'mcp_ban.php',
			'mcp_forum.php',
			'mcp_front.php',
			'mcp_logs.php',
			'mcp_main.php',
			'mcp_notes.php',
			'mcp_pm_reports.php',
			'mcp_post.php',
			'mcp_queue.php',
			'mcp_reports.php',
			'mcp_topic.php',
			'mcp_warn.php',
		),
		'includes/questionnaire/' => array(
			'questionnaire.php',
		),
		'includes/search/' => array(
			'fulltext_mysql.php',
			'fulltext_native.php',
			'search.php',
		),
		'includes/ucp/info/' => array(
			'ucp_attachments.php',
			'ucp_groups.php',
			'ucp_main.php',
			'ucp_pm.php',
			'ucp_prefs.php',
			'ucp_profile.php',
			'ucp_zebra.php',
		),
		'includes/ucp/' => array(
			'ucp_activate.php',
			'ucp_attachments.php',
			'ucp_confirm.php',
			'ucp_groups.php',
			'ucp_main.php',
			'ucp_pm.php',
			'ucp_pm_compose.php',
			'ucp_pm_options.php',
			'ucp_pm_viewfolder.php',
			'ucp_pm_viewmessage.php',
			'ucp_prefs.php',
			'ucp_profile.php',
			'ucp_register.php',
			'ucp_remind.php',
			'ucp_resend.php',
			'ucp_zebra.php',
		),
		'includes/utf/data/' => array(
			'case_fold_c.php',
			'case_fold_f.php',
			'case_fold_s.php',
			'confusables.php',
			'recode_basic.php',
			'recode_cjk.php',
			'search_indexer_0.php',
			'search_indexer_1.php',
			'search_indexer_19.php',
			'search_indexer_2.php',
			'search_indexer_20.php',
			'search_indexer_21.php',
			'search_indexer_26.php',
			'search_indexer_3.php',
			'search_indexer_31.php',
			'search_indexer_32.php',
			'search_indexer_33.php',
			'search_indexer_36.php',
			'search_indexer_4.php',
			'search_indexer_448.php',
			'search_indexer_5.php',
			'search_indexer_58.php',
			'search_indexer_6.php',
			'search_indexer_64.php',
			'search_indexer_84.php',
			'search_indexer_9.php',
			'search_indexer_95.php',
			'utf_canonical_comp.php',
			'utf_canonical_decomp.php',
			'utf_compatibility_decomp.php',
			'utf_nfc_qc.php',
			'utf_nfkc_qc.php',
			'utf_normalizer_common.php',
		),
		'includes/utf/' => array(
			'utf_normalizer.php',
			'utf_tools.php',
		),
		'language/en/acp/' => array(
			'attachments.php',
			'ban.php',
			'board.php',
			'bots.php',
			'common.php',
			'database.php',
			'email.php',
			'forums.php',
			'groups.php',
			'language.php',
			'modules.php',
			'permissions.php',
			'permissions_phpbb.php',
			'posting.php',
			'profile.php',
			'prune.php',
			'search.php',
			'styles.php',
			'users.php',
		),
		'language/en/' => array(
			'captcha_qa.php',
			'captcha_recaptcha.php',
			'common.php',
			'groups.php',
			'help_bbcode.php',
			'help_faq.php',
			'install.php',
			'mcp.php',
			'memberlist.php',
			'posting.php',
			'search.php',
			'search_ignore_words.php',
			'search_synonyms.php',
			'ucp.php',
			'viewforum.php',
			'viewtopic.php',
		),

		// By default also sniff all the STK files
		'stk/' => array(
			'common.php',
			'index.php',
		),
		'stk/includes/' => array(
			'critical_repair.php',
			'functions.php',
			'plugin.php',
			'umil.php',
		),
		'stk/includes/database_cleaner/data/' => array(
			'3_0_0.php',
			'3_0_1.php',
			'3_0_2.php',
			'3_0_3.php',
			'3_0_4.php',
			'3_0_5.php',
			'3_0_6.php',
			'3_0_7.php',
			'3_0_7_pl1.php',
			'3_0_8_RC1.php',
		),
		'stk/includes/database_cleaner/' => array(
			'database_cleaner_controller.php',
			'database_cleaner_data.php',
			'database_cleaner_views.php',
			'functions_database_cleaner.php',
		),
		'stk/language/en/' => array(
			'common.php',
		),
		'stk/language/en/tools/admin/' => array(
			'profile_list.php',
			'purge_cache.php',
			'reparse_bbcode.php',
			'sql_query.php',
		),
		'stk/language/en/tools/support/' => array(
			'auto_cookies.php',
			'database_cleaner.php',
			'fix_left_right_ids.php',
			'readd_module_management.php',
			'recache_moderators.php',
			'reclean_usernames.php',
			'remove_duplicate_permissions.php',
			'reset_styles.php',
			'sanitise_anonymous_user.php',
			'update_email_hashes.php',
		),
		'stk/language/en/tools/' => array(
			'tutorial.php',
		),
		'stk/language/en/tools/usergroup/' => array(
			'add_user.php',
			'change_password.php',
			'manage_founders.php',
			'merge_users.php',
			'restore_deleted_users.php',
			'resync_newly_registered.php',
		),
		'stk/tools/admin/' => array(
			'profile_list.php',
			'purge_cache.php',
			'reparse_bbcode.php',
			'sql_query.php',
		),
		'stk/tools/support/' => array(
			'auto_cookies.php',
			'database_cleaner.php',
			'fix_left_right_ids.php',
			'readd_module_management.php',
			'recache_moderators.php',
			'reclean_usernames.php',
			'remove_duplicate_permissions.php',
			'reset_styles.php',
			'sanitise_anonymous_user.php',
			'update_email_hashes.php',
		),
		'stk/tools/' => array(
			'tutorial.php',
		),
		'stk/tools/usergroup/' => array(
			'add_user.php',
			'change_password.php',
			'manage_founders.php',
			'merge_users.php',
			'restore_deleted_users.php',
			'resync_newly_registered.php',
		),
	);

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
			// Directory can be checked?
			if (!$stk_config['bom_sniffer_force_full_scan'] && !array_key_exists($directory, $this->whitelist))
			{
				continue;
			}
			// As the install dir can be renamed, we need to check here whether this
			// is an install directory
			else if(in_array('convert_phpbb20.' . PHP_EXT, $files) || in_array('new_normalizer.' . PHP_EXT, $files) || in_array('database_update.' . PHP_EXT, $files))
			{
				// It is, skip it
				continue;
			}

			// Step into the files
			if (is_array($files))
			{
				foreach ($files as $file)
				{
					// Test this file against the whitelist
					if (!$stk_config['bom_sniffer_force_full_scan'] && !in_array($file, $this->whitelist[$directory]))
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

			default :
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