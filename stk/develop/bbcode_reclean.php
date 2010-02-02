<?php
/**
*
* @package Support Toolkit - bbcode reclean script
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

//
// Security message:
//
// This script is potentially dangerous.
// Remove or comment the next line (die(".... ) to enable this script.
// Do NOT FORGET to either remove this script or disable it after you have used it.
//
die("Please read the first lines of this script for instructions on how to enable it");

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_posting.'. $phpEx);
include($phpbb_root_path . 'includes/message_parser.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

// setup
$post_id = 8;	//-- Change to the ID of the post you want to run this script on!

// application/xhtml+xml not used because of IE
header('Content-type: text/html; charset=UTF-8');

header('Cache-Control: private, no-cache="set-cookie"');
header('Expires: 0');
header('Pragma: no-cache');

/*
* Functions
*/
//if (!function_exists('htmlspecialchars_decode'))
//{
	function html_entity_decode_utf8($string)
	{
		static $trans_tbl;

		// replace numeric entities
		$string = preg_replace('~&#x([0-9a-f]+);~ei', 'code2utf8(hexdec("\\1"))', $string);
		$string = preg_replace('~&#([0-9]+);~e', 'code2utf8(\\1)', $string);

		// replace literal entities
		if (!isset($trans_tbl))
		{
			$trans_tbl = array();

			foreach (get_html_translation_table(HTML_ENTITIES) as $val=>$key)
				$trans_tbl[$key] = utf8_encode($val);
		}
		return strtr($string, $trans_tbl);
	}

	// Returns the utf string corresponding to the unicode value (from php.net, courtesy - romans@void.lv)
	function code2utf8($num)
	{
		if ($num < 128) return chr($num);
		if ($num < 2048) return chr(($num >> 6) + 192) . chr(($num & 63) + 128);
		if ($num < 65536) return chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
		if ($num < 2097152) return chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
		return '';
	}
//}

/*
* Fetch post
*/
// Force forum id
$sql = 'SELECT forum_id
	FROM ' . POSTS_TABLE . '
	WHERE post_id = ' . $post_id;
$result = $db->sql_query($sql);
$f_id = (int) $db->sql_fetchfield('forum_id');
$db->sql_freeresult($result);

$sql = 'SELECT f.*, t.*, p.*, u.username, u.username_clean, u.user_sig, u.user_sig_bbcode_uid, u.user_sig_bbcode_bitfield
	FROM ' . POSTS_TABLE . ' p, ' . TOPICS_TABLE . ' t, ' . FORUMS_TABLE . ' f, ' . USERS_TABLE . " u
	WHERE p.post_id = {$post_id}
		AND t.topic_id = p.topic_id
		AND u.user_id = p.poster_id
		AND (f.forum_id = t.forum_id
			OR f.forum_id = {$f_id})";
$result = $db->sql_query($sql);
$post_data = $db->sql_fetchrow($result);
$db->sql_freeresult($result);

// Load parser
$message_parser = new parse_message($post_data['post_text']);
unset($post_data['post_text']);

// Format the content as if it where *INSIDE* the posting field.
$message_parser->decode_message($post_data['bbcode_uid']);
$message = &$message_parser->message;
$message = html_entity_decode_utf8($message);
//var_dump($message);echo"\n\n\n\n";

// Here we "request_var" the post
set_var($message, $message, 'string', true);
$message = utf8_normalize_nfc($message);
//var_dump($message);echo"\n\n\n\n";

// Restore the var
$message_parser->message = &$message;
//var_dump($message_parser->message);echo"\n\n\n\n";

/*
*Now we can handle the post as in the submit action
*/
// Define flags
$post_flags = array(
	'enable_bbcode'		=> ($config['allow_bbcode']) ? $post_data['enable_bbcode'] : false,
	'enable_magic_url'	=> ($config['allow_post_links']) ? $post_data['enable_magic_url'] : false,
	'enable_smilies'	=> $post_data['enable_smilies'],
	'img_status'		=> $config['allow_bbcode'] ? true : false,
	'flash_status'		=> ($config['allow_bbcode'] && $config['allow_post_flash']) ? true : false,
	'enable_urls'		=> $config['allow_post_links'],
);

// Parse the post
$message_parser->parse($post_flags['enable_bbcode'], $post_flags['enable_magic_url'], $post_flags['enable_smilies'], $post_flags['img_status'], $post_flags['flash_status'], true, $post_flags['enable_urls']);

// Update the post data
$post_data = array_merge($post_data, $post_flags, array(
	'message'			=> $message_parser->message,
	'message_md5'		=> md5($message_parser->message),
	'bbcode_bitfield'	=> $message_parser->bbcode_bitfield,
	'bbcode_uid'		=> $message_parser->bbcode_uid,
));

// Make sure some required vars are set
$uninit = array(
	'post_attachment'	=> 0,
	'poster_id'			=> $user->data['user_id'],
	'enable_magic_url'	=> 0,
	'topic_status'		=> 0,
	'topic_type'		=> POST_NORMAL,
	'post_subject'		=> '',
	'topic_title'		=> '',
	'post_time'			=> 0,
	'post_edit_reason'	=> '',
	'notify'			=> 0,
	'notify_set'		=> 0,
);

foreach ($uninit as $var_name => $default_value)
{
	if (!isset($post_data[$var_name]))
	{
		$post_data[$var_name] = $default_value;
	}
}
unset($uninit);

// Handle poll
$poll = array();


// DEBUG
echo'<pre>';var_dump($message_parser);echo'</pre>';

// Now its time to submit the post
submit_post('edit', $post_data['post_subject'], $post_data['post_username'], $post_data['topic_type'], $poll, $post_data, true, true);


exit;
?>