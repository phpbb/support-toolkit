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
* @note: the backup feature currently only crates a backup of the posts that are
* 		 being reparsed. There is not yet an interface to restore it!
*/
class reparse_bbcode
{
	/**
	* The parser object
	*/
	var $message_parser = null;

	/**
	* Variable to store poll data
	*/
	var $poll = array();

	/**
	* Contains the post that is currently re-parsed
	*/
	var $post = array();

	/**
	* Post config options
	*/
	var $post_flags = array(
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
	var $step_size = 500;

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
		return 'REPARSE_BBCODE';
	}

	/**
	* Run the tool
	*/
	function run_tool()
	{
		global $config, $db, $user;

		// Prevent some errors from missing language strings.
		$user->add_lang('posting');

		// Define some vars that we'll need
		$step	= request_var('step', 0);
		$start	= ($step - 1) * $this->step_size;
		$cnt	= 0;

		// The message parser
		if (!class_exists('parse_message'))
		{
			global $phpbb_root_path, $phpEx; // required!
			include PHPBB_ROOT_PATH . 'includes/message_parser.' . PHP_EXT;
		}

		// Posting helper functions
		if (!function_exists('submit_post'))
		{
			include PHPBB_ROOT_PATH . 'includes/functions_posting.' . PHP_EXT;
		}

		// First step? Prepare the backup
		if ($step == 0)
		{
			$this->_prepare_backup();
			$this->_next_step($step);
		}

		// Greb our batch
		$sql_ary = array(
			'SELECT'	=> 'f.*, p.*, t.*',
			'FROM'		=> array(
				FORUMS_TABLE	=> 'f',
				POSTS_TABLE		=> 'p',
				TOPICS_TABLE	=> 't',
			),
			'WHERE'		=> "p.bbcode_bitfield != '' AND t.topic_id = p.topic_id AND f.forum_id = t.forum_id",
		);
		$sql	= $db->sql_build_query('SELECT', $sql_ary);
		$result	= $db->sql_query_limit($sql, $this->step_size, $start);
		$batch	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		// No batch?
		if (!$batch)
		{
			// Done!
			trigger_error($user->lang['REPARSE_BBCODE_COMPLETE']);
		}

		// Walk through the batch
		foreach ($batch as $this->post)
		{
			// Update the post flags
			$this->post_flags['enable_bbcode']		= ($config['allow_bbcode']) ? $this->post['enable_bbcode'] : false;
			$this->post_flags['enable_magic_url']	= ($config['allow_post_links']) ? $this->post['enable_magic_url'] : false;
			$this->post_flags['enable_smilies']		= ($this->post['enable_smilies']) ? true : false;
			$this->post_flags['img_status']			= ($config['allow_bbcode']) ? true : false;
			$this->post_flags['flash_status']		= ($config['allow_bbcode'] && $config['allow_post_flash']) ? true : false;
			$this->post_flags['enable_urls']		= ($config['allow_post_links']) ? true : false;

			// Setup the message parser
			$this->message_parser = new parse_message($this->post['post_text']);
			unset($this->post['post_text']);

			// Post has a poll?
			if ($this->post['poll_title'] && $this->post['post_id'] == $this->post['topic_first_post_id'])
			{
				$this->_reparse_poll();
			}

			// Reparse the actual pst
			$post_data = array();
			$this->_reparse_post($post_data);

			// Now its time to submit the post
			submit_post('edit', $this->post['post_subject'], $this->post['post_username'], $this->post['topic_type'], $this->poll, $post_data, true, true);

			// Unset some vars for the next round
			$this->message_parser = null;
			$this->poll = array();
			array_fill_keys(array_keys($this->post_flags), false);
		}

		// Next step
		$this->_next_step($step);
	}

	/**
	* Move the tool to the next step
	* @param Integer $step The current step
	*/
	function _next_step($step)
	{
		global $template, $user;

		meta_refresh(3, append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, array('c' => 'admin', 't' => 'reparse_bbcode', 'step' => ++$step, 'submit' => 1)));
		$template->assign_var('U_BACK_TOOL', false);

