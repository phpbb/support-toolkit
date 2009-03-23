<?php
/**
*
* @package Support Tool Kit - Readd Module Management
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class readd_module_management
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
			'NAME'			=> $user->lang['READD_MODULE_MANATEMENT'],
			'NAME_EXPLAIN'	=> $user->lang['READD_MODULE_MANATEMENT_EXPLAIN'],

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
		return 'READD_MODULE_MANATEMENT';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool()
	{
		global $phpbb_root_path, $phpEx;

		if (!file_exists($phpbb_root_path . 'umil/umil.' . $phpEx))
		{
			trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
		}
		include($phpbb_root_path . 'umil/umil.' . $phpEx);
		$umil = new umil(true);

		if (!$umil->module_exists('acp', 0, 'ACP_CAT_SYSTEM'))
		{
			$umil->module_add('acp', 0, 'ACP_CAT_SYSTEM');
		}

		if (!$umil->module_exists('acp', 'ACP_CAT_SYSTEM', 'ACP_MODULE_MANAGEMENT'))
		{
			$umil->module_add('acp', 'ACP_CAT_SYSTEM', 'ACP_MODULE_MANAGEMENT');
		}

		$to_add = array();

		if (!$umil->module_exists('acp', 'ACP_MODULE_MANAGEMENT', 'ACP'))
		{
			$to_add[] = 'acp';
		}
		if (!$umil->module_exists('acp', 'ACP_MODULE_MANAGEMENT', 'MCP'))
		{
			$to_add[] = 'mcp';
		}
		if (!$umil->module_exists('acp', 'ACP_MODULE_MANAGEMENT', 'UCP'))
		{
			$to_add[] = 'ucp';
		}

		$umil->module_add('acp', 'ACP_MODULE_MANAGEMENT', array(
			'module_basename'	=> 'modules',
			'modes'				=> $to_add,
		));

		trigger_error('READD_MODULE_MANATEMENT_SUCCESS');
	}
}
?>