<?php
/**
*
* @package Support Toolkit
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translated by Olympus DK Team
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
	'BACK_TOOL'							=> 'Tilbage til senest anvendte værktøj',
	'BOARD_FOUNDER_ONLY'				=> 'Kun grundlægger må tilgå Support Toolkittet.',

	'CAT_ADMIN'							=> 'Administrative værktøjer',
	'CAT_ADMIN_EXPLAIN'					=> 'Disse værktøjer giver administratorer mulighed for at udføre specifikke opgaver på boardet og løse almene problemer.',
	'CAT_DEV'							=> 'Udviklerværktøjer',
	'CAT_DEV_EXPLAIN'					=> 'Udviklerværktøjerne kan anvendes af phpBB- og MOD-udviklere til at udføre almene opgaver.',
	'CAT_ERK'				=> 'Nødreparationsæt',
	'CAT_ERK_EXPLAIN'	=> 'Nødreparationsættet er et særskilt sæt værktøjer i STK. Nødreparationsættet udfører nogle kontroller som er konstrueret til at opdage problemer i din phpBB-installation, som kan forhindre dit board i at virke. Klik <a href="%s">her</a> for at udføre kontrollen.',
	'CAT_MAIN'							=> 'STK-indeks',
	'CAT_MAIN_EXPLAIN'					=> 'Support Toolkittet kan anvendes til at reparere almindeligt forekommende problemer i phpBB 3.0.x-installationer. Det fungerer som administratorpanel nummer 2, og kan nemt installeres på ethvert fungerende phpBB 3-board.<br /><br />Kontrolpanelet er designet efter samme retningslinier som det almindelige administratorkontrolpanel. Og giver adgang til et nyt sæt værktøjer, som kan anvendes hvis phpBB ikke fungerer korrekt.',
	'CAT_SUPPORT'						=> 'Hjælpeværktøjer',
	'CAT_SUPPORT_EXPLAIN'				=> 'Hjælpeværktøjerne kan anvendes til at reparere eller gendanne en phpBB 3.0.x-installation, der ikke længere fungerer korrekt.',
	'CAT_USERGROUP'					=> 'Bruger- og gruppeværktøjer',
	'CAT_USERGROUP_EXPLAIN'			=> 'Bruger- og gruppeværktøjer kan anvendes til administrere brugere og grupper med metoder som ikke er tilgængelige i en standardinstallation.',
	'CONFIG_NOT_FOUND'					=> 'STK-konfigurationsfilen kunne ikke indlæses. Kontroller venligst din installation',

	'DOWNLOAD_PASS'						=> 'Download kodeordsfil.',

	'EMERGENCY_LOGIN_NAME'				=> 'STK nødlogin',
	'ERK'		=> 'Nødreparationsæt',

	'FAIL_REMOVE_PASSWD'				=> 'Kunne ikke fjerne udløbet kodeordsfil. Fjern den venligst manuelt!',

	'GEN_PASS_FAILED'					=> 'Support Toolkittet kunne ikke danne et nyt kodeord. Forsøg venligst igen.',
	'GEN_PASS_FILE'						=> 'Dan kodeordsfil.',
	'GEN_PASS_FILE_EXPLAIN'				=> 'Er du ude af stand til at logge ind på boardet, kan du anvende Support Toolkittets interne autentikation. Hertil skal du <a href="%s"><strong>danne</strong></a> en kodeordsfil.',

	'INCORRECT_CLASS'					=> 'Forkert class i: stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'Kodeord ikke korrekt',
	'INCORRECT_PHPBB_VERSION'			=> 'Din phpBB-version er ikke kompatibel med dette værktøj. Din installation skal være på version %1$s eller nyere, for at anvende værktøjet.',

	'LOGIN_STK_SUCCESS'					=> 'Du er blevet autentificeret og viderestilles til Support Toolkittet.',

	'NOTICE'							=> 'Bemærk',
	'NO_VERSION_FILE'					=> 'Support Toolkittet kan ikke bestemme den seneste version af pakken. Besøg venligst Support Toolkits <a href="http://www.phpbb.com/support/stk/">Support Toolkit afsnittet på phpBB.com</a> og kontroller at du har seneste version installeret før du fortsætter med brugen.',

	'REQUEST_PHPBB_VERSION'				=> 'Angiv phpBB-version',
	'REQUEST_PHPBB_VERSION_EXPLAIN'	=> 'Support Toolkittet kan ikke identificere hvilken version af phpBB du anvender. Derfor bedes du her vælge den korrekte version, før der fortsættes.<br />Har du brug for hjælp til at afgøre dette, kan du få assistance i disse<a href="http://www.phpbb.com/community/viewforum.php?f=46">fora</a>.',

	'PASS_GENERATED'					=> 'Din STK kodeordsfil blev dannet!<br/>Kodeordet der blev dannet til dig er: <em>%1$s</em><br />Kodeordet udløber: <span style="text-decoration: underline;">%2$s</span>. Efter udløb <strong>skal</strong> du danne en ny kodeordsfil for at fortsætte med at anvende nødloginmetoden!<br /><br />Klik på efterfølgende knap for at downloade filen. Den downloadede fil skal uploades til din servers "stk"-mappe.',
	'PASS_GENERATED_REDIRECT'			=> 'Når du har uploadet kodeordsfilen til rette placering, klikkes <a href="%s">her</a> for at komme tilbage til log ind.',
	'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Værktøjet er ikke kompatibelt med den version af phpBB du har installeret',
	'PROCEED_TO_STK'					=> '%sForsæt til Support Toolkit%s',

	'STK_FOUNDER_ONLY'					=> 'Du skal indtaste dit kodeord igen for at få adgang til Support Toolkittet.',
	'STK_LOGIN'							=> 'Support Toolkit log ind',
	'STK_LOGIN_WAIT'					=> 'Du skal vente tre sekunder før du kan foretage et nyt forsøg på log ind. Prøv venligst igen.',
	'STK_LOGOUT'						=> 'STK log ud',
	'STK_LOGOUT_SUCCESS'				=> 'Du er nu logget ud fra Support Toolkittet.',
	'STK_NON_LOGIN'						=> 'Log ind for at få adgang til STK.',
	'STK_OUTDATED'						=> 'Din Support Toolkit installation synes at ikke at være opdateret. Den senest frigivne version er <strong style="color: #008000;">%1$s</strong>, Den version du har installeret er <strong style="color: #FF0000;">%2$s</strong>.<br /><br />På grund af værktøjernes store mulige indvirkning på din phpBB-installation, er hele installation deaktiveret, indtil en opdatering er udført. Vi anbefaler stærkt, at al software installeret på din server holdes opdateret. Læs mere information om den seneste opdatering i  <a href="%3$s">frigivelsesemnet</a>.',
	'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
	'SUPPORT_TOOL_KIT_INDEX'			=> 'Support Toolkit-indeks',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Kodeord',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Da du ikke er logget ind på boardet, må du bekræfte at du er boardejer, ved at angive Support Toolkit-kodeordet.<br /><br /><strong>Cookies SKAL være tilladt i din browser, ellers er du ikke i stand til at forblive logget ind.</strong>',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'Værktøjet forsøger at kalde filen: %1$s, som ikke kan findes.',
	'TOOL_NAME'							=> 'Værktøjets navn',
	'TOOL_NOT_AVAILABLE'				=> 'Det ønskede værktøj er ikke tilgængeligt.',

	'USING_STK_LOGIN'					=> 'Du er nu logget ind via STK\'s interne autentifikation. Vi tiIråder at denne metode <strong>kun</strong> anvendes, hvis du ikke er i stand til at logge ind på normal vis.<br />Klik <a href="%1$s">her</a> for at deaktivere denne autentifikationsmetode.',
));