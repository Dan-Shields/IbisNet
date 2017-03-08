<?php
	require 'database.php';
	require 'user-classes.php';
	require '../steamauth/steamauth.php';
	require '../php/stats-classes.php';

	$stats = new GSStats();

	if (isset($_SESSION['steamid']) && isset($_POST['email']) && isset($_POST['alias'])) {
		require '../steamauth/userInfo.php';

		$newUser = new LoggedInUser($steamprofile['steamid']);

		$newUserInfo = [];

		$newUserInfo['steamid'] = $_SESSION['steamid'];
		$newUserInfo['alias'] = htmlspecialchars(strip_tags($_POST['alias']));
		$newUserInfo['email'] = htmlspecialchars(strip_tags($_POST['email']));
		$newUserInfo['profile_pic_url'] = substr($steamprofile['avatarmedium'], 69, 43);

		if ($newUser->register($newUserInfo)) {

			if (addToWhiteList($newUserInfo['alias']) !== false) {
				if (checkWhitelist($newUserInfo['alias']) === true) {
					header('Location: http://localhost/ksp');
				} else {
					die('whitelist error');
				}
			} else {
				die('whitelist error');
			}
			
		} else {
			die('registration error');

		}
	} else {
		die('Parameter error');
	}

	function addToWhitelist($name) {
		if(get_http_response_code('http://localhost:25660') != "200") {
    		return false;
		}else{
    		$response = file_get_contents('http://localhost:25660/whitelist%20add%20'. $name);
			if ($response == "success") {
				return true;
			} else {
				return false;
			}
		}
	}

	function get_http_response_code($url) {
    	$headers = @get_headers($url);
    	return substr($headers[0], 9, 3);
	}

	function checkWhitelist($name) {
		$stats = new GSStats();
			foreach ($stats->getWhitelist() as $player) {
				if ($player == $name) {
					return true;
					break;
				}
			}
	}

?>