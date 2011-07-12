<?php
/**
*
* @package Support Toolkit - Reparse BBCode
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

/**
* Allow our end user to define whether we decode htmlspecialchars. Doing so
* *will* transform entities that where posted as one (&#156;) to their
* representing character. But this will fix broken htmlentities (&amp;#156;).
* By default we won't run it, but at least give the user this option :)
*/
define('RUN_HTMLSPECIALCHARS_DECODE', false);

/**@#+
* The bbcode reparse types
*/
define('BBCODE_REPARSE_POSTS', 0);
define('BBCODE_REPARSE_PMS', 1);
define('BBCODE_REPARSE_SIGS', 2);
/**@#-*/

/**
* @note: the backup feature currently only crates a backup of the posts that are
* 		 being reparsed. There is not yet an interface to restore it!
*/
class reparse_bbcode
{
	/**
	* The message parser object
	*/
	var $message_parser = null;

	/**
	* The poll parser object
	*/
	var $poll_parser = null;

	/**
	* Variable to store poll data
	*/
	var $poll = array();

	/**
	* Contains the entry that is currently being reparsed
	*/
	var $data = array();

	/**
	 * The total number of posts when the "reparseall" flag is set
	 * @var integer
	 */
	var $max = 0;

	/**
	* BBCode options
	*/
	var $flags = array(
		'enable_bbcode'		=> false,
		'enable_magic_url'	=> false,
		'enable_smilies'	=> false,
		'img_status'		=> false,
		'flash_status'		=> false,
		'enable_urls'		=> false,
	);

	/**
	* Number of posts to be parsed per run
	*/
	var $step_size = 150;

	/**
	* The name of the table that we use to backup posts before running
	* this tool
	*/
	var $_backup_table_name = 'stk_reparse_bbcode_backup';

	/**
	* The schema of the backup table
	*/
	var $_backup_table_schema = array(
		'COLUMNS'		=> array(
			'post_id'			=> array('UINT', 0),
			'forum_id'			=> array('UINT', 0),
			'post_subject'		=> array('VCHAR', ''),
			'post_subject'		=> array('STEXT_UNI', '', 'true_sort'),
			'post_text'			=> array('MTEXT_UNI', ''),
			'post_checksum'		=> array('VCHAR:32', ''),
			'bbcode_bitfield'	=> array('VCHAR:255', ''),
			'bbcode_uid'		=> array('VCHAR:8', ''),
		),
		'KEYS'			=> array(
			'post_id'			=> array('INDEX', 'post_id'),
			'forum_id'			=> array('INDEX', 'forum_id'),
		),
	);

	/**
	* Tool overview page
	*/
	function display_options()
	{
		return array(
			'title'	=> 'REPARSE_BBCODE',
			'vars'	=> array(
				'legend1'			=> 'REPARSE_BBCODE',
				'reparseids'		=> array('lang'	=> 'REPARSE_POST_IDS', 'type' => 'textarea:3:255', 'explain' => 'true'),
				'reparsepms'		=> array('lang' => 'REPARSE_PM_IDS', 'type' => 'textarea:3:255', 'explain' => 'true'),
				'reparseall'		=> array('lang' => 'REPARSE_ALL', 'type' => 'checkbox', 'explain' => true),
			),
		);
	}

