<?php
/**
 *
 * @package Support Toolkit - Flash Checker
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
 * A tool that checks the database for vulnerable
 * flash BBCodes.
 * This tool is requested by the dev team to resolve an flash bbcode issue that
 * was fixed in phpBB 3.0.8.
 * @author phpBB development team
 */
class flash_checker
{
	/**
	 * Vulnerable
	 * @var array
	 */
	var $_vulnerable = array();

	/**
	 * Display options
	 * @return string
	 */
	function display_options()
	{
		return 'FLASH_CHECKER';
	}

	/**
	 * Run the checks
	 */
	function run_tool()
	{
		$this->check_table_flash_bbcodes(POSTS_TABLE, 'post_id', 'post_text', 'bbcode_uid', 'bbcode_bitfield');
		$this->check_table_flash_bbcodes(PRIVMSGS_TABLE, 'msg_id', 'message_text', 'bbcode_uid', 'bbcode_bitfield');
		$this->check_table_flash_bbcodes(USERS_TABLE, 'user_id', 'user_sig', 'user_sig_bbcode_uid', 'user_sig_bbcode_bitfield');
// Not checked atm
//		check_table_flash_bbcodes(FORUMS_TABLE, 'forum_id', 'forum_desc', 'forum_desc_uid', 'forum_desc_bitfield');
//		check_table_flash_bbcodes(FORUMS_TABLE, 'forum_id', 'forum_rules', 'forum_rules_uid', 'forum_rules_bitfield');
//		check_table_flash_bbcodes(GROUPS_TABLE, 'group_id', 'group_desc', 'group_desc_uid', 'group_desc_bitfield');

		// Nothing found
		if (empty($this->_vulnerable))
		{
			trigger_error('FLASH_CHECKER_NO_FOUND');
		}

		// Here we'll create the cache files the reparse BBCode tool expects so
		// the tool can be run straight away
		global $cache;

		if (!empty($this->_vulnerable[POSTS_TABLE]))
		{
			$cache->put('_stk_reparse_posts', implode(',', $this->_vulnerable[POSTS_TABLE]));
		}

		if (!empty($this->_vulnerable[PRIVMSGS_TABLE]))
		{
			$cache->put('_stk_reparse_pms', implode(',', $this->_vulnerable[PRIVMSGS_TABLE]));
		}
		trigger_error(user_lang('FLASH_CHECKER_FOUND', append_sid(STK_INDEX, array('c' => 'admin', 't' => 'reparse_bbcode', 'submit' => true))));
	}

	function check_table_flash_bbcodes($table_name, $id_field, $content_field, $uid_field, $bitfield_field)
	{
		$ids = $this->get_table_flash_bbcode_pkids($table_name, $id_field, $content_field, $uid_field, $bitfield_field);

		if (sizeof($ids))
		{
			$this->_vulnerable[$table_name] = $ids;
		}
	}

	function get_table_flash_bbcode_pkids($table_name, $id_field, $content_field, $uid_field, $bitfield_field)
	{
		global $db;

		$ids = array();

		$sql = "SELECT $id_field, $content_field, $uid_field, $bitfield_field
			FROM $table_name
			WHERE $content_field LIKE '%[/flash:%'
				AND $bitfield_field <> ''";

		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$uid = $row[$uid_field];

			// thanks support toolkit
			$content = html_entity_decode_utf8($row[$content_field]);
			set_var($content, $content, 'string', true);
			$content = utf8_normalize_nfc($content);

			$bitfield_data = $row[$bitfield_field];

			if (!$this->is_valid_flash_bbcode($content, $uid) && $this->has_flash_enabled($bitfield_data))
			{
				$ids[] = (int) $row[$id_field];
			}
		}

		$db->sql_freeresult($result);

		return $ids;
	}

	function get_flash_regex($uid)
	{
		return "#\[flash=([0-9]+),([0-9]+):$uid\](.*?)\[/flash:$uid\]#";
	}

	// extract all valid flash bbcodes
	// check if the bbcode content is a valid URL for each match
	function is_valid_flash_bbcode($cleaned_content, $uid)
	{
		$regex = $this->get_flash_regex($uid);

		$url_regex = get_preg_expression('url');
		$www_url_regex = get_preg_expression('www_url');

		if (preg_match_all($regex, $cleaned_content, $matches))
		{
			foreach ($matches[3] as $flash_url)
			{
				if (!preg_match("#^($url_regex|$www_url_regex)$#i", $flash_url))
				{
					return false;
				}
			}
		}

		return true;
	}

	// check if a bitfield includes flash
	// 11 = flash bit
	function has_flash_enabled($bitfield_data)
	{
		$bitfield = new bitfield($bitfield_data);
		return $bitfield->get(11);
	}
}
