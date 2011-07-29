<?php
/**
*
* @package Support Toolkit - SQL Query
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translation (c) 2011 Olympus.pl http://www.phpbb.pl
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
	'ERROR_QUERY'					=> 'Zapytanie zawierające błąd',

	'NO_RESULTS'					=> 'Brak wyników',
	'NO_SQL_QUERY'					=> 'Musisz wpisać zapytanie.',

	'QUERY_RESULT'					=> 'Wyniki zapytania',

	'SHOW_RESULTS'					=> 'Pokaż wyniki',
	'SQL_QUERY'						=> 'Wykonaj zapytanie SQL',
	'SQL_QUERY_EXPLAIN'				=> 'Wpisz zapytanie SQL, które chcesz wykonać. Narzędzie zastąpi "phpbb_" Twoim prefiksem tabel.<br />W przypadku wybrania opcji "Pokaż wyniki", narzędzie wyświetli wyniki <em>(jeżeli takie będą)</em> zapytania.',

	'SQL_QUERY_LEGEND'				=> 'Zapytanie SQL',
	'SQL_QUERY_SUCCESS'				=> 'Zapytanie SQL zostało wykonane.',
));
