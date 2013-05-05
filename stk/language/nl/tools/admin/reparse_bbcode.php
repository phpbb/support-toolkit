<?php
/**
*
* @package Support Toolkit - Reparse BBCode
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'REPARSE_ALL'				=> 'Herpars alle BBCodes',
	'REPARSE_ALL_EXPLAIN'		=> 'Indien aangevinkt worden alle BBCodes van het gehele forum geherparst; Standaard zal de tool alleen de berichten/privéberichten/onderschriften herparsen die al eerder door phpBB zijn geparst. Deze optie wordt genegeerd als er specifieke berichten of privéberichten bovenaan zijn gespecificeerd.',
	'REPARSE_BBCODE'			=> 'BBCode Herparsen',
	'REPARSE_BBCODE_COMPLETE'	=> 'De BBCodes zijn opnieuw geparsed.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Weet je zeker dat je alle BBCodes wilt herparsen? Dit kan enige tijd in beslag nemen.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Stap %1$d voltooid. Doorgaan naar stap %2$d over een ogenblik…',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Klaar met het herparsen van berichten, doorgaan met privéberichten.',
		2	=> 'Klaar met het herparsen van privéberichten, doorgaan met onderschriften.',
	),
	'REPARSE_IDS_INVALID'			=> 'De door jou opgegeven IDs zijn niet geldig; zorg er voor dat bericht IDs worden genoteerd als een door komma’s gescheiden lijst (bijv. 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Herpars specifieke berichten',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Om enkel de specifieke berichten te herparsen, moet je de bericht IDs opgeven in een door komma’s gescheiden lijst (bijv. 1,2,3,5,8,13).',
	'REPARSE_PM_IDS'				=> 'Herpars specifieke privéberichten',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Om enkel de specifieke privéberichten te herparsen, moet je de privébericht IDs opgeven in een door komma’s gescheiden lijst (bijv. 1,2,3,5,8,13).',
));
