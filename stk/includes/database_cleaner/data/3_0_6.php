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
	* @var Array The bots
	*/
	var $bots = array(
		// No bot changes 3.0.5 -> 3.0.6
	);

	/**
	* @var Array 3.0.6 config data
	*/
	var $config = array(
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
	* @var Array Config entries that were removed by the 3.0.6 update
	*/
	var $removed_config = array(
		'enable_queue_trigger',
		'queue_trigger_posts',
	);

	/**
	* @var Array All default permission settings
	*/
	var $acl_options = array(
		// No permission changes 3.0.5 -> 3.0.6
	);

	/**
	* @var Array All default roles
	*/
	var $acl_roles = array(
		'ROLE_USER_NEW_MEMBER'	=> array('ROLE_DESCRIPTION_USER_NEW_MEMBER', 'u_', 6),
		'ROLE_FORUM_NEW_MEMBER'	=> array('ROLE_DESCRIPTION_FORUM_NEW_MEMBER', 'f_', 10),
	);

	/**
	* @var Array All default role data
	*/
	var $acl_role_data = array(
		'ROLE_USER_NEW_MEMBER'			=> array(
			'OPTION_LIKE'	=> "'u_%'",
			'OPTION_IN'		=> array('u_sendpm', 'u_masspm', 'u_masspm_group'),
			'SETTING'		=> '0',
		),
		'ROLE_FORUM_NEW_MEMBER'			=> array(
			'OPTION_LIKE'	=> "'f_%'",
			'OPTION_IN'		=> array('f_noapprove'),
			'SETTING'		=> '0',
		),
	);

	/**
	* @var Array All default extension groups
	*/
	var $extension_groups = array(
		// No extension group changes 3.0.5 -> 3.0.6
	);

	/**
	* @var Array All default extensions
	*/
	var $extensions = array(
		// No extension changes 3.0.5 -> 3.0.6
	);

	/**
	* Define the module structure so that we can populate the database without
	* needing to hard-code module_id values
	*/
	var $module_categories = array(
		// No Module categories changes 3.0.5 -> 3.0.6
	);
	var $module_extras = array(
		// This "extra" is added in the middle of the array,
		// we do this hardcoded in "fetch_cleaner_data". Doesn't
		// matter as the data is hardcoded in the first place ;)
		// 'ACP_FORUM_PERMISSIONS_COPY',
	);

	/**
	* @var Array All default groups
	*/
	var $groups = array(
		'NEWLY_REGISTERED'	=> array(
			'group_type'			=> 3,
			'group_founder_manage'	=> 0,
			'group_colour'			=> '',
			'group_legend'			=> 0,
			'group_avatar'			=> '',
			'group_desc'			=> '',
			'group_desc_uid'		=> '',
			'group_max_recipients'	=> 5,
		),
	);
	
	/**
	* @var Array All default report reasons
	*/
	var $report_reasons = array(
		// No reason changes 3.0.5 -> 3.0.6
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
		$schema_data['phpbb_groups']['COLUMNS']['group_skip_auth']			= array('BOOL', 0);
		$schema_data['phpbb_privmsgs']['COLUMNS']['message_reported']		= array('BOOL', 0);
		$schema_data['phpbb_profile_fields']['COLUMNS']['field_show_on_vt']	= array('BOOL', 0);
		$schema_data['phpbb_reports']['COLUMNS']['pm_id']					= array('UINT', 0);
		$schema_data['phpbb_users']['COLUMNS']['user_new']					= array('BOOL', 1);
		$schema_data['phpbb_users']['COLUMNS']['user_reminded']				= array('TINT:4', 0);
		$schema_data['phpbb_users']['COLUMNS']['user_reminded_time']		= array('TIMESTAMP', 0);

		// Change columns
		$schema_data['phpbb_users']['COLUMNS']['user_options']				= array('UINT:11', 230271);

		// Change key
		$schema_data['phpbb_log']['KEYS']['log_time']						= array('INDEX', 'log_time');
		$schema_data['phpbb_posts']['KEYS']['post_username']				= array('INDEX', 'post_username');
		$schema_data['phpbb_reports']['KEYS']['post_id']					= array('INDEX', 'post_id');
		$schema_data['phpbb_reports']['KEYS']['pm_id']						= array('INDEX', 'pm_id');

		// QA captcha tables
		// Only if required
		if (file_exists(PHPBB_ROOT_PATH . 'includes/captcha/plugins/phpbb_captcha_qa_plugin.' . PHP_EXT))
		{
			global $umil;

			include PHPBB_ROOT_PATH . 'includes/captcha/plugins/phpbb_captcha_qa_plugin.' . PHP_EXT;

			if ($umil->table_exists(CAPTCHA_QUESTIONS_TABLE) || $umil->table_exists(CAPTCHA_ANSWERS_TABLE) || $umil->table_exists(CAPTCHA_QA_CONFIRM_TABLE))
			{
				$schema_data['phpbb_captcha_answers'] = array(
					'COLUMNS' => array(
						'question_id'	=> array('UINT', 0),
						'answer_text'	=> array('STEXT_UNI', ''),
					),
					'KEYS'				=> array(
						'question_id'			=> array('INDEX', 'question_id'),
					),
				);

				$schema_data['phpbb_captcha_questions'] = array(
					'COLUMNS' => array(
						'question_id'	=> array('UINT', Null, 'auto_increment'),
						'strict'		=> array('BOOL', 0),
						'lang_id'		=> array('UINT', 0),
						'lang_iso'		=> array('VCHAR:30', ''),
						'question_text'	=> array('TEXT_UNI', ''),
					),
					'PRIMARY_KEY'		=> 'question_id',
					'KEYS'				=> array(
						'lang_iso'			=> array('INDEX', 'lang_iso'),
					),
				);

				$schema_data['phpbb_qa_confirm'] = array(
					'COLUMNS' => array(
						'session_id'	=> array('CHAR:32', ''),
						'confirm_id'	=> array('CHAR:32', ''),
						'lang_iso'		=> array('VCHAR:30', ''),
						'question_id'	=> array('UINT', 0),
						'attempts'		=> array('UINT', 0),
						'confirm_type'	=> array('USINT', 0),
					),
					'KEYS'				=> array(
						'session_id'			=> array('INDEX', 'session_id'),
						'lookup'				=> array('INDEX', array('confirm_id', 'session_id', 'lang_iso')),
					),
					'PRIMARY_KEY'		=> 'confirm_id',
				);
			}
		}
	}
}