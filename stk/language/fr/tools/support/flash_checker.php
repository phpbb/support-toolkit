<?php
/**
*
* [french]
*
* @package Support Toolkit - Flash checker
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'FLASH_CHECKER'				=> 'Vérification du Flash',
	'FLASH_CHECKER_CONFIRM'		=> 'Dans phpBB 3.0.7-PL1, une vulnérabilité XSS a été décelée dans la construction du BBCode Flash. Cette faille a été résolue dans phpBB 3.0.8. Cet outil vérifiera tous les messages, les messages privés et les signatures contenant cette vulnérabilité, puis les corrigera au nécessaire afin de vous permettre de préserver un forum sécurisé. Pour plus d’informations concernant cette vulnérabilité, veuillez consulter <a href="https://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">l’annonce de sortie de phpBB 3.0.8</a> (en anglais).',
	'FLASH_CHECKER_FOUND'		=> 'La vérification du Flash a décelé certains messages, messages privés ou signatures comportant la faille de sécurité du BBCode Flash, pouvant être néfaste pour votre forum. Cliquez <a href="%s">ici</a> afin de supprimer la vulnérabilité en question de vos messages, de vos messages privés ou de vos signatures.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Aucune utilisation dangereuse de la balise Flash n’a été décelée.',
));
