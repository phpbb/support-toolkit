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

print ("Packages successfully build!");
