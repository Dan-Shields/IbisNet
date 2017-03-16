<?php
class Stats {
	protected $_obj;

	protected $_server_name;
	protected $_players;
	protected $_lastPlayerActivity;
	protected $_modControlSha;
	protected $_player_count;
	protected $_whitelist;
	protected $_max_players;
	protected $_vessels;
	protected $_online;
	protected $_playersToday;
	protected $_uptime;

	public function _construct() {
		require_once 'DBconnect.php';
		global $dbh;

		$sql = "SELECT DISTINCT `session_player_name` FROM `tbl-player-sessions` WHERE `session_end_time` BETWEEN NOW() - INTERVAL 1 DAY AND NOW()";
		$sessionsResult = $dbh->select($sql,[]);

		$this->_playersToday = count($sessionsResult);
	}

	//GETTERS
	public function getPlayersToday() {
		return $this->_playersToday;
	}
}
?>