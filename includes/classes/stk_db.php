<?php
/**
 *
 * @package Support Tool Kit
 * @version $Id$
 * @copyright (c) 2009 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 * @ignore
 */
if (!defined('IN_STK'))
{
	exit ();
}

if (!STK_STANDALONE)
{
	include PHPBB_ROOT_PATH . 'includes/db/' . $dbms . '.' . PHP_EXT;
}

/**
 * A wrapper class for the DBAL.
 * It implements all public functions from the DBAL but only calls the correct
 * method if the STK isn't run standalone. If it does the methods will return
 * the data that would be returned by the method in case of a fail.
 */
class stk_db
{
	/**
	 * Referance to the DBAL class
	 */
	var $_db = null;
	
	/**
	 * Set up the database connection
	 */
	function __construct()
	{
		// If required initialize the DBAL
		if (!STK_STANDALONE)
		{
			global $dbhost, $dbuser, $dbpasswd, $dbname, $dbport, $sql_db;
			
			$this->_db = new $sql_db();
			$this->_db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false, defined ('PHPBB_DB_NEW_LINK') ? PHPBB_DB_NEW_LINK : false);
			unset($dbpasswd);
		}
	}
	
	/**
	 * Base query method
	 *
	 * @param	string	$query		Contains the SQL query which shall be executed
	 * @param	int		$cache_ttl	Either 0 to avoid caching or the time in seconds which the result shall be kept in cache
	 * @return	mixed				When casted to bool the returned value returns true on success and false on failure
	 *
	 * @access	public
	 */
	function sql_query($query = '', $cache_ttl = 0)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_query($query, $cache_ttl);
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Return number of affected rows
	 */
	function sql_affectedrows()
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_affectedrows();
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Fetch current row
	 */
	function sql_fetchrow($query_id = false)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_fetchrow($query_id);
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Seek to given row number
	 * rownum is zero-based
	 */
	function sql_rowseek($rownum, &$query_id)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_rowseek
			($rownum, $query_id );
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Get last inserted id after insert statement
	 */
	function sql_nextid()
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_nextid();
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Free sql result
	 */
	function sql_freeresult($query_id = false)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_freeresult($query_id);
		}
	}
	
	/**
	 * Escape string used in sql query
	 */
	function sql_escape($msg)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_escape($msg);
		}
	}
	
	//-- Methods from dbal.php
	

	/**
	 * return on error or display error message
	 */
	function sql_return_on_error($fail = false)
	{
		if (!STK_STANDALONE)
		{
			$this->_db->sql_return_on_error($fail);
		}
	}
	
	/**
	 * Return number of sql queries and cached sql queries used
	 */
	function sql_num_queries($cached = false)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_num_queries($cached);
		}
		else
		{
			return 0;
		}
	}
	
	/**
	 * Add to query count
	 */
	function sql_add_num_queries($cached = false)
	{
		if (!STK_STANDALONE)
		{
			$this->_db->sql_add_num_queries($cached);
		}
	}
	
	/**
	 * DBAL garbage collection, close sql connection
	 */
	function sql_close()
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_close();
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Build LIMIT query
	 * Doing some validation here.
	 */
	function sql_query_limit($query, $total, $offset = 0, $cache_ttl = 0)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_query_limit($query, $total, $offset, $cache_ttl);
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Fetch all rows
	 */
	function sql_fetchrowset($query_id = false)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_fetchrowset($query_id);
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Fetch field
	 * if rownum is false, the current row is used, else it is pointing to the row (zero-based)
	 */
	function sql_fetchfield($field, $rownum = false, $query_id = false)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_fetchfield($field, $rownum, $query_id);
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Correctly adjust LIKE expression for special characters
	 * Some DBMS are handling them in a different way
	 *
	 * @param string $expression The expression to use. Every wildcard is escaped, except $this->any_char and $this->one_char
	 * @return string LIKE expression including the keyword!
	 */
	function sql_like_expression($expression)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_like_expression($expression);
		}
	}
	
	/**
	 * Build sql statement from array for insert/update/select statements
	 *
	 * Idea for this from Ikonboard
	 * Possible query values: INSERT, INSERT_SELECT, UPDATE, SELECT
	 *
	 */
	function sql_build_array($query, $assoc_ary = false) {
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_build_array($query, $assoc_ary);
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Build IN or NOT IN sql comparison string, uses <> or = on single element
	 * arrays to improve comparison speed
	 *
	 * @access public
	 * @param	string	$field				name of the sql column that shall be compared
	 * @param	array	$array				array of values that are allowed (IN) or not allowed (NOT IN)
	 * @param	bool	$negate				true for NOT IN (), false for IN () (default)
	 * @param	bool	$allow_empty_set	If true, allow $array to be empty, this function will return 1=1 or 1=0 then. Default to false.
	 */
	function sql_in_set($field, $array, $negate = false, $allow_empty_set = false)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_in_set($field, $array, $negate, $allow_empty_set);
		}
	}
	
	/**
	 * Run more than one insert statement.
	 *
	 * @param string $table table name to run the statements on
	 * @param array &$sql_ary multi-dimensional array holding the statement data.
	 *
	 * @return bool false if no statements were executed.
	 * @access public
	 */
	function sql_multi_insert($table, &$sql_ary)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_multi_insert($table, $sql_ary);
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Build sql statement from array for select and select distinct statements
	 *
	 * Possible query values: SELECT, SELECT_DISTINCT
	 */
	function sql_build_query($query, $array)
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_build_query($query, $array);
		}
		else
		{
			return '';
		}
	}
	
	/**
	 * display sql error page
	 */
	function sql_error($sql = '')
	{
		if (!STK_STANDALONE)
		{
			$this->_db->sql_error($sql);
		}
	}
	
	/**
	 * Explain queries
	 */
	function sql_report($mode, $query = '')
	{
		if (!STK_STANDALONE)
		{
			return $this->_db->sql_report($mode, $query);
		}
		else
		{
			return false;
		}
	}
}
?>