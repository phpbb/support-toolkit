<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * STK Session class
 *
 * Wrapper class for the phpBB Session object, currently only overloads the
 * session code to utilise a custom auth plugin for the STK.
 *
 * @todo Remove all code duplication once PHPBB3-10728 is resolved. also see
 *       http://area51.phpbb.com/phpBB/viewtopic.php?f=84&t=41499&p=236949#p236841
 */
class stk_wrapper_session extends user
{
	/**
	* Start session management
	*
	* This is where all session activity begins. We gather various pieces of
	* information from the client and server. We test to see if a session already
	* exists. If it does, fine and dandy. If it doesn't we'll go on to create a
	* new one ... pretty logical heh? We also examine the system load (if we're
	* running on a system which makes such information readily available) and
	* halt if it's above an admin definable limit.
	*
	* @param bool $update_session_page if true the session page gets updated.
	*			This can be set to circumvent certain scripts to update the users last visited page.
	*/
	function session_begin($update_session_page = true)
	{
		global $phpEx, $SID, $_SID, $_EXTRA_URL, $db, $config, $phpbb_root_path;
		global $request;

		// Give us some basic information
		$this->time_now				= time();
		$this->cookie_data			= array('u' => 0, 'k' => '');
		$this->update_session_page	= $update_session_page;
		$this->browser				= $request->header('User-Agent');
		$this->referer				= $request->header('Referer');
		$this->forwarded_for		= $request->header('X-Forwarded-For');

		$this->host					= $this->extract_current_hostname();
		$this->page					= $this->extract_current_page($phpbb_root_path);

		// if the forwarded for header shall be checked we have to validate its contents
		if ($config['forwarded_for_check'])
		{
			$this->forwarded_for = preg_replace('# {2,}#', ' ', str_replace(',', ' ', $this->forwarded_for));

			// split the list of IPs
			$ips = explode(' ', $this->forwarded_for);
			foreach ($ips as $ip)
			{
				// check IPv4 first, the IPv6 is hopefully only going to be used very seldomly
				if (!empty($ip) && !preg_match(get_preg_expression('ipv4'), $ip) && !preg_match(get_preg_expression('ipv6'), $ip))
				{
					// contains invalid data, don't use the forwarded for header
					$this->forwarded_for = '';
					break;
				}
			}
		}
		else
		{
			$this->forwarded_for = '';
		}

		if ($request->is_set($config['cookie_name'] . '_sid', phpbb_request_interface::COOKIE) || $request->is_set($config['cookie_name'] . '_u', phpbb_request_interface::COOKIE))
		{
			$this->cookie_data['u'] = request_var($config['cookie_name'] . '_u', 0, false, true);
			$this->cookie_data['k'] = request_var($config['cookie_name'] . '_k', '', false, true);
			$this->session_id 		= request_var($config['cookie_name'] . '_sid', '', false, true);

			$SID = (defined('NEED_SID')) ? '?sid=' . $this->session_id : '?sid=';
			$_SID = (defined('NEED_SID')) ? $this->session_id : '';

			if (empty($this->session_id))
			{
				$this->session_id = $_SID = request_var('sid', '');
				$SID = '?sid=' . $this->session_id;
				$this->cookie_data = array('u' => 0, 'k' => '');
			}
		}
		else
		{
			$this->session_id = $_SID = request_var('sid', '');
			$SID = '?sid=' . $this->session_id;
		}

		$_EXTRA_URL = array();

		// Why no forwarded_for et al? Well, too easily spoofed. With the results of my recent requests
		// it's pretty clear that in the majority of cases you'll at least be left with a proxy/cache ip.
		$this->ip = htmlspecialchars_decode($request->server('REMOTE_ADDR'));
		$this->ip = preg_replace('# {2,}#', ' ', str_replace(',', ' ', $this->ip));

		// split the list of IPs
		$ips = explode(' ', trim($this->ip));

		// Default IP if REMOTE_ADDR is invalid
		$this->ip = '127.0.0.1';

		foreach ($ips as $ip)
		{
			if (function_exists('phpbb_ip_normalise'))
			{
				// Normalise IP address
				$ip = phpbb_ip_normalise($ip);

				if (empty($ip))
				{
					// IP address is invalid.
					break;
				}

				// IP address is valid.
				$this->ip = $ip;

				// Skip legacy code.
				continue;
			}

			if (preg_match(get_preg_expression('ipv4'), $ip))
			{
				$this->ip = $ip;
			}
			else if (preg_match(get_preg_expression('ipv6'), $ip))
			{
				// Quick check for IPv4-mapped address in IPv6
				if (stripos($ip, '::ffff:') === 0)
				{
					$ipv4 = substr($ip, 7);

					if (preg_match(get_preg_expression('ipv4'), $ipv4))
					{
						$ip = $ipv4;
					}
				}

				$this->ip = $ip;
			}
			else
			{
				// We want to use the last valid address in the chain
				// Leave foreach loop when address is invalid
				break;
			}
		}

		$this->load = false;

		// Load limit check (if applicable)
		if ($config['limit_load'] || $config['limit_search_load'])
		{
			if ((function_exists('sys_getloadavg') && $load = sys_getloadavg()) || ($load = explode(' ', @file_get_contents('/proc/loadavg'))))
			{
				$this->load = array_slice($load, 0, 1);
				$this->load = floatval($this->load[0]);
			}
			else
			{
				set_config('limit_load', '0');
				set_config('limit_search_load', '0');
			}
		}

		// Is session_id is set or session_id is set and matches the url param if required
		if (!empty($this->session_id) && (!defined('NEED_SID') || (isset($_GET['sid']) && $this->session_id === request_var('sid', ''))))
		{
			$sql = 'SELECT u.*, s.*
				FROM ' . SESSIONS_TABLE . ' s, ' . USERS_TABLE . " u
				WHERE s.session_id = '" . $db->sql_escape($this->session_id) . "'
					AND u.user_id = s.session_user_id";
			$result = $db->sql_query($sql);
			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			// Did the session exist in the DB?
			if (isset($this->data['user_id']))
			{
				// Validate IP length according to admin ... enforces an IP
				// check on bots if admin requires this
//				$quadcheck = ($config['ip_check_bot'] && $this->data['user_type'] & USER_BOT) ? 4 : $config['ip_check'];

				if (strpos($this->ip, ':') !== false && strpos($this->data['session_ip'], ':') !== false)
				{
					$s_ip = short_ipv6($this->data['session_ip'], $config['ip_check']);
					$u_ip = short_ipv6($this->ip, $config['ip_check']);
				}
				else
				{
					$s_ip = implode('.', array_slice(explode('.', $this->data['session_ip']), 0, $config['ip_check']));
					$u_ip = implode('.', array_slice(explode('.', $this->ip), 0, $config['ip_check']));
				}

				$s_browser = ($config['browser_check']) ? trim(strtolower(substr($this->data['session_browser'], 0, 149))) : '';
				$u_browser = ($config['browser_check']) ? trim(strtolower(substr($this->browser, 0, 149))) : '';

				$s_forwarded_for = ($config['forwarded_for_check']) ? substr($this->data['session_forwarded_for'], 0, 254) : '';
				$u_forwarded_for = ($config['forwarded_for_check']) ? substr($this->forwarded_for, 0, 254) : '';

				// referer checks
				// The @ before $config['referer_validation'] suppresses notices present while running the updater
				$check_referer_path = (@$config['referer_validation'] == REFERER_VALIDATE_PATH);
				$referer_valid = true;

				// we assume HEAD and TRACE to be foul play and thus only whitelist GET
				if (@$config['referer_validation'] && strtolower($request->server('REQUEST_METHOD')) !== 'get')
				{
					$referer_valid = $this->validate_referer($check_referer_path);
				}

				if ($u_ip === $s_ip && $s_browser === $u_browser && $s_forwarded_for === $u_forwarded_for && $referer_valid)
				{
					$session_expired = false;

					// Check whether the session is still valid if we have one
					$method = basename(trim($config['auth_method']));
					include_once($phpbb_root_path . 'includes/auth/auth_' . $method . '.' . $phpEx);

					$method = 'validate_session_' . $method;
					if (function_exists($method))
					{
						if (!$method($this->data))
						{
							$session_expired = true;
						}
					}

					if (!$session_expired)
					{
						// Check the session length timeframe if autologin is not enabled.
						// Else check the autologin length... and also removing those having autologin enabled but no longer allowed board-wide.
						if (!$this->data['session_autologin'])
						{
							if ($this->data['session_time'] < $this->time_now - ($config['session_length'] + 60))
							{
								$session_expired = true;
							}
						}
						else if (!$config['allow_autologin'] || ($config['max_autologin_time'] && $this->data['session_time'] < $this->time_now - (86400 * (int) $config['max_autologin_time']) + 60))
						{
							$session_expired = true;
						}
					}

					if (!$session_expired)
					{
						// Only update session DB a minute or so after last update or if page changes
						if ($this->time_now - $this->data['session_time'] > 60 || ($this->update_session_page && $this->data['session_page'] != $this->page['page']))
						{
							$sql_ary = array('session_time' => $this->time_now);

							if ($this->update_session_page)
							{
								$sql_ary['session_page'] = substr($this->page['page'], 0, 199);
								$sql_ary['session_forum_id'] = $this->page['forum'];
							}

							$db->sql_return_on_error(true);

							$this->update_session($sql_ary);

							$db->sql_return_on_error(false);

							// If the database is not yet updated, there will be an error due to the session_forum_id
							// @todo REMOVE for 3.0.2
							if ($result === false)
							{
								unset($sql_ary['session_forum_id']);

								$this->update_session($sql_ary);
							}

							if ($this->data['user_id'] != ANONYMOUS && !empty($config['new_member_post_limit']) && $this->data['user_new'] && $config['new_member_post_limit'] <= $this->data['user_posts'])
							{
								$this->leave_newly_registered();
							}
						}

						$this->data['is_registered'] = ($this->data['user_id'] != ANONYMOUS && ($this->data['user_type'] == USER_NORMAL || $this->data['user_type'] == USER_FOUNDER)) ? true : false;
						$this->data['is_bot'] = (!$this->data['is_registered'] && $this->data['user_id'] != ANONYMOUS) ? true : false;
						$this->data['user_lang'] = basename($this->data['user_lang']);

						return true;
					}
				}
				else
				{
					// Added logging temporarly to help debug bugs...
					if (defined('DEBUG_EXTRA') && $this->data['user_id'] != ANONYMOUS)
					{
						if ($referer_valid)
						{
							add_log('critical', 'LOG_IP_BROWSER_FORWARDED_CHECK', $u_ip, $s_ip, $u_browser, $s_browser, htmlspecialchars($u_forwarded_for), htmlspecialchars($s_forwarded_for));
						}
						else
						{
							add_log('critical', 'LOG_REFERER_INVALID', $this->referer);
						}
					}
				}
			}
		}

		// If we reach here then no (valid) session exists. So we'll create a new one
		return $this->session_create();
	}

