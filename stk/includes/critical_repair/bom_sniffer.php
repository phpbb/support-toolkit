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
	* @var Array Messages that will be triggered by this tool
	* @access private
	*/
	var $messages = array(
		'bom_sniffer_writable'	=> 'The BOM sniffer requires %s to exist and to be writable!',
		'issue_found'	=> 'As part of the critical repair toolset of the Support Toolkit the STK has checked your phpBB files and determined that some of the files contain invalid content that potentially could stop the board from operating. The support Toolkit has tried to fix those issues and created a package with the updated files in the "store" directory of your board.<br /> Please <strong>move</strong> the files from the “store” directory to their correct location and load the Support Toolkit again. The toolkit will check these files again and will redirect you to the STK if no flaws are found.',
		'remove_dir'	=> "The Support Toolkit has tried to remove the repaired file storage directory of this tool but wasn't able to do so. In order for this tool to run correctly the '<c>%s</c>' must be removed from the server. Please remove this directory manually and release the Support Toolkit.",
		'store_write'	=> 'The BOM sniffer requires the <c>store</c> directory to exist and to be writable!',
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
			0	=> 'common.php',
			1	=> 'config.php',
			2	=> 'cron.php',
			3	=> 'faq.php',
			4	=> 'feed.php',
			5	=> 'index.php',
			6	=> 'mcp.php',
			7	=> 'memberlist.php',
			8	=> 'posting.php',
			9	=> 'report.php',
			10	=> 'search.php',
			11	=> 'style.php',
			12	=> 'ucp.php',
			13	=> 'viewforum.php',
			14	=> 'viewonline.php',
			15	=> 'viewtopic.php',
		),
		'adm/' => array(
			0	=> 'index.php',
			1	=> 'swatch.php',
		),
		'download/' => array(
			0	=> 'file.php',
		),
		'includes/acm/' => array(
			0	=> 'acm_apc.php',
			1	=> 'acm_eaccelerator.php',
			2	=> 'acm_file.php',
			3	=> 'acm_memcache.php',
			4	=> 'acm_memory.php',
			5	=> 'acm_null.php',
			6	=> 'acm_xcache.php',
		),
		'includes/acp/' => array(
			0	=> 'acp_attachments.php',
			1	=> 'acp_ban.php',
			2	=> 'acp_bbcodes.php',
			3	=> 'acp_board.php',
			4	=> 'acp_bots.php',
			5	=> 'acp_captcha.php',
			6	=> 'acp_database.php',
			7	=> 'acp_disallow.php',
			8	=> 'acp_email.php',
			9	=> 'acp_forums.php',
			10	=> 'acp_groups.php',
			11	=> 'acp_icons.php',
			12	=> 'acp_inactive.php',
			13	=> 'acp_jabber.php',
			14	=> 'acp_language.php',
			15	=> 'acp_logs.php',
			16	=> 'acp_main.php',
			17	=> 'acp_modules.php',
			18	=> 'acp_permission_roles.php',
			19	=> 'acp_permissions.php',
			20	=> 'acp_php_info.php',
			21	=> 'acp_profile.php',
			22	=> 'acp_prune.php',
			23	=> 'acp_ranks.php',
			24	=> 'acp_reasons.php',
			25	=> 'acp_search.php',
			26	=> 'acp_send_statistics.php',
			27	=> 'acp_styles.php',
			28	=> 'acp_update.php',
			29	=> 'acp_users.php',
			30	=> 'acp_words.php',
			31	=> 'auth.php',
		),
		'includes/acp/info/' => array(
			0	=> 'acp_attachments.php',
			1	=> 'acp_ban.php',
			2	=> 'acp_bbcodes.php',
			3	=> 'acp_board.php',
			4	=> 'acp_bots.php',
			5	=> 'acp_captcha.php',
			6	=> 'acp_database.php',
			7	=> 'acp_disallow.php',
			8	=> 'acp_email.php',
			9	=> 'acp_forums.php',
			10	=> 'acp_groups.php',
			11	=> 'acp_icons.php',
			12	=> 'acp_inactive.php',
			13	=> 'acp_jabber.php',
			14	=> 'acp_language.php',
			15	=> 'acp_logs.php',
			16	=> 'acp_main.php',
			17	=> 'acp_modules.php',
			18	=> 'acp_permission_roles.php',
			19	=> 'acp_permissions.php',
			20	=> 'acp_php_info.php',
			21	=> 'acp_profile.php',
			22	=> 'acp_prune.php',
			23	=> 'acp_ranks.php',
			24	=> 'acp_reasons.php',
			25	=> 'acp_search.php',
			26	=> 'acp_send_statistics.php',
			27	=> 'acp_styles.php',
			28	=> 'acp_update.php',
			29	=> 'acp_users.php',
			30	=> 'acp_words.php',
		),
		'includes/auth/' => array(
			0	=> 'auth_apache.php',
			1	=> 'auth_db.php',
			2	=> 'auth_ldap.php',
		),
		'includes/' => array(
			0	=> 'auth.php',
			1	=> 'bbcode.php',
			2	=> 'cache.php',
			3	=> 'constants.php',
			4	=> 'functions.php',
			5	=> 'functions_admin.php',
			6	=> 'functions_compress.php',
			7	=> 'functions_content.php',
			8	=> 'functions_convert.php',
			9	=> 'functions_display.php',
			10	=> 'functions_install.php',
			11	=> 'functions_jabber.php',
			12	=> 'functions_messenger.php',
			13	=> 'functions_module.php',
			14	=> 'functions_posting.php',
			15	=> 'functions_privmsgs.php',
			16	=> 'functions_profile_fields.php',
			17	=> 'functions_template.php',
			18	=> 'functions_transfer.php',
			19	=> 'functions_upload.php',
			20	=> 'functions_user.php',
			21	=> 'message_parser.php',
			22	=> 'session.php',
			23	=> 'template.php',
		),
		'includes/captcha/' => array(
			0	=> 'captcha_factory.php',
			1	=> 'captcha_gd.php',
			2	=> 'captcha_gd_wave.php',
			3	=> 'captcha_non_gd.php',
		),
		'includes/captcha/plugins/' => array(
			0	=> 'captcha_abstract.php',
			1	=> 'phpbb_captcha_gd_plugin.php',
			2	=> 'phpbb_captcha_gd_wave_plugin.php',
			3	=> 'phpbb_captcha_nogd_plugin.php',
			4	=> 'phpbb_captcha_qa_plugin.php',
			5	=> 'phpbb_recaptcha_plugin.php',
		),
		'includes/db/' => array(
			0	=> 'db_tools.php',
			1	=> 'dbal.php',
			2	=> 'firebird.php',
			3	=> 'mssql.php',
			4	=> 'mssql_odbc.php',
			5	=> 'mssqlnative.php',
			6	=> 'mysql.php',
			7	=> 'mysqli.php',
			8	=> 'oracle.php',
			9	=> 'postgres.php',
			10	=> 'sqlite.php',
		),
		'includes/diff/' => array(
			0	=> 'diff.php',
			1	=> 'engine.php',
			2	=> 'renderer.php',
		),
		'includes/hooks/' => array(
			0	=> 'index.php',
		),
		'includes/mcp/info/' => array(
			0	=> 'mcp_ban.php',
			1	=> 'mcp_logs.php',
			2	=> 'mcp_main.php',
			3	=> 'mcp_notes.php',
			4	=> 'mcp_pm_reports.php',
			5	=> 'mcp_queue.php',
			6	=> 'mcp_reports.php',
			7	=> 'mcp_warn.php',
		),
		'includes/mcp/' => array(
			0	=> 'mcp_ban.php',
			1	=> 'mcp_forum.php',
			2	=> 'mcp_front.php',
			3	=> 'mcp_logs.php',
			4	=> 'mcp_main.php',
			5	=> 'mcp_notes.php',
			6	=> 'mcp_pm_reports.php',
			7	=> 'mcp_post.php',
			8	=> 'mcp_queue.php',
			9	=> 'mcp_reports.php',
			10	=> 'mcp_topic.php',
			11	=> 'mcp_warn.php',
		),
		'includes/questionnaire/' => array(
			0	=> 'questionnaire.php',
		),
		'includes/search/' => array(
			0	=> 'fulltext_mysql.php',
			1	=> 'fulltext_native.php',
			2	=> 'search.php',
		),
		'includes/ucp/info/' => array(
			0	=> 'ucp_attachments.php',
			1	=> 'ucp_groups.php',
			2	=> 'ucp_main.php',
			3	=> 'ucp_pm.php',
			4	=> 'ucp_prefs.php',
			5	=> 'ucp_profile.php',
			6	=> 'ucp_zebra.php',
		),
		'includes/ucp/' => array(
			0	=> 'ucp_activate.php',
			1	=> 'ucp_attachments.php',
			2	=> 'ucp_confirm.php',
			3	=> 'ucp_groups.php',
			4	=> 'ucp_main.php',
			5	=> 'ucp_pm.php',
			6	=> 'ucp_pm_compose.php',
			7	=> 'ucp_pm_options.php',
			8	=> 'ucp_pm_viewfolder.php',
			9	=> 'ucp_pm_viewmessage.php',
			10	=> 'ucp_prefs.php',
			11	=> 'ucp_profile.php',
			12	=> 'ucp_register.php',
			13	=> 'ucp_remind.php',
			14	=> 'ucp_resend.php',
			15	=> 'ucp_zebra.php',
		),
		'includes/utf/data/' => array(
			0	=> 'case_fold_c.php',
			1	=> 'case_fold_f.php',
			2	=> 'case_fold_s.php',
			3	=> 'confusables.php',
			4	=> 'recode_basic.php',
			5	=> 'recode_cjk.php',
			6	=> 'search_indexer_0.php',
			7	=> 'search_indexer_1.php',
			8	=> 'search_indexer_19.php',
			9	=> 'search_indexer_2.php',
			10	=> 'search_indexer_20.php',
			11	=> 'search_indexer_21.php',
			12	=> 'search_indexer_26.php',
			13	=> 'search_indexer_3.php',
			14	=> 'search_indexer_31.php',
			15	=> 'search_indexer_32.php',
			16	=> 'search_indexer_33.php',
			17	=> 'search_indexer_36.php',
			18	=> 'search_indexer_4.php',
			19	=> 'search_indexer_448.php',
			20	=> 'search_indexer_5.php',
			21	=> 'search_indexer_58.php',
			22	=> 'search_indexer_6.php',
			23	=> 'search_indexer_64.php',
			24	=> 'search_indexer_84.php',
			25	=> 'search_indexer_9.php',
			26	=> 'search_indexer_95.php',
			27	=> 'utf_canonical_comp.php',
			28	=> 'utf_canonical_decomp.php',
			29	=> 'utf_compatibility_decomp.php',
			30	=> 'utf_nfc_qc.php',
			31	=> 'utf_nfkc_qc.php',
			32	=> 'utf_normalizer_common.php',
		),
		'includes/utf/' => array(
			0	=> 'utf_normalizer.php',
			1	=> 'utf_tools.php',
		),
		'language/en/acp/' => array(
			0	=> 'attachments.php',
			1	=> 'ban.php',
			2	=> 'board.php',
			3	=> 'bots.php',
			4	=> 'common.php',
			5	=> 'database.php',
			6	=> 'email.php',
			7	=> 'forums.php',
			8	=> 'groups.php',
			9	=> 'language.php',
			10	=> 'modules.php',
			11	=> 'permissions.php',
			12	=> 'permissions_phpbb.php',
			13	=> 'posting.php',
			14	=> 'profile.php',
			15	=> 'prune.php',
			16	=> 'search.php',
			17	=> 'styles.php',
			18	=> 'users.php',
		),
		'language/en/' => array(
			0	=> 'captcha_qa.php',
			1	=> 'captcha_recaptcha.php',
			2	=> 'common.php',
			3	=> 'groups.php',
			4	=> 'help_bbcode.php',
			5	=> 'help_faq.php',
			6	=> 'install.php',
			7	=> 'mcp.php',
			8	=> 'memberlist.php',
			9	=> 'posting.php',
			10	=> 'search.php',
			11	=> 'search_ignore_words.php',
			12	=> 'search_synonyms.php',
			13	=> 'ucp.php',
			14	=> 'viewforum.php',
			15	=> 'viewtopic.php',
		),
		'stk/includes/' => array(
			0	=> 'critical_repair.php',
			1	=> 'functions.php',
			2	=> 'plugin.php',
			3	=> 'umil.php',
		),
		'stk/includes/database_cleaner/data/' => array(
			0	=> '3_0_0.php',
			1	=> '3_0_1.php',
			2	=> '3_0_2.php',
			3	=> '3_0_3.php',
			4	=> '3_0_4.php',
			5	=> '3_0_5.php',
			6	=> '3_0_6.php',
			7	=> '3_0_7.php',
			8	=> '3_0_7_pl1.php',
			9	=> '3_0_8_dev.php',
		),
		'stk/includes/database_cleaner/' => array(
			0	=> 'database_cleaner_controller.php',
			1	=> 'database_cleaner_data.php',
			2	=> 'database_cleaner_views.php',
			3	=> 'functions_database_cleaner.php',
		),
		'stk/' => array(
			0	=> 'index.php',
		),
		'stk/language/en/' => array(
			0	=> 'common.php',
		),
		'stk/language/en/tools/admin/' => array(
			0	=> 'profile_list.php',
			1	=> 'purge_cache.php',
			2	=> 'reparse_bbcode.php',
			3	=> 'sql_query.php',
		),
		'stk/language/en/tools/support/' => array(
			0	=> 'auto_cookies.php',
			1	=> 'database_cleaner.php',
			2	=> 'fix_left_right_ids.php',
			3	=> 'readd_module_management.php',
			4	=> 'recache_moderators.php',
			5	=> 'reclean_usernames.php',
			6	=> 'remove_duplicate_permissions.php',
			7	=> 'reset_styles.php',
			8	=> 'sanitise_anonymous_user.php',
			9	=> 'update_email_hashes.php',
		),
		'stk/language/en/tools/' => array(
			0	=> 'tutorial.php',
		),
		'stk/language/en/tools/usergroup/' => array(
			0	=> 'add_user.php',
			1	=> 'change_password.php',
			2	=> 'manage_founders.php',
			3	=> 'merge_users.php',
			4	=> 'restore_deleted_users.php',
			5	=> 'resync_newly_registered.php',
		),
		'stk/tools/admin/' => array(
			0	=> 'profile_list.php',
			1	=> 'purge_cache.php',
			2	=> 'reparse_bbcode.php',
			3	=> 'sql_query.php',
		),
		'stk/tools/support/' => array(
			0	=> 'auto_cookies.php',
			1	=> 'database_cleaner.php',
			2	=> 'fix_left_right_ids.php',
			3	=> 'readd_module_management.php',
			4	=> 'recache_moderators.php',
			5	=> 'reclean_usernames.php',
			6	=> 'remove_duplicate_permissions.php',
			7	=> 'reset_styles.php',
			8	=> 'sanitise_anonymous_user.php',
			9	=> 'update_email_hashes.php',
		),
		'stk/tools/' => array(
			0	=> 'tutorial.php',
		),
		'stk/tools/usergroup/' => array(
			0	=> 'add_user.php',
			1	=> 'change_password.php',
			2	=> 'manage_founders.php',
			3	=> 'merge_users.php',
			4	=> 'restore_deleted_users.php',
			5	=> 'resync_newly_registered.php',
		),
	);

	/**
	* Constructor. Prep the tool
	*/
	function stk_bom_sniffer()
	{
		// "Store" must be writable
		if (@is_writable(PHPBB_ROOT_PATH . 'store') !== true)
		{
			$this->trigger_message($this->messages['store_write']);
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
					$this->trigger_message(sprintf($this->messages['remove_dir'], PHPBB_ROOT_PATH . 'store/bom_sniffer/'));
				}
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
		$filelist = filelist(PHPBB_ROOT_PATH, '', PHP_EXT);

		foreach ($filelist as $directory => $files)
		{
			// Directory can be checked?
			if (!array_key_exists($directory, $this->whitelist))
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
					if (!in_array($file, $this->whitelist[$directory]))
					{
						continue;
					}
					// File never checked or was changed after the last run
					else if (!isset($this->cache->cache_data[$directory. $file]) || filectime(PHPBB_ROOT_PATH . $directory . $file) != $this->cache->cache_data[$directory . $file])
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
			$this->trigger_message($this->messages['issue_found']);
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
	* Create a HTML page to display a given message. This is used when the BOM
	* sniffer triggers a notice.
	* @param String $messaage The message to display
	* @return void
	*/
	function trigger_message($message)
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
										<?php echo $message ?>
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