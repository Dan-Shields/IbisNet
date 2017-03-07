<?php
class GSStats {
	protected $_obj;

	public $_server_name;
	public $_players;
	public $_lastPlayerActivity;
	public $_modControlSha;
	public $_player_count;
	public $_whitelist;
	public $_max_players;

	public function __GSStats() {
		$json = file_get_contents('http://localhost:25660');
		$this->$_obj = json_decode($json);

		$this->update();
	}

	public function update() {
		$this->_server_name = $this->$_obj->server_name;
		$this->_players = $this->$_obj->players;
		$this->_lastPlayerActivity = $this->$_obj->_lastPlayerActivity;
		$this->_modControlSha = $this->$_obj->modControlSha;
		$this->_player_count = $this->$_obj->player_count;
		$this->_whitelist = $this->$_obj->whitelist;
		$this->_max_players = $this->$_obj->maxplayers;
	}

}

?>