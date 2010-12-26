#!/usr/bin/env php
<?php
/**
 *
 * @package Support Toolkit
 * @copyright (c) 2010 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
 
// Make sure that "package is writable"
if (!is_writable('package'))
{
	trigger_error('Make sure that this script can write to the `package` directory');
}

// Include some files 
include ('./functions_compress.php');
include ('./functions_build.php');

// Build the main STK package
$stk			= new compress_zip('w', './package/support-toolkit-1.zip');
$translation	= null;

// Keep the BOM Sniffer whitelist
$whitelist = array();

$stk_filelist = filelist('./../');
foreach ($stk_filelist as $dir => $filelist)
{
	// Skip some empty stuff
	if (empty($filelist))
	{
		continue;
	}

	// Skip some directories that shouldn't be included
	if (preg_match('#^(build|stk/develop)#ise', $dir))
	{
		continue;
	}

	// Skip all non-english language dirs, these are build later
	$lang = array();
	if (preg_match('#^stk/language/([a-zA-Z_]+)/#ise', $dir, $lang))
	{
		if ($lang[1] != 'en')
		{
			continue;
		}
	}

	$dir = rtrim($dir, '/');

	foreach ($filelist as $file)
	{
		// Ignore some files
		if ($file[0] == '.' || preg_match('#^(README.md)$#ise', $file))
		{
			continue;
		}

		$dest = "{$dir}/{$file}";
		$orig = "./../{$dir}/{$file}";
		$stk->add_custom_file($orig, $dest);
		
		// Add to the whitelist
		if (preg_match('#^stk/includes/critical_repair#ise', $dir) || preg_match('#^(config|erk).php$#ise', $file))
		{
			// Some stuff that isn't added to the whitelist
			continue;
		}
		
		$no_ext = '';
		if (preg_match('#^([a-zA-Z_]+).php$#ise', $file, $no_ext))
		{
			$whitelist[] = "{$dir}/{$no_ext[1]}";
		}
	}
}

// Adjust the whitelist to include some other phpBB products
// these should be added to the "whitelist_additional" directory
// the following directories can be used:
// * phpBB3: The latest phpBB build
// * automod: *only* the contents of the `upload` dir in the package
// * umil: *only* the contents of the `root` dir in the package
$phpbb_extra = array('phpBB3', 'automod', 'umil');
foreach ($phpbb_extra as $extra)
{
	if (!is_dir('./whitelist_additional/' . $extra))
	{
		// Don't
		continue;
	}

	$extra_filelist = filelist('./whitelist_additional/' . $extra);
	foreach ($extra_filelist as $dir => $filelist)
	{
		if (empty($filelist))
		{
			continue;
		}

		// Skip some direcories
		$skip = false;
		switch ($extra)
		{
			case 'phpBB3' :
				if (preg_match('#^(cache|develop|files|install|store)#ise', $dir))
				{
					$skip = true;
				}
			break;
			case 'automod' :
				if (preg_match('#^(develop|umil)#ise', $dir))
				{
					$skip = true;
				}
			break;
		}

		if ($skip === false)
		{
			foreach ($filelist as $file)
			{	
				// Skip some package dependand files
				switch ($extra)
				{
				}
				
				// Add it
				$no_ext = '';
				if (preg_match('#^([a-zA-Z_]+).php$#ise', $file, $no_ext))
				{
					// In some cases need to adjust the path
					$path_extra = '';
					switch ($extra)
					{
						case 'umil' :
							$path_extra = 'umil/';
						break;
					}
					
					$whitelist[] = "{$path_extra}{$dir}{$no_ext[1]}";
				}
			}
		}
	}
}

// Insert the whitelist into the builder
$stk->add_data(implode("\n", $whitelist), 'stk/includes/critical_repair/whitelist.txt');

// Now 
$stk->close();

// Build the translation packages
$translation_filelist = filelist('./../stk/language/');
$lang_building = '';
foreach ($translation_filelist as $dir => $filelist)
{
	// Skip some
	if (empty($filelist) || empty($dir))
	{
		continue;
	}
	
	// Grep the language here
	$lang = array();
	if (preg_match('#^([a-zA-Z_]+)/#ise', $dir, $lang))
	{
		// English is skipped always
		if ($lang[1] == 'en')
		{
			continue;
		}

		// Switching languages
		if ($lang[1] != $lang_building)
		{
			// If needed close the old one
			if ($translation instanceof compress_zip)
			{
				$translation->close();
			}
			
			$translation = new compress_zip('w', "./package/support-toolkit-1_{$lang[1]}.zip");
			$lang_building = $lang[1];
		}
	}
	
	foreach ($filelist as $file)
	{
		// Ignore some files
		if ($file[0] == '.')
		{
			continue;
		}

		$dest = "{$dir}/{$file}";
		$orig = "./../stk/language/{$dir}/{$file}";
		$translation->add_custom_file($orig, $dest);
	}
}
$translation->close();

print ("Packages successfully build!");
