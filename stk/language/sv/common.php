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
* @package      Support Toolkit
* @author       Simon Assgård <sassgard@gmail.com> (Simon Assgård) http://www.phpbb-se.com/
* @copyright   (c) 2009 phpBB Group
* @license      http://opensource.org/licenses/gpl-license.php GNU Public License
* @version      $Id$
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
	'BACK_TOOL'							=> 'Tillbaka till det senast använda verktyget',
	'BOARD_FOUNDER_ONLY'				=> 'Endast forumets grundare har tillgång till Support Toolkit',

	'CAT_ADMIN'							=> 'Administrativa verktyg',
	'CAT_ADMIN_EXPLAIN'					=> 'Dessa verktyg ger administratören möjligheten att utföra specifika uppgifter på forumet för att lösa allmänna problem.',
	'CAT_DEV'							=> 'Utvecklingsverktyg',
	'CAT_DEV_EXPLAIN'					=> 'Utvecklingsverktyget kan användas av phpBB- och MOD-utvecklare för att utföra allmänna uppgifter.',
	'CAT_ERK'							=> 'Nödreparationsverktyg',
	'CAT_ERK_EXPLAIN'					=> 'Nödreparationsverktyget är ett särskilt verktyg i STK. Nödreparationsverktyget utför noggranna kontroller som är konstruerade för att fixa problem i din phpBB-installation, som kan förhindra ditt forum att fungera. Klicka <a href="%s">här</a> för att utföra kontrollen.',
	'CAT_MAIN'							=> 'STK-Index',
	'CAT_MAIN_EXPLAIN'					=> 'Support Toolkit kan användas till att reparera allmänt förekommande problem i phpBB 3.0.x-installationer. Det fungerar som en sekundär administrationspanel, och ger administratören tillgång till verktyg för att kunna lösa vanliga problem som kanske förhindrar phpBB3-installationen från att fungera korrekt.',
	'CAT_SUPPORT'						=> 'Hjälpverktyg',
	'CAT_SUPPORT_EXPLAIN'				=> 'Hjälpverktygen kan användas för att reparera eller återställa en phpBB 3.0.x-installation som inte längre fungerar korrekt.',
	'CAT_USERGROUP'						=> 'Användare- och gruppverktyg',
	'CAT_USERGROUP_EXPLAIN'				=> 'Användare- och gruppverktyg kan användas för att hantera användare och grupper på sätt som inte är tillgängliga i en ny installation av phpBB 3.0.x.',
	'CONFIG_NOT_FOUND'					=> 'STK konfigurationsfilen kunde inte laddas. Vänligen se över din installation',

	'DOWNLOAD_PASS'						=> 'Ladda ner lösenordsfilen.',

	'EMERGENCY_LOGIN_NAME'				=> 'STK Nödlogin',
	'ERK'								=> 'Nödreparationsverktyget',

	'FAIL_REMOVE_PASSWD'				=> 'Det gick inte att ta bort den förgångna lösenordsfilen. Vänligen ta bort denna manuellt!',

	'GEN_PASS_FAILED'					=> 'Support Toolkit lyckades inte generera ett nytt lösenord. Vänligen försök igen.',
	'GEN_PASS_FILE'						=> 'Skapa lösenordsfil.',
	'GEN_PASS_FILE_EXPLAIN'				=> 'Om du inte har möjlighet att logga in alls på forumet så kan du använda dig utav den interna autentikationen av Support Toolkit. För att använda denna metod måste du <a href="%s"><strong>skapa</strong></a> en ny lösenordsfil.',

	'INCORRECT_CLASS'					=> 'Felaktig klass i: stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'Felaktigt lösenord',
	'INCORRECT_PHPBB_VERSION'			=> 'Din version av phpBB är inte kompatibel med detta verktyg. Din phpBB-installation måste vara utav versionen %1$s eller senare, för att använda detta verktyg.',

	'LOGIN_STK_SUCCESS'					=> 'Dina uppgifter har blivit verifierade, och du kommer nu att bli omdirigerad till Support Toolkit.',

	'NOTICE'							=> 'Notera',
	'NO_VERSION_FILE'					=> 'Support Toolkit kunde inte bestämma den senaste versionen av paketet. Vänligen gå till <a href="http://phpbb.com/support/stk">Support Toolkit-avsnittet av phpBB.com</a> och verifiera att du har den senaste versionen före du fortsätter att använder STK.',

	'REQUEST_PHPBB_VERSION'	=> 'Definera phpBB versionen',
	'REQUEST_PHPBB_VERSION_EXPLAIN'	=> 'Supportverktyget kunde inte identifiera vilken version utav phpBB du använder, vänligen ange den rätta versionen i detta formulär före du fortsätter.',

	'PASS_GENERATED'					=> 'Din STK-lösenordsfil är skapad!<br/>Lösenordet som skapades är: <em>%1$s</em><br />Detta lösenordet kommer att upphöra: <span style="text-decoration: underline;">%2$s</span>. Efter denna tiden <strong>måste</strong> du skapa en ny lösenordsfil för att kunna fortsätta använda nödinloggningsmetoden!<br /><br />Använd följande knapp för att ladda ner filen. Den nedladdade filen skall sedan laddas upp på din server in "stk"-mappen.',
	'PASS_GENERATED_REDIRECT'			=> 'När du har laddat upp lösenordsfilen till rätt ställe, klicka <a href="%s">här</a> för att komma tillbaka till loginsidan.',
	'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Detta verktyget är inte kompatibelt med den versionen av phpBB du använder.',
	'PROCEED_TO_STK'					=> '%sForstätt till Support Toolkit%s',

	'STK_FOUNDER_ONLY'					=> 'Du måste åter-verifiera dig innan du kan använda Support Toolkit.',
	'STK_LOGIN'							=> 'Support Toolkit-inloggning',
	'STK_LOGIN_WAIT'					=> 'Du måste vänta tre sekunder före du försöker logga in på nytt. Vänligen försök igen.',
	'STK_LOGOUT'						=> 'Logga ut från STK',
	'STK_LOGOUT_SUCCESS'				=> 'Du är nu utloggad från Support Toolkit.',
	'STK_NON_LOGIN'						=> 'Logga in för att få tillgång till STK.',
	'STK_OUTDATED'						=> 'Din Support Toolkit-installation verkar inte vara uppdaterad. Den senaste versionen är <strong style="color: #008000;">%1$s</strong>, medans den versionen du har installerad är <strong style="color: #FF0000;">%2$s</strong>.<br /><br />På grund utav detta verktygets stora påverkan på din phpBB-installation, så har det blivit inaktiverat tills en uppdatering är utförd. Vi rekommenderar starkt att hålla all mjukvara på din server uppdaterad. För mer information om den senaste uppdateringen, vänligen se <a href="%3$s">utgivningstråden</a>.<br /><br /><em>Om du fortfarande ser detta meddelandet efter uppdatering, vänligen klicka <a href="%4$s">här</a> för att tömma cachen av versionskontrollen.',
	'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
	'SUPPORT_TOOL_KIT_INDEX'			=> 'Support Toolkit-index',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Lösenord',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Eftersom du inte är inloggad på forumet, måste du verifiera att du är grundare genom att ange Support Toolkit-lösenordet.<br /><br /><strong>Kakor MÅSTE vara tillåtna av din browser, annars kommer du inte kunna stanna inloggad.</strong>',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'Detta verktyget försöker kalla på filen: (%1$s) som inte finns.',
	'TOOL_NAME'							=> 'Verktygets namn',
	'TOOL_NOT_AVAILABLE'				=> 'Det ansökta verktyget är inte tillgängligt.',

	'USING_STK_LOGIN'					=> 'Du är inloggad med den interna STK-verifieringsmetoden. Det är rekommenderat att <strong>endast</strong> använda denna metoden när du inte kan logga in på forumet.<br />För att inaktivera denna verifieringsmetod, klicka <a href="%1$s">här</a>.',
));
