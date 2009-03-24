<?php
/**
*
* @package Support Tool Kit - Database Cleaner
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* Database Cleaner Data file for phpBB 3.0.0
*/
class database_cleaner
{
	// All default config settings
	var $config = array();

	// All default permission settings
	var $permissions = array();

	// All default Modules (formatted to work with UMIL Auto Module inserter, it shouldn't be too long)
	var $modules = array();

	// All default Bots
	var $bots = array();

	// All default tables (copy from create_schema_files for this version)
	var $tables = array();
}
?>