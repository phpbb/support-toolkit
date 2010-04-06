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
* phpBB 3.0.7 data file
*/
class datafile_3_0_7
{
	/**
	* @var Array 3.0.7 config data
	*/
	var $config_data = array(
		'feed_overall'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'feed_http_auth'		=> array('config_value' => '0', 'is_dynamic' => '0'),
		'feed_limit_post'		=> array('config_value' => '15', 'is_dynamic' => '0'),
		'feed_limit_topic'		=> array('config_value' => '10', 'is_dynamic' => '0'),
		'feed_topics_new'		=> array('config_value' => '0', 'is_dynamic' => '0'),
		'feed_topics_active'	=> array('config_value' => '0', 'is_dynamic' => '0'),
	);
}