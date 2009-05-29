<?php
/**
*
* @package Support Tool Kit - Reparse BBCode
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class reparse_bbcode
{
	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['BBCODE_REPARSE_TITLE'],
			'NAME_EXPLAIN'	=> $user->lang['BBCODE_REPARSE_TITLE_EXPLAIN'],
		);
	}

	function display_options()
	{
		return 'BBCODE_REPARSE';
	}

	function run_tool()
	{
		global $user, $db, $config, $template;

		// Prevent some errors from missing language strings.
		$user->add_lang('posting');

		$step = request_var('step', 0);
		$limit = 1;
		$start = $step * $limit;
		$i = 0;

		if (!class_exists('parse_message'))
		{
			global $phpbb_root_path, $phpEx; // required!
			include(PHPBB_ROOT_PATH . "includes/message_parser." . PHP_EXT);
		}

		$bbcode_status	= ($config['allow_bbcode']) ? true : false;
		$img_status		= ($bbcode_status) ? true : false;
		$flash_status	= ($bbcode_status && $config['allow_post_flash']) ? true : false;

		$sql = 'SELECT * FROM ' . POSTS_TABLE . ' p, ' . TOPICS_TABLE . ' t
			WHERE t.topic_id = p.topic_id
			ORDER BY p.post_id ASC';
		$result = $db->sql_query_limit($sql, $limit, $start);

		while ($row = $db->sql_fetchrow($result))
		{
			$i++;

			// This should make the text the same as it would be coming from a new post submitted
			decode_message($row['post_text'], $row['bbcode_uid']);
			$row['post_text'] = html_entity_decode($row['post_text']);
			set_var($row['post_text'], $row['post_text'], 'string', true);

			$message_parser = new parse_message();
			$message_parser->message = $row['post_text'];
			$message_parser->parse((($bbcode_status) ? $row['enable_bbcode'] : false), (($config['allow_post_links']) ? $row['enable_magic_url'] : false), $row['enable_smilies'], $img_status, $flash_status, true, $config['allow_post_links']);

			if ($row['poll_title'] && $row['post_id'] == $row['topic_first_post_id'])
			{
				$row['poll_option_text'] = '';
				$sql = 'SELECT * FROM ' . POLL_OPTIONS_TABLE . ' WHERE topic_id = ' . $row['topic_id'];
				$result2 = $db->sql_query($sql);
				while ($row2 = $db->sql_fetchrow($result2))
				{
					$row['poll_option_text'] .= $row2['poll_option_text'] . "\n";
				}
				$db->sql_freeresult($result2);

				$poll = array(
					'poll_title'		=> $row['poll_title'],
					'poll_length'		=> $row['poll_length'],
					'poll_max_options'	=> $row['poll_max_options'],
					'poll_option_text'	=> $row['poll_option_text'],
					'poll_start'		=> $row['poll_start'],
					'poll_last_vote'	=> $row['poll_last_vote'],
					'poll_vote_change'	=> $row['poll_vote_change'],
					'enable_bbcode'		=> $row['enable_bbcode'],
					'enable_urls'		=> $row['enable_magic_url'],
					'enable_smilies'	=> $row['enable_smilies'],
					'img_status'		=> $img_status,
				);

				$message_parser->parse_poll($poll);
			}

			$sql_data = array(
				'post_text'			=> $message_parser->message,
				'post_checksum'		=> md5($message_parser->message),
				'bbcode_bitfield'	=> $message_parser->bbcode_bitfield,
				'bbcode_uid'		=> $message_parser->bbcode_uid,
			);

			$sql = 'UPDATE ' . POSTS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_data) . '
				WHERE post_id = ' . $row['post_id'];
			$db->sql_query($sql);

			if ($row['poll_title'] && $row['post_id'] == $row['topic_first_post_id'])
			{
				$sql_data = array(
					'poll_title'	=> str_replace($row['bbcode_uid'], $message_parser->bbcode_uid, $poll['poll_title']),
				);

				$sql = 'UPDATE ' . TOPICS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_data) . '
					WHERE topic_id = ' . $row['topic_id'];
				$db->sql_query($sql);

				$sql = 'SELECT * FROM ' . POLL_OPTIONS_TABLE . ' WHERE topic_id = ' . $row['topic_id'];
				$result2 = $db->sql_query($sql);
				while ($row2 = $db->sql_fetchrow($result2))
				{
					$sql_data = array(
						'poll_option_text'	=> str_replace($row['bbcode_uid'], $message_parser->bbcode_uid, $row2['poll_option_text']),
					);

					$sql = 'UPDATE ' . POLL_OPTIONS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_data) . '
						WHERE topic_id = ' . $row['topic_id'] . '
						AND poll_option_id = ' . $row2['poll_option_id'];
					$db->sql_query($sql);
				}
			}
		}
		$db->sql_freeresult($result);

		if ($i < $limit)
		{
			trigger_error($user->lang['BBCODE_REPARSE_COMPLETE']);
		}
		else
		{
			$step++;
			meta_refresh(0, append_sid(STK_ROOT_PATH . 'index.' . PHP_EXT, "t=reparse_bbcode&amp;submit=1&amp;step={$step}"));
			$template->assign_var('U_BACK_TOOL', false);

			trigger_error(sprintf($user->lang['BBCODE_REPARSE_PROGRESS'], ($step - 1), $step));
		}
	}
}
?>