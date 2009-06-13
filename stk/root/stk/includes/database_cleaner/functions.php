<?php
/**
*
* @package Support Toolkit - Database Cleaner
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

function get_config_rows(&$cleaner, &$config_rows, &$existing_config)
{
	global $db;

	$existing_config = array();
	$sql = 'SELECT config_name FROM ' . CONFIG_TABLE . ' ORDER BY config_name ASC';
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result))
	{
		$existing_config[] = $row['config_name'];
	}
	$db->sql_freeresult($result);

	$config_rows = array_unique(array_merge(array_keys($cleaner->config), $existing_config));
	sort($config_rows);
}

function get_permission_rows(&$cleaner, &$permission_rows, &$existing_permissions)
{
	global $db;

	$existing_permissions = array();
	$sql = 'SELECT auth_option FROM ' . ACL_OPTIONS_TABLE;
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result))
	{
		$existing_permissions[] = $row['auth_option'];
	}
	$db->sql_freeresult($result);

	$permission_rows = array_unique(array_merge(array_keys($cleaner->permissions), $existing_permissions));
	sort($permission_rows);
}

function get_group_rows(&$cleaner, &$group_rows, &$existing_groups)
{
	global $db;

	$existing_groups = array();
	$sql = 'SELECT group_name FROM ' . GROUPS_TABLE . ' WHERE group_type = 3';
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result))
	{
		$existing_groups[] = $row['group_name'];
	}
	$db->sql_freeresult($result);

	$group_rows = array_unique(array_merge(array_keys($cleaner->groups), $existing_groups));
	sort($group_rows);
}
?>