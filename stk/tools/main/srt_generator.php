<?php
/**
*
* @package Support Toolkit - Support Request Generator
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

class srt_generator
{
	/**
	 * @var		Integer	The current step
	 * @access	public
	 */
	var $step = 0;

	/**
	 * @var		String	Latest phpBB version fallback
	 *					for the version lists the latest version is read from
	 *					the phpBB server. If the tool can't fetch data from
	 *					there for whatever reason use this version number
	 * @access	private
	 */
	var $_version_fallback = '3.0.7-pl1';

	/**
	 * @var		Array	An array containing all data for this step
	 * @access	private
	 * @notice	when handeling the step (after submit)
	 *			there is less information stored in here!
	 */
	var $_data = array();

	/**
	 * @var		String	The template
	 * @access	private
	 */
	var $_template = '';

	/**
	 * This method is always called, so we "abuse"
	 * it for this tool to setup some stuff we need
	 * later on.
	 */
	function tool_active()
	{
		global $acm_type, $template, $user;

		// I don't think this will ever happen, but if a user has
		// caching turned off he can't use this tool. We store data
		// from previous steps in the cache.
		if ($acm_type == 'null')
		{
			return 'SRT_NO_CACHING';
		}

		// Get the step
		$this->step = request_var('step', $this->step);

		// Set the data that is always needed
		switch ($this->step)
		{
			case 0	:
				// Teh 0 is a special number
				return true;
			break;

			case 1	:
				$this->_data = array(
					array(
						'name'		=> 'phpbb_version',
						'type'		=> array('dropdown', array($this, '_gen_phpbb_versions')),
					),
					array(
						'name'		=> 'mod_related',
						'type'		=> 'boolean',
						'default'	=> 'no',
					),
					array(
						'name'		=> 'convert_status',
						'type'		=> 'boolean',
						'default'	=> 'no',
					),
					array(
						'name'		=> 'hacked',
						'type'		=> 'boolean',
						'default'	=> 'no',
					),
				);
			break;

			case 2	:
				$this->_data = array(
					array(
						'name'		=> 'board_url',
						'type'		=> array('text', 'generate_board_url', false),
						'default'	=> '',
					),
					array(
						'name'		=> 'host',
						'type'		=> 'text',
						'default'	=> '',
					),
					array(
						'name'		=> 'install_type',
						'type'		=> array('dropdown', array($this, '_gen_options'), array('myself', 'third', 'someone_else', 'automated')),
					),
					array(
						'name'		=> 'conversion',
						'type'		=> array('dropdown', array($this, '_gen_options'), array('fresh', 'phpbb_update', 'convert_phpbb2', 'convert_other')),
					),
					array(
						'name'		=> 'mod_related',
						'type'		=> array('boolean', array($this, '_has_mods_installed')),
						'default'	=> 'no',
					),
					array(
						'name'		=> 'reg_required',
						'type'		=> 'boolean',
						'default'	=> 'no',
					),
				);
			break;

			case 3	:
				$this->_data = array(
					array(
						'name'		=> 'conversion_software',
						'type'		=> 'text',
						'default'	=> '',
					),
					array(
						'name'		=> 'update_version',
						'type'		=> array('dropdown', array($this, '_gen_phpbb_versions'), false),
						'default'	=> '',
					),
					array(
						'name'		=> 'mods_installed',
						'type'		=> array('textarea', array($this, '_prefill_customise_data'), 'mods'),
						'default'	=> '',
					),
					array(
						'name'		=> 'styles',
						'type'		=> array('textarea', array($this, '_prefill_customise_data'), 'styles'),
						'default'	=> '',
					),
					array(
						'name'		=> 'languages',
						'type'		=> array('textarea', array($this, '_prefill_customise_data'), 'languages'),
						'default'	=> '',
					),
					array(
						'name'		=> 'database',
						'type'		=> array('dropdown', array($this, '_gen_database_list')),
						'default'	=> '',
					),
					array(
						'name'		=> 'experience',
						'type'		=> array('dropdown', array($this, '_gen_options'), array('new_both', 'new_phpbb', 'new_php', 'comfort', 'experienced')),
					),
					array(
						'name'		=> 'test_user',
						'type'		=> 'text',
						'default'	=> '',
					),
					array(
						'name'		=> 'test_pass',
						'type'		=> 'text',
						'default'	=> '',
					),
					array(
						'name'		=> 'begin',
						'type'		=> 'textarea',
						'default'	=> '',
					),
					array(
						'name'		=> 'problem',
						'type'		=> 'textarea',
						'default'	=> '',
					)
				);
			break;

			case 4	:
				// Just return this is the generation stage
				return true;
			break;

			default	:
				trigger_error('NO_MODE');
			break;
		}

		// When viewing the language entries are needed
		if (!isset($_REQUEST['submit']))
		{
			foreach ($this->_data as $key => $row)
			{
				$this->_data[$key]['help_line']	= (isset($user->lang['SRT_HELP_LINES']["step{$this->step}"][$row['name']])) ? $user->lang['SRT_HELP_LINES']["step{$this->step}"][$row['name']] : '';
				$this->_data[$key]['notice']	= (isset($user->lang['SRT_NOTICES']["step{$this->step}"][$row['name']])) ? $user->lang['SRT_NOTICES']["step{$this->step}"][$row['name']] : '';
				$this->_data[$key]['question']	= $user->lang['SRT_QUESTIONS']["step{$this->step}"][$row['name']];
			}
		}

		// Return true to not break this ^^
		return true;
	}

	/**
	 * Generate all the Q/A pages
	 */
	function display_options()
	{
		global $template;

		// Validate the step
		if ($this->step < 0 || $this->step > 4)
		{
			// Reset everything
			$this->step = 0;
		}

		// Step 0 is special
		if ($this->step == 0)
		{
			return 'SRT_GENERATOR_LANDING';
		}

		// Step 4 outputs the SRT
		if ($this->step == 4)
		{
			$this->_build_srt();
			$template->assign_var('COMPILED_TEMPLATE', $this->_template);
		}

		// Send everyting to the template
		foreach ($this->_data as $row)
		{
			// If "type" is an array the second element is a callback
			if (is_array($row['type']))
			{
				// Call it
				$_callback_params	= (!empty($row['type'][2])) ? $row['type'][2] : array();
				$_callback_result	= call_user_func($row['type'][1], $_callback_params);
				$row['type']		= $row['type'][0];	// Fix var for later usage
			}

			// Assign all
			$template->assign_block_vars('questionrow', array(
				'NAME'		=> $row['name'],
				'QUESTION'	=> $row['question'],
				'HELP_LINE'	=> $row['help_line'],
				'DEFAULT'	=> (isset($row['default'])) ? $row['default'] : false,

				'S_OPTIONS'	=> ($row['type'] == 'dropdown' && isset($_callback_result)) ? $_callback_result : false,
				'S_PREFILL'	=> ($row['type'] != 'dropdown' && isset($_callback_result)) ? $_callback_result : false,
				'S_TYPE'	=> $row['type'],
			));

			// Empty $_callback_data to prevent unwanted cases
			unset($_callback_result);
		}

		// Some common stuff
		$template->assign_vars(array(
			'STEP'		=> $this->step,
			'U_ACTION'	=> append_sid(STK_INDEX, array('c' => 'main', 't' => 'srt_generator', 'step' => $this->step)),
		));

		// Output this
		page_header(user_lang('SRT_GENERATOR'));

		$template->set_filenames(array(
			'body' => 'tools/srt_generator.html',
		));

		page_footer();
	}

	/**
	 * Handle a submit
	 */
	function run_tool()
	{
		global $cache;

		// Step 0 is a special place to be, only available for special people
		// this user isn't special so kick him to the user spot
		if ($this->step == 0)
		{
			// Distory the previous data
			$cache->destroy('_stk_srt_generator');
			redirect(append_sid(STK_INDEX, array('c' => 'main', 't' => 'srt_generator', 'step' => 1)));
		}

		$previous_data = $cache->get('_stk_srt_generator');
		if ($previous_data === false)
		{
			// acm::get() returns fals when nothing is found. We need
			// an empty array
			$previous_data = array();
		}

		if (!isset($previous_data["step{$this->step}"]))
		{
			$previous_data["step{$this->step}"] = array();
		}

		// Fetch all the fields and merge with the old data
		foreach ($this->_data as $row)
		{
			if (!isset($_REQUEST[$row['name']]))
			{
				$previous_data["step{$this->step}"][$row['name']] = $row['default'];
			}
			else
			{
				$previous_data["step{$this->step}"][$row['name']] = request_var($row['name'], '');
			}
		}

		// cache for the next step
		$cache->put('_stk_srt_generator', $previous_data);

		// Send to the next step
		redirect(append_sid(STK_INDEX, array('c' => 'main', 't' => 'srt_generator', 'step' => ++$this->step)));
	}

	/**
	 * Generic method to build options for select boxes. This method will
	 * take the options as specified in the parameter and will assign the
	 * correct language strings to each option.
	 * @param	Array	$options	The options used in this dropdown box
	 * @return	String	A string containing all the options
	 * @access	private
	 */
	function _gen_options($options = array())
	{
		global $user;

		// No array, shouldn't happen but just in case
		if (!is_array($options))
		{
			return '';
		}

		// Create the list
		$_list = array();
		foreach ($options as $option)
		{
			if (!isset($user->lang['SRT_DROPDOWN_OPTIONS']["step{$this->step}"][$option]))
			{
				// No, next
				continue;
			}

			$_list[] = "<option value='{$option}'>" . $user->lang['SRT_DROPDOWN_OPTIONS']["step{$this->step}"][$option] . '</option>';
		}

		return implode('', $_list);
	}

	/**
	 * Generate an option list with all phpBB versions.
	 * Show everything here as a user *could* use this
	 * generator to build an SRT for a different board,
	 * we do however set the version of this board as
	 * default.
	 * @param	Boolean	$own_default	Set the users phpBB version as default
	 * @access	private
	 */
	function _gen_phpbb_versions($own_default = true)
	{
		global $config, $umil;

		// Contains a list with "special" versions that can't
		// be generated automatically
		$_special_versions = array(
			'3.0.7-pl1',
		);

		// Some non-stable releases that should show up
		$_non_stable = array(
			'3.0-rc8',
			'3.0-rc7',
			'3.0-rc6',
			'3.0-rc5',
			'3.0-rc4',
			'3.0-rc3',
			'3.0-rc2',
			'3.0-rc1',
			'3.0-b5',
			'3.0-b4',
			'3.0-b3',
			'3.0-b2',
			'3.0-b1',
			'2.0.0 - 2.0.23',
		);

		// Try to read the latest version number from the phpBB server.
		$vcheck = $umil->version_check('www.phpbb.com', '/updatecheck', '30x_qa.txt');
		$latest_version = '';
		if (!is_array($vcheck) || !isset($vcheck[0]) || isset($vcheck[1]))
		{
			// The received data isn't correct fallback
			$latest_version = $this->_version_fallback;
		}
		else
		{
			// Yay!
			$latest_version = $vcheck[0];
		}

		// The latest version can be a "-PL" release, in that case strip
		// the PL thing. PL release are handled seperate
		if (($dashpos = strpos($latest_version, '-')) !== false)
		{
			$latest_version = substr($latest_version, 0, $dashpos);
		}

		// Make a list 3.0.0/$latest_version
		$versions	= array();
		$min_rev	= substr(strrchr($latest_version, '.'), 1);

		while ($min_rev >= 0)
		{
			$versions[] = '3.0.' . $min_rev--;
		}

		// Merge all the static arrays into here
		$versions = array_merge($versions, $_special_versions, $_non_stable);

		// Sort them
		usort($versions, 'version_compare');

		// Now build the options
		$options = array();
		foreach ($versions as $version)
		{
			// This version our version?
			$selected = '';
			if ($own_default === true && version_compare(strtolower($version), strtolower($config['version']), 'eq'))	// use strtolower as php seems to think that x.x.x-PL1 != x.x.x-pl1
			{
				$selected = ' selected=\'selected\'';
			}

			$option_value = str_replace(array('.', ' '), array('_', '-'), $version);

			// Use array_unshift to get the versions sorted correctly
			array_unshift($options, "<option value='{$option_value}'{$selected}>phpBB $version</option>");
		}

		// Manually add the "I don't know"
		array_unshift($options, '<option value=\'-1\'>' . user_lang('I_DONT_KNOW') . '</option>');

		// return something usefull
		return implode('', $options);
	}

	/**
	 * Try to correctly set the "mod_related" field.
	 * If AutoMOD is installed we see whether MODs are
	 * in the AutoMOD table and set the checkbox accordingly.
	 */
	function _has_mods_installed()
	{
		global $db;

		$has_mods = 'no';

		if(file_exists(PHPBB_ROOT_PATH . 'includes/functions_mods.' . PHP_EXT))	// Not the most beatyfull way but it works
		{
			$sql = 'SELECT mod_name, mod_version
				FROM ' . MODS_TABLE . '
				ORDER BY mod_name ASC';
			$result	= $db->sql_query_limit($sql, 1);
			if ($db->sql_fetchrow($result))
			{
				$has_mods = 'yes';
			}
			$db->sql_freeresult($result);

		}

		return $has_mods;
	}

	/**
	 * Generate the SRT based upon the user input
	 * @access	private
	 * @return	void
	 */
	function _build_srt()
	{
		global $cache, $user;

		// Get the submitted data
		$_answers = $cache->get('_stk_srt_generator');
		if ($_answers === false)
		{
			// Something went wrong :/
			trigger_error('COULDNT_LOAD_SRT_ANSWERS');
		}

		// Header
		$this->_template[] = '[size=115][color=#368AD2][b]Support Request Template[/b][/color][/size]<br />';

		// Run through all the steps
		foreach ($user->lang['SRT_QUESTIONS'] as $_step => $_step_questions)
		{
			// Run through all the questions
			foreach ($_step_questions as $_field => $_question)
			{
				// No anwser provided move on.
				if (empty($_answers[$_step][$_field]))
				{
					$this->_template[] = "[color=#cc6600][b]{$_question}[/b][/color]: [i]No answer given[/i]";
					continue;
				}

				// Some hardcore formatting
				if (in_array($_field, array('phpbb_version', 'update_version')))
				{
					if ($_answers[$_step][$_field] == '-1')
					{
						$_answers[$_step][$_field] = $user->lang['I_DONT_KNOW'];
					}
					else
					{
						$_answers[$_step][$_field] = str_replace(array('_', '-'), array('.', ' '), $_answers[$_step][$_field]);
					}
				}
				elseif (in_array($_field, array('install_type', 'conversion', 'experience')))
				{
					$_answers[$_step][$_field] = $user->lang['SRT_DROPDOWN_OPTIONS'][$_step][$_answers[$_step][$_field]];
				}

				// Add to the template
				$this->_template[] = "[color=#cc6600][b]{$_question}[/b][/color]: {$_answers[$_step][$_field]}";
			}
		}
		
		// Footer
		$this->_template[] = '[size=60]Generated by Support Toolkit SRT Generator.[/size]';

		// Set the correct format
		$this->_template = implode('<br />', $this->_template);
	}

	/**
	 * Create a list of the supported DBMS, and select the DBMS
	 * used by this user.
	 */
	function _gen_database_list()
	{
		global $dbms;

		if (!function_exists('get_available_dbms'))
		{
			include PHPBB_ROOT_PATH . 'includes/functions_install.' . PHP_EXT;
		}

		// Fetch all DBMS
		$_dbms = get_available_dbms(false, true);

		// Build the options
		$_options = array();
		foreach ($_dbms as $_driver => $_db)
		{
			$selected	= ($_driver == $dbms) ? " selected='selected'" : '';
			$_options[]	= "<option value='{$_driver}'{$selected}>{$_db['LABEL']}</option>";
		}

		return implode('', $_options);
	}

	/**
	 * Try to prefill some textarea's with data that can be
	 * retrieved from the database.
	 * @param	String	$mode	The data that will be retrieved. Is one of
	 *							mods|styles|languages
	 * @return	The data that will be prefilled in the textarea
	 * @access	private
	 */
	function _prefill_customise_data($mode = '')
	{
		global $db;

		$_prefill = array();

		switch ($mode)
		{
			case 'mods' :
				// If AutoMOD is installed prefill all MODs installed through it
				if(file_exists(PHPBB_ROOT_PATH . 'includes/functions_mods.' . PHP_EXT))	// Not the most beatyfull way but it works
				{
					$sql = 'SELECT mod_name, mod_version
						FROM ' . MODS_TABLE . '
						ORDER BY mod_name ASC';
					$mods_result = $db->sql_query($sql);

					while ($row = $db->sql_fetchrow($mods_result))
					{
						$_prefill[] = $row['mod_name'] . '(' . $row['mod_version'] . ')';
					}
					$db->sql_freeresult($mods_result);
				}
			break;

			case 'styles' :
				// Display all styles known by the board. non-active styles will be marked
				$sql = 'SELECT style_name, style_active
					FROM ' . STYLES_TABLE;
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$_prefill[] = $row['style_name'] . (($row['style_active'] == 0) ? ' [i](not active)[/i]' : '');
				}

				$db->sql_freeresult($result);
			break;

			case 'languages' :
				// Display all languages known by the board. non-active packs will be marked
				$sql = 'SELECT lang_english_name
					FROM ' . LANG_TABLE . '
					ORDER BY lang_english_name';
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$_prefill[] = $row['lang_english_name'];
				}
				$db->sql_freeresult($result);
			break;

			default :
				return '';
		}

		return implode(', ', $_prefill);
	}
}
?>