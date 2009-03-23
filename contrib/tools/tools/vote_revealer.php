<?php
/**
*
* @package Support Tool Kit - Vote Revealer
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class vote_revealer
{
	/**
	* Tool Info
	*
	* @return Returns an array with the info about this tool.
	*/
	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['VOTE_REVEALER'],
			'NAME_EXPLAIN'	=> $user->lang['VOTE_REVEALER_EXPLAIN'],

			'CATEGORY'		=> $user->lang['ADMIN_TOOLS'],
		);
	}

	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $phpbb_root_path, $phpEx;

		// Only include if needed
		if (!function_exists('make_forum_select'))
		{
			include($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
		}

		return array(
			'title'	=> 'VOTE_REVEALER',
			'vars'	=> array(
				'legend1'		=> 'VOTE_REVEALER',
				'forum_id'		=> array('lang' => 'SELECT_FORUM', 'type' => 'select', 'function' => 'make_forum_select', 'explain' => true),
			)
		);
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		// Call the right method
		$mode = request_var('mode', 'search');
		$f_id = request_var('forum_id', 0);
		$t_id = request_var('topic_id', 0);

		switch ($mode)
		{
			case 'reveal'	:
				$this->reveal_poll($t_id, $error);
			break;

			case 'search'	:
			default			:
				// Check the form key
				if (!check_form_key('vote_revealer'))
				{
					$error[] = 'FORM_INVALID';
					return;
				}

				$this->search_polls($f_id, $error);
			break;
		}
	}

	/**
	* Search polls
	* Search for all topic with polls within the selected forum
	*
	* @param	int		$forum_id
	* @param	array	&$error		The error holding all the error data
	*/
	function search_polls($forum_id = 0, &$error)
	{
		global $db, $template, $user;
		global $stk_root_path, $phpEx;

		// Select all the polls
		$sql = 'SELECT t.topic_id, t.poll_title, f.forum_name
			FROM (' . TOPICS_TABLE . ' t, ' . FORUMS_TABLE . " f)
			WHERE t.forum_id = {$forum_id}
				AND t.poll_title <> ''
				AND f.forum_id = {$forum_id}";
		$result = $db->sql_query($sql);
		// Forum has no polls
		if (!$row = $db->sql_fetchrow($result))
		{
			$error[] = 'NO_POLLS';
			return;
		}
		else
		{
			$forum_name = $row['forum_name'];

			// Assign them all
			do
			{
				$template->assign_block_vars('polllist', array(
					'L_POLL_LINK'	=> censor_text($row['poll_title']),
					'U_POLL_LINK'	=> append_sid("{$stk_root_path}index.$phpEx", array('t' => 'vote_revealer', 'submit' => true, 'mode' => 'reveal', 'forum_id' => $forum_id, 'topic_id' => $row['topic_id'])),
				));
			}
			while ($row = $db->sql_fetchrow($result));
		}

		// Tell the template engine what page we are on.
		$template->assign_var('S_PAGE', 'list_polls');

		// Parse the page!
		parse_page('tools/poll_revealer_body', 'POLL_REVEALER_LIST', array($forum_name));
	}

	/**
	* Reveal poll
	* Show who voted what in the selected poll
	*
	* @param	int		$topic_id
	* @param	array	&$error		The error holding all the error data
	*/
	function reveal_poll($topic_id = 0, &$error)
	{
		global $db, $template;

		// Set some vars for later use
		$options = $votes = array();

		// Display the poll question
		$sql = 'SELECT poll_title
			FROM ' . TOPICS_TABLE . '
			WHERE topic_id = ' . (int) $topic_id;
		$result = $db->sql_query_limit($sql, 1, 0);
		$template->assign_var('L_POLL_TITLE', $db->sql_fetchfield('poll_title', false, $result));
		$db->sql_freeresult($result);

		// First get all the poll options
		$sql = 'SELECT poll_option_id, poll_option_text
			FROM ' . POLL_OPTIONS_TABLE . '
			WHERE topic_id = ' . (int) $topic_id;
		$result		= $db->sql_query($sql);
		$options	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		// Now get all the votes
		$sql = 'SELECT pv.poll_option_id, u.user_id, u.username, u.user_colour
			FROM (' . POLL_VOTES_TABLE . ' pv, ' . USERS_TABLE . ' u)
			WHERE (pv.topic_id = ' . (int) $topic_id . '
				AND u.user_id = pv.vote_user_id)';
		$result = $db->sql_query($sql);
		if ($row = $db->sql_fetchrow($result))
		{
			do
			{
				$votes[$row['poll_option_id']][] = $row;
			}
			while ($row = $db->sql_fetchrow($result));
		}
		else
		{
			$error[] = 'POLL_NO_VOTES';
			return false;
		}

		// Now loop through the data and assign all to the template
		foreach ($options as $option)
		{
			$template->assign_block_vars('vote_options', array(
				'OPTION_NAME'	=> $option['poll_option_text'],
			));

			if (isset($votes[$option['poll_option_id']]))
			{
				foreach ($votes[$option['poll_option_id']] as $ary_cnt => $voter)
				{
					$template->assign_block_vars('vote_options.voters', array(
						'VOTER_FULL'	=> get_username_string('full', $voter['user_id'], $voter['username'], $voter['user_colour']),
					));
				}
			}
		}
		$db->sql_freeresult($result);

		// Tell the template engine what page we are on.
		$template->assign_var('S_PAGE', 'reveal_poll');

		// Parse the page!
		parse_page('tools/poll_revealer_body', 'POLL_VOTERS');
	}
}
?>