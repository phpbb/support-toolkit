<?php
/**
*
* This file is part of Swedish STK translation.
* Copyright (c) 2010 - 2011 Swedish translation group.
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; version 2 of the License.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along
* with this program; if not, write to the Free Software Foundation, Inc.,
* 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*
* @package    Support Toolkit - MySQL Upgrader
* @author     Simon Assgård <sassgard@gmail.com> (Simon Assgård) http://www.phpbb-se.com/
* @copyright (c) 2009 phpBB Group
* @license    http://opensource.org/licenses/gpl-license.php GNU Public License
* @version    $Id$
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
	'MYSQL_UPGRADER'					=> 'MySQL-Uppgraderare',
	'MYSQL_UPGRADER_BACKUP'				=> 'Detta verktyget kan vara farligt; var noga med att göra en backup av din databas före du fortsätter!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Detta verktyget är designat för att lösa vissa problem som kan tillkomma när du uppgraderar phpBB-installationen. Denna uppgraderingen kommer att göra så att ditt databasschema blir inkompatibelt med den nya versionen <em>Se också “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Har inte standardvärde-felmeddelanden</a>” KB-artikeln.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Ladda ner',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Genom att kryssa i denna kommer MySQL-Uppgraderaren generera frågor och visa resultaten för dig, därifrån kan du ladda ner resulteten.',
	'MYSQL_UPGRADER_RESULT'				=> 'Nedan finner du frågorna som måste köras för att uppdatera databasens schema till den korrekta MySQL-versionen. Klicka <a href="%s">här</a> för att ladda ner frågorna i en .sql-fil.',
	'MYSQL_UPGRADER_RUN'				=> 'Kör',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Genom att kryssa i denna kommer MySQL-uppgraderaren generera frågor och automatiskt köra resultaten i din databas.<br />Detta kan ta en stund, stör <strong>inte</strong> denna process före verktyget säger till att det är färdigt.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'MySQL-Uppgraderar-skript',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'MySQL-Uppgraderaren är färdig',
	
	'QUERY_FINISHED'	=> 'Färdig med att köra fråga %1$d av %2$d, fortsätter med nästa steg.',

	'TOOL_MYSQL_ONLY'	=> 'Detta verktyget är endast tillgängligt för användare av MySQL DBMS',
));
