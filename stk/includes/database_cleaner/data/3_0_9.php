<?php
/**
*
* @package Support Toolkit - Database Cleaner
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
* phpBB 3.0.9-dev data file
*/
class datafile_3_0_9
{
	/**
	* @var Array The bots
	*/
	var $bots = array(
		// No bot changes 3.0.8 -> 3.0.9
	);

	/**
	* @var Array 3.0.8-dev config data
	*/
	var $config = array(
		'ip_login_limit_max'			=> array('config_value' => '50', 'is_dynamic' => '0'),
		'ip_login_limit_time'			=> array('config_value' => '21600', 'is_dynamic' => '0'),
		'ip_login_limit_use_forwarded'	=> array('config_value' => '0', 'is_dynamic' => '0'),
	);

	/**
	* @var Array Config entries that were removed by the 3.0.9 update
	*/
	var $removed_config = array(
		// No config entries removed 3.0.8 -> 3.0.9
	);

	/**
	* @var Array All default permission settings
	*/
	var $acl_options = array(
		// No permission changes 3.0.8 -> 3.0.9
	);

	/**
	* @var Array All default roles
	*/
	var $acl_roles = array(
		// No role changes 3.0.8 -> 3.0.9
	);

	/**
	* @var Array All default role data
	*/
	var $acl_role_data = array(
		// No role data changes 3.0.8 -> 3.0.9
	);

	/**
	* @var Array All default extensions
	*/
	var $extension_groups = array(
		'IMAGES'				=> array(1, 1, 1, '', 0, ''),
		'ARCHIVES'				=> array(0, 1, 1, '', 0, ''),
		'PLAIN_TEXT'			=> array(0, 0, 1, '', 0, ''),
		'DOCUMENTS'				=> array(0, 0, 1, '', 0, ''),
		'REAL_MEDIA'			=> array(3, 0, 1, '', 0, ''),
		'WINDOWS_MEDIA'			=> array(2, 0, 1, '', 0, ''),
		'FLASH_FILES'			=> array(5, 0, 1, '', 0, ''),
		'QUICKTIME_MEDIA'		=> array(6, 0, 1, '', 0, ''),
		'DOWNLOADABLE_FILES'	=> array(0, 0, 1, '', 0, ''),
	);

	/**
	* @var Array All default extensions
	*/
	var $extensions = array(
		'IMAGES'				=> array(
			'gif',
			'png',
			'jpeg',
			'jpg',
			'tif',
			'tiff',
			'tga',
		),
		'ARCHIVES'			=> array(
			'gtar',
			'gz',
			'tar',
			'zip',
			'rar',
			'ace',
			'torrent',
			'tgz',
			'bz2',
			'7z',
		),
		'PLAIN_TEXT'			=> array(
			'txt',
			'c',
			'h',
			'cpp',
			'hpp',
			'diz',
			'csv',
			'ini',
			'log',
			'js',
			'xml',
		),
		'DOCUMENTS'			=> array(
			'xls',
			'xlsx',
			'xlsm',
			'xlsb',
			'doc',
			'docx',
			'docm',
			'dot',
			'dotx',
			'dotm',
			'pdf',
			'ai',
			'ps',
			'ppt',
			'pptx',
			'pptm',
			'odg',
			'odp',
			'ods',
			'odt',
			'rtf',
		),
		'REAL_MEDIA'			=> array(
			'rm',
			'ram',
		),
		'WINDOWS_MEDIA'		=> array(
			'wma',
			'wmv',
		),
		'FLASH_FILES'			=> array(
			'swf',
		),
		'QUICKTIME_MEDIA'		=> array(
			'mov',
			'm4v',
			'm4a',
			'mp4',
			'3gp',
			'3g2',
			'qt',
		),
		'DOWNLOADABLE_FILES'	=> array(
			'mpeg',
			'mpg',
			'mp3',
			'ogg',
			'ogm',
		),
	);

	/**
	* Define the module structure so that we can populate the database without
	* needing to hard-code module_id values
	*/
	var $module_categories = array(
		// No Module categories changes 3.0.8 -> 3.0.9
	);
	var $module_extras = array(
		// No Module extra changes 3.0.8 -> 3.0.9
	);

	/**
	* @var Array All default groups
	*/
	var $groups = array(
		// No Group changes 3.0.8 -> 3.0.9
	);
	
	/**
	* @var Array All default report reasons
	*/
	var $report_reasons = array(
		// No reason changes 3.0.8 -> 3.0.9
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
		// Update BBCode field
		$schema_data['phpbb_bbcodes']['COLUMNS']['bbcode_id'] = array('USINT', 0);

		// Create the login attempt table
		$schema_data['phpbb_login_attempts'] = array(
			'COLUMNS'			=> array(
				'attempt_ip'			=> array('VCHAR:40', ''),
				'attempt_browser'		=> array('VCHAR:150', ''),
				'attempt_forwarded_for'	=> array('VCHAR:255', ''),
				'attempt_time'			=> array('TIMESTAMP', 0),
				'user_id'				=> array('UINT', 0),
				'username'				=> array('VCHAR_UNI:255', 0),
				'username_clean'		=> array('VCHAR_CI', 0),
			),
			'KEYS'				=> array(
				'att_ip'		=> array('INDEX', array('attempt_ip', 'attempt_time')),
				'att_for'		=> array('INDEX', array('attempt_forwarded_for', 'attempt_time')),
				'att_time'		=> array('INDEX', array('attempt_time')),
				'user_id'		=> array('INDEX', 'user_id'),
			),
		);
	}
}