	/**
	* Run the tool
	*/
	function run_tool()
	{
		global $cache, $config, $db, $user;
		// Prevent some errors from missing language strings.
		$user->add_lang('posting');

		// Define some vars that we'll need
		$last_batch			= false;
		$reparse_id 		= request_var('reparseids', '');
		$reparse_pm_id		= request_var('reparsepms', '');
		$mode				= request_var('mode', BBCODE_REPARSE_POSTS);
		$step				= request_var('step', 0);
		$start				= $step * $this->step_size;
		$cnt				= 0;

		// If post IDs or PM IDs were specified, we need to make sure the list is valid.
		$reparse_posts = array();
		$reparse_pms = array();
		
		if (!empty($reparse_id))
		{
			$reparse_posts = explode(',', $reparse_id);
			
			if (!sizeof($reparse_posts))
			{
				trigger_error('REPARSE_IDS_INVALID');
			}
			
			// Make sure there's no extra whitespace
			array_walk($reparse_posts, array($this, '_trim_post_ids'));
			
			$cache->put('_stk_reparse_posts', $reparse_posts);
		}
		else if ($mode == BBCODE_REPARSE_POSTS)
		{
			if (($result = $cache->get('_stk_reparse_posts')) !== false)
			{
				$reparse_posts = $result;
			}
		}
		
		if (!empty($reparse_pm_id))
		{
			$reparse_pms = explode(',', $reparse_pm_id);
			
			if (!sizeof($reparse_pms))
			{
				trigger_error('REPARSE_IDS_INVALID');
			}
			
			// Again, make sure the format is okay
			array_walk($reparse_pms, array($this, '_trim_post_ids'));
			
			$cache->put('_stk_reparse_pms', $reparse_pms);
		}
		else if ($mode == BBCODE_REPARSE_PMS)
		{
			if (($result = $cache->get('_stk_reparse_pms')) !== false)
			{
				$reparse_pms = $result;
			}
		}
		
		// The message parser
		if (!class_exists('parse_message'))
		{
			global $phpbb_root_path, $phpEx; // required!
			include PHPBB_ROOT_PATH . 'includes/message_parser.' . PHP_EXT;
		}

		// Posting helper functions
		if ($mode == BBCODE_REPARSE_POSTS && !function_exists('submit_post'))
		{
			include PHPBB_ROOT_PATH . 'includes/functions_posting.' . PHP_EXT;
		}

		// PM helper function
		if ($mode == BBCODE_REPARSE_PMS && !function_exists('submit_pm'))
		{
			include PHPBB_ROOT_PATH . 'includes/functions_privmsgs.' . PHP_EXT;
		}

		// First step? Prepare the backup
		// For now disabled. Have to see how to implement this with regards to sigs and pms
//		if ($step == 0)
//		{
//			$this->_prepare_backup();
//			$this->_next_step($step);
//		}

		// Greb our batch
		$bitfield = (empty($_REQUEST['reparseall'])) ? true : false;

		// The MSSQL DBMS doesn't break correctly out of the loop
		// when it is finished reparsing the last post. Therefore
		// we'll have to find out manually whether the tool is
		// finished, and if not how many objects it can select
		// if ($this->step_size * $step > 'maxrows')
		// #62822

		// First the easiest, the user selected certain posts/pms
		if (!empty($reparse_posts) || !empty($reparse_pms))
		{
			$this->step_size = (!empty($reparse_posts)) ? sizeof($reparse_posts) : sizeof($reparse_pms);

			// This is always done in one go
			$last_batch = true;
		}
		else
		{
			// Get the total
			$this->max = request_var('rowsmax', 0);
			if ($this->max == 0)
			{
				switch ($mode)
				{
					case BBCODE_REPARSE_POSTS :
						$ccol = 'post_id';
						$ctab = POSTS_TABLE;
						$bbf  = 'bbcode_bitfield';
					break;

					case BBCODE_REPARSE_PMS:
						$ccol = 'msg_id';
						$ctab = PRIVMSGS_TABLE;
						$bbf  = 'bbcode_bitfield';
					break;

					case BBCODE_REPARSE_SIGS:
						$ccol = 'user_id';
						$ctab = USERS_TABLE;
						$bbf  = 'user_sig_bbcode_bitfield';
					break;
				}

				$sql_where = ($bitfield === false) ? '' : "WHERE {$bbf} <> ''";

				$sql = "SELECT COUNT({$ccol}) AS cnt
					FROM {$ctab}
					{$sql_where}";
				$result		= $db->sql_query($sql);
				$this->max	= $db->sql_fetchfield('cnt', false, $result);
				$db->sql_freeresult($result);
			}

			// Change step_size if needed
			if ($start + $this->step_size > $this->max)
			{
				$this->step_size = $this->max - $start;

				// Make sure that the loop is finished
				$last_batch = true;
			}
		}

		switch ($mode)
		{
			case BBCODE_REPARSE_POSTS :
				$sql_ary = array(
					'SELECT'	=> 'f.forum_id, f.enable_indexing,
									p.post_id, p.poster_id, p.icon_id, p.post_text, p.post_subject, p.post_username, p.post_time, p.post_edit_reason, p.bbcode_uid, p.enable_sig, p.post_edit_locked, p.enable_bbcode, p.enable_magic_url, p.enable_smilies, p.post_attachment, 
									t.topic_id, t.topic_replies, t.topic_replies_real, t.topic_first_post_id, t.topic_last_post_id, t.topic_type, t.topic_status, t.topic_title, t.poll_title, t.topic_time_limit, t.poll_start, t.poll_length, t.poll_max_options, t.poll_last_vote, t.poll_vote_change,
									u.username',
					'FROM'		=> array(
						FORUMS_TABLE	=> 'f',
						POSTS_TABLE		=> 'p',
						TOPICS_TABLE	=> 't',
						USERS_TABLE		=> 'u',
					),
					'WHERE'		=> (($bitfield) ? "p.bbcode_bitfield <> '' AND " : '') . 't.topic_id = p.topic_id AND u.user_id = p.poster_id AND f.forum_id = t.forum_id' . (sizeof($reparse_posts) ? ' AND ' . $db->sql_in_set('p.post_id', $reparse_posts) : ''),
				);
			break;

			case BBCODE_REPARSE_PMS :
				$sql_ary = array(
					'SELECT'	=> 'pm.*, u.username AS author_name',
					'FROM'		=> array(
						PRIVMSGS_TABLE	=> 'pm',
						USERS_TABLE		=> 'u',
					),
					'WHERE'		=> (($bitfield) ? "pm.bbcode_bitfield <> '' AND " : '') . 'u.user_id = pm.author_id' . (sizeof($reparse_pms) ? ' AND ' . $db->sql_in_set('pm.msg_id', $reparse_pms) : ''),
				);
			break;

			case BBCODE_REPARSE_SIGS :
				$sql_ary = array(
					'SELECT'	=> 'u.*',
					'FROM'		=> array(
						USERS_TABLE	=> 'u',
					),
					'WHERE'		=> ($bitfield) ? "u.user_sig_bbcode_bitfield <> ''" : '',
				);
			break;
		}
		$sql	= $db->sql_build_query('SELECT', $sql_ary);
		$result	= $db->sql_query_limit($sql, $this->step_size, $start);
		$batch	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		// Backup
		// For now disabled. Have to see how to implement this with regards to sigs and pms
//		$this->_backup($batch);

		// User object used to store a second user object used when parsing signatures. (#62451)
		$_user2 = new user();

		// Walk through the batch
		foreach ($batch as $this->data)
		{
			// The flags for signatures are hidden inside the user options.
			if ($mode == BBCODE_REPARSE_SIGS)
			{
				// Set the options
				$this->data['enable_bbcode']	= $_user2->optionget('sig_bbcode', $this->data['user_options']);
				$this->data['enable_magic_url']	= $_user2->optionget('sig_links', $this->data['user_options']);
				$this->data['enable_smilies']	= $_user2->optionget('sig_smilies', $this->data['user_options']);
			}

			// Update the post flags
			$this->flags['enable_bbcode']		= ($config['allow_bbcode']) ? $this->data['enable_bbcode'] : false;
			$this->flags['enable_magic_url']	= ($config['allow_post_links']) ? $this->data['enable_magic_url'] : false;
			$this->flags['enable_smilies']		= ($this->data['enable_smilies']) ? true : false;
			$this->flags['img_status']			= ($config['allow_bbcode']) ? true : false;
			$this->flags['flash_status']		= ($config['allow_bbcode'] && $config['allow_post_flash']) ? true : false;
			$this->flags['enable_urls']			= ($config['allow_post_links']) ? true : false;

			// Reparse them!
			$pm_data = $post_data = $sig_data = array();
			switch ($mode)
			{
				case BBCODE_REPARSE_POSTS :
					// Setup the parser
					$this->message_parser = new parse_message($this->data['post_text']);
					unset($this->data['post_text']);

					// Reparse the post
					$this->_reparse_post($post_data);

					// Re-submit the post through API
					submit_post('edit', $this->data['post_subject'], $this->data['post_username'], $this->data['topic_type'], $this->poll, $post_data, true, true);
				break;

				case BBCODE_REPARSE_PMS :
					// Setup the parser
					$this->message_parser = new parse_message($this->data['message_text']);
					unset($this->data['post_text']);

					// Reparse the pm
					$this->_reparse_pm($pm_data);

					// Re-submit the pm through the API
					submit_pm('edit', $this->data['message_subject'], $pm_data, false);
				break;

				case BBCODE_REPARSE_SIGS :
					// SEtup the parser
					$this->message_parser = new parse_message($this->data['user_sig']);
					unset($this->data['user_sig']);

					// Reparse the sig
					$this->_reparse_sig($sig_data);

					// Insert back into the db
					$sql = 'UPDATE ' . USERS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sig_data) . '
						WHERE user_id = ' . (int) $this->data['user_id'];
					$db->sql_query($sql);
				break;
			}

			// Unset some vars so the next round starts clean
			$this->message_parser	= null;
			$this->poll_parser		= null;
			unset($this->poll, $post_data, $pm_data);
			$this->flags = array_fill_keys(array_keys($this->flags), false);
			$_user2->keyvalues		= array();
		}

