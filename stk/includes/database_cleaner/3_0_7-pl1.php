<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @version $Id: 3_0_7.php 321 2010-03-06 06:27:41Z erikfrerejean $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Database Cleaner Data file for phpBB 3.0.7-pl1
*/
class database_cleaner_data
{
	// All default config settings
	var $config = array(
		'active_sessions'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_attachments'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_autologin'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_avatar'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_avatar_local'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_avatar_remote'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_avatar_upload'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_avatar_remote_upload'	=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_bbcode'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_birthdays'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_bookmarks'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_emailreuse'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_forum_notify'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_mass_pm'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_name_chars'				=> array('config_value' => 'USERNAME_CHARS_ANY', 'is_dynamic' => '0'),
		'allow_namechange'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_nocensors'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_pm_attach'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_pm_report'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_post_flash'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_post_links'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_privmsg'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_quick_reply'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_sig'						=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_sig_bbcode'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_sig_flash'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'allow_sig_img'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_sig_links'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_sig_pm'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_sig_smilies'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_smilies'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'allow_topic_notify'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'attachment_quota'				=> array('config_value' => '52428800', 'is_dynamic' => '0'),
		'auth_bbcode_pm'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'auth_flash_pm'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'auth_img_pm'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'auth_method'					=> array('config_value' => 'db', 'is_dynamic' => '0'),
		'auth_smilies_pm'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'avatar_filesize'				=> array('config_value' => '6144', 'is_dynamic' => '0'),
		'avatar_gallery_path'			=> array('config_value' => 'images/avatars/gallery', 'is_dynamic' => '0'),
		'avatar_max_height'				=> array('config_value' => '90', 'is_dynamic' => '0'),
		'avatar_max_width'				=> array('config_value' => '90', 'is_dynamic' => '0'),
		'avatar_min_height'				=> array('config_value' => '20', 'is_dynamic' => '0'),
		'avatar_min_width'				=> array('config_value' => '20', 'is_dynamic' => '0'),
		'avatar_path'					=> array('config_value' => 'images/avatars/upload', 'is_dynamic' => '0'),
		'avatar_salt'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'board_contact'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'board_disable'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'board_disable_msg'				=> array('config_value' => '', 'is_dynamic' => '0'),
		'board_dst'						=> array('config_value' => '0', 'is_dynamic' => '0'),
		'board_email'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'board_email_form'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'board_email_sig'				=> array('config_value' => 'Thanks, The Management', 'is_dynamic' => '0'),
		'board_hide_emails'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'board_timezone'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'browser_check'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'bump_interval'					=> array('config_value' => '10', 'is_dynamic' => '0'),
		'bump_type'						=> array('config_value' => 'd', 'is_dynamic' => '0'),
		'cache_gc'						=> array('config_value' => '7200', 'is_dynamic' => '0'),
		'captcha_plugin'				=> array('config_value' => 'phpbb_captcha_nogd', 'is_dynamic' => '0'),
		'captcha_gd'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'captcha_gd_fonts'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'captcha_gd_foreground_noise'	=> array('config_value' => '0', 'is_dynamic' => '0'),
		'captcha_gd_wave'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'captcha_gd_x_grid'				=> array('config_value' => '25', 'is_dynamic' => '0'),
		'captcha_gd_y_grid'				=> array('config_value' => '25', 'is_dynamic' => '0'),
		'captcha_gd_3d_noise'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'check_attachment_content'		=> array('config_value' => '1', 'is_dynamic' => '0'),
		'check_dnsbl'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'chg_passforce'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'confirm_refresh'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'cookie_domain'					=> array('config_value' => 'localhost', 'is_dynamic' => '0'),
		'cookie_name'					=> array('config_value' => 'phpbb3_cookie', 'is_dynamic' => '0'),
		'cookie_path'					=> array('config_value' => '/', 'is_dynamic' => '0'),
		'cookie_secure'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'coppa_enable'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'coppa_fax'						=> array('config_value' => '', 'is_dynamic' => '0'),
		'coppa_mail'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'database_gc'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'dbms_version'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'default_dateformat'			=> array('config_value' => 'D M d, Y g:i a', 'is_dynamic' => '0'),
		'default_style'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'display_last_edited'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'display_order'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'delete_time'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'edit_time'						=> array('config_value' => '0', 'is_dynamic' => '0'),
		'email_check_mx'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'email_enable'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'email_function_name'			=> array('config_value' => 'mail', 'is_dynamic' => '0'),
		'email_package_size'			=> array('config_value' => '50', 'is_dynamic' => '0'),
		'enable_confirm'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'enable_pm_icons'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'enable_post_confirm'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'enable_queue_trigger'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'feed_enable'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'feed_http_auth'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'feed_limit_post'				=> array('config_value' => '15', 'is_dynamic' => '15'),
		'feed_limit_topic'				=> array('config_value' => '10', 'is_dynamic' => '10'),
		'feed_limit'					=> array('config_value' => '10', 'is_dynamic' => '0'),
		'feed_overall_forums'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'feed_overall'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'feed_overall_forums_limit'		=> array('config_value' => '15', 'is_dynamic' => '0'),
		'feed_overall_topics'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'feed_overall_topics_limit'		=> array('config_value' => '15', 'is_dynamic' => '0'),
		'feed_forum'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'feed_topic'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'feed_topics_new'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'feed_topics_active'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'feed_item_statistics'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'flood_interval'				=> array('config_value' => '15', 'is_dynamic' => '0'),
		'force_server_vars'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'form_token_lifetime'			=> array('config_value' => '7200', 'is_dynamic' => '0'),
		'form_token_mintime'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'form_token_sid_guests'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'forward_pm'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'forwarded_for_check'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'full_folder_action'			=> array('config_value' => '2', 'is_dynamic' => '0'),
		'fulltext_mysql_max_word_len'	=> array('config_value' => '254', 'is_dynamic' => '0'),
		'fulltext_mysql_min_word_len'	=> array('config_value' => '4', 'is_dynamic' => '0'),
		'fulltext_native_common_thres'	=> array('config_value' => '5', 'is_dynamic' => '0'),
		'fulltext_native_load_upd'		=> array('config_value' => '1', 'is_dynamic' => '0'),
		'fulltext_native_max_chars'		=> array('config_value' => '14', 'is_dynamic' => '0'),
		'fulltext_native_min_chars'		=> array('config_value' => '3', 'is_dynamic' => '0'),
		'gzip_compress'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'hot_threshold'					=> array('config_value' => '25', 'is_dynamic' => '0'),
		'icons_path'					=> array('config_value' => 'images/icons', 'is_dynamic' => '0'),
		'img_create_thumbnail'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'img_display_inlined'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'img_imagick'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'img_link_height'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'img_link_width'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'img_max_height'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'img_max_thumb_width'			=> array('config_value' => '400', 'is_dynamic' => '0'),
		'img_max_width'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'img_min_thumb_filesize'		=> array('config_value' => '12000', 'is_dynamic' => '0'),
		'ip_check'						=> array('config_value' => '3', 'is_dynamic' => '0'),
		'jab_enable'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'jab_host'						=> array('config_value' => '', 'is_dynamic' => '0'),
		'jab_password'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'jab_package_size'				=> array('config_value' => '20', 'is_dynamic' => '0'),
		'jab_port'						=> array('config_value' => '5222', 'is_dynamic' => '0'),
		'jab_use_ssl'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'jab_username'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'ldap_base_dn'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'ldap_email'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'ldap_password'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'ldap_port'						=> array('config_value' => '', 'is_dynamic' => '0'),
		'ldap_server'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'ldap_uid'						=> array('config_value' => '', 'is_dynamic' => '0'),
		'ldap_user'						=> array('config_value' => '', 'is_dynamic' => '0'),
		'ldap_user_filter'				=> array('config_value' => '', 'is_dynamic' => '0'),
		'limit_load'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'limit_search_load'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'load_anon_lastread'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'load_birthdays'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_cpf_memberlist'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'load_cpf_viewprofile'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_cpf_viewtopic'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'load_db_lastread'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_db_track'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_jumpbox'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_moderators'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_online'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_online_guests'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_online_time'				=> array('config_value' => '5', 'is_dynamic' => '0'),
		'load_onlinetrack'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_search'					=> array('config_value' => '1', 'is_dynamic' => '0'),
		'load_tplcompile'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'load_user_activity'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'max_attachments'				=> array('config_value' => '3', 'is_dynamic' => '0'),
		'max_attachments_pm'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'max_autologin_time'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'max_filesize'					=> array('config_value' => '262144', 'is_dynamic' => '0'),
		'max_filesize_pm'				=> array('config_value' => '262144', 'is_dynamic' => '0'),
		'max_login_attempts'			=> array('config_value' => '3', 'is_dynamic' => '0'),
		'max_name_chars'				=> array('config_value' => '20', 'is_dynamic' => '0'),
		'max_num_search_keywords'		=> array('config_value' => '10', 'is_dynamic' => '0'),
		'max_pass_chars'				=> array('config_value' => '100', 'is_dynamic' => '0'),
		'max_poll_options'				=> array('config_value' => '10', 'is_dynamic' => '0'),
		'max_post_chars'				=> array('config_value' => '60000', 'is_dynamic' => '0'),
		'max_post_font_size'			=> array('config_value' => '200', 'is_dynamic' => '0'),
		'max_post_img_height'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'max_post_img_width'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'max_post_smilies'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'max_post_urls'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'max_quote_depth'				=> array('config_value' => '3', 'is_dynamic' => '0'),
		'max_reg_attempts'				=> array('config_value' => '5', 'is_dynamic' => '0'),
		'max_sig_chars'					=> array('config_value' => '255', 'is_dynamic' => '0'),
		'max_sig_font_size'				=> array('config_value' => '200', 'is_dynamic' => '0'),
		'max_sig_img_height'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'max_sig_img_width'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'max_sig_smilies'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'max_sig_urls'					=> array('config_value' => '5', 'is_dynamic' => '0'),
		'min_name_chars'				=> array('config_value' => '3', 'is_dynamic' => '0'),
		'min_pass_chars'				=> array('config_value' => '6', 'is_dynamic' => '0'),
		'min_post_chars'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'min_search_author_chars'		=> array('config_value' => '3', 'is_dynamic' => '0'),
		'min_time_reg'					=> array('config_value' => '0',	'is_dynamic' => '0'),
		'min_time_terms'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'mime_triggers'					=> array('config_value' => 'body|head|html|img|plaintext|a href|pre|script|table|title', 'is_dynamic' => '0'),
		'new_member_post_limit'			=> array('config_value' => '3', 'is_dynamic' => '0'),
		'new_member_group_default'		=> array('config_value' => '0', 'is_dynamic' => '0'),
		'override_user_style'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'pass_complex'					=> array('config_value' => 'PASS_TYPE_ANY', 'is_dynamic' => '0'),
		'pm_edit_time'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'pm_max_boxes'					=> array('config_value' => '4', 'is_dynamic' => '0'),
		'pm_max_msgs'					=> array('config_value' => '50', 'is_dynamic' => '0'),
		'pm_max_recipients'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'posts_per_page'				=> array('config_value' => '10', 'is_dynamic' => '0'),
		'print_pm'						=> array('config_value' => '1', 'is_dynamic' => '0'),
		'queue_interval'				=> array('config_value' => '600', 'is_dynamic' => '0'),
		'queue_trigger_posts'			=> array('config_value' => '3', 'is_dynamic' => '0'),
		'ranks_path'					=> array('config_value' => 'images/ranks', 'is_dynamic' => '0'),
		'require_activation'			=> array('config_value' => '0', 'is_dynamic' => '0'),
		'referer_validation'			=> array('config_value' => '1', 'is_dynamic' => '0'),
		'script_path'					=> array('config_value' => '/', 'is_dynamic' => '0'),
		'search_block_size'				=> array('config_value' => '250', 'is_dynamic' => '0'),
		'search_gc'						=> array('config_value' => '7200', 'is_dynamic' => '0'),
		'search_indexing_state'			=> array('config_value' => '', 'is_dynamic' => '1'),
		'search_interval'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'search_anonymous_interval'		=> array('config_value' => '0', 'is_dynamic' => '0'),
		'search_type'					=> array('config_value' => 'fulltext_native', 'is_dynamic' => '0'),
		'search_store_results'			=> array('config_value' => '1800', 'is_dynamic' => '0'),
		'secure_allow_deny'				=> array('config_value' => '1', 'is_dynamic' => '0'),
		'secure_allow_empty_referer'	=> array('config_value' => '1', 'is_dynamic' => '0'),
		'secure_downloads'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'server_name'					=> array('config_value' => 'localhost', 'is_dynamic' => '0'),
		'server_port'					=> array('config_value' => '80', 'is_dynamic' => '0'),
		'server_protocol'				=> array('config_value' => 'http://', 'is_dynamic' => '0'),
		'session_gc'					=> array('config_value' => '3600', 'is_dynamic' => '0'),
		'session_length'				=> array('config_value' => '3600', 'is_dynamic' => '0'),
		'site_desc'						=> array('config_value' => 'A short text to describe your forum', 'is_dynamic' => '0'),
		'sitename'						=> array('config_value' => 'yourdomain.com', 'is_dynamic' => '0'),
		'smilies_path'					=> array('config_value' => 'images/smilies', 'is_dynamic' => '0'),
		'smilies_per_page'				=> array('config_value' => '50', 'is_dynamic' => '0'),
		'smtp_auth_method'				=> array('config_value' => 'PLAIN', 'is_dynamic' => '0'),
		'smtp_delivery'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'smtp_host'						=> array('config_value' => '', 'is_dynamic' => '0'),
		'smtp_password'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'smtp_port'						=> array('config_value' => '25', 'is_dynamic' => '0'),
		'smtp_username'					=> array('config_value' => '', 'is_dynamic' => '0'),
		'topics_per_page'				=> array('config_value' => '25', 'is_dynamic' => '0'),
		'tpl_allow_php'					=> array('config_value' => '0', 'is_dynamic' => '0'),
		'upload_icons_path'				=> array('config_value' => 'images/upload_icons', 'is_dynamic' => '0'),
		'upload_path'					=> array('config_value' => 'files', 'is_dynamic' => '0'),
		'version'						=> array('config_value' => '3.0.7-PL1', 'is_dynamic' => '0'),
		'warnings_expire_days'			=> array('config_value' => '90', 'is_dynamic' => '0'),
		'warnings_gc'					=> array('config_value' => '14400', 'is_dynamic' => '0'),
		'cache_last_gc'					=> array('config_value' => '0', 'is_dynamic' => '1'),
		'cron_lock'						=> array('config_value' => '0', 'is_dynamic' => '1'),
		'database_last_gc'				=> array('config_value' => '0', 'is_dynamic' => '1'),
		'last_queue_run'				=> array('config_value' => '0', 'is_dynamic' => '1'),
		'newest_user_colour'			=> array('config_value' => '', 'is_dynamic' => '1'),
		'newest_user_id'				=> array('config_value' => '', 'is_dynamic' => '1'),
		'newest_username'				=> array('config_value' => '', 'is_dynamic' => '1'),
		'num_files'						=> array('config_value' => '0', 'is_dynamic' => '1'),
		'num_posts'						=> array('config_value' => '1', 'is_dynamic' => '1'),
		'num_topics'					=> array('config_value' => '1', 'is_dynamic' => '1'),
		'num_users'						=> array('config_value' => '1', 'is_dynamic' => '1'),
		'rand_seed'						=> array('config_value' => '', 'is_dynamic' => '1'),
		'rand_seed_last_update'			=> array('config_value' => '', 'is_dynamic' => '1'),
		'record_online_date'			=> array('config_value' => '0', 'is_dynamic' => '1'),
		'record_online_users'			=> array('config_value' => '0', 'is_dynamic' => '1'),
		'search_last_gc'				=> array('config_value' => '0', 'is_dynamic' => '1'),
		'session_last_gc'				=> array('config_value' => '0', 'is_dynamic' => '1'),
		'upload_dir_size'				=> array('config_value' => '0', 'is_dynamic' => '1'),
		'warnings_last_gc'				=> array('config_value' => '0', 'is_dynamic' => '1'),
		'board_startdate'				=> array('config_value' => '0', 'is_dynamic' => '0'),
		'default_lang'					=> array('config_value' => 'en', 'is_dynamic' => '0'),
	);

