<?php
/**
*
* @package Support Toolkit - Reclean Usernames
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

class reclean_usernames
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return 'RECLEAN_USERNAMES';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool()
	{
		global $db, $template;

		$part = request_var('part', 0);
		$limit = 500;
		$i = 0;

        $sql = 'SELECT user_id, username, username_clean FROM ' . USERS_TABLE;
        $result = $db->sql_query_limit($sql, $limit, ($part * $limit));
        while ($row = $db->sql_fetchrow($result))
        {
        	$i++;
        	$username_clean = $db->sql_escape(utf8_clean_string($row['username']));

        	if ($username_clean != $row['username_clean'])
        	{
        		$db->sql_query('UPDATE ' . USERS_TABLE . " SET username_clean = '$username_clean' WHERE user_id = {$row['user_id']}");
			}
		}
		$db->sql_freeresult($result);

		if ($i == $limit)
		{
			meta_refresh(0, append_sid(STK_INDEX, 't=reclean_usernames&amp;submit=1&amp;part=' . (++$part)));
			$template->assign_var('U_BACK_TOOL', false);

			trigger_error('RECLEAN_USERNAMES_NOT_COMPLETE');
		}
		else
		{
			trigger_error('RECLEAN_USERNAMES_COMPLETE');
		}
	}
}
