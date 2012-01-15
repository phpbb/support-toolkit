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
* @package    Support Toolkit - SQL Query
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
	'ERROR_QUERY'					=> 'Frågan innehåller felen',

	'NO_RESULTS'					=> 'Inga resultat',
	'NO_SQL_QUERY'					=> 'Du måste specificera en fråga som skall köras.',

	'QUERY_RESULT'					=> 'Frågans resultat',

	'SHOW_RESULTS'					=> 'Visa resultat',
	'SQL_QUERY'						=> 'Kör SQL-fråga',
	'SQL_QUERY_EXPLAIN'				=> 'Ange den SQL-fråga du vill köra. Verktyget kommer att ersätta prefixet "phpbb_" med det som används av din databas.<br /> Om "Visa resultat" är ikryssat så kommer verktyget att visa resultaten <em>(om det blev några)</em> av frågan.',

	'SQL_QUERY_LEGEND'				=> 'SQL-fråga',
	'SQL_QUERY_SUCCESS'				=> 'SQL-frågan är utförd.',
));
