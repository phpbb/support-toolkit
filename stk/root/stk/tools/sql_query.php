<?php
/**
*
* @package Support Tool Kit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class sql_query
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
			'NAME'			=> $user->lang['RUN_SQL_QUERY'],
			'NAME_EXPLAIN'	=> $user->lang['RUN_SQL_QUERY_TOOL_EXPLAIN'],

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
		return array(
			'title'	=> 'RUN_SQL_QUERY',
			'vars'	=> array(
				'legend1'			=> 'SQL_QUERY',
				'sql_query'			=> array('lang' => 'SQL_QUERY', 'type' => 'textarea:20:255', 'explain' => true),
				'show_results'		=> array('lang' => 'SHOW_RESULTS', 'type' => 'checkbox', 'explain' => true),
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
		global $cache, $db, $dbms, $phpbb_root_path, $phpEx, $table_prefix, $user;

        if (!check_form_key('sql_query'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		$sql_query = utf8_normalize_nfc(request_var('sql_query', '', true));

		// Replace phpbb_ with the correct table prefix.
		$sql_query = preg_replace('#phpbb_#i', $table_prefix, $sql_query);

		if (!$sql_query)
		{
			$error[] = 'NO_SQL_QUERY';
			return;
		}

		if (!function_exists('remove_comments'))
		{
			include($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
		}
		if (!function_exists('split_sql_file'))
		{
			include($phpbb_root_path . 'includes/functions_install.' . $phpEx);
		}

		$dbmd = get_available_dbms($dbms);
        $remove_remarks = $dbmd[$dbms]['COMMENTS'];
		$delimiter = $dbmd[$dbms]['DELIM'];
		$remove_remarks($sql_query);
		$sql_query = split_sql_file($sql_query, $delimiter);

		$display = '';

		foreach ($sql_query as $sql)
		{
			$result = $db->sql_query($sql);
			if (isset($_POST['show_results']))
			{
				$cnt = 0;
				while ($row = $db->sql_fetchrow($result))
				{
					if ($cnt == 0)
					{
						$display .= '<h2>' . $sql . '</h2><table cellspacing="1" style="color: #000000;"><thead><tr>';
						foreach ($row as $key => $value)
						{
							$display .= '<th><strong>' . $key . '</strong></th>';
						}
						$display .= '</tr></thead><tbody>';
						$first = false;
					}

					$display .= '<tr class="row' . (($cnt % 2) + 2) . '">';
					foreach ($row as $key => $value)
					{
						$display .= '<td style="text-align: center;"><strong>' . $value . '</strong></td>';
					}
					$display .= '</tr>';

					$cnt++;
				}
				$display .= '</tbody></table>';

				if ($cnt == 0)
				{
					$display .= '<strong>' . $user->lang['NO_RESULTS'] . '</strong><br /><br />';
				}
			}
			$db->sql_freeresult($result);
		}

		// Purge the cache
		$cache->purge();

		trigger_error($display . $user->lang['SQL_QUERY_SUCCESS']);
	}
}

?>