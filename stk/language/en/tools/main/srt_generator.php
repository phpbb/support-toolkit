<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2010 phpBB Group
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
	'COMPILED_TEMPLATE_EXPLAIN'	=> 'Below is your copy of the Support Request Template. Click below to copy it to your clipboard, then create a new post in the <a href="http://www.phpbb.com/community/viewforum.php?f=46">Support forum</a> with this information. If you already have an existing support topic regarding your issue, please copy the template into a reply to your existing topic instead of creating a new one.',
	'COULDNT_LOAD_SRT_ANSWERS'	=> 'The Support Request Template Generator couldn\'t load the answers. Make sure that you\'ve correctly started the tool.',

	'I_DONT_KNOW'	=> 'I don\'t know',

	'SRT_GENERATOR'					=> 'Support Request Template Generator',
	'SRT_GENERATOR_LANDING'			=> 'Support Request Template Generator',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Welcome to the Support Team\'s Support Request Template Generator. This is the quickest and most efficient way to complete our Support Request Template. The generator will ask you a series of eight to ten questions that are useful for diagnosing most issues. It will then compile your answers into a list that may be copied and pasted into your support topic.<br />This STK tool does the same thing as the <a href="http://www.phpbb.com/support/stk/">SRT Generator on www.phpbb.com</a> but attempts to pre-fill certain questions.<br /><br />Do you wish run the SRT Generator?',
	'SRT_NO_CACHING'				=> 'It seems like you are using the "NULL" cache, because this tool needs the caching system isn\'t it possible to use the generator with this caching type. Please change your caching backen or use the <a href="http://www.phpbb.com/support/srt/">online version</a> of the SRT Generator.',
	'START_OVER'					=> 'Start over',
	'STEP'							=> 'Step',
));