	/**
	* Create a new session
	*
	* If upon trying to start a session we discover there is nothing existing we
	* jump here. Additionally this method is called directly during login to regenerate
	* the session for the specific user. In this method we carry out a number of tasks;
	* garbage collection, (search)bot checking, banned user comparison. Basically
	* though this method will result in a new session for a specific user.
	*/
	function session_create($user_id = false, $set_admin = false, $persist_login = false, $viewonline = true)
	{
		global $SID, $_SID, $db, $config, $cache, $phpbb_root_path, $phpEx;

		$this->data = array();

		/* Garbage collection ... remove old sessions updating user information
		// if necessary. It means (potentially) 11 queries but only infrequently
		if ($this->time_now > $config['session_last_gc'] + $config['session_gc'])
		{
			$this->session_gc();
		}*/

		// Do we allow autologin on this board? No? Then override anything
		// that may be requested here
		if (!$config['allow_autologin'])
		{
			$this->cookie_data['k'] = $persist_login = false;
		}

		/**
		* Here we do a bot check, oh er saucy! No, not that kind of bot
		* check. We loop through the list of bots defined by the admin and
		* see if we have any useragent and/or IP matches. If we do, this is a
		* bot, act accordingly
		*/
		$bot = false;
		$active_bots = $cache->obtain_bots();

		foreach ($active_bots as $row)
		{
			if ($row['bot_agent'] && preg_match('#' . str_replace('\*', '.*?', preg_quote($row['bot_agent'], '#')) . '#i', $this->browser))
			{
				$bot = $row['user_id'];
			}

			// If ip is supplied, we will make sure the ip is matching too...
			if ($row['bot_ip'] && ($bot || !$row['bot_agent']))
			{
				// Set bot to false, then we only have to set it to true if it is matching
				$bot = false;

				foreach (explode(',', $row['bot_ip']) as $bot_ip)
				{
					$bot_ip = trim($bot_ip);

					if (!$bot_ip)
					{
						continue;
					}

					if (strpos($this->ip, $bot_ip) === 0)
					{
						$bot = (int) $row['user_id'];
						break;
					}
				}
			}

			if ($bot)
			{
				break;
			}
		}

		$method = basename(trim($config['auth_method']));
		include_once($phpbb_root_path . 'includes/auth/auth_' . $method . '.' . $phpEx);

		$method = 'autologin_' . $method;
		if (function_exists($method))
		{
			$this->data = $method();

			if (sizeof($this->data))
			{
				$this->cookie_data['k'] = '';
				$this->cookie_data['u'] = $this->data['user_id'];
			}
		}

		// If we're presented with an autologin key we'll join against it.
		// Else if we've been passed a user_id we'll grab data based on that
		if (isset($this->cookie_data['k']) && $this->cookie_data['k'] && $this->cookie_data['u'] && !sizeof($this->data))
		{
			$sql = 'SELECT u.*
				FROM ' . USERS_TABLE . ' u, ' . SESSIONS_KEYS_TABLE . ' k
				WHERE u.user_id = ' . (int) $this->cookie_data['u'] . '
					AND u.user_type IN (' . USER_NORMAL . ', ' . USER_FOUNDER . ")
					AND k.user_id = u.user_id
					AND k.key_id = '" . $db->sql_escape(md5($this->cookie_data['k'])) . "'";
			$result = $db->sql_query($sql);
			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			$bot = false;
		}
		else if ($user_id !== false && !sizeof($this->data))
		{
			$this->cookie_data['k'] = '';
			$this->cookie_data['u'] = $user_id;

			$sql = 'SELECT *
				FROM ' . USERS_TABLE . '
				WHERE user_id = ' . (int) $this->cookie_data['u'] . '
					AND user_type IN (' . USER_NORMAL . ', ' . USER_FOUNDER . ')';
			$result = $db->sql_query($sql);
			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			$bot = false;
		}

		// Bot user, if they have a SID in the Request URI we need to get rid of it
		// otherwise they'll index this page with the SID, duplicate content oh my!
		if ($bot && isset($_GET['sid']))
		{
			send_status_line(301, 'Moved Permanently');
			redirect(build_url(array('sid')));
		}

		// If no data was returned one or more of the following occurred:
		// Key didn't match one in the DB
		// User does not exist
		// User is inactive
		// User is bot
		if (!sizeof($this->data) || !is_array($this->data))
		{
			$this->cookie_data['k'] = '';
			$this->cookie_data['u'] = ($bot) ? $bot : ANONYMOUS;

			if (!$bot)
			{
				$sql = 'SELECT *
					FROM ' . USERS_TABLE . '
					WHERE user_id = ' . (int) $this->cookie_data['u'];
			}
			else
			{
				// We give bots always the same session if it is not yet expired.
				$sql = 'SELECT u.*, s.*
					FROM ' . USERS_TABLE . ' u
					LEFT JOIN ' . SESSIONS_TABLE . ' s ON (s.session_user_id = u.user_id)
					WHERE u.user_id = ' . (int) $bot;
			}

			$result = $db->sql_query($sql);
			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
		}

		if ($this->data['user_id'] != ANONYMOUS && !$bot)
		{
			$this->data['session_last_visit'] = (isset($this->data['session_time']) && $this->data['session_time']) ? $this->data['session_time'] : (($this->data['user_lastvisit']) ? $this->data['user_lastvisit'] : time());
		}
		else
		{
			$this->data['session_last_visit'] = $this->time_now;
		}

		// Force user id to be integer...
		$this->data['user_id'] = (int) $this->data['user_id'];

		// At this stage we should have a filled data array, defined cookie u and k data.
		// data array should contain recent session info if we're a real user and a recent
		// session exists in which case session_id will also be set

		// Is user banned? Are they excluded? Won't return on ban, exists within method
		if ($this->data['user_type'] != USER_FOUNDER)
		{
			if (!$config['forwarded_for_check'])
			{
				$this->check_ban($this->data['user_id'], $this->ip);
			}
			else
			{
				$ips = explode(' ', $this->forwarded_for);
				$ips[] = $this->ip;
				$this->check_ban($this->data['user_id'], $ips);
			}
		}

		$this->data['is_registered'] = (!$bot && $this->data['user_id'] != ANONYMOUS && ($this->data['user_type'] == USER_NORMAL || $this->data['user_type'] == USER_FOUNDER)) ? true : false;
		$this->data['is_bot'] = ($bot) ? true : false;

		// If our friend is a bot, we re-assign a previously assigned session
		if ($this->data['is_bot'] && $bot == $this->data['user_id'] && $this->data['session_id'])
		{
			// Only assign the current session if the ip, browser and forwarded_for match...
			if (strpos($this->ip, ':') !== false && strpos($this->data['session_ip'], ':') !== false)
			{
				$s_ip = short_ipv6($this->data['session_ip'], $config['ip_check']);
				$u_ip = short_ipv6($this->ip, $config['ip_check']);
			}
			else
			{
				$s_ip = implode('.', array_slice(explode('.', $this->data['session_ip']), 0, $config['ip_check']));
				$u_ip = implode('.', array_slice(explode('.', $this->ip), 0, $config['ip_check']));
			}

			$s_browser = ($config['browser_check']) ? trim(strtolower(substr($this->data['session_browser'], 0, 149))) : '';
			$u_browser = ($config['browser_check']) ? trim(strtolower(substr($this->browser, 0, 149))) : '';

			$s_forwarded_for = ($config['forwarded_for_check']) ? substr($this->data['session_forwarded_for'], 0, 254) : '';
			$u_forwarded_for = ($config['forwarded_for_check']) ? substr($this->forwarded_for, 0, 254) : '';

			if ($u_ip === $s_ip && $s_browser === $u_browser && $s_forwarded_for === $u_forwarded_for)
			{
				$this->session_id = $this->data['session_id'];

				// Only update session DB a minute or so after last update or if page changes
				if ($this->time_now - $this->data['session_time'] > 60 || ($this->update_session_page && $this->data['session_page'] != $this->page['page']))
				{
					$this->data['session_time'] = $this->data['session_last_visit'] = $this->time_now;

					$sql_ary = array('session_time' => $this->time_now, 'session_last_visit' => $this->time_now, 'session_admin' => 0);

					if ($this->update_session_page)
					{
						$sql_ary['session_page'] = substr($this->page['page'], 0, 199);
						$sql_ary['session_forum_id'] = $this->page['forum'];
					}

					$this->update_session($sql_ary);

					// Update the last visit time
					$sql = 'UPDATE ' . USERS_TABLE . '
						SET user_lastvisit = ' . (int) $this->data['session_time'] . '
						WHERE user_id = ' . (int) $this->data['user_id'];
					$db->sql_query($sql);
				}

				$SID = '?sid=';
				$_SID = '';
				return true;
			}
			else
			{
				// If the ip and browser does not match make sure we only have one bot assigned to one session
				$db->sql_query('DELETE FROM ' . SESSIONS_TABLE . ' WHERE session_user_id = ' . $this->data['user_id']);
			}
		}

		$session_autologin = (($this->cookie_data['k'] || $persist_login) && $this->data['is_registered']) ? true : false;
		$set_admin = ($set_admin && $this->data['is_registered']) ? true : false;

		// Create or update the session
		$sql_ary = array(
			'session_user_id'		=> (int) $this->data['user_id'],
			'session_start'			=> (int) $this->time_now,
			'session_last_visit'	=> (int) $this->data['session_last_visit'],
			'session_time'			=> (int) $this->time_now,
			'session_browser'		=> (string) trim(substr($this->browser, 0, 149)),
			'session_forwarded_for'	=> (string) $this->forwarded_for,
			'session_ip'			=> (string) $this->ip,
			'session_autologin'		=> ($session_autologin) ? 1 : 0,
			'session_admin'			=> ($set_admin) ? 1 : 0,
			'session_viewonline'	=> ($viewonline) ? 1 : 0,
		);

		if ($this->update_session_page)
		{
			$sql_ary['session_page'] = (string) substr($this->page['page'], 0, 199);
			$sql_ary['session_forum_id'] = $this->page['forum'];
		}

		$db->sql_return_on_error(true);

		$sql = 'DELETE
			FROM ' . SESSIONS_TABLE . '
			WHERE session_id = \'' . $db->sql_escape($this->session_id) . '\'
				AND session_user_id = ' . ANONYMOUS;

		if (!defined('IN_ERROR_HANDLER') && (!$this->session_id || !$db->sql_query($sql) || !$db->sql_affectedrows()))
		{
			// Limit new sessions in 1 minute period (if required)
			if (empty($this->data['session_time']) && $config['active_sessions'])
			{
//				$db->sql_return_on_error(false);

				$sql = 'SELECT COUNT(session_id) AS sessions
					FROM ' . SESSIONS_TABLE . '
					WHERE session_time >= ' . ($this->time_now - 60);
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				if ((int) $row['sessions'] > (int) $config['active_sessions'])
				{
					send_status_line(503, 'Service Unavailable');
					trigger_error('BOARD_UNAVAILABLE');
				}
			}
		}

		// Since we re-create the session id here, the inserted row must be unique. Therefore, we display potential errors.
		// Commented out because it will not allow forums to update correctly
//		$db->sql_return_on_error(false);

		// Something quite important: session_page always holds the *last* page visited, except for the *first* visit.
		// We are not able to simply have an empty session_page btw, therefore we need to tell phpBB how to detect this special case.
		// If the session id is empty, we have a completely new one and will set an "identifier" here. This identifier is able to be checked later.
		if (empty($this->data['session_id']))
		{
			// This is a temporary variable, only set for the very first visit
			$this->data['session_created'] = true;
		}

		$this->session_id = $this->data['session_id'] = md5(unique_id());

		$sql_ary['session_id'] = (string) $this->session_id;
		$sql_ary['session_page'] = (string) substr($this->page['page'], 0, 199);
		$sql_ary['session_forum_id'] = $this->page['forum'];

		$sql = 'INSERT INTO ' . SESSIONS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
		$db->sql_query($sql);

		$db->sql_return_on_error(false);

		// Regenerate autologin/persistent login key
		if ($session_autologin)
		{
			$this->set_login_key();
		}

		// refresh data
		$SID = '?sid=' . $this->session_id;
		$_SID = $this->session_id;
		$this->data = array_merge($this->data, $sql_ary);

		if (!$bot)
		{
			$cookie_expire = $this->time_now + (($config['max_autologin_time']) ? 86400 * (int) $config['max_autologin_time'] : 31536000);

			$this->set_cookie('u', $this->cookie_data['u'], $cookie_expire);
			$this->set_cookie('k', $this->cookie_data['k'], $cookie_expire);
			$this->set_cookie('sid', $this->session_id, $cookie_expire);

			unset($cookie_expire);

			$sql = 'SELECT COUNT(session_id) AS sessions
					FROM ' . SESSIONS_TABLE . '
					WHERE session_user_id = ' . (int) $this->data['user_id'] . '
					AND session_time >= ' . (int) ($this->time_now - (max($config['session_length'], $config['form_token_lifetime'])));
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			if ((int) $row['sessions'] <= 1 || empty($this->data['user_form_salt']))
			{
				$this->data['user_form_salt'] = unique_id();
				// Update the form key
				$sql = 'UPDATE ' . USERS_TABLE . '
					SET user_form_salt = \'' . $db->sql_escape($this->data['user_form_salt']) . '\'
					WHERE user_id = ' . (int) $this->data['user_id'];
				$db->sql_query($sql);
			}
		}
		else
		{
			$this->data['session_time'] = $this->data['session_last_visit'] = $this->time_now;

			// Update the last visit time
			$sql = 'UPDATE ' . USERS_TABLE . '
				SET user_lastvisit = ' . (int) $this->data['session_time'] . '
				WHERE user_id = ' . (int) $this->data['user_id'];
			$db->sql_query($sql);

			$SID = '?sid=';
			$_SID = '';
		}

		return true;
	}

	/**
	* Kills a session
	*
	* This method does what it says on the tin. It will delete a pre-existing session.
	* It resets cookie information (destroying any autologin key within that cookie data)
	* and update the users information from the relevant session data. It will then
	* grab guest user information.
	*/
	function session_kill($new_session = true)
	{
		global $SID, $_SID, $db, $config, $phpbb_root_path, $phpEx;

		$sql = 'DELETE FROM ' . SESSIONS_TABLE . "
			WHERE session_id = '" . $db->sql_escape($this->session_id) . "'
				AND session_user_id = " . (int) $this->data['user_id'];
		$db->sql_query($sql);

		// Allow connecting logout with external auth method logout
		$method = basename(trim($config['auth_method']));
		include_once($phpbb_root_path . 'includes/auth/auth_' . $method . '.' . $phpEx);

		$method = 'logout_' . $method;
		if (function_exists($method))
		{
			$method($this->data, $new_session);
		}

		if ($this->data['user_id'] != ANONYMOUS)
		{
			// Delete existing session, update last visit info first!
			if (!isset($this->data['session_time']))
			{
				$this->data['session_time'] = time();
			}

			$sql = 'UPDATE ' . USERS_TABLE . '
				SET user_lastvisit = ' . (int) $this->data['session_time'] . '
				WHERE user_id = ' . (int) $this->data['user_id'];
			$db->sql_query($sql);

			if ($this->cookie_data['k'])
			{
				$sql = 'DELETE FROM ' . SESSIONS_KEYS_TABLE . '
					WHERE user_id = ' . (int) $this->data['user_id'] . "
						AND key_id = '" . $db->sql_escape(md5($this->cookie_data['k'])) . "'";
				$db->sql_query($sql);
			}

			// Reset the data array
			$this->data = array();

			$sql = 'SELECT *
				FROM ' . USERS_TABLE . '
				WHERE user_id = ' . ANONYMOUS;
			$result = $db->sql_query($sql);
			$this->data = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
		}

		$cookie_expire = $this->time_now - 31536000;
		$this->set_cookie('u', '', $cookie_expire);
		$this->set_cookie('k', '', $cookie_expire);
		$this->set_cookie('sid', '', $cookie_expire);
		unset($cookie_expire);

		$SID = '?sid=';
		$this->session_id = $_SID = '';

		// To make sure a valid session is created we create one for the anonymous user
		if ($new_session)
		{
			$this->session_create(ANONYMOUS);
		}

		return true;
	}
}
