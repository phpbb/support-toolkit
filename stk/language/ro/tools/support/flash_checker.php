<?php
/**
 *
 * @package Support Toolkit - Flash checker
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
	'FLASH_CHECKER'				=> ' Verificator Flash',
	'FLASH_CHECKER_CONFIRM'		=> 'În phpBB 3.0.7-pl1 a fost gasită o posibilă vulnerabilitate XSS în codul BB Flash. Această problemă a fost rezolvată în phpBB 3.0.8. Acest utilitar va verifica toate mesajele, semnăturile şi mesajele private în legătură cu vulnerabilitate codului BB. Dacă este găsită vă permite să reanalizaţi rapid aceste mesaje pentru a vă asigura că forumul propriu este sigur. Citiţi <a href="http://www.phpbb.com/community/viewtopic.php?f=14&t=2111068">anunţul de lansare a versiunii phpBB 3.0.8</a> pentru mai multe informaţii legate de vulnerabilitate.',
	'FLASH_CHECKER_FOUND'		=> 'Verificatorul Flash a găsit cod Flash potenţial periculos pe forumul propriu. Apăsaţi <a href="%s">aici</a> pentru a reanaliza mesajele, semnăturile şi mesajele private ce conţin acest tip de cod BB.',
	'FLASH_CHECKER_NO_FOUND'	=> 'Nu a fost găsit niciun cod Flash potenţial periculos.',
));

?>