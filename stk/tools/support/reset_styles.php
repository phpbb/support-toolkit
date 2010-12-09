<?php
/**
*
* @package Support Toolkit - Reset Styles
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

class reset_styles
{
	/**
	* Display Options
	*
	* Output the options available
	*/
	function display_options()
	{
		global $config, $user;

		$user->add_lang('acp/board');

		return array(
			'title'	=> 'RESET_STYLES',
			'vars'	=> array(
				'legend1'				=> 'RESET_STYLES',
				'style_id'				=> array('lang' => 'STYLE', 'type' => 'custom', 'function' => 'style_select2', 'explain' => true, 'default' => $config['default_style']),
			)
		);
	}

	/**
	* Run Tool
	*
	* Does the actual stuff we want the tool to do after submission
	*/
	function run_tool(&$error)
	{
		global $db;

        if (!check_form_key('reset_styles'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		$style_id = request_var('style_id', 0);

		if (!$style_id)
		{
			return;
		}

		set_config('default_style', $style_id);

		$db->sql_query('UPDATE ' . USERS_TABLE . ' SET user_style = ' . $style_id);

		trigger_error('RESET_STYLE_COMPLETE');
	}
}

function style_select2($value, $key)
{
	return '<select name="' . $key . '">' . style_select($value) . '</select>';
}
