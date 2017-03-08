<?php

class User {
	protected $_userRegistered;
	protected $_steamId;
	protected $_userInfo;
	protected $_userGameStats;

	public function __construct($steamid) {
		require_once 'database.php';
		global $dbh;

		$sql = "SELECT * FROM `tbl-user` WHERE `user_steamid` = :steamid";
		$userResult = $dbh->select($sql,['steamid' => $steamid]);
		
		if ($userResult) {
			$this->_userRegistered = TRUE;
			$this->fillInfo($userResult);
			$this->fillGameStats();
		} else {
			$this->_userRegistered = FALSE;
		}
	}

	protected function fillInfo($userResult) {
		$userData = $userResult[0];

		$this->_steamId = $this->_userInfo['steamid'] = $userData['user_steamid'];
		$this->_userInfo['alias'] = $userData['user_alias'];
		$this->_userInfo['email'] = $userData['user_email'];
		$this->_userInfo['level'] = $userData['user_level'];
		$this->_userInfo['registration'] = $userData['user_registration'];
		$this->_userInfo['profile_pic_url'] = 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/' . $userData['user_profile_pic_url'] . '_medium.jpg';
	}

	protected function fillGameStats() {
		require_once 'database.php';
		global $dbh;
		$playerOnline = false;

		global $stats;
		if ($stats->getStatus()) {
			$currentPlayers = $stats->getPlayers();


			foreach ($currentPlayers as $player) {
				if ($player = $this->getInfo()['alias']) {
					$playerOnline = true;
					break;
				}
			}
		}

		$sql = "SELECT * FROM `tbl-player-sessions` WHERE `session_player_name` = :alias ORDER BY `session_end_time` DESC LIMIT 1";
		$sessionsResult = $dbh->select($sql,['alias' => $this->_userInfo['alias']]);

		//sets last logout time
		if ($sessionsResult) {
			$lastSession = $sessionsResult[0];
			$lastLogout = $lastSession['session_end_time'];

			$totalPlaytime = 0;

			foreach ($sessionsResult as $session) {
				$totalPlaytime += $session['session_duration'];
			}

			$this->_userGameStats['has_played'] = true;
			$this->_userGameStats['online'] = $playerOnline;
			$this->_userGameStats['last_logout'] = $lastLogout;
			$this->_userGameStats['total_playtime'] = $totalPlaytime;
		} else {
			$this->_userGameStats['has_played'] = false;
		}
	}

	//GETTERS
	public function getSteam() {
		return $this->_steamId;
	}

	public function getInfo() {
		return $this->_userInfo;
	}

	public function getGameStats() {
		return $this->_userGameStats;
	}

	public function registered() {
		return $this->_userRegistered;
	}
}

class LoggedInUser extends User {
	public function register($userInfo) {
		if (!$this->registered()) {
			require_once 'database.php';
			global $dbh;

			$sql = "INSERT INTO `tbl-user` (`user_steamid`, `user_alias`, `user_email`, `user_profile_pic_url`) VALUES (:steamid, :alias, :email, :profile_pic_url)";
			$result = $dbh->change($sql,$userInfo);

			return $result;
		} else {
			return FALSE;
		}
	}

	public function update() {
		if ($this->registered()) {
			require_once 'database.php';
			require_once 'steamauth/userInfo.php';
			global $dbh;

	        $sql = 'SELECT TIME_TO_SEC(TIMEDIFF(NOW(), `user_profile_update_time`)) as diff FROM `tbl-user` WHERE user_steamid = :steamid';
	       	$result = $dbh->select($sql,['steamid' => $this->_steamid]);
	    
	   		//if more than 5 minutes old refresh url and reset timestamp
	   		$time = $result[0]['diff'];
	   		if ($time >= 300) {
	           	$sql = "UPDATE `tbl-user` SET `user_profile_pic_url`=:profile_pic_url, `user_profile_update_time`=NOW() WHERE `user_steamid`=:steamid";
	           	$dbh->change($sql,['steamid' => $this->_steamid, 'profile_pic_url' => substr($steamprofile['avatarmedium'], 72, 40)]);
	   		}
	   		return TRUE;
		} else {
			return FALSE;
		}
	}	
}



?>