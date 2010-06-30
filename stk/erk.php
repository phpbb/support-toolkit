<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2010 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

define('IN_PHPBB', true);

if (!defined('PHPBB_ROOT_PATH')) { define('PHPBB_ROOT_PATH', './../'); }
if (!defined('PHP_EXT')) { define('PHP_EXT', substr(strrchr(__FILE__, '.'), 1)); }
if (!defined('STK_DIR_NAME')) { define('STK_DIR_NAME', substr(strrchr(dirname(__FILE__), DIRECTORY_SEPARATOR), 1)); }	// Get the name of the stk directory
if (!defined('STK_ROOT_PATH')) { define('STK_ROOT_PATH', './'); }
if (!defined('STK_INDEX')) { define('STK_INDEX', STK_ROOT_PATH . 'index.' . PHP_EXT); }

// Init critical repair and run the tools that *must* be ran before initing anything else
include STK_ROOT_PATH . 'includes/critical_repair.' . PHP_EXT;
$critical_repair = new critical_repair();
$critical_repair->run_tool('bom_sniffer');
$critical_repair->run_tool('config_repair');

require STK_ROOT_PATH . 'common.' . PHP_EXT;

// We'll run the rest of the critical repair tools automatically now
$critical_repair->autorun_tools();

// Let's tell the user all is okay :)
header('Content-type: text/html; charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta http-equiv="imagetoolbar" content="no" />
		<title>Support Toolkit :: Emergency Repair Kit</title>
		<link href="<?php echo STK_ROOT_PATH; ?>/style/style.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	<body id="errorpage">
		<div id="wrap">
			<div id="page-header">
				<p><a href="<?php echo PHPBB_ROOT_PATH; ?>">Board index</a></p>
			</div>
			<div id="page-body">
				<div id="acp">
					<div class="panel">
						<span class="corners-top"><span></span></span>
							<div id="content">
								<h1>Emergency Repair Kit</h1>
								<p>
									The Emergency Repair Kit hasn't found any critical issues within your phpBB installation.
								</p>
								<p>
									Click <a href="<?php echo STK_ROOT_PATH; ?>">here</a> to reload the STK.
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
exit;

?>