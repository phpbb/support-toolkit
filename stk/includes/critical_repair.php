<?php
/**
*
* @package Support Toolkit
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

// Load functions_admin.php if required
if (!function_exists('filelist'))
{
	include(PHPBB_ROOT_PATH . 'includes/functions_admin.' . PHP_EXT);
}

class critical_repair
{
	/**
	* @var Array Tools that are autoran
	*/
	var $autorun_tools = array();

	/**
	* @var Array Tools that are manually invoked
	*/
	var $manual_tools = array();

	/**
	* @var string Location for the tools
	*/
	var $tool_path;

	/**
	* Construct critical repair.
	* This method loads all critical repair tools
	* @return void
	*/
	function critical_repair()
	{
		$this->tool_path = STK_ROOT_PATH . 'includes/critical_repair/';
		$filelist = filelist($this->tool_path, '', PHP_EXT);

		foreach ($filelist as $directory => $tools)
		{
			if ($directory != 'autorun/')
			{
				if (sizeof($tools))
				{
					foreach ($tools as $tool)
					{
						$this->manual_tools[] = substr($tool, 0, strpos($tool, '.'));
					}
				}
			}
			else
			{
				if (sizeof($tools))
				{
					foreach ($tools as $tool)
					{
						$this->autorun_tools[] = substr($tool, 0, strpos($tool, '.'));
					}
				}
			}
		}

		return true;
	}

	/**
	* Run a manual critical repair tol
	* @param	String	$tool The name (file/class) of the tool
	* @return	mixed	The result of the tool
	*/
	function run_tool($tool)
	{
		if (!(in_array($tool, $this->manual_tools)))
		{
			return false;
		}

		include($this->tool_path . $tool . '.' . PHP_EXT);

		$tool_name = 'stk_' . $tool;
		$run_tool = new $tool_name();
		return $run_tool->run();
	}

	/**
	* Run all the automatic critical repair tools
	* @return void
	*/
	function autorun_tools()
	{
		foreach ($this->autorun_tools as $tool)
		{
			include($this->tool_path . 'autorun/' . $tool . '.' . PHP_EXT);

			$tool_name = 'stk_' . $tool;
			$run_tool = new $tool_name();
			$run_tool->run();
			unset($run_tool);
		}

		return true;
	}
}
?>