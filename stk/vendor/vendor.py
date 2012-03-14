"""Support Toolkit vender.py
@package SupportToolkit
@copyright (c) 2012 phpBB Group
@license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2

This utility copies all vendor files that are required by the Support Toolkit
into their correct locations. This tool expects that the vendor repositories
are already checked out.
"""
from os import makedirs
from os.path import dirname, exists, isdir
from shutil import copy2, copytree
import types

def getFileList():
	return [
		["adm/images/",
					[
						"arrow_down.gif",
						"arrow_left.gif",
						"arrow_right.gif",
						"bg_button.gif",
						"bg_tabs1.gif",
						"bg_tabs2.gif",
						"corners_left.gif",
						"corners_right.gif",
						"gradient2b.gif",
						"innerbox_bg.gif",
						"phpbb_logo.gif",
						"toggle.gif",
					],
					"view/images/"
		],
		["adm/style/admin.css", "view/theme/admin.css"],
		["includes/",
					[
						"class_loader.php",
						"constants.php",
						"functions.php",
						"session.php",
						"startup.php",
					],
					"phpBB/includes/"
		],
		["includes/auth/", "phpBB/includes/auth/"],
		["includes/cache/",
					[
						"factory.php",
						"service.php",
					],
					"phpBB/includes/cache/"
		],
		["includes/cache/driver/",
					[
						"base.php",
						"interface.php",
						"null.php",
					],
					"phpBB/includes/cache/driver/"
		],
		["includes/config/",
					[
						"config.php",
						"db.php",
					],
		"phpBB/includes/config/"],
		["includes/db/", "phpBB/includes/db/"],
		["includes/request/", "phpBB/includes/request/"],
		["includes/template/",
					[
						"context.php",
						"compile.php",
						"filter.php",
						"locator.php",
						"path_provider.php",
						"path_provider_interface.php",
						"renderer.php",
						"renderer_eval.php",
						"renderer_include.php",
						"template.php",
					],
					"phpBB/includes/template/"
		],
		["includes/utf/",
					[
						"utf_normalizer.php",
						"utf_tools.php",
					],
					"phpBB/includes/utf/"
		],
		["includes/utf/data/", "phpBB/includes/utf/data/"]
	];

def _copy(src, dest):
	if exists(dest):
		print 'Skipping: ' + src + ' (destination already exists)'
		return

	print 'Copying: ' + src + ' to: ' + dest
	if isdir(src):
		copytree(src, dest)
	else:
		if not exists(dirname(dest)):
			makedirs(dirname(dest))
		copy2(src, dest)

def main():
	basesrc		= './stk/vendor/phpBB/phpBB/'
	basedest	= './stk/'

	for file in getFileList():
		if isinstance(file[1], types.ListType):
			for f in file[1]:
				_copy(basesrc + file[0] + f, basedest + file[2] + f);
		else:
			_copy(basesrc + file[0], basedest + file[1]);


if __name__ == "__main__":
	main();
