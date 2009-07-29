<?php
/**
*
* @package Support Toolkit - URL List
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

class url_list
{
	function display_options()
	{
		global $cache, $db, $template, $user, $phpbb_root_path, $phpEx;

		$action = request_var('action', '');
		$limit = request_var('limit', 100);

		page_header($user->lang['URL_LIST']);

		// Do we have a previous list?
		$url_list = $cache->get('_url_list');
		if ($url_list === false && $action != 'generate')
		{
			if (confirm_box(true))
			{
				$this->generate_list();
			}
			else
			{
				confirm_box(false, 'GENERATE_LIST');
			}
			redirect(append_sid(STK_INDEX));
		}
		else if ($url_list !== false)
		{
			// Display the list of urls
			foreach ($url_list as $domain => $urls)
			{
				if ($domain == 'generated')
				{
					$template->assign_var('GENERATED_ON', $user->format_date($urls));
					continue;
				}

				$template->assign_block_vars('domains', array(
					'DOMAIN'	=> $domain,
				));

				foreach ($urls as $url => $found)
				{
					$template->assign_block_vars('domains.urls', array(
						'URL'	=> $url,
					));

					foreach ($found as $type => $ids)
					{
						switch ($type)
						{
							case 'post' :
								foreach ($ids as $id)
								{
									$template->assign_block_vars('domains.urls.locations', array(
										'U_VIEW'	=> append_sid("{$phpbb_root_path}viewtopic.$phpEx", "p=$id#p$id"),
										'L_TYPE'	=> $user->lang['POST'],
									));
								}
							break;
							case 'pm' :
								foreach ($ids as $id)
								{
									$template->assign_block_vars('domains.urls.locations', array(
										'U_VIEW'	=> append_sid("{$phpbb_root_path}memberlist.$phpEx", "mode=viewprofile&amp;u=$id"),
										'L_TYPE'	=> $user->lang['PRIVATE_MESSAGE'],
										'L_VIEW'	=> $user->lang['VIEW_AUTHOR'],
									));
								}
							break;
						}
					}
				}
			}
		}

		switch ($action)
		{
			case 'generate' :
				$this->generate_list();
			break;
		}

		$template->assign_vars(array(
			'U_REGENERATE'		=> append_sid(STK_INDEX, 't=url_list&amp;action=generate'),
		));

		$template->set_filenames(array(
			'body' => 'tools/url_list.html',
		));

		page_footer();
	}

	function generate_list()
	{
		global $cache, $db;

		$url_list = $cache->get('_url_list');

		$part = request_var('part', 0);
		$start = request_var('start', 0);
		$limit = 1000;
		$i = 0;
		switch ($part)
		{
			case 0 :
				// Reset the list if required
				if ($start == 0)
				{
					$url_list = array();
				}

				$sql = 'SELECT post_id, post_text FROM ' . POSTS_TABLE . "
					WHERE post_text LIKE '%http%'
					ORDER BY post_id DESC";
				$result = $db->sql_query_limit($sql, $limit, $start);
				while ($row = $db->sql_fetchrow($result))
				{
					$i++;

					$matches = $this->find_matches($row['post_text']);

					$this->merge_matches($url_list, 'post', $matches, $row['post_id']);
				}
				$db->sql_freeresult($result);
			break;

			case 1 :
				$sql = 'SELECT author_id, message_text FROM ' . PRIVMSGS_TABLE . "
					WHERE message_text LIKE '%http%'
					ORDER BY msg_id DESC";
				$result = $db->sql_query_limit($sql, $limit, $start);
				while ($row = $db->sql_fetchrow($result))
				{
					$i++;

					$matches = $this->find_matches($row['message_text']);

					$this->merge_matches($url_list, 'pm', $matches, $row['author_id']);
				}
				$db->sql_freeresult($result);
			break;
		}

		$url_list = ksort($url_list);
		$url_list['generated'] = time();
		$cache->put('_url_list', $url_list);

		if ($i == $limit)
		{
			$redirect_url = append_sid(STK_INDEX, "t=url_list&amp;action=generate&amp;part=$part&amp;start=" . ($start + $limit));
		}
		else if ($part < 1)
		{
			$redirect_url = append_sid(STK_INDEX, 't=url_list&amp;action=generate&amp;part=' . ($part + 1));
		}
		else
		{
			redirect(append_sid(STK_INDEX, 't=url_list'));
		}

		meta_refresh(0, $redirect_url);
		trigger_error('GENERATE_IN_PROGRESS');
	}

	function find_matches($text)
	{
		$matches = array();
		preg_match_all('!https?:([\/]+)[\w\d:#@%/;$()~_?\+\-=\\\.&]*!', $text, $matches);
		if (isset($matches[0]))
		{
			return $matches[0];
		}

		return array();
	}

	function merge_matches(&$url_list, $type, $matches, $id)
	{
		foreach ($matches as $match)
		{

			$domain_matches = array();
			preg_match('#https?:([\/]+)([^\/]+)(.*)#', $match, $domain_matches);

			if (!isset($domain_matches[2]))
			{
				continue;
			}

			$domain = $domain_matches[2];

			//var_dump($domain_matches);
			//echo '<br /><br />';

			$url_list[$domain][$match][$type][] = $id;
		}
	}
}

?>