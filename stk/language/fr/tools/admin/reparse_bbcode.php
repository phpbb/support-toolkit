<?php
/**
*
* This file is part of French STK translation.
* Copyright (c) 2010 Maël Soucaze.
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
* @package   Support Toolkit - Reparse BBCode
* @author    Maël Soucaze <maelsoucaze@gmail.com> http://mael.soucaze.com/
* @copyright (c) 2009 phpBB Group
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License
* @version   $Id$
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
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
// í ª ì î Ö
//

$lang = array_merge($lang, array(
	'REPARSE_ALL'				=> 'Réanalyser tous les BBCodes',
	'REPARSE_ALL_EXPLAIN'		=> 'Si ceci est activé, la réanalyse du BBCode réanalysera tout le contenu sur le forum. Par défaut, l’outil rénalysera seulement les messages, les messages privés et les signatures qui ont été précédemment analysés par phpBB.',
	'REPARSE_BBCODE'			=> 'Réanalyser le BBCode',
	'REPARSE_BBCODE_COMPLETE'	=> 'Les BBCodes ont été réanalysés.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Êtes-vous sûr de vouloir réanalyser tous les BBCodes ? Veuillez noter que cet outil peut potentiellement endommager votre base de données au lieu de la réparer. Pour cette raison, <strong>assurez-vous d’avoir bien sauvegardé votre base de données avant de continuer</strong>. De plus, veuillez noter que cet outil peut prendre un certain temps avant de terminer son opération.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Étape %1$d terminée. Début de l’étape %2$d dans un court instant…',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Réanalyse des messages terminée, début de la réanalyse des messages privés.',
		2	=> 'Réanalyse des messages privés terminée, début de la réanalyse des signatures.',
	),
));

?>