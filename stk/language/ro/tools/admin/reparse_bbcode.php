<?php
/**
*
* @package Support Toolkit - Reparse BBCode
* @version $Id: reparse_bbcode.php 289 2010-01-24 07:32:47Z iwisdom $
* @translate $Id: reparse_bbcode.php 289 2010-02-14 13:42:09 dorin $
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
	'REPARSE_ALL'				=> 'Reanalizează toate codurile BB',
	'REPARSE_ALL_EXPLAIN'		=> 'Când este activată opţiunea, toate codurile BB din forum vor fi reanalizate; în mod standard, utilitarul va analiza doar mesajele/mesajele private/semnăturile care au fost anterior analizate de către phpBB. Această opţiune va fi ignorată dacă anumite mesaje sunt specificate mai sus',
	'REPARSE_BBCODE'			=> 'Reanalizarea (reparsarea) codului BB',
	'REPARSE_BBCODE_COMPLETE'	=> 'Codul BB a fost reanalizat (reparsat).',
	'REPARSE_BBCODE_CONFIRM'	=> 'Sunteţi sigur că doriţi reanalizarea (reparsarea) întregului cod BB? Vă rugăm să reţineţi că acest instrument are potenţialul de a deteriora baza de date dincolo de reparaţiile pe care le doriţi; prin urmare, <strong> asiguraţi-vă că aţi făcut o copie (backup) a bazei de date înainte de a continua </ strong>. În plus, reţineţi că această operaţiune poate dura ceva timp până la finalizare !',
	'REPARSE_BBCODE_PROGRESS'	=> 'Pasul %1$d este complet. Trecem la pasul %2$d în câteva secunde...',
	'REPARSE_BBCODE_SWITCH_MODE'	=> array(
		1	=> 'Mesajele au fost reanalizate, se trece la mesajele private.',
		2	=> 'Mesajele private au fost reanalizate, se trece la semnături.',
	),
	'REPARSE_IDS_INVALID'			=> 'ID-urile trimise nu sunt valide; asiguraţi-vă ca ID-urile sunt scrise folosind virgula ca delimitator (de exemplu 1,2,3,5,8,13).',
  'REPARSE_POST_IDS'				=> 'Reanalizarea anumitor mesaje',
	'REPARSE_POST_IDS_EXPLAIN'		=> 'Pentru a reanaliza doar mesajele specifice, introduceţi ID-urile mesajelor într-o listă folosind virgula ca delimitator.',
	'REPARSE_PM_IDS'				=> 'Reanalizarea anumitor mesaje private',
	'REPARSE_PM_IDS_EXPLAIN'		=> 'Pentru a reanaliza doar mesajele private specifice, introduceţi ID-urile mesajelor private într-o listă folosind virgula ca delimitator.',
));


?>