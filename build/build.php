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
$builder->build();

// Build the translation packages
$builder->build_translations($builder->translations);

// Finally build the whitelist
$builder->build_whitelist();

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
