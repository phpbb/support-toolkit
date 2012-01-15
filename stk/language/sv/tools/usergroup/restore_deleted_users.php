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
* @package    Support Toolkit - Restore Deleted Users
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
	'NO_DELETED_USERS'	=> 'Det finns inga användare som kan återställas',
	'NO_USER_SELECTED'	=> 'Ingen användare är vald!',

	'RESTORE_DELETED_USERS'						=> 'Återställ borttagen användare',
	'RESTORE_DELETED_USERS_CONFLICT'			=> 'Återställ borttagen användare :: Konflikt',
	'RESTORE_DELETED_USERS_CONFLICT_EXPLAIN'	=> 'Detta verktyget tillåter dig att återställa användare som har blivit borttagna men fortfarande har "gäst-inlägg" kvar på forumet. <br />Dessa användare tilldelas ett slummässigt lösenord som du måste återställa manuellt efter att verktyget är kört. Detta verktyget bistår inte med en lista av genererade lösneord per användare!<br /><br />Under senaste körningen fann detta verktyg användare som redan existerade på forumet. Vänligen fyll i ett nytt namn för dessa användare.',
	'RESTORE_DELETED_USERS_EXPLAIN'				=> 'Detta verktyget tillåter dig att återställa användare som har blivit borttagna men fortfarande har "gäst-inlägg" kvar på forumet. <br />Dessa användare tilldelas ett slummässigt lösenord som du måste återställa manuellt efter att verktyget är kört. Detta verktyget bistår inte med en lista av genererade lösneord per användare!',

	'SELECT_USERS'	=> 'Markera användare som skall återställas',

	'USER_RESTORED_SUCCESSFULLY'	=> 'Den valda användaren har blivit återställd.',
	'USERS_RESTORED_SUCCESSFULLY'	=> 'De valda användarna har blivit återställda.',
));
