<?php
/**
 *
 * @package Support Toolkit - Resynchronise Users groups
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

class resync_user_groups
{
	/**
	 * Batch size of the ammount of users we move around per run
	 * @var Integer
	 */
	var $batch_size = 500;

	/**
	 * The `resync_registered` object
	 * @var resync_registered
	 */
	var $rr = null;

	/**
	 * The `resync_newly_registered` object
	 * @var resync_newly_registered
	 */
	var $rnr = null;

	/**
	 * Keep track of the `rr` and `rnr` statuses
	 * for redirect
	 * @var Boolean
	 */
	var $run_rr		= false;
	var $run_rnr	= false;

	/**
	 * Display Options
	 *
	 * @return void
	 */
	function display_options()
	{
		$this->_load_classes();
		$this->rr	= new resync_registered($this);
		$this->rnr	= new resync_newly_registered($this);

		// Set the options
		$vars = array();
		if ($this->rr->can_run() === true)
		{
			$vars['rr'] = array('lang' => 'RUN_RR', 'type' => 'checkbox', 'explain' => true);
		}

		if ($this->rnr->can_run() === true)
		{
			$vars['rnr'] = array('lang' => 'RUN_RNR', 'type' => 'checkbox', 'explain' => true);
		}

		// No need to do a thing
		if (empty($vars))
		{
			trigger_error('RESYNC_USER_GROUPS_NO_RUN');
		}

		// Finish the options array and return it
		$options 			= array();
		$options['title']	= 'RESYNC_USER_GROUPS';
		$options['vars']	= array_merge(array(
			'legend1'	=> 'RESYNC_USER_GROUPS_SETTINGS',
		), $vars);

		return $options;
	}

	/**
	 * Run the required resync actions
	 */
	function run_tool(&$error)
	{
		$this->_load_classes();
		$this->run_rr	= request_var('rr', false);
		$this->run_rnr	= request_var('rnr', false);

		// Done nothing
		if (!$this->run_rr && !$this->run_rnr)
		{
			trigger_error('SELECT_RUN_GROUP');
		}

		// Run the required sections
		if ($this->run_rr)
		{
			$this->rr = new resync_registered($this);
			$this->rr->resync();
		}

		if ($this->run_rnr)
		{
			$this->rnr = new resync_newly_registered($this);
			$this->rnr->resync();
		}

		// Done trigger the correct notice
		if ($this->run_rr && $this->run_rnr)
		{
			trigger_error('RUN_BOTH_FINISHED');
		}

		// only one
		$msg = ($this->run_rr) ? 'RUN_RR_FINISHED' : 'RUN_RNR_FINISHED';
		trigger_error($msg);
	}

	/**
	 * Make sure that the classes used by this tool are available
	 * @retrun void
	 */
	function _load_classes()
	{
		foreach (array('resync_registered', 'resync_newly_registered') as $class)
		{
			if (!class_exists($class))
			{
				require STK_ROOT_PATH . "includes/resync_user_groups/{$class}." . PHP_EXT;
			}
		}
	}
}
