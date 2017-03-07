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
	protected $_vessels;
	protected $_online;

	public function __construct() {
		if($this->get_http_response_code('http://localhost:25660') != "200"){
    		$this->_online = false;
		}else{
    		$json = file_get_contents('http://localhost:25660');
			$obj = json_decode($json);

			$this->fillData($obj);
			$this->_online = true;
		}
		
		
		
	}

	protected function get_http_response_code($url) {
		ini_set('default_socket_timeout', 2);
    	$headers = get_headers($url);
    	return substr($headers[0], 9, 3);
	}

	protected function fillData($obj) {
		$this->_server_name = $obj->server_name;
		$this->_players = $obj->players;
		$this->_lastPlayerActivity = $obj->lastPlayerActivity;
		$this->_modControlSha = $obj->modControlSha;
		$this->_player_count = $obj->player_count;
		$this->_whitelist = $obj->whitelist;
		$this->_max_players = $obj->max_players;
		$this->_vessels = $obj->vessels;
	}

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



}

?>