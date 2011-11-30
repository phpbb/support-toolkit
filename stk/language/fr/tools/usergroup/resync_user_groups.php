<?php
/**
 *
 * @package Support Toolkit - Resynchronise Registered users groups
 * @version $Id$
 * @copyright (c) 2009 phpBB Group, (c) 2009 phpBB.fr
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License 2.0
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
	'RESYNC_USER_GROUPS'			=> 'Resynchroniser les groupes d’utilisateurs',
	'RESYNC_USER_GROUPS_EXPLAIN'	=> 'Cet outil vérifie si les utilisateurs sont bien membres des groupes par défaut <em>(utilisateurs inscrits, utilisateurs COPPA inscrits et utilisateurs récemment inscrits)</em>',
	'RESYNC_USER_GROUPS_NO_RUN'		=> 'Tous les groupes semblent être à jour !',
	'RESYNC_USER_GROUPS_SETTINGS'	=> 'Resynchroniser les réglages',
	'RUN_BOTH_FINISHED'				=> 'Tous les groupes d’utilisateurs ont été resynchronisés !',
	'RUN_RNR'						=> 'Resynchroniser les utilisateurs récemment inscrits',
	'RUN_RNR_EXPLAIN'				=> 'Cela mettra à jour le groupe des « utilisateurs récemment inscrits » afin qu’il contienne tous les utilisateurs qui correspondent aux critères définis dans le PCA.',
	'RUN_RNR_FINISHED'				=> 'Le groupe des utilisateurs récemment inscrits a été resynchronisé.',
	'RUN_RNR_NOT_FINISHED'			=> 'Le groupe des utilisateurs récemment inscrits est en cours de resynchronisation. Veuillez ne pas interrompre cette opération.',
	'RUN_RR'						=> 'Resynchroniser les utilisateurs inscrits',
	'RUN_RR_EXPLAIN'				=> 'L’outil a déterminé que tous les utilisateurs de votre forum ne sont pas membres du groupe des « utilisateurs <em>(COPPA)</em> inscrits ». Souhaitez-vous resynchroniser ces groupes ?<br /><strong>Note :</strong> si votre forum a la COPPA activée, les utilisateurs n’ayant pas entré une date de naissance seront placés dans le groupe des « utilisateurs COPPA inscrits » !',
	'RUN_RR_FINISHED'				=> 'Les utilisateurs ont été synchronisés.',

	'SELECT_RUN_GROUP'	=> 'Veuillez sélectionner au moins un type de groupe qui sera resynchronisé.',
));