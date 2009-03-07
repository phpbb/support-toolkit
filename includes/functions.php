<?php
/**
 *
 * @package Support Tool Kit
 * @version $Id$
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * Minimum Requirement: PHP 4.3.3
 * 
 * This is a replication of the phpBB common.php, it is used to correctly initialize the
 * STK classes.
 */

/**
 * @ignore
 */
if (!defined('IN_STK'))
{
	exit ();
}

/**
 * Get the given language entry
 *
 * @param String $key
 * @return The string that belongs to the given key. If there isn't such a string return the key.
 */
function get_lang_entry($key)
{
	global $user;
	
	$string = '';
	if (isset($user->lang[$key]))
	{
		$string = $user->lang[$key];
	}
	else
	{
		$string = $key;
	}
	
	return $string;
}

?>