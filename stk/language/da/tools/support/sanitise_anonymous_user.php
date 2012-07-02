<?php
/**
*
* @package Support Toolkit - Anonymous group check
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
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
	'ANONYMOUS_CLEANED'					=> 'Anonym brugers profildata er saneret.',
	'ANONYMOUS_CORRECT'					=> 'Anonym bruger er tilstede og korrekt konfigureret',
	'ANONYMOUS_CREATED'					=> 'Anonym bruger er gendannet.',
	'ANONYMOUS_CREATION_FAILED'			=> 'Det var ikke muligt at gendanne anonym bruger. Spørg venligst om yderligere assistance i supportforummet på phpBB.com.',
	'ANONYMOUS_GROUPS_REMOVED'			=> 'Anonym bruger blev fjernet fra alle brugergrupper.',
	'ANONYMOUS_MISSING'					=> 'Anonym bruger mangler.',
	'ANONYMOUS_MISSING_CONFIRM'			=> 'Anonym bruger mangler i databasen. Denne bruger tillader gæster at besøge boardet. Vi du oprette en ny?',
	'ANONYMOUS_WRONG_DATA'				=> 'Anonym brugers profildata er ikke korrekte.',
	'ANONYMOUS_WRONG_DATA_CONFIRM'		=> 'Anonym brugers profildata er delvis fejlagtige. Vil du reparere disse?',
	'ANONYMOUS_WRONG_GROUPS'			=> 'Anonym bruger er fejlagtigt medlem af flere brugergrupper.',
	'ANONYMOUS_WRONG_GROUPS_CONFIRM'	=> 'Anonym bruger er fejlagtigt medlem af flere brugergrupper. Vil du fjerne den anonyme bruger fra alle andre end "GÆSTE"gruppen?',

	'REDIRECT_NEXT_STEP'				=> 'Du viderestilles til næste trin.',

	'SANITISE_ANONYMOUS_USER'			=> 'Sanering af anonym bruger',
));