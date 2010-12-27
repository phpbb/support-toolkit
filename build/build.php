#!/usr/bin/env php
<?php
/**
 *
 * @package Support Toolkit
 * @copyright (c) 2010 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

// Include some files 
include ('./builder.php');
include ('./functions_compress.php');

// Create the builder
$builder = new stk_builder();

// Build the main package
if (!empty($builder->build_command['full']) || !empty($builder->build_command['stk']))
{
	$builder->build();
}

// Build the translation packages
if (!empty($builder->build_command['full']) || !empty($builder->build_command['lang']))
{
	// When not running "full" build the translations list
	if (!empty($builder->build_command['lang']))
	{
		$builder->get_translations_list();
	}

	$builder->build_translations($builder->translations);
}

// Finally build the whitelist
if (!empty($builder->build_command['full']) || !empty($builder->build_command['bom']))
{
	$download = false;
	if (!empty($builder->build_command['bom']))
	{
		// When only generating the 'bom' file, download it
		$download = true;
	}

	$builder->build_whitelist($download);
}

// Output any errors that were found
$translation_errors = $builder->translation_errors();

// So we're done :)
if ($translation_errors)
{
	$exit_msg = 'All packages build but some issues where found in translations!';
}
else
{
	$exit_msg = 'All packages were successfully created!';
}
print("{$exit_msg}\n\n");
