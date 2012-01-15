<?php
/**
*
* This file is part of Swedish STK translation.
* Copyright (c) 2010 - 2011 Swedish translation group.
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; version 2 of the License.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along
* with this program; if not, write to the Free Software Foundation, Inc.,
* 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*
* @package    Support Toolkit - SRT Generator
* @author     Simon Assgård <sassgard@gmail.com> (Simon Assgård) http://www.phpbb-se.com/
* @copyright (c) 2009 phpBB Group
* @license    http://opensource.org/licenses/gpl-license.php GNU Public License
* @version    $Id$
*
*/

/**
 * @ignore
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
// ’ » " " …
//

$lang = array_merge($lang, array(
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Nedan finner du din kopia utav Support Request Template. Klicka nedan för att kopiera den till urklipp, sen skapa en ny tråd i <a href="http://www.phpbb-se.com/forum/viewforum.php?f=19">Supportforumet</a> med denna informationen. Om du redan har en tråd angående detta problemet, vänligen kopiera detta urklippet som ett svar i din redan existerande tråd istället för att skapa en ny.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'Support Request Template Generatorn kunde inte ladda svaren. Säkerställ att du startade verktyget korrekt.',
	'SRT_GENERATOR'					=> 'Support Request Template Generator',
	'SRT_GENERATOR_LANDING'			=> 'Support Request Template Generator',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Väkommen till Supportgruppens Request Template Generatorn. Detta är det snabbaste och mest effektiva sättet att färdigställa våran Support Request Template. Generatorn kommer att fråga dig ett antal frågor som är användbara vid felsökande av de flesta problem. Sedan kommer den att kompilera dina svar till en lista som du kan kopiera och klistra in i din Supporttråd.<br />Detta STK verktyg gör samma sak som<a href="http://www.phpbb.com/support/stk/">SRT Generator på www.phpbb.com</a> men försöker att autofylla vissa frågor.<br /><br />Vill du köra SRT Generator?',
	'SRT_NO_CACHE'					=> 'Support Request Template generatorn använder sig utav phpBBs cache-system för att lagra information under tiden du går igenom samtliga steg. Du använder dig utav phpBB null cache, som inte är kompatibelt med detta verktyget. Vänligen byt till en utav de andra cache-valmöjligheterna för att använda detta verktyget eller använd dig utav <a href="http://www.phpbb.com/support/srt/">online SRT Generatorn</a>',
	'START_OVER'					=> 'Starta om',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'Är ditt problem MOD-relaterat?',
	'STEP1_MOD_EXPLAIN'		=> 'Uppstod detta problem efter installation eller borttagning utav en MOD?',
	'STEP1_MOD_ERROR'		=> 'Supportfrågor för MOD-relaterade problem(e.x., om du precis har installerat en MOD och nu får felmeddelanden) borde skrivas i tråden där du laddade ner MODen. Om MODen är nedladdad från en annan sida så måste du söka support där.<br /><br /><a href="http://www.phpbb.com/community/viewforum.php?f=81">Gå till MOD-forumen</a>',
	'STEP1_HACKED'			=> 'Blev ditt forum hackat?',
	'STEP1_HACKED_EXPLAIN'	=> 'Välj "Ja" om du söker support för att ditt forum på något sätt blivit vandaliserat eller på annat sätt äventyrat.',
	'STEP1_HACKED_ERROR'	=> 'Om ditt forum blev hackat, ber vi dig att skapa en rapport med Incident Investigation Tracker istället för att göra ett inlägg i supportforumen så att ingen privat information blir offentlig. <br /><br />Se <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">denna tråd</a> för direktioner angående detta.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Vilken version utav phpBB använder du dig utav?',
			'board_url'			=> 'Vad har du för URL till ditt forum?',
			'dbms'				=> 'Which database type/version are you using?',
			'php'				=> 'Which PHP version are you using?',
			'host_name'			=> 'Who do you host your board with?',
			'install_type'		=> 'How did you install your board?',
			'inst_converse'		=> 'Is your board a fresh install or a conversion?',
			'mods_installed'	=> 'Do you have any MODs installed?',
			'registration_req'	=> 'Is registration required to reproduce this issue?',
		),
		'step3'	=> array(
			'installed_styles'		=> 'What styles do you currently have installed?',
			'installed_languages'	=> 'What language(s) is your board currently using?',
			'xp_level'				=> 'What is your level of experience?',
			'problem_started'		=> 'When did your problem begin?',
			'problem_description'	=> 'Please describe your problem.',
			'installed_mods'		=> 'What MODs do you have installed?',
			'test_username'			=> 'What username can be used to view this issue?',
			'test_password'			=> 'What password can be used to view this issue?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'The SRT Generator couldn’t determine which phpBB version you are using, please select the correct version. To find this information, login to your board and scroll down to the bottom of the page. Click "Administration Control Panel". Click the "System" tab.',
			'board_url'			=> 'Your board URL is the address that you use to access your board. Most problems are more easily fixed when one can view your board. If you do not want to give out this information, please enter "n/a".',
			'dbms'				=> 'To determine which database version and type you are using, go to the Administration Control Panel. On the "General" tab, locate "Database server:" in the statistics table.',
			'php'				=> 'To determine which PHP version you are using, go to the Administration Control Panel. On the "General" tab, click on "PHP Information", here you’ll find "PHP Version x.y.z"',
			'host_name'			=> 'Some problems experienced with phpBB boards can be attributed to particular hosts. This field should be filled with the company that is providing your webhosting package (like GoDaddy, Yahoo!, 1&1, etc.). If you are hosting the board yourself, please indicate this. Likewise, if you do not know who is hosting your board, please indicate this as well.',
			'install_type'		=> 'If you installed your board by downloading the phpBB files, uploading them to your host, then browsing to the installer, select "I installed the board by myself." If you had someone do the installation for you, select "Someone else installed my board for me." If you used an automated tool like Fantastico, select "I used a tool provided by my host."',
			'inst_converse'		=> 'If your board was a fresh install, this means your board did not exist prior to installing phpBB. If you recently updated your board from an older version of phpBB3 prior to your problem beginning, then selected "Update from a previous version of phpBB3". If it is a conversion, this means your board was installed previously as another piece of software then later converted to phpBB.',
			'mods_installed'	=> 'MODs are often the cause of many problems with phpBB. This information can help to determine the exact cause of your issue.',
			'registration_req'	=> 'Select "Yes" if one must be registered and logged in to experience this problem.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'An out of date style is the cause of many problems. If you do not know which styles you have installed, go to the Administration Control Panel, then browse to the "Styles" tab.',
			'installed_languages'	=> 'An out of date language pack is the cause of many problems. If you do not know which language packs you have installed, go to the Administration Control Panel, then browse to the "System" tab. Next, select "Language packs" from the list of pages on the left.',
			'xp_level'				=> 'Please select the option that best describes you.',
			'problem_started'		=> 'Please describe the actions you took (updating your board, installing a MOD, etc.) prior to this problem becoming noticeable.',
			'problem_description'	=> 'When describing your problem, please attempt to be as detailed as possible. Include information regarding when the problem started, steps to reproduce the problem, and any other information that you deem helpful.',
			'installed_mods'		=> 'Please try to be as detailed as you can when listing your installed MODs. This information greatly helps us in determining the cause of your problem.',
			'test_username'			=> 'Please provide the username to a test account that can be used to view this issue. Do <strong>not</strong> provide this information if the user requires more than "regular user" privileges.',
			'test_password'			=> 'Please provide the password to a test account that can be used to view this issue. Do <strong>not</strong> provide this information if the user requires more than "regular user" privileges.',
		),
	),
));

// Langauge strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				'myself'		=> 'I used the download package from phpBB.com',
				'third'			=> 'I used a download package provided by another website',
				'someone_else'	=> 'Someone else installed my board for me',
				'automated'		=> 'I used a tool provided by my host',
			),
			'inst_converse'	=> array(
				'fresh'				=> 'Fresh Install',
				'phpbb_update'		=> 'Update from a previous version of phpBB3',
				'convert_phpbb2'	=> 'Conversion from phpBB2',
				'convert_other'		=> 'Conversion from another software',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				'new_both'		=> 'New to PHP and phpBB',
				'new_phpbb'		=> 'New to phpBB but not PHP',
				'new_php'		=> 'New to PHP but not phpBB',
				'comfort'		=> 'Comfortable with PHP and phpBB',
				'experienced'	=> 'Experienced with PHP and phpBB',
			),
		),
	),
));
