<?php
/**
*
* [french]
*
* @package Support Toolkit - Reparse BBCode
* @version $Id:	papicx	1.0.7	05/05/2013	16h07	$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @Translation phpBB-fr http://www.phpbb-fr.com
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'REPARSE_ALL'					=> 'Réanalyser tous les BBCodes',
	'REPARSE_ALL_EXPLAIN'			=> 'Si cette option est activée, la réanalyse du BBCode vérifiera tout le contenu du forum. Par défaut, l’outil réanalysera seulement les messages, les messages privés et les signatures qui ont été précédemment analysés par phpBB. Cette option sera ignorée si vous avez spécifié ci-dessus des messages ou des messages privés spécifiques.',
	'REPARSE_BBCODE'				=> 'Réanalyser le BBCode',
	'REPARSE_BBCODE_COMPLETE'		=> 'Les BBCodes ont été réanalysés.',
	'REPARSE_BBCODE_CONFIRM'		=> 'Êtes-vous sûr(e) de vouloir réanalyser tous les BBCodes ? Veuillez noter que cet outil peut potentiellement endommager votre base de données au lieu de la réparer. Pour cette raison, <strong>assurez-vous d’avoir bien sauvegardé votre base de données avant de continuer</strong>. De plus, veuillez noter que cet outil peut prendre un certain temps avant de terminer son opération.',
	'REPARSE_BBCODE_PROGRESS'		=> 'Étape %1$d terminée. Début de l’étape %2$d dans un court instant…',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Réanalyse des messages terminée, début de la réanalyse des messages privés.',
		2	=> 'Réanalyse des messages privés terminée, début de la réanalyse des signatures.',
	),
	'REPARSE_IDS_INVALID'			=> 'Les IDs que vous avez envoyés ne sont pas valides. Veuillez vous assurer que chaque ID soit séparé par une virgule (exemple : 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Réanalyser les messages spécifiques',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Réanalyse seulement les messages spécifiques. Chaque ID doit être séparé par une virgule (exemple : 1,2,3,5,8,13).',
	'REPARSE_PM_IDS'				=> 'Réanalyser les messages privés spécifiques',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Réanalyse seulement les messages privés spécifiques. Chaque ID doit être séparé par une virgule (exemple : 1,2,3,5,8,13).',
));
