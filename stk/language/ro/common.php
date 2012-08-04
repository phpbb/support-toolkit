<?php
/**
*
* @package Support Toolkit
* @version $Id: common.php 282 2010-01-21 06:37:46Z iwisdom $
* @translate $Id: common.php 282 2010-02-14 15:20:15 dorin $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'BACK_TOOL'							=> 'Inapoi la ultimul utilitar',
	'BOARD_FOUNDER_ONLY'				=> 'Numai fondatorii forumului pot accesa Support Toolkit.',

	'CAT_ADMIN'							=> 'Utilitare de administrare',
	'CAT_ADMIN_EXPLAIN'					=> 'Instrumentele de administrare pot fi folosite de un administrator pentru gestionarea anumitor aspecte şi rezolvarea majorităţii problemelelor.',
	'CAT_DEV'							=> 'Utilitare pentru dezvoltatori',
	'CAT_DEV_EXPLAIN'					=> 'Utilitarele pentru dezvoltatori pot fi utilizate dezvoltatorii şi creatorii de MODuri phpBB pentru efectuarea unor operaţiuni.',
  'CAT_ERK'							=> 'Utilitar Reparare urgenţă',
  'CAT_ERK_EXPLAIN'					=> 'Utilitarul Reparare urgenţă este o componentă separată a pachetului Support Toolkit care poate fi folosită pentru a verifica eventualele probleme cu instalarea forumului propriu phpBB ce pot duce la nefuncţionarea forumului. Apăsaţi <a href="%s">aici</a> pentru a rula acest utilitar.',
	'CAT_MAIN'							=> 'General',
	'CAT_MAIN_EXPLAIN'					=> 'Support Toolkit (STK) poate fi folosit pentru remedierea problemelor comune care pot apărea la o instalare phpBB 3.0.x. Serveşte ca un al doilea PA, oferind unui administrator un set de instrumente pentru rezolvarea problemelor comune care ar putea împiedica o instalare phpBB să funcţioneze corespunzător.',
	'CAT_SUPPORT'						=> 'Utilitare de ajutor',
	'CAT_SUPPORT_EXPLAIN'				=> 'Utilitarele de ajutor sunt utilizate pentru ajutorul în recuperarea unei instalări phpBB 3.0.x. care nu mai funcţionează corespunzător.',
	'CAT_USERGROUP'						=> 'Utilitare utilizatori/grupuri',
	'CAT_USERGROUP_EXPLAIN'				=> 'Utilitarele pentru utilizatori şi grupuri pot fi utilizate pentru gestionarea utilizatorilor şi grupurilor de utilizatori şi care nu sunt disponibile într-o instalare standard phpBB 3.0.x.',
	'CONFIG_NOT_FOUND'					=> 'Fişierul de configurare STK nu poate fi încărcat. Verificaţi instalarea.',

	'DOWNLOAD_PASS'						=> 'Descarcă fişierul parolă.',

	'EMERGENCY_LOGIN_NAME'				=> 'Autentificare de urgenţă STK',
	'ERK'								=> 'Utilitar reparaţii urgente',

	'FAIL_REMOVE_PASSWD'				=> 'Fişierul parolă expirat nu poate fi mutat. Mutataţi acest fişier manual!',

	'GEN_PASS_FAILED'					=> 'Suport Toolkit nu poate genera o nouă parolă. Vă rugăm să încercaţi din nou!',
	'GEN_PASS_FILE'						=> 'Generează fişier parolă.',
	'GEN_PASS_FILE_EXPLAIN'				=> 'Dacă nu puteţi să vă autentificaţi în phpBB, puteţi utiliza metoda de autentificare internă a Support Toolkit. Pentru a utiliza această metodă trebuie să <a href="%s"><strong>generaţi</strong></a> un nou fişier parolă.',

	'INCORRECT_CLASS'					=> 'Clasă incorectă în: stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'Parola este eronată',
	'INCORRECT_PHPBB_VERSION'			=> 'Versiunea phpBB nu este compatibilă cu acest utilitar. Instalarea phpBB trebuie să fie versiunea %1$s sau mai nouă, pentru a putea folosi acest utilitar!',

	'LOGIN_STK_SUCCESS'					=> 'Aţi fost autentificat cu succes şi veţi fi acum redirecţionat către Support Toolkit.',

	'NOTICE'							=> 'Notă',
	'NO_VERSION_FILE'					=> 'Support Toolkit (STK) nu poate determina ultima versiune. Mergeţi la secţiune <a href="http://www.phpbb.com/support/stk/">Support Toolkit a phpBB.com</a> şi asiguraţi-vă că folosiţi ultima versiune înainte de a folosi acest utilitar.',

	'PASS_GENERATED'					=> 'Fişierul parolă STK a fost generat!<br/>Parola care a fost generată este: <em>%1$s</em><br />. Această parolă va expira la: <span style="text-decoration: underline;">%2$s</span>. După acest moment <strong>trebuie</strong> generat un nou fişier pentru a păstra posibilitatea autentificării în cazuri de urgenţă!<br /><br />Folosiţi următorul buton pesntru a descărca fişierul. După descărcare fişierul trebuie încărcat pe server în folderul "stk".',
	'PASS_GENERATED_REDIRECT'			=> 'După încărcarea fişierului parolă în locaţia corectă, apăsaţi <a href="%s">aici</a> pentru a vă întoarce la pagina de autentificare.',
	'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Acest utilitar nu este compatibil cu versiunea phpBB care rulează.',
	'PROCEED_TO_STK'					=> '%sMergeţi mai departe la Support Toolkit%s',

	'STK_FOUNDER_ONLY'					=> 'Trebuie să vă autentificaţi din nou înainte de a utiliza Support Toolkit.',
	'STK_LOGIN'							=> 'Autentificare Support Toolkit',
	'STK_LOGIN_WAIT'					=> 'Trebuie să aşteptaţi 3 secunde înainte de a vă autentifica, vă rugăm să încercaţi din nou.',
	'STK_LOGOUT'						=> 'Ieşire STK',
	'STK_LOGOUT_SUCCESS'				=> 'V-aţi deconectat cu succes de la Support Toolkit.',
	'STK_NON_LOGIN'						=> 'Autentificaţi-vă pentru a accesa STK.',
	'STK_OUTDATED'						=> 'Instalarea Support Toolkit pare a fi expirată. Ultima versiune disponibilă este <strong style="color: #008000;">%1$s</strong>, în timp ce versiunea instalată este <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Datorită impactului mare al acestui utilitar faţă de instalarea phpBB, acesta a fost dezactivat până ce actualizarea va fi efectuată. Vă recomandăm să actualizaţi toate programele care rulează pe server. Pentru mai multe informaţii referitoare la ultimele actualizări, vă rugăm să citiţi <a href="%3$s">anunţurile de lansare</a>.',
	'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
	'SUPPORT_TOOL_KIT_INDEX'			=> 'Index Support Toolkit',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Parola',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Din moment ce nu sunteţi autentificat în phpBB3 trebuie să dovediţi că sunteţi proprietarul forumului prin instroducerea parolei pentru Support Toolkit.<br /><br /><strong>TREBUIE să permiteţi cookie în browser pentru a permite autentificarea persistentă.</strong>',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'Acest utilitar încearcă să încarce fişierul (%1$s) care nu există',
	'TOOL_NAME'							=> 'Nume utilitar',
	'TOOL_NOT_AVAILABLE'				=> 'Utilitarul solicitat nu este disponibil!',

	'USING_STK_LOGIN'					=> 'Sunteţi autentificat prin metoda internă de autentificare STK. Este recomandat să utilizaţi această metodă <strong>numai</strong> atunci când nu puteţi să vă autentificaţi în phpBB.<br />Pentru a dezactiva această metodă de autentificare apăsaţi <a href="%1$s">aici</a>.',
));

?>