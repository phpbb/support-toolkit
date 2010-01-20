<?php
/**
*
* @package Support Toolkit - SQL Query
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'NO_RESULTS'					=> 'No Results',
	'NO_SQL_QUERY'					=> 'You must enter in a Query to run',

	'QUERY_RESULT'					=> 'Query results',

	'RUN_SQL_QUERY_EXPLAIN'			=> 'You may run an SQL query here. This tool does not backup your database and my permanently damage your forum if used incorrectly. Use at your own risk.',
	'RUN_SQL_QUERY_TOOL_EXPLAIN'	=> 'This tool can be used to run an SQL query on your database. The result of the query, if any, will also be shown.',

	'SHOW_RESULTS'					=> 'Show Results',
	'SQL_QUERY'						=> 'Run SQL Query',
	'SQL_QUERY_EXPLAIN'				=> 'Enter the SQL query you wish to run. The tool will substitute "phpbb_" with your table prefix.',
	
	'SQL_QUERY_LEGEND'				=> 'SQL Query',
	'SQL_QUERY_SUCCESS'				=> 'The SQL query has been run successfully.',
));

?>