<?php
/**
*
* @package Support Toolkit
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

class erk_style_dir_repair
{
	function run()
	{
		global $config, $db;

		$config['default_style'] = (!isset($config['default_style']) || !$config['default_style']) ? 1 : $config['default_style'];
		$sql = 'SELECT t.template_path
			FROM ' . STYLES_TABLE . ' s, ' . STYLES_TEMPLATE_TABLE . ' t, ' . STYLES_THEME_TABLE . ' c, ' . STYLES_IMAGESET_TABLE . " i
			WHERE s.style_id = {$config['default_style']}
				AND t.template_id = s.template_id
				AND c.theme_id = s.theme_id
				AND i.imageset_id = s.imageset_id";
		$result	= $db->sql_query($sql);
		$t_path	= $db->sql_fetchfield('template_path', false, $result);
		$db->sql_freeresult($result);

		if (empty($t_path) || !is_dir(PHPBB_ROOT_PATH . 'styles/' . $t_path))
		{
			// The style directory of the active style doesn't exist anymore
			$this->repair();
		}

		return true;
	}

	function repair()
	{
		global $db;

		$stylelist = filelist(PHPBB_ROOT_PATH . 'styles/', '', 'cfg');
		ksort($stylelist);

		// Loop throught the files and try to find a style we can use.
		// To be usable the directory name in the style.cfg is the same as the directory.
		foreach (array_keys($stylelist) as $styledirname)
		{
			if (!in_array('style.cfg', $stylelist[$styledirname]))
			{
				continue;
			}

			// Read the cfg, should always be index 0
			$items = parse_cfg_file(PHPBB_ROOT_PATH . 'styles/' . $styledirname . 'style.cfg');

			// Unify the name in the cfg to something used as a directory
			// Spaces -> '_'
			// All lowercase
			$stylename = utf8_clean_string(str_replace(' ', '_', $items['name']));

			// Clean up the dirname
			$dirname = (substr($styledirname, -1) == '/') ? substr($styledirname, 0, -1) : $styledirname;

			// If not the same switch to the next one
			if ($dirname != $stylename)
			{
				continue;
			}

			// If this style isn't installed we will install the style at this point.
			$sql = 'SELECT style_id
				FROM ' . STYLES_TABLE . "
				WHERE style_name = '" . $db->sql_escape($items['name']) . "'";
			$result	= $db->sql_query($sql);
			$sid	= $db->sql_fetchfield('style_id', false, $result);
			$db->sql_freeresult($result);

			if (empty($sid))
			{
				// Install the style
				if (!class_exists('acp_styles'))
				{
					include PHPBB_ROOT_PATH . 'includes/acp/acp_styles.' . PHP_EXT;
				}
				$ac = new acp_styles();

				// Nasty, but the style installer fetches these in the method o_0
				$GLOBALS['_REQUEST']['path']	= $stylename;
				$GLOBALS['_POST']['update']		= true;

				// Call the style installer
				$ac->install('style');

				// Fetch the id
				$sql = 'SELECT style_id
					FROM ' . STYLES_TABLE . "
					WHERE style_name = '" . $db->sql_escape($items['name']) . "'";
				$result	= $db->sql_query($sql);
				$sid	= $db->sql_fetchfield('style_id', false, $result);
				$db->sql_freeresult($result);
			}

			// Set this style as the active style
			set_config('default_style', $sid);
			set_config('override_user_style', 1);	// Overriding the style should enable the board for everyone

			return;
		}

		echo 'The support toolkit couldn\'t find an available style. Please seek further assistance in the support forums on <a href="http://www.phpbb.com/community/viewforum.php?f=46" title="phpBB.com Support forum">phpbb.com</a>';
		garbage_collection();
		exit_handler();
	}
}