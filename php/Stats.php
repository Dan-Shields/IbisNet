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

	public function __construct() {
		if($this->checkListenerStatus('localhost') === false){
    		$this->_online = false;
		}else{
    		$json = file_get_contents('http://localhost:25660');
			$obj = json_decode($json);

			$this->_online = true;
			$this->fillFromJSON($obj);
		}
	}

	protected function checkListenerStatus($host) {
		$connection = @fsockopen($host, 25660, $errno, $errstr, 1);

	    if (is_resource($connection)) {
	        return true;
	    } else {
	        return false;
	    }
	}

	protected function fillFromJSON($obj) {
		$this->_server_name =	        $obj->server_name;
		$this->_players = 				$obj->players;
		$this->_lastPlayerActivity = 	$obj->lastPlayerActivity;
		$this->_modControlSha = 		$obj->modControlSha;
		$this->_player_count = 			$obj->player_count;
		$this->_whitelist = 			$obj->whitelist;
		$this->_max_players = 			$obj->max_players;
		$this->_vessels = 				$obj->vessels;
		$this->_uptime = 				$obj->uptime;
	}

	public function fillFromSQL() {
		require_once 'DBconnect.php';
		global $dbh;

		$sql = "SELECT DISTINCT `session_player_name` FROM `tbl-player-sessions` WHERE `session_end_time` BETWEEN NOW() - INTERVAL 1 DAY AND NOW()";
		$sessionsResult = $dbh->select($sql,[]);

		$this->_playersToday = count($sessionsResult);
	}

	//GETTERS
	public function getPlayers() {
		return $this->_players;
	}

	public function getServerName() {
		return $this->_server_name;
	}

	public function getStatus() {
		return $this->_online;
	}

	public function getVessels() {
		return $this->_vessels;
	}

	public function getPlayersToday() {
		return $this->_playersToday;
	}

	public function getUptime() {
		return $this->_uptime;
	}

	public function getWhitelist() {
		return $this->_whitelist;
	}
}
?>