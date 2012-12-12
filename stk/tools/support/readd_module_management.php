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
	 * The modules this class will check and re-add and/or enable if required.
	 * The array contains all information we feed into $umil->module_exists and $umil->module_add
	 */
	var $check_modules = array(
		array(
			'class' 	=> 'acp',
			'parent'	=> 0,
			'lang_name'	=> 'ACP_CAT_SYSTEM'
		),
		array(
			'class'		=> 'acp',
			'parent'	=> 'ACP_CAT_SYSTEM',
			'lang_name'	=> 'ACP_MODULE_MANAGEMENT'
		),
		array(
			'class'		=> 'acp',
			'parent'	=> 'ACP_MODULE_MANAGEMENT',
			'lang_name'	=> 'ACP',
			'data'		=> array(
				'module_basename'	=> 'modules',
				'modes'				=> array('acp'),
			),
		),
		array(
			'class'		=> 'acp',
			'parent'	=> 'ACP_MODULE_MANAGEMENT',
			'lang_name'	=> 'MCP',
			'data'		=> array(
				'module_basename'	=> 'modules',
				'modes'				=> array('mcp'),
			),
		),
		array(
			'class'		=> 'acp',
			'parent'	=> 'ACP_MODULE_MANAGEMENT',
			'lang_name'	=> 'UCP',
			'data'		=> array(
				'module_basename'	=> 'modules',
				'modes'				=> array('ucp'),
			),
		),
	);
	
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
		global $cache, $db, $umil;
		
		// Check all modules for existance
		foreach ($this->check_modules as $module_data)
		{
			if(!$umil->module_exists($module_data['class'], $module_data['parent'], $module_data['lang_name']))
			{
				$umil->module_add($module_data['class'], $module_data['parent'], ((empty($module_data['data'])) ? $module_data['lang_name'] : $module_data['data']));
			}
			
			// This module exists, now make sure that it is enabled
			$sql = 'SELECT module_id
				FROM ' . MODULES_TABLE . "
				WHERE module_class = '" . $db->sql_escape($module_data['class']) . "'
					AND module_langname = '" . $db->sql_escape($module_data['lang_name']) . "'
					AND module_enabled = 1";
			$result		= $db->sql_query_limit($sql, 1, 0);
			$enabled	= $db->sql_fetchfield('module_id', false, $result);
			$db->sql_freeresult($result);
			
			if (!$enabled)
			{
				// Enable it
				$sql = 'UPDATE ' . MODULES_TABLE . "
					SET module_enabled = 1
					WHERE module_class = '" . $db->sql_escape($module_data['class']) . "'
						AND module_langname = '" . $db->sql_escape($module_data['lang_name']) . "'";
				$db->sql_query($sql);
			}
		}

		$cache->destroy('_modules_acp');
		trigger_error('READD_MODULE_MANAGEMENT_SUCCESS');
	}
}
