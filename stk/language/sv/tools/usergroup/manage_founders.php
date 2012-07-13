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
* @package    Support Toolkit - Manage Founders
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
	'BOTH_FIELDS_FILLED'		=> 'Både Användarnamn och Användar ID får inte vara ifyllda.',
	
	'DEMOTE_FAILED'				=> 'Kunde inte ta bort grundarstatus på alla användare!',
	'DEMOTE_FOUNDERS'			=> 'Nedgradera grundare',
	'DEMOTE_SUCCESSFULL'		=> 'Grundarstatus på användaren %d är borttaget!',

	'FOUNDERS'					=> 'Användare med grundarstatus',

	'MAKE_FOUNDER'				=> 'Gör en användare till grundare',
	'MAKE_FOUNDER_CONFIRM'		=> 'Är du säker på att du vill göra <a href="%1$s">%2$s</a> till grundare?  Detta kommer att ge <a href="%1$s">%2$s</a> rättigheter att ta bort ditt konto.',
	'MAKE_FOUNDER_FAILED'		=> 'Användaren kunde inte befodras till grundare',
	'MAKE_FOUNDER_SUCCESS'		=> '<a href="%1$s">%2$s</a> är nu befodrad till grundare.',
	'MANAGE_FOUNDERS'			=> 'Grundare',

	'NO_FOUNDERS'				=> 'Inga grundare hittades',

	'PROMOTE_FOUNDER'			=> 'Befodra till grundare',

	'USER_NAME_TO_FOUNDER'			=> 'Användarnamn som skall bli Grundare',
	'USER_NAME_TO_FOUNDER_EXPLAIN'	=> 'Ange det Användarnamn på den användaren du vill göra till forumets Grundare.',
	'USER_ID_TO_FOUNDER'			=> 'Användar ID som skall bli Grundare',
	'USER_ID_TO_FOUNDER_EXPLAIN'	=> 'Ange det Användar ID på den användaren du vill göra till forumets Grundare.',
));
