<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
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
	'MYSQL_UPGRADER'					=> 'MySQL-upgrader',
	'MYSQL_UPGRADER_BACKUP'				=> 'Dit hulpmiddel potentieel gevaarlijk, maak eerst een back-up van uw database voordat u verder gaat!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Dit hulpmiddel is ontworpen om diverse problemen op te lossen die worden veroorzaakt wanneer de MySQL-database die gebruikt is voor uw phpBB-installatie is bijgewerkt. Deze update kan er voor zorgen dat het database-schema niet meer werkt met de nieuwe versie <em>zie ook het “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>” KB-artikel.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'Download',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Door deze optie te selecteren zal de MySQL upgrader de queries genereren en zal daarna de uitkomst hiervan weergegeven, vanuit daar kunt u dan het resultaat bestand downloaden.',
	'MYSQL_UPGRADER_RESULT'				=> 'Hieronder staan de queries die moeten worden toegepast aan het database-schema om de MySQL-versie te corrigeren. Klik <a href="%s">hier</a> om de queries te downloaden in een .sql bestand.',
	'MYSQL_UPGRADER_RUN'				=> 'Uitvoeren',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Door deze optie te selecteren zal de MySQL upgrader de queries genereren en automatisch toepassen aan uw database.<br />Dit kan even duren, dus onderbreek het proces <strong>niet</strong> totdat het hulpmiddel een notificatie geeft dat het klaar is.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'MySQL upgrader script',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'De MySQL Upgrader is succesvol uitgevoerd.',
	
	'QUERY_FINISHED'	=> 'Klaar met draaien query %1$d van %2$d, bezig met de volgende stap.',

	'TOOL_MYSQL_ONLY'	=> 'Dit hulpmiddel is alleen beschikbaar voor gebruikers van de MySQL DBMS',
));
