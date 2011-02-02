<?php
/**
*
* @package Support Toolkit - Make Founder
* @version $Id: manage_founders.php 277 2010-01-20 01:38:28Z iwisdom $
* @translate $Id: manage_founders.php 277 2010-02-14 14:32:12 dorin rosculete $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'DEMOTE_FAILED'				=> 'Nu s-a putut elimina statutul de fondator al tuturor utilizatorilor!',
	'DEMOTE_FOUNDERS'			=> 'Elimină fondatori',
	'DEMOTE_SUCCESSFULL'		=> 'Statutul de fondator a fost eliminat pentru %d utilizatori!',

	'FOUNDERS'					=> 'Utilizatori cu statutul de fondator',

	'MAKE_FOUNDER'				=> 'Atribuiţi statutul de fondator unui utilizator',
	'MAKE_FOUNDER_CONFIRM'		=> 'Doriţi să atribuiţi lui <a href="%1$s">%2$s</a> statutul de fondator?  Această calitate va permite <a href="%1$s">%2$s</a> să şteargă contul dvs., alături de alte puteri.',
	'MAKE_FOUNDER_FAILED'		=> 'Acest utilizator nu a putut fi promovat ca fondator!',
	'MAKE_FOUNDER_SUCCESS'		=> 'Utilizatorul <a href="%1$s">%2$s</a> a fost promovat ca fondator al forumului.',
	'MANAGE_FOUNDERS'			=> 'Administrare fondatori forum',

	'NO_FOUNDERS'				=> 'Niciun fondator găsit',

	'PROMOTE_FOUNDER'			=> 'Promovează ca fondator',

	'USER_TO_FOUNDER'			=> 'Utilizator care se promovează ca fondator',
	'USER_TO_FOUNDER_EXPLAIN'	=> 'Introduceţi numele de utilizator sau ID-ul utilizatorului care doriţi să fie făcut fondator al forumului.',
));

?>