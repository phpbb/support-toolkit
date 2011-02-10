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
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Mai jos puteţi găsi copia proprie a şablonului de solicitare suport. Apăsaţi mai jos pentru a o copia în clipboard, apoi creaţi un mesaj nou în <a href="http://www.phpbb.com/community/viewforum.php?f=46">forumul de suport</a> folosind aceste informaţii. Dacă aveţi deja un subiect deschis pentru problema apărută, vă rugăm să copiaţi şablonul într-un răspuns la subiectul existent în loc să creaţi un subiect nou.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'Generatorul pentru şablonul de solicitare suport nu a putut încărca răspunsurile. Asiguraţi-vă că aţi pornit utilitarul.',
	'SRT_GENERATOR'					=> 'Generator pentru şablonul de solicitare suport',
	'SRT_GENERATOR_LANDING'			=> 'Generator pentru şablonul de solicitare suport',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Bine aţi venit la Generatorul pentru şablonul de solicitare suport. Acesta este cel mai rapid şi eficient mod pentru a completa şablonul de solicitare suport. Generatorul vă va adresa o serie de 8 până la 10 întrebari ce sunt folositoare pentru a diagnostica majoritatea problemelor. Apoi va compila răspunsurile într-o listă ce poate fi copiată în subiectul propriu deschis pentru suport.<br />Utilitarul STK procedează similar cu <a href="http://www.phpbb.com/support/stk/">Generatorul SRT Generator de la www.phpbb.com</a> dar încearcă să completeze automat anumite răspunsuri la întrebări.<br /><br />Vreţi să rulaţi Generatorul SRT?',
	'START_OVER'					=> 'Porniţi de la început',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'Este o problemă legată de vreun MOD?',
	'STEP1_MOD_EXPLAIN'		=> 'Aveţi această problemă după ce aţi instalat sau eliminat un MOD?',
	'STEP1_MOD_ERROR'		=> 'Întrebările de suport pentru probleme legate de MOD-uri trebuie adresate în subiectul care v-a furnizat MOD-ul pentru descărcare. Dacă MOD-ul a fost descărcat de pe alt site atunci va trebui să solicitaţi acolo suport.<br /><br /><a href="http://www.phpbb.com/community/viewforum.php?f=81">Accesaţi forumul pentru MOD-uri</a>',
	'STEP1_HACKED'			=> 'Aţi avut forumul spart?',
	'STEP1_HACKED_EXPLAIN'	=> 'Selectaţi "Da" pentru această opţiune dacă solicitaţi suport în caz ca forumul propriu a fost spart sau compromis.',
	'STEP1_HACKED_ERROR'	=> 'Dacă forumul a fost spart, vă rugăm să completaţi un raport în Incident Investigation Tracker în loc de a cere ajutor în forumul de suport pentru ca sa nu faceţi publice informaţiile personale .<br /><br />Consultaţi <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">acest mesaj</a> pentru a vedea cum trebuie procedat.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Ce versiune phpBB folosiţi?',
			'board_url'			=> 'Care este adresa URL a forumului?',
			'host_name'			=> 'La cine găzduiţi forumul?',
			'install_type'		=> 'Cum aţi instalat forumului?',
			'inst_converse'		=> 'Este o instalare nouă sau o conversie?',
			'mods_installed'	=> 'Aveţi vreun MOD instalat?',
			'registration_req'	=> 'Este nevoie de înregistrare pentru a reproduce problema întâmpinată?',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Ce stiluri aveţi instalate?',
			'installed_languages'	=> 'Ce module de limbă folosiţi pe forum?',
			'dbms'					=> 'Ce tip şi versiune de bază de date folosiţi?',
			'xp_level'				=> 'Ce nivel de experienţă aveţi?',
			'problem_started'		=> 'Când aţi început să întâmpinaţi acestă problemă?',
			'problem_description'	=> 'Vă rugăm să descrieţi problema.',
			'installed_mods'		=> 'Ce MOD-uri aveţi instalate?',
			'test_username'			=> 'Ce nume de utilizator poate fi folosit pentru a vedea această problemă?',
			'test_password'			=> 'Ce parolă poate fi folosită pentru a vedea această problemă?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Generatorul SRT nu a putut determina ce versiune phpBB folosiţi, vă rugăm să selectaţi versiunea corectă. Pentru a găsi această informaţie, autentificaţi-vă pe forum şi accesaţi din partea de jos a paginii “Panoul administratorului”. Apoi accesaţi TAB-ul “Sistem”.',
			'board_url'			=> 'Adresa URL este adresa pe care o folosiţi să accesaţi forumul propriu. Cele mai multe probleme sunt mai uşor de rezolvat când se poate vizualiza forumulul. Dacă nu vreţi să furnizaţi această informaţie atunci specificaţi "n/a".',
			'host_name'			=> 'Anumite probleme întâlnite pe forumurile phpBB pot fi atribuite anumitor servicii de găzduire. Acest câmp trebuit completat cu numele companiei care vă furnizează pachetul de găzduire (de exemplu GoDaddy, Yahoo!, 1&1, etc.). Dacă vă găzduiţi forumul propriu, atunci specificaţi acest lucru. Altfel, dacă nu ştiţi cine vă găzduieşte forumul trebuie să specificaţi acest fapt.',
			'install_type'		=> 'Dacă aţi instalat forumul propriu descărcând fişierele phpBB, urcându-le pe server şi apoi accesând utilitarul de instalare selectaţi “Am folosit pachetul de la phpBB.com.” Dacă aţi apelat la altcineva să vi-l instaleze atunci selectaţi “Altcineva mi-a instalat forumul.” Dacă aţi folosit un utilitar automat ca de exemplu Fantastico, selectaţi “Am folosit un utilitar furnizat de cei care îmi oferă gazduire.”',
			'inst_converse'		=> 'Dacă forumul a fost o instalare curată, aceasta înseamnă ca forumul propriu nu a existat înainte de instalarea phpBB. Dacă aţi actualizat recent forumul propriu de la o versiune mai veche a phpBB3 înainte ca problema să apară, atunci selectaţi "Actualizare de la o versiune anterioară phpBB3". Dacă este o conversie înseamnă că forumul propriu a fost instalat anterior ca un alt tip de forum ce ulterior a fost convertit la phpBB.',
			'mods_installed'	=> 'MOD-urile sunt adesea cauza multor probleme cu phpBB. Această informaţie poate ajuta la determinarea cauzei exacte a problemei apărute.',
			'registration_req'	=> 'Selectaţi "Da" dacă cineva trebuie să fie înregistrat şi autentificat pentru a întâmpina problema apărută.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Un stil neactualizat poate fi cauza multor probleme. Dacă nu ştiţi ce stiluri aţi instalat, accesaţi Panoul administratorului, apoi TAB-ul "Stiluri".',
			'installed_languages'	=> 'Un pachet de limbă neactualizat poate fi cauza multor probleme. Dacă nu ştiţi ce pachete de limbă aţi instalat, accesaţi Panoul administratorului, apoi TAB-ul "Sistem" urmat de "Pachete limbă" din lista legăturilor aflate în stânga.',
			'dbms'					=> 'Pentru a determina tipul şi versiunea bazei de date pe care o folosiţi, accesaţi Panoul administratorului. În TAB-ul "General", localizaţi "Server bază de date:" în tabela cu statistici.',
			'xp_level'				=> 'Vă rugăm să selectaţi opţiunea care vă caracterizează cel mai bine.',
			'problem_started'		=> 'Vă rugăm să descrieţi acţiunile pe care le-aţi luat (actualizarea forumului propriu, instalarea unui MOD, etc.) anterior apariţiei acestei probleme.',
			'problem_description'	=> 'Când descrieţi problema, vă rugăm să încercaţi să detaliaţi cât de mult posibil. Includeţi informaţii referitoare la momentul când a apărut problema, paşii ce trebuie urmaţi pentru a reproduce problema şi orice alte informaţii pe care le consideraţi importante.',
			'installed_mods'		=> 'Încercaţi să detaliaţi cât de mult posibil când scrieţi despre MOD-urile instalate. Aceste informaţii ne ajută foarte mult în a determina cauza problemei întâlnite.',
			'test_username'			=> 'Vă rugăm să furnizaţi un nume de utilizator folosind un cont de test ce poate fi folosit pentru a observa problema. <strong>Nu</strong> furnizaţi această informaţie daca utilizatorul trebuie să aibă drepturi mai mari decât un "utilizator normal".',
			'test_password'			=> 'Vă rugăm să furnizaţi o parolă folosind un cont de test ce poate fi folosit pentru a observa problema. <strong>Nu</strong> furnizaţi această informaţie daca utilizatorul trebuie să aibă drepturi mai mari decât un "utilizator normal".',
		),
	),
));

// Langauge strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				'myself'		=> 'Am folosit pachetul de la phpBB.com',
				'third'			=> 'Am folosit pachetul furnizat de alt site',
				'someone_else'	=> 'Altcineva mi-a instalat forumul',
				'automated'		=> 'Am folosit un utilitar furnizat de cei care îmi oferă gazduire',
			),
			'inst_converse'	=> array(
				'fresh'				=> 'Instalare curată',
				'phpbb_update'		=> 'Actualizare de la o versiune anterioară phpBB3',
				'convert_phpbb2'	=> 'Conversie de la phpBB2',
				'convert_other'		=> 'Conversie de la alt soft',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				'new_both'		=> 'Începător cu PHP şi phpBB',
				'new_phpbb'		=> 'Începător cu phpBB dar nu şi cu PHP',
				'new_php'		=> 'Începător cu PHP dar nu şi cu phpBB',
				'comfort'		=> 'Comfortabil cu PHP şi phpBB',
				'experienced'	=> 'Experimentat cu PHP şi phpBB',
			),
		),
	),
));

?>