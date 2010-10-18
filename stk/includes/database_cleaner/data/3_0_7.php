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
	* @var Array The bots
	*/
	var $bots = array(
		// No bot changes 3.0.6 -> 3.0.7
	);

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

	/**
	* @var Array All default permission settings
	*/
	var $permissions = array(
		// No permission changes 3.0.6 -> 3.0.7
	);

	/**
	 * Define the module structure so that we can populate the database without
	 * needing to hard-code module_id values
	 */
	var $module_categories = array(
		// No Module categories changes 3.0.6 -> 3.0.7
	);
	var $module_extras = array(
		// No Module extra changes 3.0.6 -> 3.0.7
	);

	/**
	* @var Arra All default groups
	*/
	var $groups = array(
		// No Group changes 3.0.6 -> 3.0.7
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
		// Add key
		$schema_data['phpbb_topics_track']['KEYS']['topic_id']	= array('INDEX', 'topic_id');

		// Remove key
		unset($schema_data['phpbb_log']['KEYS']['log_time']);
	}
}