	// All default permission settings
	var $permissions = array(
		'f_'				=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_announce'		=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_attach'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_bbcode'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_bump'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_delete'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_download'		=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_edit'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_email'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_flash'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_icons'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_ignoreflood'		=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_img'				=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_list'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_noapprove'		=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_poll'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_post'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_postcount'		=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_print'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_read'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_reply'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_report'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_search'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_sigs'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_smilies'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_sticky'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_subscribe'		=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_user_lock'		=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_vote'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'f_votechg'			=> array('is_global' => '0', 'is_local' => '1', 'founder_only' => '0'),
		'm_'				=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_approve'			=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_chgposter'		=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_delete'			=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_edit'			=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_info'			=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_lock'			=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_merge'			=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_move'			=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_report'			=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_split'			=> array('is_global' => '1', 'is_local' => '1', 'founder_only' => '0'),
		'm_ban'				=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'm_warn'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_'				=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_aauth'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_attach'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_authgroups'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_authusers'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_backup'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_ban'				=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_bbcode'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_board'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_bots'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_clearlogs'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_email'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_fauth'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_forum'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_forumadd'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_forumdel'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_group'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_groupadd'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_groupdel'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_icons'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_jabber'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_language'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_mauth'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_modules'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_names'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_phpinfo'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_profile'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_prune'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_ranks'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_reasons'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_roles'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_search'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_server'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_styles'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_switchperm'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_uauth'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_user'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_userdel'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_viewauth'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_viewlogs'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'a_words'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_'				=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_attach'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_chgavatar'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_chgcensors'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_chgemail'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_chggrp'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_chgname'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_chgpasswd'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_download'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_hideonline'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_ignoreflood'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_masspm'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_masspm_group'	=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_attach'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_bbcode'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_delete'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_download'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_edit'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_emailpm'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_flash'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_forward'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_img'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_printpm'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_pm_smilies'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_readpm'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_savedrafts'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_search'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_sendemail'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_sendim'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_sendpm'			=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_sig'				=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_viewonline'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
		'u_viewprofile'		=> array('is_global' => '1', 'is_local' => '0', 'founder_only' => '0'),
	);

