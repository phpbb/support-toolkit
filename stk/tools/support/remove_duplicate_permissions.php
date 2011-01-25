<?php
/**
*
* @package Support Toolkit - Duplicate Permission Remover
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

class remove_duplicate_permissions
{
	function display_options()
	{
		return 'REMOVE_DUPLICATE_PERMISSIONS';
	}

	function run_tool()
	{
		global $db;

		$acl_options = $acl_duplicates = array();

		$sql = 'SELECT auth_option, auth_option_id FROM ' . ACL_OPTIONS_TABLE;
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if (isset($acl_options[$row['auth_option']]))
			{
				$acl_duplicates[$row['auth_option_id']] = $acl_options[$row['auth_option']];
			}
			else
			{
				$acl_options[$row['auth_option']] = $row['auth_option_id'];
			}
		}
		$db->sql_freeresult($result);

		if (empty($acl_duplicates))
		{
			trigger_error('NO_DUPLICATES_FOUND');
		}

		foreach ($acl_duplicates as $dup_id => $orig_id)
		{
			$tables = array(
				ACL_GROUPS_TABLE		=> 'group_id',
				ACL_ROLES_DATA_TABLE	=> 'role_id',
				ACL_USERS_TABLE			=> 'user_id',
			);

			foreach ($tables as $table => $column)
			{
				$sql = 'SELECT * FROM ' . $table . ' WHERE auth_option_id = ' . (int) $dup_id;
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$sql = 'SELECT auth_option_id, auth_setting FROM ' . $table . "
						WHERE $column = '" . $db->sql_escape($row[$column]) . "'
						AND auth_option_id = " . (int) $orig_id . 
						((isset($row['forum_id'])) ? ' AND forum_id = ' . (int) $row['forum_id'] : '');
					$result1 = $db->sql_query($sql);
					$row1 = $db->sql_fetchrow($result1);
					$db->sql_freeresult($result1);

					if ($row1)
					{
						if (!$row['auth_setting'] && $row1['auth_setting'])
						{
							// If one was set to never we'll assume it should be never.
							$sql = 'UPDATE ' . $table . "
								SET auth_setting = 0
								WHERE $column = '" . $db->sql_escape($row[$column]) . "'
								AND auth_option_id = " . (int) $orig_id .
								((isset($row['forum_id'])) ? ' AND forum_id = ' . (int) $row['forum_id'] : '');
							$db->sql_query($sql);
						}
					}
					else
					{
						$sql_ary = array(
							$column				=> $row[$column],
							'auth_option_id'	=> $orig_id,
							'auth_setting'		=> $row['auth_setting'],
						);

						if (isset($row['forum_id']))
						{
							$sql_ary['forum_id'] = $row['forum_id'];
						}

						$db->sql_query('INSERT INTO ' . $table . ' ' . $db->sql_build_array('INSERT', $sql_ary));
					}
				}
				$db->sql_freeresult($result);
			}
		}

		$tables = array(ACL_GROUPS_TABLE, ACL_OPTIONS_TABLE, ACL_ROLES_DATA_TABLE, ACL_USERS_TABLE);

		foreach ($tables as $table)
		{
			$db->sql_query('DELETE FROM ' . $table . ' WHERE ' . $db->sql_in_set('auth_option_id', 	array_keys($acl_duplicates)));
		}

		// Purge the auth cache in the users table
		$db->sql_query('UPDATE ' . USERS_TABLE . ' SET user_permissions = \'\'');

		trigger_error('DUPLICATES_FOUND');
	}
}
