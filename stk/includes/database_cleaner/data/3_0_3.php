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
class datafile_3_0_3
{
	/**
	* @var Array The bots
	*/
	var $bots = array(
		// No bot changes 3.0.2 -> 3.0.3
	);

	/**
	* @var Array 3.0.3 config data
	*/
	var $config = array(
		'enable_queue_trigger'	=> array('config_value' => '0', 'is_dynamic' => '0'),
		'queue_trigger_posts'	=> array('config_value' => '3', 'is_dynamic' => '0'),
		'pm_max_recipients'		=> array('config_value' => '0', 'is_dynamic' => '0'),
		'dbms_version'			=> array('config_value' => '', 'is_dynamic' => '0'),
	);

	/**
	* @var Array Config entries that were removed by the 3.0.3 update
	*/
	var $removed_config = array(
		// No config entries removed 3.0.2 -> 3.0.3
	);

	/**
	* @var Array All default permission settings
	*/
	var $acl_options = array(
		// Added permission
		'u_masspm_group'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
	);

	/**
	* @var Array All default roles
	*/
	var $acl_roles = array(
		// No role changes 3.0.2 -> 3.0.3
	);

	/**
	* @var Array All default role data
	*/
	var $acl_role_data = array(
		'ROLE_USER_LIMITED'		=> array(
			'OPTION_IN'	=> array('u_masspm', 'u_masspm_group'),
		),
		'ROLE_USER_NOPM '		=> array(
			'OPTION_IN'	=> array('u_masspm_group'),
		),
		'ROLE_USER_NOAVATAR'	=> array(
			'OPTION_IN'	=> array('u_masspm', 'u_masspm_group'),
		),
		'ROLE_USER_NOAVATAR '	=> array(
			'OPTION_IN'	=> array('u_masspm', 'u_masspm_group'),
		),
	);

	/**
	* @var Array All default extension groups
	*/
	var $extension_groups = array(
		// No extension group changes 3.0.2 -> 3.0.3
	);

	/**
	* @var Array All default extensions
	*/
	var $extensions = array(
		// No extension changes 3.0.2 -> 3.0.3
	);

	/**
	* Define the module structure so that we can populate the database without
	* needing to hard-code module_id values
	*/
	var $module_categories = array(
		// No Module categories changes 3.0.2 -> 3.0.3
	);
	var $module_extras = array(
		// No Module extra changes 3.0.2 -> 3.0.3
	);

	/**
	* @var Array All default groups
	*/
	var $groups = array(
		// No Group changes 3.0.2 -> 3.0.3
	);
	
	/**
	* @var Array All default report reasons
	*/
	var $report_reasons = array(
		// No reason changes 3.0.2 -> 3.0.3
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
		$schema_data['phpbb_groups']['COLUMNS']['group_max_recipients']				= array('UINT', 0);
		$schema_data['phpbb_styles_template']['COLUMNS']['template_inherits_id']	= array('UINT:4', 0);
		$schema_data['phpbb_styles_template']['COLUMNS']['template_inherit_path']	= array('VCHAR', '');
	}
}