	// All default Modules (formatted to work with UMIL Auto Module inserter, it shouldn't be too long)
	var $modules = array(
		array('module_id' => '1', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '0', 'left_id' => '1', 'right_id' => '60', 'module_langname' => 'ACP_CAT_GENERAL', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '2', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '1', 'left_id' => '4', 'right_id' => '17', 'module_langname' => 'ACP_QUICK_ACCESS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '3', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '1', 'left_id' => '18', 'right_id' => '39', 'module_langname' => 'ACP_BOARD_CONFIGURATION', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '4', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '1', 'left_id' => '40', 'right_id' => '47', 'module_langname' => 'ACP_CLIENT_COMMUNICATION', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '5', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '1', 'left_id' => '48', 'right_id' => '59', 'module_langname' => 'ACP_SERVER_CONFIGURATION', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '6', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '0', 'left_id' => '61', 'right_id' => '78', 'module_langname' => 'ACP_CAT_FORUMS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '7', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '6', 'left_id' => '62', 'right_id' => '67', 'module_langname' => 'ACP_MANAGE_FORUMS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '8', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '6', 'left_id' => '68', 'right_id' => '77', 'module_langname' => 'ACP_FORUM_BASED_PERMISSIONS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '9', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '0', 'left_id' => '79', 'right_id' => '102', 'module_langname' => 'ACP_CAT_POSTING', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '10', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '9', 'left_id' => '80', 'right_id' => '91', 'module_langname' => 'ACP_MESSAGES', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '11', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '9', 'left_id' => '92', 'right_id' => '101', 'module_langname' => 'ACP_ATTACHMENTS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '12', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '0', 'left_id' => '103', 'right_id' => '156', 'module_langname' => 'ACP_CAT_USERGROUP', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '13', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '12', 'left_id' => '104', 'right_id' => '135', 'module_langname' => 'ACP_CAT_USERS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '14', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '12', 'left_id' => '136', 'right_id' => '143', 'module_langname' => 'ACP_GROUPS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '15', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '12', 'left_id' => '144', 'right_id' => '155', 'module_langname' => 'ACP_USER_SECURITY', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '16', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '0', 'left_id' => '157', 'right_id' => '204', 'module_langname' => 'ACP_CAT_PERMISSIONS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '17', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '16', 'left_id' => '160', 'right_id' => '169', 'module_langname' => 'ACP_GLOBAL_PERMISSIONS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '18', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '16', 'left_id' => '170', 'right_id' => '179', 'module_langname' => 'ACP_FORUM_BASED_PERMISSIONS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '19', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '16', 'left_id' => '180', 'right_id' => '189', 'module_langname' => 'ACP_PERMISSION_ROLES', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '20', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '16', 'left_id' => '190', 'right_id' => '203', 'module_langname' => 'ACP_PERMISSION_MASKS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '21', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '0', 'left_id' => '205', 'right_id' => '218', 'module_langname' => 'ACP_CAT_STYLES', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '22', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '21', 'left_id' => '206', 'right_id' => '209', 'module_langname' => 'ACP_STYLE_MANAGEMENT', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '23', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '21', 'left_id' => '210', 'right_id' => '217', 'module_langname' => 'ACP_STYLE_COMPONENTS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '24', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '0', 'left_id' => '219', 'right_id' => '238', 'module_langname' => 'ACP_CAT_MAINTENANCE', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '25', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '24', 'left_id' => '220', 'right_id' => '229', 'module_langname' => 'ACP_FORUM_LOGS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '26', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '24', 'left_id' => '230', 'right_id' => '237', 'module_langname' => 'ACP_CAT_DATABASE', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '27', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '0', 'left_id' => '239', 'right_id' => '264', 'module_langname' => 'ACP_CAT_SYSTEM', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '28', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '27', 'left_id' => '240', 'right_id' => '243', 'module_langname' => 'ACP_AUTOMATION', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '29', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '27', 'left_id' => '244', 'right_id' => '255', 'module_langname' => 'ACP_GENERAL_TASKS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '30', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '27', 'left_id' => '256', 'right_id' => '263', 'module_langname' => 'ACP_MODULE_MANAGEMENT', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '31', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'acp', 'parent_id' => '0', 'left_id' => '265', 'right_id' => '266', 'module_langname' => 'ACP_CAT_DOT_MODS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '32', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'attachments', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '19', 'right_id' => '20', 'module_langname' => 'ACP_ATTACHMENT_SETTINGS', 'module_mode' => 'attach', 'module_auth' => 'acl_a_attach'),
		array('module_id' => '33', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'attachments', 'module_class' => 'acp', 'parent_id' => '11', 'left_id' => '93', 'right_id' => '94', 'module_langname' => 'ACP_ATTACHMENT_SETTINGS', 'module_mode' => 'attach', 'module_auth' => 'acl_a_attach'),
		array('module_id' => '34', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'attachments', 'module_class' => 'acp', 'parent_id' => '11', 'left_id' => '95', 'right_id' => '96', 'module_langname' => 'ACP_MANAGE_EXTENSIONS', 'module_mode' => 'extensions', 'module_auth' => 'acl_a_attach'),
		array('module_id' => '35', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'attachments', 'module_class' => 'acp', 'parent_id' => '11', 'left_id' => '97', 'right_id' => '98', 'module_langname' => 'ACP_EXTENSION_GROUPS', 'module_mode' => 'ext_groups', 'module_auth' => 'acl_a_attach'),
		array('module_id' => '36', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'attachments', 'module_class' => 'acp', 'parent_id' => '11', 'left_id' => '99', 'right_id' => '100', 'module_langname' => 'ACP_ORPHAN_ATTACHMENTS', 'module_mode' => 'orphan', 'module_auth' => 'acl_a_attach'),
		array('module_id' => '37', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'ban', 'module_class' => 'acp', 'parent_id' => '15', 'left_id' => '145', 'right_id' => '146', 'module_langname' => 'ACP_BAN_EMAILS', 'module_mode' => 'email', 'module_auth' => 'acl_a_ban'),
		array('module_id' => '38', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'ban', 'module_class' => 'acp', 'parent_id' => '15', 'left_id' => '147', 'right_id' => '148', 'module_langname' => 'ACP_BAN_IPS', 'module_mode' => 'ip', 'module_auth' => 'acl_a_ban'),
		array('module_id' => '39', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'ban', 'module_class' => 'acp', 'parent_id' => '15', 'left_id' => '149', 'right_id' => '150', 'module_langname' => 'ACP_BAN_USERNAMES', 'module_mode' => 'user', 'module_auth' => 'acl_a_ban'),
		array('module_id' => '40', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'bbcodes', 'module_class' => 'acp', 'parent_id' => '10', 'left_id' => '81', 'right_id' => '82', 'module_langname' => 'ACP_BBCODES', 'module_mode' => 'bbcodes', 'module_auth' => 'acl_a_bbcode'),
		array('module_id' => '41', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '21', 'right_id' => '22', 'module_langname' => 'ACP_BOARD_SETTINGS', 'module_mode' => 'settings', 'module_auth' => 'acl_a_board'),
		array('module_id' => '42', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '23', 'right_id' => '24', 'module_langname' => 'ACP_BOARD_FEATURES', 'module_mode' => 'features', 'module_auth' => 'acl_a_board'),
		array('module_id' => '43', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '25', 'right_id' => '26', 'module_langname' => 'ACP_AVATAR_SETTINGS', 'module_mode' => 'avatar', 'module_auth' => 'acl_a_board'),
		array('module_id' => '44', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '27', 'right_id' => '28', 'module_langname' => 'ACP_MESSAGE_SETTINGS', 'module_mode' => 'message', 'module_auth' => 'acl_a_board'),
		array('module_id' => '45', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '10', 'left_id' => '83', 'right_id' => '84', 'module_langname' => 'ACP_MESSAGE_SETTINGS', 'module_mode' => 'message', 'module_auth' => 'acl_a_board'),
		array('module_id' => '46', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '29', 'right_id' => '30', 'module_langname' => 'ACP_POST_SETTINGS', 'module_mode' => 'post', 'module_auth' => 'acl_a_board'),
		array('module_id' => '47', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '31', 'right_id' => '32', 'module_langname' => 'ACP_SIGNATURE_SETTINGS', 'module_mode' => 'signature', 'module_auth' => 'acl_a_board'),
		array('module_id' => '48', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '33', 'right_id' => '34', 'module_langname' => 'ACP_REGISTER_SETTINGS', 'module_mode' => 'registration', 'module_auth' => 'acl_a_board'),
		array('module_id' => '49', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '4', 'left_id' => '41', 'right_id' => '42', 'module_langname' => 'ACP_AUTH_SETTINGS', 'module_mode' => 'auth', 'module_auth' => 'acl_a_server'),
		array('module_id' => '50', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '4', 'left_id' => '43', 'right_id' => '44', 'module_langname' => 'ACP_EMAIL_SETTINGS', 'module_mode' => 'email', 'module_auth' => 'acl_a_server'),
		array('module_id' => '51', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '5', 'left_id' => '49', 'right_id' => '50', 'module_langname' => 'ACP_COOKIE_SETTINGS', 'module_mode' => 'cookie', 'module_auth' => 'acl_a_server'),
		array('module_id' => '52', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '5', 'left_id' => '51', 'right_id' => '52', 'module_langname' => 'ACP_SERVER_SETTINGS', 'module_mode' => 'server', 'module_auth' => 'acl_a_server'),
		array('module_id' => '53', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '5', 'left_id' => '53', 'right_id' => '54', 'module_langname' => 'ACP_SECURITY_SETTINGS', 'module_mode' => 'security', 'module_auth' => 'acl_a_server'),
		array('module_id' => '54', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '5', 'left_id' => '55', 'right_id' => '56', 'module_langname' => 'ACP_LOAD_SETTINGS', 'module_mode' => 'load', 'module_auth' => 'acl_a_server'),
		array('module_id' => '55', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'bots', 'module_class' => 'acp', 'parent_id' => '29', 'left_id' => '245', 'right_id' => '246', 'module_langname' => 'ACP_BOTS', 'module_mode' => 'bots', 'module_auth' => 'acl_a_bots'),
		array('module_id' => '56', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'captcha', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '35', 'right_id' => '36', 'module_langname' => 'ACP_VC_SETTINGS', 'module_mode' => 'visual', 'module_auth' => 'acl_a_board'),
		array('module_id' => '57', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'captcha', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '37', 'right_id' => '38', 'module_langname' => 'ACP_VC_CAPTCHA_DISPLAY', 'module_mode' => 'img', 'module_auth' => 'acl_a_board'),
		array('module_id' => '58', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'database', 'module_class' => 'acp', 'parent_id' => '26', 'left_id' => '231', 'right_id' => '232', 'module_langname' => 'ACP_BACKUP', 'module_mode' => 'backup', 'module_auth' => 'acl_a_backup'),
		array('module_id' => '59', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'database', 'module_class' => 'acp', 'parent_id' => '26', 'left_id' => '233', 'right_id' => '234', 'module_langname' => 'ACP_RESTORE', 'module_mode' => 'restore', 'module_auth' => 'acl_a_backup'),
		array('module_id' => '60', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'disallow', 'module_class' => 'acp', 'parent_id' => '15', 'left_id' => '151', 'right_id' => '152', 'module_langname' => 'ACP_DISALLOW_USERNAMES', 'module_mode' => 'usernames', 'module_auth' => 'acl_a_names'),
		array('module_id' => '61', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'email', 'module_class' => 'acp', 'parent_id' => '29', 'left_id' => '247', 'right_id' => '248', 'module_langname' => 'ACP_MASS_EMAIL', 'module_mode' => 'email', 'module_auth' => 'acl_a_email && cfg_email_enable'),
		array('module_id' => '62', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'forums', 'module_class' => 'acp', 'parent_id' => '7', 'left_id' => '63', 'right_id' => '64', 'module_langname' => 'ACP_MANAGE_FORUMS', 'module_mode' => 'manage', 'module_auth' => 'acl_a_forum'),
		array('module_id' => '63', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'groups', 'module_class' => 'acp', 'parent_id' => '14', 'left_id' => '137', 'right_id' => '138', 'module_langname' => 'ACP_GROUPS_MANAGE', 'module_mode' => 'manage', 'module_auth' => 'acl_a_group'),
		array('module_id' => '64', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'icons', 'module_class' => 'acp', 'parent_id' => '10', 'left_id' => '85', 'right_id' => '86', 'module_langname' => 'ACP_ICONS', 'module_mode' => 'icons', 'module_auth' => 'acl_a_icons'),
		array('module_id' => '65', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'icons', 'module_class' => 'acp', 'parent_id' => '10', 'left_id' => '87', 'right_id' => '88', 'module_langname' => 'ACP_SMILIES', 'module_mode' => 'smilies', 'module_auth' => 'acl_a_icons'),
		array('module_id' => '66', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'inactive', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '107', 'right_id' => '108', 'module_langname' => 'ACP_INACTIVE_USERS', 'module_mode' => 'list', 'module_auth' => 'acl_a_user'),
		array('module_id' => '67', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'jabber', 'module_class' => 'acp', 'parent_id' => '4', 'left_id' => '45', 'right_id' => '46', 'module_langname' => 'ACP_JABBER_SETTINGS', 'module_mode' => 'settings', 'module_auth' => 'acl_a_jabber'),
		array('module_id' => '68', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'language', 'module_class' => 'acp', 'parent_id' => '29', 'left_id' => '249', 'right_id' => '250', 'module_langname' => 'ACP_LANGUAGE_PACKS', 'module_mode' => 'lang_packs', 'module_auth' => 'acl_a_language'),
		array('module_id' => '69', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'logs', 'module_class' => 'acp', 'parent_id' => '25', 'left_id' => '221', 'right_id' => '222', 'module_langname' => 'ACP_ADMIN_LOGS', 'module_mode' => 'admin', 'module_auth' => 'acl_a_viewlogs'),
		array('module_id' => '70', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'logs', 'module_class' => 'acp', 'parent_id' => '25', 'left_id' => '223', 'right_id' => '224', 'module_langname' => 'ACP_MOD_LOGS', 'module_mode' => 'mod', 'module_auth' => 'acl_a_viewlogs'),
		array('module_id' => '71', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'logs', 'module_class' => 'acp', 'parent_id' => '25', 'left_id' => '225', 'right_id' => '226', 'module_langname' => 'ACP_USERS_LOGS', 'module_mode' => 'users', 'module_auth' => 'acl_a_viewlogs'),
		array('module_id' => '72', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'logs', 'module_class' => 'acp', 'parent_id' => '25', 'left_id' => '227', 'right_id' => '228', 'module_langname' => 'ACP_CRITICAL_LOGS', 'module_mode' => 'critical', 'module_auth' => 'acl_a_viewlogs'),
		array('module_id' => '73', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'main', 'module_class' => 'acp', 'parent_id' => '1', 'left_id' => '2', 'right_id' => '3', 'module_langname' => 'ACP_INDEX', 'module_mode' => 'main', 'module_auth' => ''),
		array('module_id' => '74', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'modules', 'module_class' => 'acp', 'parent_id' => '30', 'left_id' => '257', 'right_id' => '258', 'module_langname' => 'ACP', 'module_mode' => 'acp', 'module_auth' => 'acl_a_modules'),
		array('module_id' => '75', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'modules', 'module_class' => 'acp', 'parent_id' => '30', 'left_id' => '259', 'right_id' => '260', 'module_langname' => 'UCP', 'module_mode' => 'ucp', 'module_auth' => 'acl_a_modules'),
		array('module_id' => '76', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'modules', 'module_class' => 'acp', 'parent_id' => '30', 'left_id' => '261', 'right_id' => '262', 'module_langname' => 'MCP', 'module_mode' => 'mcp', 'module_auth' => 'acl_a_modules'),
		array('module_id' => '77', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permission_roles', 'module_class' => 'acp', 'parent_id' => '19', 'left_id' => '181', 'right_id' => '182', 'module_langname' => 'ACP_ADMIN_ROLES', 'module_mode' => 'admin_roles', 'module_auth' => 'acl_a_roles && acl_a_aauth'),
		array('module_id' => '78', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permission_roles', 'module_class' => 'acp', 'parent_id' => '19', 'left_id' => '183', 'right_id' => '184', 'module_langname' => 'ACP_USER_ROLES', 'module_mode' => 'user_roles', 'module_auth' => 'acl_a_roles && acl_a_uauth'),
		array('module_id' => '79', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permission_roles', 'module_class' => 'acp', 'parent_id' => '19', 'left_id' => '185', 'right_id' => '186', 'module_langname' => 'ACP_MOD_ROLES', 'module_mode' => 'mod_roles', 'module_auth' => 'acl_a_roles && acl_a_mauth'),
		array('module_id' => '80', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permission_roles', 'module_class' => 'acp', 'parent_id' => '19', 'left_id' => '187', 'right_id' => '188', 'module_langname' => 'ACP_FORUM_ROLES', 'module_mode' => 'forum_roles', 'module_auth' => 'acl_a_roles && acl_a_fauth'),
		array('module_id' => '81', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '16', 'left_id' => '158', 'right_id' => '159', 'module_langname' => 'ACP_PERMISSIONS', 'module_mode' => 'intro', 'module_auth' => 'acl_a_authusers || acl_a_authgroups || acl_a_viewauth'),
		array('module_id' => '82', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '20', 'left_id' => '191', 'right_id' => '192', 'module_langname' => 'ACP_PERMISSION_TRACE', 'module_mode' => 'trace', 'module_auth' => 'acl_a_viewauth'),
		array('module_id' => '83', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '18', 'left_id' => '171', 'right_id' => '172', 'module_langname' => 'ACP_FORUM_PERMISSIONS', 'module_mode' => 'setting_forum_local', 'module_auth' => 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),
		array('module_id' => '84', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '18', 'left_id' => '173', 'right_id' => '174', 'module_langname' => 'ACP_FORUM_MODERATORS', 'module_mode' => 'setting_mod_local', 'module_auth' => 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
		array('module_id' => '85', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '17', 'left_id' => '161', 'right_id' => '162', 'module_langname' => 'ACP_USERS_PERMISSIONS', 'module_mode' => 'setting_user_global', 'module_auth' => 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
		array('module_id' => '86', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '109', 'right_id' => '110', 'module_langname' => 'ACP_USERS_PERMISSIONS', 'module_mode' => 'setting_user_global', 'module_auth' => 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
		array('module_id' => '87', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '18', 'left_id' => '175', 'right_id' => '176', 'module_langname' => 'ACP_USERS_FORUM_PERMISSIONS', 'module_mode' => 'setting_user_local', 'module_auth' => 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
		array('module_id' => '88', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '111', 'right_id' => '112', 'module_langname' => 'ACP_USERS_FORUM_PERMISSIONS', 'module_mode' => 'setting_user_local', 'module_auth' => 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
		array('module_id' => '89', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '17', 'left_id' => '163', 'right_id' => '164', 'module_langname' => 'ACP_GROUPS_PERMISSIONS', 'module_mode' => 'setting_group_global', 'module_auth' => 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
		array('module_id' => '90', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '14', 'left_id' => '139', 'right_id' => '140', 'module_langname' => 'ACP_GROUPS_PERMISSIONS', 'module_mode' => 'setting_group_global', 'module_auth' => 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
		array('module_id' => '91', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '18', 'left_id' => '177', 'right_id' => '178', 'module_langname' => 'ACP_GROUPS_FORUM_PERMISSIONS', 'module_mode' => 'setting_group_local', 'module_auth' => 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
		array('module_id' => '92', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '14', 'left_id' => '141', 'right_id' => '142', 'module_langname' => 'ACP_GROUPS_FORUM_PERMISSIONS', 'module_mode' => 'setting_group_local', 'module_auth' => 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
		array('module_id' => '93', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '17', 'left_id' => '165', 'right_id' => '166', 'module_langname' => 'ACP_ADMINISTRATORS', 'module_mode' => 'setting_admin_global', 'module_auth' => 'acl_a_aauth && (acl_a_authusers || acl_a_authgroups)'),
		array('module_id' => '94', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '17', 'left_id' => '167', 'right_id' => '168', 'module_langname' => 'ACP_GLOBAL_MODERATORS', 'module_mode' => 'setting_mod_global', 'module_auth' => 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
		array('module_id' => '95', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '20', 'left_id' => '193', 'right_id' => '194', 'module_langname' => 'ACP_VIEW_ADMIN_PERMISSIONS', 'module_mode' => 'view_admin_global', 'module_auth' => 'acl_a_viewauth'),
		array('module_id' => '96', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '20', 'left_id' => '195', 'right_id' => '196', 'module_langname' => 'ACP_VIEW_USER_PERMISSIONS', 'module_mode' => 'view_user_global', 'module_auth' => 'acl_a_viewauth'),
		array('module_id' => '97', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '20', 'left_id' => '197', 'right_id' => '198', 'module_langname' => 'ACP_VIEW_GLOBAL_MOD_PERMISSIONS', 'module_mode' => 'view_mod_global', 'module_auth' => 'acl_a_viewauth'),
		array('module_id' => '98', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '20', 'left_id' => '199', 'right_id' => '200', 'module_langname' => 'ACP_VIEW_FORUM_MOD_PERMISSIONS', 'module_mode' => 'view_mod_local', 'module_auth' => 'acl_a_viewauth'),
		array('module_id' => '99', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '20', 'left_id' => '201', 'right_id' => '202', 'module_langname' => 'ACP_VIEW_FORUM_PERMISSIONS', 'module_mode' => 'view_forum_local', 'module_auth' => 'acl_a_viewauth'),
		array('module_id' => '100', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'php_info', 'module_class' => 'acp', 'parent_id' => '29', 'left_id' => '251', 'right_id' => '252', 'module_langname' => 'ACP_PHP_INFO', 'module_mode' => 'info', 'module_auth' => 'acl_a_phpinfo'),
		array('module_id' => '101', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'profile', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '113', 'right_id' => '114', 'module_langname' => 'ACP_CUSTOM_PROFILE_FIELDS', 'module_mode' => 'profile', 'module_auth' => 'acl_a_profile'),
		array('module_id' => '102', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'prune', 'module_class' => 'acp', 'parent_id' => '7', 'left_id' => '65', 'right_id' => '66', 'module_langname' => 'ACP_PRUNE_FORUMS', 'module_mode' => 'forums', 'module_auth' => 'acl_a_prune'),
		array('module_id' => '103', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'prune', 'module_class' => 'acp', 'parent_id' => '15', 'left_id' => '153', 'right_id' => '154', 'module_langname' => 'ACP_PRUNE_USERS', 'module_mode' => 'users', 'module_auth' => 'acl_a_userdel'),
		array('module_id' => '104', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'ranks', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '115', 'right_id' => '116', 'module_langname' => 'ACP_MANAGE_RANKS', 'module_mode' => 'ranks', 'module_auth' => 'acl_a_ranks'),
		array('module_id' => '105', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'reasons', 'module_class' => 'acp', 'parent_id' => '29', 'left_id' => '253', 'right_id' => '254', 'module_langname' => 'ACP_MANAGE_REASONS', 'module_mode' => 'main', 'module_auth' => 'acl_a_reasons'),
		array('module_id' => '106', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'search', 'module_class' => 'acp', 'parent_id' => '5', 'left_id' => '57', 'right_id' => '58', 'module_langname' => 'ACP_SEARCH_SETTINGS', 'module_mode' => 'settings', 'module_auth' => 'acl_a_search'),
		array('module_id' => '107', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'search', 'module_class' => 'acp', 'parent_id' => '26', 'left_id' => '235', 'right_id' => '236', 'module_langname' => 'ACP_SEARCH_INDEX', 'module_mode' => 'index', 'module_auth' => 'acl_a_search'),
		array('module_id' => '108', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'styles', 'module_class' => 'acp', 'parent_id' => '22', 'left_id' => '207', 'right_id' => '208', 'module_langname' => 'ACP_STYLES', 'module_mode' => 'style', 'module_auth' => 'acl_a_styles'),
		array('module_id' => '109', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'styles', 'module_class' => 'acp', 'parent_id' => '23', 'left_id' => '211', 'right_id' => '212', 'module_langname' => 'ACP_TEMPLATES', 'module_mode' => 'template', 'module_auth' => 'acl_a_styles'),
		array('module_id' => '110', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'styles', 'module_class' => 'acp', 'parent_id' => '23', 'left_id' => '213', 'right_id' => '214', 'module_langname' => 'ACP_THEMES', 'module_mode' => 'theme', 'module_auth' => 'acl_a_styles'),
		array('module_id' => '111', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'styles', 'module_class' => 'acp', 'parent_id' => '23', 'left_id' => '215', 'right_id' => '216', 'module_langname' => 'ACP_IMAGESETS', 'module_mode' => 'imageset', 'module_auth' => 'acl_a_styles'),
		array('module_id' => '112', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'update', 'module_class' => 'acp', 'parent_id' => '28', 'left_id' => '241', 'right_id' => '242', 'module_langname' => 'ACP_VERSION_CHECK', 'module_mode' => 'version_check', 'module_auth' => 'acl_a_board'),
		array('module_id' => '113', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '105', 'right_id' => '106', 'module_langname' => 'ACP_MANAGE_USERS', 'module_mode' => 'overview', 'module_auth' => 'acl_a_user'),
		array('module_id' => '114', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '117', 'right_id' => '118', 'module_langname' => 'ACP_USER_FEEDBACK', 'module_mode' => 'feedback', 'module_auth' => 'acl_a_user'),
		array('module_id' => '115', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '119', 'right_id' => '120', 'module_langname' => 'ACP_USER_PROFILE', 'module_mode' => 'profile', 'module_auth' => 'acl_a_user'),
		array('module_id' => '116', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '121', 'right_id' => '122', 'module_langname' => 'ACP_USER_PREFS', 'module_mode' => 'prefs', 'module_auth' => 'acl_a_user'),
		array('module_id' => '117', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '123', 'right_id' => '124', 'module_langname' => 'ACP_USER_AVATAR', 'module_mode' => 'avatar', 'module_auth' => 'acl_a_user'),
		array('module_id' => '118', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '125', 'right_id' => '126', 'module_langname' => 'ACP_USER_RANK', 'module_mode' => 'rank', 'module_auth' => 'acl_a_user'),
		array('module_id' => '119', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '127', 'right_id' => '128', 'module_langname' => 'ACP_USER_SIG', 'module_mode' => 'sig', 'module_auth' => 'acl_a_user'),
		array('module_id' => '120', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '129', 'right_id' => '130', 'module_langname' => 'ACP_USER_GROUPS', 'module_mode' => 'groups', 'module_auth' => 'acl_a_user && acl_a_group'),
		array('module_id' => '121', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '131', 'right_id' => '132', 'module_langname' => 'ACP_USER_PERM', 'module_mode' => 'perm', 'module_auth' => 'acl_a_user && acl_a_viewauth'),
		array('module_id' => '122', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '13', 'left_id' => '133', 'right_id' => '134', 'module_langname' => 'ACP_USER_ATTACH', 'module_mode' => 'attach', 'module_auth' => 'acl_a_user'),
		array('module_id' => '123', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'words', 'module_class' => 'acp', 'parent_id' => '10', 'left_id' => '89', 'right_id' => '90', 'module_langname' => 'ACP_WORDS', 'module_mode' => 'words', 'module_auth' => 'acl_a_words'),
		array('module_id' => '124', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'users', 'module_class' => 'acp', 'parent_id' => '2', 'left_id' => '5', 'right_id' => '6', 'module_langname' => 'ACP_MANAGE_USERS', 'module_mode' => 'overview', 'module_auth' => 'acl_a_user'),
		array('module_id' => '125', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'groups', 'module_class' => 'acp', 'parent_id' => '2', 'left_id' => '7', 'right_id' => '8', 'module_langname' => 'ACP_GROUPS_MANAGE', 'module_mode' => 'manage', 'module_auth' => 'acl_a_group'),
		array('module_id' => '126', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'forums', 'module_class' => 'acp', 'parent_id' => '2', 'left_id' => '9', 'right_id' => '10', 'module_langname' => 'ACP_MANAGE_FORUMS', 'module_mode' => 'manage', 'module_auth' => 'acl_a_forum'),
		array('module_id' => '127', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'logs', 'module_class' => 'acp', 'parent_id' => '2', 'left_id' => '11', 'right_id' => '12', 'module_langname' => 'ACP_MOD_LOGS', 'module_mode' => 'mod', 'module_auth' => 'acl_a_viewlogs'),
		array('module_id' => '128', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'bots', 'module_class' => 'acp', 'parent_id' => '2', 'left_id' => '13', 'right_id' => '14', 'module_langname' => 'ACP_BOTS', 'module_mode' => 'bots', 'module_auth' => 'acl_a_bots'),
		array('module_id' => '129', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'php_info', 'module_class' => 'acp', 'parent_id' => '2', 'left_id' => '15', 'right_id' => '16', 'module_langname' => 'ACP_PHP_INFO', 'module_mode' => 'info', 'module_auth' => 'acl_a_phpinfo'),
		array('module_id' => '130', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '8', 'left_id' => '69', 'right_id' => '70', 'module_langname' => 'ACP_FORUM_PERMISSIONS', 'module_mode' => 'setting_forum_local', 'module_auth' => 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),
		array('module_id' => '131', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '8', 'left_id' => '71', 'right_id' => '72', 'module_langname' => 'ACP_FORUM_MODERATORS', 'module_mode' => 'setting_mod_local', 'module_auth' => 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
		array('module_id' => '132', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '8', 'left_id' => '73', 'right_id' => '74', 'module_langname' => 'ACP_USERS_FORUM_PERMISSIONS', 'module_mode' => 'setting_user_local', 'module_auth' => 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
		array('module_id' => '133', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'permissions', 'module_class' => 'acp', 'parent_id' => '8', 'left_id' => '75', 'right_id' => '76', 'module_langname' => 'ACP_GROUPS_FORUM_PERMISSIONS', 'module_mode' => 'setting_group_local', 'module_auth' => 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
		array('module_id' => '134', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'mcp', 'parent_id' => '0', 'left_id' => '1', 'right_id' => '10', 'module_langname' => 'MCP_MAIN', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '135', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'mcp', 'parent_id' => '0', 'left_id' => '11', 'right_id' => '18', 'module_langname' => 'MCP_QUEUE', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '136', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'mcp', 'parent_id' => '0', 'left_id' => '19', 'right_id' => '26', 'module_langname' => 'MCP_REPORTS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '137', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'mcp', 'parent_id' => '0', 'left_id' => '27', 'right_id' => '32', 'module_langname' => 'MCP_NOTES', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '138', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'mcp', 'parent_id' => '0', 'left_id' => '33', 'right_id' => '42', 'module_langname' => 'MCP_WARN', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '139', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'mcp', 'parent_id' => '0', 'left_id' => '43', 'right_id' => '50', 'module_langname' => 'MCP_LOGS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '140', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'mcp', 'parent_id' => '0', 'left_id' => '51', 'right_id' => '58', 'module_langname' => 'MCP_BAN', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '141', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'ban', 'module_class' => 'mcp', 'parent_id' => '140', 'left_id' => '52', 'right_id' => '53', 'module_langname' => 'MCP_BAN_USERNAMES', 'module_mode' => 'user', 'module_auth' => 'acl_m_ban'),
		array('module_id' => '142', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'ban', 'module_class' => 'mcp', 'parent_id' => '140', 'left_id' => '54', 'right_id' => '55', 'module_langname' => 'MCP_BAN_IPS', 'module_mode' => 'ip', 'module_auth' => 'acl_m_ban'),
		array('module_id' => '143', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'ban', 'module_class' => 'mcp', 'parent_id' => '140', 'left_id' => '56', 'right_id' => '57', 'module_langname' => 'MCP_BAN_EMAILS', 'module_mode' => 'email', 'module_auth' => 'acl_m_ban'),
		array('module_id' => '144', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'logs', 'module_class' => 'mcp', 'parent_id' => '139', 'left_id' => '44', 'right_id' => '45', 'module_langname' => 'MCP_LOGS_FRONT', 'module_mode' => 'front', 'module_auth' => 'acl_m_ || aclf_m_'),
		array('module_id' => '145', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'logs', 'module_class' => 'mcp', 'parent_id' => '139', 'left_id' => '46', 'right_id' => '47', 'module_langname' => 'MCP_LOGS_FORUM_VIEW', 'module_mode' => 'forum_logs', 'module_auth' => 'acl_m_,$id'),
		array('module_id' => '146', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'logs', 'module_class' => 'mcp', 'parent_id' => '139', 'left_id' => '48', 'right_id' => '49', 'module_langname' => 'MCP_LOGS_TOPIC_VIEW', 'module_mode' => 'topic_logs', 'module_auth' => 'acl_m_,$id'),
		array('module_id' => '147', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'main', 'module_class' => 'mcp', 'parent_id' => '134', 'left_id' => '2', 'right_id' => '3', 'module_langname' => 'MCP_MAIN_FRONT', 'module_mode' => 'front', 'module_auth' => ''),
		array('module_id' => '148', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'main', 'module_class' => 'mcp', 'parent_id' => '134', 'left_id' => '4', 'right_id' => '5', 'module_langname' => 'MCP_MAIN_FORUM_VIEW', 'module_mode' => 'forum_view', 'module_auth' => 'acl_m_,$id'),
		array('module_id' => '149', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'main', 'module_class' => 'mcp', 'parent_id' => '134', 'left_id' => '6', 'right_id' => '7', 'module_langname' => 'MCP_MAIN_TOPIC_VIEW', 'module_mode' => 'topic_view', 'module_auth' => 'acl_m_,$id'),
		array('module_id' => '150', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'main', 'module_class' => 'mcp', 'parent_id' => '134', 'left_id' => '8', 'right_id' => '9', 'module_langname' => 'MCP_MAIN_POST_DETAILS', 'module_mode' => 'post_details', 'module_auth' => 'acl_m_,$id || (!$id && aclf_m_)'),
		array('module_id' => '151', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'notes', 'module_class' => 'mcp', 'parent_id' => '137', 'left_id' => '28', 'right_id' => '29', 'module_langname' => 'MCP_NOTES_FRONT', 'module_mode' => 'front', 'module_auth' => ''),
		array('module_id' => '152', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'notes', 'module_class' => 'mcp', 'parent_id' => '137', 'left_id' => '30', 'right_id' => '31', 'module_langname' => 'MCP_NOTES_USER', 'module_mode' => 'user_notes', 'module_auth' => ''),
		array('module_id' => '153', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'queue', 'module_class' => 'mcp', 'parent_id' => '135', 'left_id' => '12', 'right_id' => '13', 'module_langname' => 'MCP_QUEUE_UNAPPROVED_TOPICS', 'module_mode' => 'unapproved_topics', 'module_auth' => 'aclf_m_approve'),
		array('module_id' => '154', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'queue', 'module_class' => 'mcp', 'parent_id' => '135', 'left_id' => '14', 'right_id' => '15', 'module_langname' => 'MCP_QUEUE_UNAPPROVED_POSTS', 'module_mode' => 'unapproved_posts', 'module_auth' => 'aclf_m_approve'),
		array('module_id' => '155', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'queue', 'module_class' => 'mcp', 'parent_id' => '135', 'left_id' => '16', 'right_id' => '17', 'module_langname' => 'MCP_QUEUE_APPROVE_DETAILS', 'module_mode' => 'approve_details', 'module_auth' => 'acl_m_approve,$id || (!$id && aclf_m_approve)'),
		array('module_id' => '156', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'reports', 'module_class' => 'mcp', 'parent_id' => '136', 'left_id' => '20', 'right_id' => '21', 'module_langname' => 'MCP_REPORTS_OPEN', 'module_mode' => 'reports', 'module_auth' => 'aclf_m_report'),
		array('module_id' => '157', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'reports', 'module_class' => 'mcp', 'parent_id' => '136', 'left_id' => '22', 'right_id' => '23', 'module_langname' => 'MCP_REPORTS_CLOSED', 'module_mode' => 'reports_closed', 'module_auth' => 'aclf_m_report'),
		array('module_id' => '158', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'reports', 'module_class' => 'mcp', 'parent_id' => '136', 'left_id' => '24', 'right_id' => '25', 'module_langname' => 'MCP_REPORT_DETAILS', 'module_mode' => 'report_details', 'module_auth' => 'acl_m_report,$id || (!$id && aclf_m_report)'),
		array('module_id' => '159', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'warn', 'module_class' => 'mcp', 'parent_id' => '138', 'left_id' => '34', 'right_id' => '35', 'module_langname' => 'MCP_WARN_FRONT', 'module_mode' => 'front', 'module_auth' => 'aclf_m_warn'),
		array('module_id' => '160', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'warn', 'module_class' => 'mcp', 'parent_id' => '138', 'left_id' => '36', 'right_id' => '37', 'module_langname' => 'MCP_WARN_LIST', 'module_mode' => 'list', 'module_auth' => 'aclf_m_warn'),
		array('module_id' => '161', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'warn', 'module_class' => 'mcp', 'parent_id' => '138', 'left_id' => '38', 'right_id' => '39', 'module_langname' => 'MCP_WARN_USER', 'module_mode' => 'warn_user', 'module_auth' => 'aclf_m_warn'),
		array('module_id' => '162', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'warn', 'module_class' => 'mcp', 'parent_id' => '138', 'left_id' => '40', 'right_id' => '41', 'module_langname' => 'MCP_WARN_POST', 'module_mode' => 'warn_post', 'module_auth' => 'acl_m_warn && acl_f_read,$id'),
		array('module_id' => '163', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'ucp', 'parent_id' => '0', 'left_id' => '1', 'right_id' => '12', 'module_langname' => 'UCP_MAIN', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '164', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'ucp', 'parent_id' => '0', 'left_id' => '13', 'right_id' => '22', 'module_langname' => 'UCP_PROFILE', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '165', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'ucp', 'parent_id' => '0', 'left_id' => '23', 'right_id' => '30', 'module_langname' => 'UCP_PREFS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '166', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'ucp', 'parent_id' => '0', 'left_id' => '31', 'right_id' => '42', 'module_langname' => 'UCP_PM', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '167', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'ucp', 'parent_id' => '0', 'left_id' => '43', 'right_id' => '48', 'module_langname' => 'UCP_USERGROUPS', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '168', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => '', 'module_class' => 'ucp', 'parent_id' => '0', 'left_id' => '49', 'right_id' => '54', 'module_langname' => 'UCP_ZEBRA', 'module_mode' => '', 'module_auth' => ''),
		array('module_id' => '169', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'attachments', 'module_class' => 'ucp', 'parent_id' => '163', 'left_id' => '10', 'right_id' => '11', 'module_langname' => 'UCP_MAIN_ATTACHMENTS', 'module_mode' => 'attachments', 'module_auth' => 'acl_u_attach'),
		array('module_id' => '170', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'groups', 'module_class' => 'ucp', 'parent_id' => '167', 'left_id' => '44', 'right_id' => '45', 'module_langname' => 'UCP_USERGROUPS_MEMBER', 'module_mode' => 'membership', 'module_auth' => ''),
		array('module_id' => '171', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'groups', 'module_class' => 'ucp', 'parent_id' => '167', 'left_id' => '46', 'right_id' => '47', 'module_langname' => 'UCP_USERGROUPS_MANAGE', 'module_mode' => 'manage', 'module_auth' => ''),
		array('module_id' => '172', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'main', 'module_class' => 'ucp', 'parent_id' => '163', 'left_id' => '2', 'right_id' => '3', 'module_langname' => 'UCP_MAIN_FRONT', 'module_mode' => 'front', 'module_auth' => ''),
		array('module_id' => '173', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'main', 'module_class' => 'ucp', 'parent_id' => '163', 'left_id' => '4', 'right_id' => '5', 'module_langname' => 'UCP_MAIN_SUBSCRIBED', 'module_mode' => 'subscribed', 'module_auth' => ''),
		array('module_id' => '174', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'main', 'module_class' => 'ucp', 'parent_id' => '163', 'left_id' => '6', 'right_id' => '7', 'module_langname' => 'UCP_MAIN_BOOKMARKS', 'module_mode' => 'bookmarks', 'module_auth' => 'cfg_allow_bookmarks'),
		array('module_id' => '175', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'main', 'module_class' => 'ucp', 'parent_id' => '163', 'left_id' => '8', 'right_id' => '9', 'module_langname' => 'UCP_MAIN_DRAFTS', 'module_mode' => 'drafts', 'module_auth' => ''),
		array('module_id' => '176', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'pm', 'module_class' => 'ucp', 'parent_id' => '166', 'left_id' => '32', 'right_id' => '33', 'module_langname' => 'UCP_PM_VIEW', 'module_mode' => 'view', 'module_auth' => 'cfg_allow_privmsg'),
		array('module_id' => '177', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'pm', 'module_class' => 'ucp', 'parent_id' => '166', 'left_id' => '34', 'right_id' => '35', 'module_langname' => 'UCP_PM_COMPOSE', 'module_mode' => 'compose', 'module_auth' => 'cfg_allow_privmsg'),
		array('module_id' => '178', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'pm', 'module_class' => 'ucp', 'parent_id' => '166', 'left_id' => '36', 'right_id' => '37', 'module_langname' => 'UCP_PM_DRAFTS', 'module_mode' => 'drafts', 'module_auth' => 'cfg_allow_privmsg'),
		array('module_id' => '179', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'pm', 'module_class' => 'ucp', 'parent_id' => '166', 'left_id' => '38', 'right_id' => '39', 'module_langname' => 'UCP_PM_OPTIONS', 'module_mode' => 'options', 'module_auth' => 'cfg_allow_privmsg'),
		array('module_id' => '180', 'module_enabled' => '1', 'module_display' => '0', 'module_basename' => 'pm', 'module_class' => 'ucp', 'parent_id' => '166', 'left_id' => '40', 'right_id' => '41', 'module_langname' => 'UCP_PM_POPUP_TITLE', 'module_mode' => 'popup', 'module_auth' => 'cfg_allow_privmsg'),
		array('module_id' => '181', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'prefs', 'module_class' => 'ucp', 'parent_id' => '165', 'left_id' => '24', 'right_id' => '25', 'module_langname' => 'UCP_PREFS_PERSONAL', 'module_mode' => 'personal', 'module_auth' => ''),
		array('module_id' => '182', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'prefs', 'module_class' => 'ucp', 'parent_id' => '165', 'left_id' => '26', 'right_id' => '27', 'module_langname' => 'UCP_PREFS_POST', 'module_mode' => 'post', 'module_auth' => ''),
		array('module_id' => '183', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'prefs', 'module_class' => 'ucp', 'parent_id' => '165', 'left_id' => '28', 'right_id' => '29', 'module_langname' => 'UCP_PREFS_VIEW', 'module_mode' => 'view', 'module_auth' => ''),
		array('module_id' => '184', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'profile', 'module_class' => 'ucp', 'parent_id' => '164', 'left_id' => '14', 'right_id' => '15', 'module_langname' => 'UCP_PROFILE_PROFILE_INFO', 'module_mode' => 'profile_info', 'module_auth' => ''),
		array('module_id' => '185', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'profile', 'module_class' => 'ucp', 'parent_id' => '164', 'left_id' => '16', 'right_id' => '17', 'module_langname' => 'UCP_PROFILE_SIGNATURE', 'module_mode' => 'signature', 'module_auth' => ''),
		array('module_id' => '186', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'profile', 'module_class' => 'ucp', 'parent_id' => '164', 'left_id' => '18', 'right_id' => '19', 'module_langname' => 'UCP_PROFILE_AVATAR', 'module_mode' => 'avatar', 'module_auth' => ''),
		array('module_id' => '187', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'profile', 'module_class' => 'ucp', 'parent_id' => '164', 'left_id' => '20', 'right_id' => '21', 'module_langname' => 'UCP_PROFILE_REG_DETAILS', 'module_mode' => 'reg_details', 'module_auth' => ''),
		array('module_id' => '188', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'zebra', 'module_class' => 'ucp', 'parent_id' => '168', 'left_id' => '50', 'right_id' => '51', 'module_langname' => 'UCP_ZEBRA_FRIENDS', 'module_mode' => 'friends', 'module_auth' => ''),
		array('module_id' => '189', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'zebra', 'module_class' => 'ucp', 'parent_id' => '168', 'left_id' => '52', 'right_id' => '53', 'module_langname' => 'UCP_ZEBRA_FOES', 'module_mode' => 'foes', 'module_auth' => ''),
		array('module_id' => '190', 'module_enabled' => '1', 'module_display' => '1', 'module_basename' => 'board', 'module_class' => 'acp', 'parent_id' => '3', 'left_id' => '39', 'right_id' => '40', 'module_langname' => 'ACP_FEED_SETTINGS', 'module_mode' => 'feed', 'module_auth' => 'acl_a_board'),
	);

	// All default groups
	var $groups = array(
		'GUESTS'			=> array(
			'group_type'			=> 3,
			'group_founder_manage'	=> 0,
			'group_colour'			=> '',
			'group_legend'			=> 0,
			'group_avatar'			=> '',
			'group_desc'			=> '',
			'group_desc_uid'		=> '',
			'group_max_recipients'	=> 5,
		),
		'REGISTERED'		=> array(
			'group_type'			=> 3,
			'group_founder_manage'	=> 0,
			'group_colour'			=> '',
			'group_legend'			=> 0,
			'group_avatar'			=> '',
			'group_desc'			=> '',
			'group_desc_uid'		=> '',
			'group_max_recipients'	=> 5,
		),
		'REGISTERED_COPPA'	=> array(
			'group_type'			=> 3,
			'group_founder_manage'	=> 0,
			'group_colour'			=> '',
			'group_legend'			=> 0,
			'group_avatar'			=> '',
			'group_desc'			=> '',
			'group_desc_uid'		=> '',
			'group_max_recipients'	=> 5,
		),
		'GLOBAL_MODERATORS'	=> array(
			'group_type'			=> 3,
			'group_founder_manage'	=> 0,
			'group_colour'			=> '00AA00',
			'group_legend'			=> 1,
			'group_avatar'			=> '',
			'group_desc'			=> '',
			'group_desc_uid'		=> '',
			'group_max_recipients'	=> 0,
		),
		'ADMINISTRATORS'	=> array(
			'group_type'			=> 3,
			'group_founder_manage'	=> 1,
			'group_colour'			=> 'AA0000',
			'group_legend'			=> 1,
			'group_avatar'			=> '',
			'group_desc'			=> '',
			'group_desc_uid'		=> '',
			'group_max_recipients'	=> 0,
		),
		'BOTS'				=> array(
			'group_type'			=> 3,
			'group_founder_manage'	=> 0,
			'group_colour'			=> '9E8DA7',
			'group_legend'			=> 0,
			'group_avatar'			=> '',
			'group_desc'			=> '',
			'group_desc_uid'		=> '',
			'group_max_recipients'	=> 5,
		),
		'NEWLY_REGISTERED'	=> array(
			'group_type'			=> 3,
			'group_founder_manage'	=> 0,
			'group_colour'			=> '',
			'group_legend'			=> 0,
			'group_avatar'			=> '',
			'group_desc'			=> '',
			'group_desc_uid'		=> '',
			'group_max_recipients'	=> 5,
		)
	);

	// All default tables (copy from create_schema_files for this version)
	var $tables = array();

	function database_cleaner_data()
	{
		global $table_prefix;

		// This makes it easier, just copy & paste the get_schema_struct function from the develop/create_schema_files.php file
		$this->tables = $this->get_schema_struct();

		// Get the right table prefix!
		if ($table_prefix != 'phpbb_')
		{
			foreach ($this->tables as $table_name => $table_data)
			{
				$this->tables[str_replace('phpbb_', $table_prefix, str_replace($table_prefix, 'phpbb_', $table_name))] = $table_data;

				unset($this->tables[$table_name]);
			}
		}
	}

	function get_schema_struct()
	{
		$schema_data = array();

		$schema_data['phpbb_attachments'] = array(
			'COLUMNS'		=> array(
				'attach_id'			=> array('UINT', NULL, 'auto_increment'),
				'post_msg_id'		=> array('UINT', 0),
				'topic_id'			=> array('UINT', 0),
				'in_message'		=> array('BOOL', 0),
				'poster_id'			=> array('UINT', 0),
				'is_orphan'			=> array('BOOL', 1),
				'physical_filename'	=> array('VCHAR', ''),
				'real_filename'		=> array('VCHAR', ''),
				'download_count'	=> array('UINT', 0),
				'attach_comment'	=> array('TEXT_UNI', ''),
				'extension'			=> array('VCHAR:100', ''),
				'mimetype'			=> array('VCHAR:100', ''),
				'filesize'			=> array('UINT:20', 0),
				'filetime'			=> array('TIMESTAMP', 0),
				'thumbnail'			=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> 'attach_id',
			'KEYS'			=> array(
				'filetime'			=> array('INDEX', 'filetime'),
				'post_msg_id'		=> array('INDEX', 'post_msg_id'),
				'topic_id'			=> array('INDEX', 'topic_id'),
				'poster_id'			=> array('INDEX', 'poster_id'),
				'is_orphan'			=> array('INDEX', 'is_orphan'),
			),
		);

		$schema_data['phpbb_acl_groups'] = array(
			'COLUMNS'		=> array(
				'group_id'			=> array('UINT', 0),
				'forum_id'			=> array('UINT', 0),
				'auth_option_id'	=> array('UINT', 0),
				'auth_role_id'		=> array('UINT', 0),
				'auth_setting'		=> array('TINT:2', 0),
			),
			'KEYS'			=> array(
				'group_id'		=> array('INDEX', 'group_id'),
				'auth_opt_id'	=> array('INDEX', 'auth_option_id'),
				'auth_role_id'	=> array('INDEX', 'auth_role_id'),
			),
		);

		$schema_data['phpbb_acl_options'] = array(
			'COLUMNS'		=> array(
				'auth_option_id'	=> array('UINT', NULL, 'auto_increment'),
				'auth_option'		=> array('VCHAR:50', ''),
				'is_global'			=> array('BOOL', 0),
				'is_local'			=> array('BOOL', 0),
				'founder_only'		=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> 'auth_option_id',
			'KEYS'			=> array(
				'auth_option'		=> array('UNIQUE', 'auth_option'),
			),
		);

		$schema_data['phpbb_acl_roles'] = array(
			'COLUMNS'		=> array(
				'role_id'			=> array('UINT', NULL, 'auto_increment'),
				'role_name'			=> array('VCHAR_UNI', ''),
				'role_description'	=> array('TEXT_UNI', ''),
				'role_type'			=> array('VCHAR:10', ''),
				'role_order'		=> array('USINT', 0),
			),
			'PRIMARY_KEY'	=> 'role_id',
			'KEYS'			=> array(
				'role_type'			=> array('INDEX', 'role_type'),
				'role_order'		=> array('INDEX', 'role_order'),
			),
		);

		$schema_data['phpbb_acl_roles_data'] = array(
			'COLUMNS'		=> array(
				'role_id'			=> array('UINT', 0),
				'auth_option_id'	=> array('UINT', 0),
				'auth_setting'		=> array('TINT:2', 0),
			),
			'PRIMARY_KEY'	=> array('role_id', 'auth_option_id'),
			'KEYS'			=> array(
				'ath_op_id'			=> array('INDEX', 'auth_option_id'),
			),
		);

		$schema_data['phpbb_acl_users'] = array(
			'COLUMNS'		=> array(
				'user_id'			=> array('UINT', 0),
				'forum_id'			=> array('UINT', 0),
				'auth_option_id'	=> array('UINT', 0),
				'auth_role_id'		=> array('UINT', 0),
				'auth_setting'		=> array('TINT:2', 0),
			),
			'KEYS'			=> array(
				'user_id'			=> array('INDEX', 'user_id'),
				'auth_option_id'	=> array('INDEX', 'auth_option_id'),
				'auth_role_id'		=> array('INDEX', 'auth_role_id'),
			),
		);

		$schema_data['phpbb_banlist'] = array(
			'COLUMNS'		=> array(
				'ban_id'			=> array('UINT', NULL, 'auto_increment'),
				'ban_userid'		=> array('UINT', 0),
				'ban_ip'			=> array('VCHAR:40', ''),
				'ban_email'			=> array('VCHAR_UNI:100', ''),
				'ban_start'			=> array('TIMESTAMP', 0),
				'ban_end'			=> array('TIMESTAMP', 0),
				'ban_exclude'		=> array('BOOL', 0),
				'ban_reason'		=> array('VCHAR_UNI', ''),
				'ban_give_reason'	=> array('VCHAR_UNI', ''),
			),
			'PRIMARY_KEY'			=> 'ban_id',
			'KEYS'			=> array(
				'ban_end'			=> array('INDEX', 'ban_end'),
				'ban_user'			=> array('INDEX', array('ban_userid', 'ban_exclude')),
				'ban_email'			=> array('INDEX', array('ban_email', 'ban_exclude')),
				'ban_ip'			=> array('INDEX', array('ban_ip', 'ban_exclude')),
			),
		);

		$schema_data['phpbb_bbcodes'] = array(
			'COLUMNS'		=> array(
				'bbcode_id'				=> array('TINT:3', 0),
				'bbcode_tag'			=> array('VCHAR:16', ''),
				'bbcode_helpline'		=> array('VCHAR_UNI', ''),
				'display_on_posting'	=> array('BOOL', 0),
				'bbcode_match'			=> array('TEXT_UNI', ''),
				'bbcode_tpl'			=> array('MTEXT_UNI', ''),
				'first_pass_match'		=> array('MTEXT_UNI', ''),
				'first_pass_replace'	=> array('MTEXT_UNI', ''),
				'second_pass_match'		=> array('MTEXT_UNI', ''),
				'second_pass_replace'	=> array('MTEXT_UNI', ''),
			),
			'PRIMARY_KEY'	=> 'bbcode_id',
			'KEYS'			=> array(
				'display_on_post'		=> array('INDEX', 'display_on_posting'),
			),
		);

		$schema_data['phpbb_bookmarks'] = array(
			'COLUMNS'		=> array(
				'topic_id'			=> array('UINT', 0),
				'user_id'			=> array('UINT', 0),
			),
			'PRIMARY_KEY'			=> array('topic_id', 'user_id'),
		);

		$schema_data['phpbb_bots'] = array(
			'COLUMNS'		=> array(
				'bot_id'			=> array('UINT', NULL, 'auto_increment'),
				'bot_active'		=> array('BOOL', 1),
				'bot_name'			=> array('STEXT_UNI', ''),
				'user_id'			=> array('UINT', 0),
				'bot_agent'			=> array('VCHAR', ''),
				'bot_ip'			=> array('VCHAR', ''),
			),
			'PRIMARY_KEY'	=> 'bot_id',
			'KEYS'			=> array(
				'bot_active'		=> array('INDEX', 'bot_active'),
			),
		);

		$schema_data['phpbb_config'] = array(
			'COLUMNS'		=> array(
				'config_name'		=> array('VCHAR', ''),
				'config_value'		=> array('VCHAR_UNI', ''),
				'is_dynamic'		=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> 'config_name',
			'KEYS'			=> array(
				'is_dynamic'		=> array('INDEX', 'is_dynamic'),
			),
		);

		$schema_data['phpbb_confirm'] = array(
			'COLUMNS'		=> array(
				'confirm_id'		=> array('CHAR:32', ''),
				'session_id'		=> array('CHAR:32', ''),
				'confirm_type'		=> array('TINT:3', 0),
				'code'				=> array('VCHAR:8', ''),
				'seed'				=> array('UINT:10', 0),
				'attempts'			=> array('UINT', 0),
			),
			'PRIMARY_KEY'	=> array('session_id', 'confirm_id'),
			'KEYS'			=> array(
				'confirm_type'		=> array('INDEX', 'confirm_type'),
			),
		);

		$schema_data['phpbb_disallow'] = array(
			'COLUMNS'		=> array(
				'disallow_id'		=> array('UINT', NULL, 'auto_increment'),
				'disallow_username'	=> array('VCHAR_UNI:255', ''),
			),
			'PRIMARY_KEY'	=> 'disallow_id',
		);

		$schema_data['phpbb_drafts'] = array(
			'COLUMNS'		=> array(
				'draft_id'			=> array('UINT', NULL, 'auto_increment'),
				'user_id'			=> array('UINT', 0),
				'topic_id'			=> array('UINT', 0),
				'forum_id'			=> array('UINT', 0),
				'save_time'			=> array('TIMESTAMP', 0),
				'draft_subject'		=> array('STEXT_UNI', ''),
				'draft_message'		=> array('MTEXT_UNI', ''),
			),
			'PRIMARY_KEY'	=> 'draft_id',
			'KEYS'			=> array(
				'save_time'			=> array('INDEX', 'save_time'),
			),
		);

		$schema_data['phpbb_extensions'] = array(
			'COLUMNS'		=> array(
				'extension_id'		=> array('UINT', NULL, 'auto_increment'),
				'group_id'			=> array('UINT', 0),
				'extension'			=> array('VCHAR:100', ''),
			),
			'PRIMARY_KEY'	=> 'extension_id',
		);

		$schema_data['phpbb_extension_groups'] = array(
			'COLUMNS'		=> array(
				'group_id'			=> array('UINT', NULL, 'auto_increment'),
				'group_name'		=> array('VCHAR_UNI', ''),
				'cat_id'			=> array('TINT:2', 0),
				'allow_group'		=> array('BOOL', 0),
				'download_mode'		=> array('BOOL', 1),
				'upload_icon'		=> array('VCHAR', ''),
				'max_filesize'		=> array('UINT:20', 0),
				'allowed_forums'	=> array('TEXT', ''),
				'allow_in_pm'		=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> 'group_id',
		);

		$schema_data['phpbb_forums'] = array(
			'COLUMNS'		=> array(
				'forum_id'				=> array('UINT', NULL, 'auto_increment'),
				'parent_id'				=> array('UINT', 0),
				'left_id'				=> array('UINT', 0),
				'right_id'				=> array('UINT', 0),
				'forum_parents'			=> array('MTEXT', ''),
				'forum_name'			=> array('STEXT_UNI', ''),
				'forum_desc'			=> array('TEXT_UNI', ''),
				'forum_desc_bitfield'	=> array('VCHAR:255', ''),
				'forum_desc_options'	=> array('UINT:11', 7),
				'forum_desc_uid'		=> array('VCHAR:8', ''),
				'forum_link'			=> array('VCHAR_UNI', ''),
				'forum_password'		=> array('VCHAR_UNI:40', ''),
				'forum_style'			=> array('UINT', 0),
				'forum_image'			=> array('VCHAR', ''),
				'forum_rules'			=> array('TEXT_UNI', ''),
				'forum_rules_link'		=> array('VCHAR_UNI', ''),
				'forum_rules_bitfield'	=> array('VCHAR:255', ''),
				'forum_rules_options'	=> array('UINT:11', 7),
				'forum_rules_uid'		=> array('VCHAR:8', ''),
				'forum_topics_per_page'	=> array('TINT:4', 0),
				'forum_type'			=> array('TINT:4', 0),
				'forum_status'			=> array('TINT:4', 0),
				'forum_posts'			=> array('UINT', 0),
				'forum_topics'			=> array('UINT', 0),
				'forum_topics_real'		=> array('UINT', 0),
				'forum_last_post_id'	=> array('UINT', 0),
				'forum_last_poster_id'	=> array('UINT', 0),
				'forum_last_post_subject' => array('STEXT_UNI', ''),
				'forum_last_post_time'	=> array('TIMESTAMP', 0),
				'forum_last_poster_name'=> array('VCHAR_UNI', ''),
				'forum_last_poster_colour'=> array('VCHAR:6', ''),
				'forum_flags'			=> array('TINT:4', 32),
				'forum_options'			=> array('UINT:20', 0),
				'display_subforum_list'	=> array('BOOL', 1),
				'display_on_index'		=> array('BOOL', 1),
				'enable_indexing'		=> array('BOOL', 1),
				'enable_icons'			=> array('BOOL', 1),
				'enable_prune'			=> array('BOOL', 0),
				'prune_next'			=> array('TIMESTAMP', 0),
				'prune_days'			=> array('UINT', 0),
				'prune_viewed'			=> array('UINT', 0),
				'prune_freq'			=> array('UINT', 0),
			),
			'PRIMARY_KEY'	=> 'forum_id',
			'KEYS'			=> array(
				'left_right_id'			=> array('INDEX', array('left_id', 'right_id')),
				'forum_lastpost_id'		=> array('INDEX', 'forum_last_post_id'),
			),
		);

		$schema_data['phpbb_forums_access'] = array(
			'COLUMNS'		=> array(
				'forum_id'				=> array('UINT', 0),
				'user_id'				=> array('UINT', 0),
				'session_id'			=> array('CHAR:32', ''),
			),
			'PRIMARY_KEY'	=> array('forum_id', 'user_id', 'session_id'),
		);

		$schema_data['phpbb_forums_track'] = array(
			'COLUMNS'		=> array(
				'user_id'				=> array('UINT', 0),
				'forum_id'				=> array('UINT', 0),
				'mark_time'				=> array('TIMESTAMP', 0),
			),
			'PRIMARY_KEY'	=> array('user_id', 'forum_id'),
		);

		$schema_data['phpbb_forums_watch'] = array(
			'COLUMNS'		=> array(
				'forum_id'				=> array('UINT', 0),
				'user_id'				=> array('UINT', 0),
				'notify_status'			=> array('BOOL', 0),
			),
			'KEYS'			=> array(
				'forum_id'				=> array('INDEX', 'forum_id'),
				'user_id'				=> array('INDEX', 'user_id'),
				'notify_stat'			=> array('INDEX', 'notify_status'),
			),
		);

		$schema_data['phpbb_groups'] = array(
			'COLUMNS'		=> array(
				'group_id'				=> array('UINT', NULL, 'auto_increment'),
				'group_type'			=> array('TINT:4', 1),
				'group_founder_manage'	=> array('BOOL', 0),
				'group_skip_auth'		=> array('BOOL', 0),
				'group_name'			=> array('VCHAR_CI', ''),
				'group_desc'			=> array('TEXT_UNI', ''),
				'group_desc_bitfield'	=> array('VCHAR:255', ''),
				'group_desc_options'	=> array('UINT:11', 7),
				'group_desc_uid'		=> array('VCHAR:8', ''),
				'group_display'			=> array('BOOL', 0),
				'group_avatar'			=> array('VCHAR', ''),
				'group_avatar_type'		=> array('TINT:2', 0),
				'group_avatar_width'	=> array('USINT', 0),
				'group_avatar_height'	=> array('USINT', 0),
				'group_rank'			=> array('UINT', 0),
				'group_colour'			=> array('VCHAR:6', ''),
				'group_sig_chars'		=> array('UINT', 0),
				'group_receive_pm'		=> array('BOOL', 0),
				'group_message_limit'	=> array('UINT', 0),
				'group_max_recipients'	=> array('UINT', 0),
				'group_legend'			=> array('BOOL', 1),
			),
			'PRIMARY_KEY'	=> 'group_id',
			'KEYS'			=> array(
				'group_legend_name'		=> array('INDEX', array('group_legend', 'group_name')),
			),
		);

		$schema_data['phpbb_icons'] = array(
			'COLUMNS'		=> array(
				'icons_id'				=> array('UINT', NULL, 'auto_increment'),
				'icons_url'				=> array('VCHAR', ''),
				'icons_width'			=> array('TINT:4', 0),
				'icons_height'			=> array('TINT:4', 0),
				'icons_order'			=> array('UINT', 0),
				'display_on_posting'	=> array('BOOL', 1),
			),
			'PRIMARY_KEY'	=> 'icons_id',
			'KEYS'			=> array(
				'display_on_posting'	=> array('INDEX', 'display_on_posting'),
			),
		);

		$schema_data['phpbb_lang'] = array(
			'COLUMNS'		=> array(
				'lang_id'				=> array('TINT:4', NULL, 'auto_increment'),
				'lang_iso'				=> array('VCHAR:30', ''),
				'lang_dir'				=> array('VCHAR:30', ''),
				'lang_english_name'		=> array('VCHAR_UNI:100', ''),
				'lang_local_name'		=> array('VCHAR_UNI:255', ''),
				'lang_author'			=> array('VCHAR_UNI:255', ''),
			),
			'PRIMARY_KEY'	=> 'lang_id',
			'KEYS'			=> array(
				'lang_iso'				=> array('INDEX', 'lang_iso'),
			),
		);

		$schema_data['phpbb_log'] = array(
			'COLUMNS'		=> array(
				'log_id'				=> array('UINT', NULL, 'auto_increment'),
				'log_type'				=> array('TINT:4', 0),
				'user_id'				=> array('UINT', 0),
				'forum_id'				=> array('UINT', 0),
				'topic_id'				=> array('UINT', 0),
				'reportee_id'			=> array('UINT', 0),
				'log_ip'				=> array('VCHAR:40', ''),
				'log_time'				=> array('TIMESTAMP', 0),
				'log_operation'			=> array('TEXT_UNI', ''),
				'log_data'				=> array('MTEXT_UNI', ''),
			),
			'PRIMARY_KEY'	=> 'log_id',
			'KEYS'			=> array(
				'log_type'				=> array('INDEX', 'log_type'),
				'forum_id'				=> array('INDEX', 'forum_id'),
				'topic_id'				=> array('INDEX', 'topic_id'),
				'reportee_id'			=> array('INDEX', 'reportee_id'),
				'user_id'				=> array('INDEX', 'user_id'),
			),
		);

		$schema_data['phpbb_moderator_cache'] = array(
			'COLUMNS'		=> array(
				'forum_id'				=> array('UINT', 0),
				'user_id'				=> array('UINT', 0),
				'username'				=> array('VCHAR_UNI:255', ''),
				'group_id'				=> array('UINT', 0),
				'group_name'			=> array('VCHAR_UNI', ''),
				'display_on_index'		=> array('BOOL', 1),
			),
			'KEYS'			=> array(
				'disp_idx'				=> array('INDEX', 'display_on_index'),
				'forum_id'				=> array('INDEX', 'forum_id'),
			),
		);

		$schema_data['phpbb_modules'] = array(
			'COLUMNS'		=> array(
				'module_id'				=> array('UINT', NULL, 'auto_increment'),
				'module_enabled'		=> array('BOOL', 1),
				'module_display'		=> array('BOOL', 1),
				'module_basename'		=> array('VCHAR', ''),
				'module_class'			=> array('VCHAR:10', ''),
				'parent_id'				=> array('UINT', 0),
				'left_id'				=> array('UINT', 0),
				'right_id'				=> array('UINT', 0),
				'module_langname'		=> array('VCHAR', ''),
				'module_mode'			=> array('VCHAR', ''),
				'module_auth'			=> array('VCHAR', ''),
			),
			'PRIMARY_KEY'	=> 'module_id',
			'KEYS'			=> array(
				'left_right_id'			=> array('INDEX', array('left_id', 'right_id')),
				'module_enabled'		=> array('INDEX', 'module_enabled'),
				'class_left_id'			=> array('INDEX', array('module_class', 'left_id')),
			),
		);

		$schema_data['phpbb_poll_options'] = array(
			'COLUMNS'		=> array(
				'poll_option_id'		=> array('TINT:4', 0),
				'topic_id'				=> array('UINT', 0),
				'poll_option_text'		=> array('TEXT_UNI', ''),
				'poll_option_total'		=> array('UINT', 0),
			),
			'KEYS'			=> array(
				'poll_opt_id'			=> array('INDEX', 'poll_option_id'),
				'topic_id'				=> array('INDEX', 'topic_id'),
			),
		);

		$schema_data['phpbb_poll_votes'] = array(
			'COLUMNS'		=> array(
				'topic_id'				=> array('UINT', 0),
				'poll_option_id'		=> array('TINT:4', 0),
				'vote_user_id'			=> array('UINT', 0),
				'vote_user_ip'			=> array('VCHAR:40', ''),
			),
			'KEYS'			=> array(
				'topic_id'				=> array('INDEX', 'topic_id'),
				'vote_user_id'			=> array('INDEX', 'vote_user_id'),
				'vote_user_ip'			=> array('INDEX', 'vote_user_ip'),
			),
		);

		$schema_data['phpbb_posts'] = array(
			'COLUMNS'		=> array(
				'post_id'				=> array('UINT', NULL, 'auto_increment'),
				'topic_id'				=> array('UINT', 0),
				'forum_id'				=> array('UINT', 0),
				'poster_id'				=> array('UINT', 0),
				'icon_id'				=> array('UINT', 0),
				'poster_ip'				=> array('VCHAR:40', ''),
				'post_time'				=> array('TIMESTAMP', 0),
				'post_approved'			=> array('BOOL', 1),
				'post_reported'			=> array('BOOL', 0),
				'enable_bbcode'			=> array('BOOL', 1),
				'enable_smilies'		=> array('BOOL', 1),
				'enable_magic_url'		=> array('BOOL', 1),
				'enable_sig'			=> array('BOOL', 1),
				'post_username'			=> array('VCHAR_UNI:255', ''),
				'post_subject'			=> array('STEXT_UNI', '', 'true_sort'),
				'post_text'				=> array('MTEXT_UNI', ''),
				'post_checksum'			=> array('VCHAR:32', ''),
				'post_attachment'		=> array('BOOL', 0),
				'bbcode_bitfield'		=> array('VCHAR:255', ''),
				'bbcode_uid'			=> array('VCHAR:8', ''),
				'post_postcount'		=> array('BOOL', 1),
				'post_edit_time'		=> array('TIMESTAMP', 0),
				'post_edit_reason'		=> array('STEXT_UNI', ''),
				'post_edit_user'		=> array('UINT', 0),
				'post_edit_count'		=> array('USINT', 0),
				'post_edit_locked'		=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> 'post_id',
			'KEYS'			=> array(
				'forum_id'				=> array('INDEX', 'forum_id'),
				'topic_id'				=> array('INDEX', 'topic_id'),
				'poster_ip'				=> array('INDEX', 'poster_ip'),
				'poster_id'				=> array('INDEX', 'poster_id'),
				'post_approved'			=> array('INDEX', 'post_approved'),
				'post_username'			=> array('INDEX', 'post_username'),
				'tid_post_time'			=> array('INDEX', array('topic_id', 'post_time')),
			),
		);

		$schema_data['phpbb_privmsgs'] = array(
			'COLUMNS'		=> array(
				'msg_id'				=> array('UINT', NULL, 'auto_increment'),
				'root_level'			=> array('UINT', 0),
				'author_id'				=> array('UINT', 0),
				'icon_id'				=> array('UINT', 0),
				'author_ip'				=> array('VCHAR:40', ''),
				'message_time'			=> array('TIMESTAMP', 0),
				'enable_bbcode'			=> array('BOOL', 1),
				'enable_smilies'		=> array('BOOL', 1),
				'enable_magic_url'		=> array('BOOL', 1),
				'enable_sig'			=> array('BOOL', 1),
				'message_subject'		=> array('STEXT_UNI', ''),
				'message_text'			=> array('MTEXT_UNI', ''),
				'message_edit_reason'	=> array('STEXT_UNI', ''),
				'message_edit_user'		=> array('UINT', 0),
				'message_attachment'	=> array('BOOL', 0),
				'bbcode_bitfield'		=> array('VCHAR:255', ''),
				'bbcode_uid'			=> array('VCHAR:8', ''),
				'message_edit_time'		=> array('TIMESTAMP', 0),
				'message_edit_count'	=> array('USINT', 0),
				'to_address'			=> array('TEXT_UNI', ''),
				'bcc_address'			=> array('TEXT_UNI', ''),
				'message_reported'		=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> 'msg_id',
			'KEYS'			=> array(
				'author_ip'				=> array('INDEX', 'author_ip'),
				'message_time'			=> array('INDEX', 'message_time'),
				'author_id'				=> array('INDEX', 'author_id'),
				'root_level'			=> array('INDEX', 'root_level'),
			),
		);

		$schema_data['phpbb_privmsgs_folder'] = array(
			'COLUMNS'		=> array(
				'folder_id'				=> array('UINT', NULL, 'auto_increment'),
				'user_id'				=> array('UINT', 0),
				'folder_name'			=> array('VCHAR_UNI', ''),
				'pm_count'				=> array('UINT', 0),
			),
			'PRIMARY_KEY'	=> 'folder_id',
			'KEYS'			=> array(
				'user_id'				=> array('INDEX', 'user_id'),
			),
		);

		$schema_data['phpbb_privmsgs_rules'] = array(
			'COLUMNS'		=> array(
				'rule_id'				=> array('UINT', NULL, 'auto_increment'),
				'user_id'				=> array('UINT', 0),
				'rule_check'			=> array('UINT', 0),
				'rule_connection'		=> array('UINT', 0),
				'rule_string'			=> array('VCHAR_UNI', ''),
				'rule_user_id'			=> array('UINT', 0),
				'rule_group_id'			=> array('UINT', 0),
				'rule_action'			=> array('UINT', 0),
				'rule_folder_id'		=> array('INT:11', 0),
			),
			'PRIMARY_KEY'	=> 'rule_id',
			'KEYS'			=> array(
				'user_id'				=> array('INDEX', 'user_id'),
			),
		);

		$schema_data['phpbb_privmsgs_to'] = array(
			'COLUMNS'		=> array(
				'msg_id'				=> array('UINT', 0),
				'user_id'				=> array('UINT', 0),
				'author_id'				=> array('UINT', 0),
				'pm_deleted'			=> array('BOOL', 0),
				'pm_new'				=> array('BOOL', 1),
				'pm_unread'				=> array('BOOL', 1),
				'pm_replied'			=> array('BOOL', 0),
				'pm_marked'				=> array('BOOL', 0),
				'pm_forwarded'			=> array('BOOL', 0),
				'folder_id'				=> array('INT:11', 0),
			),
			'KEYS'			=> array(
				'msg_id'				=> array('INDEX', 'msg_id'),
				'author_id'				=> array('INDEX', 'author_id'),
				'usr_flder_id'			=> array('INDEX', array('user_id', 'folder_id')),
			),
		);

		$schema_data['phpbb_profile_fields'] = array(
			'COLUMNS'		=> array(
				'field_id'				=> array('UINT', NULL, 'auto_increment'),
				'field_name'			=> array('VCHAR_UNI', ''),
				'field_type'			=> array('TINT:4', 0),
				'field_ident'			=> array('VCHAR:20', ''),
				'field_length'			=> array('VCHAR:20', ''),
				'field_minlen'			=> array('VCHAR', ''),
				'field_maxlen'			=> array('VCHAR', ''),
				'field_novalue'			=> array('VCHAR_UNI', ''),
				'field_default_value'	=> array('VCHAR_UNI', ''),
				'field_validation'		=> array('VCHAR_UNI:20', ''),
				'field_required'		=> array('BOOL', 0),
				'field_show_on_reg'		=> array('BOOL', 0),
				'field_show_on_vt'		=> array('BOOL', 0),
				'field_show_profile'	=> array('BOOL', 0),
				'field_hide'			=> array('BOOL', 0),
				'field_no_view'			=> array('BOOL', 0),
				'field_active'			=> array('BOOL', 0),
				'field_order'			=> array('UINT', 0),
			),
			'PRIMARY_KEY'	=> 'field_id',
			'KEYS'			=> array(
				'fld_type'			=> array('INDEX', 'field_type'),
				'fld_ordr'			=> array('INDEX', 'field_order'),
			),
		);

		$schema_data['phpbb_profile_fields_data'] = array(
			'COLUMNS'		=> array(
				'user_id'				=> array('UINT', 0),
			),
			'PRIMARY_KEY'	=> 'user_id',
		);

		$schema_data['phpbb_profile_fields_lang'] = array(
			'COLUMNS'		=> array(
				'field_id'				=> array('UINT', 0),
				'lang_id'				=> array('UINT', 0),
				'option_id'				=> array('UINT', 0),
				'field_type'			=> array('TINT:4', 0),
				'lang_value'			=> array('VCHAR_UNI', ''),
			),
			'PRIMARY_KEY'	=> array('field_id', 'lang_id', 'option_id'),
		);

		$schema_data['phpbb_profile_lang'] = array(
			'COLUMNS'		=> array(
				'field_id'				=> array('UINT', 0),
				'lang_id'				=> array('UINT', 0),
				'lang_name'				=> array('VCHAR_UNI', ''),
				'lang_explain'			=> array('TEXT_UNI', ''),
				'lang_default_value'	=> array('VCHAR_UNI', ''),
			),
			'PRIMARY_KEY'	=> array('field_id', 'lang_id'),
		);

		$schema_data['phpbb_ranks'] = array(
			'COLUMNS'		=> array(
				'rank_id'				=> array('UINT', NULL, 'auto_increment'),
				'rank_title'			=> array('VCHAR_UNI', ''),
				'rank_min'				=> array('UINT', 0),
				'rank_special'			=> array('BOOL', 0),
				'rank_image'			=> array('VCHAR', ''),
			),
			'PRIMARY_KEY'	=> 'rank_id',
		);

		$schema_data['phpbb_reports'] = array(
			'COLUMNS'		=> array(
				'report_id'				=> array('UINT', NULL, 'auto_increment'),
				'reason_id'				=> array('USINT', 0),
				'post_id'				=> array('UINT', 0),
				'pm_id'					=> array('UINT', 0),
				'user_id'				=> array('UINT', 0),
				'user_notify'			=> array('BOOL', 0),
				'report_closed'			=> array('BOOL', 0),
				'report_time'			=> array('TIMESTAMP', 0),
				'report_text'			=> array('MTEXT_UNI', ''),
			),
			'PRIMARY_KEY'	=> 'report_id',
			'KEYS'			=> array(
				'post_id'			=> array('INDEX', 'post_id'),
				'pm_id'				=> array('INDEX', 'pm_id'),
			),
		);

		$schema_data['phpbb_reports_reasons'] = array(
			'COLUMNS'		=> array(
				'reason_id'				=> array('USINT', NULL, 'auto_increment'),
				'reason_title'			=> array('VCHAR_UNI', ''),
				'reason_description'	=> array('MTEXT_UNI', ''),
				'reason_order'			=> array('USINT', 0),
			),
			'PRIMARY_KEY'	=> 'reason_id',
		);

		$schema_data['phpbb_search_results'] = array(
			'COLUMNS'		=> array(
				'search_key'			=> array('VCHAR:32', ''),
				'search_time'			=> array('TIMESTAMP', 0),
				'search_keywords'		=> array('MTEXT_UNI', ''),
				'search_authors'		=> array('MTEXT', ''),
			),
			'PRIMARY_KEY'	=> 'search_key',
		);

		$schema_data['phpbb_search_wordlist'] = array(
			'COLUMNS'		=> array(
				'word_id'			=> array('UINT', NULL, 'auto_increment'),
				'word_text'			=> array('VCHAR_UNI', ''),
				'word_common'		=> array('BOOL', 0),
				'word_count'		=> array('UINT', 0),
			),
			'PRIMARY_KEY'	=> 'word_id',
			'KEYS'			=> array(
				'wrd_txt'			=> array('UNIQUE', 'word_text'),
				'wrd_cnt'			=> array('INDEX', 'word_count'),
			),
		);

		$schema_data['phpbb_search_wordmatch'] = array(
			'COLUMNS'		=> array(
				'post_id'			=> array('UINT', 0),
				'word_id'			=> array('UINT', 0),
				'title_match'		=> array('BOOL', 0),
			),
			'KEYS'			=> array(
				'unq_mtch'			=> array('UNIQUE', array('word_id', 'post_id', 'title_match')),
				'word_id'			=> array('INDEX', 'word_id'),
				'post_id'			=> array('INDEX', 'post_id'),
			),
		);

		$schema_data['phpbb_sessions'] = array(
			'COLUMNS'		=> array(
				'session_id'			=> array('CHAR:32', ''),
				'session_user_id'		=> array('UINT', 0),
				'session_forum_id'		=> array('UINT', 0),
				'session_last_visit'	=> array('TIMESTAMP', 0),
				'session_start'			=> array('TIMESTAMP', 0),
				'session_time'			=> array('TIMESTAMP', 0),
				'session_ip'			=> array('VCHAR:40', ''),
				'session_browser'		=> array('VCHAR:150', ''),
				'session_forwarded_for'	=> array('VCHAR:255', ''),
				'session_page'			=> array('VCHAR_UNI', ''),
				'session_viewonline'	=> array('BOOL', 1),
				'session_autologin'		=> array('BOOL', 0),
				'session_admin'			=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> 'session_id',
			'KEYS'			=> array(
				'session_time'		=> array('INDEX', 'session_time'),
				'session_user_id'	=> array('INDEX', 'session_user_id'),
				'session_fid'		=> array('INDEX', 'session_forum_id'),
			),
		);

		$schema_data['phpbb_sessions_keys'] = array(
			'COLUMNS'		=> array(
				'key_id'			=> array('CHAR:32', ''),
				'user_id'			=> array('UINT', 0),
				'last_ip'			=> array('VCHAR:40', ''),
				'last_login'		=> array('TIMESTAMP', 0),
			),
			'PRIMARY_KEY'	=> array('key_id', 'user_id'),
			'KEYS'			=> array(
				'last_login'		=> array('INDEX', 'last_login'),
			),
		);

		$schema_data['phpbb_sitelist'] = array(
			'COLUMNS'		=> array(
				'site_id'		=> array('UINT', NULL, 'auto_increment'),
				'site_ip'		=> array('VCHAR:40', ''),
				'site_hostname'	=> array('VCHAR', ''),
				'ip_exclude'	=> array('BOOL', 0),
			),
			'PRIMARY_KEY'		=> 'site_id',
		);

		$schema_data['phpbb_smilies'] = array(
			'COLUMNS'		=> array(
				'smiley_id'			=> array('UINT', NULL, 'auto_increment'),
				// We may want to set 'code' to VCHAR:50 or check if unicode support is possible... at the moment only ASCII characters are allowed.
				'code'				=> array('VCHAR_UNI:50', ''),
				'emotion'			=> array('VCHAR_UNI:50', ''),
				'smiley_url'		=> array('VCHAR:50', ''),
				'smiley_width'		=> array('USINT', 0),
				'smiley_height'		=> array('USINT', 0),
				'smiley_order'		=> array('UINT', 0),
				'display_on_posting'=> array('BOOL', 1),
			),
			'PRIMARY_KEY'	=> 'smiley_id',
			'KEYS'			=> array(
				'display_on_post'		=> array('INDEX', 'display_on_posting'),
			),
		);

		$schema_data['phpbb_styles'] = array(
			'COLUMNS'		=> array(
				'style_id'				=> array('UINT', NULL, 'auto_increment'),
				'style_name'			=> array('VCHAR_UNI:255', ''),
				'style_copyright'		=> array('VCHAR_UNI', ''),
				'style_active'			=> array('BOOL', 1),
				'template_id'			=> array('UINT', 0),
				'theme_id'				=> array('UINT', 0),
				'imageset_id'			=> array('UINT', 0),
			),
			'PRIMARY_KEY'	=> 'style_id',
			'KEYS'			=> array(
				'style_name'		=> array('UNIQUE', 'style_name'),
				'template_id'		=> array('INDEX', 'template_id'),
				'theme_id'			=> array('INDEX', 'theme_id'),
				'imageset_id'		=> array('INDEX', 'imageset_id'),
			),
		);

		$schema_data['phpbb_styles_template'] = array(
			'COLUMNS'		=> array(
				'template_id'			=> array('UINT', NULL, 'auto_increment'),
				'template_name'			=> array('VCHAR_UNI:255', ''),
				'template_copyright'	=> array('VCHAR_UNI', ''),
				'template_path'			=> array('VCHAR:100', ''),
				'bbcode_bitfield'		=> array('VCHAR:255', 'kNg='),
				'template_storedb'		=> array('BOOL', 0),
				'template_inherits_id'		=> array('UINT:4', 0),
				'template_inherit_path'		=> array('VCHAR', ''),
			),
			'PRIMARY_KEY'	=> 'template_id',
			'KEYS'			=> array(
				'tmplte_nm'				=> array('UNIQUE', 'template_name'),
			),
		);

		$schema_data['phpbb_styles_template_data'] = array(
			'COLUMNS'		=> array(
				'template_id'			=> array('UINT', 0),
				'template_filename'		=> array('VCHAR:100', ''),
				'template_included'		=> array('TEXT', ''),
				'template_mtime'		=> array('TIMESTAMP', 0),
				'template_data'			=> array('MTEXT_UNI', ''),
			),
			'KEYS'			=> array(
				'tid'					=> array('INDEX', 'template_id'),
				'tfn'					=> array('INDEX', 'template_filename'),
			),
		);

		$schema_data['phpbb_styles_theme'] = array(
			'COLUMNS'		=> array(
				'theme_id'				=> array('UINT', NULL, 'auto_increment'),
				'theme_name'			=> array('VCHAR_UNI:255', ''),
				'theme_copyright'		=> array('VCHAR_UNI', ''),
				'theme_path'			=> array('VCHAR:100', ''),
				'theme_storedb'			=> array('BOOL', 0),
				'theme_mtime'			=> array('TIMESTAMP', 0),
				'theme_data'			=> array('MTEXT_UNI', ''),
			),
			'PRIMARY_KEY'	=> 'theme_id',
			'KEYS'			=> array(
				'theme_name'		=> array('UNIQUE', 'theme_name'),
			),
		);

		$schema_data['phpbb_styles_imageset'] = array(
			'COLUMNS'		=> array(
				'imageset_id'				=> array('UINT', NULL, 'auto_increment'),
				'imageset_name'				=> array('VCHAR_UNI:255', ''),
				'imageset_copyright'		=> array('VCHAR_UNI', ''),
				'imageset_path'				=> array('VCHAR:100', ''),
			),
			'PRIMARY_KEY'		=> 'imageset_id',
			'KEYS'				=> array(
				'imgset_nm'			=> array('UNIQUE', 'imageset_name'),
			),
		);

		$schema_data['phpbb_styles_imageset_data'] = array(
			'COLUMNS'		=> array(
				'image_id'				=> array('UINT', NULL, 'auto_increment'),
				'image_name'			=> array('VCHAR:200', ''),
				'image_filename'		=> array('VCHAR:200', ''),
				'image_lang'			=> array('VCHAR:30', ''),
				'image_height'			=> array('USINT', 0),
				'image_width'			=> array('USINT', 0),
				'imageset_id'			=> array('UINT', 0),
			),
			'PRIMARY_KEY'		=> 'image_id',
			'KEYS'				=> array(
				'i_d'			=> array('INDEX', 'imageset_id'),
			),
		);

		$schema_data['phpbb_topics'] = array(
			'COLUMNS'		=> array(
				'topic_id'					=> array('UINT', NULL, 'auto_increment'),
				'forum_id'					=> array('UINT', 0),
				'icon_id'					=> array('UINT', 0),
				'topic_attachment'			=> array('BOOL', 0),
				'topic_approved'			=> array('BOOL', 1),
				'topic_reported'			=> array('BOOL', 0),
				'topic_title'				=> array('STEXT_UNI', '', 'true_sort'),
				'topic_poster'				=> array('UINT', 0),
				'topic_time'				=> array('TIMESTAMP', 0),
				'topic_time_limit'			=> array('TIMESTAMP', 0),
				'topic_views'				=> array('UINT', 0),
				'topic_replies'				=> array('UINT', 0),
				'topic_replies_real'		=> array('UINT', 0),
				'topic_status'				=> array('TINT:3', 0),
				'topic_type'				=> array('TINT:3', 0),
				'topic_first_post_id'		=> array('UINT', 0),
				'topic_first_poster_name'	=> array('VCHAR_UNI', ''),
				'topic_first_poster_colour'	=> array('VCHAR:6', ''),
				'topic_last_post_id'		=> array('UINT', 0),
				'topic_last_poster_id'		=> array('UINT', 0),
				'topic_last_poster_name'	=> array('VCHAR_UNI', ''),
				'topic_last_poster_colour'	=> array('VCHAR:6', ''),
				'topic_last_post_subject'	=> array('STEXT_UNI', ''),
				'topic_last_post_time'		=> array('TIMESTAMP', 0),
				'topic_last_view_time'		=> array('TIMESTAMP', 0),
				'topic_moved_id'			=> array('UINT', 0),
				'topic_bumped'				=> array('BOOL', 0),
				'topic_bumper'				=> array('UINT', 0),
				'poll_title'				=> array('STEXT_UNI', ''),
				'poll_start'				=> array('TIMESTAMP', 0),
				'poll_length'				=> array('TIMESTAMP', 0),
				'poll_max_options'			=> array('TINT:4', 1),
				'poll_last_vote'			=> array('TIMESTAMP', 0),
				'poll_vote_change'			=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> 'topic_id',
			'KEYS'			=> array(
				'forum_id'			=> array('INDEX', 'forum_id'),
				'forum_id_type'		=> array('INDEX', array('forum_id', 'topic_type')),
				'last_post_time'	=> array('INDEX', 'topic_last_post_time'),
				'topic_approved'	=> array('INDEX', 'topic_approved'),
				'forum_appr_last'	=> array('INDEX', array('forum_id', 'topic_approved', 'topic_last_post_id')),
				'fid_time_moved'	=> array('INDEX', array('forum_id', 'topic_last_post_time', 'topic_moved_id')),
			),
		);

		$schema_data['phpbb_topics_track'] = array(
			'COLUMNS'		=> array(
				'user_id'			=> array('UINT', 0),
				'topic_id'			=> array('UINT', 0),
				'forum_id'			=> array('UINT', 0),
				'mark_time'			=> array('TIMESTAMP', 0),
			),
			'PRIMARY_KEY'	=> array('user_id', 'topic_id'),
			'KEYS'			=> array(
				'topic_id'			=> array('INDEX', 'topic_id'),
				'forum_id'			=> array('INDEX', 'forum_id'),
			),
		);

		$schema_data['phpbb_topics_posted'] = array(
			'COLUMNS'		=> array(
				'user_id'			=> array('UINT', 0),
				'topic_id'			=> array('UINT', 0),
				'topic_posted'		=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> array('user_id', 'topic_id'),
		);

		$schema_data['phpbb_topics_watch'] = array(
			'COLUMNS'		=> array(
				'topic_id'			=> array('UINT', 0),
				'user_id'			=> array('UINT', 0),
				'notify_status'		=> array('BOOL', 0),
			),
			'KEYS'			=> array(
				'topic_id'			=> array('INDEX', 'topic_id'),
				'user_id'			=> array('INDEX', 'user_id'),
				'notify_stat'		=> array('INDEX', 'notify_status'),
			),
		);

		$schema_data['phpbb_user_group'] = array(
			'COLUMNS'		=> array(
				'group_id'			=> array('UINT', 0),
				'user_id'			=> array('UINT', 0),
				'group_leader'		=> array('BOOL', 0),
				'user_pending'		=> array('BOOL', 1),
			),
			'KEYS'			=> array(
				'group_id'			=> array('INDEX', 'group_id'),
				'user_id'			=> array('INDEX', 'user_id'),
				'group_leader'		=> array('INDEX', 'group_leader'),
			),
		);

		$schema_data['phpbb_users'] = array(
			'COLUMNS'		=> array(
				'user_id'					=> array('UINT', NULL, 'auto_increment'),
				'user_type'					=> array('TINT:2', 0),
				'group_id'					=> array('UINT', 3),
				'user_permissions'			=> array('MTEXT', ''),
				'user_perm_from'			=> array('UINT', 0),
				'user_ip'					=> array('VCHAR:40', ''),
				'user_regdate'				=> array('TIMESTAMP', 0),
				'username'					=> array('VCHAR_CI', ''),
				'username_clean'			=> array('VCHAR_CI', ''),
				'user_password'				=> array('VCHAR_UNI:40', ''),
				'user_passchg'				=> array('TIMESTAMP', 0),
				'user_pass_convert'			=> array('BOOL', 0),
				'user_email'				=> array('VCHAR_UNI:100', ''),
				'user_email_hash'			=> array('BINT', 0),
				'user_birthday'				=> array('VCHAR:10', ''),
				'user_lastvisit'			=> array('TIMESTAMP', 0),
				'user_lastmark'				=> array('TIMESTAMP', 0),
				'user_lastpost_time'		=> array('TIMESTAMP', 0),
				'user_lastpage'				=> array('VCHAR_UNI:200', ''),
				'user_last_confirm_key'		=> array('VCHAR:10', ''),
				'user_last_search'			=> array('TIMESTAMP', 0),
				'user_warnings'				=> array('TINT:4', 0),
				'user_last_warning'			=> array('TIMESTAMP', 0),
				'user_login_attempts'		=> array('TINT:4', 0),
				'user_inactive_reason'		=> array('TINT:2', 0),
				'user_inactive_time'		=> array('TIMESTAMP', 0),
				'user_posts'				=> array('UINT', 0),
				'user_lang'					=> array('VCHAR:30', ''),
				'user_timezone'				=> array('DECIMAL', 0),
				'user_dst'					=> array('BOOL', 0),
				'user_dateformat'			=> array('VCHAR_UNI:30', 'd M Y H:i'),
				'user_style'				=> array('UINT', 0),
				'user_rank'					=> array('UINT', 0),
				'user_colour'				=> array('VCHAR:6', ''),
				'user_new_privmsg'			=> array('INT:4', 0),
				'user_unread_privmsg'		=> array('INT:4', 0),
				'user_last_privmsg'			=> array('TIMESTAMP', 0),
				'user_message_rules'		=> array('BOOL', 0),
				'user_full_folder'			=> array('INT:11', -3),
				'user_emailtime'			=> array('TIMESTAMP', 0),
				'user_topic_show_days'		=> array('USINT', 0),
				'user_topic_sortby_type'	=> array('VCHAR:1', 't'),
				'user_topic_sortby_dir'		=> array('VCHAR:1', 'd'),
				'user_post_show_days'		=> array('USINT', 0),
				'user_post_sortby_type'		=> array('VCHAR:1', 't'),
				'user_post_sortby_dir'		=> array('VCHAR:1', 'a'),
				'user_notify'				=> array('BOOL', 0),
				'user_notify_pm'			=> array('BOOL', 1),
				'user_notify_type'			=> array('TINT:4', 0),
				'user_allow_pm'				=> array('BOOL', 1),
				'user_allow_viewonline'		=> array('BOOL', 1),
				'user_allow_viewemail'		=> array('BOOL', 1),
				'user_allow_massemail'		=> array('BOOL', 1),
				'user_options'				=> array('UINT:11', 230271),
				'user_avatar'				=> array('VCHAR', ''),
				'user_avatar_type'			=> array('TINT:2', 0),
				'user_avatar_width'			=> array('USINT', 0),
				'user_avatar_height'		=> array('USINT', 0),
				'user_sig'					=> array('MTEXT_UNI', ''),
				'user_sig_bbcode_uid'		=> array('VCHAR:8', ''),
				'user_sig_bbcode_bitfield'	=> array('VCHAR:255', ''),
				'user_from'					=> array('VCHAR_UNI:100', ''),
				'user_icq'					=> array('VCHAR:15', ''),
				'user_aim'					=> array('VCHAR_UNI', ''),
				'user_yim'					=> array('VCHAR_UNI', ''),
				'user_msnm'					=> array('VCHAR_UNI', ''),
				'user_jabber'				=> array('VCHAR_UNI', ''),
				'user_website'				=> array('VCHAR_UNI:200', ''),
				'user_occ'					=> array('TEXT_UNI', ''),
				'user_interests'			=> array('TEXT_UNI', ''),
				'user_actkey'				=> array('VCHAR:32', ''),
				'user_newpasswd'			=> array('VCHAR_UNI:40', ''),
				'user_form_salt'			=> array('VCHAR_UNI:32', ''),
				'user_new'					=> array('BOOL', 1),
				'user_reminded'				=> array('TINT:4', 0),
				'user_reminded_time'		=> array('TIMESTAMP', 0),
			),
			'PRIMARY_KEY'	=> 'user_id',
			'KEYS'			=> array(
				'user_birthday'				=> array('INDEX', 'user_birthday'),
				'user_email_hash'			=> array('INDEX', 'user_email_hash'),
				'user_type'					=> array('INDEX', 'user_type'),
				'username_clean'			=> array('UNIQUE', 'username_clean'),
			),
		);

		$schema_data['phpbb_warnings'] = array(
			'COLUMNS'		=> array(
				'warning_id'			=> array('UINT', NULL, 'auto_increment'),
				'user_id'				=> array('UINT', 0),
				'post_id'				=> array('UINT', 0),
				'log_id'				=> array('UINT', 0),
				'warning_time'			=> array('TIMESTAMP', 0),
			),
			'PRIMARY_KEY'	=> 'warning_id',
		);

		$schema_data['phpbb_words'] = array(
			'COLUMNS'		=> array(
				'word_id'				=> array('UINT', NULL, 'auto_increment'),
				'word'					=> array('VCHAR_UNI', ''),
				'replacement'			=> array('VCHAR_UNI', ''),
			),
			'PRIMARY_KEY'	=> 'word_id',
		);

		$schema_data['phpbb_zebra'] = array(
			'COLUMNS'		=> array(
				'user_id'				=> array('UINT', 0),
				'zebra_id'				=> array('UINT', 0),
				'friend'				=> array('BOOL', 0),
				'foe'					=> array('BOOL', 0),
			),
			'PRIMARY_KEY'	=> array('user_id', 'zebra_id'),
		);

		// QA captcha tables
		// Only if required
		if (file_exists(PHPBB_ROOT_PATH . 'includes/captcha/plugins/phpbb_captcha_qa_plugin.' . PHP_EXT))
		{
			global $umil;

			include PHPBB_ROOT_PATH . 'includes/captcha/plugins/phpbb_captcha_qa_plugin.' . PHP_EXT;

			if ($umil->table_exists(CAPTCHA_QUESTIONS_TABLE) || $umil->table_exists(CAPTCHA_ANSWERS_TABLE) || $umil->table_exists(CAPTCHA_QA_CONFIRM_TABLE))
			{
				$schema_data['phpbb_captcha_answers'] = array(
					'COLUMNS' => array(
						'question_id'	=> array('UINT', 0),
						'answer_text'	=> array('STEXT_UNI', ''),
					),
					'KEYS'				=> array(
						'question_id'			=> array('INDEX', 'question_id'),
					),
				);

				$schema_data['phpbb_captcha_questions'] = array(
					'COLUMNS' => array(
						'question_id'	=> array('UINT', Null, 'auto_increment'),
						'strict'		=> array('BOOL', 0),
						'lang_id'		=> array('UINT', 0),
						'lang_iso'		=> array('VCHAR:30', ''),
						'question_text'	=> array('TEXT_UNI', ''),
					),
					'PRIMARY_KEY'		=> 'question_id',
					'KEYS'				=> array(
						'lang_iso'			=> array('INDEX', 'lang_iso'),
					),
				);

				$schema_data['phpbb_qa_confirm'] = array(
					'COLUMNS' => array(
						'session_id'	=> array('CHAR:32', ''),
						'confirm_id'	=> array('CHAR:32', ''),
						'lang_iso'		=> array('VCHAR:30', ''),
						'question_id'	=> array('UINT', 0),
						'attempts'		=> array('UINT', 0),
						'confirm_type'	=> array('USINT', 0),
					),
					'KEYS'				=> array(
						'session_id'			=> array('INDEX', 'session_id'),
						'lookup'				=> array('INDEX', array('confirm_id', 'session_id', 'lang_iso')),
					),
					'PRIMARY_KEY'		=> 'confirm_id',
				);
			}
		}

		return $schema_data;
	}
}
?>