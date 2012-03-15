<?php

/**
 * Temp. test to verify that the phpBB database is correctly loaded
 */
class database_setup_test extends stk_database_test_case
{
	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/fixture.xml');
	}

	public function test_modulesLoaded()
	{
		$db = $this->new_dbal();
		$sql = 'SELECT COUNT(module_id) as cnt
			FROM ' . MODULES_TABLE;
		$result = $db->sql_query($sql);
		$cnt	= $db->sql_fetchfield('cnt', false, $result);
		$db->sql_freeresult($result);

		$this->assertEquals(199, $cnt);
	}

	public function test_botsLoaded()
	{
		$db = $this->new_dbal();
		$sql = 'SELECT COUNT(bot_id) as cnt
			FROM ' . BOTS_TABLE;
		$result = $db->sql_query($sql);
		$cnt	= $db->sql_fetchfield('cnt', false, $result);
		$db->sql_freeresult($result);

		$this->assertEquals(51, $cnt);
	}

	public function test_configLoaded()
	{
		$db = $this->new_dbal();
		$sql = 'SELECT COUNT(config_name) as cnt
			FROM ' . CONFIG_TABLE;
		$result = $db->sql_query($sql);
		$cnt	= $db->sql_fetchfield('cnt', false, $result);
		$db->sql_freeresult($result);

		$this->assertEquals(271, $cnt);
	}
}
