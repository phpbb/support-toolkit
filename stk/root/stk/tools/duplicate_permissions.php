<?php
/**
*
* @package Support Tool Kit - Duplicate Permission Remover
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/


if (!defined('IN_PHPBB'))
{
	exit;
}


class duplicate_permissions
{
	function info()
	{
		global $user;

		return array(
			'NAME'			=> $user->lang['DUPLICATE_PERMISSIONS_REMOVER'],
			'NAME_EXPLAIN'	=> $user->lang['DUPLICATE_PERMISSIONS_REMOVER_EXPLAIN'],
			'CATEGORY'		=> $user->lang['ADMIN_TOOLS'],
		);
	}

	function display_options()
	{
		return 'DUPLICATE_PERMISSIONS_REMOVER';
	}

	function run_tool(&$error)
	{
		global $db, $user;

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

		if (!sizeof($acl_duplicates))
		{
			trigger_error('NO_DUPLICATES_FOUND');
		}

		foreach ($acl_duplicates as $dup_id => $orig_id)
		{
			$tables = array(
				ACL_GROUPS_TABLE		=> 'group_id',
				ACL_ROLES_DATE_TABLE	=> 'role_id',
				ACL_USERS_TABLE			=> 'user_id',
			);

			foreach ($tables as $table => $column)
			{
				$sql = 'SELECT * FROM ' . $table . ' WHERE auth_option_id = ' . (int) $dup_id;
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$sql = 'SELECT auth_setting FROM ' . $table . "
						WHERE $column = '{$row[$column]}'
						AND auth_option_id = '{$row['auth_option_id']}'" .
						((isset($row['forum_id'])) ? " AND forum_id = '{$row['forum_id']}'" : '');
					$result1 = $db->sql_query($sql);
					$row1 = $db->sql_fetchrow($result1);
					$db->sql_freeresult($result1);

					if ($row1)
					{
						if ($row['auth_setting'] != $row1['auth_setting'])
						{
							if (!$row['auth_setting'] && $row1['auth_setting'])
							{
								// If one was set to never we'll assume it should be never.
								$sql = 'UPDATE ' . $table . "
									SET auth_setting = 0
									WHERE $column = '{$row[$column]}'
									AND auth_option_id = '{$row['auth_option_id']}'" .
									((isset($row['forum_id'])) ? " AND forum_id = '{$row['forum_id']}'" : '');
								$db->sql_query($sql);
							}
						}
					}
					else
					{
						$sql_ary = array(
							$column				=> $row[$column],
							'auth_option_id'	=> $row['auth_option_id'],
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

		trigger_error(sprintf($user->lang['DUPLICATES_FOUND'], implode(', ', $acl_duplicates)));
	}
}
?>