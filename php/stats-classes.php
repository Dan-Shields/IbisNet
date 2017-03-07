<?php
class GSStats {
	protected $_obj;

	protected $_server_name;
	protected $_players;
	protected $_lastPlayerActivity;
	protected $_modControlSha;
	protected $_player_count;
	protected $_whitelist;
	protected $_max_players;

	public function __construct() {
		$json = file_get_contents('http://localhost:25660');
		$obj = json_decode($json);

		$this->update($obj);
	}

	public function update($obj) {
		$this->_server_name = $obj->server_name;
		$this->_players = $obj->players;
		$this->_lastPlayerActivity = $obj->lastPlayerActivity;
		$this->_modControlSha = $obj->modControlSha;
		$this->_player_count = $obj->player_count;
		$this->_whitelist = $obj->whitelist;
		$this->_max_players = $obj->max_players;
	}

	public function getPlayers() {
		return $this->_players;
	}

	public function getServerName() {
		return $this->_server_name;
	}

}

?>