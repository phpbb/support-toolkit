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

/**
* phpBB 3.0.3 data file
*/
class datafile_3_0_3// extends datafile_3_0_2
{
	/**
	* @var Array 3.0.3 config data
	*/
	var $config_data = array(
		'enable_queue_trigger'	=> array('config_value' => '0', 'is_dynamic' => '0'),
		'queue_trigger_posts'	=> array('config_value' => '3', 'is_dynamic' => '0'),
		'pm_max_recipients'		=> array('config_value' => '0', 'is_dynamic' => '0'),
		'dbms_version'			=> array('config_value' => '', 'is_dynamic' => '0'),
	);
}