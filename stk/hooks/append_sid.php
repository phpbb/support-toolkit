<?php
/**
 *
 * @package SupportToolkit
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * Append SID hook, should be replaced with an event so that code
 * duplication can be prevented.
 * http://area51.phpbb.com/phpBB/viewtopic.php?f=111&t=42995
 */
function stk_append_sid($phpbb_hook, $url, $params, $is_amp, $session_id)
{
	global $_SID, $_EXTRA_URL;
	global $phpbb_root_path;

	// Handle STK style calls.
	if (is_array($url))
	{
		$amp_delim = ($is_amp) ? '&amp;' : '&';

		if (empty($url[2]))
		{
			$url[2] = array();
		}

		if (!is_array($params))
		{
			// Create an array from it
			$_params = array();

			if (!empty($params))
			{
				$_params_parts = explode($amp_delim, $params);

				foreach ($_params_parts as $_part)
				{
					$_p_parts = explode('=', $_part);
					$_params[$_p_parts[0]] = $_p_parts[1];
				}
			}

			$params = $_params;
		}
		
		$params	= array_merge(array(
			'c' => !empty($url[0]) ? $url[0] : 'home',
			't'	=> !empty($url[1]) ? $url[1] : false,
		), $url[2], $params);

		$url = generate_board_url() . '/index.php';
	}
	else
	{
		// phpBB sometimes calls with the `$phpbb_root_path` appended, the STK
		// uses an absolute path so remove that.
		if (strpos($url, $phpbb_root_path) === 0)
		{
			static $phpbb_root_path_length = false;
			if (!$phpbb_root_path_length)
			{
				$phpbb_root_path_length = strlen($phpbb_root_path);
			}

			$url = substr($url, $phpbb_root_path_length);
		}
	}

	$params_is_array = is_array($params);

	// Get anchor
	$anchor = '';
	if (strpos($url, '#') !== false)
	{
		list($url, $anchor) = explode('#', $url, 2);
		$anchor = '#' . $anchor;
	}
	else if (!$params_is_array && strpos($params, '#') !== false)
	{
		list($params, $anchor) = explode('#', $params, 2);
		$anchor = '#' . $anchor;
	}

	// Handle really simple cases quickly
	if ($_SID == '' && $session_id === false && empty($_EXTRA_URL) && !$params_is_array && !$anchor)
	{
		if ($params === false)
		{
			return $url;
		}

		$url_delim = (strpos($url, '?') === false) ? '?' : (($is_amp) ? '&amp;' : '&');
		return $url . ($params !== false ? $url_delim. $params : '');
	}

	// Assign sid if session id is not specified
	if ($session_id === false)
	{
		$session_id = $_SID;
	}

	$amp_delim = ($is_amp) ? '&amp;' : '&';
	$url_delim = (strpos($url, '?') === false) ? '?' : $amp_delim;

	// Appending custom url parameter?
	$append_url = (!empty($_EXTRA_URL)) ? implode($amp_delim, $_EXTRA_URL) : '';

	// Use the short variant if possible ;)
	if ($params === false)
	{
		// Append session id
		if (!$session_id)
		{
			return $url . (($append_url) ? $url_delim . $append_url : '') . $anchor;
		}
		else
		{
			return $url . (($append_url) ? $url_delim . $append_url . $amp_delim : $url_delim) . 'sid=' . $session_id . $anchor;
		}
	}

	// Build string if parameters are specified as array
	if (is_array($params))
	{
		$output = array();

		foreach ($params as $key => $item)
		{
			if ($item === NULL)
			{
				continue;
			}

			if ($key == '#')
			{
				$anchor = '#' . $item;
				continue;
			}

			$output[] = $key . '=' . $item;
		}

		$params = implode($amp_delim, $output);
	}

	// Append session id and parameters (even if they are empty)
	// If parameters are empty, the developer can still append his/her parameters without caring about the delimiter
	return $url . (($append_url) ? $url_delim . $append_url . $amp_delim : $url_delim) . $params . ((!$session_id) ? '' : $amp_delim . 'sid=' . $session_id) . $anchor;
}
