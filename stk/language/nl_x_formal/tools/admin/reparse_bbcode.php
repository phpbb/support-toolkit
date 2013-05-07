<?php
/**
*
* @package Support Toolkit - Reparse BBCode
* @version $Id$
* @copyright (c) 2009 phpBB Group , 2013 http://www.phpBBservice.nl
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
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'REPARSE_ALL'				=> 'Alle BBCodes herparsen',
	'REPARSE_ALL_EXPLAIN'		=> 'Wanneer dit is aangevinkt zullen alle BBCodes die zijn geplaatst op het forum worden herparst, dit hulpmiddel zal alleen de berichten/privéberichten/onderschriften herparsen die al zijn geparsed door phpBB. Deze optie zal genegeerd worden wanneer er bepaalde berichten of privéberichten zijn opgegeven hierboven.',
	'REPARSE_BBCODE'			=> 'BBCodes herparsen',
	'REPARSE_BBCODE_COMPLETE'	=> 'BBCodes zijn opnieuw geparsed.',
	'REPARSE_BBCODE_CONFIRM'	=> 'Weet u zeker dat u alle BBCodes wilt herparsen? Vergeet niet dat dit hulpmiddel mogelijk schade kan aanbrengen aan uw database. <strong>Wees er zeker van dat u een back-up heeft gemaakt van de database voordat u verder gaat.</strong> Opmerking: dit hulpmiddel kan enige tijd in beslag nemen voordat het klaar is.',
	'REPARSE_BBCODE_PROGRESS'	=> 'Stap %1$d is voltooid. Verder gaan met stap %2$d in een klein ogenblik…',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Klaar met het parsen van berichten, privéberichten worden nu geparsed.',
		2	=> 'Klaar met het parsen van privéberichten, onderschriften worden nu geparsed.',
	),
	'REPARSE_IDS_INVALID'			=> 'De IDs dat u heeft opgegeven zijn onjuist, wees er zeker van wanneer u meerdere bericht-IDs hebt opgegeven dat u ze hebt onderscheiden met een komma (e.g. 1,2,3,5,8,13).',
	'REPARSE_POST_IDS'				=> 'Herpars specifieke berichten',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Om alleen specifieke berichten te herparsen moet u het bericht-ID opgegeven, u kunt meerdere bericht-ids opgegeven door ze te onderscheiden met een komma.',
	'REPARSE_PM_IDS'				=> 'Herpars specifieke privéberichten',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Om alleen specifieke privéberichten te herparsen moet u het privébericht-ID opgegeven, u kunt meerdere privébericht-ids opgegeven door ze te onderscheiden met een komma (e.g. 1,2,3,5,8,13).',
));

?>