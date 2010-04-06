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
* phpBB 3.0.2 data file
*/
class datafile_3_0_2
{
	/**
	* @var Array 3.0.2 config data
	*/
	var $config_data = array(
		'referer_validation'		=> array('config_value' => '1', 'is_dynamic' => '0'),
		'check_attachment_content'	=> array('config_value' => '1', 'is_dynamic' => '0'),
		'mime_triggers'				=> array('config_value' => 'body|head|html|img|plaintext|a href|pre|script|table|title', 'is_dynamic' => '0'),
	);
}