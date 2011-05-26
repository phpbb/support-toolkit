<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'					=> 'MySQL Upgrader',
	'MYSQL_UPGRADER_BACKUP'				=> 'Deze tool is potentieel gevaarlijk, zorg er voor dat je eerst een back-up maakt van je database voor je verder gaat!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Deze tool is gemaakt om enkele problemen op te lossen die worden veroorzaakt als de door jou gebruikte MySQL database voor je phpBB installatie is geüpgrade. Deze upgrade heeft als gevolg dat je database schema onbruikbaar wordt met de nieuwe versie <em>Bekijk ook het “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>” KB artikel.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Download',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Door deze optie aan te vinden zal de MySQL Upgrader de queries generen en de output aan je tonen, vanaf daar kun de het resultaat bestand downloaden.',
	'MYSQL_UPGRADER_RESULT'				=> 'Hieronder vind je de queries die uitgevoerd moeten worden om de schema te corrigeren naar de juiste MySQL versie. klik <a href="%s">hier</a> om de queries te downloaden in een .sql bestand.',
	'MYSQL_UPGRADER_RUN'				=> 'Uitvoeren',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Door deze optie aan te vinden zal de MySQL Upgrader de queries generen en automatisch het resultaat uitvoeren op jouw database.<br />Dit kan enige tijd in beslag nemen, stop dit proces <strong>niet</strong> tot de tool je meld dat het klaar is.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'MySQL upgrader script',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'De MySQL Upgrader is succesvol uitgevoerd',
	
	'QUERY_FINISHED'	=> 'Query %1$d van %2$d afgerond, doorgaan met de volgende stap.',

	'TOOL_MYSQL_ONLY'	=> 'Deze tool is alleen beschikbaar voor gebruikers van de MySQL DBMS',
));
