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

class stk_style_dir_repair
{
	function run()
	{
		global $config, $db;

		$config['default_style'] = (!isset($config['default_style']) || !$config['default_style']) ? 1 : $config['default_style'];
		$sql = 'SELECT s.style_id, t.template_path
			FROM ' . STYLES_TABLE . ' s, ' . STYLES_TEMPLATE_TABLE . ' t, ' . STYLES_THEME_TABLE . ' c, ' . STYLES_IMAGESET_TABLE . " i
			WHERE s.style_id = {$config['default_style']}
				AND t.template_id = s.template_id
				AND c.theme_id = s.theme_id
				AND i.imageset_id = s.imageset_id";
		$result = $db->sql_query($sql);
		// No styles in the database
		$data = $db->sql_fetchrow($result);

		if (!is_dir(PHPBB_ROOT_PATH . 'styles/' . $data['template_path']))
		{
			// The style directory of the active style doesn't exist anymore
			$this->repair();
			header('Location: ' . STK_INDEX);
			exit;
		}

		return true;
	}

	function repair()
	{
		global $cache, $db, $umil;

		$dh = @opendir(PHPBB_ROOT_PATH . 'styles/');
		while (($fname = readdir($dh)) !== false)
		{
			if (!is_dir(PHPBB_ROOT_PATH . 'styles/' . $fname) || $fname[0] == '.')
			{
				continue;
			}

			if ($cfg = file(PHPBB_ROOT_PATH . "styles/$fname/style.cfg"))
			{
				$items = parse_cfg_file('', $cfg);
			}

			// A style folder *could* be renamed only take the first style of which the name in the style.cfg is the same as the directory.
			if ($items['name'] == $fname)
			{
				// Set this style as the default
				$sql = 'SELECT s.style_id
					FROM (' . STYLES_TABLE . ' s, ' . STYLES_TEMPLATE_TABLE . " t)
					WHERE t.template_path = '" . $db->sql_escape($fname) . "'
						AND s.template_id = t.template_id";
				$result = $db->sql_query($sql);
				$sid	= $db->sql_fetchfield('style_id', false, $result);
				$db->sql_freeresult($result);

				// Set default style
				set_config('default_style', $sid);
				closedir($dh);

				$cache->purge();
				$umil->cache_purge(array('template', 'theme', 'imageset'));

				return;
			}
		}
		closedir($dh);

		// Couldn't restore
		echo 'The support toolkit couldn\'t find an available style. Please seek further assistance in the support forums on <a href="http://www.phpbb.com/community/viewforum.php?f=46" title="phpBB.com Support forum>phpbb.com</a>';
		garbage_collection();
		exit_handler();

	}
}