<?php
/**
 *
 * @package Support Toolkit - Resynchronise report flags
 * @copyright (c) 2011 phpBB Group
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
 * This class resynchronises the report flags in topics/posts/pms
 * all checks should be ran in order as they expect that the data
 * in the database is correct when ran
 */
class resync_report_flags
{
	/**
	 * Display Options
	 */
	function display_options()
	{
		return 'RESYNC_REPORT_FLAGS';
	}

	/**
	 * Run tool
	 */
	function run_tool()
	{
		$this->step = request_var('step', 0);
		$this->mode = request_var('m', 'pf');

		switch ($this->mode)
		{
			// Post flags
			case 'pf':
				$this->_resync_posts();
			break;

			// PM flags
			case 'pmf':
				$this->_resync_pms();
			break;

			// Reports
			case 'rf':
				$this->_resync_reports();
			break;

			// Topic flags
			case 'tf':
				$this->_resync_topics();
			break;

			case 'finished':
				trigger_error('RESYNC_REPORT_FLAGS_FINISHED');
			break;
		}
	}

	/**
	 * Make sure that all the reported pms have the report
	 * flag set
	 *
	 * @return void
	 */
	function _resync_pms()
	{
		global $db;
		
		// Grep all the report data
		$reported_pms = array();
		$sql = 'SELECT pm_id
			FROM ' . REPORTS_TABLE . '
			WHERE post_id = 0';
		$result	= $db->sql_query($sql);
		while ($report = $db->sql_fetchrow($result))
		{
			$reported_pms[] = $report['pm_id'];
		}
		$db->sql_freeresult($result);

		// Its broken
		if (!empty($reported_pms))
		{
			// First reset all unflagged posts.
			$corrupted = array();
			$sql = 'SELECT pm_id
				FROM ' . PRIVMSGS_TABLE . '
				WHERE message_reported = 0
					AND ' . $db->sql_in_set('pm_id', $reported_pms);
			$result	= $db->sql_query($sql);
			while ($pm = $db->sql_fetchrow($result))
			{
				$corrupted[] = $pm['pm_id'];
			}
			$db->sql_freeresult($result);

			if (!empty($corrupted))
			{
				// We remark these posts as reported even when the report was closed
				// this will be resolved in a later mode.
				$sql = 'UPDATE ' . PRIVMSGS_TABLE . '
					SET message_reported = 1
					WHERE ' . $db->sql_in_set('pm_id', $corrupted);
				$db->sql_query($sql);
			}

			// Now fetch any posts with a flag and no report and reset the flag
			$corrupted = array();
			$sql = 'SELECT pm_id
				FROM ' . PRIVMSGS_TABLE . '
				WHERE message_reported = 1
					AND ' . $db->sql_in_set('pm_id', $reported_pms, true);
			$result	= $db->sql_query($sql);
			while ($pm = $db->sql_fetchrow($result))
			{
				$corrupted[] = $pm['pm_id'];
			}
			$db->sql_freeresult($result);

			if (!empty($corrupted))
			{
				$sql = 'UPDATE ' . PRIVMSGS_TABLE . '
					SET message_reported = 0
					WHERE ' . $db->sql_in_set('pm_id', $corrupted);
				$db->sql_query($sql);
			}
		}

		// Next!
		$this->_next_mode();
	}

	/**
	 * Make sure that all the reported posts have the
	 * report flag set.
	 *
	 * @return void
	 */
	function _resync_posts()
	{
		global $db;

		// Grep all the report data
		$reported_posts = array();
		$sql = 'SELECT post_id
			FROM ' . REPORTS_TABLE . '
			WHERE pm_id = 0';
		$result	= $db->sql_query($sql);
		while ($report = $db->sql_fetchrow($result))
		{
			$reported_posts[] = $report['post_id'];
		}
		$db->sql_freeresult($result);

		// Its broken
		if (!empty($reported_posts))
		{
			// First reset all unflagged posts.
			$corrupted = array();
			$sql = 'SELECT post_id
				FROM ' . POSTS_TABLE . '
				WHERE post_reported = 0
					AND ' . $db->sql_in_set('post_id', $reported_posts);
			$result	= $db->sql_query($sql);
			while ($post = $db->sql_fetchrow($result))
			{
				$corrupted[] = $post['post_id'];
			}
			$db->sql_freeresult($result);

			if (!empty($corrupted))
			{
				// We remark these posts as reported even when the report was closed
				// this will be resolved in a later mode.
				$sql = 'UPDATE ' . POSTS_TABLE . '
					SET post_reported = 1
					WHERE ' . $db->sql_in_set('post_id', $corrupted);
				$db->sql_query($sql);
			}

			// Now fetch any posts with a flag and no report and reset the flag
			$corrupted = array();
			$sql = 'SELECT post_id
				FROM ' . POSTS_TABLE . '
				WHERE post_reported = 1
					AND ' . $db->sql_in_set('post_id', $reported_posts, true);
			$result	= $db->sql_query($sql);
			while ($post = $db->sql_fetchrow($result))
			{
				$corrupted[] = $post['post_id'];
			}
			$db->sql_freeresult($result);

			if (!empty($corrupted))
			{
				$sql = 'UPDATE ' . POSTS_TABLE . '
					SET post_reported = 0
					WHERE ' . $db->sql_in_set('post_id', $corrupted);
				$db->sql_query($sql);
			}
		}

		// Next!
		$this->_next_mode();
	}

