"""Support Toolkit vender.py
@package SupportToolkit
@copyright (c) 2012 phpBB Group
@license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2

This utility copies all vendor files that are required by the Support Toolkit
into their correct locations. This tool expects that the vendor repositories
are already checked out.
"""
import argparse;
from os import chdir, getcwd, makedirs, remove;
from os.path import dirname, exists, isdir;
from shutil import copy2, copytree, rmtree;
from subprocess import PIPE, Popen;
import types;

class STKVendor:
	__phpBBFiles = [
		[
			"",
			[
				"composer.json",
				"composer.lock",
			],
			"phpBB/"
		],
		[
			"adm/images/",
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
		[
			"adm/style/admin.css",
			"view/theme/admin.css"
		],
		[
			"includes/",
			[
				"constants.php",
				"functions.php",
				"session.php",
				"startup.php",
				"user.php",
			],
			"phpBB/includes/"
		],
		[
			"includes/auth/",
			"phpBB/includes/auth/"
		],
		[
			"includes/cache/",
			[
				"factory.php",
				"service.php",
			],
			"phpBB/includes/cache/"
		],
		[
			"includes/cache/driver/",
			"phpBB/includes/cache/driver/"
		],
		[
			"includes/config/",
			[
				"config.php",
				"db.php",
			],
			"phpBB/includes/config/"
		],
		[
			"includes/db/",
			"phpBB/includes/db/"
		],
		[
			"includes/request/",
			"phpBB/includes/request/"
		],
		[
			"includes/style/",
			[
				"path_provider.php",
				"path_provider_interface.php",
				"resource_locator.php",
				"style.php",
				"template.php",
				"template_compile.php",
				"template_context.php",
				"template_filter.php",
				"template_renderer.php",
				"template_renderer_include.php",
			],
			"phpBB/includes/style/"
		],
		[
			"includes/utf/",
			[
				"utf_normalizer.php",
				"utf_tools.php",
			],
			"phpBB/includes/utf/"
		],
		[
			"includes/utf/data/",
			"phpBB/includes/utf/data/"
		]
	];

	__repos = {
		"MODX":		"master",
		"phpBB":	"develop",
		"Pimple":	"master",
		"UMIL":		"master",
	};

	args	= [];
	cwd		= '';

	def __init__(self):
		self.args	= self.getCommandLineArgs();
		self.cwd	= getcwd();

	def getCommandLineArgs(self):
		parser = argparse.ArgumentParser(description='Script that copies vendor files to the correct location into the Support Toolkit tree. This script assumes that the vendor submodules are already checked out.');
		parser.add_argument(
			"-f",
			"--force",
			dest="force",
			action="store_true",
			help="Update files, setting this parameter will force the script to overwrite the files if they already exist"
		);
		parser.add_argument(
			"-s",
			"--setup",
			dest="setup",
			action="store_true",
			help="Initialise the submodules"
		);
		parser.add_argument(
			"-u",
			"--update",
			dest="update",
			action="store_true",
			help="Update the submodules to point to the latest revision in the tree",
		);
		return parser.parse_args();

	def copyphpBBFiles(self):
		basesrc		= './stk/vendor/phpBB/phpBB/';
		basedest	= './stk/';

		for file in self.__phpBBFiles:
			if isinstance(file[1], types.ListType):
				for f in file[1]:
					self._copy(basesrc + file[0] + f, basedest + file[2] + f, self.args.force);
			else:
				self._copy(basesrc + file[0], basedest + file[1], self.args.force);

	def _copy(self, src, dest, update=False):
		if (exists(dest) and update == False):
			print ('\033[91m' + 'Skipping: ' + '\033[0m' + src + ' (destination already exists)');
			return False;

		print (('\033[92m' + 'Copying: ' + '\033[0m' if update == False else '\033[94m' + 'Force copying: ' + '\033[0m') + src + ' to: ' + dest);
		if isdir(src):
			if (exists(dirname(dest)) and update == True):
				rmtree(dest);

			copytree(src, dest);
		else:
			if not exists(dirname(dest)):
				makedirs(dirname(dest));
			elif (exists(dest) and update == True):
				remove(dest);

			copy2(src, dest);

		return True;

	def installComposor(self):
		chdir('./stk/phpBB/');
		p1 = Popen(['curl', '-s', 'http://getcomposer.org/installer'], stdout=PIPE, stderr=PIPE);
		p2 = Popen(['php'], stdin=p1.stdout, stdout=PIPE, stderr=PIPE);
		p1.stdout.close();
		p2_stdout_value = p2.communicate();
		print (p2_stdout_value);
		p2.stdout.close();
	
		p3 = Popen(['php', 'composer.phar', 'install'], stdout=PIPE, stderr=PIPE);
		print (p3.stdout.read());
		p3.stdout.close();
		chdir(self.cwd);

	def setupRepos(self):
		print("\033[91m" + "Initialising vendor repositories" + "\033[0m");
		p1 = Popen(['git', 'submodule', 'update', '--init'], stdout=PIPE);
		print (p1.stdout.read());
		p1.stdout.close();

	def updateRepos(self):
		for r, b in self.__repos.items():
			print("\033[91m" + "Updating /vendor/" + r + "\033[0m");
			chdir('./stk/vendor/' + r);

			p1 = Popen(['git', 'fetch'], stdout=PIPE);
			print(p1.stdout.read());
			p1.stdout.close();

			p2 = Popen(['git', 'reset', '--hard', 'HEAD'], stdout=PIPE);
			print(p2.stdout.read());
			p2.stdout.close();

			p3 = Popen(['git', 'checkout', b], stdout=PIPE);
			print(p3.stdout.read());
			p3.stdout.close();

			p4 = Popen(['git', 'reset', '--hard', 'HEAD'], stdout=PIPE);
			print(p4.stdout.read());
			p4.stdout.close();

			p5 = Popen(['git', 'merge', 'origin/' + b], stdout=PIPE);
			print(p5.stdout.read());
			p5.stdout.close();

			chdir(self.cwd);
			print("\n\n");

def main():
	vendor	= STKVendor();

	# Update the repos
	if vendor.args.update :
		vendor.updateRepos();

	# Setup
	if vendor.args.setup :
		vendor.setupRepos();

	print("\033[91m" + "Copying files" + "\033[0m");
	# phpBB files
	vendor.copyphpBBFiles();

	# Pimple
	vendor._copy ('./stk/vendor/Pimple/lib/Pimple.php', './stk/core/DI/Pimple.php', vendor.args.force);

	# MODX
	vendor._copy ('./stk/vendor/MODX/modx.prosilver.en.xsl', './contrib/modx.prosilver.en.xsl', vendor.args.force);

	# Finally install and run composer in 'stk/phpBB/'
	vendor.installComposor();

if __name__ == "__main__":
	main();
