<?php
/**
*
* @package Support Tool Kit - Reclean Usernames
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class reclean_usernames
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
			'NAME'			=> $user->lang['RECLEAN_USERNAMES'],
			'NAME_EXPLAIN'	=> $user->lang['RECLEAN_USERNAMES_EXPLAIN'],
		);
	}

	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $config, $user;

		$user->add_lang('acp/board');

		return 'RECLEAN_USERNAMES';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		global $db;

        $sql = 'SELECT user_id, username, username_clean FROM ' . USERS_TABLE;
        $result = $db->sql_query($sql);
        while ($row = $db->sql_fetchrow($result))
        {
        	$username_clean = utf8_clean_string($row['username']);

        	if ($username_clean != $row['username_clean'])
        	{
        		$db->sql_query('UPDATE ' . USERS_TABLE . " SET username_clean = '$username_clean' WHERE user_id = {$row['user_id']}");
			}
		}
		$db->sql_freeresult($result);

		trigger_error('RECLEAN_USERNAMES_COMPLETE');
	}
}

?>