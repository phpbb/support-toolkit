<?php
/**
*
* @package Support Tool Kit - Vote Revealer
* @version $Id$
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
	'NO_POLLS'						=> 'The forum that you selected doesnt\'t have any polls',
	'NO_VOTERS'						=> 'Nobody has voted for this option yet.',

	'POLL_NO_VOTES'					=> 'Nobody has voted in this poll yet!',
	'POLL_OPTION'					=> 'Vote option',
	'POLL_REVEALER_LIST'			=> 'Polls in forum: %s',
	'POLL_REVEALER_LIST_EXPLAIN'	=> 'Select the poll of which you want to see the votes.',
	'POLL_VOTERS'					=> 'Voters in this poll',
	'POLL_VOTERS_EXPLAIN'			=> 'This page lists every user that voted in this poll, and shows on which option(s) he voted.',

	'SELECT_FORUM'					=> 'Select forum',
	'SELECT_FORUM_EXPLAIN'			=> 'Select the forum in which you want to search for polls.',

	'VOTE_REVEALER'					=> 'Vote revealer',
	'VOTE_REVEALER_EXPLAIN'			=> 'Allows you to see which user voted what in any poll that is currently on the board.',
));

?>