	/**
	 * Make sure that the post flags are correct, this will adjust
	 * flags based upon the status of the report. This method
	 * assumes that all pms/posts are correctly flagged as reported
	 *
	 * @return void
	 */
	function _resync_reports()
	{
		global $db;

		// Fetch all the closed reports
		$pms = $posts = array();
		$sql = 'SELECT post_id, pm_id
			FROM ' . REPORTS_TABLE . '
			WHERE report_closed = 1';
		$result	= $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if (!empty($row['post_id']))
			{
				$posts[] = $row['post_id'];
			}
			else
			{
				$pms[] = $row['pm_id'];
			}
		}
		$db->sql_freeresult($result);

		// Update all the posts
		$queries = array();
		if (!empty($posts))
		{
			$queries[] = 'UPDATE ' . POSTS_TABLE . '
				SET post_reported = 0
				WHERE ' . $db->sql_in_set('post_id', $posts);
		}

		// Then the pms
		if (!empty($pms))
		{
			$queries[] = 'UPDATE ' . PRIVMSGS_TABLE . '
				SET message_reported = 0
				WHERE ' . $db->sql_in_set('pm_id', $pms);
		}

		// Run them
		if (!empty($queries))
		{
			foreach ($queries as $q)
			{
				$db->sql_query($q);
			}
		}

		// Move on
		$this->_next_mode();
	}

	/**
	 * Make sure that all topics have the appropriate flags set
	 */
	function _resync_topics()
	{
		global $db;

		// Grep all the topics that should be flagged
		$expected = array();
		$sql = 'SELECT DISTINCT t.topic_id
			FROM (' . POSTS_TABLE . ' p, ' . TOPICS_TABLE . ' t)
			WHERE p.post_reported = 1
				AND t.topic_id = p.topic_id';
		$result	= $db->sql_query($sql);
		while ($topic = $db->sql_fetchrow($result))
		{
			$expected[] = $topic['topic_id'];
		}
		$db->sql_freeresult($result);

		if (!empty($expected))
		{
			// Trash the flags on topics not in expected
			$sql = 'UPDATE ' TOPICS_TABLE . '
				SET topic_reported = 0
				WHERE ' . $db->sql_in_set('topic_id', $expected, true) . '
					AND topic_reported = 1';
			$db->sql_query($sql);

			// Now enable the flags where not set correctly
			$sql = 'UPDATE ' . TOPICS_TABLE . '
				SET topic_reported = 1
				WHERE ' . $db->sql_in_set('topic_id', $expected) . '
					AND topic_reported = 0';
			$db->sql_query($sql);
		}

		$this->_next_mode();
	}

	/**
	 * Switch modes
	 */
	function _next_mode()
	{
		global $template;

		// These modes define the order in which the different checks
		// are ran. These *must* remain ordered this way as the different
		// steps make assumptions based upon the previous mode. If its
		// needed to change the oder or add/remove modes make sure that
		// the appropriate changes are made to the logic!
		//
		// First all the flags on pms and posts are set correctly, than 
		// they are flipped off if needed by the status of the report and
		// finally the topic flags are reset based upon whats left
		$modes = array(
			'pf'	=> 'pmf',
			'pmf'	=> 'rf',
			'rf'	=> 'tf',
			'tf'	=> 'finished',
		);
		$next = $modes[$this->mode];

		// Build the link
		$redirect = append_sid(STK_INDEX, array('c' => 'support', 't' => 'resync_report_flags', 'step' => 0, 'm' => $next, 'submit' => true));
		meta_refresh(3, $redirect);
		$template->assign_var('U_BACK_TOOL', false);
		trigger_error('RESYNC_REPORT_FLAGS_NEXT');
	}
}
