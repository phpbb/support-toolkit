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
* @package    Support Toolkit - Anonymous Group Check
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
	'ANONYMOUS_CLEANED'					=> 'Den anonyma användarens profildata har blivit saniterad.',
	'ANONYMOUS_CORRECT'					=> 'Den anonyma användaren finns och är korrekt konfigurerad.',
	'ANONYMOUS_CREATED'					=> 'Den anonyma användaren har blivit återskapad.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Det gick inte att återskapa den anonyma användaren. Vänligen fråga efter ytterligare information på phpBB-se.com supportforum.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'Den anonyma användaren är nu borttagen från samtliga användargrupper.',
	'ANONYMOUS_MISSING'					=> 'Den anonyma användaren saknas.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'Den anonyma användaren saknas i din databas. Denna användaren används för att tillåta gäster att besöka ditt forum. Vill du skapa en ny sådan användare?',
	'ANONYMOUS_WRONG_DATA'				=> 'Den anonyma användarens profildata är felaktig.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Den anonyma användarens profildata är delvis felaktig. Vill du åtgärda detta?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Den anonyma användaren är felaktigt medlem i flera användargrupper.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Den anonyma användaren är felaktigt medlem i flera användargrupper. Vill du ta bort den anonyma användaren från samtliga grupper förutom gruppen "Gäster"?',

	'REDIRECT_NEXT_STEP'				=> 'Du blir vidarebefodrad till nästa steg.',

	'SANITISE_ANONYMOUS_USER'			=> 'Sanitera den anonyma användaren',
));
