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
* phpBB 3.0.6 data file
*/
class datafile_3_0_6
{
	/**
	* @var Array 3.0.6 config data
	*/
	var $config_data = array(
		'captcha_plugin'				=> array('config_value' => 'phpbb_captcha_nogd', 'is_dynamic' => '0'),
		'feed_enable'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'feed_limit'					=> array('config_value' => '10', 'is_dynamic' => '0'),
		'feed_overall_forums'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'feed_overall_forums_limit'		=> array('config_value' => '15', 'is_dynamic' => '0'),
		'feed_overall_topics'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'feed_overall_topics_limit'		=> array('config_value' => '15', 'is_dynamic' => '0'),
		'feed_forum'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'feed_topic'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'feed_item_statistics'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'smilies_per_page'				=> array('config_value' => '50', 'is_dynamic' => '0'),
		'allow_pm_report'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'new_member_post_limit'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'new_member_group_default'		=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_avatar'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_avatar_remote_upload'	=> array('config_value' => '0', 'is_dynamic' => '0'),
		'min_post_chars'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_quick_reply'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'delete_time'					=> array('config_value' => '0', 'is_dynamic' => '0'),
	);

	/**
	* Define the basic structure
	* The format:
	*		array('{TABLE_NAME}' => {TABLE_DATA})
	*		{TABLE_DATA}:
	*			COLUMNS = array({column_name} = array({column_type}, {default}, {auto_increment}))
	*			PRIMARY_KEY = {column_name(s)}
	*			KEYS = array({key_name} = array({key_type}, {column_name(s)})),
	*
	*	Column Types:
	*	INT:x		=> SIGNED int(x)
	*	BINT		=> BIGINT
	*	UINT		=> mediumint(8) UNSIGNED
	*	UINT:x		=> int(x) UNSIGNED
	*	TINT:x		=> tinyint(x)
	*	USINT		=> smallint(4) UNSIGNED (for _order columns)
	*	BOOL		=> tinyint(1) UNSIGNED
	*	VCHAR		=> varchar(255)
	*	CHAR:x		=> char(x)
	*	XSTEXT_UNI	=> text for storing 100 characters (topic_title for example)
	*	STEXT_UNI	=> text for storing 255 characters (normal input field with a max of 255 single-byte chars) - same as VCHAR_UNI
	*	TEXT_UNI	=> text for storing 3000 characters (short text, descriptions, comments, etc.)
	*	MTEXT_UNI	=> mediumtext (post text, large text)
	*	VCHAR:x		=> varchar(x)
	*	TIMESTAMP	=> int(11) UNSIGNED
	*	DECIMAL		=> decimal number (5,2)
	*	DECIMAL:	=> decimal number (x,2)
	*	PDECIMAL	=> precision decimal number (6,3)
	*	PDECIMAL:	=> precision decimal number (x,3)
	*	VCHAR_UNI	=> varchar(255) BINARY
	*	VCHAR_CI	=> varchar_ci for postgresql, others VCHAR
	*/
	function get_schema_struct(&$schema_data)
	{
		// Add column
		$schema_data['phpbb_confirm']['COLUMNS']['attempts']				= array('UINT', 0);
		$schema_data['phpbb_forums']['COLUMNS']['forum_options']			= array('UINT:20', 0);
		$schema_data['phpbb_groups']['COLUMNS']['phpbb_skip_auth']			= array('BOOL', 0);
		$schema_data['phpbb_privmsgs']['COLUMNS']['message_reported']		= array('BOOL', 0);
		$schema_data['phpbb_profile_fields']['COLUMNS']['field_show_on_vt']	= array('BOOL', 0);
		$schema_data['phpbb_reports']['COLUMNS']['pm_id']					= array('UINT', 0);
		$schema_data['phpbb_users']['COLUMNS']['user_new']					= array('BOOL', 1);
		$schema_data['phpbb_users']['COLUMNS']['user_reminded']				= array('TINT:4', 0);
		$schema_data['phpbb_users']['COLUMNS']['user_reminded_time']		= array('TIMESTAMP', 0);

		// Change columns
		$schema_data['phpbb_users']['COLUMNS']['user_options']				= array('UINT:11'. 230271);

		// Change key
		$schema_data['phpbb_log']['KEYS']['log_time']						= array('INDEX', 'log_time');
		$schema_data['phpbb_posts']['KEYS']['post_username']				= array('INDEX', 'post_username');
		$schema_data['phpbb_reports']['KEYS']['post_id']					= array('INDEX', 'post_id');
		$schema_data['phpbb_reports']['KEYS']['pm_id']						= array('INDEX', 'pm_id');
	}
}