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
* @package    Support Toolkit - Profile List
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
	'ALL'											=> 'Alla',
	'CLICK_TO_DELETE'					=> 'Ta bort alla valda användare genom att klicka på denna knapp. <em>(Försvinner permanent!)</em>',
	'FILTER'										=> 'Filter',

	'LIMIT'										=> 'Gräns',

	'ONLY_NON_EMPTY'					=> 'Endast meddelanden', //Only Non-Empty
	'ORDER_BY'								=> 'Sortera efter',

	'PROFILE_LIST'							=> 'Profillista',
	'PROFILE_LIST_EXPLAIN'			=> 'Detta verktyget visar profilinformation för flera användare. Det kan också hjälpa till att identifiera spamkonton.',
	'USERS_DELETE'						=> 'Ta bort valda användare',
	'USERS_DELETE_CONFIRM'			=> 'Är du säker på att du vill ta bort valda användare? Genom att ta bort användare med detta verktyg <strong>kommer</strong> att ta bort deras inlägg också!',
	'USERS_DELETE_SUCCESSFULL'	=> 'Alla valda användare är nu borttagna!',
));
