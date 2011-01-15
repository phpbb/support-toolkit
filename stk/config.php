<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2010 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @var Array STK configuration array
*/
$stk_config = array(
	/**
	* The BOM sniffer uses a white list to determine which files will be checked
	* by setting this option to "true", the whitelist will be ignored and *all*
	* files within the phpBB folder checked.
	*/
	'bom_sniffer_force_full_scan' => false,

	/**
	* Disable the BOM sniffers backup utility.
	*/
	'bom_sniffer_disable_backup' => false,
);