		// Finished?
		if ($last_batch && $mode == BBCODE_REPARSE_SIGS)
		{
			// Done!
			$cache->destroy('_stk_reparse_posts');
			$cache->destroy('_stk_reparse_pms');
			trigger_error($user->lang['REPARSE_BBCODE_COMPLETE']);
		}
		else if ($last_batch)
		{
			// Move to the next type
			$this->_next_step(0, $mode, true);
		}

		// Next step
		$this->_next_step($step, $mode);
	}

	/**
	* Move the tool to the next step
	* @param Integer $step The current step
	* @param Integer $mode The current reparse mode
	* @param Boolean $next_mode Move to the next reparse type
	*/
	function _next_step($step, $mode, $next_mode = false)
	{
		global $template, $user;

		$_next_mode	= ($next_mode === false) ? $mode : ++$mode;
		$_next_step	= ($next_mode === false) ? ++$step : 0;
		$_rowsmax	= ($next_mode === false) ? $this->max : 0;

		// Create the redirect params
		$params = array(
			'c'			=> 'admin',
			't'			=> 'reparse_bbcode',
			'rowsmax'	=> $_rowsmax,
			'submit'	=> true,
			'mode'		=> $_next_mode,
			'step'		=> $_next_step,
			'reparseall'	=> (!empty($_REQUEST['reparseall'])) ? true : false,
		);

		meta_refresh(1, append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, $params));
		$template->assign_var('U_BACK_TOOL', false);

		if ($next_mode === false)
		{
			trigger_error(user_lang('REPARSE_BBCODE_PROGRESS', ($step - 1), $step));
		}
		else
		{
			trigger_error(user_lang('REPARSE_BBCODE_SWITCH_MODE', $mode));
		}
	}

	/**
	* This function will reparse all poll data
	*/
	function _reparse_poll()
	{
		global $db;

		// Setup the poll parser
		$this->poll_parser = new parse_message($this->data['poll_title']);
		$this->poll_parser->bbcode_uid = $this->message_parser->bbcode_uid;

		// Clean the poll title
		$this->_clean_message($this->poll_parser);

		// Parse the title
		$this->poll_parser->parse($this->flags['enable_bbcode'], $this->flags['enable_magic_url'], $this->flags['enable_smilies'], $this->flags['img_status'], $this->flags['flash_status'], true, $this->flags['enable_urls']);
		// tmp var
		$poll_title = $this->poll_parser->message;

		// Fetch the options
		$poll_options = array();
		$sql	= 'SELECT poll_option_id, poll_option_text
			FROM ' . POLL_OPTIONS_TABLE . '
			WHERE topic_id = ' . (int) $this->data['topic_id'] . '
				ORDER BY poll_option_id';
		$result = $db->sql_query($sql);
		while ($option = $db->sql_fetchrow($result))
		{
			$this->poll_parser->message = $option['poll_option_text'];
			$this->_clean_message($this->poll_parser);
			$poll_options[$option['poll_option_id']] = $this->poll_parser->message;
		}
		$db->sql_freeresult($result);

		// Fill the poll array
		$this->poll = array(
			'poll_title'		=> $poll_title,
			'poll_length'		=> $this->data['poll_length'] / 86400,
			'poll_max_options'	=> $this->data['poll_max_options'],
			'poll_option_text'	=> implode("\n", $poll_options),
			'poll_start'		=> $this->data['poll_start'],
			'poll_last_vote'	=> $this->data['poll_last_vote'],
			'poll_vote_change'	=> $this->data['poll_vote_change'],
			'enable_bbcode'		=> $this->flags['enable_bbcode'],
			'enable_urls'		=> $this->flags['enable_urls'],
			'enable_smilies'	=> $this->flags['enable_smilies'],
			'img_status'		=> $this->flags['img_status'],
		);

		// Parse the poll
		$this->poll_parser->parse_poll($this->poll);
	}

	/**
	* Reparse the current private message
	* @param Array &$pm_data Array that will be filled with the reparsed pm data
	*/
	function _reparse_pm(&$pm_data)
	{
		// Clean it
		$this->_clean_message($this->message_parser);

		// Reparse
		$this->message_parser->parse($this->flags['enable_bbcode'], $this->flags['enable_magic_url'], $this->flags['enable_smilies'], $this->flags['img_status'], $this->flags['flash_status'], true, $this->flags['enable_urls']);

		// Rebuild addresslist
		$this->data['address_list'] = rebuild_header(array('to' => $this->data['to_address'], 'bcc' => $this->data['bcc_address']));

		$pm_data = array(
			'msg_id'			=> $this->data['msg_id'],
			'from_user_id'		=> $this->data['author_id'],
			'from_user_ip'		=> $this->data['author_ip'],
			'from_username'		=> $this->data['author_name'],
			'icon_id'			=> $this->data['icon_id'],
			'enable_sig'		=> $this->data['enable_sig'],
			'enable_bbcode'		=> $this->flags['enable_bbcode'],
			'enable_urls'		=> $this->flags['enable_urls'],
			'enable_smilies'	=> $this->flags['enable_smilies'],
			'img_status'		=> $this->flags['img_status'],
			'bbcode_bitfield'	=> $this->message_parser->bbcode_bitfield,
			'bbcode_uid'		=> $this->message_parser->bbcode_uid,
			'message'			=> $this->message_parser->message,
			'attachment_data'	=> $this->message_parser->attachment_data,
			'filename_data'		=> $this->message_parser->filename_data,
			'address_list'		=> $this->data['address_list'],
		);
	}

	/**
	* Reparse the current post
	* @param Array $post_data All data related to this post. Will be updated by this
	* 						  method.
	*/
	function _reparse_post(&$post_data)
	{
		global $db, $user;

		// Some default variables that must be set
		static $uninit = array();
		if (empty($uninit))
		{
			$uninit = array(
				'post_attachment'	=> 0,
				'poster_id'			=> $user->data['user_id'],
				'enable_magic_url'	=> 0,
				'topic_status'		=> 0,
				'topic_type'		=> POST_NORMAL,
				'post_subject'		=> '',
				'topic_title'		=> '',
				'post_time'			=> 0,
				'post_edit_reason'	=> '',
				'notify'			=> 0,
				'notify_set'		=> 0,
			);
		}

		// Clean it
		$this->_clean_message($this->message_parser);

		// Attachments?
		if ($this->data['post_attachment'] == 1)
		{
			// Fetch the attachments for this post
			$sql = 'SELECT attach_id, is_orphan, attach_comment, real_filename
				FROM ' . ATTACHMENTS_TABLE . '
				WHERE post_msg_id = ' . (int) $this->data['post_id'] . '
					AND in_message = 0
					AND is_orphan = 0
				ORDER BY filetime DESC';
			$result = $db->sql_query($sql);
			$this->message_parser->attachment_data = $db->sql_fetchrowset($result);
			$db->sql_freeresult($result);
		}

		// Post has a poll?
		if ($this->data['poll_title'] && $this->data['post_id'] == $this->data['topic_first_post_id'])
		{
			$this->_reparse_poll();
		}

		// Re-parse it
		$this->message_parser->parse($this->flags['enable_bbcode'], $this->flags['enable_magic_url'], $this->flags['enable_smilies'], $this->flags['img_status'], $this->flags['flash_status'], true, $this->flags['enable_urls']);

		// Consider the bbcode_bitfield required for the poll
		if (!empty($this->poll_parser) && !empty($this->poll_parser->bbcode_bitfield))
		{
			$this->message_parser->bbcode_bitfield = base64_encode(base64_decode($this->poll_parser->bbcode_bitfield) | base64_decode($this->message_parser->bbcode_bitfield));
		}

		// Update the post data
		$post_data = array_merge($this->data, $this->flags, array(
			'bbcode_bitfield'	=> $this->message_parser->bbcode_bitfield,
			'bbcode_uid'		=> $this->message_parser->bbcode_uid,
			'message'			=> $this->message_parser->message,
			'message_md5'		=> md5($this->message_parser->message),
			'attachment_data'	=> $this->message_parser->attachment_data,
			'filename_data'		=> $this->message_parser->filename_data,
		));

		// Need to adjust topic_time_limit here. Per bug #61155
		$post_data['topic_time_limit'] = $post_data['topic_time_limit']/86400;

		// Make sure this data is set
		foreach ($uninit as $var_name => $default_value)
		{
			if (!isset($post_data[$var_name]))
			{
				$post_data[$var_name] = $default_value;
			}
		}
		unset($uninit);
	}

	/**
	* Reparse the next signature in the batch
	* @param Array $sig_data Array that will be filled with the reparsed data
	*/
	function _reparse_sig(&$sig_data)
	{
		// Change some entries in the data array
		$this->data['bbcode_uid'] = $this->data['user_sig_bbcode_uid'];

		// Clean the signature
		$this->_clean_message($this->message_parser);

		// Re-parse it
		$this->message_parser->parse($this->flags['enable_bbcode'], $this->flags['enable_magic_url'], $this->flags['enable_smilies'], $this->flags['img_status'], $this->flags['flash_status'], true, $this->flags['enable_urls']);

		// Build sig_data
		$sig_data = array(
			'user_sig'					=> $this->message_parser->message,
			'user_sig_bbcode_uid'		=> $this->message_parser->bbcode_uid,
			'user_sig_bbcode_bitfield'	=> $this->message_parser->bbcode_bitfield,
		);
	}

	/**
	* This method will return the given message into its state as it would have
	* been just *after* request_var.
	* It expects the parse_message object related to this post but the object
	* should only be filled, no changes should be made before this call
	* @param Object &$parser the parser object
	*/
	function _clean_message(&$parser)
	{
		// Format the content as if it where *INSIDE* the posting field.
		$parser->decode_message($this->data['bbcode_uid']);
		$message = &$parser->message;	// tmp copy
		if (defined('RUN_HTMLSPECIALCHARS_DECODE') && RUN_HTMLSPECIALCHARS_DECODE == true)
		{
			$message = htmlspecialchars_decode($message);
		}
		$message = html_entity_decode_utf8($message);

		// Now we'll *request_var* the post
		set_var($message, $message, 'string', true);
		$message = utf8_normalize_nfc($message);

		// Update the parser
		$parser->message = &$message;
		unset($message);
	}

	/**
	* Make sure that the backup table exists *AND* is empty
	*/
	function _prepare_backup()
	{
		global $db, $umil;

		// Table doesn't exists?
		if ($umil->table_exists($this->_backup_table_name) === false)
		{
			// Create it
			$umil->table_add($this->_backup_table_name, $this->_backup_table_schema);
		}

		// Empty the table
		$db->sql_query('DELETE FROM ' . $this->_backup_table_name);
	}

	/**
	* Backup the given post
	* @param Array $batch Batch of posts we are re-parsing this round
	*/
	function _backup($batch)
	{
		global $db;

		// Prepare data
		$data = array();

		foreach ($batch as $post)
		{
			$data[] = array(
				'post_id'			=> $post['post_id'],
				'forum_id'			=> $post['forum_id'],
				'post_subject'		=> $post['post_subject'],
				'post_text'			=> $post['post_text'],
				'post_checksum'		=> $post['post_checksum'],
				'bbcode_bitfield'	=> $post['bbcode_bitfield'],
				'bbcode_uid'		=> $post['bbcode_uid'],
			);
		}

		$db->sql_multi_insert($this->_backup_table_name, $data);
	}
	function _trim_post_ids(&$post_id, $key)
	{
		// This is difficult, no?
		$post_id = (int) trim($post_id);
	}
}
