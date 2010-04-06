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
* phpBB 3.0.5 data file
*/
class datafile_3_0_5
{
	/**
	* @var Array 3.0.5 config data
	*/
	var $config_data = array(
		'captcha_gd_wave'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'captcha_gd_3d_noise'		=> array('config_value' => '1', 'is_dynamic' => '0'),
		'captcha_gd_fonts'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'confirm_refresh'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'max_mun_search_keywords'	=> array('config_value' => '10', 'is_dynamic' => '0'),
	);
}