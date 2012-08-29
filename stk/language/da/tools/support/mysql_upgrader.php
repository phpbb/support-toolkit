<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
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
	'MYSQL_UPGRADER'					=> 'MySQL Upgrader',
	'MYSQL_UPGRADER_BACKUP'				=> 'Upgraderen kan under forkerte omstændigheder være ødelæggende, sørg derfor for at foretage en backup af databasen, før der fortsættes!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Værktøjet er designet til at løse bestemte problemstillinger der kan opstå når selve MySQL-databasesystemet, som phpBB bentytter sig af, opgraderes. Denne databaseopgradering kan betyde at databaseskemaet bliver inkompatibelt. <em>Se også KB-artiklen “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>”.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Download',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Her kan vælges at få genereret og vist de databaseforespørgsler der skal udføres, og du vil kunne downloade forespørgslerne som en fil.',
	'MYSQL_UPGRADER_RESULT'				=> 'Herunder vises de forespørgsler der skal udføres for at opdatere databaseskemaet til den rette version af MySQL. Klik <a href="%s">her</a>, for at downloade forespørgslerne i en .sql-fil.',
	'MYSQL_UPGRADER_RUN'				=> 'Kør',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Her kan vælges at få upgraderen til at danne de rette forespørgsler og automatisk udføre dem i din database.<br />Det kan tage nogen tid at køre forespørgslerne, afbryd derfor <strong>ikke</strong> operationen, før du ser en status for at scriptet er fuldført.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'Scriptet MySQL-upgrader',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'MySQL Upgraderen er fuldført',

	'QUERY_FINISHED'	=> 'Forespørgsler %1$d af %2$d udført, fortsætter til næste trin.',

	'TOOL_MYSQL_ONLY'	=> 'Værktøjet er kun tilgængeligt for brugere af MySQL DBMS',
));
