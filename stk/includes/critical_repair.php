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

		$tool_name = 'erk_' . $tool;
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

			$tool_name = 'erk_' . $tool;
			$run_tool = new $tool_name();
			$run_tool->run();
			unset($run_tool);
		}

		return true;
	}

	/**
	 * Trigger an error message, this method *must* be called when an ERK tool
	 * encounters an error. You can not rely on msg_handler!
	 * @param	String|Array	$msg				The error message or an string array containing multiple lines
	 * @param	Boolean			$redirect_stk		Show a backlink to the STK, otherwise to the ERK
	 * @param	Array			$msg_handler_args	Arugments that will be passed to the phpBB msg_handler, should only
	 *												be set when called from stk_msg_handler
	 * @return	void
	 */
	function trigger_error($msg, $redirect_stk = false, $msg_handler_args = array())
	{
		if (defined('ERK_NO_TRIGGER') && ERK_NO_TRIGGER === true)
		{
			return;
		}

		// Fall back to the phpBB error handler
		if (!empty($msg_handler_args))
		{
			$msg = (is_array($msg)) ? implode('<br />', $msg) : $msg;
			msg_handler($msg_handler_args[0], $msg, $msg_handler_args[1], $msg_handler_args[2]);
			exit;
		}

		if (!is_array($msg))
		{
			$msg = array($msg);
		}

		// Send headers
		header('HTTP/1.1 503 Service Unavailable');
		header('Content-type: text/html; charset=UTF-8');

		// Build the page
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta http-equiv="imagetoolbar" content="no" />
		<title>Support Toolkit :: Emergency Repair Kit</title>
		<link href="<?php echo STK_ROOT_PATH; ?>style/style.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="<?php echo STK_ROOT_PATH; ?>style/erk_style.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	<body id="errorpage">
		<div id="wrap">
			<div id="page-header">
				<p>
					<?php
					if ($redirect_stk)
					{
						echo '<a href="' . STK_ROOT_PATH . '">Support Toolkit index</a> &bull; ';
					}
					else
					{
						echo '<a href="' . STK_ROOT_PATH . 'erk.php">Emergency Repair Toolkit index</a> &bull; ';
					}
					?>
					<a href="<?php echo PHPBB_ROOT_PATH; ?>">Board index</a>
				</p>
			</div>
			<div id="page-body">
				<div id="acp">
					<div class="panel">
						<span class="corners-top"><span></span></span>
							<div id="content">
								<h1>Emergency Repair Kit</h1>
								<?php
								foreach ($msg as $m)
								{
									echo "<p>{$m}</p>";
								}
								?>
								<p>
									<?php
									if ($redirect_stk)
									{
										echo 'Click <a href="' . STK_ROOT_PATH . '">here</a> to reload the STK';
									}
									else
									{
										echo 'Click <a href="' . STK_ROOT_PATH . 'erk.php">here</a> to reload the ERK';
									}
									?>
								</p>
							</div>
						<span class="corners-bottom"><span></span></span>
					</div>
				</div>
			</div>
			<div id="page-footer">
				Powered by phpBB &copy; 2000, 2002, 2005, 2007 <a href="http://www.phpbb.com/">phpBB Group</a>
			</div>
		</div>
	</body>
</html>
<?php
		// Make sure we exit, can't use any phpBB stuff here
		exit;
	}
}
