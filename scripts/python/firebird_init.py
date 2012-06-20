#!/usr/bin/python

"""Support Toolkit vender.py
@package SupportToolkit
@copyright (c) 2012 phpBB Group
@license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2

This utility prepares the system for tests being ran against firebird
at the moment we need a different phpBB branch and need to "hack"
DBUnit
"""
from os import chdir, getcwd, makedirs, remove
from os.path import dirname, exists, isdir
from shutil import copy2, copytree, rmtree
from subprocess import PIPE, Popen
import sys

class firebird_init :
	""" Set of commands passed into `Popen` on various occations"""
	commands = {
		'pear':	{
			'php_dir': [
				'pear',
				'config-get',
				'php_dir',
			],
		},
		'git':	{
			'clone': [
				'git',
				'clone',
				'git://github.com/Noxwizard/dbunit.git',
				'/tmp/DBUnitNoxwizard/',
			],
			'checkout': [
				'git',
				'checkout',
			],
		},
	}

	cwd = ''

	pyrus_php_dir = ''

	def __init__(self) :
		self.cwd = getcwd()
		p = Popen(self.commands['pear']['php_dir'], stdout=PIPE)
		self.pyrus_php_dir = p.communicate()[0]
		p.stdout.close()

	def _copy(self, src, dest) :
		out = '\033[92m' + 'Copying: ' + '\033[0m' + src + ' to: ' + dest
		print (out)
		if isdir(src) :
			if (exists(dirname(dest))):
				rmtree(dest)

			copytree(src, dest)
		else :
			if not exists(dirname(dest)) :
				makedirs(dirname(dest))
			elif (exists(dest)):
				remove(dest)

			copy2(src, dest)

		return True

	def run(self) :
		# Clone the hacked DBUnit
		print('Cloning [git://github.com/Noxwizard/dbunit.git]')
		p1 = Popen(self.commands['git']['clone'], stdout=PIPE)
		print(p1.stdout.read())
		p1.stdout.close()

		# Checkout correct directory
		chdir('/tmp/DBUnitNoxwizard/')
		co = self.commands['git']['checkout'] + ['firebird']
		p2 = Popen(co, stdout=PIPE)
		print(p2.stdout.read())
		p2.stdout.close()

		# Copy the files
		self._copy('./PHPUnit/Extensions/Database', self.pyrus_php_dir + '/../share/pyrus/.pear/php/PHPUnit/Extensions/Database')

		chdir(self.cwd)

if __name__ == "__main__" :
	_firebird_init = firebird_init()
	_firebird_init.run()
