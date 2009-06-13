<?php
/**
*
* @package Support Toolkit - Readd Module Management
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

class readd_module_management
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		return 'READD_MODULE_MANAGEMENT';
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool()
	{
		global $umil;

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

		trigger_error('READD_MODULE_MANAGEMENT_SUCCESS');
	}
}
?>