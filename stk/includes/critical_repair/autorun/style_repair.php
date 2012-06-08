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

class erk_style_repair
{
	function run()
	{
		global $config, $db;

		$config['default_style'] = (!isset($config['default_style']) || !$config['default_style']) ? 1 : $config['default_style'];
		$sql = 'SELECT s.style_id, t.template_path
			FROM ' . STYLES_TABLE . ' s, ' . STYLES_TEMPLATE_TABLE . ' t, ' . STYLES_THEME_TABLE . ' c, ' . STYLES_IMAGESET_TABLE . ' i
			WHERE s.style_id = ' . (int) $config['default_style'] . '
				AND t.template_id = s.template_id
				AND c.theme_id = s.theme_id
				AND i.imageset_id = s.imageset_id';
		$result = $db->sql_query($sql);
		// No styles in the database
		$data = $db->sql_fetchrow($result);
		if (empty($data))
		{
			// Styles appear to be broken.  Attempt automatic repair
			$this->repair();
		}
		$db->sql_freeresult($result);
		return true;
	}

	function repair()
	{
		global $db, $table_prefix;

		$sql = 'SELECT s.style_id
			FROM ' . STYLES_TABLE . ' s, ' . STYLES_TEMPLATE_TABLE . ' t, ' . STYLES_THEME_TABLE . ' c, ' . STYLES_IMAGESET_TABLE . " i
			WHERE t.template_id = s.template_id
				AND c.theme_id = s.theme_id
				AND i.imageset_id = s.imageset_id";
		$result2 = $db->sql_query_limit($sql, 1);
		$row = $db->sql_fetchrow($result2);
		if ($row)
		{
			// There is a style in the database, so we are lucky
			set_config('default_style', $row['style_id']);
		}
		else
		{
			// Not so lucky...need to add a style into the database to access the Support Toolkit (can not guarentee this style will work for the board however).
			$template_id = $theme_id = $imageset_id = $style_id = $style_name = false;
			foreach (array('template', 'theme', 'imageset') as $mode)
			{
				$var = $mode . '_id';
				$subpath = ($mode != 'style') ? "$mode/" : '';

				$result = $db->sql_query('SELECT * FROM ' . $table_prefix . 'styles_' . $mode);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);
				if ($row && file_exists(PHPBB_ROOT_PATH . "styles/{$mode}_path/$subpath$mode.cfg"))
				{
					// There already is one of this item in the database, so no need to add it.
					$$var = $row[$var];

					if ($mode == 'template')
					{
						$style_name = $row['template_name'];
					}

					continue;
				}

				$dp = @opendir(PHPBB_ROOT_PATH . 'styles');
				if ($dp)
				{
					while (($file = readdir($dp)) !== false)
					{
						if ($file[0] != '.' && file_exists(PHPBB_ROOT_PATH . "styles/$file/$subpath$mode.cfg"))
						{
							if ($cfg = file(PHPBB_ROOT_PATH . "styles/$file/$subpath$mode.cfg"))
							{
								$items = parse_cfg_file('', $cfg);
								$name = (isset($items['name'])) ? trim($items['name']) : false;

								$sql_ary = array(
									$mode . '_name'			=> $name,
									$mode . '_copyright'	=> $items['copyright'],
									$mode . '_path'			=> $file,
								);

								if ($mode == 'theme')
								{
									$sql_ary['theme_data'] = '';
								}

								$db->sql_query('INSERT INTO ' . $table_prefix . 'styles_' . $mode . ' ' . $db->sql_build_array('INSERT', $sql_ary));

								$$var = $db->sql_nextid();

								if ($mode == 'template')
								{
									$style_name = $name;
								}

								break;
							}
						}
					}
					closedir($dp);
				}
			}

			if ($template_id && $theme_id && $imageset_id)
			{
				// We've got one of each, so we can add a new style and repair this.
				$sql_ary = array(
					'style_name'		=> $style_name,
					'style_copyright'	=> '',
					'style_active'		=> 1,
					'template_id'		=> $template_id,
					'theme_id'			=> $theme_id,
					'imageset_id'		=> $imageset_id,
				);
				$db->sql_query('INSERT INTO ' . STYLES_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary));
				$style_id = $db->sql_nextid();

				// That should be everything, only reset the board style and purge the cache yet
				set_config('default_style', $style_id);
			}
			else
			{
				// Can't use trigger_error
				echo 'We could not automatically add a new style.  Please install at least one style on your phpBB3 forum and try again.';
				garbage_collection();
				exit_handler();
			}
		}

		$db->sql_freeresult($result2);
	}
}