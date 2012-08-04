<?php
/**
*
* @package Support Toolkit - Profile List
* @version $Id: profile_list.php 277 2010-01-20 01:38:28Z iwisdom $
* @translate $Id: profile_list.php 277 2010-02-14 13:33:20 dorin $
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
	'ALL'					=> 'Toţi',

	'CLICK_TO_DELETE'		=> 'Ștergeți toți utilizatorii selectați folosind acest buton. <em>(Operația este definitivă!)</em>',

	'FILTER'				=> 'Filtru',

	'LIMIT'					=> 'Nr. înregistrări',

	'ONLY_NON_EMPTY'		=> 'Numai câmpuri cu date',
	'ORDER_BY'				=> 'Ordonat după',

	'PROFILE_LIST'			=> 'Lista Profilelor',
	'PROFILE_LIST_EXPLAIN'	=> 'Acest utilitar afişază informaţii despre profilul mai multor utilizatori. Poate fi folosit şi pentru detectarea conturilor folosite pentru spam.',
	
	'USERS_DELETE'				=> 'Șterge utilizatorii selectați',
	'USERS_DELETE_CONFIRM'		=> 'Sunteți sigur că vreți să ștergeți utilizatorii selectați? Ștergând utilizatorii folosind acest utilitar <strong>va</strong> șterge, de asemenea, toate mesajele acestora!',
	'USERS_DELETE_SUCCESSFULL'	=> 'Toți utilizatorii selectați au fost ștersi cu succes!',
));

?>