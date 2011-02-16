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
* @package    Support Toolkit - Resync User Groups
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
	'RESYNC_USER_GROUPS'			=> 'Synkronisera användargrupper',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Detta verktyget kontrollerar utifall alla användare är medlemmar av de korrekta standardgrupperna <em>(Registrerade användare, Registrerade COPPA användare och Nya medlemmar)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Alla grupper verkar vara uppdaterade!',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Synkroniseringsinställningar',
	'RUN_BOTH_FINISHED'				=> 'Alla användargrupper har blivit synkroniserade!',
	'RUN_RNR'						=> 'Synkronisera nya medlemmar',
	'RUN_RNR_EXPLAIN'				=> 'Detta kommer att uppdatera gruppen "Nya medlemmar" så att den innehåller alla användare som uppfyller dess kriterier specificerade i Administrationspanelen.',
	'RUN_RNR_FINISHED'				=> 'Gruppen Nya medlemmar är synkroniserad!',
	'RUN_RNR_NOT_FINISHED'			=> 'Gruppen Nya medlemmar håller på att synkroniseras. Vänligen stör ej denna process',
	'RUN_RR'						=> 'Synkronisera Registrerade användare',
	'RUN_RR_EXPLAIN'				=> 'Detta verktyget har beslutat att alla användare på forumet inte är medverkande i gruppen "Registrerade <em>(COPPA)</em> användare. Vill du synkronisera dessa grupper?<br /><strong>Notera:</strong> Om ditt forum har COPPA aktiverat och en användare inte har fyllt i födelsedatum så kommer denna användaren bli placerad i gruppen "Registrerade COPPA användare!',
	'RUN_RR_FINISHED'				=> 'Användarna har blivit synkroniserade!',

	'SELECT_RUN_GROUP'	=> 'Välj minst en grupp som skall bli synrkoniserad.',
));