		trigger_error($user->lang('REPARSE_BBCODE_PROGRESS', ($step - 1), $step));
	}

	/**
	* This function will reparse all poll data
	*/
	function _reparse_poll()
	{
		global $db;

		// Setup the poll parser
		$poll_parser = new parse_message($this->post['poll_title']);
		$poll_parser->bbcode_uid		= $this->message_parser->bbcode_uid;
		$poll_parser->bbcode_bitfield	= $this->message_parser->bbcode_bitfield;

		// Clean the poll title
		$this->_clean_message($poll_parser);

		// Parse the title
		$poll_parser->parse($this->post_flags['enable_bbcode'], $this->post_flags['enable_magic_url'], $this->post_flags['enable_smilies'], $this->post_flags['img_status'], $this->post_flags['flash_status'], true, $this->post_flags['enable_urls']);
		// tmp var
		$poll_title = $poll_parser->message;;

		// Fetch the options
		$poll_options = array();
		$sql	= 'SELECT poll_option_id, poll_option_text
			FROM ' . POLL_OPTIONS_TABLE . '
			WHERE topic_id = ' . $this->post['topic_id'];
		$result = $db->sql_query($sql);
		while ($option = $db->sql_fetchrow($result))
		{
			$poll_parser->message = $option['poll_option_text'];
			$this->_clean_message($poll_parser);
			$poll_options[$option['poll_option_id']] = $poll_parser->message;
		}
		$db->sql_freeresult($result);

		// Fill the poll array
		$this->poll = array(
			'poll_title'		=> $poll_title,
			'poll_length'		=> $this->post['poll_length'],
			'poll_max_options'	=> $this->post['poll_max_options'],
			'poll_option_text'	=> implode("\n", $poll_options),
			'poll_start'		=> $this->post['poll_start'],
			'poll_last_vote'	=> $this->post['poll_last_vote'],
			'poll_vote_change'	=> $this->post['poll_vote_change'],
			'enable_bbcode'		=> $this->post_flags['enable_bbcode'],
			'enable_urls'		=> $this->post_flags['enable_urls'],
			'enable_smilies'	=> $this->post_flags['enable_smilies'],
			'img_status'		=> $this->post_flags['img_status'],
		);

		// Parse the poll
		$poll_parser->parse_poll($this->poll);
	}

	function _reparse_post(&$post_data)
	{
		global $user;

		// Clean it
		$this->_clean_message($this->message_parser);

		// Re-parse it
		$this->message_parser->parse($this->post_flags['enable_bbcode'], $this->post_flags['enable_magic_url'], $this->post_flags['enable_smilies'], $this->post_flags['img_status'], $this->post_flags['flash_status'], true, $this->post_flags['enable_urls']);

		// Update the post data
		$post_data = array_merge($this->post, $this->post_flags, array(
			'message'			=> $this->message_parser->message,
			'message_md5'		=> md5($this->message_parser->message),
			'bbcode_bitfield'	=> $this->message_parser->bbcode_bitfield,
			'bbcode_uid'		=> $this->message_parser->bbcode_uid,
		));

		// Make sure some required vars are set
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
	* This method will return the given message into its state as it would have
	* been just *after* request_var.
	* It expects the parse_message object related to this post but the object
	* should only be filled, no changes should be made before this call
	* @param Object $parser the parser object
	*/
	function _clean_message($parser)
	{
		// Format the content as if it where *INSIDE* the posting field.
		call_user_func(array($parser, 'decode_message'), $this->post['bbcode_uid']); //Do not change to: $parser->decode_message($this->post['bbcode_uid']);, for some reason doesn't work :/
		$message = &$parser->message;	// tmp copy
		$message = $this->_html_entity_decode_utf8($message);

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

	// php.net, laurynas dot butkus at gmail dot com, http://us.php.net/manual/en/function.html-entity-decode.php#75153
	function _html_entity_decode_utf8($string)
	{
		static $trans_tbl;

		// replace numeric entities
		$string = preg_replace('~&#x([0-9a-f]+);~ei', '$this->_code2utf8(hexdec("\\1"))', $string);
	    $string = preg_replace('~&#([0-9]+);~e', '$this->_code2utf8(\\1)', $string);

		// replace literal entities
	    if (!isset($trans_tbl))
		{
			$trans_tbl = array();

	        foreach (get_html_translation_table(HTML_ENTITIES) as $val => $key)
			{
		        $trans_tbl[$key] = utf8_encode($val);
			}
		}

	    return strtr($string, $trans_tbl);
	}

	// Returns the utf string corresponding to the unicode value (from php.net, courtesy - romans@void.lv)
	function _code2utf8($num)
	{
		$return = '';

		if ($num < 128)
		{
			$return = chr($num);
		}
		else if ($num < 2048)
		{
			$return = chr(($num >> 6) + 192) . chr(($num & 63) + 128);
		}
		else if ($num < 65536)
		{
			$return = chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
		}
		else if ($num < 2097152)
		{
			$return = chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
		}

		return $return;
	}
}
?>