// These arrays contain the language entries for the questions/help lines
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'		=> array(
		'step1'	=> array(
			'phpbb_version'		=> 'What version of phpBB are you using?',
			'mod_related'		=> 'Is your problem MOD-related?',
			'convert_status'	=> 'Are you attempting to convert to phpBB from another board software?',
			'hacked'			=> 'Was your board hacked?',
		),
		'step2'	=> array(
			'board_url'		=> 'What is your board\'s URL?',
			'host'			=> 'Who do you host your board with?',
			'install_type'	=> 'How did you install your board?',
			'conversion'	=> 'Is your board a fresh install or a conversion?',
			'mod_related'	=> 'Do you have any MODs installed?',
			'reg_required'	=> 'Is registration required to reproduce this issue?',
		),
		'step3'	=> array(
			'conversion_software'	=> 'What board software did you convert from?',
			'update_version'		=> 'What version of phpBB3 did you update from?',
			'mods_installed'		=> 'What MODs do you have installed?',
			'styles'				=> 'What styles do you currently have installed?',
			'languages'				=> 'What language(s) is your board currently using?',
			'database'				=> 'Which database type/version are you using?',
			'experience'			=> 'What is your level of experience?',
			'test_user'				=> 'What username can be used to view this issue?',
			'test_pass'				=> 'What password can be used to view this issue?',
			'begin'					=> 'When did your problem begin?',
			'problem'				=> 'Please describe your problem.',
		),
	),
	'SRT_HELP_LINES'	=> array(
		'step1'	=> array(
			'phpbb_version'		=> 'To find this information, login to your board and scroll down to the bottom of the page. Click "Administration Control Panel". Click the "System" tab.',
			'mod_related'		=> 'Did this problem start after installing or removing a MOD?',
			'convert_status'	=> 'Select "Yes" for this option if you are currently trying to convert to phpBB from another forum software (i.e. vBulletin, IPB, SMF, etc.)',
			'hacked'			=> 'Select "Yes" for this option if you are seeking support because your board was defaced/otherwise compromised.',
		),
		'step2'	=> array(
			'board_url'		=> 'Your board URL is the address that you use to access your board. Most problems are more easily fixed when one can view your board. If you do not want to give out this information, please enter "n/a".',
			'host'			=> 'Some problems experienced with phpBB boards can be attributed to particular hosts. This field should be filled with the company that is providing your webhosting package (like GoDaddy, Yahoo!, 1&1, etc.). If you are hosting the board yourself, please indicate this. Likewise, if you do not know who is hosting your board, please indicate this as well.',
			'install_type'	=> 'If you installed your board by downloading the phpBB files, uploading them to your host, then browsing to the installer, select "I installed the board by myself." If you had someone do the installation for you, select "Someone else installed my board for me." If you used an automated tool like Fantastico, select "I used a tool provided by my host."',
			'conversion'	=> 'If your board was a fresh install, this means your board did not exist prior to installing phpBB. If you recently updated your board from an older version of phpBB3 prior to your problem beginning, then selected "Update from a previous version of phpBB3". If it is a conversion, this means your board was installed previously as another piece of software then later converted to phpBB.',
			'mod_related'	=> 'MODs are often the cause of many problems with phpBB. This information can help to determine the exact cause of your issue.',
			'reg_required'	=> 'Select "Yes" if one must be registered and logged in to experience this problem.',
		),
		'step3'	=> array(
			'conversion_software'	=> 'This is the software that you used prior to phpBB',
			'update_version'		=> 'What version of phpBB3 were you using prior to updating to the latest version?',
			'mods_installed'		=> 'Please try to be as detailed as you can when listing your installed MODs. This information greatly helps us in determining the cause of your problem.',
			'styles'				=> 'An out of date style is the cause of many problems. If you do not know which styles you have installed, go to the Administration Control Panel, then browse to the "Styles" tab.',
			'languages'				=> 'An out of date language pack is the cause of many problems. If you do not know which language packs you have installed, go to the Administration Control Panel, then browse to the "System" tab. Next, select "Language packs" from the list of pages on the left.',
			'database'				=> 'To determine which database version and type you are using, go to the Administration Control Panel. On the "General" tab, locate "Database server:" in the statistics table.',
			'experience'			=> 'Please select the option that best describes you.',
			'test_user'				=> 'Please provide the username to a test account that can be used to view this issue. You may need to register one.',
			'test_pass'				=> 'Please provide the password to a test account that can be used to view this issue. You may need to register one.',
			'begin'					=> 'Please describe the actions you took (updating your board, installing a MOD, etc.) prior to this problem becoming noticeable.',
			'problem'				=> 'When describing your problem, please attempt to be as detailed as possible. Include information regarding when the problem started, steps to reproduce the problem, and any other information that you deem helpful.',
		),
	),
));

// Language strings used in dropdown boxes
$lang['SRT_DROPDOWN_OPTIONS'] = array(
	'step2'	=> array(
		// Install types
		'myself'			=> 'I used the download package from phpBB.com',
		'third'				=> 'I used a download package provided by another website',
		'someone_else'		=> 'Someone else installed my board for me',
		'automated'			=> 'I used a tool provided by my host',

		// Convert types
		'fresh'				=> 'Fresh Install',
		'phpbb_update'		=> 'Update from a previous version of phpBB3',
		'convert_phpbb2'	=> 'Conversion from phpBB2',
		'convert_other'		=> 'Conversion from another software',
	),
	'step3' => array(
		// Experience options
		'new_both'		=> 'New to PHP and phpBB',
		'new_phpbb'		=> 'New to phpBB but not PHP',
		'new_php'		=> 'New to PHP but not phpBB',
		'comfort'		=> 'Comfortable with PHP and phpBB',
		'experienced'	=> 'Experienced with PHP and phpBB',
	),
);

// Some questions include a notice we'll add these notices here
$lang['SRT_NOTICES']['step3']['test_user'] = 'Please do <strong>not</strong> provide this information if the user requires more than "regular user" privileges.';
$lang['SRT_NOTICES']['step3']['test_pass'] = 'Please do <strong>not</strong> provide this information if the user requires more than "regular user" privileges.';