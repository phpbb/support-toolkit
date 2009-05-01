<?php
/**
*
* @package Support Tool Kit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* Build configuration template for acp configuration pages
*
* Slightly modified from adm/index.php
*/
function build_cfg_template($tpl_type, $name, $vars)
{
	global $user;

	$tpl = array();

	$default = (isset($vars['default'])) ? request_var($name, $vars['default']) : request_var($name, '');

	switch ($tpl_type[0])
	{
		case 'text':
			// If requested set some vars so that we later can display the link correct
			if (isset($vars['select_user']) && $vars['select_user'] === true)
			{
				$tpl['find_user']		= true;
				$tpl['find_user_field']	= $name;
			}
		case 'password':
			$size = (int) $tpl_type[1];
			$maxlength = (int) $tpl_type[2];

			$tpl['tpl'] = '<input id="' . $name . '" type="' . $tpl_type[0] . '"' . (($size) ? ' size="' . $size . '"' : '') . ' maxlength="' . (($maxlength) ? $maxlength : 255) . '" name="' . $name . '" value="' . $default . '" />';
		break;

		case 'textarea':
			$rows = (int) $tpl_type[1];
			$cols = (int) $tpl_type[2];

			$tpl['tpl'] = '<textarea id="' . $name . '" name="' . $name . '" rows="' . $rows . '" cols="' . $cols . '">' . $default . '</textarea>';
		break;

		case 'radio':
			$name_yes	= ($default) ? ' checked="checked"' : '';
			$name_no	= (!$default) ? ' checked="checked"' : '';

			$tpl_type_cond = explode('_', $tpl_type[1]);
			$type_no = ($tpl_type_cond[0] == 'disabled' || $tpl_type_cond[0] == 'enabled') ? false : true;

			$tpl_no = '<label><input type="radio" name="' . $name . '" value="0"' . $name_no . ' class="radio" /> ' . (($type_no) ? $user->lang['NO'] : $user->lang['DISABLED']) . '</label>';
			$tpl_yes = '<label><input type="radio" id="' . $name . '" name="' . $name . '" value="1"' . $name_yes . ' class="radio" /> ' . (($type_no) ? $user->lang['YES'] : $user->lang['ENABLED']) . '</label>';

			$tpl['tpl'] = ($tpl_type_cond[0] == 'yes' || $tpl_type_cond[0] == 'enabled') ? $tpl_yes . $tpl_no : $tpl_no . $tpl_yes;
		break;

		case 'checkbox':
			$checked	= ($default) ? ' checked="checked"' : '';

			$tpl['tpl'] = '<input type="checkbox" id="' . $name . '" name="' . $name . '"' . $checked . ' />';
		break;

		case 'select':
		case 'select_multiple' :
		case 'custom':

			$return = '';

			if (isset($vars['function']))
			{
				$call = $vars['function'];
			}
			else
			{
				break;
			}

			if (isset($vars['params']))
			{
				$args = array();
				foreach ($vars['params'] as $value)
				{
					switch ($value)
					{
						case '{CONFIG_VALUE}':
							$value = $default;
						break;

						case '{KEY}':
							$value = $name;
						break;
					}

					$args[] = $value;
				}
			}
			else
			{
				$args = array($default, $name);
			}

			$return = call_user_func_array($call, $args);

			if ($tpl_type[0] == 'select')
			{
				$tpl['tpl'] = '<select id="' . $name . '" name="' . $name . '">' . $return . '</select>';
			}
			else if ($tpl_type[0] == 'select_multiple')
			{
				$tpl['tpl'] = '<select id="' . $name . '" name="' . $name . '[]" multiple="multiple">' . $return . '</select>';	
			}
			else
			{
				$tpl['tpl'] = $return;
			}

		break;

		default:
		break;
	}

	if (isset($vars['append']))
	{
		$tpl['tpl'] .= $vars['append'];
	}

	return $tpl;
}

/**
* Use Lang
*
* A function for checking if a language key exists and changing the inputted var to the language value if it does.
* Build for the array_walk used on $error
*/
function use_lang(&$lang_key)
{
	global $user;

	if (isset($user->lang[$lang_key]))
	{
		$lang_key = $user->lang[$lang_key];
	}
}

/**
* Stk add lang
*
* A wrapper for the $user->add_lang method that will use the custom language path that is used
* in this tool kit.
* The function shall first try to include the file in the users language, if that fails it will
* take the boards default language, if that also fails it will fall back to English
*
* @param	String	$lang_file	the name of the language file
*/
function stk_add_lang($lang_file = '')
{
	global $config, $user;

	// Path from the default lang directory
	$path = './../../stk/language/';

	// Set the correct language path
	if (file_exists(STK_ROOT_PATH . "language/{$user->data['user_lang']}/{$lang_file}." . PHP_EXT))
	{
		$path .= $user->data['user_lang'];
	}
	else if (file_exists(STK_ROOT_PATH . 'language/' . basename($config['default_lang']) . "/{$lang_file}." . PHP_EXT))
	{
		$path .= basename($config['default_lang']);
	}
	else if (file_exists(STK_ROOT_PATH . "language/en/{$lang_file}." . PHP_EXT))
	{
		$path .= 'en';
	}
	else
	{
		// This should really never happen
		trigger_error("Language file stk/language/{$user->data['user_lang']}/$lang_file." . PHP_EXT . ' missing!', E_USER_ERROR);
	}

	// Include the file
	$user->add_lang($path . '/' . $lang_file);
}

/**
* Output a custom page. This function will do two things:
* 1) Assign two template variables: {L_TITLE} and {L_TITLE_EXPLAIN}, based on the content of $title.
* 2) Parse the page
*
* @param	String	$file				The template file that is used for this page (minus .html)
* @param	String	$title				The page title, can be a key for the user->lang array
* @param	array	$sprintf_title		A array with replacements for the title
* @param	array	$sprintf_explain	A array with replacemetns for the explain text
*/
function parse_page($file, $title = '', $sprintf_title = array(), $sprintf_explain = array())
{
	global $template, $user;

	// Also allow the tool author to use only the lang key
	$l_title	= (isset($user->lang[$title])) ? $user->lang[$title] : $title;
	$l_explain	= (isset($user->lang[$title . '_EXPLAIN'])) ? $user->lang[$title . '_EXPLAIN'] : '';	// Only set if the key exists

	// Run vsprintf if needed
	if (!empty($sprintf_title))
	{
		$l_title = vsprintf($l_title, $sprintf_title);
	}
	if (!empty($sprintf_explain))
	{
		$l_explain = vsprintf($l_explain, $sprintf_explain);
	}

	// Set the template vars
	$template->assign_vars(array(
		'L_TITLE'			=> $l_title,
		'L_TITLE_EXPLAIN'	=> $l_explain,
	));

	page_header($l_title);

	$template->set_filenames(array(
		'body' => $file . '.html',
	));

	page_footer();
}
?>