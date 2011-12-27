<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @version $Id: database_cleaner.php 262 2009-11-10 14:58:25Z erikfrerejean $
* @translate $Id: database_cleaner.php 262 2010-02-14 14:08:29 dorin $
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
	'BOARD_DISABLE_REASON'			=> 'Forumul este momentan dezactivat pentru lucrări de întreţinere. Vă rugăm reveniţi!',
	'BOARD_DISABLE_SUCCESS'			=> 'Forumul a fost dezactivat cu succes!',

	'COLUMNS'						=> 'Coloane',
	'CONFIG_SETTINGS'				=> 'Setări de configurare',
	'CONFIG_UPDATE_SUCCESS'			=> 'Setările de configurare au fost actualizate cu succes!',
	'CONTINUE'						=> 'Continuă',

	'DATABASE_CLEANER'				=> 'Curăţare bază de date',
	'DATABASE_CLEANER_EXTRA'		=> 'Orice alte elemente suplimentare adăugate de modificări.  <strong>În cazul în care este bifată caseta de selecţie, vor fi eliminate</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Orice câmpuri cu un fundal roşu ca acesta sunt elemente care lipsesc şi trebuie să fie adăugate.  <strong>În cazul în care este bifată caseta de selecţie, vor fi adăugate</strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Curăţarea bazei de date a fost finalizată cu succes pentru toate sarcinile!<br /><br />Asiguraţi-vă că aţi făcut din nou o salvare a bazei de date.',
	'DATABASE_CLEANER_WARNING'		=> 'Acest utilitar nu oferă NICIO GARANŢIE şi utilizatorii acestui utilitar ar trebui să facă salvări ale bazei de date pentru a avea posibilitatea reconstituirii acesteia în caz de accidente.<br /><br />Înainte de a continua, asiguraţi-vă că aţi salvat baza de date!',
	'DATABASE_CLEANER_WELCOME'		=> 'Bine aţi venit la utilitarul de curăţare a bazei de date!<br /><br />Acest utilitar a fost creat pentru a şterge coloanele, rândurile şi tabele din baza de date adăugate unei instalări standard a phpBB3 şi adaugă elementele lipsă care sunt necesare în baza de date.<br /><br />Când sunteţi gata să continuaţi apăsaţi butonul Continuă pentru a porni curăţarea bazei de date (reţineţi că forumul va fi dezactivat până la finalizarea procesului).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Coloanele din baza de date au fost actualizate cu succes!',
	'DATABASE_TABLES'				=> 'Tabelele bazei de date',
	'DATABASE_TABLES_SUCCESS'		=> 'Tabelele bazei de date au fost actualizate cu succes!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'Rolurile de sistem phpBB au fost restaurate cu succes!',
	'DATABASE_ROLES_SUCCESS'		=> 'Rolurile au fost actualizate cu succes!',
	'DATAFILE_NOT_FOUND'			=> 'Support Toolkit nu a putut găsi fişierele de date necesare pentru versiunea phpBB instalată!',

	'EMPTY_PREFIX'					=> 'Niciun prefix pentru baza de date',
	'EMPTY_PREFIX_CONFIRM'			=> 'Utilitarul de curăţare a bazei de date este gata să efectueze modificări la tabele în baza dumeavoastră de date dar pentru că nu folosiţi un prefix la tabele această acţiune ar putea tabelele care nu au legătura cu phpBB. Sunteţi sigur că vreţi să continuaţi?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'Utilitarul de curăţare a bazei de date a constatat că nu aveţi specificat un prefix pentru tabelele phpBB din baza de date. Datorită acestui fapt, utilitarul va verifica <strong>toate</strong> tabelele din baza de date. Continuaţi cu atenţie şi asiguraţi-vă că excludeţi din selecţie orice tabelă care nu aparţine de phpBB. Dacă nu procedaţi astfel riscaţi să afectaţi tabelele din baza de date care nu fac parte din phpBB.<br />Dacă nu sunteţi sigur cum trebuie procedat, cereţi ajutor în <a href="http://www.phpbb.com/community/viewforum.php?f=46">forumurile de suport phpBB</a>.',
	'ERROR'							=> 'Eroare',
	'EXTRA'							=> 'Extra',
	'EXTENSION_GROUPS_SUCCESS'		=> 'The extension groups have been reset successfully',
	'EXTENSIONS_SUCCESS'			=> 'The extensions have been reset successfully',

	'FINAL_STEP'					=> 'Acesta este pasul final.<br /><br />Acum forumul va fi reactivat şi cache-ul forumului va fi şters.',

	'INSTRUCTIONS'					=> 'Instrucţiuni',

	'MISSING'						=> 'Lipsesc',
	'MODULE_UPDATE_SUCCESS'			=> 'Modulele au fost actualizate cu succes!',

	'NO_BOT_GROUP'					=> 'Boţii nu au putut fi resetaţi, lipseşte grupul boţilor.',

	'PERMISSION_SETTINGS'			=> 'Permisiuni',
	'PERMISSION_UPDATE_SUCCESS'		=> 'Setarea permisiunilor a fost actualizată cu succes!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Versiunea dumneavoastră phpBB3 nu este acceptată (sau unele fişiere ale utilitarului Suport Toolkit lipsesc).<br />phpBB 3.0.0 + ar trebui să fie suportat, dar poate dura ceva timp până ce o nouă versiune acestui utilitar va fi actualizată pentru a fi conformă cu cea mai nouă versiune phpBB 3.0.',

	'QUIT'							=> 'Renunţă',

	'RESET_BOTS'					=> 'Resetare boţi',
	'RESET_BOTS_EXPLAIN'			=> 'Doriţi să resetaţi lista cu boţi la lista standard a phpBB3? Toţi roboţii existenţi vor fi eliminaţi şi vor fi înlocuiţi cu setul standard.',
	'RESET_BOTS_SKIP'				=> 'Resetarea boţilor a fost sărită',
	'RESET_BOT_SUCCESS'				=> 'Boţii au fost resetaţi cu succes!',
	'RESET_MODULES'					=> 'Resetare module',
	'RESET_MODULES_EXPLAIN'			=> 'Doriţi să resetaţi modulele la cele standard phpBB3?  Toate modulele existente vor fi şterse şi înlocuite cu cele standard.',
	'RESET_MODULES_SKIP'			=> 'Modulul de resetare a fost sărit',
	'RESET_MODULE_SUCCESS'			=> 'Modulele au fost resetate cu succes!',
	'RESET_REPORT_REASONS'			=> 'Resetare rapoarte cu motive',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Vreţi să resetaţi rapoartele cu motive? Această acţiune va şterge toate rapoartele adăugate!',
	'RESET_REPORT_REASONS_SKIP'		=> 'Rapoartele cu motive nu au fost resetate',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'Rapoartele cu motive au fost resetate cu succes!',
	'RESET_ROLE_DATA'				=> 'Resetare setări rol',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Această procedură va reseta sistemul de roluri al phpBB la starea iniţiala, este recomandat să executaţi acestă procedură dacă aţi efectuat modificări la pasul anterior.',
	'ROLE_SETTINGS'					=> 'Setări rol',
	'ROWS'							=> 'Rânduri',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'Tabele neschimbate',
		'columns'			=> 'Coloane neschimbate',
		'config'			=> 'Configurare neschimbată',
		'extension_groups'	=> 'Grupuri extensii neschimbate',
		'extensions'		=> 'Extensii neschimbate',
		'permissions'		=> 'Permisiuni neschimbate',
		'groups'			=> 'Grupuri neschimbate',
		'roles'				=> 'Roluri neschimbate',
		'final_step'		=> 'Pasul final',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'Tabelele bazei de date nu au fost schimbate',
		'columns'			=> 'Coloanele din baza de date nu au fost schimbate',
		'config'			=> 'Tabela de configurare nu are nicio valoare nouă/lipsă',
		'extension_groups'	=> 'Tabela pentru grupurile de extensii nu are nicio valoare nouă/lipsă',
		'extensions'		=> 'Extensiile standard nu s-au schimbat',
		'permissions'		=> 'Nu au fost schimbări în tabelele cu permisiuni',
		'groups'			=> 'Nu au fost schimbări în grupurile de sistem ale phpBB',
		'roles'				=> 'Nu au fost roluri adăugate sau şterse',
		'final_step'		=> 'Acest ultim pas va şterge cache-ul şi va reactiva forumul.',
	),
	'SUCCESS'						=> 'Succes',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Grupurile de sistem ale phpBB au fost resetate cu succes',

	'TYPE'							=> 'Tip',
	
	'UNSTABLE_DEBUG_ONLY'			=> 'Utilitarul de curăţare a bazei de date poate rula pe versiuni phpBB instabiles <em>(dev, a, b, RC)</em> doar dacă variabila "DEBUG" din fişierul de configurare phpBB este activată.',
));


?>