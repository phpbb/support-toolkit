<?php
/**
*
* @package Support Toolkit - Profile List
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

class profile_list
{
	function display_options()
	{
		global $db, $template, $user;

		page_header($user->lang['PROFILE_LIST']);

		$user->add_lang('memberlist');

		$display = request_var('display', '');
		$start = request_var('start', 0);
		$limit = request_var('limit', 20);
		$order_by = request_var('order', '');
		$order_dir = (request_var('dir', 'DESC') == 'DESC') ? 'DESC' : 'ASC';
		$empty_only = (!isset($_GET['go']) || isset($_POST['empty_only']) || isset($_GET['empty_only'])) ? true : false;

		// Build Pagination URL
		$base_url = 't=profile_list&amp;go=1';
		$base_url .= ($display) ? '&amp;display=' . $display : '';
		$base_url .= ($empty_only) ? '&amp;empty_only=1' : '';
		$base_url .= ($limit != 20) ? '&amp;limit=' . $limit : '';
		$base_url .= ($order_by) ? '&amp;order=' . $order_by : '';
		$base_url .= ($order_dir != 'DESC') ? '&amp;dir=ASC' : '';
		$base_url = append_sid(STK_INDEX, $base_url);

		/*
		* Filter stuff
		*/
		$options = array(
			'user_icq'			=> 'ICQ',
			'user_aim'			=> 'AIM',
			'user_yim'			=> 'YIM',
			'user_msnm'			=> 'MSNM',
			'user_jabber'		=> 'JABBER',
			'user_website'		=> 'WEBSITE',
			'user_occ'			=> 'OCCUPATION',
			'user_interests'	=> 'INTERESTS',
			'user_from'			=> 'LOCATION',
			'user_sig'			=> 'SIGNATURE',
		);

		$profile_where = '';
		foreach ($options as $option => $lang_key)
		{
			$template->assign_block_vars('options', array(
				'OPTION'	=> $option,
				'LANG'		=> $user->lang[$lang_key],
				'SELECTED'	=> ($display == $option) ? true : false,
			));

			if ($empty_only)
			{
				$profile_where .= (($profile_where == '') ? ' AND (' : ' OR ') . $option . ' <> \'\'';
			}
		}

		if ($empty_only)
		{
			$profile_where .= ' ) ';
		}

		if (isset($options[$display]))
		{
			if ($empty_only)
			{
				$profile_where = ' AND ' . $display . ' <> \'\'';
			}
		}

		/*
		* Order stuff
		*/
		$order = array(
			'user_regdate'			=> 'JOINED',
			'username_clean'		=> 'USERNAME',
			'user_lastvisit'		=> 'LAST_VISIT',
			'user_lastpost_time'	=> 'LAST_POST',
			'user_warnings'			=> 'WARNINGS',
			'user_posts'			=> 'POSTS',
		);
		$timestamps = array('user_regdate', 'user_lastvisit', 'user_lastpost_time');

		foreach ($order as $option => $lang_key)
		{
			$template->assign_block_vars('order', array(
				'OPTION'	=> $option,
				'LANG'		=> $user->lang[$lang_key],
				'SELECTED'	=> ($order_by == $option) ? true : false,
			));
		}

		$order_sql = ' ORDER BY user_regdate DESC';
		if (isset($order[$order_by]))
		{
			$order_sql = ' ORDER BY ' . $order_by . ' ' . $order_dir;
		}
		else
		{
			$order_by = 'user_regdate';
		}

		/*
		* Main stuff...
		*/
		$sql = 'SELECT COUNT(user_id) AS cnt FROM ' . USERS_TABLE . '
			WHERE user_type <> ' . USER_IGNORE .
			$profile_where;
		$db->sql_query($sql);
		$count = $db->sql_fetchfield('cnt');

		$sql = 'SELECT * FROM ' . USERS_TABLE . '
			WHERE user_type <> ' . USER_IGNORE .
			$profile_where .
			$order_sql;
		$result = $db->sql_query_limit($sql, $limit, $start);
		while ($row = $db->sql_fetchrow($result))
		{
			$inactive_reason = $user->lang['INACTIVE_REASON_UNKNOWN'];
			switch ($row['user_inactive_reason'])
			{
				case INACTIVE_REGISTER:
					$inactive_reason = $user->lang['INACTIVE_REASON_REGISTER'];
				break;

				case INACTIVE_PROFILE:
					$inactive_reason = $user->lang['INACTIVE_REASON_PROFILE'];
				break;

				case INACTIVE_MANUAL:
					$inactive_reason = $user->lang['INACTIVE_REASON_MANUAL'];
				break;

				case INACTIVE_REMIND:
					$inactive_reason = $user->lang['INACTIVE_REASON_REMIND'];
				break;
			}

			$template->assign_block_vars('users', array(
				'AIM'				=> $row['user_aim'],
				'EMAIL'				=> $row['user_email'],
				'ICQ'				=> $row['user_icq'],
				'INTERESTS'			=> $row['user_interests'],
				'JABBER'			=> $row['user_jabber'],
				'JOINED'			=> $user->format_date($row['user_regdate']),
				'LOCATION'			=> $row['user_from'],
				'MSNM'				=> $row['user_msnm'],
				'OCCUPATION'		=> $row['user_occ'],
				'POSTS'				=> $row['user_posts'],
				'SIGNATURE'			=> ((!isset($options[$display]) || $display == 'user_sig') && $row['user_sig']) ? generate_text_for_display($row['user_sig'], $row['user_sig_bbcode_uid'], $row['user_sig_bbcode_bitfield'], 7) : '',
				'USERNAME'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
				'VISITED'			=> ($row['user_lastvisit']) ? $user->format_date($row['user_lastvisit']) : 0,
				'WARNINGS'			=> $row['user_warnings'],
				'WEBSITE'			=> $row['user_website'],
				'YIM'				=> $row['user_yim'],

				'OPTION_SECTION'		=> (isset($options[$display])) ? $row[$display] : '',
				'ORDER_SECTION'			=> (in_array($order_by, $timestamps)) ? (($row[$order_by]) ? $user->format_date($row[$order_by]) : $user->lang['NEVER']) : $row[$order_by],
				'USER_INACTIVE_REASON'	=> $inactive_reason,

				'U_USER_ADMIN'		=> append_sid(PHPBB_ROOT_PATH . 'adm/index.' . PHP_EXT, 'i=users&amp;mode=overview&amp;u=' . $row['user_id'], true, $user->session_id),

				'S_USER_INACTIVE'	=> ($row['user_inactive_reason']) ? true : false,
			));
		}
		$db->sql_freeresult($result);

		$template->assign_vars(array(
			'U_DISPLAY_ACTION'		=> append_sid(STK_INDEX, 't=profile_list&amp;go=1'),

			'LIMIT'					=> $limit,
			'OPTION_SECTION'		=> (isset($options[$display]) && $display != 'user_sig') ? $user->lang[$options[$display]] : '',
			'ORDER_SECTION'			=> ($order_by == 'username_clean') ? '' : ((isset($order[$order_by])) ? $user->lang[$order[$order_by]] : $user->lang['JOINED']),
			'PAGINATION'			=> generate_pagination($base_url, $count, $limit, $start, true),

			'S_DESC'				=> ($order_dir == 'DESC') ? true : false,
			'S_DISPLAY_ALL'			=> (!isset($options[$display])) ? true : false,
			'S_DISPLAY_SIG'			=> ($display == 'user_sig') ? true : false,
			'S_EMPTY_CHECKED'		=> $empty_only,
		));

		$template->set_filenames(array(
			'body' => 'tools/profile_list.html',
		));

		page_footer();
	}
}
