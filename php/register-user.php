<?php
	require 'database.php';
	require 'user-classes.php';
	require '../steamauth/steamauth.php';

	if (isset($_SESSION['steamid']) && isset($_POST['email']) && isset($_POST['alias'])) {
		require '../steamauth/userInfo.php';

		$newUser = new LoggedInUser($steamprofile['steamid']);

		$newUserInfo = [];

		$newUserInfo['steamid'] = $_SESSION['steamid'];
		$newUserInfo['alias'] = htmlspecialchars(strip_tags($_POST['alias']));
		$newUserInfo['email'] = htmlspecialchars(strip_tags($_POST['email']));
		$newUserInfo['profile_pic_url'] = substr($steamprofile['avatarmedium'], 72, 40);

		if ($newUser->register($newUserInfo)) {
			header('Location: http://localhost/ksp');
		} else {
			die('registration error');

		}
	} else {
		die('Parameter error');
	}

?>